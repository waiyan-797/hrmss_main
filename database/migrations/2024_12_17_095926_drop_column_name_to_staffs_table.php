<?php

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
        Schema::table('staff', function (Blueprint $table) {
            $table->dropColumn('spouse_father_name');
            $table->dropForeign(['spouse_father_ethnic_id']);
            $table->dropColumn('spouse_father_ethnic_id');
            $table->dropForeign(['spouse_father_religion_id']);
            $table->dropColumn('spouse_father_religion_id');
            $table->dropColumn('spouse_father_place_of_birth');
            $table->dropColumn('spouse_father_occupation');
            $table->dropColumn('spouse_father_address_house_no');
            $table->dropColumn('spouse_father_address_street');
            $table->dropColumn('spouse_father_address_ward');
            $table->dropForeign(['spouse_father_address_township_or_town_id']);
            $table->dropColumn('spouse_father_address_township_or_town_id');
            $table->dropForeign(['spouse_father_address_district_id']);
            $table->dropColumn('spouse_father_address_district_id');
            $table->dropForeign(['spouse_father_address_region_id']);
            $table->dropColumn('spouse_father_address_region_id');
            $table->dropColumn('spouse_mother_name');
            $table->dropForeign(['spouse_mother_ethnic_id']);
            $table->dropColumn('spouse_mother_ethnic_id');
            $table->dropForeign(['spouse_mother_religion_id']);
            $table->dropColumn('spouse_mother_religion_id');
            $table->dropColumn('spouse_mother_place_of_birth');
            $table->dropColumn('spouse_mother_occupation');
            $table->dropColumn('spouse_mother_address_house_no');
            $table->dropColumn('spouse_mother_address_street');
            $table->dropColumn('spouse_mother_address_ward');
            $table->dropForeign(['spouse_mother_address_township_or_town_id']);
            $table->dropColumn('spouse_mother_address_township_or_town_id');
            $table->dropForeign(['spouse_mother_address_district_id']);
            $table->dropColumn('spouse_mother_address_district_id');
            $table->dropForeign(['spouse_mother_address_region_id']);
            $table->dropColumn('spouse_mother_address_region_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('staffs', function (Blueprint $table) {
            //
        });
    }
};
