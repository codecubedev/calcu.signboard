<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_name',
        'date',
        'salesperson',
        'login_type',
        'customer_name',
        'customer_phone_no',
        'qt_inv_number',
        'remark',
        'image',
        'company_name',
        'total_base_cost',
        'total_logo_cost',
        'total_main_cost',
        'total_add_cost',
        'total_business_cost',
        'total_ownership_cost',
        'total_cost',
        'calculation_id'
    ];

    protected $casts = [
        'image' => 'array',
    ];

    public function baseCalculation()
    {
        return $this->hasOne(BaseCalculation::class, 'calculation_id');
    }

    public function logoCalculation()
    {
        return $this->hasOne(LogoCalculation::class, 'calculation_id');
    }

    public function mainCalculation()
    {
        return $this->hasOne(MainCalculation::class, 'calculation_id');
    }

    public function addCalculation()
    {
        return $this->hasOne(AddCalculation::class, 'calculation_id');
    }
}
