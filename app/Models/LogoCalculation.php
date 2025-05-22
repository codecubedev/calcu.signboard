<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogoCalculation extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_name', 'date','logo_order' ,'sales_man',
        'base_type', 'base_member', 'base_height', 'base_width',
        'logo_text', 'logo_height', 'logo_width', 'logo_materials',
        'logo_sticker_height_width', 'logo_sticker_material', 'logo_general_material',
        'logo_paint_height_width', 'logo_oracal_height_width', 'logo_light_height_width',
        'logo_lighting_type', 'logo_power_supply', 'logo_power_supply_quantity',
        'logo_acrylic_cost', 'logo_pvc_cost', 'logo_sticker_cost',
        'logo_lighting_Cost', 'logo_power_supply_cost', 'logo_paint_cost',
        'logo_general_material_cost', 'logo_lighting_price', 'logo_orcale_cost',
        'total_logo_cost','calculation_id'
        
    ];
}
