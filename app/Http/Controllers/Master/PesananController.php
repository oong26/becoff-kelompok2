<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\DaftarMenu;
use App\Models\DetailPesanan;
use App\Models\Keuangan;
use App\Models\Meja;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    private $params;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role == 'Pegawai') {
            $pesanan = Pesanan::select('pesanan.*', 'meja.nomor_meja')
                ->join('meja', 'meja.id', 'pesanan.id_meja')
                ->orderBy('kode_pesanan', 'DESC')
                ->orderBy('status')
                ->get();
        }

        $this->params['pesanan'] = $pesanan;

        return view('pemesanan.index', $this->params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        /* Generate Kode Pesanan */
        $currentDate = date('Ymd');
        $kodePesanan = null;
        $pesanan = Pesanan::where('kode_pesanan', 'LIKE', $currentDate . '%')->orderBy('kode_pesanan', 'DESC')->get();

        if ($pesanan->count() > 0) {
            $kodePesanan = $pesanan[0]->kode_pesanan;

            $lastIncrement = substr($kodePesanan, 8);

            $kodePesanan = str_pad($lastIncrement + 1, 4, 0, STR_PAD_LEFT);
            $kodePesanan = $currentDate . $kodePesanan;
        } else {
            $kodePesanan = $currentDate . "0001";
        }

        $this->params['kodePesanan'] = $kodePesanan;
        /* End Generate Kode Pesanan */
        $this->params['daftarMenu'] = DaftarMenu::orderBy('nama')->get();

        // $this->params['customer'] = User::where('role', 'Customer')
        //                                 ->orderBy('name')
        //                                 ->get();
        $this->params['meja'] = Meja::where('is_used', false)->orderBy('nomor_meja')->get();

        return view('pemesanan.create', $this->params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $this->validate($request, [
            'meja' => 'required',
            'qty' => 'required',
        ], [
            'not_in' => 'Silahkan pesan minal 1',
            'required' => 'Data harus terisi'
        ]);

        $arrSelectedIndex = [];
        $arrSelectedItemId = [];
        $arrSelectedPrice = [];
        $arrItemId = $request->menu;
        $arrQty = $request->qty;
        $count = array_sum($arrQty);
        $arrPrice = $request->price;
        $subTotal = 0;
        $custId = 0;
        if ($count > 0) {

            for ($i = 0; $i < count($arrQty); $i++) {
                if ($arrQty[$i] != null && $arrQty[$i] != 0) {
                    array_push($arrSelectedIndex, $i);
                }
            }

            for ($i = 0; $i < count($arrSelectedIndex); $i++) {
                array_push($arrSelectedItemId, $arrItemId[$arrSelectedIndex[$i]]);
                array_push($arrSelectedPrice, $arrPrice[$arrSelectedIndex[$i]]);
                $subTotal += $arrPrice[$arrSelectedIndex[$i]] * $arrQty[$arrSelectedIndex[$i]];
            }

            /* Adding data to pesanan table */
            if (auth()->user()->role == 'Pegawai') {
                if ($request->old_cust == 0 && $request->new_cust != "") {
                    // Adding new user
                    $newUser = new User;
                    $newUser->name = $request->new_cust;
                    $newUser->email = strtolower($request->new_cust) . "@becoff.com";
                    $newUser->email_verified_at = date('Y-m-d H:i:s');
                    $newUser->role = 'Customer';
                    $newUser->password = \Hash::make('123456');

                    $newUser->save();

                    $custId = $newUser->id;
                } else {
                    $custId = $request->old_cust;
                }
            }

            $newPesanan = new Pesanan;
            if (auth()->user()->role == 'Customer') {
                $custId = auth()->user()->id;
            }
            $newPesanan->kode_pesanan = $request->kode_pesanan;
            $newPesanan->pemesan = auth()->user()->id;
            $newPesanan->nama_pemesan = 'Customer';
            $newPesanan->id_meja = $request->meja;
            $newPesanan->keterangan = $request->keterangan;
            $newPesanan->total = $subTotal;

            $savePesanan = $newPesanan->save();

            if ($savePesanan) {
                $this->updateMeja($newPesanan->id_meja, true);
            }

            /* End */

            /* Adding selected product to detail_pesanan table */
            for ($i = 0; $i < count($arrSelectedIndex); $i++) {
                $newDetailPesanan = new DetailPesanan;
                $newDetailPesanan->kode_pesanan = $request->kode_pesanan;
                $newDetailPesanan->id_menu = $arrItemId[$arrSelectedIndex[$i]];
                $newDetailPesanan->qty = $arrQty[$arrSelectedIndex[$i]];
                $newDetailPesanan->total_harga = $arrPrice[$arrSelectedIndex[$i]] * $arrQty[$arrSelectedIndex[$i]];

                $newDetailPesanan->save();
            }
            return redirect('/master/pemesanan')->withStatus('Berhasil melakukan pemesanan.');
        } else {
            return redirect()->back()->withError('Minimal pesanan 1 menu yang dipilih');
        }

        /* End */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->params['pesanan'] = Pesanan::select('pesanan.*', 'meja.nomor_meja')
            ->join('meja', 'meja.id', 'pesanan.id_meja')
            ->where('pesanan.id', $id)
            ->first();

        $this->params['detail'] = DetailPesanan::select(
            'detail_pesanan.qty',
            'detail_pesanan.total_harga',
            'daftar_menu.nama',
            'daftar_menu.harga',
            'daftar_menu.foto',
        )
            ->join('daftar_menu', 'daftar_menu.id', 'detail_pesanan.id_menu')
            ->where('detail_pesanan.kode_pesanan', $this->params['pesanan']->kode_pesanan)
            ->orderBy('daftar_menu.nama')
            ->get();

        return view('pemesanan.show', $this->params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pesanan = Pesanan::find($id);

        $this->params['pesanan'] = $pesanan;

        $this->params['detail'] = DetailPesanan::select('detail_pesanan.*', 'daftar_menu.nama')
            ->join('daftar_menu', 'daftar_menu.id', 'detail_pesanan.id_menu')
            ->where('detail_pesanan.kode_pesanan', $pesanan->kode_pesanan)
            ->orderBy('daftar_menu.nama')->get();

        $this->params['daftarMenu'] = DaftarMenu::orderBy('nama')->get();

        $this->params['customer'] = User::where('role', 'Customer')
            ->orderBy('name')
            ->get();

        return view('pemesanan.edit', $this->params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $arrSelectedIndex = [];
        $arrSelectedItemId = [];
        $arrSelectedPrice = [];
        $arrItemId = $request->menu;
        $arrQty = $request->qty;
        $arrPrice = $request->price;
        $subTotal = 0;
        $custId = 0;

        for ($i = 0; $i < count($arrQty); $i++) {
            if ($arrQty[$i] != null && $arrQty[$i] != 0) {
                array_push($arrSelectedIndex, $i);
            }
        }

        for ($i = 0; $i < count($arrSelectedIndex); $i++) {
            array_push($arrSelectedItemId, $arrItemId[$arrSelectedIndex[$i]]);
            array_push($arrSelectedPrice, $arrPrice[$arrSelectedIndex[$i]]);
            $subTotal += $arrPrice[$arrSelectedIndex[$i]] * $arrQty[$arrSelectedIndex[$i]];
        }

        /* Adding data to pesanan table */

        $newPesanan = Pesanan::find($id);
        $newPesanan->kode_pesanan = $request->kode_pesanan;
        $newPesanan->pemesan = auth()->user()->id;
        // $newPesanan->nama_pemesan = 'Customer';
        $newPesanan->nomor_meja = $request->meja;
        $newPesanan->keterangan = $request->keterangan;
        $newPesanan->total = $subTotal;

        $newPesanan->save();
        /* End */

        /* Adding selected product to detail_pesanan table */
        $currentDetail = DetailPesanan::where('kode_pesanan', $request->kode_pesanan)->orderBy('id_menu')->get();

        $indexBaru = 0;

        $arrBarang = [];
        for ($i = 0; $i < count($arrSelectedItemId); $i++) {
            if ($i < count($currentDetail)) {
                // jumlah menu yg dipesan sama
                if ($arrSelectedItemId[$i] == $currentDetail[$indexBaru]->id_menu) {
                    array_push($arrBarang, $arrSelectedItemId[$i] . '-update');
                    // Memperbarui data pesanan sebelumnya.
                    DB::table('detail_pesanan')
                        ->where('kode_pesanan', $request->kode_pesanan)
                        ->where('id_menu', $currentDetail[$indexBaru]->id_menu)
                        ->update([
                            'qty' => $arrQty[$arrSelectedIndex[$i]],
                            'total_harga' => $arrQty[$arrSelectedIndex[$i]] * $arrPrice[$arrSelectedIndex[$i]],
                        ]);
                    $indexBaru++;
                } else {
                    array_push($arrBarang, $arrSelectedItemId[$i] . '-baru');
                    // Menambah data pesanan baru.
                    $newDetailPesanan = new DetailPesanan;
                    $newDetailPesanan->kode_pesanan = $request->kode_pesanan;
                    $newDetailPesanan->id_menu = $arrItemId[$arrSelectedIndex[$i]];
                    $newDetailPesanan->qty = $arrQty[$arrSelectedIndex[$i]];
                    $newDetailPesanan->total_harga = $arrPrice[$arrSelectedIndex[$i]] * $arrQty[$arrSelectedIndex[$i]];

                    $newDetailPesanan->save();
                }
            } else {
                // jumlah menu yang dipesan berubah
                // return $currentDetail;
                if (array_key_exists($indexBaru, $currentDetail)) {
                    // jika menu pesanan tetap
                    return 'data lama ' . $indexBaru;
                } else {
                    // jika ada menu pesanan baru
                    array_push($arrBarang, $arrSelectedItemId[$i] . '-baru');
                    // Menambah data pesanan baru.
                    $newDetailPesanan = new DetailPesanan;
                    $newDetailPesanan->kode_pesanan = $request->kode_pesanan;
                    $newDetailPesanan->id_menu = $arrItemId[$arrSelectedIndex[$i]];
                    $newDetailPesanan->qty = $arrQty[$arrSelectedIndex[$i]];
                    $newDetailPesanan->total_harga = $arrPrice[$arrSelectedIndex[$i]] * $arrQty[$arrSelectedIndex[$i]];

                    $newDetailPesanan->save();
                }
                // if($arrSelectedItemId[$i] == $currentDetail[$indexBaru]->id_menu) {
                //     array_push($arrBarang, $currentDetail[$indexBaru]->id_menu.'-update');
                //     // Memperbarui data pesanan sebelumnya.
                //     DB::table('detail_pesanan')
                //     ->where('kode_pesanan', $request->kode_pesanan)
                //     ->where('id_menu', $currentDetail[$indexBaru]->id_menu)
                //     ->update([
                //         'qty' => $arrQty[$arrSelectedIndex[$i]],
                //         'total_harga' => $arrQty[$arrSelectedIndex[$i]] * $arrPrice[$arrSelectedIndex[$i]],
                //     ]);
                // }
            }
        }
        /* End */

        return redirect('/master/pemesanan')->withStatus('Berhasil memperbarui data pesanan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pesanan::findOrFail($id);
        $idMeja = $data->id_meja;

        if ($data->delete())
            $this->updateMeja($idMeja, false);

        return back()->withStatus('Berhasil menghapus data.');
    }

    public function konfirmasiPembayaran($id)
    {
        $update = Pesanan::find($id);
        $update->status = 'Sudah Diproses';
        $update->save();

        if ($update->save()) {
            $newPemasukan = new Keuangan;
            $newPemasukan->nominal = $update->total;
            $newPemasukan->tipe = 'Pemasukan';
            $newPemasukan->keterangan = $update->kode_pesanan;

            if ($newPemasukan->save())
                $this->updateMeja($update->id_meja, false);

            return back()->withStatus('Berhasil mengkonfirmasi pemesanan.');
        }

        return back()->withError('Gagal mengkonfirmasi pembayaran.');
    }

    public function cancelOrder($id)
    {
        $update = Pesanan::find($id);
        $update->cancelled_at = date('Y-m-d H:i:s');

        if ($update->save())
            $this->updateMeja($update->id_meja, false);

        return back()->withStatus('Berhasil membatalkan pemesanan.');
    }

    private function updateMeja($id, $status)
    {
        $updateStatusMeja = Meja::find($id);
        $updateStatusMeja->is_used = $status;

        $updateStatusMeja->save();
    }

    public function print($id)
    {
        $pesanan = Pesanan::find($id);

        $this->params['pesanan'] = $pesanan;

        $this->params['detail'] = DetailPesanan::select('detail_pesanan.*', 'daftar_menu.nama', 'daftar_menu.harga')
            ->join('daftar_menu', 'daftar_menu.id', 'detail_pesanan.id_menu')
            ->where('detail_pesanan.kode_pesanan', $pesanan->kode_pesanan)
            ->orderBy('daftar_menu.nama')->get();

        return view('pemesanan.print', $this->params);
    }
}
