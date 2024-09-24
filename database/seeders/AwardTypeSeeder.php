<?php

namespace Database\Seeders;
use App\Models\AwardType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class AwardTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        AwardType::truncate();
        Schema::enableForeignKeyConstraints();

       $columns=['id','name'];
$items = [
[1, 'သုဓမ္မသင်္ဂဟဘွဲ့များ'],
[2, 'ပြည်ထောင်စုစည်သူသင်္ဂဟဘွဲ့များ'],
[3, 'တပ်မတော်ဆိုင်ရာစွမ်းရည်သတ္တိနှင့် စွမ်းဆောင်မှုဆိုင်ရာ ဂုဏ်ထူးဆောင်တံဆိပ်များ'],
[4, 'မြန်မာနိုင်ငံရဲတပ်ဖွဲ့ဆိုင်ရာ စွမ်းရည်သတ္တိနှင့် စွမ်းဆောင်မှုဆိုင်ရာ ဂုဏ်ထူးဆောင်တံဆိပ်များ'],
[5, 'ပြည်သူ့ဝန်ထမ်းဆိုင်ရာစွမ်းဆောင်မှုတံဆိပ်များ'],
[6, 'စီးပွားထူးချွန်တံဆိပ်များ'],
[7, 'ပညာရပ်ဆိုင်ရာထူးချွန်တံဆိပ်များ'],
[8, 'အခြားဘွဲ့ထူး/ဂုဏ်ထူး/တံဆိပ်များ'],
];
foreach($items as $item){
    AwardType::create(array_combine($columns,$item));

}
    }
}
