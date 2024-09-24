<?php

namespace App\Http\Controllers\modules;

use App\Models\setweb;
use App\Http\Controllers\Controller;
use App\Models\doctor;
use App\Models\doctor_visit;
use App\Models\spesiali;
use App\Models\poli;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    public function index()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Doctor";
        $data = Spesiali::all();
        $doctors = Doctor::with('user')->get();
        return view('doctor.index', compact('title','data','doctors'));
    }

    public function doctoradd(Request $request)
    {
        $data = $request->validate([
            "nama" => 'required|string|max:255',
            "Alamat" => 'required|string|max:255',
            "spesialis" => 'required|array|max:255',
            "spesialis.*" => 'string|exists:spesialis,kode', // Validate each item in the 'spesialis' array
            "harga" => 'required|numeric',
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

    public function spesiali()
    {
        $setweb = setweb::first();
        $data = Spesiali::all();
        $title = $setweb->name_app ." - "." Spesialis "." - ". "Doctor";
        return view('doctor.spesiali', compact('title','data'));
    }

    public function spesialiadd(Request $request)
    {
        $data = $request->validate([
            "nama" => 'required|string|max:255',
            "kode" => 'required|unique:spesialis,kode',
        ]);

        spesiali::create($data);

        return redirect()->route('doctor.spesiali')->with('success', 'data spesialis berhasi di tambahkan');
    }

    public function visitdocter()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Doctor";
        $doctors = Doctor::all();
        $visit = doctor_visit::with('doctor')->get();
        return view('doctor.visit', compact('title','doctors','visit'));
    }

    public function visitdocteradd(Request $request)
    {
        $data = $request->validate([
            "doctors" => 'required',
            "harga" => 'required',
            "status" => 'required',
        ]);

        $doctor_visit = new doctor_visit();
        $doctor_visit->doctor_id =$data['doctors'];
        $doctor_visit->deskripsi = $request->deskripsi;
        $doctor_visit->harga =$data['harga'];
        $doctor_visit->status =$data['status'];
        $doctor_visit->save();

        return redirect()->route('doctor.visit')->with('success', 'data kunjungan dokter berhasi di tambahkan');
    }

    public function poli()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Tambah Poli";
        $data = poli::all();
        return view('doctor.poli', compact('title','data'));
    }

    public function poliadd(Request $request)
    {
        $data = $request->validate([
            "nama_poli" => 'required',
            "id_bpjs"=> 'required',
            "id_satusehat" => 'required',
            "deskripsi" => 'required',
            "status" => 'required',
        ]);

        poli::create($data);

        return redirect()->route('doctor.poli')->with('Success', 'Bahasa berhasil di tambahkan');
    }

}
