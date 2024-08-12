<?php

use App\Models\Department;
use App\Models\Division;
use App\Models\post;
use App\Models\rank;
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
        Schema::create('postings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Staff::class)->constrained()->nullOnDelete();
            $table->foreignIdFor(rank::class)->constrained()->nullOnDelete();
            $table->foreignIdFor(post::class)->nullable()->constrained()->nullOnDelete();
            $table->date('from_date');
            $table->date('to_date');
            $table->foreignIdFor(Department::class)->constrained()->nullOnDelete();
            $table->foreignIdFor(Division::class)->constrained()->nullOnDelete();
            $table->string('location');
            $table->string('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postings');
    }
};
