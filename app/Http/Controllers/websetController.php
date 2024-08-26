<?php

namespace App\Http\Controllers;

use App\Models\setweb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class websetController extends Controller
{
    public function index()
    {
        $title = 'Rs Apps';
        $webset = setweb::all();
        return view('superadmin.webset', compact('title', 'webset',));
    }

    public function updates(Request $request)
    {
        // Validate the request
        $request->validate([
            'name_app' => 'required|string|max:255',
            'logo_app' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Find the SetWeb record you want to update by id
        $setWeb = SetWeb::findOrFail($request->id);

        // Update name_app
        $setWeb->name_app = $request->name_app;


        // Handle the file upload
        if ($request->hasFile('logo_app')) {
            // Remove the old file if it exists
            $oldFileName = $setWeb->logo_app;
            if ($oldFileName) {
                $oldFilePath = public_path('webset/' . $oldFileName);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            $file = $request->file('logo_app');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Store the file directly in the 'public/webset' directory
            $file->move(public_path('webset'), $fileName);

            // Update logo_app with the relative path from 'public/webset'
            $setWeb->logo_app = $fileName;  // Store the relative path
        }

        // Save the changes
        $setWeb->save();

        return redirect()->back()->with('success', 'Record updated successfully.');
    }
}
