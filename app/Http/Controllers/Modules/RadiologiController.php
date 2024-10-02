<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\setweb;
use App\Models\doctor;
use App\Models\penjab;
use App\Models\pasien;
use App\Models\radiologi;

class RadiologiController extends Controller
{
    public function index()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Radiologi";
        $dokter = doctor::all();
        $penjab = penjab::all();
        return view('radiologi.index', compact('title','dokter','penjab'));
    }

    public function radiologiadd(Request $request)
    {
        $data = $request->validate([
            "tanggal_lahir" => 'required',
            "time" => 'required',
            "nama" => 'required',
            "dokter" => 'required',
            "penjamin" => 'required',
            "no_reg" => 'required',
            "no_rawat" => 'required',
        ]);

        $rad = new radiologi();
        $rad->kode = $data['kode_barang'];
        $rad->nama = $data['nama_barang'];
        $rad->save();

        return redirect()->route('radiologi')->with('Success', 'Data Radiologi berhasi di tambahkan');
    }

    public function searchPasien(Request $request)
    {
        // Ambil parameter nama dari request
        $nama = $request->input('nama');

        // Cari pasien berdasarkan nama (case insensitive)
        $pasiens = pasien::where('nama', 'LIKE', '%' . $nama . '%')->get();

        // Kembalikan hasil dalam format JSON
        return response()->json($pasiens);
    }

    public function generateNoReg()
    {
        // Mendapatkan tanggal hari ini
        $today = date('Y-m-d');

        // Mencari data registrasi terakhir yang dibuat hari ini
        $lastReg = radiologi::whereDate('created_at', $today)->orderBy('no_reg', 'desc')->first();

        if ($lastReg) {
            // Jika ada registrasi pada hari ini, tambahkan 1
            $lastNoReg = intval($lastReg->no_reg);
            $newNoReg = str_pad($lastNoReg + 1, 3, '0', STR_PAD_LEFT);
        } else {
            // Jika tidak ada, mulai dari 001
            $newNoReg = '001';
        }

        // Mengirim nomor registrasi baru ke frontend
        return response()->json(['no_reg' => $newNoReg]);
    }

    public function generateNoRawat()
    {
        // Mendapatkan tanggal hari ini dengan format yyyy/mm/dd
        $today = date('Y/m/d');

        // Mendapatkan nomor registrasi terbaru (anggap no_reg sudah diinput sebelumnya)
        $lastRajal = radiologi::orderBy('no_reg', 'desc')->first();

        if ($lastRajal) {
            // Ambil nomor registrasi terakhir
            $noReg = $lastRajal->no_reg;
        } else {
            // Jika belum ada no_reg, mulai dari 001
            $noReg = '001';
        }

        // Buat format nomor rawat baru: yyyy/mm/dd/no_reg
        $noRawat = $today . '/' . $noReg;

        // Return response sebagai JSON
        return response()->json(['no_rawat' => $noRawat]);
    }



}
