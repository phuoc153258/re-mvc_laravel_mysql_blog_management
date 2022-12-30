<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Report::create([
            'name' => 'Spam'
        ]);
        Report::create([
            'name' => 'Rules Violation'
        ]);
        Report::create([
            'name' => 'Harassment'
        ]);
        Report::create([
            'name' => 'Infringes copyright'
        ]);
        Report::create([
            'name' => 'Poor Translation'
        ]);
    }
}
