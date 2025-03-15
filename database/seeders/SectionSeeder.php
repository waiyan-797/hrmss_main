<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SectionSeeder extends Seeder
{

    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Section::truncate();
        Schema::enableForeignKeyConstraints();

        $columns = ['id', 'name', 'division_id'];
        $items = [
            [1, 'ဝန်ထမ်းရေးရာ', 1],
            [2, 'ငွေစာရင်း', 1],
            [3, 'အထွေထွေ',  1],
            
        ];

        foreach ($items as $item) {
            Section::create(array_combine($columns, $item));
        }
    }
}
