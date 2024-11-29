<?php

namespace Database\Seeders;
use App\Models\LeaveType;
use Illuminate\Support\Facades\DB;



use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class LeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('leave_types')->insert([
            'name'=>'ရှောင်တခင်ခွင့်',
        ]);
        DB::table('leave_types')->insert([
            'name'=>'လုပ်သက်ခွင့်',
        ]);

        DB::table('leave_types')->insert([
            'name'=>'မီးဖွားခွင့်/သားပျက်ခွင့်',
        ]);

        DB::table('leave_types')->insert([
            'name'=>'ဆေးခွင့်',
        ]);

        DB::table('leave_types')->insert([
            'name'=>'လစာမဲ့ခွင့်',
        ]);

       

    

    
        DB::table('leave_types')->insert([
            'name'=>'ကြိုတင်ပြင်ဆင်ခွင့်',
        ]);
        DB::table('leave_types')->insert([
            'name'=>'ကလေးပြုစုစောင့်ရှောက်ခွင့်',
        ]);

    }
}
