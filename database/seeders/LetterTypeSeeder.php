<?php

namespace Database\Seeders;

use App\Models\LetterType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class LetterTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        LetterType::truncate();
        Schema::enableForeignKeyConstraints();

        $columns = ['id', 'name'];
        $items = [
            [1, 'လျှိုဝှက်'], 
            [2, 'ကန့်သက်'], 
            [3, 'အတွင်းရေး'] 
            
        ];

        foreach ($items as $item) {
            LetterType::create(array_combine($columns, $item));
        }
    }
}
