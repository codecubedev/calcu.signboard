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
use Livewire\WithFileUploads;

class EditCalculation extends Component
{
    use WithFileUploads;

    public $edit_job_name, $edit_date, $edit_totalcost, $edit_company_name, $edit_customer_name, $edit_customer_phone_no;

    public $edit_logoText, $edit_characterCount, $edit_baseType, $edit_baseMember, $edit_baseHeight, $edit_baseWidth, $edit_baseCost = 0;

    public $edit_logoHeight, $edit_logoWidth, $edit_logoTotal = 0, $edit_logoStickerHeightWidth, $edit_logooracalHeightWidth, $edit_acrylicCost, $edit_pvcCost;
    public $edit_stickerCost, $edit_lightingCost, $edit_powerSupplyCost, $edit_paintCost, $edit_generalMaterialCost, $edit_stickerArea, $edit_addwhiteacryliccost, $edit_lightingprice, $edit_orcaleCost;

    public $edit_logoLightingTypes;
    public $edit_logolightHeightWidth = [], $edit_logoPowerSupply, $edit_logoPowerSupplyQuantity = 0;

    public $edit_logoPcs = 1, $edit_logoPaintHeightWidth, $edit_logoStickerHeight, $edit_logoStickerWidth, $edit_logoLightingWidth, $edit_logoLightingHeight;

    public $edit_logoMaterials = [], $edit_stickerMaterial = [], $edit_generalMaterial = [];
    public $edit_logoLightingType = [];
    public $edit_aluminium_channel_border = [];

    public $edit_qt_inv_number, $edit_salesperson, $edit_remark;

    public $edit_image = [];
    public $editlogocost;

    public $edit_clearacrylic;


    // others

    public $calculation;
    public $editbaseHeight, $editbaseWidth, $editbasecost;
    public $editmainHeight, $editmainWidth, $editmaincost;
    public $editaddHeight, $editaddWidth, $editaddcost;
    public $editbuscost, $editowncost, $edittotalcost;








    public $editLogos = [];
    public $editMains = [];
    public $editAdditionals = [];
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

        $this->editMains = MainCalculation::where('calculation_id', $id)->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'height' => $item->main_height,
                'width' => $item->main_width,
                'cost' => $item->total_main_cost,
            ];
        })->toArray();

        // Additional
        $this->editAdditionals = AddCalculation::where('calculation_id', $id)
            ->get()
            ->map(function ($item) {
                return [
                    'id'     => $item->id,
                    'height' => $item->add_height ?? 0,
                    'width'  => $item->add_width ?? 0,
                    'cost'   => $item->total_add_cost ?? 0,
                ];
            })
            ->toArray();

        // Business
        $this->editBusinesses = BusinessCalculation::where('calculation_id', $id)
            ->get()
            ->map(function ($item) {
                return [
                    'id'     => $item->id,
                    'height' => $item->business_height ?? 0,
                    'width'  => $item->business_width ?? 0,
                    'cost'   => $item->business_width ?? 0,
                ];
            })
            ->toArray();

        // Owner
        $this->editOwners = OwnershipCalculation::where('calculation_id', $id)
            ->get()
            ->map(function ($item) {
                return [
                    'id'     => $item->id,
                    'height' => $item->ownership_height ?? 0,
                    'width'  => $item->ownership_width ?? 0,
                    'cost'   => $item->total_ownership_cost ?? 0,
                ];
            })
            ->toArray();
    }

    public function updateCalculation()
    {
        DB::transaction(function () {
            // Base Update or Create
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

            // Logo Update or Create
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

            // Main Update or Create
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

            // Additional Update or Create
            foreach ($this->editAdditionals as $add) {
                if (!empty($add['id'])) {
                    AddCalculation::where('id', $add['id'])->update([
                        'additional_height' => $add['height'],
                        'additional_width' => $add['width'],
                        'total_additional_cost' => $add['cost'],
                    ]);
                } else {
                    AddCalculation::create([
                        'calculation_id' => $this->calculation->id,
                        'additional_height' => $add['height'],
                        'additional_width' => $add['width'],
                        'total_additional_cost' => $add['cost'],
                    ]);
                }
            }

            // Business Update or Create
            foreach ($this->editBusinesses as $bus) {
                if (!empty($bus['id'])) {
                    BusinessCalculation::where('id', $bus['id'])->update([
                        'total_business_cost' => $bus['cost'],
                    ]);
                } else {
                    BusinessCalculation::create([
                        'calculation_id' => $this->calculation->id,
                        'total_business_cost' => $bus['cost'],
                    ]);
                }
            }

            // Owner Update or Create
            foreach ($this->editOwners as $own) {
                if (!empty($own['id'])) {
                    OwnershipCalculation::where('id', $own['id'])->update([
                        'total_owner_cost' => $own['cost'],
                    ]);
                } else {
                    OwnershipCalculation::create([
                        'calculation_id' => $this->calculation->id,
                        'total_owner_cost' => $own['cost'],
                    ]);
                }
            }
        });

        return redirect(Auth::user()->login_type == '1' ? 'dashboard' : 'salesman-data_calculation')
            ->with('message', 'Calculation saved successfully.');
    }


    // Remove specific image
    public function removeImage($index)
    {
        if (isset($this->image[$index])) {

            unset($this->image[$index]);

            $this->image = array_values($this->image);
        }
    }

    public function render()
    {
        return view('livewire.edit-calculation');
    }
}
