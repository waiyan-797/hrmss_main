<?php

use App\Models\Payscale;
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
        // dfdg
        Schema::create('ranks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(StaffType::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Payscale::class)->nullable()->constrained()->nullOnDelete();
            $table->integer('allowed_qty')->default(0);
            $table->integer('sort_no')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ranks');
    }
};
