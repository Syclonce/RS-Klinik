<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class UpdateController extends Controller
{
    public function update(Request $request)
    {
        $repositoryUrl = 'https://github.com/Syclonce/RS-Klinik.git';
        $deployPath = base_path();

        // Pull the latest changes from the Git repository
        exec("cd $deployPath && git pull origin main", $output, $status);

        if ($status === 0) {
            // Run any additional commands needed after update
            Artisan::call('migrate', ['--force' => true]);
            Artisan::call('config:cache');
            Artisan::call('route:cache');
            Artisan::call('optimize:clear');

            return back()->with('Success', 'Application updated successfully!');
        } else {
            return back()->with('error', 'Failed to update the application.');
        }
    }
}
