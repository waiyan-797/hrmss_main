<?php

namespace Database\Seeders;

use App\Models\TrainingLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Schema;

class TrainingLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        TrainingLocation::truncate();
        Schema::enableForeignKeyConstraints();



        DB::table('training_locations')->insert([
            'name' =>'ပြည်တွင်း',
        ]);
        DB::table('training_locations')->insert([
            'name' =>'ပြည်ပ',
        ]);

    }
}
