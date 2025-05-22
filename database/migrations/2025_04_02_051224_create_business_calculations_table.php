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
        Schema::create('business_calculations', function (Blueprint $table) {
            $table->id();
            $table->integer('calculation_id')->nullable();
            $table->integer('business_order')->nullable();
            $table->string('business_text')->nullable();
            $table->decimal('business_height', 8, 2)->nullable();
            $table->decimal('business_width', 8, 2)->nullable();
            $table->text('business_materials')->nullable();
            $table->string('business_sticker_height_width')->nullable();
            $table->text('business_sticker_material')->nullable();
            $table->text('business_general_material')->nullable();
            $table->string('business_paint_height_width')->nullable();
            $table->string('business_oracal_height_width')->nullable();
            $table->string('business_light_height_width')->nullable();
            $table->text('business_lighting_type')->nullable();
            $table->string('business_power_supply')->nullable();
            $table->integer('business_power_supply_quantity')->nullable();
            $table->decimal('business_acrylic_cost', 10, 2)->nullable();
            $table->decimal('business_pvc_cost', 10, 2)->nullable();
            $table->decimal('business_sticker_cost', 10, 2)->nullable();
            $table->decimal('business_lighting_cost', 10, 2)->nullable();
            $table->decimal('business_power_supply_cost', 10, 2)->nullable();
            $table->decimal('business_paint_cost', 10, 2)->nullable();
            $table->decimal('business_general_material_cost', 10, 2)->nullable();
            $table->decimal('business_lighting_price', 10, 2)->nullable();
            $table->decimal('business_oracal_cost', 10, 2)->nullable();

            $table->decimal('total_business_cost', 12, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_calculations');
    }
};
