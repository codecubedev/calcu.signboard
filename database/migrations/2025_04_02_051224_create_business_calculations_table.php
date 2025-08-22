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
            $table->string('business_order')->nullable();
            $table->string('business_text')->nullable();
            $table->string('business_height')->nullable();
            $table->string('business_width')->nullable();
            $table->string('business_clear_acrylic')->nullable();
            $table->string('business_clear_acrylic_amount')->nullable();
            $table->string('business_black_acrylic')->nullable();
            $table->string('business_black_acrylic_amount')->nullable();
            $table->string('business_pvc')->nullable();
            $table->string('business_pvc_amount')->nullable();
            $table->string('business_stainless_steel_silver')->nullable();
            $table->string('business_stainless_steel_gold_amount')->nullable();
            $table->string('business_stainless_steel_gold')->nullable();
            $table->string('business_stainless_steel_gold_amount')->nullable();
            $table->string('business_neon')->nullable();
            $table->string('business_neon_amount')->nullable();
            $table->string('business_sticker')->nullable();
            $table->string('business_sticker_list')->nullable();
            $table->string('business_sticker_amount')->nullable();
            $table->string('business_general_material')->nullable();
            $table->string('business_general_material_amount')->nullable();
            $table->string('business_paint')->nullable();
            $table->string('business_paint_amount')->nullable();
            $table->string('business_oracal')->nullable();
            $table->string('business_oracal_amount')->nullable();
            $table->string('business_iron_hollow_20mm')->nullable();
            $table->string('business_iron_hollow_20mm_amount')->nullable();
            $table->string('business_iron_hollow_10mm')->nullable();
            $table->string('business_iron_hollow_10mm_amount')->nullable();
            $table->string('business_spotlight_bracket')->nullable();
            $table->string('business_spotlight_bracket_amount')->nullable();
            $table->string('business_dimmer')->nullable();
            $table->string('business_dimmer')->nullable();
            $table->string('business_lighting')->nullable();
            $table->string('business_lighting_type')->nullable();
            $table->string('business_lighting_type_amount')->nullable();
            $table->string('business_power_supply')->nullable();
            $table->string('business_power_supply_amount')->nullable();
            $table->string('business_power_supply_qnt_amount')->nullable();
            $table->string('total_business_cost')->nullable();
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
