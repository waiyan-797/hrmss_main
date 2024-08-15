<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            StaffTypeSeeder::class,
            TrainingLocationSeeder::class,
            RankSeeder::class,
            CountrySeeder::class,
            DivisionSeeder::class,
            RegionSeeder::class,
            DistrictSeeder::class,
            TownshipSeeder::class,
            EducationGroupSeeder::class,
            GenderSeeder::class,
            LeaveTypeSeeder::class,
            PayscaleSeeder::class,
            PenaltyTypeSeeder::class,
            PensionTypeSeeder::class,
            RelationSeeder::class,
        ]);
    }
}
