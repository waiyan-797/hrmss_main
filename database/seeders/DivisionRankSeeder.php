<?php

namespace Database\Seeders;

use App\Models\DivisionRank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DivisionRankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DivisionRank::truncate();
        Schema::enableForeignKeyConstraints();

        $columns = ['rank_id', 'division_id', 'allowed_qty'];
        $items = [
            //Oo See Mhuu
            [6, 23, 10],
            [6, 26, 3],
            [6, 20, 4],
            [6, 24, 4],
            [6, 21, 4],
            [6, 25, 4],
            [6, 16, 4],
            [6, 17, 4],
            [6, 14, 4],
            [6, 18, 4],
            [6, 19, 4],
            [6, 13, 4],
            [6, 12, 4],
            [6, 22, 4],
            [6, 15, 4],
            //add another rank
        ];

        foreach ($items as $item) {
            DivisionRank::create(array_combine($columns, $item));
        }
    }
}
