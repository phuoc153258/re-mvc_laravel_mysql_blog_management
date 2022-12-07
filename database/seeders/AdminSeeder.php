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
            'email' => '19T1021186@husc.edu.vn',
            'avatar' => 'image/user_avatar_default.jpg',
            'password' => '$2y$10$Gii.ZY8LlkdIN6mUEw5ojOaawUKgfLP5wZxcjocF1BIgv0egyzIOq',
            'is_email_verified' => false,
            'email_verified_at' => null,
        ])->assignRole([1, 2])->givePermissionTo([1, 2, 3, 4, 5, 6, 7, 8]);

        User::create([
            'username' => 'phuoc1',
            'fullname' => 'phuoc1',
            'email' => 'nguyendonphuochusc@gmail.com',
            'avatar' => 'image/user_avatar_default.jpg',
            'password' => '$2y$10$Gii.ZY8LlkdIN6mUEw5ojOaawUKgfLP5wZxcjocF1BIgv0egyzIOq',
            'is_email_verified' => false,
            'email_verified_at' => null,
        ])->assignRole([1, 2])->givePermissionTo([1, 2, 3, 4, 5, 6, 7, 8]);

        User::create([
            'username' => 'phuoc2',
            'fullname' => 'phuoc2',
            'email' => 'hamburger153258@gmail.com',
            'avatar' => 'image/user_avatar_default.jpg',
            'password' => '$2y$10$Gii.ZY8LlkdIN6mUEw5ojOaawUKgfLP5wZxcjocF1BIgv0egyzIOq',
            'is_email_verified' => false,
            'email_verified_at' => null,
        ])->assignRole([2])->givePermissionTo([1, 2, 3, 4, 5, 6, 7, 8]);
    }
}
