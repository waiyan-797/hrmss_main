<?php

namespace Database\Seeders;

use App\Models\Ministry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class MinistrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Ministry::truncate();
        Schema::enableForeignKeyConstraints();

        Ministry::create([
            'name' => 'a',
        ]);
    }
}
