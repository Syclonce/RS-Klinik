<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log; // Add logging
use App\Models\licenses;



class VerificationController extends Controller
{
    /**
     * Send WhatsApp verification message.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendWhatsAppVerification()
    {
        $user = Auth::user();

        // Check if user has a valid phone number
        if (!$user->phone) {
            return back()->with('error', 'You must have a valid phone number for WhatsApp verification.');
        }

        // Generate WhatsApp verification URL
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify.whatsapp',
            now()->addMinutes(30), // Expiration time
            ['user' => $user->id, 'hash' => sha1($user->phone)]
        );

        // Generate WhatsApp verification message
        $message = "Hello {$user->name}, please verify your account by clicking" ;

        // Send the WhatsApp message
        $this->sendWhatsAppMessage($user->phone, $message, $verificationUrl);

        // Optionally return a success response or redirect
        return back()->with('success', 'Verification message sent via WhatsApp.');
    }

    /**
     * Sends a WhatsApp message via an external service.
     *
     * @param string $phoneNumber
     * @param string $message
     * @param string $verificationUrl
     * @return void
     */

     private function sendWhatsAppMessage(string $phoneNumber, string $message, string $verificationUrl): void
    {
        Log::info("Sending WhatsApp message to {$phoneNumber}: {$message}");

        $license = licenses::latest()->first();
        if (!$license) {
            Log::error('No license key found in the database');
            return;
        }
        $licenseKey = $license->key;

        // Make a POST request to the Node.js server to send the WhatsApp message
        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json'
            ])->post('http://localhost:3002/api/send-message', [
                'licenseKey' => $licenseKey,
                'phoneNumber' => $phoneNumber,
                'message' => $message,
                'url' => $verificationUrl,
            ]);

            if ($response->successful()) {
                Log::info('Message successfully sent to ' . $phoneNumber);
            } else {
                Log::error('Failed to send message to ' . $phoneNumber . '. Response: ' . $response->body());
            }
        } catch (\Exception $e) {
            Log::error('Error sending message: ' . $e->getMessage());
        }
    }


    /**
     * Verify the user's WhatsApp account.
     *
     * @param int $userId
     * @param string $hash
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verifyWhatsApp($userId, $hash)
    {
        // Retrieve the user by ID
        $user = User::findOrFail($userId);

        // Check if the hash matches the expected hash
        if (sha1($user->phone) !== $hash) {
            return redirect('/')->with('error', 'Invalid verification link or user.');
        }

        try {
            // Update the user as verified
            $user->update(['email_verified_at' => now()]);
            Log::info('User email_verified_at updated for User ID: ' . $userId);
        } catch (\Exception $e) {
            Log::error('Error updating email_verified_at: ' . $e->getMessage());
            return redirect('/')->with('error', 'Failed to verify your account. Please try again.');
        }

        // Log in the user if necessary
        if (!Auth::check()) {
            Auth::login($user);
        }

        // Redirect the user based on their role
        return $this->redirectUserBasedOnRole($user);
    }

    /**
     * Redirect the user based on their role.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    private function redirectUserBasedOnRole(User $user)
    {
        $roleIds = $user->roles->pluck('id'); // Get all role IDs for the user

        foreach ($roleIds as $roleId) {
            // Get the redirect route based on role_id
            $redirectRoute = DB::table('role_redirects')
                ->where('role_id', $roleId)
                ->value('redirect_route');

            if ($redirectRoute) {
                return redirect()->route($redirectRoute); // Redirect if a route is found
            }
        }

        // Default redirection if no specific role is found
        return redirect('/');
    }
}

