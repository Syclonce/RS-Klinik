<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\setweb;
use App\Models\kadok;
use App\Models\kopol;
use App\Models\kopoltl;
use App\Models\icd10;
use App\Models\icd10_bpjs;
use App\Models\icd10_ss;
use App\Models\icd9;

class PCareController extends Controller
{
    public function dokter()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "P-Care Doktor";
        $kadok = kadok::all();
        return view('pcare.doktor', compact('title','kadok'));
    }
    
    public function polifktp()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "P-Care Poli FKTP";
        $kopol = kopol::all();
        return view('pcare.polifktp', compact('title','kopol'));
    }

    public function polifktl()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "P-Care Poli FKTL";
        $kopoltl = kopoltl::all();
        return view('pcare.polifktl', compact('title','kopoltl'));
    }
    
    public function icd10()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "P-Care ICD 10";
        $icd10_bpjs = icd10_bpjs::all();
        return view('pcare.icd10', compact('title','icd10_bpjs'));
    }
    
    public function icd9()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "P-Care ICD 9";
        $icd9 = icd9::all();
        return view('pcare.icd9', compact('title','icd9'));
    }

}
