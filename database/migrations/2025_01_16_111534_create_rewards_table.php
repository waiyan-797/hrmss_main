<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Staff;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rewards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(Staff::class)->nullable()->constrained()->cascadeOnDelete();
            $table->string('type');
            $table->string('year');
            $table->string('remark');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rewards');

    }
};
