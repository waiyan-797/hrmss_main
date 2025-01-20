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
            $table->foreignId('transfer_ministry_id')->nullable()->constrained('ministries')->onDelete('set null');
            $table->foreignId('side_ministry_id')->nullable()->constrained('ministries')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('staff', function (Blueprint $table) {
            $table->dropForeign(['transfer_ministry_id', 'side_ministry_id']);
            $table->dropColumn('transfer_ministry_id');
            $table->dropColumn('side_ministry_id');
        });
    }
};
