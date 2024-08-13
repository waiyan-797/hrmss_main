<?php

use App\Models\BloodType;
use App\Models\District;
use App\Models\Education;

use App\Models\EducationGroup;
use App\Models\EducationType;
use App\Models\Ethnic;
use App\Models\Gender;
use App\Models\payscale;
use App\Models\Region;
use App\Models\Religion;
use App\Models\Township;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('staff_photo')->nullable();
            $table->string('staff_no');
            $table->string('name');
            $table->string('nick_name')->nullable();
            $table->string('other_name')->nullable();
            $table->date('dob');
            $table->foreignIdFor(Gender::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Ethnic::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Religion::class)->nullable()->constrained()->nullOnDelete();
            $table->integer('height_feet');
            $table->integer('height_inch');
            $table->string('hair_color');
            $table->string('eye_color');
            $table->string('prominent_mark');
            $table->string('skin_color');
            $table->integer('weight');
            $table->foreignIdFor(BloodType::class)->nullable()->constrained()->nullOnDelete();
            $table->string('place_of_birth');
            $table->string('nrc');
            $table->string('phone');
            $table->string('mobile');
            $table->string('email');
            $table->string('current_address_street');
            $table->string('current_address_ward');
            $table->foreignId('current_address_township_or_town_id')->nullable()->constrained('townships')->onDelete('set null');
            $table->foreignId('current_address_district_id')->nullable()->constrained('districts')->onDelete('set null');
            $table->foreignId('current_address_region_id')->nullable()->constrained('regions')->onDelete('set null');

            $table->string('permanent_address_street');
            $table->string('permanent_address_ward');

            $table->foreignId('permanent_address_township_or_town_id')->nullable()->constrained('townships')->onDelete('set null');
            $table->foreignId('permanent_address_district_id')->nullable()->constrained('districts')->onDelete('set null');
            $table->foreignId('permanent_address_region_id')->nullable()->constrained('regions')->onDelete('set null');
            $table->string('previous_addresses');
            $table->string('military_solider_no');
            $table->date('military_join_date');
            $table->string('military_dsa_no');
            $table->date('military_gazetted_date');
            $table->date('military_leave_date');
            $table->string('military_leave_reason');
            $table->string('military_served_army');
            $table->string('military_brief_history_or_penalty');
            $table->integer('military_pension');
            $table->foreignIdFor(EducationGroup::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(EducationType::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Education::class)->nullable()->constrained()->nullOnDelete();
            $table->string('father_name');
            $table->foreignId('father_ethnic_id')->nullable()->constrained('ethnics')->onDelete('set null');
            $table->foreignId('father_religion_id')->nullable()->constrained('religions')->onDelete('set null');
            $table->string('father_place_of_birth');
            $table->string('father_occupation');
            $table->string('father_address_street');
            $table->string('father_address_ward');

            $table->foreignId('father_address_township_or_town_id')->nullable()->constrained('townships')->onDelete('set null');
            $table->foreignId('father_address_district_id')->nullable()->constrained('districts')->onDelete('set null');
            $table->foreignId('father_address_region_id')->nullable()->constrained('regions')->onDelete('set null');
            $table->string('mother_name');
            $table->foreignId('mother_ethnic_id')->nullable()->constrained('ethnics')->onDelete('set null');
            $table->foreignId('mother_religion_id')->nullable()->constrained('religions')->onDelete('set null');
            $table->string('mother_place_of_birth');
            $table->string('mother_occupation');
            $table->string('mother_address_street');
            $table->string('mother_address_ward');
            $table->foreignId('mother_address_township_or_town_id')->nullable()->constrained('townships')->onDelete('set null');
            $table->foreignId('mother_address_district_id')->nullable()->constrained('districts')->onDelete('set null');
            $table->foreignId('mother_address_region_id')->nullable()->constrained('regions')->onDelete('set null');
            $table->boolean('is_parents_citizen_when_staff_born');
            $table->foreignId('current_rank_id')->nullable()->constrained('ranks')->onDelete('set null');
            $table->date('current_rank_date');

             $table->foreignId('current_department_id')->nullable()->constrained('departments')->onDelete('set null');
             $table->foreignId('current_division_id')->nullable()->constrained('divisions')->onDelete('set null');
             $table->foreignId('side_department_id')->nullable()->constrained('departments')->onDelete('set null');
             $table->foreignId('side_division_id')->nullable()->constrained('divisions')->onDelete('set null');
             $table->foreignId('salary_paid_by')->nullable()->constrained('departments')->onDelete('set null');

             $table->date('join_date');
             $table->string('form_of_appointment');
             $table->boolean('is_direct_appointed');
             $table->foreignIdFor(Payscale::class)->nullable()->constrained()->nullOnDelete();
             $table->integer('current_salary');
             $table->integer('current_increment_time');
             $table->string('recommend_by');
             $table->string('family_in_politics');


             $table->string('last_school_name');
             $table->string('last_school_subject');
             $table->string('last_school_row_no');
             $table->string('last_school_major');
             $table->string('student_life_political_social');
             $table->string('habit');
             $table->string('past_occupation');
             $table->string('revolution');
             $table->string('transfer_reason_salary');
             $table->string('during_work_political_social');
             $table->string('military_friend');
             $table->string('foreigner_friend_name');
             $table->string('foreigner_friend_occupation');

             $table->foreignId('foreigner_friend_nationality_id')->nullable()->constrained('nationalities')->onDelete('set null');
             $table->foreignId('foreigner_friend_country_id')->nullable()->constrained('countries')->onDelete('set null');

             $table->string('foreigner_friend_how_to_know');
             $table->string('recommended_by_military_person');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
