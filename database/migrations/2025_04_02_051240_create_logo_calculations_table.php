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
            $table->integer('logo_order')->nullable();
            $table->string('logo_text')->nullable();
            $table->decimal('logo_height', 8, 2)->nullable();
            $table->decimal('logo_width', 8, 2)->nullable();

            $table->text('logo_materials')->nullable();
            $table->string('logo_sticker_height_width')->nullable();
            $table->text('logo_sticker_material')->nullable();
            $table->text('logo_general_material')->nullable();
            $table->string('logo_paint_height_width')->nullable();
            $table->string('logo_oracal_height_width')->nullable();
            $table->string('logo_light_height_width')->nullable();
            $table->text('logo_lighting_type')->nullable();
            $table->string('logo_power_supply')->nullable();
            $table->integer('logo_power_supply_quantity')->nullable();

            // Individual cost breakdowns
            $table->decimal('logo_acrylic_cost', 10, 2)->nullable();
            $table->decimal('logo_pvc_cost', 10, 2)->nullable();
            $table->decimal('logo_sticker_cost', 10, 2)->nullable();
            $table->decimal('logo_lighting_cost', 10, 2)->nullable();
            $table->decimal('logo_power_supply_cost', 10, 2)->nullable();
            $table->decimal('logo_paint_cost', 10, 2)->nullable();
            $table->decimal('logo_general_material_cost', 10, 2)->nullable();
            $table->decimal('logo_lighting_price', 10, 2)->nullable();
            $table->decimal('logo_oracal_cost', 10, 2)->nullable();

            $table->decimal('total_logo_cost', 12, 2)->nullable();

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
