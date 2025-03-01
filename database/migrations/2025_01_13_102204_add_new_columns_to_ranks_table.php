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
        Schema::table('ranks', function (Blueprint $table) {
            $table->string('name1')->nullable();
            $table->string('name2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ranks', function (Blueprint $table) {
            $table->dropColumn('name1');
            $table->dropColumn('name2');
        });
    }
};
