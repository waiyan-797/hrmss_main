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
        $columns = ['id', 'name'];
        $items = [
            [1, 'ဝိဇ္ဇာဘွဲ့( မဟာဘွဲ့ )'],
            [2, 'သိပ္ပံဘွဲ့( မဟာဘွဲ့ )'],
            [3, 'နိုင်ငံခြားဘာသာဘွဲ့'],
            [4, 'စီးပွားရေးဘွဲ့'],
            [5, 'အင်ဂျင်နီယာဘွဲ့'],
            [6, 'ကွန်ပျူတာသိပ္ပံဘွဲ့'],
            [7, 'Doctor of Letters'],
            [8, 'ပြည်သူ့ရေးရာစီမံခန့်ခွဲမှုပါရဂူဘွဲ့'],
            [9, 'ဆေးဘက်ဆိုင်ရာဘွဲ့'],
            [10, 'ဥပဒေဘွဲ့'],
            [11, 'တက္ကသိုလ်တက်ရောက်ဆဲ'],
            [12, 'မူလတန်း'],
            [13, 'အလယ်တန်း'],
            [14, 'အထက်တန်း'],
        ];

        foreach($items as $item){
            EducationType::create(array_combine($columns,$item));
        }
    }
}
