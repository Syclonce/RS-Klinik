<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\setweb;
use App\Models\kadok;
use App\Models\kopol;
use App\Models\kopoltl;
use App\Models\icd10;
use App\Models\icd9;
use App\Models\kesadaran;
use App\Models\khusus;
use App\Models\obtadpho;
use App\Models\provider;
use App\Models\sarana;
use App\Models\spesiali;
use App\Models\subspesialis;

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
        $icd10_bpjs = icd10::all();
        return view('pcare.icd10', compact('title','icd10_bpjs'));
    }

    public function icd9()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "P-Care ICD 9";
        $icd9 = icd9::all();
        return view('pcare.icd9', compact('title','icd9'));
    }

    public function kesadaran()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "P-Care Kesadaran";
        $kesadaran = kesadaran::all();
        return view('pcare.kesadaran', compact('title','kesadaran'));
    }

    public function obats()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "P-Care Obat";
        $obth  = obtadpho::all();
        return view('pcare.obtsh', compact('title','obth'));
    }

    public function provider()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "P-Care Provider";
        $provid  = provider::all();
        return view('pcare.provide', compact('title','provid'));
    }

    public function spesialis()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "P-Care Spesialis";
        $spesialis  = spesiali::all();
        return view('pcare.spesialis', compact('title','spesialis'));
    }
    
    public function subspesialis($kode)
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "P-Care Spesialis";        
        $spesialis  = subspesialis::where('kode_spesialis', $kode)->get();
        $menus = $spesialis->isNotEmpty() ? 'Refrensi Sub Spesialis - ' . $spesialis->first()->nama : 'Refrensi Sub Spesialis';
        return view('pcare.subspesialis', compact('title','spesialis','menus'));
    }
    
    public function sarana()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "P-Care Spesialis";
        $sarana  = sarana::all();
        return view('pcare.sarana', compact('title','sarana'));
    }

    public function khusus()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "P-Care Spesialis";
        $khusus  = khusus::all();
        return view('pcare.khusu', compact('title','khusus'));
    }

}
