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
            //personal_info tab
            $table->id();
            $table->string('staff_photo')->nullable();
            $table->string('staff_no')->nullable();
            $table->string('name')->nullable();
            $table->string('nick_name')->nullable();
            $table->string('other_name')->nullable();
            $table->date('dob')->nullable();
            $table->foreignIdFor(Gender::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Ethnic::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Religion::class)->nullable()->constrained()->nullOnDelete();
            $table->integer('height_feet')->nullable();
            $table->integer('height_inch')->nullable();
            $table->string('hair_color')->nullable();
            $table->string('eye_color')->nullable();
            $table->string('prominent_mark')->nullable();
            $table->string('skin_color')->nullable();
            $table->string('weight')->nullable();
            $table->foreignIdFor(BloodType::class)->nullable()->constrained()->nullOnDelete();
            $table->string('place_of_birth')->nullable();
            $table->string('nrc')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('current_address_street')->nullable();
            $table->string('current_address_ward')->nullable();
            $table->foreignId('current_address_township_or_town_id')->nullable()->constrained('townships')->onDelete('set null');
            $table->foreignId('current_address_district_id')->nullable()->constrained('districts')->onDelete('set null');
            $table->foreignId('current_address_region_id')->nullable()->constrained('regions')->onDelete('set null');
            $table->string('permanent_address_street')->nullable();
            $table->string('permanent_address_ward')->nullable();
            $table->foreignId('permanent_address_township_or_town_id')->nullable()->constrained('townships')->onDelete('set null');
            $table->foreignId('permanent_address_district_id')->nullable()->constrained('districts')->onDelete('set null');
            $table->foreignId('permanent_address_region_id')->nullable()->constrained('regions')->onDelete('set null');
            $table->string('previous_addresses')->nullable();
            $table->string('military_solider_no')->nullable();
            $table->date('military_join_date')->nullable();
            $table->string('military_dsa_no')->nullable();
            $table->date('military_gazetted_date')->nullable();
            $table->date('military_leave_date')->nullable();
            $table->string('military_leave_reason')->nullable();
            $table->string('military_served_army')->nullable();
            $table->string('military_brief_history_or_penalty')->nullable();
            $table->integer('military_pension')->nullable();
            //relatives tab
            $table->string('father_name')->nullable();
            $table->foreignId('father_ethnic_id')->nullable()->constrained('ethnics')->onDelete('set null');
            $table->foreignId('father_religion_id')->nullable()->constrained('religions')->onDelete('set null');
            $table->string('father_place_of_birth')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('father_address_street')->nullable();
            $table->string('father_address_ward')->nullable();
            $table->foreignId('father_address_township_or_town_id')->nullable()->constrained('townships')->onDelete('set null');
            $table->foreignId('father_address_district_id')->nullable()->constrained('districts')->onDelete('set null');
            $table->foreignId('father_address_region_id')->nullable()->constrained('regions')->onDelete('set null');
            $table->string('mother_name')->nullable();
            $table->foreignId('mother_ethnic_id')->nullable()->constrained('ethnics')->onDelete('set null');
            $table->foreignId('mother_religion_id')->nullable()->constrained('religions')->onDelete('set null');
            $table->string('mother_place_of_birth')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('mother_address_street')->nullable();
            $table->string('mother_address_ward')->nullable();
            $table->foreignId('mother_address_township_or_town_id')->nullable()->constrained('townships')->onDelete('set null');
            $table->foreignId('mother_address_district_id')->nullable()->constrained('districts')->onDelete('set null');
            $table->foreignId('mother_address_region_id')->nullable()->constrained('regions')->onDelete('set null');
            $table->boolean('family_in_politics')->nullable();
            //job_info
            $table->boolean('is_parents_citizen_when_staff_born')->nullable();
            $table->foreignId('current_rank_id')->nullable()->constrained('ranks')->onDelete('set null');
            $table->date('current_rank_date')->nullable();
            $table->foreignId('current_department_id')->nullable()->constrained('departments')->onDelete('set null');
            $table->foreignId('current_division_id')->nullable()->constrained('divisions')->onDelete('set null');
            $table->foreignId('side_department_id')->nullable()->constrained('departments')->onDelete('set null');
            $table->foreignId('side_division_id')->nullable()->constrained('divisions')->onDelete('set null');
            $table->foreignId('salary_paid_by')->nullable()->constrained('departments')->onDelete('set null');
            $table->date('join_date')->nullable();
            $table->string('form_of_appointment')->nullable();
            $table->boolean('is_direct_appointed')->nullable();
            $table->foreignIdFor(Payscale::class)->nullable()->constrained()->nullOnDelete();
            $table->integer('current_salary')->nullable();
            $table->integer('current_increment_time')->nullable();
            //detail personal info (From childhood until now)
            $table->string('last_school_name')->nullable();
            $table->string('last_school_subject')->nullable();
            $table->string('last_school_row_no')->nullable();
            $table->string('last_school_major')->nullable();
            $table->string('student_life_political_social')->nullable();
            $table->string('habit')->nullable();
            $table->string('revolution')->nullable();
            $table->string('transfer_reason_salary')->nullable();
            $table->string('during_work_political_social')->nullable();
            $table->boolean('has_military_friend')->nullable()->default(false);
            $table->string('foreigner_friend_name')->nullable();
            $table->string('foreigner_friend_occupation')->nullable();
            $table->foreignId('foreigner_friend_nationality_id')->nullable()->constrained('nationalities')->onDelete('set null');
            $table->foreignId('foreigner_friend_country_id')->nullable()->constrained('countries')->onDelete('set null');
            $table->string('foreigner_friend_how_to_know')->nullable();
            $table->string('recommended_by_military_person')->nullable();
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
