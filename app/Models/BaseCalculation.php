<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseCalculation extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_name', 'date', 'sales_man',
        'base_type', 'base_member', 'base_height', 'base_width','total_base_cost','calculation_id'
       
    ];
}
