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
            $table->foreignIdFor(Staff::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(EducationGroup::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(EducationType::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Education::class)->nullable()->constrained()->nullOnDelete();
            $table->string('school_name');
            $table->string('town');
            $table->string('year');
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
