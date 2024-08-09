<?php

namespace Database\Seeders;
use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Schema;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Country::truncate();
        Schema::enableForeignKeyConstraints();

        $all = getcsv(__DIR__.'/countries.csv');
        foreach ($all as [$result]) {
            Country::firstOrCreate(['name' => $result]);
        }
    }
}
