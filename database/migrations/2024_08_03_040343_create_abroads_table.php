<?php

use App\Models\Country;
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
        Schema::create('abroads', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Staff::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Country::class)->nullable()->constrained()->nullOnDelete();
            $table->string('particular');
            $table->string('meet_with');
            $table->date('from_date');
            $table->date('to_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abroads');
    }
};
