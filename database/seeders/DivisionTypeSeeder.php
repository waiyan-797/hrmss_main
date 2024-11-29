<?php

namespace Database\Seeders;

use App\Models\DivisionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DivisionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DivisionType::truncate();
        Schema::enableForeignKeyConstraints();

        DivisionType::create([
            'name' => 'ရန်ကုန်ရုံးချုပ်',
        ]);

        DivisionType::create([
            'name' => 'တိုင်းဒေသကြီး/ပြည်နယ်',
        ]);
    }
}
