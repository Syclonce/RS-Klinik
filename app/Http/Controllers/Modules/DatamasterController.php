<?php

namespace App\Http\Controllers\modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setweb;
use App\Models\poli;
use App\Models\bangsal;
use App\Models\katbar;
use App\Models\katpen;
use App\Models\katper;
use App\Models\satuan;
use App\Models\jenbar;
use App\Models\industri;
use App\Models\golbar;
use App\Models\dabar;
use App\Models\perjal;
use App\Models\pernap;
use App\Models\penjab;
use App\Models\perlogi;
use App\Models\cacat;
use App\Models\perusahaan;
use App\Models\aturanpake;
use App\Models\berkas;
use App\Models\bank;
use App\Models\bidang;
use App\Models\depart;
use App\Models\emergency;
use App\Models\jenjab;
use App\Models\keljab;
use App\Models\pendidikan;
use App\Models\resiko;
use App\Models\statker;
use App\Models\statwp;
use App\Models\metcik;
use App\Models\ok;



class DatamasterController extends Controller
{
    public function index()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Data Master";
        return compact('title');
    }

    public function bangsal()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Kelola Bangsal";
        $data = bangsal::all();
        return view('datamaster.bangsal', compact('title','data'));
    }

    public function bangsaladd(Request $request)
    {
        $data = $request->validate([
            "kode_bangsal" => 'required',
            "nama_bangsal" => 'required',
            "status" => 'required',
        ]);
        bangsal::create($data);
        return redirect()->route('datmas.bangsal')->with('Success', 'Data Bangsal berhasi di tambahkan');
    }

    public function dabar()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Kelola Data Barang";
        $satuan = satuan::all();
        $jenis = jenbar::all();
        $industri = industri::all();
        $katbar = katbar::all();
        $golbar = golbar::all();
        $data = dabar::with(['satbes','sat','jenbar','industri','katbar','golbar'])->get();
        return view('datamaster.dabar', compact('title','satuan','jenis','industri','katbar','golbar','data'));
    }

    public function dabaradd(Request $request)
    {
        $data = $request->validate([
            "kode_barang" => 'required',
            "nama_barang" => 'required|max:255',
            "expired" => 'required|max:255',
            "status" => 'required|max:255',
            "kode_satbes" => 'required|max:255',
            "kode_sat" => 'required|max:255',
            "harga_dasar" => 'required|max:255',
            "harga_beli" => 'required|max:255',
            "stok" => 'required|max:255',
            "kapasitas" => 'required|max:255',
            "isi" => 'required|max:255',
            "letak" => 'required|max:255',
            "kode_jenis" => 'required|max:255',
            "kode_industri" => 'required|max:255',
            "kode_kategori" => 'required|max:255',
            "kode_golongan" => 'required|max:255',
        ]);

        $dabar = new dabar();
        $dabar->kode = $data['kode_barang'];
        $dabar->nama = $data['nama_barang'];
        $dabar->expired = $data['expired'];
        $dabar->status = $data['status'];
        $dabar->satbes_id = $data['kode_satbes'];
        $dabar->sat_id = $data['kode_sat'];
        $dabar->harga_dasar = $data['harga_dasar'];
        $dabar->harga_beli = $data['harga_beli'];
        $dabar->stok = $data['stok'];
        $dabar->kapasitas = $data['kapasitas'];
        $dabar->isi = $data['isi'];
        $dabar->letak = $data['letak'];
        $dabar->jenbar_id = $data['kode_jenis'];
        $dabar->industri_id = $data['kode_industri'];
        $dabar->katbar_id = $data['kode_kategori'];
        $dabar->golbar_id = $data['kode_golongan'];
        $dabar->save();

        return redirect()->route('datmas.dabar')->with('Success', 'Data Barang berhasi di tambahkan');
    }

    public function generateKodeBarang()
    {
        // Ambil kode barang terakhir dari database
        $lastDabar = Dabar::orderBy('kode', 'desc')->first();

        // Tentukan kode barang pertama jika belum ada data
        if (!$lastDabar) {
            $kodeBaru = 'B00001';
        } else {
            // Ambil angka terakhir dari kode barang (misal: B00001 -> 1)
            $lastKodeNumber = (int)substr($lastDabar->kode, 1);

            // Tambah 1 ke angka terakhir
            $newKodeNumber = $lastKodeNumber + 1;

            // Format kode baru (B diikuti oleh angka dengan padding 0 menjadi 5 digit)
            $kodeBaru = 'B' . str_pad($newKodeNumber, 5, '0', STR_PAD_LEFT);
        }

        // Kirim kode baru sebagai response JSON
        return response()->json(['kode_barang' => $kodeBaru]);
    }

    public function katbar()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Kelola Kategori Barang";
        $data = katbar::all();
        return view('datamaster.katbar', compact('title','data'));
    }

    public function katbaradd(Request $request)
    {
        $data = $request->validate([
            "kode_barang" => 'required',
            "nama_barang" => 'required',
        ]);
        katbar::create($data);
        return redirect()->route('datmas.katbar')->with('Success', 'Kategori Barang berhasi di tambahkan');
    }

    public function katpen()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Kelola Kategori Penyakit";
        $data = katpen::all();
        return view('datamaster.katpen', compact('title','data'));
    }

    public function katpenadd(Request $request)
    {
        $data = $request->validate([
            "kode_penyakit" => 'required',
            "nama_penyakit" => 'required',
            "ciri" => 'required',
        ]);
        katpen::create($data);
        return redirect()->route('datmas.katpen')->with('Success', 'Kategori Penyakit berhasi di tambahkan');
    }

    public function katper()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Kelola Kategori Perawatan";
        $data = katper::all();
        return view('datamaster.katper', compact('title','data'));
    }

    public function katperadd(Request $request)
    {
        $data = $request->validate([
            "kode_rawatan" => 'required',
            "nama_rawatan" => 'required',
        ]);
        katper::create($data);
        return redirect()->route('datmas.katper')->with('Success', 'Kategori Perawatan berhasi di tambahkan');
    }

    public function satuan()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Kelola Kode Satuan";
        $data = satuan::all();
        return view('datamaster.satuan', compact('title','data'));
    }

    public function satuanadd(Request $request)
    {
        $data = $request->validate([
            "kode_satuan" => 'required',
            "nama_satuan" => 'required',
        ]);
        satuan::create($data);
        return redirect()->route('datmas.satuan')->with('Success', 'Kode Satuan berhasi di tambahkan');
    }

    public function jenbar()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Kelola Jenis Barang";
        $data = jenbar::all();
        return view('datamaster.jenbar', compact('title','data'));
    }

    public function jenbaradd(Request $request)
    {
        $data = $request->validate([
            "kode_jenbar" => 'required',
            "nama_jenbar" => 'required',
            "deskripsi" => 'required',
        ]);
        jenbar::create($data);
        return redirect()->route('datmas.jenbar')->with('Success', 'Jenis Barang berhasi di tambahkan');
    }

    public function industri()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Kelola Jenis Barang";
        $data = industri::all();
        return view('datamaster.industri', compact('title','data'));
    }

    public function industriadd(Request $request)
    {
        $data = $request->validate([
            "kode_industri" => 'required',
            "nama_industri" => 'required',
            "Alamat" => 'required',
            "kota" => 'required',
            "telepon" => 'required',
        ]);
        industri::create($data);
        return redirect()->route('datmas.industri')->with('Success', 'Data Industri Farmasi berhasi di tambahkan');
    }

    public function golbar()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Kelola Jenis Barang";
        $data = golbar::all();
        return view('datamaster.golbar', compact('title','data'));
    }

    public function golbaradd(Request $request)
    {
        $data = $request->validate([
            "kode_golbar" => 'required',
            "nama_golbar" => 'required',
        ]);
        golbar::create($data);
        return redirect()->route('datmas.golbar')->with('Success', 'Data Golongan Barang berhasi di tambahkan');
    }

    public function penjab()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Kelola Jenis Barang";
        $data = penjab::all();
        return view('datamaster.penjab', compact('title','data'));
    }

    public function penjabadd(Request $request)
    {
        $data = $request->validate([
            "kode_penjab" => 'required',
            "nama_penjab" => 'required',
            "nama_perusahaan" => 'required',
            "Alamat" => 'required',
            "telepon" => 'required',
            "attn" => 'required',
            "status" => 'required',
        ]);

        $penjab = new penjab();
        $penjab->kode = $data['kode_penjab'];
        $penjab->pj = $data['nama_penjab'];
        $penjab->nama = $data['nama_perusahaan'];
        $penjab->alamat = $data['Alamat'];
        $penjab->telp = $data['telepon'];
        $penjab->attn = $data['attn'];
        $penjab->status = $data['status'];
        $penjab->save();

        return redirect()->route('datmas.penjab')->with('Success', 'Data Penanggung Jawab berhasi di tambahkan');
    }

    public function cacat()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Kelola Data Cacat Fisik";
        $data = cacat::all();
        return view('datamaster.cacat', compact('title','data'));
    }

    public function cacatadd(Request $request)
    {
        $data = $request->validate([
            "kode_cacat" => 'required',
            "nama_cacat" => 'required',
        ]);
        cacat::create($data);
        return redirect()->route('datmas.cacat')->with('Success', 'Data Cacat Fisik berhasi di tambahkan');
    }

    public function perjal()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Kelola Jenis Barang";
        $katper = katper::all();
        $poli = poli::all();
        $penjab = penjab::all();
        $data = perjal::with(['katper','poli'])->get();
        return view('datamaster.perjal', compact('title','katper','poli','penjab','data'));
    }

    public function perjaladd(Request $request)
    {
        $data = $request->validate([
            "kode_perjal" => 'required',
            "nama_perjal" => 'required',
            "kategori" => 'required',
            "tarif_dokter" => 'required',
            "tarif_perawat" => 'required',
            "total_tarif" => 'required',
            "penjab" => 'required',
            "poli" => 'required',
            "status" => 'required',
        ]);

        $perjal = new perjal();
        $perjal->kode = $data['kode_perjal'];
        $perjal->nama = $data['nama_perjal'];
        $perjal->katper_id = $data['kategori'];
        $perjal->tarifdok = $data['tarif_dokter'];
        $perjal->tarifper = $data['tarif_perawat'];
        $perjal->total = $data['total_tarif'];
        $perjal->penjab_id = $data['penjab'];
        $perjal->poli_id = $data['poli'];
        $perjal->status = $data['status'];
        $perjal->save();

        return redirect()->route('datmas.perjal')->with('Success', 'Data Perawatan Rawat Jalan berhasi di tambahkan');
    }

    public function generateKodePerjal()
    {
        // Mengambil item terbaru berdasarkan kode barang
        $lastBarang = perjal::orderBy('kode', 'desc')->first();

        // Jika tidak ada data, mulai dengan RJ001
        if (!$lastBarang || !preg_match('/^RJ\d{3}$/', $lastBarang->kode)) {
            $newKode = 'RJ001';
        } else {
            // Ambil angka terakhir dari kode, misalnya RJ001 -> 001
            $lastKode = intval(substr($lastBarang->kode, 2));

            // Tambahkan 1 pada angka terakhir dan format menjadi 3 digit
            $newKode = 'RJ' . str_pad($lastKode + 1, 3, '0', STR_PAD_LEFT);
        }

        // Return response JSON
        return response()->json(['kode_perjal' => $newKode]);
    }

    public function pernap()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Kelola Jenis Barang";
        $katper = katper::all();
        $bangsal = bangsal::all();
        $penjab = penjab::all();
        $datas = pernap::with(['katper','bangsal'])->get();
        return view('datamaster.pernap', compact('title','katper','bangsal','penjab','datas'));
    }

    public function pernapadd(Request $request)
    {
        $data = $request->validate([
            "kode_pernap" => 'required',
            "nama_pernap" => 'required',
            "kategori" => 'required',
            "tarif_dokter" => 'required',
            "tarif_perawat" => 'required',
            "total_tarif" => 'required',
            "penjab" => 'required',
            "bangsal" => 'required',
            "kelas" => 'required',
            "status" => 'required',
        ]);

        $pernap = new pernap();
        $pernap->kode = $data['kode_pernap'];
        $pernap->nama = $data['nama_pernap'];
        $pernap->katper_id = $data['kategori'];
        $pernap->tarifdok = $data['tarif_dokter'];
        $pernap->tarifper = $data['tarif_perawat'];
        $pernap->total = $data['total_tarif'];
        $pernap->penjab_id = $data['penjab'];
        $pernap->bangsal_id = $data['bangsal'];
        $pernap->kelas = $data['kelas'];
        $pernap->status = $data['status'];

        $pernap->save();

        return redirect()->route('datmas.pernap')->with('Success', 'Data Perawatan Rawat Inap berhasi di tambahkan');
    }

    public function generateKodePernap()
    {
        // Mengambil item terbaru berdasarkan kode barang
        $lastBarang = pernap::orderBy('kode', 'desc')->first();

        // Jika tidak ada data, mulai dengan RI001
        if (!$lastBarang || !preg_match('/^RI\d{3}$/', $lastBarang->kode)) {
            $newKode = 'RI001';
        } else {
            // Ambil angka terakhir dari kode, misalnya RI001 -> 001
            $lastKode = intval(substr($lastBarang->kode, 2));

            // Tambahkan 1 pada angka terakhir dan format menjadi 3 digit
            $newKode = 'RI' . str_pad($lastKode + 1, 3, '0', STR_PAD_LEFT);
        }

        // Return response JSON
        return response()->json(['kode_pernap' => $newKode]);
    }

    public function perlogi()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Kelola Jenis Barang";
        $penjab = penjab::all();
        $data = perlogi::with(['penjab'])->get();
        return view('datamaster.perlogi', compact('title','penjab','data'));
    }

    public function perlogiadd(Request $request)
    {
        $data = $request->validate([
            "kode_radiologi" => 'required',
            "nama_radiologi" => 'required',
            "tarif_dokter" => 'required',
            "tarif_petugas" => 'required',
            "total_tarif" => 'required',
            "penjab" => 'required',
            "kelas" => 'required',
            "status" => 'required',
        ]);

        $perlogi = new perlogi();
        $perlogi->kode = $data['kode_radiologi'];
        $perlogi->nama = $data['nama_radiologi'];
        $perlogi->tarifdok = $data['tarif_dokter'];
        $perlogi->tarifper = $data['tarif_petugas'];
        $perlogi->total = $data['total_tarif'];
        $perlogi->penjab_id = $data['penjab'];
        $perlogi->kelas = $data['kelas'];
        $perlogi->status = $data['status'];

        $perlogi->save();

        return redirect()->route('datmas.perlogi')->with('Success', 'Data Perawatan Radiologi berhasi di tambahkan');
    }

    public function generateKodePerlogi()
    {
        // Mengambil item terbaru berdasarkan kode barang
        $lastBarang = perlogi::orderBy('kode', 'desc')->first();

        // Jika tidak ada data, mulai dengan RI001
        if (!$lastBarang || !preg_match('/^RAD\d{3}$/', $lastBarang->kode)) {
            $newKode = 'RAD001';
        } else {
            // Ambil angka terakhir daRAD kode, misalnya RAD001 -> 001
            $lastKode = intval(substr($lastBarang->kode, 2));

            // Tambahkan 1 pada angka terakhir dan format menjadi 3 digit
            $newKode = 'RAD' . str_pad($lastKode + 1, 3, '0', STR_PAD_LEFT);
        }

        // Return response JSON
        return response()->json(['kode_radiologi' => $newKode]);
    }

    public function perusahaan()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Kelola Jenis Barang";
        $data = perusahaan::all();
        return view('datamaster.perusahaan', compact('title','data'));
    }

    public function perusahaanadd(Request $request)
    {
        $data = $request->validate([
            "kode" => 'required',
            "nama" => 'required',
            "Alamat" => 'required',
            "kota" => 'required',
            "telepon" => 'required',

        ]);
        perusahaan::create($data);
        return redirect()->route('datmas.perusahaan')->with('Success', 'Data Perusahaan berhasi di tambahkan');
    }

    public function aturanpake()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Kelola Data Aturan Pakai";
        $data = aturanpake::all();
        return view('datamaster.aturanpake', compact('title','data'));
    }

    public function aturanpakeadd(Request $request)
    {
        $data = $request->validate([
            "aturanpake" => 'required',
        ]);
        aturanpake::create($data);
        return redirect()->route('datmas.aturanpake')->with('Success', 'Data Aturan Pakai berhasi di tambahkan');
    }

    public function berkas()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Kelola Data Berkas Digital";
        $data = berkas::all();
        return view('datamaster.berkas', compact('title','data'));
    }

    public function berkasadd(Request $request)
    {
        $data = $request->validate([
            "kode" => 'required',
            "nama" => 'required',
        ]);
        berkas::create($data);
        return redirect()->route('datmas.berkas')->with('Success', 'Data Berkas Digital berhasi di tambahkan');
    }

    public function generateKodeBerkas()
    {
        // Mengambil item terbaru berdasarkan kode barang
        $lastBarang = berkas::orderBy('kode', 'desc')->first();

        // Jika tidak ada data, mulai dengan RI001
        if (!$lastBarang || !preg_match('/^DIG\d{3}$/', $lastBarang->kode)) {
            $newKode = 'DIG001';
        } else {
            // Ambil angka terakhir daDIG kode, misalnya DIG001 -> 001
            $lastKode = intval(substr($lastBarang->kode, 2));

            // Tambahkan 1 pada angka terakhir dan format menjadi 3 digit
            $newKode = 'DIG' . str_pad($lastKode + 1, 3, '0', STR_PAD_LEFT);
        }

        // Return response JSON
        return response()->json(['kode' => $newKode]);
    }

    public function bank()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Kelola Data Bank";
        $data = bank::all();
        return view('datamaster.bank', compact('title','data'));
    }

    public function bankadd(Request $request)
    {
        $data = $request->validate([
            "nama" => 'required',
        ]);
        bank::create($data);
        return redirect()->route('datmas.bank')->with('Success', 'Data Bank berhasi di tambahkan');
    }

    public function bidang()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Kelola Data Bidang";
        $data = bidang::all();
        return view('datamaster.bidang', compact('title','data'));
    }

    public function bidangadd(Request $request)
    {
        $data = $request->validate([
            "nama" => 'required',
        ]);
        bidang::create($data);
        return redirect()->route('datmas.bidang')->with('Success', 'Data Bidang berhasi di tambahkan');
    }

    public function depart()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Kelola Data Departemen";
        $data = depart::all();
        return view('datamaster.depart', compact('title','data'));
    }

    public function departadd(Request $request)
    {
        $data = $request->validate([
            "kode" => 'required',
            "nama" => 'required',
        ]);
        depart::create($data);
        return redirect()->route('datmas.depart')->with('Success', 'Data Departemen berhasi di tambahkan');
    }

    public function emergency()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Kelola Data Emergency";
        $data = emergency::all();
        return view('datamaster.emergency', compact('title','data'));
    }

    public function emergencyadd(Request $request)
    {
        $data = $request->validate([
            "kode" => 'required',
            "nama" => 'required',
            "status" => 'required',
        ]);
        emergency::create($data);
        return redirect()->route('datmas.emergency')->with('Success', 'Data Emergency berhasi di tambahkan');
    }

    public function jenjab()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Kelola Data Jenjang Jabatan ";
        $data = jenjab::all();
        return view('datamaster.jenjab', compact('title','data'));
    }

    public function jenjabadd(Request $request)
    {
        $data = $request->validate([
            "kode" => 'required',
            "nama" => 'required',
            "tunjangan" => 'required',
        ]);
        jenjab::create($data);
        return redirect()->route('datmas.jenjab')->with('Success', 'Data Jenjang Jabatan berhasi di tambahkan');
    }

    public function keljab()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Kelola Data Kelompok Jabatan ";
        $data = keljab::all();
        return view('datamaster.keljab', compact('title','data'));
    }

    public function keljabadd(Request $request)
    {
        $data = $request->validate([
            "kode" => 'required',
            "nama" => 'required',
            "status" => 'required',
        ]);
        keljab::create($data);
        return redirect()->route('datmas.keljab')->with('Success', 'Data Kelompok Jabatan berhasi di tambahkan');
    }

    public function pendidikan()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Kelola Data Pendidikan Pegawai ";
        $data = pendidikan::all();
        return view('datamaster.pendidikan', compact('title','data'));
    }

    public function pendidikanadd(Request $request)
    {
        $data = $request->validate([
            "tingkat" => 'required',
            "index" => 'required',
            "gapok" => 'required',
            "kenaikan" => 'required',
            "maks" => 'required',
        ]);
        pendidikan::create($data);
        return redirect()->route('datmas.pendidikan')->with('Success', 'Data Pendidikan Pegawai berhasi di tambahkan');
    }

    public function resiko()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Kelola Data Resiko Kerja ";
        $data = resiko::all();
        return view('datamaster.resiko', compact('title','data'));
    }

    public function resikoadd(Request $request)
    {
        $data = $request->validate([
            "kode" => 'required',
            "nama" => 'required',
            "index" => 'required',
        ]);
        resiko::create($data);
        return redirect()->route('datmas.resiko')->with('Success', 'Data Resiko Kerja berhasi di tambahkan');
    }

    public function statker()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Kelola Data Status Kerja ";
        $data = statker::all();
        return view('datamaster.statker', compact('title','data'));
    }

    public function statkeradd(Request $request)
    {
        $data = $request->validate([
            "status" => 'required',
            "keterangan" => 'required',
            "index" => 'required',
        ]);
        statker::create($data);
        return redirect()->route('datmas.statker')->with('Success', 'Data Status Kerja berhasi di tambahkan');
    }

    public function statwp()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Kelola Data Status WP ";
        $data = statwp::all();
        return view('datamaster.statwp', compact('title','data'));
    }

    public function statwpadd(Request $request)
    {
        $data = $request->validate([
            "status" => 'required',
            "keterangan" => 'required',
        ]);
        statwp::create($data);
        return redirect()->route('datmas.statwp')->with('Success', 'Data Status WP berhasi di tambahkan');
    }

    public function metcik()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Kelola Data Metode Racik ";
        $data = metcik::all();
        return view('datamaster.metcik', compact('title','data'));
    }

    public function metcikadd(Request $request)
    {
        $data = $request->validate([
            "kode" => 'required',
            "nama" => 'required',
        ]);
        metcik::create($data);
        return redirect()->route('datmas.metcik')->with('Success', 'Data Metode Racik berhasi di tambahkan');
    }

    public function ok()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Kelola Data Ruang OK ";
        $data = ok::all();
        return view('datamaster.ok', compact('title','data'));
    }

    public function okadd(Request $request)
    {
        $data = $request->validate([
            "kode" => 'required',
            "nama" => 'required',
        ]);
        ok::create($data);
        return redirect()->route('datmas.ok')->with('Success', 'Data Ruang OK berhasi di tambahkan');
    }

    public function manage($id)
    {
        // Mengambil data perawatan berdasarkan ID
        $perawatan = Perawatan::with('details')->find($id);

        // Tampilkan view dengan data yang diambil
        return view('perawatan.manage', compact('perawatan'));
    }

    public function addDetail(Request $request, $id)
    {
        $request->validate([
            'nama_pemeriksaan' => 'required',
            'satuan' => 'required',
            'tarif' => 'required|numeric',
        ]);

        // Tambah detail baru pada pemeriksaan yang dipilih
        DetailPerawatan::create([
            'nama_pemeriksaan' => $request->nama_pemeriksaan,
            'satuan' => $request->satuan,
            'tarif' => $request->tarif,
            'perawatan_id' => $id
        ]);

        return redirect()->back()->with('success', 'Detail Pemeriksaan Berhasil Ditambahkan');
    }

    public function deleteDetail($id)
    {
        // Menghapus detail pemeriksaan
        $detail = DetailPerawatan::find($id);
        if ($detail) {
            $detail->delete();
            return redirect()->back()->with('success', 'Detail Pemeriksaan Berhasil Dihapus');
        }
        return redirect()->back()->with('error', 'Detail Pemeriksaan Tidak Ditemukan');
    }
}
