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
        $columns = ['id', 'name','marital_status_type_id'];
        $items = [
            [1,'လူပျို',1],
            [2,'အပျို',1],
            [3,'မုဆိုးဖို',1],
            [4,'မုဆိုးမ',1],
            [5,'တခုလပ်',1],
            [6,'အိမ်ထောင်သည်',2],
           
        ];
        foreach ($items as $item) {
            MaritalStatus::create(array_combine($columns, $item));
        }
    }
}
