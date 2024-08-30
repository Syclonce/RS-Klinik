<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Models\setweb;
use App\Models\doctor;
use App\Models\pasien;
use App\Models\liburan;
use App\Http\Controllers\Controller;

class JanjiController extends Controller
{
    public function index()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Janji";
        $data_pasien = pasien::all();
        $data_dokter = doctor::all();
        return view('janji.index', compact('title','data_pasien','data_pasien'));
    }

}
