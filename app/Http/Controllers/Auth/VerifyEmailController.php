<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if (Auth::user()->hasVerifiedEmail()) {
            if (Auth::user()->hasRole('Admin')) {
                return redirect()->to('admin?verified=1');
            }
            if (Auth::user()->hasRole('Super-Admin')) {
                return redirect()->to('superadmin?verified=1');
            }
            if (Auth::user()->hasRole('User')) {
                return redirect()->to('user?verified=1');
            }
        }

        if (Auth::user()->markEmailAsVerified()) {
            event(new Verified(Auth::user()));
        }

        if (Auth::user()->hasRole('Admin')) {
            return redirect()->to('admin?verified=1');
        }
        if (Auth::user()->hasRole('Super-Admin')) {
            return redirect()->to('superadmin?verified=1');
        }
        if (Auth::user()->hasRole('User')) {
            return redirect()->to('user?verified=1');
        }

    }
}
