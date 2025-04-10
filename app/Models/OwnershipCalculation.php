<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnershipCalculation extends Model
{
    use HasFactory;
    protected $fillable = [
       
        'ownership_text', 'ownership_height', 'ownership_width', 'ownership_materials',
        'ownership_sticker_height_width', 'ownership_sticker_material', 'ownership_general_material',
        'ownership_paint_height_width', 'ownership_oracal_height_width', 'ownership_light_height_width',
        'ownership_lighting_type', 'ownership_power_supply', 'ownership_power_supply_quantity',
        'ownership_acrylic_cost', 'ownership_pvc_cost', 'ownership_sticker_cost',
        'ownership_lighting_Cost', 'ownership_power_supply_cost', 'ownership_paint_cost',
        'ownership_general_material_cost', 'ownership_lighting_price', 'ownership_orcale_cost',
        'total_ownership_cost','calculation_id'
    ];
}
