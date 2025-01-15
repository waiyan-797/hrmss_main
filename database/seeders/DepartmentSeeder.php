<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        $departmentPath = database_path('sql\departments.sql');

        if (!File::exists($departmentPath)) {
            $this->command->error("file not found: $departmentPath");
            return;
        }

        $content = File::get($departmentPath);

        DB::unprepared($content);
        Schema::enableForeignKeyConstraints();
        $this->command->info('Departments seeded successfully!');
    }
}
