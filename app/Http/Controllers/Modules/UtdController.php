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
use App\Models\datadonor;
use App\Models\komda;
use App\Models\doctor;
use App\Models\stokda;

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
        $pendonor = datapendor::all();
        $dokter = doctor::all();
        $datadonor = datadonor::with(['datapendor','doctor_raftap','doctor_saring'])->get();
        return view('utd.datadonor', compact('title','pendonor','dokter','datadonor'));
    }

    public function datadonoradd(Request $request)
    {
        $data = $request->validate([
            "no_donor" => 'required',
            "nama_pendonor" => 'required',
            "tensi" => 'required',
            "hbsag" => 'required',
            "tgl" => 'required',
            "dinas" => 'required',
            "hcv" => 'required',
            "hiv" => 'required',
            "no_bag" => 'required',
            "jenis_bag" => 'required',
            "jenis_donor" => 'required',
            "sipilis" => 'required',
            "malaria" => 'required',
            "tempat" => 'required',
            "petugas_aftap" => 'required',
            "petugas_saring" => 'required',
            "status" => 'required',
        ]);

        $datdor = new datadonor();
        $datdor->no_donor = $data['no_donor'];
        $datdor->nama = $data['nama_pendonor'];
        $datdor->tensi = $data['tensi'];
        $datdor->hbsag = $data['hbsag'];
        $datdor->tgl_donor = $data['tgl'];
        $datdor->dinas = $data['dinas'];
        $datdor->hcv = $data['hcv'];
        $datdor->hiv = $data['hiv'];
        $datdor->no_bag = $data['no_bag'];
        $datdor->jenis_bag = $data['jenis_bag'];
        $datdor->jenis_donor = $data['jenis_donor'];
        $datdor->sipilis = $data['sipilis'];
        $datdor->malaria = $data['malaria'];
        $datdor->tempat = $data['tempat'];
        $datdor->petugas_raftap = $data['petugas_aftap'];
        $datdor->petugas_saring = $data['petugas_saring'];
        $datdor->status = $data['status'];
        $datdor->save();

        return redirect()->route('utd.datadonor')->with('Success', 'Data Donor berhasi di tambahkan');
    }

    public function stokdarah()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Unit Tambah Darah";
        $goldar = goldar::all();
        $komda = komda::all();
        $stokda = stokda::with(['goldar','komda'])->get();
        return view('utd.stokdarah', compact('title','goldar','komda','stokda'));
    }

    public function stokdarahadd(Request $request)
    {
        $data = $request->validate([
            "no_kantong" => 'required',
            "kode" => 'required',
            "goldar" => 'required',
            "resus" => 'required',
            "tgl_aftap" => 'required',
            "tgl_kadaluarsa" => 'required',
            "asal_darah" => 'required',
            "status" => 'required',
        ]);

        $stokda = new stokda();
        $stokda->no_kantong = $data['no_kantong'];
        $stokda->kode = $data['kode'];
        $stokda->goldar_id = $data['goldar'];
        $stokda->resus = $data['resus'];
        $stokda->tgl_aftap = $data['tgl_aftap'];
        $stokda->tgl_kadaluarsa = $data['tgl_kadaluarsa'];
        $stokda->asal_darah = $data['asal_darah'];
        $stokda->status = $data['status'];
        $stokda->save();

        return redirect()->route('utd.stokdarah')->with('Success', 'Data Stok Darah berhasi di tambahkan');
    }

    public function komponendarah()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Komponen Darah";
        $komda = komda::all();
        return view('utd.komponendarah', compact('title','komda'));
    }

    public function komponendarahadd(Request $request)
    {
        $data = $request->validate([
            "kode" => 'required',
            "nama" => 'required',
            "lama" => 'required',
            "jasa" => 'required',
            "bhp" => 'required',
            "kso" => 'required',
            "manajemen" => 'required',
            "total" => 'required',
            "batal" => 'required',
        ]);
        komda::create($data);
        return redirect()->route('utd.komponendarah')->with('Success', 'Data Komponen Darah berhasi di tambahkan');
    }
}
