<?php

namespace App\Http\Controllers\modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setweb;
use App\Models\doctor;
use App\Models\poli;


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
        $poli = poli::all();
        return view('regis.rajal', compact('title','dokter','poli'));

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
