<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'lihat-user']);
        Permission::create(['name' => 'edit-user']);
        Permission::create(['name' => 'tambah-user']);
        Permission::create(['name' => 'hapus-user']);

        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Super-Admin']);
        Role::create(['name' => 'User']);
        Role::create(['name' => 'PBB']);
        Role::create(['name' => 'PKB']);

        $roleAdmin = Role::findByName('Admin');
        $roleAdmin->givePermissionTo('lihat-user');

        $rolesuperadmin = Role::findByName('Super-Admin');
        $rolesuperadmin->givePermissionTo('edit-user');
        $rolesuperadmin->givePermissionTo('tambah-user');

        $roleuser = Role::findByName('User');
        $roleuser->givePermissionTo('hapus-user');
    }
}
