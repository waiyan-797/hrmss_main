<?php

namespace Database\Seeders;

use App\Models\PenaltyType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PenaltyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        PenaltyType::truncate();
        Schema::enableForeignKeyConstraints();

        $columns = ['id', 'name'];

        $items = [
            [1, 'စာဖြင့်သတိပေးခြင်း'],
            [2, 'နှစ်တိုးလစာရပ်ဆိုင်းခြင်း'],
            [3, 'ရာထူးတိုးမြှင့်ခြင်းကိုရပ်ဆိုင်းခြင်း'],
            [4, 'လစာနှုန်းအတွင်း လစာလျှော့ချခြင်း'],
            [5, 'ရာထူးအဆင့်လျှော့ချခြင်း'],
            [6, 'ငွေကြေးဆုံးရှုံးမှုတန်ဖိုး အပြည့်အဝ (သို့) တစ်စိတ်တစ်ဒေသကို ပေးလျော်စေခြင်း'],
            [7, 'တာဝန်မှယာယီရပ်ဆိုင်းခဲ့သည့်ကာလအတွက် လစာအပြည့်ခံစားခွင့်မပြုခြင်း (သို့) တာဝန်ချိန်အဖြစ်မသတ်မှတ်ခြင်း'],
            [8, 'ရာထူးမှထုတ်ပယ်ခြင်း'],
            [9, 'ဝန်ထမ်းအဖြစ်မှထုတ်ပစ်ခြင်း'],
            [10, 'တာဝန်မှယာယီရပ်စဲခြင်း'],
            [11, 'ဒေသပြောင်းရွှေ့ခြင်း']
        ];

        foreach ($items as $item) {
            PenaltyType::create(array_combine($columns, $item));
        }
    }
}
