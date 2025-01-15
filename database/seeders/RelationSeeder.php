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

        $columns = ['id', 'name', 'relation_ship_type_id'];

        $items = [
            [1, 'ဇနီး', 3], // Spouse
            [2, 'ခင်ပွန်း', 3], // Spouse
            [3, 'သား', 5], // Child
            [4, 'သမီး', 5], // Child
            [5, 'မိခင်', 2], // Parent
            [6, 'ဖခင်', 2], // Parent
            [7, 'အစ်ကို', 1], // Sibling
            [8, 'အစ်မ', 1], // Sibling
            [9, 'ညီ', 1], // Sibling
            [10, 'မောင်', 1], // Sibling
            [11, 'ညီမ', 1], // Sibling
            [12, 'ဦးလေး', 6], // Uncle
            [13, 'အဒေါ်', 7], // Aunt
            [14, 'တူ', 9], // Nephew
            [15, 'တူမ', 10], // Niece
            [16, 'အဖိုး', 4], // GrandParent
            [17, 'အဖွား', 4], // GrandParent
            [18, 'မြေး', 11], // GrandChild
        ];

        foreach ($items as $item) {
            Relation::create(array_combine($columns, $item));
        }
    }
}
