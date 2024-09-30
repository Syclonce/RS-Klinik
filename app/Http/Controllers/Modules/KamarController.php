<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\bangsal;
use App\Models\setweb;
use App\Models\kamar;
use App\Models\kelaskamar;

class KamarController extends Controller
{
    public function index()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "kamar";
        $data = kamar::all();
        $kode = bangsal::all();
        $kelas = kelaskamar::where('status', 'aktif')->get();
        return view('kamar.index', compact('title','data','kode','kelas'));

    }

    public function kamaradd(Request $request)
    {
        $data = $request->validate([
            "nama_kamar" => 'required',
            "nomor_bed" => 'required',
            "kelas" => 'required',
            "harga" => 'required',
            "status" => 'required',
        ]);
        kamar::create($data);
        return redirect()->route('kamar')->with('success', 'kamar berhasi di tambahkan');
    }

    public function KelasKamar()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "kamar";
        $data = kelaskamar::all();
        return view('kamar.kelas', compact('title','data'));

    }

    public function KelasKamardd(Request $request)
    {
        $data = $request->validate([
            "nama" => 'required',
            "status" => 'required',
        ]);
        kelaskamar::create($data);
        return redirect()->route('kamar')->with('success', 'kamar berhasi di tambahkan');
    }

}
