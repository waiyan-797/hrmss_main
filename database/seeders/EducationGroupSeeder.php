<?php

namespace Database\Seeders;

use App\Models\EducationGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class EducationGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        EducationGroup::truncate();
        Schema::enableForeignKeyConstraints();

        EducationGroup::create([
            'name' => 'ပါရဂူဘွဲ့',
        ]);

        EducationGroup::create([
            'name' => 'မဟာဘွဲ့',
        ]);

        EducationGroup::create([
            'name' => 'ဘွဲ့',
        ]);

        EducationGroup::create([
            'name' => 'အခြား',
        ]);
    }
}
