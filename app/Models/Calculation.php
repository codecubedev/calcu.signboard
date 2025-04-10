<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_name','customer_name','customer_phone_no','company_name', 'date', 'sales_man','total_cost','total_base_cost','total_logo_cost','total_main_cost','total_add_cost','total_business_cost','total_ownership_cost','calculation_id'
    ];
}
