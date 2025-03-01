<?php

namespace Database\Seeders;
use App\Models\pension_type;
use App\Models\PensionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PensionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        PensionType::truncate();
        Schema::enableForeignKeyConstraints();

        $columns = ['id', 'name', 'retire_type_id'];

        $items = [
            [1, 'သက်ပြည့်ပင်စင်', 5],
            [2, 'နှစ်ပြည့်ပင်စင်', 5],
            [3, 'နာမကျန်းပင်စင်', 5],
            [4, 'လျော်ကြေးပင်စင်', 5],
            [5, 'အထူးပင်စင်', 5],
            [6, 'မိသားစုပင်စင်', 5],
            [7, 'လျှော့ပေါ့ပင်စင်', 5],
        ];

        foreach ($items as $item) {
            PensionType::create(array_combine($columns, $item));
        }
    }
}
