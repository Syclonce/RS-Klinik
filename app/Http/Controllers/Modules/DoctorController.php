<?php

namespace App\Http\Controllers\modules;

use App\Models\setweb;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Doctor";
        return view('doctor.index', compact('title'));
    }
}
