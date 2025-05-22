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
            $table->integer('main_order')->nullable();
            $table->string('main_text')->nullable();
            $table->decimal('main_height', 8, 2)->nullable();
            $table->decimal('main_width', 8, 2)->nullable();
            $table->text('main_materials')->nullable();
            $table->string('main_sticker_height_width')->nullable();
            $table->text('main_sticker_material')->nullable();
            $table->text('main_general_material')->nullable();
            $table->string('main_paint_height_width')->nullable();
            $table->string('main_oracal_height_width')->nullable();
            $table->string('main_light_height_width')->nullable();
            $table->text('main_lighting_type')->nullable();
            $table->string('main_power_supply')->nullable();
            $table->integer('main_power_supply_quantity')->nullable();
            $table->decimal('main_acrylic_cost', 10, 2)->nullable();
            $table->decimal('main_pvc_cost', 10, 2)->nullable();
            $table->decimal('main_sticker_cost', 10, 2)->nullable();
            $table->decimal('main_lighting_cost', 10, 2)->nullable();
            $table->decimal('main_power_supply_cost', 10, 2)->nullable();
            $table->decimal('main_paint_cost', 10, 2)->nullable();
            $table->decimal('main_general_material_cost', 10, 2)->nullable();
            $table->decimal('main_lighting_price', 10, 2)->nullable();
            $table->decimal('main_oracal_cost', 10, 2)->nullable();
            $table->decimal('total_main_cost', 12, 2)->nullable();

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
