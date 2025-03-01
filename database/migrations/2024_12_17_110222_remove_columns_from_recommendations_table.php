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
        Schema::table('recommendations', function (Blueprint $table) {
            $table->dropColumn('ministry');
            $table->dropColumn('department');
            $table->dropColumn('rank');
            $table->dropColumn('remark');
            $table->dropColumn('recommendation_letter');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recommendations', function (Blueprint $table) {
            $table->string('ministry');
            $table->string('department');
            $table->string('rank');
            $table->string('remark');
            $table->string('recommendation_letter')->nullable();
        });
    }
};
