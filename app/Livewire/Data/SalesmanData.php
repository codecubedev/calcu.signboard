<?php

namespace App\Livewire\Data;

use Livewire\Component;
use App\Models\Calculation;
use Illuminate\Support\Facades\DB;
class SalesmanData extends Component
{

    public $listcalculation;
    public $total_logo_cost = 0;
    public $total_main_cost = 0;
    public $total_add_cost = 0;
    public $total_ownership_cost = 0;
    public $total_business_cost = 0;
    public function render()
    {
        $this->listcalculation = Calculation::where('login_type', '2')->select(
            'calculations.id AS calculation_id',
            'calculations.job_name',
            'calculations.date',
            DB::raw('SUM(COALESCE(logo_calculations.total_logo_cost, 0)) AS total_logo_cost'),
            DB::raw('SUM(COALESCE(main_calculations.total_main_cost, 0)) AS total_main_cost'),
            DB::raw('SUM(COALESCE(add_calculations.total_add_cost, 0)) AS total_add_cost'),
            DB::raw('SUM(COALESCE(ownership_calculations.total_ownership_cost, 0)) AS total_ownership_cost'),
            DB::raw('SUM(COALESCE(business_calculations.total_business_cost, 0)) AS total_business_cost')
        )
            ->leftJoin('logo_calculations', 'calculations.id', '=', 'logo_calculations.calculation_id')
            ->leftJoin('main_calculations', 'calculations.id', '=', 'main_calculations.calculation_id')
            ->leftJoin('add_calculations', 'calculations.id', '=', 'add_calculations.calculation_id')
            ->leftJoin('ownership_calculations', 'calculations.id', '=', 'ownership_calculations.calculation_id')
            ->leftJoin('business_calculations', 'calculations.id', '=', 'business_calculations.calculation_id')
            ->groupBy('calculations.id', 'calculations.job_name', 'calculations.date')
            ->orderBy('calculations.id', 'desc')
            ->get();

        // Calculate totals
        $this->total_logo_cost = $this->listcalculation->sum('total_logo_cost');
        $this->total_main_cost = $this->listcalculation->sum('total_main_cost');
        $this->total_add_cost = $this->listcalculation->sum('total_add_cost');
        $this->total_ownership_cost = $this->listcalculation->sum('total_ownership_cost');
        $this->total_business_cost = $this->listcalculation->sum('total_business_cost');
        return view('livewire.data.salesman-data');
    }
   
    public function deleteCalculation($id)
    {
        $calculation = Calculation::find($id);

        if (!$calculation) {
            return response()->json(['success' => false, 'message' => 'Calculation not found.'], 404);
        }

        $calculation->delete();

        return response()->json(['success' => true, 'message' => 'Calculation deleted successfully.']);
    }
    public function Edit($id)
    {
        return redirect()->route('edit-calculation', ['id' => $id]);
    }
}
