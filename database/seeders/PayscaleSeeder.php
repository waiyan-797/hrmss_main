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

        $columns = ['id', 'name', 'min_salary', 'increment','max_salary'];

        $items = [
            [1, '၅၅၀၀၀၀', '၅၅၀၀၀၀', '-', '၅၅၀၀၀၀'],
            [2, '၄၁၈၀၀၀-၄၀၀၀-၄၃၈၀၀၀', '၄၁၈၀၀၀', '၄၀၀၀', '၄၃၈၀၀၀'],
            [3, '၃၇၄၀၀၀-၄၀၀၀-၃၉၄၀၀၀', '၃၇၄၀၀၀', '၄၀၀၀', '၃၉၄၀၀၀'],
            [4, '၃၄၁၀၀၀-၄၀၀၀-၃၆၁၀၀၀', '၃၄၁၀၀၀', '၄၀၀၀', '၃၆၁၀၀၀'],
            [5, '၃၀၈၀၀၀-၄၀၀၀-၃၂၈၀၀၀', '၃၀၈၀၀၀', '၄၀၀၀', '၃၂၈၀၀၀'],
            [6, '၂၇၅၀၀၀-၄၀၀၀-၂၉၅၀၀၀', '၂၇၅၀၀၀', '၄၀၀၀', '၂၉၅၀၀၀'],
            [7, '၂၃၄၀၀၀-၂၀၀၀-၂၄၄၀၀၀', '၂၃၄၀၀၀', '၂၀၀၀', '၂၄၄၀၀၀'],
            [8, '၂၁၆၀၀၀-၂၀၀၀-၂၂၆၀၀၀', '၂၁၆၀၀၀', '၂၀၀၀', '၂၂၆၀၀၀'],
            [9, '၁၉၈၀၀၀-၂၀၀၀-၂၀၈၀၀၀', '၁၉၈၀၀၀', '၂၀၀၀', '၂၀၈၀၀၀'],
            [10, '၁၈၀၀၀၀-၂၀၀၀-၁၉၀၀၀၀', '၁၈၀၀၀၀', '၂၀၀၀', '၁၉၀၀၀၀'],
            [11, '၁၆၂၀၀၀-၂၀၀၀-၁၇၂၀၀၀', '၁၆၂၀၀၀', '၂၀၀၀', '၁၇၂၀၀၀'],
            [12, '၁၄၄၀၀၀-၂၀၀၀-၁၅၄၀၀၀', '၁၄၄၀၀၀', '၂၀၀၀','၁၅၄၀၀၀']
        ];

        foreach ($items as $item) {
            Payscale::create(array_combine($columns, $item));
        }
    }
}
