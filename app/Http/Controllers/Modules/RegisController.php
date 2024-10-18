<?php

namespace App\Http\Controllers\modules;

use App\Http\Controllers\Controller;
use App\Models\bangsal;
use App\Models\berkas;
use App\Models\Berkasdigital;
use Illuminate\Http\Request;
use App\Models\setweb;
use App\Models\doctor;
use App\Models\pasien;
use App\Models\seks;
use App\Models\penjab;
use App\Models\poli;
use App\Models\rujukan;
use App\Models\rajal;
use App\Models\perjal;
use App\Models\ranap;
use App\Models\icd9;
use App\Models\icd10;
use App\Models\prosedur_pasien;
use App\Models\diagnosa_pasien;
use App\Models\rajal_pemeriksaan;
use App\Models\rajal_layanan;
use App\Models\suberdaya;
use App\Models\ugd;
use Carbon\Carbon;

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
        $rajal = rajal::with(['poli','pasien','doctor','penjab'])->get();
        return view('regis.rajal', compact('title','dokter','penjab','pasien','poli','rajal'));

    }

    public function statusrajal(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:rajals,no_rm', // Adjust the table and column name as needed
            'status' => 'required|string'
        ]);
        $patient = rajal::where('no_rm', $request->id)->first();
        $patient->status = $request->status;
        $patient->save();

        return response()->json([
            'message' => 'Data Rawat Jalan berhasil ditambahkan'
        ]);
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

    public function soap($norm)
    {
        $setweb = setweb::first(); // Pastikan ini sudah benar
        $title = $setweb->name_app . " - " . "soap";
        $icd10 = icd10::all();
        $icd9 = icd9::all();
        $rajaldata = rajal::where('no_rm', $norm)->first();
        $prosedur = prosedur_pasien::with(['icd9'])->where('no_rawat', $rajaldata->no_rawat)->get();
        $diagnosas = diagnosa_pasien::with(['icd10'])->where('no_rawat', $rajaldata->no_rawat)->get();
        $pemeriksaans = rajal_pemeriksaan::with(['rajal'])->where('no_rawat',$rajaldata->no_rawat)->get();

        $tgl_lahir = Carbon::createFromFormat('d/m/Y', $rajaldata->tgl_lahir);
        $umur = $tgl_lahir->age;

        return view('regis.soap', compact('title','rajaldata','umur','icd10','icd9','prosedur','diagnosas','pemeriksaans'));
    }


    public function soapadd(Request $request)
    {
        $data_1 = $request->validate([
            "no_rawat" => 'required',
            "tgl_kunjungan" => 'required',
            "time" => 'required',
            "nama_pasien" => 'required',
            "umur" => 'required',
        ]);

        $data_2 = $request->validate([
            "tensi" => 'required',
            "suhu" => 'required',
            "nadi" => 'required',
            "rr" => 'required',
            "tinggi" => 'required',
            "berat" => 'required',
            "sadar" => 'required',
            "spo2" => 'required',
            "gcs" => 'required',
            "alergi" => 'required',
            "lingkar_perut" => 'required',
            "subyektif" => 'required',
            "obyektif" => 'required',
            "assessmen" => 'required',
            "plan" => 'required',
            "instruksi" => 'required',
            "evaluasi" => 'required',
        ]);

        $pemeriksaan = new rajal_pemeriksaan();
        $pemeriksaan->no_rawat = $data_1['no_rawat'];
        $pemeriksaan->tgl_kunjungan = $data_1['tgl_kunjungan'];
        $pemeriksaan->time = $data_1['time'];
        $pemeriksaan->nama_pasien = $data_1['nama_pasien'];
        $pemeriksaan->umur_pasien = $data_1['umur'];
        $pemeriksaan->tensi = $data_2['tensi'];
        $pemeriksaan->suhu = $data_2['suhu'];
        $pemeriksaan->nadi = $data_2['nadi'];
        $pemeriksaan->rr = $data_2['rr'];
        $pemeriksaan->tinggi_badan = $data_2['tinggi'];
        $pemeriksaan->berat_badan = $data_2['berat'];
        $pemeriksaan->kesadaran = $data_2['sadar'];
        $pemeriksaan->spo2 = $data_2['spo2'];
        $pemeriksaan->gcs = $data_2['gcs'];
        $pemeriksaan->alergi = $data_2['alergi'];
        $pemeriksaan->lingkar_perut = $data_2['lingkar_perut'];
        $pemeriksaan->subyektif = $data_2['subyektif'];
        $pemeriksaan->obyektif = $data_2['obyektif'];
        $pemeriksaan->assessmen = $data_2['assessmen'];
        $pemeriksaan->plan = $data_2['plan'];
        $pemeriksaan->instruksi = $data_2['instruksi'];
        $pemeriksaan->evaluasi = $data_2['evaluasi'];
        $pemeriksaan->save();

        return redirect()->route('soap',['norm' => $request->no_rm ])->with('Success', 'Data Pemeriksaan berhasi di tambahkan');
    }

    public function storeProsedur(Request $request)
    {
        $request->validate([
            'no_rawat' => 'required',
            'kode' => 'required',
            'prioritas' => 'required',
        ]);

        try {
            // Simpan data ke model prosedur_pasien
            $prosedur = new prosedur_pasien();
            $prosedur->no_rawat = $request->no_rawat;
            $prosedur->kode = $request->kode;
            $prosedur->prioritas = $request->prioritas;
            $prosedur->status = 'Rawat Jalan'; // Add any other field you want to save
            $prosedur->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function destroyProsedur(Request $request)
    {
        try {
            // Find the record by ID and delete it
            $prosedur = prosedur_pasien::find($request->id);

            if ($prosedur) {
                $prosedur->delete();
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'message' => 'Data not found']);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function storeDiagnosa(Request $request)
    {
        $request->validate([
            'no_rawat' => 'required',
            'kode' => 'required',
            'prioritas' => 'required',
        ]);

        try {
            // Create a new diagnosa_pasien record
            $diagnosa = new diagnosa_pasien();
            $diagnosa->no_rawat = $request->no_rawat;
            $diagnosa->kode = $request->kode;
            $diagnosa->status = 'Rawat Jalan';
            $diagnosa->prioritas = $request->prioritas;
            $diagnosa->status_penyakit = 'Baru';
            $diagnosa->save();

            return response()->json(['success' => true, 'id' => $diagnosa->id]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function destroyDiagnosa(Request $request)
    {
        try {
            // Find the record by ID and delete it
            $diagnosa = diagnosa_pasien::find($request->id);

            if ($diagnosa) {
                $diagnosa->delete();
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'message' => 'Data not found']);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        // Find the record by ID
        $pemeriksaan = rajal_pemeriksaan::findOrFail($id);

        // Delete the record
        $pemeriksaan->delete();

        // Redirect back with a success message
        return redirect()->route('regis.rajal')->with('Success', 'Data berhasil dihapus.');
    }


    public function layanan($norm)
    {
        $setweb = setweb::first();
        $title = $setweb->name_app . " - " . "Layanan & Tindakan";
        $rajaldata = rajal::where('no_rm', $norm)->first();
        $doctor = doctor::all();
        $perawat = suberdaya::all();
        $layanan = rajal_layanan::with(['rajal','doctor','perawat'])->where('no_rawat',$rajaldata->no_rawat)->get();

        return view('regis.layanan', compact('title','rajaldata','doctor','perawat','layanan'));
    }

    public function layananadd(Request $request)
    {
        $data = $request->validate([
            "tgl_kunjungan" => 'required',
            "time" => 'required',
            "no_rawat" => 'required',
            "no_rm" => 'required',
            "nama_pasien" => 'required',
            "jenis_tindakan" => 'required',
            "t_biaya" => 'required',
            "provider" => 'required',
            "dokter" => 'nullable',
            "b_dokter" => 'nullable',
            "perawat" => 'nullable',
            "b_perawat" => 'nullable',
        ]);

        $layanan = new rajal_layanan();
        $layanan->tgl_kunjungan = $data['tgl_kunjungan'];
        $layanan->time = $data['time'];
        $layanan->no_rawat = $data['no_rawat'];
        $layanan->no_rm = $data['no_rm'];
        $layanan->nama_pasien = $data['nama_pasien'];
        $layanan->jenis_tindakan = $data['jenis_tindakan'];
        $layanan->total_biaya = $data['t_biaya'];
        $layanan->provider = $data['provider'];
        $layanan->id_dokter = $data['dokter'] ?? null; // Assign null jika tidak ada
        $layanan->b_dokter = $data['b_dokter'] ?? null; // Assign null jika tidak ada
        $layanan->id_perawat = $data['perawat'] ?? null; // Assign null jika tidak ada
        $layanan->b_perawat = $data['b_perawat'] ?? null; // Assign null jika tidak ada
        $layanan->save();

        return redirect()->route('layanan',['norm' => $request->no_rm ])->with('Success', 'Data Layanan berhasi di tambahkan');
    }

    public function searchTindakan(Request $request)
    {
        $tindakan = $request->get('tindakan');

        // Mencari data di tabel 'perjals' di mana 'nama' sesuai dengan input pengguna
        $results = perjal::where('nama', 'LIKE', '%' . $tindakan . '%')->get();

        return response()->json($results);
    }

    public function layanandestroy($id)
    {
        $layanan = rajal_layanan::find($id); // Mencari data berdasarkan ID
        if ($layanan) {
            $layanan->delete(); // Menghapus data
            return redirect()->route('regis.rajal')->with('Success', 'Layanan berhasil dihapus.');
        }
        return redirect()->route('regis.rajal')->with('error', 'Layanan tidak ditemukan.');
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

    public function berkas($norm)
    {
        $setweb = setweb::first(); // Pastikan ini sudah benar
        $title = $setweb->name_app . " - " . "Berkas";
        $rajaldata = rajal::where('no_rm', $norm)->first();
        $berkasdigital = Berkasdigital::where('no_rm', $norm)->get();;

        return view('regis.berkas', compact('title','rajaldata','berkasdigital'));
    }


    public function berkasadd(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'time' => 'required|date_format:H:i',
            'id_rawat' => 'required|string',
            'no_rm' => 'required|string',
            'berkas_kategori' => 'required|string',
            'pilih_berkas' => 'nullable|file|mimes:jpg,jpeg,png,pdf', // You may adjust validation based on your requirements
        ]);

        // Handle file upload if a file was chosen
    if ($request->hasFile('pilih_berkas')) {
        // Get the uploaded file
        $file = $request->file('pilih_berkas');

        // Define a unique file name
        $fileName = time() . '_' . $file->getClientOriginalName();

        $uploadPath = public_path('uploads');

               // Move the uploaded file to the public/uploads directory
               $file->move($uploadPath, $fileName);


        // Optionally, you can save the file path to the database or perform other operations
        // For example: $yourModel->file_path = $path;

        $berksadigital = new Berkasdigital();
        $berksadigital->tanggal =  $request->tanggal;
        $berksadigital->jam =  $request->time;
        $berksadigital->id_rawat =  $request->id_rawat;
        $berksadigital->no_rm =  $request->no_rm;
        $berksadigital->kategori =  $request->berkas_kategori;
        $berksadigital->nama =  $fileName;
        $berksadigital->save();
    }

        return redirect()->route('regis.berkas',['norm' => $request->no_rm])->with('success', 'Data has been uploaded successfully!'); // Change 'some.route.name' to the actual route

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
