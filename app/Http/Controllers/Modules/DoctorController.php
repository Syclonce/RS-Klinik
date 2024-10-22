<?php

namespace App\Http\Controllers\modules;

use App\Models\setweb;
use App\Http\Controllers\Controller;
use App\Models\doctor;
use App\Models\doctor_visit;
use App\Models\spesiali;
use App\Models\poli;
use App\Models\jabatan;
use App\Models\statdok;
use App\Models\User;
use App\Models\seks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    public function index()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Doctor";
        $poli = poli::all();
        $jabatan = jabatan::all();
        $status = statdok::all();
        $doctors = doctor::with('user','poli','jabatan','statdok')->get();
        $sex = seks::all();
        return view('doctor.index', compact('title','poli','jabatan','status','doctors','sex'));
    }

    public function doctoradd(Request $request)
    {
        $data = $request->validate([
            "nik" => 'required',
            "nama" => 'required|string|max:255',
            "jabatan" => 'required|string|max:255',
            "aktivasi" => 'required|string|max:255',
            "poli" => 'required|string|max:255',
            "tglawal" => 'required|string|max:255',
            "Alamat" => 'required|string|max:255',
            "seks" => 'required|string|max:255',
            "sip" => 'required|string|max:255',
            "str" => 'required|string|max:255',
            "npwp" => 'required|string|max:255',
            "tempat_lahir" => 'required|string|max:255',
            "tgllahir" => 'required|string|max:255',
            "status_kerja" => 'required|string|max:255',
            "kode" => 'required|string|max:255',
            "telepon" => 'required|string|regex:/^\(\d{2}\) \d{3}-\d{3}-\d{3}$/',
        ],[
            'nik.required' => 'NIK harus diisi.',
            'nama.required' => 'Nama harus diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'jabatan.required' => 'Jabatan harus diisi.',
            'aktivasi.required' => 'Aktivasi harus diisi.',
            'poli.required' => 'Poli harus diisi.',
            'tglawal.required' => 'Tanggal awal harus diisi.',
            'Alamat.required' => 'Alamat harus diisi.',
            'seks.required' => 'Jenis kelamin harus diisi.',
            'sip.required' => 'SIP harus diisi.',
            'str.required' => 'STR harus diisi.',
            'npwp.required' => 'NPWP harus diisi.',
            'tempat_lahir.required' => 'Tempat lahir harus diisi.',
            'tgllahir.required' => 'Tanggal lahir harus diisi.',
            'status_kerja.required' => 'Status kerja harus diisi.',
            'kode.required' => 'Kode harus diisi.',
            'telepon.required' => 'Telepon harus diisi.',
            'telepon.regex' => 'Format telepon tidak valid. Gunakan format (XX) XXX-XXX-XXX.',
        ]);

        $datauser = $request->validate([
            "nama" => 'required|string|max:255',
            "username" => 'required|string|max:255',
            "email" => 'required|string|max:255',
            "password" => 'required|min:8',
            "telepon" => 'required',
        ],[
            'nama.required' => 'Nama harus diisi.',
            'username.required' => 'Username harus diisi.',
            'username.string' => 'Username harus berupa teks.',
            'username.max' => 'Username tidak boleh lebih dari 255 karakter.',
            'email.required' => 'Email harus diisi.',
            'email.string' => 'Email harus berupa teks.',
            'email.email' => 'Email tidak valid.',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password harus diisi.',
            'password.string' => 'Password harus berupa teks.',
            'password.min' => 'Password harus terdiri dari minimal 8 karakter.',            
            'telepon.required' => 'Telepon harus diisi.',
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

        $doctor = new Doctor();
        $doctor->nik = $data['nik'];
        $doctor->nama = $data['nama'];
        $doctor->jabatan_id = $data['jabatan'];
        $doctor->aktivasi = $data['aktivasi'];
        $doctor->poli_id = $data['poli'];
        $doctor->tglawal = $data['tglawal'];
        $doctor->Alamat = $data['Alamat'];
        $doctor->seks = $data['seks'];
        $doctor->sip = $data['sip'];
        $doctor->str = $data['str'];
        $doctor->npwp = $data['npwp'];
        $doctor->tempat_lahir = $data['tempat_lahir'];
        $doctor->tgllahir = $data['tgllahir'];
        $doctor->statdok_id = $data['status_kerja'];
        $doctor->kode = $data['kode'];
        $doctor->telepon = $data['telepon'];
        $doctor->user_id = $user->id;
        $doctor->save();

        return redirect()->route('doctor')->with('Success', 'dokter berhasi di tambahkan');
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

    public function jabatan()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Tambah Poli";
        $jabatan = jabatan::all();
        return view('doctor.jabatan', compact('title','jabatan'));
    }

    public function jabatanadd(Request $request)
    {
        try {
            // Validasi input data
            $data = $request->validate([
                "nama" => 'required|unique:jabatans,nama',
            ]);

            // Jika validasi berhasil, simpan data
            jabatan::create($data);

            // Redirect dengan pesan sukses
            return redirect()->route('doctor.jabatan')->with('Success', 'Jabatan berhasil ditambahkan');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Tangkap pengecualian validasi dan kembali ke halaman sebelumnya dengan alert pesan gagal
            return redirect()->back()
                ->with('error', 'Gagal menambahkan, nama sudah ada!')
                ->withErrors($e->validator)
                ->withInput();
        }
    }

    public function status()
    {
        $setweb = setweb::first();
        $title = $setweb->name_app ." - ". "Tambah Poli";
        $status = statdok::all();
        return view('doctor.status', compact('title','status'));
    }

    public function statusadd(Request $request)
    {
        try {
            // Validasi input data
            $data = $request->validate([
                "nama" => 'required|unique:statdoks,nama',
            ]);

            // Jika validasi berhasil, simpan data
            statdok::create($data);

            // Redirect dengan pesan sukses
            return redirect()->route('doctor.status')->with('Success', 'Status Dokter berhasil ditambahkan');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Tangkap pengecualian validasi dan kembali ke halaman sebelumnya dengan alert pesan gagal
            return redirect()->back()
                ->with('error', 'Gagal menambahkan, nama sudah ada!')
                ->withErrors($e->validator)
                ->withInput();
        }
    }
}
