<?php

use App\Models\Education;
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
        Schema::table('schools', function (Blueprint $table) {
            $table->dropForeign(['education_id']);
            $table->dropColumn('education_id');
            $table->string('education')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schools', function (Blueprint $table) {
            $table->foreignIdFor(Education::class)->nullable()->constrained()->nullOnDelete();
            $table->dropColumn('education');
        });
    }
};
