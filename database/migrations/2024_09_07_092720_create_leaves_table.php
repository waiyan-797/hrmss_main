<?php

use App\Models\DayOrMonth;
use App\Models\LeaveType;
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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Staff::class)->nullable()->nullOnDelete();
            $table->foreignIdFor(LeaveType::class)->nullable()->nullOnDelete();
            $table->foreignId('current_division_id')->nullable()->constrained('divisions')->onDelete('set null');
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->integer('qty')->nullable();
            $table->string('order_no')->nullable();
            $table->string('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
