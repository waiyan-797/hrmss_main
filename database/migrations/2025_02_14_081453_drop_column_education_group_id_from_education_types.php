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


        Schema::table('education_types', function (Blueprint $table) {
            $table->dropForeign('education_types_education_group_id_foreign');
            $table->dropColumn('education_group_id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('education_types', function (Blueprint $table) {
            //
        });
    }
};
