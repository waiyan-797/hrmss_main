<?php

use App\Models\Department;
use App\Models\DivisionType;
use App\Models\DifficultyLevel;
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
        Schema::create('divisions', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('nick_name');
            $table->foreignIdFor(DivisionType::class)->nullable()->nullOnDelete();
            $table->foreignIdFor(Department::class)->nullable()->nullOnDelete();
            $table->integer('sort_no')->nullable();
            $table->foreignIdFor(DifficultyLevel::class)->nullable()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('divisions');
    }
};
