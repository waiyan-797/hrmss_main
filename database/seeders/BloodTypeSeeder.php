<?php

namespace Database\Seeders;

use App\Models\BloodType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class BloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        BloodType::truncate();
        Schema::enableForeignKeyConstraints();
        BloodType::create([
            'name' => 'A',
        ]);
    }
}
