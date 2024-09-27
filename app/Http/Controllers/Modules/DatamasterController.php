<?php

namespace App\Http\Controllers\modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setweb;
use App\Models\bangsal;
use App\Models\katbar;
use App\Models\katpen;
use App\Models\katper;
use App\Models\satuan;
use App\Models\jenbar;
use App\Models\industri;
use App\Models\golbar;
use App\Models\dabar;


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














}
