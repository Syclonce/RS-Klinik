<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\setweb;
use App\Models\kamar;

class KamarController extends Controller
{
    public function index()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "kamar";
        $data = kamar::all();

        return view('kamar.index', compact('title','data'));

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
        return redirect()->route('kamar')->with('success', 'kamar berhasi di tambahkan');
    }


}
