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
        Schema::create('ownership_calculations', function (Blueprint $table) {
            $table->id();
            $table->string('calculation_id')->nullable();

            $table->string('ownership_text')->nullable();
            $table->string('ownership_height')->nullable();
            $table->string('ownership_width')->nullable();
            $table->string('ownership_materials')->nullable();
            $table->string('ownership_sticker_height_width')->nullable();
            $table->string('ownership_sticker_material')->nullable();
            $table->string('ownership_general_material')->nullable();
            $table->string('ownership_paint_height_width')->nullable();
            $table->string('ownership_oracal_height_width')->nullable();
            $table->string('ownership_light_height_width')->nullable();
            $table->string('ownership_lighting_type')->nullable();
            $table->string('ownership_power_supply')->nullable();
            $table->string('ownership_power_supply_quantity')->nullable();
            $table->string('ownership_acrylic_cost')->nullable();
            $table->string('ownership_pvc_cost')->nullable();
            $table->string('ownership_sticker_cost')->nullable();
            $table->string('ownership_lighting_Cost')->nullable();
            $table->string('ownership_power_supply_cost')->nullable();
            $table->string('ownership_paint_cost')->nullable();
            $table->string('ownership_general_material_cost')->nullable();
            $table->string('ownership_lighting_price')->nullable();
            $table->string('ownership_orcale_cost')->nullable();
            $table->string('total_ownership_cost')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ownership_calculations');
    }
};
