<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\setweb;
use App\Models\fmbiaya;
use App\Models\ktbiaya;
use App\Models\obat;
use App\Models\obatk;
use App\Models\opname;
use App\Models\dabar;
use App\Models\bhp;
use App\Models\bangsal;
use App\Models\pengaturan;

class FarmasiController extends Controller
{
    public function index()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "farmasi";
        $obat = obat::all();
        return view('farmasi.index', compact('title', 'obat'));

    }

    public function getAllData(Request $request)
        {
            $pilihIds = $request->input('pilihIds');

            if (!empty($pilihIds)) {
                $data = obat::whereIn('id', $pilihIds)->get();

                // Return the data in JSON format
                return response()->json($data);
            } else {
                return response()->json([]); // Return empty array if no IDs selected
            }
        }


    public function farmasi()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "farmasi";
        $ktbiya = ktbiaya::all();
        $fmbiya = fmbiaya::with('ktbiaya')->get();
        return view('farmasi.fmbiaya', compact('title','fmbiya','ktbiya', 'fmbiya'));
    }

    public function farmasiadd(Request $request)
    {
        $data = $request->validate([
            "ktbiaya_id" => 'required',
            "biaya" => 'required',
        ]);

        $farmasi = new fmbiaya();
        $farmasi->ktbiaya_id = $data['ktbiaya_id'];
        $farmasi->harga= $data['biaya'];
        $farmasi->save();
        return redirect()->route('farmasi.biaya')->with('success', 'dokter berhasi di tambahkan');
    }

    public function katgobi()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "farmasi";
        $ktbiya = ktbiaya::all();
        return view('farmasi.kategori', compact('title','ktbiya'));
    }


    public function katgobiadd(Request $request)
    {
        $data = $request->validate([
            "nama" => 'required',
            "deskripsi" => 'required',
        ]);

        ktbiaya::create($data);
        return redirect()->route('farmasi.kategori')->with('success', 'dokter berhasi di tambahkan');
    }

    public function opname()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "opname";
        $data = opname::all();
        return view('farmasi.opname', compact('title','data'));
    }

    public function obat()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "obat";
        $data = dabar::all();
        $bhp = bhp::all();
        $opname = opname::all();
        $bangsal = bangsal::all();

        return view('farmasi.obat', compact('title','data','bhp','bangsal','opname'));
    }

    public function obatadd(Request $request)
    {
        $data = $request->validate([
            "kode" => 'required',
            "nama" => 'required',
            "harga_beli" => 'required',
            "expired" => 'required',
            "stok" => 'required',
            "nama_bangsal" => 'required',
        ]);
        $existingOpname = Opname::where('kode', $request->kode)
                                ->where('nama_bangsal', $request->nama_bangsal)
                                ->first();

        if ($existingOpname) {
            // Jika sudah ada, tambahkan stok
            $existingOpname->stok += $request->stok;
            $existingOpname->save();
        } else {
            opname::create($data);
        }

        return redirect()->route('farmasi.obat')->with('Success', 'dokter berhasi di tambahkan');
    }

    public function pengaturan()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "pengaturan";
        return view('farmasi.pengaturan', compact('title'));
    }



}
