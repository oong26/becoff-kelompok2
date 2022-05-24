<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Meja;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Meja::orderBy('nomor_meja')->orderBy('is_used')->get();

        return view('meja.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meja.create');
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
            'nomor' => 'required|unique:meja,nomor_meja',
        ], [
            'nomor.required' => 'Nomor harus diisi.',
            'nomor.unique' => 'Nomor telah digunakan',
        ]);

        $newMeja = new Meja;
        $newMeja->nomor_meja = $request->nomor;

        $save = $newMeja->save();

        if ($save) {
            return redirect('master/meja')->withStatus('Berhasil menyimpan data.');
        }
        return back()->withError('Gagal menyimpan data.');
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
        $data = Meja::find($id);

        return view('meja.edit', compact('data'));
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
        $meja = Meja::find($id);
        $nomorUnique = $request->nomor != null && $request->nomor != $meja->nomor_meja ? '|unique:meja,nomor_meja' : '';

        $this->validate($request, [
            'nomor' => 'required' . $nomorUnique,
        ], [
            'nomor.required' => 'Nomor harus diisi.',
            'nomor.unique' => 'Nomor telah digunakan',
        ]);

        $meja->nomor_meja = $request->nomor;

        $update = $meja->save();

        if ($update)
            return redirect('master/meja')->withStatus('Berhasil memperbarui data.');

        return back()->withError('Gagal memperbarui data.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Meja::find($id)->delete();

        if ($delete)
            return back()->withStatus('Berhasil menghapus data.');

        return back()->withError('Gagal menghapus data.');
    }
}
