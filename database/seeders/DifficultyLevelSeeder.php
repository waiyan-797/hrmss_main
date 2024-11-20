<?php

namespace Database\Seeders;

use App\Models\DifficultyLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DifficultyLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DifficultyLevel::truncate();
        Schema::enableForeignKeyConstraints();

        $columns = ['id', 'name','hardship_allowance'];
        $items = [
            [1, 'easy',0],
            [2, 'hard', 5000]
           
        ];

        foreach ($items as $item) {
            DifficultyLevel::create(array_combine($columns, $item));
        }
    }
}
