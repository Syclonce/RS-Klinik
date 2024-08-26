<?php

use App\Http\Controllers\kendaraanController;
use App\Http\Controllers\WilayahController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

