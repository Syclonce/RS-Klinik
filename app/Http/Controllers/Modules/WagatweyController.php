<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\setweb;

class WagatweyController extends Controller
{
    public function index()
    {
        $title = 'Rs Apps';
        $webset = setweb::all();
        return view('wageteway.index', compact('title', 'webset'));
    }
}
