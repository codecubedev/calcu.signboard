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
            $table->decimal('ownership_height', 8, 2)->nullable();
            $table->decimal('ownership_width', 8, 2)->nullable();
            $table->text('ownership_materials')->nullable();
            $table->string('ownership_sticker_height_width')->nullable();
            $table->text('ownership_sticker_material')->nullable();
            $table->text('ownership_general_material')->nullable();
            $table->string('ownership_paint_height_width')->nullable();
            $table->string('ownership_oracal_height_width')->nullable();
            $table->string('ownership_light_height_width')->nullable();
            $table->text('ownership_lighting_type')->nullable();
            $table->string('ownership_power_supply')->nullable();
            $table->integer('ownership_power_supply_quantity')->nullable();
            $table->decimal('ownership_acrylic_cost', 10, 2)->nullable();
            $table->decimal('ownership_pvc_cost', 10, 2)->nullable();
            $table->decimal('ownership_sticker_cost', 10, 2)->nullable();
            $table->decimal('ownership_lighting_cost', 10, 2)->nullable();
            $table->decimal('ownership_power_supply_cost', 10, 2)->nullable();
            $table->decimal('ownership_paint_cost', 10, 2)->nullable();
            $table->decimal('ownership_general_material_cost', 10, 2)->nullable();
            $table->decimal('ownership_lighting_price', 10, 2)->nullable();
            $table->decimal('ownership_oracal_cost', 10, 2)->nullable();

            $table->decimal('total_ownership_cost', 12, 2)->nullable();
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
