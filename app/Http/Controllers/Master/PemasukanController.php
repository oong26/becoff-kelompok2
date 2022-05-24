<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Keuangan;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{

    public function index()
    {
        $pemasukan = Keuangan::where('tipe', 'Pemasukan')->orderBy('id', 'DESC')->get();
        
        return view('pemasukan.index', compact('pemasukan', $pemasukan));
    }
}
