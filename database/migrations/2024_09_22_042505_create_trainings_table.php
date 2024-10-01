<?php

use App\Models\Country;
use App\Models\Staff;
use App\Models\Training_location;
use App\Models\Training_type;
use App\Models\TrainingLocation;
use App\Models\TrainingType;
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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Staff::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(TrainingType::class)->nullable()->constrained()->nullOnDelete();
            $table->string('diploma_name')->nullable();
            $table->integer('fees')->nullable();
            $table->date('from_date');
            $table->date('to_date');
            $table->string('location')->nullable();
            $table->foreignIdFor(Country::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(TrainingLocation::class)->nullable()->constrained()->nullOnDelete();
            $table->string('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
