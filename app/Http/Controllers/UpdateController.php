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

    // Fetch the latest changes and tags
    exec("cd $deployPath && git fetch --tags", $outputFetch, $statusFetch);

    // Check if the current branch is up to date with the latest tag
    exec("cd $deployPath && git describe --tags --abbrev=0", $latestTagOutputArray, $statusTag);

    // Convert the array to string (get the first element)
    $latestTagOutput = isset($latestTagOutputArray[0]) ? $latestTagOutputArray[0] : null;

    if (!$latestTagOutput) {
        return back()->with('error', 'Failed to retrieve the latest tag.');
    }

    // Compare with the latest tag
    exec("cd $deployPath && git diff --quiet $latestTagOutput HEAD", $outputDiff, $statusDiff);

    if ($statusFetch === 0 && $statusTag === 0) {
        if ($statusDiff !== 0) {
            // Pull the latest changes from the Git repository
            exec("cd $deployPath && git pull origin main", $outputPull, $statusPull);

            if ($statusPull === 0) {
                // Run Composer install and update
                exec("cd $deployPath && composer install --no-interaction --prefer-dist", $outputComposerInstall, $statusComposerInstall);

                // Run any additional commands needed after update
                Artisan::call('migrate', ['--force' => true]);
                Artisan::call('config:cache');
                Artisan::call('route:cache');
                Artisan::call('optimize:clear');

                return back()->with('success', 'Application updated successfully!');
            } else {
                return back()->with('error', 'Failed to update the application.');
            }
        } else {
            return back()->with('info', 'You are already on the latest tag.');
        }
    } else {
        return back()->with('error', 'Failed to fetch tags or check current version.');
    }
}

}
