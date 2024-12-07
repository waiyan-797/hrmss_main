<?php

namespace Database\Seeders;

use App\Models\Staff_type;
use App\Models\StaffType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class StaffTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        StaffType::truncate();
        Schema::enableForeignKeyConstraints();


        DB::table('staff_types')->insert([
            'name' => 'အရာထမ်း',
        ]);

        DB::table('staff_types')->insert([
            'name' => 'အမှုထမ်း',
        ]);

        DB::table('staff_types')->insert([
            'name' => 'နေ့စား',
        ]);


    }
}
