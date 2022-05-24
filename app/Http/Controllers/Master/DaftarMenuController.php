<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\DaftarMenu;
use Illuminate\Http\Request;
use File;

class DaftarMenuController extends Controller
{
    private $params;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->params['daftarMenu'] = DaftarMenu::orderBy('nama')->get();

        return view('daftar-menu.index', $this->params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('daftar-menu.create');
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
            'nama' => 'required',
            'harga' => 'required',
        ], [
            'required' => ':attribute harus diisi.',
        ], [
            'nama' => 'Nama menu',
            'harga' => 'Harga',
        ]);

        $newMenu = new DaftarMenu;
        $newMenu->nama = $request->nama;
        $newMenu->harga = $request->harga;
        if(isset($request->keterangan)) {
            $newMenu->keterangan = $request->keterangan;
        }
        if($request->file('foto') != null) {
            $folder = 'upload/menu';
            $file = $request->file('foto');
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
                $newMenu->foto = $folder.'/'.$filename;
            }
        }
        $newMenu->save();

        return redirect('master/daftar-menu')->withStatus('Berhasil menyimpan data.');
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
        $this->params['menu'] = DaftarMenu::find($id);

        return view('daftar-menu.edit', $this->params);
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
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required',
        ], [
            'required' => ':attribute harus diisi.',
        ], [
            'nama' => 'Nama menu',
            'harga' => 'Harga',
        ]);

        $editMenu = DaftarMenu::find($id);
        $editMenu->nama = $request->nama;
        $editMenu->harga = $request->harga;
        $editMenu->keterangan = $request->keterangan;
        if($request->file('foto') != null) {
            if(file_exists($editMenu->foto)){
                File::delete($editMenu->foto);
            }
            $folder = 'upload/menu';
            $file = $request->file('foto');
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
                $editMenu->foto = $folder.'/'.$filename;
            }
        }
        $editMenu->save();

        return redirect('master/daftar-menu')->withStatus('Berhasil memperbarui data.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DaftarMenu::findOrFail($id);
        if($data->foto != null) {
            if(file_exists($data->foto)){
                File::delete($data->foto);
            }
        }

        $data->delete();
        
        return back()->withStatus('Berhasil menghapus data.');
    }
}
