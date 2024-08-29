<?php

namespace Database\Seeders;

use App\Models\Rank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $columns = ['name'];
        $values = [
            ['ညွှန်ကြားရေးမှူးချုပ်'],
            ['ဒုတိယညွှန်ကြားရေးမှူးချုပ်'],
            ['ညွှန်ကြားရေးမှူး'],
            ['ဒုတိယညွှန်ကြားရေးမှူး'],
            ['လက်ထောက်ညွှန်ကြားရေးမှူး'],
            ['ဦးစီးအရာရှိ'],
        ];

        foreach ($values as $val) {
            Rank::create(array_combine($columns, $val));
        }
    }
}
