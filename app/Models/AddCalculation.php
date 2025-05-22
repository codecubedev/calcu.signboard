<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddCalculation extends Model
{
    use HasFactory;
    protected $fillable = [
       
        'add_text', 'add_height','add_order', 'add_width', 'add_materials',
        'add_sticker_height_width', 'add_sticker_material', 'add_general_material',
        'add_paint_height_width', 'add_oracal_height_width', 'add_light_height_width',
        'add_lighting_type', 'add_power_supply', 'add_power_supply_quantity',
        'add_acrylic_cost', 'add_pvc_cost', 'add_sticker_cost',
        'add_lighting_Cost', 'add_power_supply_cost', 'add_paint_cost',
        'add_general_material_cost', 'add_lighting_price', 'add_orcale_cost',
        'total_add_cost','calculation_id'
    ];
}
