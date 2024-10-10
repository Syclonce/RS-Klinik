<?php

namespace App\Http\Controllers\modules;

use App\Http\Controllers\Controller;
use App\Models\bangsal;
use Illuminate\Http\Request;
use App\Models\setweb;
use App\Models\doctor;
use App\Models\pasien;
use App\Models\seks;
use App\Models\penjab;
use App\Models\poli;
use App\Models\rujukan;
use App\Models\rajal;
use App\Models\ranap;
use App\Models\ugd;



class RegisController extends Controller
{
    public function index()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "obat";
        $penjab = penjab::all();
        $doctor = doctor::all();
        $ugd = ugd::with(['penjab','doctor'])->get();
        return view('regis.index', compact('title','penjab','doctor','ugd'));

    }

    public function ugdadd(Request $request)
    {
        $data = $request->validate([
            "jeskec" => 'nullable',
            "nopol" => 'nullable',
            "tglkej" => 'nullable',
            "penjamin_kec" => 'nullable',
            "ketkec" => 'nullable',
            "no_reg" => 'required',
            "no_rm" => 'required',
            "no_rawat" => 'required',
            "nama" => 'required',
            "sex" => 'required',
            "ktp" => 'required',
            "satusehat" => 'required',
            "tanggal_lahir" => 'required',
            "umur" => 'required',
            "alamat" => 'required',
            "telepon" => 'required',
            "activate_kecelakan" => 'required',
            "tanggal_pendaftaran" => 'required',
            "dokter" => 'required',
            "kode_dokter" => 'required',
            "poli" => 'required',
            "penjamin" => 'required',
            "no_Kartu" => 'required',
            "hubungan_pasien" => 'required',
            "nama_keluarga" => 'required',
            "alamat_keluarga" => 'required',
            "jenis_kartu" => 'required',
            "no_kartu_kel" => 'required',
        ]);

        $ugd = new ugd();
        $ugd->jeskec = $data['jeskec'] ?? null;;
        $ugd->nopol = $data['nopol'] ?? null;;
        $ugd->tglkej = $data['tglkej'] ?? null;;
        $ugd->penjamin_kec = $data['penjamin_kec'] ?? null;;
        $ugd->ketkec = $data['ketkec'] ?? null;;
        $ugd->no_reg = $data['no_reg'];
        $ugd->no_rm = $data['no_rm'];
        $ugd->no_rawat = $data['no_rawat'];
        $ugd->nama = $data['nama'];
        $ugd->sex = $data['sex'];
        $ugd->ktp = $data['ktp'];
        $ugd->kode_satusehat = $data['satusehat'];
        $ugd->tanggal_lahir = $data['tanggal_lahir'];
        $ugd->umur = $data['umur'];
        $ugd->alamat = $data['alamat'];
        $ugd->telepon = $data['telepon'];
        $ugd->active_kec = $data['activate_kecelakan'];
        $ugd->tgl_pendaftaran = $data['tanggal_pendaftaran'];
        $ugd->doctor_id = $data['dokter'];
        $ugd->kode_dokter = $data['kode_dokter'];
        $ugd->poli = $data['poli'];
        $ugd->penjab_id = $data['penjamin'];
        $ugd->no_kartu_pen = $data['no_Kartu'];
        $ugd->hubungan_pasien = $data['hubungan_pasien'];
        $ugd->nama_keluarga = $data['nama_keluarga'];
        $ugd->alamat_keluarga = $data['alamat_keluarga'];
        $ugd->jenis_kartu = $data['jenis_kartu'];
        $ugd->no_kartu_kel = $data['no_kartu_kel'];

        $ugd->save();

        return redirect()->route('regis')->with('Success', 'Data UGD berhasi di tambahkan');
    }



    public function generateNoRegUgd()
    {
        // Mendapatkan tanggal hari ini
        $today = date('Y-m-d');

        // Mencari data registrasi terakhir yang dibuat hari ini
        $lastReg = ugd::whereDate('created_at', $today)->orderBy('no_reg', 'desc')->first();

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

    public function cariNoRMUgd(Request $request)
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
                    'seks' => $pasien->seks,
                    'no_ktp' => $pasien->nik,
                    'no_satusehat' => $pasien->kode_ihs,
                    'tgl_lahir' => $pasien->tanggal_lahir,
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

    public function getKodeDokterUgd($id)
    {
        $dokter = doctor::find($id);

        if ($dokter) {
            return response()->json(['kode' => $dokter->kode]);
        } else {
            return response()->json(['kode' => null], 404);
        }
    }



    public function rajal()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "rajal";
        $dokter = doctor::all();
        $penjab = penjab::all();
        $pasien = pasien::all();
        $poli = poli::all();
        $data = rajal::with(['poli','pasien','doctor','penjab'])->get();
        return view('regis.rajal', compact('title','dokter','penjab','pasien','poli','data'));

    }

    public function rajaladd(Request $request)
    {
        $data = $request->validate([
            "tgl_kunjungan" => 'required',
            "time" => 'required',
            "dokter" => 'required',
            "poli" => 'required',
            "penjamin" => 'required',
            "no_reg" => 'required',
            "no_rawat" => 'required',
            "no_rm" => 'required',
            "nama_pasien" => 'required',
            "tgl_lahir" => 'required',
            "seks" => 'required',
            "telepon" => 'required',
        ]);

        $rad = new rajal();
        $rad->tgl_kunjungan = $data['tgl_kunjungan'];
        $rad->time = $data['time'];
        $rad->doctor_id = $data['dokter'];
        $rad->poli_id = $data['poli'];
        $rad->penjab_id = $data['penjamin'];
        $rad->no_reg = $data['no_reg'];
        $rad->no_rawat = $data['no_rawat'];
        $rad->no_rm = $data['no_rm'];
        $rad->nama_pasien = $data['nama_pasien'];
        $rad->tgl_lahir = $data['tgl_lahir'];
        $rad->seks = $data['seks'];
        $rad->telepon = $data['telepon'];
        $rad->save();

        return redirect()->route('regis.rajal')->with('Success', 'Data Rawat Jalan berhasi di tambahkan');
    }

    public function searchPasienRajal(Request $request)
    {
        // Ambil parameter nama dari request
        $nama = $request->input('nama');

        // Cari pasien berdasarkan nama (case insensitive) dan eager load relasi 'seks'
        $pasiens = Pasien::where('nama', 'LIKE', '%' . $nama . '%')->with('seks')->get();

        // Kembalikan hasil dalam format JSON
        return response()->json($pasiens);
    }

    public function generateNoRegRajal()
    {
        // Mendapatkan tanggal hari ini
        $today = date('Y-m-d');

        // Mencari data registrasi terakhir yang dibuat hari ini
        $lastReg = rajal::whereDate('created_at', $today)->orderBy('no_reg', 'desc')->first();

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

    public function generateNoRawatRajal()
    {
        // Memanggil fungsi generateNoReg() dan menangkap respons JSON
        $noRegResponse = $this->generateNoRegRajal();

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
