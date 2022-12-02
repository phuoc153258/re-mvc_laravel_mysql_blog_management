<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'Get list blog']);
        Permission::create(['name' => 'Get blog']);
        Permission::create(['name' => 'Add blog']);
        Permission::create(['name' => 'Update blog']);
        Permission::create(['name' => 'Delete blog']);

        Permission::create(['name' => 'Get list users']);
        Permission::create(['name' => 'Get user']);
        Permission::create(['name' => 'Update user']);
        Permission::create(['name' => 'Delete user']);
        Permission::create(['name' => 'Change password user']);
    }
}
