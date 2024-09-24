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
        

        #Education Type

$columns = ['id', 'name', 'education_group_id'];
$items = [
[1, 'B.A ဝိဇ္ဇာဘွဲ့ အမျိုးအစား','1'],
[2, 'B.Sc သိပ္ပံဘွဲ့ အမျိုးအစား','1'],
[3, 'B.C.Sc. ကွန်ပျူတာသိပ္ပံဘွဲ့အမျိုးအစား','1'],
[4, 'B.A(Hons.) ဝိဇ္ဇာဘွဲ့ဂုဏ်ထူးတန်း','2'],
[5, 'B.Sc(Hons.) သိပ္ပံဘွဲ့ဂုဏ်ထူးတန်း','2'],
[6, 'စီးပွားရေး','3'],
[7, 'အင်ဂျင်နီယာ','3'],
[8, 'ဥပဒေ','3'],
[9, 'ဘာသာစကား','3'],
[10, 'အခြား','3'],
[11, 'M.A (မဟာဝိဇ္ဇာဘွဲ့)','4'],
[12, 'M.Sc (မဟာသိပ္ပံဘွဲ့)','4'],
[13, 'M.C.Sc (မဟာကွန်ပျူတာသိပ္ပံဘွဲ့)','4'],
[14, 'M.Res','4'],
[15, 'စီးပွားရေး','5'],
[16, 'အင်ဂျင်နီယာ','5'],
[17, 'ဥပဒေ','5'],
[18, 'ဘာသာစကား','5'],
[19, 'အခြား','5'],
[20, 'စီးပွားရေး','6'],
[21, 'အင်ဂျင်နီယာ','6'],
[22, 'ဥပဒေ','6'],
[23, 'ဘာသာစကား','6'],
[24, 'အခြား','6'],
];
        foreach($items as $item){
            EducationType::create(array_combine($columns,$item));
        }
    }
}
