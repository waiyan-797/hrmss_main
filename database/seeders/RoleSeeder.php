<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Role::truncate();
        Schema::enableForeignKeyConstraints();
        Role::insert([
            ['name' => 'Super Admin'],
            ['name' => 'HR'],
            ['name' => 'Finance'],
            ['name' => 'HR User'],
            ['name' => 'Finance User'],
        ]);
    }
}
