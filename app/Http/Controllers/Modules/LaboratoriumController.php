<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\setweb;
use App\Models\doctor;
use App\Models\pasien;
use App\Models\penjab;
use App\Models\labdata;

class LaboratoriumController extends Controller
{
    public function index()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Laboratorium";
        $dokter = doctor::all();
        $penjab = penjab::all();
        $lab = labdata::with(['pasien','doctor','penjab'])->get();
        return view('lab.index', compact('title','dokter','penjab','lab'));
    }

    public function laboratoriumadd(Request $request)
    {
        $data = $request->validate([
            "tgl_kunjungan" => 'required',
            "tgl_lahir" => 'required',
            "time" => 'required',
            "dokter" => 'required',
            "penjamin" => 'required',
            "no_reg" => 'required',
            "no_rawat" => 'required',
            "no_rm" => 'required',
            "nama_pasien" => 'required',
            "seks" => 'required',
            "alamat" => 'required',
            "telepon" => 'required',
        ]);

        $lab = new labdata();
        $lab->tanggal_lahir = $data['tgl_lahir'];
        $lab->time = $data['time'];
        $lab->doctor_id = $data['dokter'];
        $lab->penjab_id = $data['penjamin'];
        $lab->no_reg = $data['no_reg'];
        $lab->no_rawat = $data['no_rawat'];
        $lab->no_rm = $data['no_rm'];
        $lab->nama_pasien = $data['nama_pasien'];
        $lab->seks = $data['seks'];
        $lab->alamat = $data['alamat'];
        $lab->telepon = $data['telepon'];
        $lab->tgl_kunjungan = $data['tgl_kunjungan'];

        $lab->save();

        return redirect()->route('laboratorium')->with('Success', 'Data Laboratorium berhasi di tambahkan');
    }

    public function searchPasienLab(Request $request)
    {
        // Ambil parameter nama dari request
        $nama = $request->input('nama');

        // Cari pasien berdasarkan nama (case insensitive)
        $pasiens = pasien::where('nama', 'LIKE', '%' . $nama . '%')->get();

        // Kembalikan hasil dalam format JSON
        return response()->json($pasiens);
    }

    public function generateNoRegLab()
    {
        // Mendapatkan tanggal hari ini
        $today = date('Y-m-d');

        // Mencari data registrasi terakhir yang dibuat hari ini
        $lastReg = labdata::whereDate('created_at', $today)->orderBy('no_reg', 'desc')->first();

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

    public function generateNoRawatLab()
    {
        // Memanggil fungsi generateNoRegLab() dan menangkap respons JSON
        $noRegResponse = $this->generateNoRegLab();

        // Mengambil no_reg dari respons JSON
        $noRegArray = json_decode($noRegResponse->getContent(), true);
        $noReg = $noRegArray['no_reg'];

        // Mendapatkan tanggal hari ini dengan format yyyy/mm/dd
        $today = date('Y/m/d');

        // Buat format nomor rawat baru: yyyy/mm/dd/no_reg
        $noRawat = $today . '/' . $noReg;

        // Return response sebagai JSON
        return response()->json(['no_rawat' => $noRawat]);
    }


}
