<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Models\setweb;
use App\Http\Controllers\Controller;
use App\Models\akuntan;
use App\Models\suberdaya;
use App\Models\User;
use App\Models\apotek;
use App\Models\laboratorium;
use App\Models\resepsionis;
use Illuminate\Support\Facades\Hash;

class SumberdayamController extends Controller
{
    public function index()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Susunan Acara";
        $prawat = suberdaya::with('user')->get();
        return view('sumdm.index', compact('title','prawat'));
    }

    public function suberdayaadd(Request $request)
    {
        $data = $request->validate([
            "nama" => 'required|string|max:255',
            "Alamat" => 'required|string|max:255',
            "telepon" => 'required|string',
        ]);

        $datauser = $request->validate([
            "nama" => 'required|string|max:255',
            "username" => 'required|string|max:255',
            "email" => 'required|string|max:255',
            "password" => 'required',
            "telepon" => 'required|string',
        ]);

        $user = new User();
        $user->name = $datauser['nama'];
        $user->username = $datauser['username'];
        $user->email = $datauser['email'];
        $user->password = Hash::make($datauser['password']); // Hash the password
        $user->profile = 'default.jpg';
        $user->phone = $datauser['telepon'];
        $user->save();
        $user->assignRole('User');

        $sumberdaya = new suberdaya();
        $sumberdaya->nama = $data['nama'];
        $sumberdaya->alamat = $data['Alamat'];
        $sumberdaya->telepon = $data['telepon'];
        $sumberdaya->user_id = $user->id;
        $sumberdaya->save();

        return redirect()->route('sdm')->with('Success', 'Data Perawat berhasi di tambahkan');
    }

    public function apoteker()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Apoteker";
        $apoteker = apotek::with('user')->get();
        return view('sumdm.apoteker', compact('title','apoteker'));
    }

    public function apotekeradd(Request $request)
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

        $apotek = new apotek();
        $apotek->nama = $data['nama'];
        $apotek->alamat = $data['Alamat'];
        $apotek->telepon = $data['telepon'];
        $apotek->user_id = $user->id;
        $apotek->save();

        return redirect()->route('sdm.apoteker')->with('success', 'dokter berhasi di tambahkan');
    }

    public function laboratorium()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Apoteker";
        $labotori = laboratorium::with('user')->get();
        return view('sumdm.laboratoris', compact('title' ,'labotori'));
    }

    public function laboratoriumadd(Request $request)
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

        $laboratorium = new laboratorium();
        $laboratorium->nama = $data['nama'];
        $laboratorium->alamat = $data['Alamat'];
        $laboratorium->telepon = $data['telepon'];
        $laboratorium->user_id = $user->id;
        $laboratorium->save();

        return redirect()->route('sdm.laboratorium')->with('success', 'dokter berhasi di tambahkan');
    }

    public function akuntan()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Apoteker";
        $akuntan = akuntan::with('user')->get();
        return view('sumdm.akuntan', compact('title','akuntan'));
    }

    public function akuntanadd(Request $request)
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

        $akuntan = new akuntan();
        $akuntan->nama = $data['nama'];
        $akuntan->alamat = $data['Alamat'];
        $akuntan->telepon = $data['telepon'];
        $akuntan->user_id = $user->id;
        $akuntan->save();

        return redirect()->route('sdm.akuntan')->with('success', 'dokter berhasi di tambahkan');
    }
    public function resepsionis()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Apoteker";
        $resepsionis = resepsionis::with('user')->get();
        return view('sumdm.resepsionis', compact('title','resepsionis'));
    }

    public function resepsionisadd(Request $request)
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

        $resepsionis = new resepsionis();
        $resepsionis->nama = $data['nama'];
        $resepsionis->alamat = $data['Alamat'];
        $resepsionis->telepon = $data['telepon'];
        $resepsionis->user_id = $user->id;
        $resepsionis->save();

        return redirect()->route('sdm.resepsionis')->with('success', 'dokter berhasi di tambahkan');
    }

}
