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
            $table->dropForeign(['transfer_ministry_id']);
            $table->dropColumn('transfer_ministry_id');
            $table->dropForeign(['transfer_department_id']);
            $table->dropColumn('transfer_department_id');
            $table->foreignId('transfer_division_id')->nullable()->constrained('divisions')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('staff', function (Blueprint $table) {
            $table->foreignId('transfer_ministry_id')->nullable()->constrained('ministries')->onDelete('set null');
            $table->foreignId('transfer_department_id')->nullable()->constrained('departments')->onDelete('set null');
            $table->dropForeign(['transfer_division_id']);
            $table->dropColumn('transfer_division_id');
        });
    }
};
