<?php

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
        Schema::create('depromotions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Staff::class)->nullable()->nullOnDelete();
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->foreignId('previous_rank_id')->nullable()->constrained('ranks')->onDelete('set null');
            $table->foreignId('depromoted_rank_id')->nullable()->constrained('ranks')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('depromotions');
    }
};
