<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadmin = User::create(
            [
                'name' => 'superadmin',
                'profile'=>'default.jpg',
                'username' => 'superadmin',
                'email' => 'superadmin@tes.tes',
                'phone' => '6282130394490',
                'password' => bcrypt('123123123')
            ]
        );
        $superadmin->assignRole('Super-Admin');

        $admin = User::create(
            [
                'name' => 'admin',
                'profile'=>'default.jpg',
                'username' => 'admin',
                'email' => 'admin@tes.tes',
                'phone' => '6282130394490',
                'password' => bcrypt('123123123')
            ]
        );
        $admin->assignRole('Admin');

        $user = User::create(
            [
                'name' => 'user',
                'profile'=>'default.jpg',
                'username' => 'user',
                'email' => 'user@tes.tes',
                'password' => bcrypt('123123123'),
                'phone' => '6282130394490'
            ]
        );
        $user->assignRole('User');
    }
}
