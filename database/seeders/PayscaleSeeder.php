<?php

namespace Database\Seeders;
use App\Models\Payscale;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PayscaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Payscale::truncate();
        Schema::enableForeignKeyConstraints();

        $columns = ['id', 'name', 'min_salary', 'increment','max_salary','staff_type_id','allowed_qty'];

        $items = [
            [1, '၅၅၀၀၀၀', '၅၅၀၀၀၀', '-', '၅၅၀၀၀၀','1','1'],
            [2, '၄၁၈၀၀၀-၄၀၀၀-၄၃၈၀၀၀', '၄၁၈၀၀၀', '၄၀၀၀', '၄၃၈၀၀၀','1','4'],
            [3, '၃၇၄၀၀၀-၄၀၀၀-၃၉၄၀၀၀', '၃၇၄၀၀၀', '၄၀၀၀', '၃၉၄၀၀၀','1','26'],
            [4, '၃၄၁၀၀၀-၄၀၀၀-၃၆၁၀၀၀', '၃၄၁၀၀၀', '၄၀၀၀', '၃၆၁၀၀၀','1','68'],
            [5, '၃၀၈၀၀၀-၄၀၀၀-၃၂၈၀၀၀', '၃၀၈၀၀၀', '၄၀၀၀', '၃၂၈၀၀၀','1','101'],
            [6, '၂၇၅၀၀၀-၄၀၀၀-၂၉၅၀၀၀', '၂၇၅၀၀၀', '၄၀၀၀', '၂၉၅၀၀၀','1','175'],
            [7, '၂၃၄၀၀၀-၂၀၀၀-၂၄၄၀၀၀', '၂၃၄၀၀၀', '၂၀၀၀', '၂၄၄၀၀၀','2','6'],
            [8, '၂၁၆၀၀၀-၂၀၀၀-၂၂၆၀၀၀', '၂၁၆၀၀၀', '၂၀၀၀', '၂၂၆၀၀၀','2','194'],
            [9, '၁၉၈၀၀၀-၂၀၀၀-၂၀၈၀၀၀', '၁၉၈၀၀၀', '၂၀၀၀', '၂၀၈၀၀၀','2','98'],
            [10, '၁၈၀၀၀၀-၂၀၀၀-၁၉၀၀၀၀', '၁၈၀၀၀၀', '၂၀၀၀', '၁၉၀၀၀၀','2','91'],
            [11, '၁၆၂၀၀၀-၂၀၀၀-၁၇၂၀၀၀', '၁၆၂၀၀၀', '၂၀၀၀', '၁၇၂၀၀၀','2','39'],
            [12, '၁၄၄၀၀၀-၂၀၀၀-၁၅၄၀၀၀', '၁၄၄၀၀၀', '၂၀၀၀','၁၅၄၀၀၀','2','56']
        ];

        foreach ($items as $item) {
            Payscale::create(array_combine($columns, $item));
        }
    }
}
