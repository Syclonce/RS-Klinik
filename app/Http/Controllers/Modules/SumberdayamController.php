<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Models\setweb;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SumberdayamController extends Controller
{
    public function index()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Susunan Acara";
        return view('sumdm.index', compact('title'));
    }

    public function suberdayaadd(Request $request)
    {
        $data = $request->validate([
            "nama" => 'required|string|max:255',
            "Alamat" => 'required|string|max:255',
            "telepon" => 'required|string|regex:/^\(\d{2}\) \d{3}-\d{3}-\d{4}$/',
        ]);

        $datauser = $request->validate([
            "nama" => 'required|string|max:255',
            "username" => 'required|string|max:255',
            "email" => 'required|string|max:255',
            "password" => 'required',
        ]);

        $user = new User();
        $user->name = $datauser['nama'];
        $user->username = $datauser['username'];
        $user->email = $datauser['email'];
        $user->password = Hash::make($datauser['password']); // Hash the password
        $user->profile = 'default.jpg';
        $user->save();
        $user->assignRole('User');

        $doctor = new Doctor();
        $doctor->nama = $data['nama'];
        $doctor->alamat = $data['Alamat'];
        $doctor->spesialis = json_encode($data['spesialis']); // Encode the array to JSON
        $doctor->harga = $data['harga'];
        $doctor->telepon = $data['telepon'];
        $doctor->user_id = $user->id;
        $doctor->save();

        return redirect()->route('doctor')->with('success', 'dokter berhasi di tambahkan');
    }
}
