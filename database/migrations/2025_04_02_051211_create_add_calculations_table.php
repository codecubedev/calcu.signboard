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
            $table->integer('calculation_id')->nullable();
            $table->integer('add_order')->nullable();
            $table->string('add_text')->nullable();
            $table->decimal('add_height', 8, 2)->nullable();
            $table->decimal('add_width', 8, 2)->nullable();

            $table->text('add_materials')->nullable();
            $table->string('add_sticker_height_width')->nullable();
            $table->text('add_sticker_material')->nullable();
            $table->text('add_general_material')->nullable();
            $table->string('add_paint_height_width')->nullable();
            $table->string('add_oracal_height_width')->nullable();
            $table->string('add_light_height_width')->nullable();
            $table->text('add_lighting_type')->nullable();
            $table->string('add_power_supply')->nullable();
            $table->integer('add_power_supply_quantity')->nullable();

            // Individual cost breakdowns
            $table->decimal('add_acrylic_cost', 10, 2)->nullable();
            $table->decimal('add_pvc_cost', 10, 2)->nullable();
            $table->decimal('add_sticker_cost', 10, 2)->nullable();
            $table->decimal('add_lighting_cost', 10, 2)->nullable();
            $table->decimal('add_power_supply_cost', 10, 2)->nullable();
            $table->decimal('add_paint_cost', 10, 2)->nullable();
            $table->decimal('add_general_material_cost', 10, 2)->nullable();
            $table->decimal('add_lighting_price', 10, 2)->nullable();
            $table->decimal('add_oracal_cost', 10, 2)->nullable();

            $table->decimal('total_add_cost', 12, 2)->nullable();

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
