<?php

namespace App\Http\Controllers;

use App\Models\setsatusehat;
use App\Models\setbpjs;
use App\Models\setweb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class websetController extends Controller
{
    public function index()
    {
        $title = 'Rs Apps';
        $webset = setweb::all();
        $setsatusehat = setsatusehat::all();
        $setbpjs = setbpjs::all();
        return view('superadmin.webset', compact('title', 'webset', 'setsatusehat','setbpjs'));
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

    public function setsatusehat(Request $request)
    {
        $request->validate([
            'org_id' => 'required',
            'client_id' => 'required',
            'client_secret' => 'required',
            'SATUSEHAT_BASE_URL' => 'required',
        ]);

        $setsehat = setsatusehat::findOrFail($request->id);
        $setsehat->org_id = $request->org_id;
        $setsehat->client_id = $request->client_id;
        $setsehat->client_secret = $request->client_secret;
        $setsehat->SATUSEHAT_BASE_URL = $request->SATUSEHAT_BASE_URL;
        $setsehat->save();
        
        return redirect()->back()->with('success', 'Record updated successfully.');
    }

    public function setbpjs(Request $request)
    {
        $request->validate([
            'BPJS_PCARE_CONSID' => 'required',
            'BPJS_PCARE_SCREET_KEY' => 'required',
            'BPJS_PCARE_USERNAME' => 'required',
            'BPJS_PCARE_PASSWORD' => 'required',
            'BPJS_PCARE_APP_CODE' => 'required',
            'BPJS_PCARE_USER_KEY' => 'required',
            'BPJS_PCARE_BASE_URL' => 'required',
            'BPJS_PCARE_SERVICE_NAME' => 'required',
        ]);

        $setbpjss = setbpjs::findOrFail($request->id);
        $setbpjss->BPJS_PCARE_CONSID = $request->BPJS_PCARE_CONSID;
        $setbpjss->BPJS_PCARE_SCREET_KEY = $request->BPJS_PCARE_SCREET_KEY;
        $setbpjss->BPJS_PCARE_USERNAME = $request->BPJS_PCARE_USERNAME;
        $setbpjss->BPJS_PCARE_PASSWORD = $request->BPJS_PCARE_PASSWORD;
        $setbpjss->BPJS_PCARE_APP_CODE = $request->BPJS_PCARE_APP_CODE;
        $setbpjss->BPJS_PCARE_BASE_URL = $request->BPJS_PCARE_BASE_URL;
        $setbpjss->BPJS_PCARE_USER_KEY = $request->BPJS_PCARE_USER_KEY;
        $setbpjss->BPJS_PCARE_SERVICE_NAME = $request->BPJS_PCARE_SERVICE_NAME;
        $setbpjss->save();

        return redirect()->back()->with('success', 'Record updated successfully.');
    }
}
