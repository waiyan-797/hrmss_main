<?php

namespace Database\Seeders;

use App\Models\MaritalStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class MaritalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        MaritalStatus::truncate();
        Schema::enableForeignKeyConstraints();
        $columns = ['id', 'name'];
        $items = [
            [1,'လူပျို'],
            [2,'အပျို'],
            [3,'မုဆိုးဖို'],
            [4,'မုဆိုးမ'],
            [5,'တခုလပ်'],
           
        ];
        foreach ($items as $item) {
            MaritalStatus::create(array_combine($columns, $item));
        }
    }
}
