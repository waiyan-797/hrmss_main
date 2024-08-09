<?php

namespace Database\Seeders;
use App\Models\Relation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class RelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Relation::truncate();
        Schema::enableForeignKeyConstraints();

        $columns = ['id', 'name'];

        $items = [
            [1, 'ဇနီး'],
            [2, 'ခင်ပွန်း'],
            [3, 'သား'],
            [4, 'သမီး'],
            [5, 'မိခင်'],
            [6, 'ဖခင်'],
            [7, 'အကို'],
            [8, 'အမ'],
            [9, 'ညီ'],
            [10, 'မောင်'],
            [11, 'ညီမ'],
            [12, 'ဦးလေး'],
            [13, 'အဒေါ်'],
            [14, 'တူ'],
            [15, 'တူမ'],
            [16, 'အဖိုး'],
            [17, 'အဖွား'],
            [18, 'မြေး']
        ];

        foreach ($items as $item) {
            Relation::create(array_combine($columns, $item));
        }
    }
}
