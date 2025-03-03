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
        Schema::table('abroads', function (Blueprint $table) {
if (!(Schema::hasColumn('abroads', 'abroad_type_id'))) {
    $table->foreignId('abroad_type_id');

}

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('abroads', function (Blueprint $table) {
            //
        });
    }
};
