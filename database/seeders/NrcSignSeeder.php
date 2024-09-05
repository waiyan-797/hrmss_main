<?php

namespace Database\Seeders;

use App\Models\NrcSign;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class NrcSignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        NrcSign::truncate();
        Schema::enableForeignKeyConstraints();

        $all = getcsv(__DIR__.'/nrcsigns.csv');
        foreach ($all as $result) {
            NrcSign::firstOrCreate(['name' => $result[0]]);
        }

    }
}
