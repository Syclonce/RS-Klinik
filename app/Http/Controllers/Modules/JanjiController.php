<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Models\setweb;
use App\Models\doctor;
use App\Models\pasien;
use App\Models\liburan;
use App\Http\Controllers\Controller;
use App\Models\doctor_visit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class JanjiController extends Controller
{
    public function index()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Janji";
        $data_pasien = pasien::all();
        $data_dokter = doctor::all();
        // $data_dokter_visit = doctor_visit
        return view('janji.index', compact('title','data_pasien','data_dokter'));
    }
    public function getVisitDescriptions($id)
    {
        Log::info("getVisitDescriptions called with id: " . $id);
        $descriptions = DB::table('doctor_visits')
                      ->where('doctor_id', $id)
                      ->get();


    // Return data in the expected format
    return response()->json([
        'descriptions' => $descriptions, // Should be an array of objects
    ]);
    }

}
