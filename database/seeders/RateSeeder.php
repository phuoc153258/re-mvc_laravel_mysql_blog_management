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
            'rate_number' => 1
        ]);
        Rate::create([
            'rate_number' => 2
        ]);
        Rate::create([
            'rate_number' => 3
        ]);
        Rate::create([
            'rate_number' => 4
        ]);
        Rate::create([
            'rate_number' => 5
        ]);
    }
}
