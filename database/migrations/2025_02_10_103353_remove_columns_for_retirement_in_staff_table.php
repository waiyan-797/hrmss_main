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
            $table->dropColumn(['lost_contact_from_date', 'date_of_death']);
            $table->string('retire_remark_attach')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('staff', function (Blueprint $table) {
            $table->date('lost_contact_from_date')->nullable();
            $table->date('date_of_death')->nullable();
            $table->dropColumn('retire_remark_attach')->nullable();
        });
    }
};
