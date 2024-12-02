<?php

namespace Database\Seeders;

use App\Models\BloodType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class BloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        Schema::disableForeignKeyConstraints();
        BloodType::truncate();
        Schema::enableForeignKeyConstraints();

        $columns = ['id', 'name'];
        $items = [
            [1, 'A'],
            [2, 'A+'],
            [3, 'A-'],
            [4, 'B'],
            [5, 'B+'],
            [6, 'B-'],
            [7, 'O'],
            [8, 'O+'],
            [9, 'O-'],
            [10, 'AB'],
            [11, 'AB+'],
            [12, 'AB-']
        ];

        foreach ($items as $item) {
            BloodType::create(array_combine($columns, $item));
        }
    }
    }

