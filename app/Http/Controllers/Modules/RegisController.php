<?php

namespace App\Http\Controllers\modules;

use App\Http\Controllers\Controller;
use App\Models\bangsal;
use Illuminate\Http\Request;
use App\Models\setweb;
use App\Models\doctor;
use App\Models\pasien;
use App\Models\penjab;
use App\Models\poli;
use App\Models\rujukan;
use App\Models\rajal;
use App\Models\ranap;



class RegisController extends Controller
{
    public function index()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "obat";
        return view('regis.index', compact('title'));

    }

    public function rajal()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "rajal";
        $dokter = doctor::all();
        $data = rajal::all();
        $pasien = pasien::all();
        $poli = poli::all();
        return view('regis.rajal', compact('title','dokter','pasien','poli','data'));

    }

    public function getDokterByPoli($poliId)
    {
        // Ambil data dokter berdasarkan poli_id
        $dokter = doctor::where('poli_id', $poliId)->get();

        // Return response JSON
        return response()->json($dokter);
    }

    public function getKodeDokter($dokterId)
    {
        // Ambil data dokter berdasarkan ID
        $dokter = doctor::find($dokterId);

        // Return response JSON
        return response()->json([
            'kode' => $dokter->kode
        ]);
    }

    public function show($no_rm)
    {
        // Cari pasien berdasarkan No RM
        $pasien = pasien::where('no_rm', $no_rm)->first();

        // Jika pasien ditemukan, return sebagai JSON
        if ($pasien) {
            return response()->json($pasien);
        } else {
            return response()->json(['message' => 'Data pasien tidak ditemukan'], 404);
        }
    }

    public function rajaladd(Request $request)
    {
        $data = $request->validate([
            "no_rm" => 'required',
            "nama" => 'required',
            "sex" => 'required',
            "ktp" => 'required',
            "satusehat" => 'required',
            "tanggal_lahir" => 'required',
            "umur" => 'required',
            "alamat" => 'required',
            "tglpol" => 'required',
            "poli" => 'required',
            "dokter" => 'required',
            "id_dokter" => 'required',
            "pembayaran" => 'required',
            "nomber" => 'required',
        ]);
        rajal::create($data);
        return redirect()->route('rajal')->with('success', 'rajal berhasi di tambahkan');
    }


    public function ranap()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "ranap";
        $poli = poli::all();
        $dokter = doctor::all();
        $bangsal = bangsal::all();
        $penjamin = penjab::all();
        $rujukan = rujukan::all();
        $ranap = ranap::with(['pasien','poli','penjab','rujukan','bangsal','doctor','docrim'])->get();
        return view('regis.rawatinap', compact('title','poli','dokter','bangsal','penjamin','rujukan','ranap'));

    }

    public function ranapadd(Request $request)
    {
        $data = $request->validate([
            "asal_poli" => 'nullable',
            "dokter_pengirim" => 'nullable',
            "dokter_pengirim_luar" => 'nullable',
            "nama_rumah_sakit" => 'nullable',
            "tanggal_rawat" => 'nullable',
            "r_perawatan" => 'nullable',
            "dokter_dpjb" => 'nullable',
            "no_reg" => 'required',
            "no_rm" => 'required',
            "nama_pasien" => 'required',
            "nama_penanggung" => 'required',
            "alamat" => 'required',
            "telepon" => 'required',
            "asal_rujukan" => 'required',
            "hub_pasien" => 'required',
            "nama_keluarga" => 'required',
            "alamat_penjamin" => 'required',
            "jenis_kartu" => 'required',
            "no_kartu" => 'required',
        ]);

        $ranap = new ranap();
        $ranap->poli_id = $data['asal_poli'] ?? null;;
        $ranap->dokter_pengirim = $data['dokter_pengirim'] ?? null;;
        $ranap->dokter_pengirim_luar = $data['dokter_pengirim_luar'] ?? null;;
        $ranap->rujukan_id = $data['nama_rumah_sakit'] ?? null;;
        $ranap->tanggal_rawat = $data['tanggal_rawat'] ?? null;;
        $ranap->bangsal_id = $data['r_perawatan'] ?? null;;
        $ranap->doctor_id = $data['dokter_dpjb'] ?? null;;
        $ranap->no_reg = $data['no_reg'];
        $ranap->pasien_id = $data['no_rm'];
        $ranap->nama_pasien = $data['nama_pasien'];
        $ranap->penjab_id = $data['nama_penanggung'];
        $ranap->alamat = $data['alamat'];
        $ranap->telepon = $data['telepon'];
        $ranap->asal_rujukan = $data['asal_rujukan'];
        $ranap->hub_pasien = $data['hub_pasien'];
        $ranap->nama_keluarga = $data['nama_keluarga'];
        $ranap->alamat_keluarga = $data['alamat_penjamin'];
        $ranap->jenis_kartu = $data['jenis_kartu'];
        $ranap->no_kartu = $data['no_kartu'];

        $ranap->save();

        return redirect()->route('regis.ranap')->with('Success', 'Data Rawat Inap berhasi di tambahkan');
    }

    public function generateNoRegRanap()
    {
        // Mendapatkan tanggal hari ini dalam format 'Y-m-d'
        $today = date('Y-m-d');

        // Ambil nomor registrasi terakhir yang dibuat hari ini
        $lastRecord = ranap::whereDate('created_at', $today)
                        ->orderBy('no_reg', 'desc')
                        ->first();

        // Jika tidak ada nomor registrasi hari ini, mulai dari 001
        if (!$lastRecord) {
            $newNoReg = '001';
        } else {
            // Ambil angka terakhir dan tambahkan 1
            $lastNoReg = intval($lastRecord->no_reg);
            $newNoReg = str_pad($lastNoReg + 1, 3, '0', STR_PAD_LEFT);
        }

        // Kembalikan response sebagai JSON
        return response()->json(['no_reg' => $newNoReg]);
    }


    public function cariNoRM(Request $request)
    {
        // Validasi No. RM
        $request->validate([
            'no_rm' => 'required|string',
        ]);

        // Mencari pasien berdasarkan No. RM
        $pasien = Pasien::where('no_rm', $request->no_rm)->first();

        if ($pasien) {
            // Mengembalikan data pasien dalam format JSON
            return response()->json([
                'status' => 'success',
                'data' => [
                    'nama' => $pasien->nama,
                    'alamat' => $pasien->Alamat,
                    'telepon' => $pasien->telepon,
                ]
            ]);
        }

        // Jika pasien tidak ditemukan
        return response()->json([
            'status' => 'error',
            'message' => 'Pasien tidak ditemukan.',
        ]);
    }

}
