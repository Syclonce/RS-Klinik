<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class UpdateAppFromGit extends Command
{
    protected $signature = 'app:update-from-git';
    protected $description = 'Update the application from the Git repository';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $repositoryUrl = 'https://github.com/Syclonce/RS-Klinik.git';
        $deployPath = base_path();

        $this->info('Pulling latest changes from Git repository...');

        // Change to the deployment directory
        if (!File::exists($deployPath)) {
            $this->error('Deployment path does not exist.');
            return 1;
        }

        // Pull the latest changes from the Git repository
        exec("cd $deployPath && git pull origin main", $output, $status);

        if ($status === 0) {
            $this->info('Successfully updated the application.');
            $this->info(implode("\n", $output));

            // Run any additional commands needed after update
            Artisan::call('migrate');
            Artisan::call('config:cache');
            Artisan::call('route:cache');

            return 0;
        } else {
            $this->error('Failed to update the application.');
            $this->error(implode("\n", $output));

            return 1;
        }
    }
}
