<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;


class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Department::truncate();
        Schema::enableForeignKeyConstraints();
        Department::create([
            'name' => 'ရင်းနှီးမြှပ်နှံမှုကုမ္ပဏီများညွှန်ကြားမှုဦးစီးဌာန',
        ]);
    }
}
