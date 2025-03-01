<?php

namespace Database\Seeders;

use App\Models\PensionYear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PensionYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PensionYear::truncate();
        PensionYear::create([
            'year' => '1010',
        ]);
    }
}
