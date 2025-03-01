<?php

use App\Livewire\Staff;
use App\Models\Division;
use App\Models\Staff as ModelsStaff;
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
        Schema::create('last_pay_certificates', function (Blueprint $table) {
            $table->id();
            
            $table->foreignIdFor(ModelsStaff::class , 'staff_id');
            $table->foreignIdFor(Division::class , 'from_division_id');
            $table->foreignIdFor(Division::class , 'to_division_id');
            $table->string('transfer_date');

            $table->string('ordered_date');
            $table->string('paid_up_to_date');

            $table->integer('amount');
            
            $table->string('order_no');
            
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('last_pay_certificates');
    }
};
