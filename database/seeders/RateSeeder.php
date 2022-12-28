<?php

namespace Database\Seeders;

use App\Models\Rate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rate::create([
            'level' => 1
        ]);
        Rate::create([
            'level' => 2
        ]);
        Rate::create([
            'level' => 3
        ]);
        Rate::create([
            'level' => 4
        ]);
        Rate::create([
            'level' => 5
        ]);
    }
}
