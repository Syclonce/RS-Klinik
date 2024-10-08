<?php

namespace App\Http\Controllers;

use App\Models\RoleRedirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomepagesController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function redirectToDashboard()
    {
                  // Ambil role_id pengguna yang sedang login
        $user = Auth::user();
        $roleIds = [$user->roles->pluck('id')]; // Ambil semua ID peran pengguna]; // Anda dapat menyesuaikan ini jika ada banyak role_id

        $redirectRoute = null;

        foreach ($roleIds as $roleId) {
            // Ambil rute pengalihan berdasarkan role_id menggunakan model
            $redirectRoute = RoleRedirect::where('role_id', $roleId)->value('redirect_route');

            if ($redirectRoute) {
                break; // Hentikan loop jika sudah menemukan rute pengalihan
            }
        }

        // Cek apakah redirectRoute ditemukan
        if (!empty($redirectRoute)) { // Pastikan redirectRoute tidak kosong
            return redirect()->route($redirectRoute);
        }
        // Jika tidak ada redirectRoute, arahkan ke rute default
        return redirect()->route('default_dashboard'); // Ganti dengan rute default Anda

    }
}
