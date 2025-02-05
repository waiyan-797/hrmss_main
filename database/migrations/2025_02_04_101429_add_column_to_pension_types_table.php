<?php

use App\Models\RetireType;
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
        Schema::table('pension_types', function (Blueprint $table) {
            $table->foreignIdFor(RetireType::class)->nullable()->constrained()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pension_types', function (Blueprint $table) {
            $table->dropForeign(['retire_type_id']);
            $table->dropColumn('retire_type_id');
        });
    }
};
