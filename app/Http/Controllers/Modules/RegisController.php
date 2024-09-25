<?php

namespace App\Http\Controllers\modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setweb;
use App\Models\doctor;
use App\Models\pasien;
use App\Models\poli;
use App\Models\rajal;


class RegisController extends Controller
{
    public function index()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "obat";
        return view('regis.index', compact('title'));

    }

    public function rajal()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "rajal";
        $dokter = doctor::all();
        $data = rajal::all();
        $pasien = pasien::all();
        $poli = poli::all();
        return view('regis.rajal', compact('title','dokter','pasien','poli','data'));

    }

    public function show($no_rm)
    {
        // Cari pasien berdasarkan No RM
        $pasien = pasien::where('no_rm', $no_rm)->first();

        // Jika pasien ditemukan, return sebagai JSON
        if ($pasien) {
            return response()->json($pasien);
        } else {
            return response()->json(['message' => 'Data pasien tidak ditemukan'], 404);
        }
    }

    public function rajaladd(Request $request)
    {
        $data = $request->validate([
            "no_rm" => 'required',
            "nama" => 'required',
            "sex" => 'required',
            "ktp" => 'required',
            "satusehat" => 'required',
            "tanggal_lahir" => 'required',
            "umur" => 'required',
            "alamat" => 'required',
            "tglpol" => 'required',
            "poli" => 'required',
            "dokter" => 'required',
            "id_dokter" => 'required',
            "pembayaran" => 'required',
            "nomber" => 'required',
        ]);
        rajal::create($data);
        return redirect()->route('rajal')->with('success', 'rajal berhasi di tambahkan');
    }


    public function ranap()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "ranap";
        $poli = poli::all();
        $dokter = doctor::all();
        return view('regis.rawatinap', compact('title','poli','dokter'));

    }
}
