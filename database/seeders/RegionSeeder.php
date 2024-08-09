<?php

namespace Database\Seeders;
use App\Models\Region;

// use Illuminate\Support\Facades\Schema;
// use Illuminate\Support\Str;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = [
            ['id' => '1', 'name' => 'နေပြည်တော်'],
            ['id' => '2', 'name' => 'ကချင်ပြည်နယ်'],
            ['id' => '3', 'name' => 'ကယားပြည်နယ်'],
            ['id' => '4', 'name' => 'ကရင်ပြည်နယ်'],
            ['id' => '5', 'name' => 'ချင်းပြည်နယ်'],
            ['id' => '6', 'name' => 'စစ်ကိုင်းတိုင်း'],
            ['id' => '7', 'name' => 'တနင်္သာရီတိုင်း'],
            ['id' => '8', 'name' => 'ပဲခူးတိုင်း'],
            ['id' => '9', 'name' => 'မကွေးတိုင်း'],
            ['id' => '10', 'name' => 'မန္တလေးတိုင်း'],
            ['id' => '11', 'name' => 'မွန်ပြည်နယ်'],
            ['id' => '12', 'name' => 'ရခိုင်ပြည်နယ်'],
            ['id' => '13', 'name' => 'ရန်ကုန်တိုင်း'],
            ['id' => '14', 'name' => 'ရှမ်းပြည်နယ်'],
            ['id' => '15', 'name' => 'ဧရာဝတီတိုင်း'],
        ];

        DB::table('regions')->insert($regions);

        
    }
}
