<?php

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
        Schema::create('base_calculations', function (Blueprint $table) {
            $table->id();
            $table->string('calculation_id')->nullable();
            $table->string('job_name')->nullable();
            $table->string('date')->nullable();
            $table->string('sales_man')->nullable();
            $table->string('base_type')->nullable();
            $table->string('base_member')->nullable();
            $table->string('base_height')->nullable();
            $table->string('base_width')->nullable();
            $table->string('total_base_cost')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_calculations');
    }
};
