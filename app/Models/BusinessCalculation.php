<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessCalculation extends Model
{
    use HasFactory;
    protected $fillable = [
       
        'business_text', 'business_height', 'business_width', 'business_materials',
        'business_sticker_height_width', 'business_sticker_material', 'business_general_material',
        'business_paint_height_width', 'business_oracal_height_width', 'business_light_height_width',
        'business_lighting_type', 'business_power_supply', 'business_power_supply_quantity',
        'business_acrylic_cost', 'business_pvc_cost', 'business_sticker_cost',
        'business_lighting_Cost', 'business_power_supply_cost', 'business_paint_cost',
        'business_general_material_cost', 'business_lighting_price', 'business_orcale_cost',
        'total_business_cost','calculation_id'
    ];
}
