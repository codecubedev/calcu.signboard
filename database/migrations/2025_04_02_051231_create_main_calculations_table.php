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
            $table->integer('calculation_id')->nullable();
            $table->string('main_order')->nullable();
            $table->string('main_text')->nullable();
            $table->string('main_height')->nullable();
            $table->string('main_width')->nullable();
            $table->string('main_clear_acrylic')->nullable();
            $table->string('main_clear_acrylic_amount')->nullable();
            $table->string('main_black_acrylic')->nullable();
            $table->string('main_black_acrylic_amount')->nullable();
            $table->string('main_pvc')->nullable();
            $table->string('main_pvc_amount')->nullable();
            $table->string('main_stainless_steel_silver')->nullable();
            $table->string('main_stainless_steel_gold_amount')->nullable();
            $table->string('main_stainless_steel_gold')->nullable();
            $table->string('main_stainless_steel_gold_amount')->nullable();
            $table->string('main_neon')->nullable();
            $table->string('main_neon_amount')->nullable();
            $table->string('main_sticker')->nullable();
            $table->string('main_sticker_list')->nullable();
            $table->string('main_sticker_amount')->nullable();
            $table->string('main_general_material')->nullable();
            $table->string('main_general_material_amount')->nullable();
            $table->string('main_paint')->nullable();
            $table->string('main_paint_amount')->nullable();
            $table->string('main_oracal')->nullable();
            $table->string('main_oracal_amount')->nullable();
            $table->string('main_iron_hollow_20mm')->nullable();
            $table->string('main_iron_hollow_20mm_amount')->nullable();
            $table->string('main_iron_hollow_10mm')->nullable();
            $table->string('main_iron_hollow_10mm_amount')->nullable();
            $table->string('main_spotlight_bracket')->nullable();
            $table->string('main_spotlight_bracket_amount')->nullable();
            $table->string('main_dimmer')->nullable();
            $table->string('main_dimmer')->nullable();
            $table->string('main_lighting')->nullable();
            $table->string('main_lighting_type')->nullable();
            $table->string('main_lighting_type_amount')->nullable();
            $table->string('main_power_supply')->nullable();
            $table->string('main_power_supply_amount')->nullable();
            $table->string('main_power_supply_qnt_amount')->nullable();
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
