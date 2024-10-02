<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\doctor;
use App\Models\pasien;
use App\Models\seks;
use App\Models\goldar;
use App\Models\suku;
use App\Models\bangsa;
use App\Models\bahasa;
use App\Models\penjamin;
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
        $goldar = goldar::all();
        $provinsi = Provinsi::all();
        $pasien = pasien::with(['goldar'])->get();
        $sex = seks::all();
        return view('patient.index', compact('title','goldar','pasien','provinsi','sex'));
    }


    public function checkSex(Request $request)
    {
        // Dapatkan kode sex dari input
        $inputSexCode = $request->input('sex_code');

        // Cari kode sex di database
        $sex = Seks::where('kode', $inputSexCode)->first();

        if ($sex) {
            // Jika ditemukan, kembalikan deskripsi sex
            return response()->json(['description' => $sex->nama], 200);
        } else {
            // Jika tidak ditemukan
            return response()->json(['message' => 'Sex tidak ditemukan'], 404);
        }
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
            "nomor_rm" => 'required',
            "nik" => 'required',
            "kode_ihs" => 'required',
            "nama" => 'required',
            "tempat_lahir" => 'required',
            "tanggal_lahir" => 'required|date_format:d/m/Y',
            "no_bpjs" => 'required',
            "tgl_akhir" => 'required',
            "Alamat" => 'required|string|max:255',
            "rt" => 'required',
            "rw" => 'required',
            "kode_pos" => 'required',
            "kewarganegaraan" => 'required',
            "provinsi" => 'required',
            "kota_kabupaten" => 'required',
            "kecamatan" => 'required',
            "desa" => 'required',
            "seks" => 'required',
            "agama" => 'required',
            "pendidikan" => 'required',
            "goldar" => 'required',
            "pernikahan" => 'required',
            "pekerjaan" => 'required',
            "telepon" => 'required|string|regex:/^\(\d{2}\) \d{3}-\d{3}-\d{3}$/',
        ]);

        $datauser = $request->validate([
            "nama" => 'required',
            "username" => 'required|string|max:255',
            "email" => 'required|string|max:255',
            "password" => 'required',
            "telepon" => 'required',
        ]);

        $user = new User();
        $user->name = $datauser['nama'];
        $user->username = $datauser['username'];
        $user->email = $datauser['email'];
        $user->password = Hash::make($datauser['password']); // Hash the password
        $user->profile = 'default.jpg';
        $user->phone = $datauser['telepon'];
        $user->save();
        $user->assignRole('User');

        $pasien = new pasien();
        $pasien->no_rm = $data['nomor_rm'];
        $pasien->nik = $data['nik'];
        $pasien->kode_ihs = $data['kode_ihs'];
        $pasien->nama = $data['nama'];
        $pasien->tempat_lahir = $data['tempat_lahir'];
        $pasien->tanggal_lahir = $data['tanggal_lahir'];
        $pasien->no_bpjs = $data['no_bpjs'];
        $pasien->tgl_akhir = $data['tgl_akhir'];
        $pasien->Alamat = $data['Alamat'];
        $pasien->rt = $data['rt'];
        $pasien->rw = $data['rw'];
        $pasien->kode_pos = $data['kode_pos'];
        $pasien->kewarganegaraan = $data['kewarganegaraan'];
        $pasien->provinsi_kode = $data['provinsi'];
        $pasien->kabupaten_kode = $data['kota_kabupaten'];
        $pasien->kecamatan_kode = $data['kecamatan'];
        $pasien->desa_kode = $data['desa'];
        $pasien->seks = $data['seks'];
        $pasien->agama = $data['agama'];
        $pasien->pendidikan = $data['pendidikan'];
        $pasien->goldar_id = $data['goldar'];
        $pasien->pernikahan = $data['pernikahan'];
        $pasien->pekerjaan = $data['pekerjaan'];
        $pasien->telepon = $data['telepon'];
        $pasien->save();

        return redirect()->route('patient')->with('Success', 'Pasien berhasi di tambahkan');
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

        return redirect()->route('patient.seks')->with('Success', 'Data seks berhasi di tambahkan');
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

        return redirect()->route('patient.goldar')->with('Success', 'Data golongan darah berhasil di tambahkan');
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

    public function suku()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Tambah Suku";
        $suku = suku::all();
        return view('patient.suku', compact('title','suku'));
    }

    public function sukuadd(Request $request)
    {
        $data = $request->validate([
            "nama_suku" => 'required',
        ]);

        suku::create($data);

        return redirect()->route('patient.suku')->with('Success', 'Suku berhasil di tambahkan');
    }

    public function bangsa()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Tambah Bangsa";
        $bangsa = bangsa::all();
        return view('patient.bangsa', compact('title','bangsa'));
    }

    public function bangsaadd(Request $request)
    {
        $data = $request->validate([
            "nama_bangsa" => 'required',
        ]);

        bangsa::create($data);

        return redirect()->route('patient.bangsa')->with('Success', 'Bangsa berhasil di tambahkan');
    }

    public function bahasa()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Tambah Bahasa";
        $bahasa = bahasa::all();
        return view('patient.bahasa', compact('title','bahasa'));
    }

    public function bahasaadd(Request $request)
    {
        $data = $request->validate([
            "bahasa" => 'required',
        ]);

        bahasa::create($data);

        return redirect()->route('patient.bahasa')->with('Success', 'Bahasa berhasil di tambahkan');
    }

    public function penjamin()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Tambah Penjamin";
        $data = penjamin::all();
        return view('patient.penjamin', compact('title','data'));
    }

    public function penjaminadd(Request $request)
    {
        $data = $request->validate([
            "jenis" => 'required',
            "nomor_penjamin" => 'required',
            "nama_penjamin" => 'required',
            "verifikasi" => 'required',
            "filter" => 'required',
            "tgl_awal" => 'required',
            "tgl_akhir" => 'required',
            "Alamat" => 'required',
            "telepon" => 'required',
            "fakes" => 'required',
            "cp" => 'required',
            "telp_cp" => 'required',
            "hp_cp" => 'required',
            "jabatan_cp" => 'required',
            "akun_bank" => 'required',
            "cabang_bank" => 'required',
            "no_rek" => 'required',
        ]);

        $jamin = new penjamin();
        $jamin->jenis = $data['jenis'];
        $jamin->nomor = $data['nomor_penjamin'];
        $jamin->nama = $data['nama_penjamin'];
        $jamin->verifikasi = $data['verifikasi'];
        $jamin->filter = $data['filter'];
        $jamin->awal = $data['tgl_awal'];
        $jamin->akhir = $data['tgl_akhir'];
        $jamin->alamat = $data['Alamat'];
        $jamin->telepon = $data['telepon'];
        $jamin->fakes = $data['fakes'];
        $jamin->contact = $data['cp'];
        $jamin->telp = $data['telp_cp'];
        $jamin->hp = $data['hp_cp'];
        $jamin->jabatan = $data['jabatan_cp'];
        $jamin->akun = $data['akun_bank'];
        $jamin->cabang = $data['cabang_bank'];
        $jamin->rek = $data['no_rek'];
        $jamin->save();

        return redirect()->route('patient.penjamin')->with('success', 'bahasa berhasil di tambahkan');
    }
}
