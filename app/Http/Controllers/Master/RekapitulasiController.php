<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Keuangan;
use Illuminate\Http\Request;

class RekapitulasiController extends Controller
{
    public function index(Request $request)
    {
        if(isset($request->dari) && isset($request->sampai)) {
            $rekap = Keuangan::whereBetween('updated_at', [$request->dari." 00:00:00",$request->sampai." 23:59:59"])
                            ->orderBy('updated_at')
                            ->get();
        }
        else {
            $rekap = Keuangan::orderBy('updated_at')->get();
        }
        
        return view('rekapitulasi.index', compact('rekap', $rekap));
    }
}
