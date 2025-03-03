<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;


use App\Models\AbroadsTypes;

class AbroadsTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        AbroadsTypes::truncate();
        Schema::enableForeignKeyConstraints();

        AbroadsTypes::create([
            'name' =>'ဟုတ်'
        ]);

        AbroadsTypes::create([
            'name' =>'မဟုတ်'
        ]);


    }
}
