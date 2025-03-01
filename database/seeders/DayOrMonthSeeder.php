<?php

namespace Database\Seeders;

use App\Models\DayOrMonth;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DayOrMonthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DayOrMonth::truncate();
        Schema::enableForeignKeyConstraints();

        $columns = ['id', 'name'];
        $items = [
            [1, 'ရက်'],
            [2, 'လ']
        ];

        foreach ($items as $item) {
            DayOrMonth::create(array_combine($columns, $item));
        }
    }
}
