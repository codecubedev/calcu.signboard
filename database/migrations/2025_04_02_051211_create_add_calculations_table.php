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
        Schema::create('add_calculations', function (Blueprint $table) {
            $table->id();
            $table->string('calculation_id')->nullable();
            $table->string('add_text')->nullable();
            $table->string('add_height')->nullable();
            $table->string('add_width')->nullable();
            $table->string('add_materials')->nullable();
            $table->string('add_sticker_height_width')->nullable();
            $table->string('add_sticker_material')->nullable();
            $table->string('add_general_material')->nullable();
            $table->string('add_paint_height_width')->nullable();
            $table->string('add_oracal_height_width')->nullable();
            $table->string('add_light_height_width')->nullable();
            $table->string('add_lighting_type')->nullable();
            $table->string('add_power_supply')->nullable();
            $table->string('add_power_supply_quantity')->nullable();
            $table->string('add_acrylic_cost')->nullable();
            $table->string('add_pvc_cost')->nullable();
            $table->string('add_sticker_cost')->nullable();
            $table->string('add_lighting_Cost')->nullable();
            $table->string('add_power_supply_cost')->nullable();
            $table->string('add_paint_cost')->nullable();
            $table->string('add_general_material_cost')->nullable();
            $table->string('add_lighting_price')->nullable();
            $table->string('add_orcale_cost')->nullable();
            $table->string('total_add_cost')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_calculations');
    }
};
