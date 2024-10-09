<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\datjal;
use App\Models\setweb;

class PenjualanController extends Controller
{
    public function index()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Penjualan Data";
        return view('penjualan.index', compact('title'));
    }

    public function penjualanadd(Request $request)
    {
        $data = $request->validate([
            "nama_barang" => 'required',
            "harga" => 'required',
            "stok" => 'required',
            "ket" => 'required',
        ]);

        datjal::create($data);
    }


    public function order()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Order Penjualan";
        return view('penjualan.order', compact('title'));
    }
    public function pjl()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Penjualan";
        return view('penjualan.pjl', compact('title'));
    }

}
