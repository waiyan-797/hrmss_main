<?php

namespace Database\Seeders;

use App\Models\NrcRegionId;
use App\Models\NrcTownshipCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class NrcRegionIdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        NrcRegionId::truncate();
        NrcTownshipCode::truncate();
        Schema::enableForeignKeyConstraints();

        $all = getcsv(__DIR__.'/nrc_codes.csv');
        $uniqueResults = collect($all)->unique(1);
        foreach ($uniqueResults as $result) {
            NrcRegionId::firstOrCreate([
                'name' => $result[1],
            ]);
        }

        $nrc_region_ids = NrcRegionId::get();

        foreach ($all as $result) {
            $region = $nrc_region_ids->firstWhere('name', $result[1]);
            NrcTownshipCode::create([
                'name' => $result[0],
                'nrc_region_id_id' => $region->id,
            ]);
        }
    }
}
