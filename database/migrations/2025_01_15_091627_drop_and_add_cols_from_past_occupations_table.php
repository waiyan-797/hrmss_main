<?php

use App\Models\Ministry;
use App\Models\Section;
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
        Schema::table('past_occupations', function (Blueprint $table) {
            $table->dropForeign(['section_id']);
            $table->dropColumn('section_id');
            $table->foreignIdFor(Ministry::class)->nullable()->constrained()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('past_occupations', function (Blueprint $table) {
            $table->foreignIdFor(Section::class)->nullable()->constrained()->nullOnDelete();
            $table->dropForeign(['ministry_id']);
            $table->dropColumn('ministry_id');
        });
    }
};
