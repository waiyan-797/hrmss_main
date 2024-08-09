<?php

namespace Database\Seeders;

use App\Models\Ethnic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class EthnicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Ethnic::truncate();
        Schema::enableForeignKeyConstraints();

        $columns = ['id', 'name'];
        $items = [
            [1, 'လားဟူ'],
            [2, 'နာဂ'],
            [3, 'ဝ'],
            [4, 'ပေါင်'],
            [5, 'ဂျိမ်းဖော'],
            [6, 'ဆလုံ'],
            [7, 'ပအို့'],
            [8, 'ရှမ်း၊တရုတ်'],
            [9,'လားဆူ'],
            [10,'ပလောင်'],
            [11,'စကော'],
            [12,'ပိုးကရင်'],
            [13,'နာဂ'],
            [14,'မြိတ်'],
            [15,'‌ယော'],
            [16,'ဓနု']
        ];

        foreach ($items as $item) {
            Ethnic::create(array_combine($columns, $item));
        }
    }
}
