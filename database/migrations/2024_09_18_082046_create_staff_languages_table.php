<?php

use App\Models\Language;
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
        Schema::create('staff_languages', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Staff::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Language::class)->constrained()->cascadeOnDelete();
            $table->string('rank');
            $table->string('writing')->nullable();
            $table->string('reading')->nullable();
            $table->string('speaking')->nullable();
            $table->string('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_languages');
    }
};
