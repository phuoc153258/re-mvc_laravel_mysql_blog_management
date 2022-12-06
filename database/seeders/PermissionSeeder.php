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
        Permission::create(['name' => 'user-get-me']);
        Permission::create(['name' => 'user-update-profile']);
        Permission::create(['name' => 'user-change-password']);

        Permission::create(['name' => 'user-get-my-blog-list']);
        Permission::create(['name' => 'user-get-my-blog']);
        Permission::create(['name' => 'user-create-my-blog']);
        Permission::create(['name' => 'user-update-my-blog']);
        Permission::create(['name' => 'user-delete-my-blog']);

        Permission::create(['name' => 'admin-get-user-list']);
        Permission::create(['name' => 'admin-get-user']);
        Permission::create(['name' => 'admin-update-user']);
        Permission::create(['name' => 'admin-delete-user']);
        Permission::create(['name' => 'admin-reset-password']);

        Permission::create(['name' => 'admin-get-blog-list']);
        Permission::create(['name' => 'admin-get-blog']);
        Permission::create(['name' => 'admin-create-blog']);
        Permission::create(['name' => 'admin-update-blog']);
        Permission::create(['name' => 'admin-delete-blog']);

        Permission::create(['name' => 'admin-get-role-list']);
        Permission::create(['name' => 'admin-get-role']);
        Permission::create(['name' => 'admin-get-create-role']);
        Permission::create(['name' => 'admin-get-update-role']);
        Permission::create(['name' => 'admin-get-delete-role']);
        Permission::create(['name' => 'admin-assign-role']);
        Permission::create(['name' => 'admin-remove-role']);

        Permission::create(['name' => 'admin-get-permission-list']);
        Permission::create(['name' => 'admin-get-permission']);
        Permission::create(['name' => 'admin-create-permission']);
        Permission::create(['name' => 'admin-update-permission']);
        Permission::create(['name' => 'admin-delete-permission']);
        Permission::create(['name' => 'admin-give-permission']);
        Permission::create(['name' => 'admin-revoke-permission']);
    }
}
