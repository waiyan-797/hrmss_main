<?php

use App\Models\Rank;
use App\Models\Staff;
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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Staff::class)->nullable()->nullOnDelete();
            $table->foreignIdFor(Rank::class)->nullable()->nullOnDelete();
            $table->date('salary_month')->nullable();
            $table->integer('current_salary')->nullable();
            $table->date('current_salary_day')->nullable();
            $table->integer('previous_salary_before_increment')->nullable();
            $table->date('previous_salary_before_increment_day')->nullable();
            $table->integer('previous_salary_before_promotion')->nullable();
            $table->date('previous_salary_before_promotion_day')->nullable();
            $table->integer('addition')->nullable();
            $table->integer('addition_education')->nullable();
            $table->integer('addition_ration')->nullable();
            $table->integer('deduction')->nullable();
            $table->integer('deduction_insurance')->nullable();
            $table->integer('deduction_tax')->nullable();
            $table->integer('actual_salary')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
