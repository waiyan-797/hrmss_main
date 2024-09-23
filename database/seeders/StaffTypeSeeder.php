<?php

namespace Database\Seeders;

use App\Models\Staff_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StaffTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
