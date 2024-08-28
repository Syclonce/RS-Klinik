<?php

namespace Database\Seeders;

use App\Models\setweb;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SetwebSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        setweb::create(
            [
                'name_app' => 'Smart RS',
                'logo_app' => 'Dolphin-logo.png'
            ]
        );
    }
}
