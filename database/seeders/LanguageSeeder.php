<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Schema::disableForeignKeyConstraints();
        Language::truncate();
        Schema::enableForeignKeyConstraints();

        $languages = [
            'English',
            'Spanish',
            'French',
            'German',
            'Chinese (Simplified)',
            'Chinese (Traditional)',
            'Japanese',
            'Korean',
            'Arabic',
            'Russian',
            'Portuguese',
            'Italian',
            'Dutch',
            'Hindi',
            'Bengali',
            'Thai',
            'Turkish',
            'Vietnamese',
            'Greek',
            'Swedish',
        ];

        foreach ($languages as $key => $language) {
            Language::insert(['name'=>$language]);
        }
        

    }
}
