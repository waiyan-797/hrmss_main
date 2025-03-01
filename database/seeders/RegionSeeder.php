<?php

namespace Database\Seeders;
use App\Models\Region;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('townships')->truncate();
        DB::table('districts')->truncate();
        DB::table('regions')->truncate();

        Schema::enableForeignKeyConstraints();

        $all = getcsv(__DIR__.'/regions.csv');
        array_shift($all);
        $get = fn ($n) => collect(getcsv(__DIR__.'/'.$n.'_translation.csv'))->mapWithKeys(fn ($v) => [$v[0] => $v[1]]);
        $translations = collect(['regions', 'districts', 'townships'])->mapWithKeys(fn ($n) => [$n => $get($n)]);
        $t = fn ($k, $r) => Str::of($translations->get($r)->get($k))->trim() ?? $k;

        DB::transaction(function () use ($all, $t) {
            foreach ($all as $key => [, $region_name, $district_name, $township_name]) {
                printf("seed: %s\n", implode(' | ', [$key, $region_name, $district_name, $township_name]));

                if (! $region_name) {
                    continue;
                }
                $region = Region::updateOrCreate(
                    ['name' => $region_name],
                );

                if (! $district_name) {
                    continue;
                }
                $district = $region->districts()->updateOrCreate(
                    ['name' => $district_name],
                );

                if (! $township_name) {
                    continue;
                }
                $district->townships()->updateOrCreate(
                    ['name' => $township_name],
                    ['region_id' => $region->id],
                );
            }
        });
    }
}
