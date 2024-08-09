<?php

use App\Models\Staff_type;
use App\Models\StaffType;
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
        Schema::create('payscales', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('min_salary');
            $table->string('increment');
            $table->string('max_salary');
            $table->foreignIdFor(StaffType::class)->nullable()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payscales');
    }
};
