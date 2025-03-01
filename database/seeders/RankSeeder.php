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

        $columns = ['id', 'name', 'payscale_id', 'staff_type_id', 'allowed_qty','sort_no' , 'is_dica', 'name1', 'name2' ];
        $items = [
            [1,'ညွှန်ကြားရေးမှူးချုပ်', 1, 1, 1,1 , 1, 'အမြဲတမ်းအတွင်းဝန်', 'ညွှန်ချုပ်'],
            [2,'ဒုတိယညွှန်ကြားရေးမှူးချုပ်', 2, 1, 4,2 , 1 , 'ဒုတိယအမြဲတမ်းအတွင်းဝန်', 'ဒု-ညွှန်ချုပ်'],
            [3,'ညွှန်ကြားရေးမှူး', 3, 1, 26,3 , 1 , 'လက်ထောက်အတွင်းဝန်', 'ညွှန်မှူး'],
            [4,'ဒုတိယညွှန်ကြားရေးမှူး', 4, 1, 68,4 , 1 , null, null],
            [5,'လက်ထောက်ညွှန်ကြားရေးမှူး', 5, 1, 101,5 , 1 , null, null],
            [6,'ဦးစီးအရာရှိ', 6, 1, 175,6 , 1 , null, null],
            [7,'ရုံးအုပ်', 7, 2, 3,7 , 1 , null, null],
            [8,'စာရင်းကိုင်(၁)', 7, 2, 3,8 , 1 , null, null],
            [9,'ဒုတိယဦးစီးမှူး', 8, 2, 179,9 , 1 , null, null],
            [10,'စာရင်းကိုင်(၂)', 8, 2, 8,10 , 1 , null, null],
            [11,'ဌာနခွဲစာရေး', 8, 2, 7,11 , 1 , null, null],
            [12,'အကြီးတန်းစာ‌ရေး', 9, 2, 86,13 , 1 , null, null],
            [13,'စာရင်းကိုင်(၃)', 9, 2, 12,12 , 1 , null, null],
            [14,'အငယ်တန်းစာရေး', 10, 2, 78,15 , 1 , null, null],
            [15,'စာရင်းကိုင်(၄)', 10, 2, 12,14 , 1 , null, null],
            [16,'ယာဉ်မောင်းစက်ပြင်(၄)', 10, 2, 1,16 , 1 , null, null],
            [17,'ရုံးအကူမှူး', 11, 2, 2,19 , 1 , null, null],
            [18,'စာကူးစက်လှည့်အကူ', 11, 2, 1,17 , 1 , null, null],
            [19,'ယာဉ်မောင်း(၅)', 11, 2, 36,18 , 1 , null, null],
            [20,'ရုံးအကူ', 12, 2, 37,20 , 1 , null, null],
            [21,'သန့်ရှင်း‌ရေးအကူ', 12, 2, 17,21 , 1 , null, null],
            [22,'အစောင့်', 12, 2, 2,22 , 1 , null, null],
            [23,'နေ့စား', 13, 3,  100,23 , 1 , null, null],
        ];

        foreach ($items as $item) {
            Rank::create(array_combine($columns, $item));
        }

        $all = getcsv(__DIR__.'/rank.csv');
        
        foreach ($all as [$result]) {
            
            Rank::create(['name' => $result]);
        }
    }
}

