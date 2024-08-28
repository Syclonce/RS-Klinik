<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\doctor;
use App\Models\seks;
use App\Models\goldar;
use App\Models\setweb;

class PatientController extends Controller
{
    public function index()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Patient";
        $docter =  doctor::all();
        $seks = seks::all();
        $goldar = goldar::all();
        return view('patient.index', compact('title','docter','seks','goldar'));
    }

    public function seks()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Patient";
        $seks = seks::all();
        return view('patient.seks', compact('title','seks'));
    }

    public function seksadd(Request $request)
    {
        $data = $request->validate([
            "nama" => 'required|string|max:255',
            "kode" => 'required|unique:seks,kode',
        ]);

        seks::create($data);

        return redirect()->route('patient.seks')->with('success', 'data seks berhasi di tambahkan');
    }

    public function goldar()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Patient";
        $goldar = goldar::all();
        return view('patient.goldar', compact('title','goldar'));
    }

    public function goldaradd(Request $request)
    {
        $data = $request->validate([
            "nama" => 'required|unique:goldars,nama',
        ]);

        goldar::create($data);

        return redirect()->route('patient.goldar')->with('success', 'data golongan darah berhasil di tambahkan');
    }
}
