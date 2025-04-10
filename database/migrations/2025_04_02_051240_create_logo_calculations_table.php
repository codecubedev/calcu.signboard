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
        Schema::create('logo_calculations', function (Blueprint $table) {
            $table->id();
            $table->string('calculation_id')->nullable();

            $table->string('logo_text')->nullable();
            $table->string('logo_height')->nullable();
            $table->string('logo_width')->nullable();
            $table->string('logo_materials')->nullable();
            $table->string('logo_sticker_height_width')->nullable();
            $table->string('logo_sticker_material')->nullable();
            $table->string('logo_general_material')->nullable();
            $table->string('logo_paint_height_width')->nullable();
            $table->string('logo_oracal_height_width')->nullable();
            $table->string('logo_light_height_width')->nullable();
            $table->string('logo_lighting_type')->nullable();
            $table->string('logo_power_supply')->nullable();
            $table->string('logo_power_supply_quantity')->nullable();
            $table->string('logo_acrylic_cost')->nullable();
            $table->string('logo_pvc_cost')->nullable();
            $table->string('logo_sticker_cost')->nullable();
            $table->string('logo_lighting_Cost')->nullable();
            $table->string('logo_power_supply_cost')->nullable();
            $table->string('logo_paint_cost')->nullable();
            $table->string('logo_general_material_cost')->nullable();
            $table->string('logo_lighting_price')->nullable();
            $table->string('logo_orcale_cost')->nullable();
            $table->string('total_logo_cost')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logo_calculations');
    }
};
