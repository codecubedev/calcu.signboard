<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCalculation extends Model
{
    use HasFactory;
    protected $fillable = [
       
        'main_text', 'main_height', 'main_width', 'main_materials',
        'main_sticker_height_width', 'main_sticker_material', 'main_general_material',
        'main_paint_height_width', 'main_oracal_height_width', 'main_light_height_width',
        'main_lighting_type', 'main_power_supply', 'main_power_supply_quantity',
        'main_acrylic_cost', 'main_pvc_cost', 'main_sticker_cost',
        'main_lighting_Cost', 'main_power_supply_cost', 'main_paint_cost',
        'main_general_material_cost', 'main_lighting_price', 'main_orcale_cost',
        'total_main_cost','calculation_id'
    ];
}
