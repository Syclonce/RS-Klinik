<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\setweb;
use App\Models\tipepemeriksa;

class FinecController extends Controller
{
    public function index()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Doctor";
        return view('fine.index', compact('title'));

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
}
