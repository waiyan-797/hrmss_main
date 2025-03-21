<?php

namespace Database\Seeders;

use App\Models\Nationality;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([

            StaffTypeSeeder::class,
            TrainingLocationSeeder::class,
            CountrySeeder::class,
            DivisionTypeSeeder::class,
            DifficultyLevelSeeder::class,
            DivisionSeeder::class,
            RegionSeeder::class,
            EducationGroupSeeder::class,
            EducationTypeSeeder::class,
            GenderSeeder::class,
            DayOrMonthSeeder::class,
            LeaveTypeSeeder::class,
            LetterTypeSeeder::class,
            PayscaleSeeder::class,
            PenaltyTypeSeeder::class,
            RetireTypeSeeder::class,
            PensionTypeSeeder::class,
            RelationShipTypeSeeder::class,
            RelationSeeder::class,
            NationalitySeeder::class,
            RankSeeder::class,
            AwardTypeSeeder::class,
            AwardSeeder::class,
            SectionSeeder::class,
            NrcSignSeeder::class,
            NrcRegionIdSeeder::class,
            BloodTypeSeeder::class,
            ReligionSeeder::class,
            PensionYearSeeder::class,
            TrainingTypeSeeder::class,
            EthnicSeeder::class,
            EducationSeeder::class,
            PostSeeder::class,
            MaritalStatusSeeder::class,
            MaritalStatusTypeSeeder::class,
            RoleSeeder::class,
            StatusSeeder::class,
            UserSeeder::class,
            LanguageSeeder::class,
            MinistrySeeder::class,
            EducationTypeSeeder::class,
            DepartmentSeeder::class,
            MilitaryServiceSeeder::class,
        ]);
    }
}
