<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class UpdateController extends Controller
{
    public function update(Request $request)
{
    $repositoryUrl = 'https://github.com/Syclonce/RS-Klinik';
    $deployPath = base_path();

    // Fetch the latest tag from the GitHub repository
    exec("cd $deployPath && git fetch --tags", $outputFetch, $statusFetch);
    exec("cd $deployPath && git describe --tags --abbrev=0", $latestTagOutputArray, $statusTag);

    $latestTag = isset($latestTagOutputArray[0]) ? trim($latestTagOutputArray[0]) : null;

    if (!$latestTag) {
        return back()->with('error', 'Failed to retrieve the latest tag.');
    }

    // Download the ZIP file for the latest tag
    $zipUrl = "$repositoryUrl/archive/refs/tags/$latestTag.zip";
    $zipFilePath = storage_path("app/$latestTag.zip");

    // Download the ZIP file from GitHub
    file_put_contents($zipFilePath, fopen($zipUrl, 'r'));

    if (file_exists($zipFilePath)) {
        // Extract the ZIP file
        $zip = new \ZipArchive;
        if ($zip->open($zipFilePath) === TRUE) {
            $extractPath = storage_path("app/$latestTag");
            $zip->extractTo($extractPath);
            $zip->close();

            // Move the extracted files to the base path (replace the current app files)
            exec("cp -r $extractPath/* $deployPath", $outputMove, $statusMove);

            if ($statusMove === 0) {
                // Run Composer install and update
                exec("cd $deployPath && composer install --no-interaction --prefer-dist", $outputComposerInstall, $statusComposerInstall);
                exec("cd $deployPath && composer update --no-interaction --prefer-dist", $outputComposerUpdate, $statusComposerUpdate);

                // Run any additional commands needed after update
                Artisan::call('migrate', ['--force' => true]);
                Artisan::call('config:cache');
                Artisan::call('route:cache');
                Artisan::call('optimize:clear');

                // Clean up the downloaded ZIP and extracted files
                unlink($zipFilePath);
                exec("rm -rf $extractPath");

                return back()->with('success', "Application updated to tag '$latestTag' successfully!");
            } else {
                return back()->with('error', 'Failed to replace application files with the latest tag.');
            }
        } else {
            return back()->with('error', 'Failed to extract the ZIP file.');
        }
    } else {
        return back()->with('error', 'Failed to download the ZIP file.');
    }
}

}
