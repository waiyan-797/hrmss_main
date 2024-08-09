<?php

namespace Database\Seeders;
use App\Models\Gender;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Gender::truncate();
        Schema::enableForeignKeyConstraints();

        Gender::create([
            'name' => 'ကျား',
        ]);

        Gender::create([
            'name' => 'မ',
        ]);
    }
}
