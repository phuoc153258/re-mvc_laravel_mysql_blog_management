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
        Permission::create(['name' => 'get-list-blog']);
        Permission::create(['name' => 'get-blog']);
        Permission::create(['name' => 'add-blog']);
        Permission::create(['name' => 'update-blog']);
        Permission::create(['name' => 'delete-blog']);

        Permission::create(['name' => 'get-list-user']);
        Permission::create(['name' => 'get-user']);
        Permission::create(['name' => 'update-user']);
        Permission::create(['name' => 'delete-user']);
        Permission::create(['name' => 'change-password-user']);
    }
}
