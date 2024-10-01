<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\setweb;
use App\Models\doctor;
use App\Models\penjab;

class RadiologiController extends Controller
{
    public function index()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Radiologi";
        $dokter = doctor::all();
        $penjab = penjab::all();
        return view('radiologi.index', compact('title','dokter','penjab'));

    }



    public function generateNoRawat()
    {
        // Ambil tanggal hari ini
        $date = Carbon::now()->format('Y/m/d');

        // Ambil nomor rawat terakhir berdasarkan format
        $lastRawat = radiologi::where('no_rawat', 'like', $date . '/%')
                        ->orderBy('no_rawat', 'desc')
                        ->first();

        // Jika tidak ada data rawat sebelumnya, mulai dari 000001
        if (!$lastRawat) {
            $newNumber = '000001';
        } else {
            // Ambil angka terakhir, pisahkan bagian angka setelah '/'
            $lastNumber = intval(substr($lastRawat->no_rawat, strrpos($lastRawat->no_rawat, '/') + 1));

            // Tambah angka terakhir
            $newNumber = str_pad($lastNumber + 1, 6, '0', STR_PAD_LEFT);
        }

        // Gabungkan tanggal dengan angka baru
        $newNoRawat = $date . '/' . $newNumber;

        // Return dalam format JSON
        return response()->json(['no_rawat' => $newNoRawat]);
    }

    public function getLatestRegNumber()
    {
        // Mendapatkan item terbaru berdasarkan nomor registrasi
        $lastReg = radiologi::orderBy('no_reg', 'desc')->first();

        // Jika tidak ada data, mulai dengan 001
        if (!$lastReg) {
            $newRegNumber = '001';
        } else {
            // Mengambil angka terakhir dari nomor registrasi
            $lastNumber = intval($lastReg->no_reg);

            // Tambahkan 1 ke angka terakhir dan format menjadi 3 digit
            $newRegNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        }

        // Mengembalikan response JSON dengan nomor registrasi terbaru
        return response()->json(['no_reg' => $newRegNumber]);
    }

}
