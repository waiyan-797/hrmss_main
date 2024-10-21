<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DifficultyLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            'low',
            'medium',
            'hard'
        ];
        foreach ($levels as $level) {
            DB::table('difficulty_levels')->insert([
                'name' => $level
            ]);
        }
    }
}
