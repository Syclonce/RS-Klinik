<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = Auth::user();
        $roleIds = $user->roles->pluck('id'); // Ambil semua ID peran pengguna

        $redirectRoute = null;

        foreach ($roleIds as $roleId) {
            // Ambil rute pengalihan berdasarkan role_id
            $redirectRoute = DB::table('role_redirects')
                ->where('role_id', $roleId)
                ->value('redirect_route');

            if ($redirectRoute) {
                break; // Hentikan loop jika sudah menemukan rute pengalihan
            }
        }

        if ($redirectRoute) {
            return redirect()->route($redirectRoute);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
