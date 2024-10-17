<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\licenses;
use App\Models\setweb;

class WagatweyController extends Controller
{
    public function index()
    {
        $title = 'Rs Apps';
        $webset = setweb::all();
        $licenseKey = licenses::first()->key ?? ''; // Adjust the query as needed
        return view('wageteway.index', compact('title', 'webset','licenseKey'));
    }
    public function saveLicenseKey(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'license_key' => 'required|string|max:255',
        ]);

        // Save the license key to the database
        $license = licenses::find(1); // Assuming the ID is 1

    // Check if the license exists
    if ($license) {
        // Update the license key
        $license->key = $request->license_key;
        $license->save();

        return response()->json(['message' => 'License key updated successfully!'], 200);
    } else {
        return response()->json(['message' => 'License not found.'], 404);
    }

        return response()->json(['message' => 'License key saved successfully!']);
    }
}
