<?php

namespace Database\Seeders;

use App\Models\MaritalStatusType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class MaritalStatusTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        MaritalStatusType::truncate();
        Schema::enableForeignKeyConstraints();
        $columns = ['id', 'name'];
        $items = [
            [1,'single'],
            [2,'married'],
           
           
        ];
        foreach ($items as $item) {
            MaritalStatusType::create(array_combine($columns, $item));
        }
    }
}
