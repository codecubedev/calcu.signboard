<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Calculation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\LogoCalculation;
use App\Models\BaseCalculation;
use App\Models\MainCalculation;
use App\Models\AddCalculation;
use App\Models\BusinessCalculation;
use App\Models\OwnershipCalculation;

class EditCalculation extends Component
{
    public $calculation, $editbaseHeight, $editbaseWidth, $editbasecost, $editlogoHeight, $editlogoWidth, $editlogocost, $editmainHeight, $editmainWidth, $editmaincost, $editaddHeight, $editaddWidth, $editaddcost, $editbuscost, $editowncost, $edittotalcost;
    public $editLogos = [];
    public $editAdditionals = [];
    public $editMains = [];
    public $editBusinesses = [];
    public $editOwners = [];

    public $baseId;

    public function mount($id)
    {
        $this->calculation = Calculation::findOrFail($id);

        $base = BaseCalculation::where('calculation_id', $id)->first();
        if ($base) {
            $this->baseId = $base->id;
            $this->editbaseHeight = $base->base_height;
            $this->editbaseWidth = $base->base_width;
            $this->editbasecost = $base->total_base_cost;
        }

        $this->editLogos = LogoCalculation::where('calculation_id', $id)->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'height' => $item->logo_height,
                'width' => $item->logo_width,
                'cost' => $item->total_logo_cost,
            ];
        })->toArray();

    }

    public function updateCalculation()
    {
        DB::transaction(function () {
            if ($this->baseId) {
                BaseCalculation::where('id', $this->baseId)->update([
                    'base_height' => $this->editbaseHeight,
                    'base_width' => $this->editbaseWidth,
                    'total_base_cost' => $this->editbasecost,
                ]);
            } else {
                BaseCalculation::create([
                    'calculation_id' => $this->calculation->id,
                    'base_height' => $this->editbaseHeight,
                    'base_width' => $this->editbaseWidth,
                    'total_base_cost' => $this->editbasecost,
                ]);
            }

            foreach ($this->editLogos as $logo) {
                if (!empty($logo['id'])) {
                    LogoCalculation::where('id', $logo['id'])->update([
                        'logo_height' => $logo['height'],
                        'logo_width' => $logo['width'],
                        'total_logo_cost' => $logo['cost'],
                    ]);
                } else {
                    LogoCalculation::create([
                        'calculation_id' => $this->calculation->id,
                        'logo_height' => $logo['height'],
                        'logo_width' => $logo['width'],
                        'total_logo_cost' => $logo['cost'],
                    ]);
                }
            }

            foreach ($this->editMains as $main) {
                if (!empty($main['id'])) {
                    MainCalculation::where('id', $main['id'])->update([
                        'main_height' => $main['height'],
                        'main_width' => $main['width'],
                        'total_main_cost' => $main['cost'],
                    ]);
                } else {
                    MainCalculation::create([
                        'calculation_id' => $this->calculation->id,
                        'main_height' => $main['height'],
                        'main_width' => $main['width'],
                        'total_main_cost' => $main['cost'],
                    ]);
                }
            }

            
        });

        if (Auth::user()->login_type == '1') {
            return redirect('dashboard')->with('message', 'Calculation saved successfully.');
        } else {
            return redirect('salesman-data_calculation')->with('message', 'Calculation saved successfully.');
        }
    }

    public function render()
    {
        return view('livewire.edit-calculation');
    }
}
