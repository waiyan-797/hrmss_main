<?php

use App\Models\Ethnic;
use App\Models\Relation;
use App\Models\Religion;
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
        Schema::create('mother_siblings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Staff::class)->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->foreignIdFor(Ethnic::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Religion::class)->nullable()->constrained()->nullOnDelete();
            $table->string('place_of_birth');
            $table->string('occupation');
            $table->string('address');
            $table->foreignIdFor(Relation::class)->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mother_siblings');
    }
};
