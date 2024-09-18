<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\doctor;
use App\Models\pasien;
use App\Models\seks;
use App\Models\goldar;
use App\Models\setweb;
use App\Models\User;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Desa;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    public function index()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Patient";
        $docter =  doctor::all();
        $seks = seks::all();
        $goldar = goldar::all();
        $provinsi = Provinsi::all();
        $pasien = pasien::with(['user','doctor','goldar'])->get();
        return view('patient.index', compact('title','docter','seks','goldar','pasien','provinsi'));
    }

    public function generate()
    {
        $lastNoRM = Pasien::orderBy('no_rm', 'DESC')->first();

        if ($lastNoRM) {
            $newNoRM = str_pad($lastNoRM->id + 1, 6, '0', STR_PAD_LEFT);
        } else {
            $newNoRM = '000001'; // First Nomor RM if no record exists
        }

        return response()->json(['nomor_rm' => $newNoRM]);
    }

    public function patientadd(Request $request)
    {
        $data = $request->validate([
            "nama" => 'required|string|max:255',
            "Alamat" => 'required|string|max:255',
            "telepon" => 'required|string|regex:/^\(\d{2}\) \d{3}-\d{3}-\d{4}$/',
            "tgl" => 'required',
            "dokter" => 'required',
            "seks" => 'required',
            "goldar" => 'required',
        ]);

        $datauser = $request->validate([
            "nama" => 'required|string|max:255',
            "username" => 'required|string|max:255',
            "email" => 'required|string|max:255',
            "password" => 'required',
        ]);

        $user = new User();
        $user->name = $datauser['nama'];
        $user->username = $datauser['username'];
        $user->email = $datauser['email'];
        $user->password = Hash::make($datauser['password']); // Hash the password
        $user->profile = 'default.jpg';
        $user->save();
        $user->assignRole('User');

        $pasien = new pasien();
        $pasien->nama = $data['nama'];
        $pasien->Alamat = $data['Alamat'];
        $pasien->telepon = $data['telepon'];
        $pasien->tgl = $data['tgl'];
        $pasien->doctor_id = $data['dokter'];
        $pasien->seks = $data['seks'];
        $pasien->goldar_id = $data['goldar'];
        $pasien->user_id = $user->id;
        $pasien->save();

        return redirect()->route('patient')->with('success', 'pasien berhasi di tambahkan');
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

    public function getKabupaten(Request $request)
    {
        $kodeProvinsi = $request->kode_provinsi;
        $kabupaten = Kabupaten::where('kode_provinsi', $kodeProvinsi)->get();

        return response()->json($kabupaten); // Return as JSON response
    }

    public function getKecamatan(Request $request)
    {
        $kodeKabupaten = $request->kode_kabupaten;
        $kecamatan = Kecamatan::where('kode_kabupaten', $kodeKabupaten)->get();

        return response()->json($kecamatan); // Return kecamatan as JSON
    }

    public function getDesa(Request $request)
    {
        $kodeKecamatan = $request->kode_kecamatan;
        $desa = Desa::where('kode_kecamatan', $kodeKecamatan)->get();

        return response()->json($desa); // Return desa as JSON
    }
}
