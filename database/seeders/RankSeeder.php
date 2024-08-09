<?php

namespace Database\Seeders;

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
        DB::table('ranks')->insert([
            'name' => 'ညွှန်ကြားရေးမှူးချုပ်',
           
        ]);

        DB::table('ranks')->insert([
            'name' => 'ဒုတိယညွှန်ကြားရေးမှူးချုပ်',
           
        ]);

        DB::table('ranks')->insert([
            'name' => 'ညွှန်ကြားရေးမှူး',
           
        ]);

        DB::table('ranks')->insert([
            'name' => 'ဒုတိယညွှန်ကြားရေးမှူး',
           
        ]);

        DB::table('ranks')->insert([
            'name' => 'လက်ထောက်ညွှန်ကြားရေးမှူး',
           
        ]);

        DB::table('ranks')->insert([
            'name' => 'ဦးစီးအရာရှိ',
           
        ]);
    }
}
