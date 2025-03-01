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
        Schema::table('social_activities', function (Blueprint $table) {
            $table->dropColumn('from_date');
            $table->dropColumn('to_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('social_activities', function (Blueprint $table) {
            $table->date('from_date');
            $table->date('to_date');
        });
    }
};
