<?php

namespace Database\Seeders;

use App\Models\RetireType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class RetireTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        RetireType::truncate();
        Schema::enableForeignKeyConstraints();

        $columns = ['id', 'name'];

        $items = [
            [1, 'သေဆုံး'],
            [2, 'နုတ်ထွက်'],
            [3, 'ထုတ်ပယ်'],
            [4, 'ထုတ်ပစ်'],
            [5, 'ပင်စင်'],
            [6, 'ပြောင်းရွေ့ထွက်ခွာ']

        ];

        foreach ($items as $item) {
            RetireType::create(array_combine($columns, $item));
        }
    }
}
