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
            [1, 'ဝိဇ္ဇာဘွဲ့( မဟာဘွဲ့ )','4'],
            [2, 'သိပ္ပံဘွဲ့( မဟာဘွဲ့ )','4'],
            [3, 'စီးပွားရေးဘွဲ့( မဟာဘွဲ့ )','4'],
            [4, 'ဥပဒေဘွဲ့( မဟာဘွဲ့ )','4'],
            [5, 'အင်ဂျင်နီယာဘွဲ့( မဟာဘွဲ့ )','4'],
            [6, 'ကွန်ပျူတာဘွဲ့( မဟာဘွဲ့ )','4'],
            [7, 'ပြည်ပမဟာဘွဲ့( မဟာဘွဲ့ )','4'],
            [8, 'ပြည်တွင်းမဟာဘွဲ့( မဟာဘွဲ့ )','4'],
            [9, 'ဝိဇ္ဇာဘွဲ့( ရိုးရိုးဘွဲ့ )','2'],
            [10, 'သိပ္ပံဘွဲ့( ရိုးရိုးဘွဲ့ )','2'],
            [11, 'စီးပွားရေးဘွဲ့( ရိုးရိုးဘွဲ့ )','2'],
            [12, 'ဥပဒေဘွဲ့( ရိုးရိုးဘွဲ့ )','2'],
            [13, 'အင်ဂျင်နီယာဘွဲ့( ရိုးရိုးဘွဲ့ )','2'],
            [14, 'ကွန်ပျူတာဘွဲ့( ရိုးရိုးဘွဲ့ )','2'],
            [15, 'တက္ကသိုလ်တက်ရောက်ဆဲ( ရိုးရိုးဘွဲ့ )','2'],
            [16, 'နိုင်ငံခြားဘာသာတက္ကသိုလ်( ရိုးရိုးဘွဲ့ )','2'],
            [17, 'ဆေးဘက်ဆိုင်ရာဘွဲ့( ရိုးရိုးဘွဲ့ )','2'],
            [18, 'စီးပွားရေးဘွဲ့(Ph.D)','5'],
            [19, 'ဒေါက်တာဘွဲ့(Ph.D)','5'],
            [20, 'မူလတန်း','1'],
            [21, 'အထက်တန်း','1'],
            [22, 'အလယ်တန်း','1'],
            [23, 'Certificate(otheredu)','8'],
            [24, 'Diploma(Diploma)','7'],
            [25, 'ပြည်ပဒေါက်တာဘွဲ့(Ph.D)','5'],
        ];

        foreach($items as $item){
            EducationType::create(array_combine($columns,$item));
        }
    }
}
