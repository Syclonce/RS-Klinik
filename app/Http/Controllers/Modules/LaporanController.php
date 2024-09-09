<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\setweb;
use App\Models\pasien;
use App\Models\doctor;
use App\Models\laptemplate;
use App\Models\laptes;


class LaporanController extends Controller
{
    public function index()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Laporan Lab";
        $pasien = pasien::all();
        $doctor = doctor::all();
        $template = laptemplate::all();
        $lap = laptes::with(['pasien','doctor','laptemplate'])->get();
        return view('laporan.index', compact('title','pasien','doctor','template','lap'));
    }

    public function laporanadd(Request $request)
    {
        $data = $request->validate([
            "tanggal" => 'required',
            "pasien" => 'required',
            "dokter" => 'required',
            "template" => 'required',
            "laporan" => 'required',
            "status" => 'required',
        ]);

        $lap = new laptes();
        $lap->tanggal = $data['tanggal'];
        $lap->pasien_id = $data['pasien'];
        $lap->doctor_id = $data['dokter'];
        $lap->laptemplate_id = $data['template'];
        $lap->status = $data['status'];
        $lap->save();

        return redirect()->route('laporan')->with('success', 'dokter berhasi di tambahkan');
    }

    public function laporantemplate()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Laporan Lab Template";
        $data = laptemplate::all();
        return view('laporan.template', compact('title','data'));
    }

    public function laporantemplateadd(Request $request)
    {
        $data = $request->validate([
            "nama" => 'required',
            "template" => 'required',
        ]);
        laptemplate::create($data);
        return redirect()->route('laporan.template')->with('success', 'dokter berhasi di tambahkan');
    }

    public function getTemplateById($id)
    {
        // Cari template berdasarkan ID yang dikirim dari route
        $template = laptemplate::find($id);

        // Cek apakah template ditemukan
        if ($template) {
            return response()->json([
                'success' => true,
                'template' => $template->template // Mengirimkan data template
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Template tidak ditemukan.'
            ]);
        }
    }
}
