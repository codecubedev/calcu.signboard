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
            $table->integer('calculation_id')->nullable();
            $table->integer('ownership_order')->nullable();
            $table->string('ownership_text')->nullable();
            $table->string('ownership_height')->nullable();
            $table->string('ownership_width')->nullable();
            $table->string('ownership_clear_acrylic')->nullable();
            $table->string('ownership_clear_acrylic_amount')->nullable();
            $table->string('ownership_black_acrylic')->nullable();
            $table->string('ownership_black_acrylic_amount')->nullable();
            $table->string('ownership_pvc')->nullable();
            $table->string('ownership_pvc_amount')->nullable();
            $table->string('ownership_stainless_steel_silver')->nullable();
            $table->string('ownership_stainless_steel_gold_amount')->nullable();
            $table->string('ownership_stainless_steel_gold')->nullable();
            $table->string('ownership_stainless_steel_gold_amount')->nullable();
            $table->string('ownership_neon')->nullable();
            $table->string('ownership_neon_amount')->nullable();
            $table->string('ownership_sticker')->nullable();
            $table->string('ownership_sticker_list')->nullable();
            $table->string('ownership_sticker_amount')->nullable();
            $table->string('ownership_general_material')->nullable();
            $table->string('ownership_general_material_amount')->nullable();
            $table->string('ownership_paint')->nullable();
            $table->string('ownership_paint_amount')->nullable();
            $table->string('ownership_oracal')->nullable();
            $table->string('ownership_oracal_amount')->nullable();
            $table->string('ownership_iron_hollow_20mm')->nullable();
            $table->string('ownership_iron_hollow_20mm_amount')->nullable();
            $table->string('ownership_iron_hollow_10mm')->nullable();
            $table->string('ownership_iron_hollow_10mm_amount')->nullable();
            $table->string('ownership_spotlight_bracket')->nullable();
            $table->string('ownership_spotlight_bracket_amount')->nullable();
            $table->string('ownership_dimmer')->nullable();
            $table->string('ownership_dimmer')->nullable();
            $table->string('ownership_lighting')->nullable();
            $table->string('ownership_lighting_type')->nullable();
            $table->string('ownership_lighting_type_amount')->nullable();
            $table->string('ownership_power_supply')->nullable();
            $table->string('ownership_power_supply_amount')->nullable();
            $table->string('ownership_power_supply_qnt_amount')->nullable();
            $table->string('total_ownership_cost')->nullable();
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
