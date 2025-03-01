<?php

namespace Database\Seeders;

use App\Models\MilitaryService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class MilitaryServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        MilitaryService::truncate();
        Schema::enableForeignKeyConstraints();

        $columns = ['id', 'name'];
        $items = [
            [1, 'တာ၀န်ထမ်းဆောင်ရန်ကျန်'],
            [2, 'တာ၀န်ထမ်းဆောင်စဲ'],
            [3, 'တာ၀န်ထမ်းဆောင်ပြီး'],
        ];

        foreach ($items as $item) {
            MilitaryService::create(array_combine($columns, $item));
        }
    }
}
