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
            $table->integer('calculation_id')->nullable();
            $table->string('logo_order')->nullable();
            $table->string('logo_text')->nullable();
            $table->string('logo_height')->nullable();
            $table->string('logo_width')->nullable();
            $table->string('logo_clear_acrylic')->nullable();
            $table->string('logo_clear_acrylic_amount')->nullable();
            $table->string('logo_black_acrylic')->nullable();
            $table->string('logo_black_acrylic_amount')->nullable();
            $table->string('logo_pvc')->nullable();
            $table->string('logo_pvc_amount')->nullable();
            $table->string('logo_stainless_steel_silver')->nullable();
            $table->string('logo_stainless_steel_gold_amount')->nullable();
            $table->string('logo_stainless_steel_gold')->nullable();
            $table->string('logo_stainless_steel_gold_amount')->nullable();
            $table->string('logo_neon')->nullable();
            $table->string('logo_neon_amount')->nullable();
            $table->string('logo_sticker')->nullable();
            $table->string('logo_sticker_list')->nullable();
            $table->string('logo_sticker_amount')->nullable();
            $table->string('logo_general_material')->nullable();
            $table->string('logo_general_material_amount')->nullable();
            $table->string('logo_paint')->nullable();
            $table->string('logo_paint_amount')->nullable();
            $table->string('logo_oracal')->nullable();
            $table->string('logo_oracal_amount')->nullable();
            $table->string('logo_iron_hollow_20mm')->nullable();
            $table->string('logo_iron_hollow_20mm_amount')->nullable();
            $table->string('logo_iron_hollow_10mm')->nullable();
            $table->string('logo_iron_hollow_10mm_amount')->nullable();
            $table->string('logo_spotlight_bracket')->nullable();
            $table->string('logo_spotlight_bracket_amount')->nullable();
            $table->string('logo_dimmer')->nullable();
            $table->string('logo_dimmer')->nullable();
            $table->string('logo_lighting')->nullable();
            $table->string('logo_lighting_type')->nullable();
            $table->string('logo_lighting_type_amount')->nullable();
            $table->string('logo_power_supply')->nullable();
            $table->string('logo_power_supply_amount')->nullable();
            $table->string('logo_power_supply_qnt_amount')->nullable();
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
