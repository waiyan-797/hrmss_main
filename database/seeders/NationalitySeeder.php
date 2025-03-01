<?php

namespace Database\Seeders;

use App\Models\Nationality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class NationalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Nationality::truncate();
        Schema::enableForeignKeyConstraints();

        $columns = ['id', 'name'];
        $items = [
            [1, 'ကချင်'],
            [2, 'ကယား'],
            [3, 'ကရင်'],
            [4, 'ချင်း'],
            [5, 'ဗမာ'],
            [6, 'မွန်'],
            [7, 'ရခိုင်'],
            [8, 'ရှမ်း']
        ];

        foreach ($items as $item) {
            Nationality::create(array_combine($columns, $item));
        }
    }
}
