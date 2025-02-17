<?php

use App\Models\EducationGroup;
use App\Models\EducationType;
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
        Schema::table('education', function (Blueprint $table) {
            $table->foreignIdFor(EducationType::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(EducationGroup::class)->nullable()->constrained()->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('education', function (Blueprint $table) {
            $table->dropForeign(['education_type_id', 'education_group_id']);
            $table->dropColumn('education_type_id');
            $table->dropColumn('education_group_id');
        });
    }
};
