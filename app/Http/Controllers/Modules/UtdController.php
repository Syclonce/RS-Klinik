<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\setweb;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Provinsi;
use App\Models\seks;
use App\Models\goldar;
use App\Models\datapendor;

class UtdController extends Controller
{
    public function index()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Unit Tambah Darah";
        $provinsi = Provinsi::all();
        $seks = seks::all();
        $goldar = goldar::all();
        $datapendor = datapendor::with(['provinsi','kabupaten','kecamatan','desa','goldar','seks'])->get();
        return view('utd.index', compact('title','provinsi','seks','goldar','datapendor'));
    }

    public function utdadd(Request $request)
    {
        $data = $request->validate([
            "no_pendonor" => 'required',
            "nama" => 'required',
            "ktp" => 'required',
            "telepon" => 'required|string|regex:/^\(\d{2}\) \d{3}-\d{3}-\d{3}$/',
            "tempat_lahir" => 'required',
            "tanggal_lahir" => 'required',
            "seks" => 'required',
            "goldar" => 'required',
            "resus" => 'required',
            "Alamat" => 'required',
            "provinsi" => 'required',
            "kota_kabupaten" => 'required',
            "kecamatan" => 'required',
            "desa" => 'required',
        ]);

        $datapendor = new datapendor();
        $datapendor->no_pendonor = $data['no_pendonor'];
        $datapendor->nama = $data['nama'];
        $datapendor->no_ktp = $data['ktp'];
        $datapendor->telepon = $data['telepon'];
        $datapendor->tmp_lahir = $data['tempat_lahir'];
        $datapendor->tgl_lahir = $data['tanggal_lahir'];
        $datapendor->seks_id = $data['seks'];
        $datapendor->goldar_id = $data['goldar'];
        $datapendor->resus = $data['resus'];
        $datapendor->alamat = $data['Alamat'];
        $datapendor->provinsi_kode = $data['provinsi'];
        $datapendor->kabupaten_kode = $data['kota_kabupaten'];
        $datapendor->kecamatan_kode = $data['kecamatan'];
        $datapendor->desa_kode = $data['desa'];
        $datapendor->save();

        return redirect()->route('utd')->with('Success', 'Data Pendonor berhasi di tambahkan');
    }

    public function generateNoPendonor(Request $request)
    {
        // Mendapatkan tanggal saat ini
        $today = now()->format('Y-m-d');

        // Mendapatkan data terakhir untuk nomor pendonor
        $latestPendonor = Datapendor::latest()->first();

        // Cek jika hari ini sudah berbeda dengan yang terakhir disimpan
        if ($latestPendonor && $latestPendonor->created_at->format('Y-m-d') === $today) {
            // Ambil nomor pendonor terakhir dan tambah satu
            $lastNumber = (int) substr($latestPendonor->no_pendonor, 3); // Ambil bagian angka dari 'UTD000001'
            $newNumber = $lastNumber + 1; // Tambah satu
        } else {
            // Jika hari sudah berbeda atau belum ada data, mulai dari 1
            $newNumber = 1;
        }

        // Buat nomor pendonor baru dengan format UTD000001
        $noPendonor = 'UTD' . str_pad($newNumber, 6, '0', STR_PAD_LEFT);

        return response()->json(['no_pendonor' => $noPendonor]);
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

    public function datadonor()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Unit Tambah Darah";
        return view('utd.datadonor', compact('title'));
    }

    public function stokdarah()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Unit Tambah Darah";
        return view('utd.stokdarah', compact('title'));
    }

    // public function laboratoriumadd(Request $request)
    // {
    //     $data = $request->validate([
    //         "tgl_kunjungan" => 'required',
    //         "tgl_lahir" => 'required',
    //         "time" => 'required',
    //         "dokter" => 'required',
    //         "penjamin" => 'required',
    //         "no_reg" => 'required',
    //         "no_rawat" => 'required',
    //         "no_rm" => 'required',
    //         "nama_pasien" => 'required',
    //         "seks" => 'required',
    //         "alamat" => 'required',
    //         "telepon" => 'required',
    //     ]);

    //     $lab = new labdata();
    //     $lab->tanggal_lahir = $data['tgl_lahir'];
    //     $lab->time = $data['time'];
    //     $lab->doctor_id = $data['dokter'];
    //     $lab->penjab_id = $data['penjamin'];
    //     $lab->no_reg = $data['no_reg'];
    //     $lab->no_rawat = $data['no_rawat'];
    //     $lab->no_rm = $data['no_rm'];
    //     $lab->nama_pasien = $data['nama_pasien'];
    //     $lab->seks = $data['seks'];
    //     $lab->alamat = $data['alamat'];
    //     $lab->telepon = $data['telepon'];
    //     $lab->tgl_kunjungan = $data['tgl_kunjungan'];

    //     $lab->save();

    //     return redirect()->route('laboratorium')->with('Success', 'Data Laboratorium berhasi di tambahkan');
    // }



}
