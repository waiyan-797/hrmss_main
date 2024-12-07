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

        $columns = ['id', 'name', 'payscale_id', 'staff_type_id', 'allowed_qty','sort_no' ];
        $items = [
            [1,'ညွှန်ကြားရေးမှူးချုပ်', 1, 1, 1,1],
            [2,'ဒုတိယညွှန်ကြားရေးမှူးချုပ်', 2, 1, 4,2],
            [3,'ညွှန်ကြားရေးမှူး', 3, 1, 26,3],
            [4,'ဒုတိယညွှန်ကြားရေးမှူး', 4, 1, 68,4],
            [5,'လက်ထောက်ညွှန်ကြားရေးမှူး', 5, 1, 101,5],
            [6,'ဦးစီးအရာရှိ', 6, 1, 175,6],
            [7,'ရုံးအုပ်', 7, 2, 3,7],
            [8,'စာရင်းကိုင်(၁)', 7, 2, 3,8],
            [9,'ဒုတိယဦးစီးမှူး', 8, 2, 179,9],
            [10,'စာရင်းကိုင်(၂)', 8, 2, 8,10],
            [11,'ဌာနခွဲစာရေး', 8, 2, 7,11],
            [12,'အကြီးတန်းစာရေး', 9, 2, 86,12],
            [13,'စာရင်းကိုင်(၃)', 9, 2, 12,13],
            [14,'အငယ်တန်းစာရေး', 10, 2, 78,14],
            [15,'စာရင်းကိုင်(၄)', 10, 2, 12,15],
            [16,'ယာဉ်မောင်းစက်ပြင်', 10, 2, 1,16],
            [17,'ရုံးအကူမှူး', 11, 2, 2,17],
            [18,'စာကူးစက်လှည့်', 11, 2, 1,18],
            [19,'ယာဉ်မောင်း(၅)', 11, 2, 36,19],
            [20,'ရုံးအကူ', 12, 2, 37,20],
            [21,'သန့်ရှင်း‌ရေးအကူ', 12, 2, 17,21],
            [22,'အစောင့်', 12, 2, 2,22],
            [23,'နေ့စား', 13, 3,  100,23],
        ];

        foreach ($items as $item) {
            Rank::create(array_combine($columns, $item));
        }
    }
}
