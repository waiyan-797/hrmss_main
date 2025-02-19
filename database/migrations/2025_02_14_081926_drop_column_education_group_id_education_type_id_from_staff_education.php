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
        Schema::table('staff_education', function (Blueprint $table) {

            // $table->dropForeign('staff_education_education_group_id_foreign');

            // Drop foreign key for education_type_id
            // $table->dropForeign('staff_education_education_type_id_foreign');

            // Drop columns
            $table->dropColumn('education_group_id');
            $table->dropColumn('education_type_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('staff_education', function (Blueprint $table) {
            //
        });
    }
};
