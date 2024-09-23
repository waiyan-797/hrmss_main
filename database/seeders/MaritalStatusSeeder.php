<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaritalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('marital_statuses')->insert([
            'name' => 'လူပျို',
        ]);
        DB::table('marital_statuses')->insert([
            'name' => 'အပျို',
        ]);
        DB::table('marital_statuses')->insert([
            'name' => 'မုဆိုးမ',
        ]);
        DB::table('marital_statuses')->insert([
            'name' => 'တခုလပ်',
        ]);
    }
}
