<?php

use App\Models\DayOrMonth;
use App\Models\Rank;
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
        Schema::create('leave_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('allowed')->nullable();
            $table->foreignIdFor(DayOrMonth::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Rank::class)->nullable()->constrained()->nullOnDelete();
            $table->integer('sort_no')->nullable();
            $table->boolean('is_yearly')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_types');
    }
};
