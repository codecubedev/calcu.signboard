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

        Schema::create('calculations', function (Blueprint $table) {
            $table->id();
            $table->string('job_name')->nullable();
            $table->string('date')->nullable();
            $table->string('salesperson')->nullable();
            $table->string('login_type')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_phone_no')->nullable();
            $table->string('qt_inv_number')->nullable();
            $table->string('remark')->nullable();
            $table->text('image')->nullable();
            $table->string('company_name')->nullable();
            $table->string('total_base_cost')->nullable();
            $table->string('total_logo_cost')->nullable();
            $table->string('total_main_cost')->nullable();
            $table->string('total_add_cost')->nullable();
            $table->string('total_business_cost')->nullable();
            $table->string('total_ownership_cost')->nullable();
            $table->string('total_cost')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calculations');
    }
};
