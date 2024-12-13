<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'division_id' => 11  ,
            'role_id' => 2 ,
            
            
        ]);

        User::create([
            'name' => 'User',
            'email' => 'users@gmail.com',
            'password' => bcrypt('123'),
            'division_id' => 11  ,
            'role_id' => 4 ,
            
            
        ]);
    }
}
