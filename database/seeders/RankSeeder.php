<?php

namespace Database\Seeders;

use App\Models\Rank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Rank::truncate();
        Schema::enableForeignKeyConstraints();

        $columns = ['id', 'name', 'payscale_id', 'staff_type_id', 'allowed_qty' ];
                    


        $items = [
            [1,'ညွှန်ကြားရေးမှူးချုပ်', 1, 1, 1],
            [2,'ဒုတိယညွှန်ကြားရေးမှူးချုပ်', 2, 1, 4],
            [3,'ညွှန်ကြားရေးမှူး', 3, 1, 26],
            [4,'ဒုတိယညွှန်ကြားရေးမှူး', 4, 1, 68],
            [5,'လက်ထောက်ညွှန်ကြားရေးမှူး', 5, 1, 101],
            [6,'ဦးစီးအရာရှိ', 6, 1, 175],
            [7,'ရုံးအုပ်', 7, 2, 3],
            [8,'စာရင်းကိုင်(၁)', 7, 2, 3],
            [9,'ဒုတိယဦးစီးမှူး', 8, 2, 179],
            [10,'စာရင်းကိုင်(၂)', 8, 2, 8],
            [11,'ဌာနခွဲစာရေး', 8, 2, 7],
            [12,'အကြီးတန်းစာ‌ရေး', 9, 2, 86],
            [13,'စာရင်းကိုင်(၃)', 9, 2, 12],
            [14,'အငယ်တန်းစာရေး', 10, 2, 78],
            [15,'စာရင်းကိုင်(၄)', 10, 2, 12],
          
            [16,'ယာဉ်မောင်းစက်ပြင်', 10, 2, 1],
            [17,'ရုံးအကူမှူး', 11, 2, 2],
            [18,'စာကူးစက်လှည့်', 11, 2, 1],
            [19,'ယာဉ်မောင်း(၅)', 11, 2, 36],
            [20,'ရုံးအကူ', 12, 2, 37],
            [21,'သန့်ရှင်း‌ရေးအကူ', 12, 2, 17],
            [22,'အစောင့်', 12, 2, 2],
            [23,'နေ့စား', 13, 3,  100],
        ];

        foreach ($items as $item) {
            Rank::create(array_combine($columns, $item));
        }
    }
}
