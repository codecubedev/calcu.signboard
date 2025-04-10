<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Calculation;
use Auth;
class ListCalculation extends Component
{
    public $listcalculation;

    public function render()
    {
        if(Auth::user()->login_type == '1'){
            $this->listcalculation = Calculation::select(
                'calculations.id AS calculation_id', 
                'calculations.job_name', 
                'calculations.date',
                'calculations.sales_man',
                'calculations.company_name',
                'calculations.customer_name',
                'calculations.customer_phone_no',

                'calculations.total_cost',
                'base_calculations.base_height', 
                'base_calculations.base_width', 
                'base_calculations.total_base_cost',
                'logo_calculations.logo_height', 
                'logo_calculations.logo_width', 
                'logo_calculations.total_logo_cost',
                'main_calculations.main_height', 
                'main_calculations.main_width', 
                'main_calculations.total_main_cost',
                'add_calculations.add_height', 
                'add_calculations.add_width', 
                'add_calculations.total_add_cost'
            )
            ->leftJoin('base_calculations', 'calculations.id', '=', 'base_calculations.calculation_id')
            ->leftJoin('logo_calculations', 'calculations.id', '=', 'logo_calculations.calculation_id')
            ->leftJoin('main_calculations', 'calculations.id', '=', 'main_calculations.calculation_id')
            ->leftJoin('add_calculations', 'calculations.id', '=', 'add_calculations.calculation_id')
            ->orderBy('calculations.id', 'desc')
            ->get();
        }else{
           $this->listcalculation = Calculation::where('calculations.sales_man', Auth::user()->name) 
        ->select(
            'calculations.id AS calculation_id', 
            'calculations.job_name', 
            'calculations.date',
            'calculations.sales_man', 
            'calculations.company_name',
            'calculations.customer_name',
            'calculations.customer_phone_no',
            'calculations.total_cost',
            'base_calculations.base_height', 
            'base_calculations.base_width', 
            'base_calculations.total_base_cost',
            'logo_calculations.logo_height', 
            'logo_calculations.logo_width', 
            'logo_calculations.total_logo_cost',
            'main_calculations.main_height', 
            'main_calculations.main_width', 
            'main_calculations.total_main_cost',
            'add_calculations.add_height', 
            'add_calculations.add_width', 
            'add_calculations.total_add_cost',
            'business_calculations.total_business_cost',
            'ownership_calculations.total_ownership_cost'
        )
        ->leftJoin('base_calculations', 'calculations.id', '=', 'base_calculations.calculation_id')
        ->leftJoin('logo_calculations', 'calculations.id', '=', 'logo_calculations.calculation_id')
        ->leftJoin('main_calculations', 'calculations.id', '=', 'main_calculations.calculation_id')
        ->leftJoin('add_calculations', 'calculations.id', '=', 'add_calculations.calculation_id')
        ->leftJoin('business_calculations', 'calculations.id', '=', 'business_calculations.calculation_id')
        ->leftJoin('ownership_calculations', 'calculations.id', '=', 'ownership_calculations.calculation_id')
        ->orderBy('calculations.id', 'desc')
        ->get();

        }
        
        return view('livewire.list-calculation');
    }
    // public function deleteCalculation($id){
    //     dd($id);
    //     $calculation = Calculation::find($id);

    //     if ($calculation) {
    //         $calculation->delete();
    //         session()->flash('message', 'Calculation deleted successfully.');
    //     } else {
    //         session()->flash('error', 'Calculation not found.');
    //     }

    //     $this->listcalculation = Calculation::select(
    //         'calculations.id AS calculation_id', 
    //         'calculations.job_name', 
    //         'calculations.date',
    //         'calculations.sales_man',
    //         'calculations.total_cost',
    //         'base_calculations.base_height', 
    //         'base_calculations.base_width', 
    //         'base_calculations.total_base_cost',
    //         'logo_calculations.logo_height', 
    //         'logo_calculations.logo_width', 
    //         'logo_calculations.total_logo_cost',
    //         'main_calculations.main_height', 
    //         'main_calculations.main_width', 
    //         'main_calculations.total_main_cost',
    //         'add_calculations.add_height', 
    //         'add_calculations.add_width', 
    //         'add_calculations.total_add_cost'
    //     )
    //     ->leftJoin('base_calculations', 'calculations.id', '=', 'base_calculations.calculation_id')
    //     ->leftJoin('logo_calculations', 'calculations.id', '=', 'logo_calculations.calculation_id')
    //     ->leftJoin('main_calculations', 'calculations.id', '=', 'main_calculations.calculation_id')
    //     ->leftJoin('add_calculations', 'calculations.id', '=', 'add_calculations.calculation_id')
    //     ->orderBy('calculations.id', 'desc')
    //     ->get();
    // }
    public function deleteCalculation($id){
    $calculation = Calculation::find($id);

    if (!$calculation) {
        return response()->json(['success' => false, 'message' => 'Calculation not found.'], 404);
    }

    $calculation->delete();

    return response()->json(['success' => true, 'message' => 'Calculation deleted successfully.']);
    }
    public function Edit($id){
        return redirect()->route('edit-calculation', ['id' => $id]);
    }

}
