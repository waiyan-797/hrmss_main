<?php

namespace Database\Seeders;

use App\Models\Township;
use Illuminate\Support\Facades\DB;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TownshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Township::find(277)->update([
        'name' => 'တောင်ကြီး',
      ]);
    }
}
