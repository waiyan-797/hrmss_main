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
            'name' => 'အခြေခံပညာ',
        ]);

        EducationGroup::create([
            'name' => 'ဘွဲ့ရ',
        ]);

        EducationGroup::create([
            'name' => 'ဘွဲ့လွန်ဂုဏ်ထူးတန်း',
        ]);
        EducationGroup::create([
            'name' => 'ဘွဲ့လွန်(မဟာ)',
        ]);
        
        EducationGroup::create([
            'name' => 'ပါရဂူဘွဲ့ Ph.D.',
        ]);
        
        EducationGroup::create([
            'name' => 'Doctor of Letters',
        ]);
        EducationGroup::create([
            'name' => 'ဒီပလိုမာဘွဲ့',
        ]);
    }
}
