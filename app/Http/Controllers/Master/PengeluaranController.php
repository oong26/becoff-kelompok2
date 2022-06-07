<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Keuangan;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    private $params;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengeluaran = Keuangan::where('tipe', 'Pengeluaran')->orderBy('id', 'DESC')->get();
        
        return view('pengeluaran.index', compact('pengeluaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengeluaran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nominal' => 'required',
            'keterangan' => 'required',
            'bukti' => 'required'
        ], [
            'required' => ':attribute harus diisi.',
        ], [
            'nominal' => 'Nominal',
            'keterangan' => 'Keterangan',
            'bukti' => 'Bukti',
        ]);

        $newPengeluaran = new Keuangan;
        $newPengeluaran->nominal = $request->nominal;
        $newPengeluaran->keterangan = $request->keterangan;
        $newPengeluaran->tipe = 'Pengeluaran';
        if($request->file('bukti') != null) {
            $folder = 'upload/bukti';
            $file = $request->file('bukti');
            $filename = date('YmdHis').$file->getClientOriginalName();
            // Get canonicalized absolute pathname
            $path = realpath($folder);

            // If it exist, check if it's a directory
            if(!($path !== true AND is_dir($path)))
            {
                // Path/folder does not exist then create a new folder
                mkdir($folder, 0755, true);
            }
            if($file->move($folder, $filename)) {
                $newPengeluaran->bukti = $folder.'/'.$filename;
            }
        }
        $newPengeluaran->save();

        return redirect('master/keuangan/pengeluaran')->withStatus('Berhasil menyimpan data.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Keuangan::find($id);
        // return $data;

        return view('pengeluaran.edit', compact('data', $data));
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
        $update = Keuangan::find($id);
        $update->nominal = $request->nominal;
        $update->keterangan = $request->keterangan;
        if($request->file('bukti') != null) {
            $folder = 'upload/bukti';
            $file = $request->file('bukti');
            $filename = date('YmdHis').$file->getClientOriginalName();
            // Get canonicalized absolute pathname
            $path = realpath($folder);

            // If it exist, check if it's a directory
            if(!($path !== true AND is_dir($path)))
            {
                // Path/folder does not exist then create a new folder
                mkdir($folder, 0755, true);
            }
            if($file->move($folder, $filename)) {
                $update->bukti = $folder.'/'.$filename;
            }
        }
        $update->save();

        return redirect('master/keuangan/pengeluaran')->withStatus('Berhasil menyimpan data.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
