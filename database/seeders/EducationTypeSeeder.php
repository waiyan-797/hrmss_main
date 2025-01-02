<?php

namespace Database\Seeders;

use App\Models\EducationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class EducationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        EducationType::truncate();
        Schema::enableForeignKeyConstraints();
        $columns = ['id', 'name', 'education_group_id'];
        $items = [
            [1, 'မူလတန်း','1'],
            [2, 'အလယ်တန်း','1'],
            [3, 'အထက်တန်း','1'],
            [4, 'B.A ဝိဇ္ဇာဘွဲ့ အမျိုးအစား','2'],
            [5, 'B.Sc သိပ္ပံဘွဲ့ အမျိုးအစား','2'],
            [6, 'B.C.Sc. ကွန်ပျူတာသိပ္ပံဘွဲ့အမျိုးအစား','2'],
            [7, 'B.A(Hons.) ဝိဇ္ဇာဘွဲ့ဂုဏ်ထူးတန်း','3'],
            [8, 'B.Sc(Hons.) သိပ္ပံဘွဲ့ဂုဏ်ထူးတန်း','3'],
            [9, 'M.A (မဟာဝိဇ္ဇာဘွဲ့)','4'],
            [10, 'M.Sc (မဟာသိပ္ပံဘွဲ့)','4'],
            [11, 'M.C.Sc (မဟာကွန်ပျူတာသိပ္ပံဘွဲ့)','4'],
            [12, 'M.Res','4'],
            [13, 'စီးပွားရေး','5'],
            [14, 'အင်ဂျင်နီယာ','5'],
            [15, 'ဥပဒေ','5'],
            [16, 'ဘာသာစကား','5'],
            [17, 'ဒီပလိုမာ','5'],
            [18, 'စီးပွားရေး','6'],
            [19, 'အင်ဂျင်နီယာ','6'],
            [20, 'ဥပဒေ','6'],
            [21, 'ဘာသာစကား','6'],
            [23, 'စီးပွားရေး','7'],
            [24, 'အင်ဂျင်နီယာ','7'],
            [25, 'ဥပဒေ','7'],
            [26, 'ဘာသာစကား','7'],
            [27, 'အခြား','7'],
        ];

        foreach($items as $item){
            EducationType::create(array_combine($columns,$item));
        }
    }
}
