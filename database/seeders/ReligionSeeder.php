<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Religion::truncate();
        Schema::enableForeignKeyConstraints();

        $columns = ['id', 'name'];
        $items = [
            [1, 'ဗုဒ္ဓ'],
            [2, 'ခရစ်ယာန်'],
            [3, 'ဟိန္ဒူ'],
            [4, 'အစ္စလာမ်'],
            [5, 'အခြား'],

        ];

        foreach ($items as $item) {
            Religion::create(array_combine($columns, $item));
        }
    }
}
