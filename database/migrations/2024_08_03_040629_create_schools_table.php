<?php

use App\Models\Education;
use App\Models\EducationGroup;
use App\Models\EducationType;
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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Staff::class)->nullable()->nullOnDelete();
            $table->foreignIdFor(EducationGroup::class)->nullable()->nullOnDelete();
            $table->foreignId(EducationType::class)->nullable()->nullOnDelete();
            $table->foreignIdFor(Education::class)->nullable()->nullOnDelete();
            $table->string('school_name');
            $table->string('town');
            $table->date('year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
