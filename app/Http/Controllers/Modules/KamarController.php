<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\setweb;

class KamarController extends Controller
{
    public function index()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "kamar";

        return view('kamar.index', compact('title'));

    }

    public function kamaradd(Request $request)
    {
        $data = $request->validate([
            "nama_kamar" => 'required',
            "nomor_bed" => 'required',
            "harga" => 'required',
            "status" => 'required',
        ]);
        kamar::create($data);
        return redirect()->route('kamar')->with('success', 'pasien berhasi di tambahkan');
    }


}
