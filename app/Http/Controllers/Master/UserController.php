<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /* Fitur Manajemen User */
    public function index()
    {
        $user = User::orderBy('name')->get();

        $data = array(
            'data' => $user
        );

        return view('user.index', $data);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'role' => 'not_in:0',
        ], [
            'requried' => ':attribute harus diisi.',
            'unique' => ':attribute telah digunakan.',
            'not_in' => ':attribute harus dipilih.'
        ], [
            'nama' => 'Nama',
            'email' => 'Email',
            'password' => 'Password',
            'role' => 'Role'
        ]);

        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect('/master/user')->withStatus('Berhasil menambahkan data.');
    }

    public function edit($id)
    {
        $user = User::find($id);

        $data = array(
            'user' => $user
        );

        return view('user.edit', $data);
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);

        $isEmailUnique = $request->email != null && $request->email != $user->email ? '|unique:users,email' : '';
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required'.$isEmailUnique,
            'password' => 'required',
            'role' => 'not_in:0',
        ], [
            'requried' => ':attribute harus diisi.',
            'unique' => ':attribute telah digunakan.',
            'not_in' => ':attribute harus dipilih.'
        ], [
            'nama' => 'Nama',
            'email' => 'Email',
            'password' => 'Password',
            'role' => 'Role'
        ]);

        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $user->role = $request->role;

        $user->save();

        return redirect('/master/user')->withStatus('Berhasil memperbarui data.');
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return back()->withStatus('Berhasil menghapus data.');
    }
    /* END Manajemen User

    /* Fitur Lupa Password */
    public function indexPassword()
    {
        return view('user.lupa-password');
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            // 'old_password' => 'required|min:8',
            'new_password' => 'required|min:8|same:conf_password',
            'conf_password' => 'required|min:8'
        ], [
            'required' => ':attribute harus diisi.',
            'min' => ':attribute minimal harus 8 karakter.',
            'same' => 'Password dan konfirmasi password harus sama.',
        ], [
            'email' => 'Email',
            // 'old_password' => 'Password lama',
            'new_password' => 'Password baru',
            'conf_password' => 'Konfirmasi password',
        ]);

        $data = User::where('email', $request->email)->first();

        if($data != null) {
            $data->password = \Hash::make($request->new_password);
            $data->save();

            return back()->withStatus('Berhasil merubah password.');
        }
        else {
            return back()->withError('Email tidak ditemukan.');
        }
    }
    /* END Fitur Lupa Password */

}
