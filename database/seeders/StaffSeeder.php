<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Schema::disableForeignKeyConstraints();
        // Staff::truncate();

        // Schema::dropIfExists('staff');

        Staff::whereIn('id', [31, 32, 28, 29, 26, 27, 22, 23, 1, 9, 2, 3, 4, 5, 24, 44, 48, 47, 46, 45, 40, 41, 42, 43, 49, 37, 38, 6])->delete();
        Staff::whereIn('id', [8, 21])->update([
            'status_id' => 2,
        ]);
    }
}
