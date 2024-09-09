<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\biaya;
use App\Models\setweb;
use App\Models\doctor;
use App\Models\pasien;
use App\Models\tipepemeriksa;
use App\Models\prosedur;
use App\Models\kategori;
use App\Models\obat;
use App\Models\obatk;

class ObatController extends Controller
{
    public function index()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "obat";
        $kategori = obatk::all();
        $data = obat::with(['obatk'])->get();
        return view('obat.index', compact('title','kategori','data'));

    }

    public function obatadd(Request $request)
    {
        $data = $request->validate([
            "nama" => 'required',
            "obatk_id" => 'required',
            "pembelian" => 'required',
            "penjualan" => 'required',
            "kuantitas" => 'required',
            "generik" => 'required',
            "perusahaan" => 'required',
            "efek" => 'required',
            "kota" => 'required',
            "tanggal" => 'required',
        ]);
        obat::create($data);
        return redirect()->route('obat')->with('success', 'pasien berhasi di tambahkan');
    }

    public function obatkategori()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "kategori obat";
        $data = obatk::all();
        return view('obat.kategori', compact('title', 'data'));

    }

    public function obatkategoriadd(Request $request)
    {
        $data = $request->validate([
            "nama" => 'required',
            "deskripsi" => 'required',
        ]);

        obatk::create($data);
        return redirect()->route('obat.kategori')->with('success', 'dokter berhasi di tambahkan');
    }

}
