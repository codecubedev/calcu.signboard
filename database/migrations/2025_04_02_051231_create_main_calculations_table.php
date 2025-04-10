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
        Schema::create('main_calculations', function (Blueprint $table) {
            $table->id();
            $table->string('calculation_id')->nullable();

            $table->string('main_text')->nullable();
            $table->string('main_height')->nullable();
            $table->string('main_width')->nullable();
            $table->string('main_materials')->nullable();
            $table->string('main_sticker_height_width')->nullable();
            $table->string('main_sticker_material')->nullable();
            $table->string('main_general_material')->nullable();
            $table->string('main_paint_height_width')->nullable();
            $table->string('main_oracal_height_width')->nullable();
            $table->string('main_light_height_width')->nullable();
            $table->string('main_lighting_type')->nullable();
            $table->string('main_power_supply')->nullable();
            $table->string('main_power_supply_quantity')->nullable();
            $table->string('main_acrylic_cost')->nullable();
            $table->string('main_pvc_cost')->nullable();
            $table->string('main_sticker_cost')->nullable();
            $table->string('main_lighting_Cost')->nullable();
            $table->string('main_power_supply_cost')->nullable();
            $table->string('main_paint_cost')->nullable();
            $table->string('main_general_material_cost')->nullable();
            $table->string('main_lighting_price')->nullable();
            $table->string('main_orcale_cost')->nullable();
            $table->string('total_main_cost')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_calculations');
    }
};
