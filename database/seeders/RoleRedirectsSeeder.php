<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleRedirectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleRedirects = [
            ['role_id' => 1, 'redirect_route' => 'superadmin'],
            ['role_id' => 2, 'redirect_route' => 'admin'],
            ['role_id' => 3, 'redirect_route' => 'user'],
        ];

        // Insert the data into the role_redirects table
        DB::table('role_redirects')->insert($roleRedirects);
    }
}
