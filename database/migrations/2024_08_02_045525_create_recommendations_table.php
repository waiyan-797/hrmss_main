<?php

use App\Models\Recommendation;
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
        Schema::create('recommendations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Staff::class)->nullable()->constrained()->cascadeOnDelete();
            $table->string('recommend_by');
            $table->string('ministry');
            $table->string('department');
            $table->string('rank');
            $table->string('remark');
            $table->string('recommendation_letter')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recommendations');
    }
};
