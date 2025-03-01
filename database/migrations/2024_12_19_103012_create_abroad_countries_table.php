<?php

use App\Models\Abroad;
use App\Models\Country;
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
        Schema::create('abroad_countries', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Abroad::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Country::class)->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abroad_countries');
    }
};
