<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        $user = Auth::user(); // Assuming you are using Auth facade for consistency with previous examples.

        if ($user->hasVerifiedEmail()) {
            if ($user->hasRole('Admin')) {
                return redirect()->to('admin');
            }
            if ($user->hasRole('Super-Admin')) {
                return redirect()->to('superadmin');
            }
            if ($user->hasRole('User')) {
                return redirect()->to('user');
            }
        }
        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
