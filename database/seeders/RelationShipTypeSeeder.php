<?php

namespace Database\Seeders;

use App\Models\RelationShipType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
class RelationShipTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        RelationShipType::truncate();
        Schema::enableForeignKeyConstraints();

        $columns = ['id', 'name'];

        $items = [        
            [1, 'Sibling'],
    [2, 'Parent'],
    [3, 'Spouse'],
    [4, 'GrandParents'],
    [5, 'Child'],
    [6, 'Uncle'],
    [7, 'Aunt'],
    [8, 'Cousin'],
    [9, 'Nephew'],
    [10, 'Niece'],
    [11, 'GrandChild']
        ];
        
        array_map(fn($item) => RelationShipType::create(array_combine($columns, $item)), $items);
        
    }
}
