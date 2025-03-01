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
            'name' => 'ပါရဂူဘွဲ့ Ph.D.',
        ]);

        EducationGroup::create([
            'name' => 'ဘွဲ့လွန်(မဟာ) ',
        ]);

        EducationGroup::create([
            'name' => 'ဘွဲ့',
        ]);
        EducationGroup::create([
            'name' => 'ဒီပလိုမာဘွဲ့',
        ]);
        
        EducationGroup::create([
            'name' => 'M.Res',
        ]);
        
        EducationGroup::create([
            'name' => 'Qualify',
        ]);
        EducationGroup::create([
            'name' => 'ဘွဲ့လွန်ဂုဏ်ထူးတန်း',
        ]);

        EducationGroup::create([
            'name' => 'အခြား',
        ]);
    }
}
