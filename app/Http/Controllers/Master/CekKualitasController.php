<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\CekKualitas;
use Illuminate\Http\Request;

class CekKualitasController extends Controller
{
    public function index(){
        $list = CekKualitas::orderBy('id', 'desc')->get();

        $data = array(
            'list' => $list,
        );

        return view('cek-kualitas.index', $data);
    }

    public function create(){
        return view('cek-kualitas.create');
    }

    public function store(Request $request)
    {
        $aroma = $request->aroma;
        $rasa = $request->rasa;
        $afterTaste = $request->after_taste;
        $acidity = $request->acidity;
        $kekentalan = $request->kekentalan;
        $kepahitan = $request->kepahitan;
        $winey = $request->winey;
        $grassy = $request->grassy;
        $smokey = $request->smokey;
        $cereal = $request->cereal;
        $medicine = $request->medicine;
        $stinkey = $request->stinkey;
        $musty = $request->musty;
        // return $request->except(['_token', 'nomor_identitas', 'jenis_kopi']);
        // Menghitung score akhir
        $score = round(($aroma +
                            $rasa +
                            $afterTaste +
                            $acidity +
                            $kekentalan +
                            $kepahitan +
                            $winey +
                            $grassy +
                            $smokey +
                            $cereal +
                            $medicine +
                            $stinkey +
                            $musty) / 13);

        $newCekKualitas = new CekKualitas;
        $newCekKualitas->nomor_identitas = $request->nomor_identitas;
        $newCekKualitas->jenis_kopi = $request->jenis_kopi;
        $newCekKualitas->aroma = $aroma;
        $newCekKualitas->rasa = $rasa;
        $newCekKualitas->after_taste = $afterTaste;
        $newCekKualitas->acidity = $acidity;
        $newCekKualitas->kekentalan = $kekentalan;
        $newCekKualitas->kepahitan = $kepahitan;
        $newCekKualitas->winey = $winey;
        $newCekKualitas->grassy = $grassy;
        $newCekKualitas->smokey = $smokey;
        $newCekKualitas->cereal = $cereal;
        $newCekKualitas->medicine = $medicine;
        $newCekKualitas->stinkey = $stinkey;
        $newCekKualitas->musty = $musty;
        $newCekKualitas->score = $score;

        $newCekKualitas->save();

        $data = array(
            'jenis_kopi' => $request->jenis_kopi,
            'score' => $score,
        );

        return view('cek-kualitas.success', $data);
    }

    public function destroy($id)
    {
        CekKualitas::findOrFail($id)->delete();

        return back()->withStatus('Berhasil menghapus data.');
    }
}
