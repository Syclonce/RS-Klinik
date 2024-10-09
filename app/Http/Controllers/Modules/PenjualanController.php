<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\setweb;

class PenjualanController extends Controller
{
    public function index()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Penjualan";
        return view('penjualan.index', compact('title'));
    }

    public function order()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Order Penjualan";
        return view('penjualan.order', compact('title'));
    }

}
