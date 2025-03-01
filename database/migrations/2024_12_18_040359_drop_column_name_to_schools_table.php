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
        Schema::table('schools', function (Blueprint $table) {
            $table->dropColumn('semester')->nullable();
            $table->dropColumn('major')->nullable();
            $table->dropColumn('year')->nullable();
            $table->dropColumn('certificate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schools', function (Blueprint $table) {
            //
        });
    }
};
