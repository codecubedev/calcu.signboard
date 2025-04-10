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
            $table->string('calculation_id')->nullable();

            $table->string('business_text')->nullable();
            $table->string('business_height')->nullable();
            $table->string('business_width')->nullable();
            $table->string('business_materials')->nullable();
            $table->string('business_sticker_height_width')->nullable();
            $table->string('business_sticker_material')->nullable();
            $table->string('business_general_material')->nullable();
            $table->string('business_paint_height_width')->nullable();
            $table->string('business_oracal_height_width')->nullable();
            $table->string('business_light_height_width')->nullable();
            $table->string('business_lighting_type')->nullable();
            $table->string('business_power_supply')->nullable();
            $table->string('business_power_supply_quantity')->nullable();
            $table->string('business_acrylic_cost')->nullable();
            $table->string('business_pvc_cost')->nullable();
            $table->string('business_sticker_cost')->nullable();
            $table->string('business_lighting_Cost')->nullable();
            $table->string('business_power_supply_cost')->nullable();
            $table->string('business_paint_cost')->nullable();
            $table->string('business_general_material_cost')->nullable();
            $table->string('business_lighting_price')->nullable();
            $table->string('business_orcale_cost')->nullable();
            $table->string('total_business_cost')->nullable();
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
