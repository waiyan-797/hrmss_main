<?php

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
        Schema::create('increments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Staff::class)->constrained()->cascadeOnDelete();
            $table->foreignId('increment_rank_id')->nullable()->constrained('ranks')->onDelete('set null');
            $table->integer('min_salary')->nullable();
            $table->integer('increment')->nullable();
            $table->integer('max_salary')->nullable();
            $table->date('increment_date')->nullable();
            $table->integer('increment_time')->nullable();
            $table->string('order_no')->nullable();
            $table->string('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('increments');
    }
};
