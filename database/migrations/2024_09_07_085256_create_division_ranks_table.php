<?php

use App\Models\Division;
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
        Schema::create('division_ranks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Division::class)->nullable()->nullOnDelete();
            $table->foreignIdFor(Rank::class)->nullable()->nullOnDelete();
            $table->integer('allowed_qty')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('division_ranks');
    }
};
