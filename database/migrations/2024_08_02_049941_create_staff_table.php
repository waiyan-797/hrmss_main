<?php

use App\Models\BloodType;
use App\Models\District;
use App\Models\Education;

use App\Models\EducationGroup;
use App\Models\EducationType;
use App\Models\Ethnic;
use App\Models\Gender;
use App\Models\NrcRegionId;
use App\Models\NrcSign;
use App\Models\NrcTownshipCode;
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
            $table->text('staff_photo')->nullable();
            $table->text('staff_no')->nullable();
            $table->text('name')->nullable();
            $table->text('nick_name')->nullable();
            $table->text('other_name')->nullable();
            $table->date('dob')->nullable();
            $table->text('attendid')->nullable();
            $table->text('gpms_staff_no')->nullable();
            $table->foreignIdFor(Gender::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Ethnic::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Religion::class)->nullable()->constrained()->nullOnDelete();
            $table->integer('height_feet')->nullable();
            $table->integer('height_inch')->nullable();
            $table->text('hair_color')->nullable();
            $table->text('eye_color')->nullable();
            $table->text('prominent_mark')->nullable();
            $table->text('skin_color')->nullable();
            $table->text('weight')->nullable();
            $table->foreignIdFor(BloodType::class)->nullable()->constrained()->nullOnDelete();
            $table->text('place_of_birth')->nullable();
            $table->foreignIdFor(NrcRegionId::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(NrcTownshipCode::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(NrcSign::class)->nullable()->constrained()->nullOnDelete();
            $table->text('nrc')->nullable();
            $table->text('nrc_code')->nullable();
            $table->text('nrc_front')->nullable();
            $table->text('nrc_back')->nullable();
            $table->text('nrc_no')->nullable();
            $table->text('phone')->nullable();
            $table->text('mobile')->nullable();
            $table->text('email')->nullable();
            $table->text('current_address_street')->nullable();
            $table->text('current_address_ward')->nullable();
            $table->foreignId('current_address_township_or_town_id')->nullable()->constrained('townships')->onDelete('set null');
            $table->foreignId('current_address_district_id')->nullable()->constrained('districts')->onDelete('set null');
            $table->foreignId('current_address_region_id')->nullable()->constrained('regions')->onDelete('set null');
            $table->text('permanent_address_street')->nullable();
            $table->text('permanent_address_ward')->nullable();
            $table->foreignId('permanent_address_township_or_town_id')->nullable()->constrained('townships')->onDelete('set null');
            $table->foreignId('permanent_address_district_id')->nullable()->constrained('districts')->onDelete('set null');
            $table->foreignId('permanent_address_region_id')->nullable()->constrained('regions')->onDelete('set null');
            $table->text('previous_addresses')->nullable();
            $table->text('military_solider_no')->nullable();
            $table->date('military_join_date')->nullable();
            $table->text('military_dsa_no')->nullable();
            $table->text('military_gazetted_no')->nullable();
            $table->text('veteran_no')->nullable();
            $table->date('veteran_date')->nullable();
            $table->date('military_gazetted_date')->nullable();
            $table->date('military_leave_date')->nullable();
            $table->text('military_leave_reason')->nullable();
            $table->text('military_served_army')->nullable();
            $table->text('military_brief_history_or_penalty')->nullable();
            $table->integer('military_pension')->nullable();
            $table->foreignIdFor(EducationGroup::class)->nullable()->nullOnDelete();
            $table->foreignIdFor(EducationType::class)->nullable()->nullOnDelete();
            $table->foreignIdFor(Education::class)->nullable()->nullOnDelete();
            //relatives tab
            $table->text('father_name')->nullable();
            $table->foreignId('father_ethnic_id')->nullable()->constrained('ethnics')->onDelete('set null');
            $table->foreignId('father_religion_id')->nullable()->constrained('religions')->onDelete('set null');
            $table->text('father_place_of_birth')->nullable();
            $table->text('father_occupation')->nullable();
            $table->text('father_address_street')->nullable();
            $table->text('father_address_ward')->nullable();
            $table->foreignId('father_address_township_or_town_id')->nullable()->constrained('townships')->onDelete('set null');
            $table->foreignId('father_address_district_id')->nullable()->constrained('districts')->onDelete('set null');
            $table->foreignId('father_address_region_id')->nullable()->constrained('regions')->onDelete('set null');
            $table->text('spouse_father_name')->nullable();
            $table->foreignId('spouse_father_ethnic_id')->nullable()->constrained('ethnics')->onDelete('set null');
            $table->foreignId('spouse_father_religion_id')->nullable()->constrained('religions')->onDelete('set null');
            $table->text('spouse_father_place_of_birth')->nullable();
            $table->text('spouse_father_occupation')->nullable();
            $table->text('spouse_father_address_street')->nullable();
            $table->text('spouse_father_address_ward')->nullable();
            $table->foreignId('spouse_father_address_township_or_town_id')->nullable()->constrained('townships')->onDelete('set null');
            $table->foreignId('spouse_father_address_district_id')->nullable()->constrained('districts')->onDelete('set null');
            $table->foreignId('spouse_father_address_region_id')->nullable()->constrained('regions')->onDelete('set null');
            $table->text('mother_name')->nullable();
            $table->foreignId('mother_ethnic_id')->nullable()->constrained('ethnics')->onDelete('set null');
            $table->foreignId('mother_religion_id')->nullable()->constrained('religions')->onDelete('set null');
            $table->text('mother_place_of_birth')->nullable();
            $table->text('mother_occupation')->nullable();
            $table->text('mother_address_street')->nullable();
            $table->text('mother_address_ward')->nullable();
            $table->foreignId('mother_address_township_or_town_id')->nullable()->constrained('townships')->onDelete('set null');
            $table->foreignId('mother_address_district_id')->nullable()->constrained('districts')->onDelete('set null');
            $table->foreignId('mother_address_region_id')->nullable()->constrained('regions')->onDelete('set null');
            $table->text('spouse_mother_name')->nullable();
            $table->foreignId('spouse_mother_ethnic_id')->nullable()->constrained('ethnics')->onDelete('set null');
            $table->foreignId('spouse_mother_religion_id')->nullable()->constrained('religions')->onDelete('set null');
            $table->text('spouse_mother_place_of_birth')->nullable();
            $table->text('spouse_mother_occupation')->nullable();
            $table->text('spouse_mother_address_street')->nullable();
            $table->text('spouse_mother_address_ward')->nullable();
            $table->foreignId('spouse_mother_address_township_or_town_id')->nullable()->constrained('townships')->onDelete('set null');
            $table->foreignId('spouse_mother_address_district_id')->nullable()->constrained('districts')->onDelete('set null');
            $table->foreignId('spouse_mother_address_region_id')->nullable()->constrained('regions')->onDelete('set null');
            $table->boolean('family_in_politics')->nullable();
            //job_info
            $table->boolean('is_parents_citizen_when_staff_born')->nullable();
            $table->foreignId('current_rank_id')->nullable()->constrained('ranks')->onDelete('set null');
            $table->date('current_rank_date')->nullable();
            $table->foreignId('current_department_id')->nullable()->constrained('departments')->onDelete('set null');
            $table->foreignId('current_division_id')->nullable()->constrained('divisions')->onDelete('set null');
            $table->text('transfer_remark')->nullable();
            $table->foreignId('side_department_id')->nullable()->constrained('departments')->onDelete('set null');
            $table->foreignId('side_division_id')->nullable()->constrained('divisions')->onDelete('set null');
            $table->foreignId('salary_paid_by')->nullable()->constrained('departments')->onDelete('set null');
            $table->date('join_date')->nullable();
            $table->date('government_staff_started_date')->nullable();
            $table->text('form_of_appointment')->nullable();
            $table->boolean('is_direct_appointed')->nullable();
            $table->foreignIdFor(payscale::class)->nullable()->constrained()->nullOnDelete();
            $table->integer('current_salary')->nullable();
            $table->integer('current_increment_time')->nullable();
            //detail personal info (From childhood until now)
            $table->text('last_school_name')->nullable();
            $table->text('last_school_subject')->nullable();
            $table->text('last_school_row_no')->nullable();
            $table->text('last_school_major')->nullable();
            $table->text('student_life_political_social')->nullable();
            $table->text('habit')->nullable();
            $table->text('health_condition')->nullable();
            $table->text('tax_exception')->nullable();
            $table->text('revolution')->nullable();
            $table->text('transfer_reason_salary')->nullable();
            $table->text('during_work_political_social')->nullable();
            $table->boolean('has_military_friend')->nullable()->default(false);
            $table->text('foreigner_friend_name')->nullable();
            $table->text('foreigner_friend_occupation')->nullable();
            $table->foreignId('foreigner_friend_nationality_id')->nullable()->constrained('nationalities')->onDelete('set null');
            $table->foreignId('foreigner_friend_country_id')->nullable()->constrained('countries')->onDelete('set null');
            $table->text('foreigner_friend_how_to_know')->nullable();
            $table->text('recommended_by_military_person')->nullable();
            $table->text('last_serve_army')->nullable();
            $table->text('life_insurance_proposal')->nullable();
            $table->text('life_insurance_policy_no')->nullable();
            $table->text('life_insurance_premium')->nullable();
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
