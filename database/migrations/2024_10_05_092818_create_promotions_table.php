<?php

use App\Models\Rank;
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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Staff::class)->nullable()->nullOnDelete();
            $table->foreignIdFor(Rank::class)->nullable()->nullOnDelete();
            $table->foreignId('previous_rank_id')->nullable()->constrained('ranks')->onDelete('set null');
            $table->date('promotion_date');
            $table->string('order_no')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
