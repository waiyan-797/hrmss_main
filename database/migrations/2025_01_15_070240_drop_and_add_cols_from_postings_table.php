<?php

use App\Models\Division;
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
        Schema::table('postings', function (Blueprint $table) {
            $table->dropForeign(['division_id']);
            $table->dropColumn('division_id');
            $table->string('sub_department')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('postings', function (Blueprint $table) {
            $table->foreignIdFor(Division::class)->nullable()->constrained()->nullOnDelete();
            $table->dropColumn('sub_department');
        });
    }
};
