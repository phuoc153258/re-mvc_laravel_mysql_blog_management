<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'admin',
            'fullname' => 'admin',
            'email' => 'admin@gmail.com',
            'avatar' => 'image/user_avatar_default.jpg',
            'password' => '$2y$10$Gii.ZY8LlkdIN6mUEw5ojOaawUKgfLP5wZxcjocF1BIgv0egyzIOq',
        ])->assignRole([1, 2])->givePermissionTo([1, 2, 3, 4, 5]);

        User::create([
            'username' => 'phuoc1',
            'fullname' => 'phuoc1',
            'email' => 'phuoc1@gmail.com',
            'avatar' => 'image/user_avatar_default.jpg',
            'password' => '$2y$10$Gii.ZY8LlkdIN6mUEw5ojOaawUKgfLP5wZxcjocF1BIgv0egyzIOq',
        ])->assignRole([1])->givePermissionTo([1, 2, 3]);
    }
}
