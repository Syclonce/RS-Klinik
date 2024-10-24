<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\biaya;
use App\Models\setweb;
use App\Models\doctor;
use App\Models\pasien;
use App\Models\tipepemeriksa;
use App\Models\prosedur;
use App\Models\kategori;

class FinecController extends Controller
{
    public function index()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Doctor";
        $dokter = doctor::all();
        $pasien = pasien::all();
        $pilih = prosedur::all();
        return view('fine.index', compact('title','dokter','pasien','pilih'));

    }

    public function pemeriksaan()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Doctor";
        $data = tipepemeriksa::all();
        return view('fine.periksa', compact('title','data'));

    }

    public function pemeriksaanadd(Request $request)
    {
        $data = $request->validate([
            "nama" => 'required',
        ]);

        tipepemeriksa::create($data);
        return redirect()->route('finance.daig')->with('success', 'dokter berhasi di tambahkan');
    }

    public function prosedur()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Prosedur";
        $data = tipepemeriksa::all();
        $prosedur = prosedur::with(['tipepemeriksa'])->get();
        return view('fine.prosedur', compact('title','data','prosedur'));
    }

    public function proseduradd(Request $request)
    {
        $data = $request->validate([
            "kode" => 'required',
            "pembayaran" => 'required',
            "deskripsi" => 'required',
            "harga" => 'required',
            "komisi" => 'required',
            "tipepemeriksa_id" => 'required',
        ]);

        prosedur::create($data);
        return redirect()->route('finance.prosedur')->with('success', 'dokter berhasi di tambahkan');
    }

    public function kategori()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "kategori";
        $data = kategori::all();
        return view('fine.kategori', compact('title','data'));
    }

    public function kategoriadd(Request $request)
    {
        $data = $request->validate([
            "kategori" => 'required',
            "deskripsi" => 'required',
        ]);
        kategori::create($data);
        return redirect()->route('finance.kategori')->with('success', 'dokter berhasi di tambahkan');
    }
    public function biaya()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "biaya";
        $data = kategori::all();
        $biaya = biaya::all();
        return view('fine.biaya', compact('title','data', 'biaya'));
    }
        public function biayaadd(Request $request)
        {
            $data = $request->validate([
                "kategori" => 'required',
                "jumlah" => 'required',
                "catatan" => 'required',
            ]);
            biaya::create($data);
            return redirect()->route('finance.biaya')->with('success', 'dokter berhasi di tambahkan');
        }

        public function getAllData(Request $request)
        {
            $pilihIds = $request->input('pilihIds');

            if (!empty($pilihIds)) {
                $data = prosedur::whereIn('id', $pilihIds)->get();

                // Return the data in JSON format
                return response()->json($data);
            } else {
                return response()->json([]); // Return empty array if no IDs selected
            }
        }

}
