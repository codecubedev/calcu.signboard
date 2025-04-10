<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Calculation;
use DB;
use Auth;
class EditCalculation extends Component
{
    public $calculation,$editbaseHeight,$editbaseWidth,$editbasecost,$editlogoHeight,$editlogoWidth,$editlogocost,$editmainHeight,$editmainWidth,$editmaincost,$editaddHeight,$editaddWidth,$editaddcost,$editbuscost,$editowncost,$edittotalcost;

    public function mount($id)
    {
        
        $this->calculation = Calculation::select(
            'calculations.*',
            'base_calculations.base_height as base_height', 
            'base_calculations.base_width as base_width', 
            'base_calculations.total_base_cost as total_base_cost',
        
            'logo_calculations.logo_height as logo_height', 
            'logo_calculations.logo_width as logo_width', 
            'logo_calculations.total_logo_cost as total_logo_cost',
        
            'main_calculations.main_height as main_height', 
            'main_calculations.main_width as main_width', 
            'main_calculations.total_main_cost as total_main_cost',
        
            'add_calculations.add_height as add_height', 
            'add_calculations.add_width as add_width', 
            'add_calculations.total_add_cost as total_add_cost',
        
            'calculations.total_business_cost', 
            'calculations.total_ownership_cost'
        )
        ->leftJoin('base_calculations', 'calculations.id', '=', 'base_calculations.calculation_id')
        ->leftJoin('logo_calculations', 'calculations.id', '=', 'logo_calculations.calculation_id')
        ->leftJoin('main_calculations', 'calculations.id', '=', 'main_calculations.calculation_id')
        ->leftJoin('add_calculations', 'calculations.id', '=', 'add_calculations.calculation_id')
        ->where('calculations.id', $id)
        ->firstOrFail();
        
        
        $this->editbaseHeight = $this->calculation->base_height;
        $this->editbaseWidth = $this->calculation->base_width;
        $this->editbasecost = $this->calculation->total_base_cost;

        $this->editlogoHeight = $this->calculation->logo_height;
        $this->editlogoWidth = $this->calculation->logo_width;
        $this->editlogocost = $this->calculation->total_logo_cost;

        $this->editmainHeight = $this->calculation->main_height;
        $this->editmainWidth = $this->calculation->main_width;
        $this->editmaincost = $this->calculation->total_main_cost;

        $this->editaddHeight = $this->calculation->add_height;
        $this->editaddWidth = $this->calculation->add_width;
        $this->editaddcost = $this->calculation->total_add_cost;

        $this->editbuscost = $this->calculation->total_business_cost;
        $this->editowncost = $this->calculation->total_ownership_cost;
        $this->edittotalcost = $this->calculation->total_cost;
    }
    public function render()
    {
        return view('livewire.edit-calculation');
    }
    public function updateCalculation()
    {
       
        $this->calculation->update([
            'total_cost' => $this->edittotalcost, 
        ]);
    
        DB::table('base_calculations')
            ->where('calculation_id', $this->calculation->id)
            ->update([
                'base_height' => $this->editbaseHeight,
                'base_width' => $this->editbaseWidth,
                'total_base_cost' => $this->editbasecost,
            ]);
    
        DB::table('logo_calculations')
            ->where('calculation_id', $this->calculation->id)
            ->update([
                'logo_height' => $this->editlogoHeight,
                'logo_width' => $this->editlogoWidth,
                'total_logo_cost' => $this->editlogocost,
            ]);
    
        DB::table('main_calculations')
            ->where('calculation_id', $this->calculation->id)
            ->update([
                'main_height' => $this->editmainHeight,
                'main_width' => $this->editmainWidth,
                'total_main_cost' => $this->editmaincost,
            ]);
    
        DB::table('add_calculations')
            ->where('calculation_id', $this->calculation->id)
            ->update([
                'add_height' => $this->editaddHeight,
                'add_width' => $this->editaddWidth,
                'total_add_cost' => $this->editaddcost,
            ]);
        if(Auth::user()->login_type == '1'){
            return redirect('dashboard')->with('message', 'Calculation saved successfully.');

        }else{
            return redirect('salesman-data_calculation')->with('message', 'Calculation saved successfully.');

        }


    
    }
}
