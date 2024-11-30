<?php

namespace Database\Seeders;


use App\Models\LeaveType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class LeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        LeaveType::truncate();
        Schema::enableForeignKeyConstraints();

        $columns = ['id', 'name','sort_no'];
        $items = [
            [1, 'ရှောင်တခင်ခွင့်',1],
            [2, 'လုပ်သက်ခွင့်',2],
            [3, 'မီးဖွားခွင့်/သားပျက်ခွင့်',3],
            [4, 'ဆေးခွင့်',4],
            [5, 'လစာမဲ့ခွင့်',5],
            [6, 'ကြိုတင်ပြင်ဆင်ခွင့်',6],
            [7, 'ကလေးပြုစုစောင့်ရှောက်ခွင့်',7]
            
        ];

        foreach ($items as $item) {
            LeaveType::create(array_combine($columns, $item));
        }
    }
}
