<?php

use App\Models\Award;
use App\Models\AwardType;
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
        Schema::create('awardings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Staff::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(AwardType::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Award::class)->nullable()->constrained()->nullOnDelete();
            $table->string('order_no');
            $table->date('order_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('awardings');
    }
};
