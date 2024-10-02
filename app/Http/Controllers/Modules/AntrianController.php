<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\setweb;
use App\Models\antrian;

class AntrianController extends Controller
{
    public function index()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "antrian";

        return view('antrian.welcome', compact('title'));

    }

    public function loket1()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "loket1";

        return view('antrian.page', compact('title'));

    }
}
