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

    public $calculation;

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

    // Main Calculation

    public $edit_mainText = '';
    public $edit_mainHeight, $edit_mainTotal = 0, $edit_mainWidth, $edit_mainStickerHeightWidth, $edit_mainoracalHeightWidth, $edit_mainacrylicCost, $edit_mainpvcCost;

    public $edit_mainstickerCost, $edit_mainlightingCost, $edit_mainpowerSupplyCost, $edit_mainpaintCost, $edit_maingeneralMaterialCost, $edit_mainlightingprice, $edit_mainorcaleCost;

    public $edit_mainLightingTypes;
    public $edit_mainlightHeightWidth, $edit_mainPowerSupply, $edit_mainPowerSupplyQuantity = 0;

    public $edit_mainPcs = 1, $edit_mainPaintHeightWidth, $edit_mainStickerHeight, $edit_mainStickerWidth, $edit_mainLightingWidth, $edit_mainLightingHeight;

    public $edit_mainMaterials = [], $edit_mainstickerMaterial = [], $edit_maingeneralMaterial = [];
    public $edit_mainlogoLightingType = [];
    public $edit_mainaIuminium_channel_border = [];

    public $edit_mainCost = [];


    // Add cost

    public $edit_addText, $edit_addacrylicCost, $edit_addpvcCost;

    public $edit_addHeight, $edit_addWidth, $edit_addTotal = 0, $edit_addStickerHeightWidth, $edit_addoracalHeightWidth;

    public $edit_addstickerCost, $edit_addlightingCost, $edit_addpowerSupplyCost, $edit_addpaintCost, $edit_addgeneralMaterialCost, $edit_addlightingprice, $edit_addorcaleCost;

    public $_addLightingTypes;
    public $edit_addlightHeightWidth, $edit_addPowerSupply, $edit_addPowerSupplyQuantity = 0;

    public $edit_addPcs = 1, $edit_maincharacterCount, $edit_addPaintHeightWidth, $edit_addStickerHeight, $edit_addStickerWidth, $edit_addLightingWidth, $edit_addLightingHeight;

    public $edit_addMaterials = [], $edit_addstickerMaterial = [], $edit_addgeneralMaterial = [];
    public $edit_addlogoLightingType = [];
    public $edit_addaluminium_channel_border = [];

    public $edit_addCost = [];



    // Business Calculation

    public $edit_busText, $edit_busacrylicCost, $edit_buspvcCost;

    public $edit_busHeight, $edit_busWidth, $edit_busStickerHeightWidth, $edit_busTotal = 0, $edit_busoracalHeightWidth;

    public $edit_busstickerCost, $edit_buslightingCost, $edit_buspowerSupplyCost, $edit_buspaintCost, $edit_busgeneralMaterialCost, $edit_buslightingprice, $edit_busorcaleCost;

    public $edit_busLightingTypes;
    public $edit_buslightHeightWidth, $edit_busPowerSupply, $edit_busPowerSupplyQuantity = 0;

    public $edit_busPcs = 1, $edit_busPaintHeightWidth, $edit_busStickerHeight, $edit_busStickerWidth, $edit_busLightingWidth, $edit_busLightingHeight;

    public $edit_busMaterials = [], $edit_busstickerMaterial = [], $edit_busgeneralMaterial = [];
    public $edit_buslogoLightingType = [];
    public $edit_busaluminium_channel_border = [];

    public $edit_busCost = [];



    // Owner Calculation
    // edit owner
    public $edit_ownText, $edit_ownacrylicCost, $edit_ownpvcCost;
    public $edit_ownstickerCost, $edit_ownlightingCost, $edit_ownTotal = 0, $edit_ownpowerSupplyCost, $edit_ownpaintCost, $edit_owngeneralMaterialCost, $edit_ownlightingprice, $edit_ownorcaleCost;

    public $edit_ownHeight, $edit_ownWidth, $edit_ownStickerHeightWidth, $edit_ownoracalHeightWidth;
    public $edit_ownLightingTypes;
    public $edit_ownlightHeightWidth, $edit_ownPowerSupply, $edit_ownPowerSupplyQuantity = 0;

    public $edit_ownPcs = 1, $edit_ownPaintHeightWidth, $edit_ownStickerHeight, $edit_ownStickerWidth, $edit_ownLightingWidth, $edit_ownLightingHeight;

    public $edit_ownMaterials = [], $edit_ownstickerMaterial = [], $edit_owngeneralMaterial = [];
    public $edit_ownlogoLightingType = [];
    public $edit_ownaluminium_channel_border = [];

    public $edit_ownCost = [];


    public $isCalculated = false;

    public $editLogoCostResults = [], $editMainCostResults = [], $editAddCostResults = [], $editBusCostResults = [], $editOwnerCostResults = [];




    // others



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
            $this->edit_job_name = $this->calculation->job_name;
            $this->edit_date = $this->calculation->date;
            $this->edit_salesperson = $this->calculation->salesperson;
            $this->edit_company_name = $this->calculation->company_name;
            $this->edit_customer_name = $this->calculation->customer_name;
            $this->edit_customer_phone_no = $this->calculation->customer_phone_no;
            $this->edit_qt_inv_number = $this->calculation->qt_inv_number;
            $this->edit_remark = $this->calculation->remark;
            $this->edit_image = $this->calculation->image ?? [];




            // Base Cost
            $this->edit_baseType = $base->base_type;
            $this->edit_baseMember = $base->base_member;
            $this->edit_baseHeight = $base->base_height;
            $this->edit_baseWidth = $base->base_width;
        }

        $this->editLogos = LogoCalculation::where('calculation_id', $id)->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'text' => $item->logo_text,
                'height' => $item->logo_height,
                'width' => $item->logo_width,
                'materials' => $item->logo_materials,
                'sticker_height_width' => $item->logo_sticker_height_width,
                'sticker_material' => $item->logo_sticker_material,
                'general_material' => $item->logo_general_material,
                'paint_height_width' => $item->logo_paint_height_width,
                'oracal_height_width' => $item->logo_oracal_height_width,
                'light_height_width' => $item->logo_light_height_width,
                'lighting_type' => $item->logo_lighting_type,
                'power_supply' => $item->logo_power_supply,
                'power_supply_quantity' => $item->logo_power_supply_quantity,
                'acrylic_cost' => $item->logo_acrylic_cost,
                'pvc_cost' => $item->logo_pvc_cost,
                'sticker_cost' => $item->logo_sticker_cost,
                'lighting_cost' => $item->logo_lighting_cost,
                'power_supply_cost' => $item->logo_power_supply_cost,
                'paint_cost' => $item->logo_paint_cost,
                'general_material_cost' => $item->logo_general_material_cost,
                'lighting_price' => $item->logo_lighting_price,
                'oracal_cost' => $item->logo_oracal_cost,
                'cost' => $item->total_logo_cost,

            ];
        })->toArray();

        $this->editMains = MainCalculation::where('calculation_id', $id)->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'text' => $item->main_text,
                'height' => $item->main_height,
                'width' => $item->main_width,
                'materials' => $item->main_materials,
                'sticker_height_width' => $item->main_sticker_height_width,
                'sticker_material' => $item->main_sticker_material,
                'general_material' => $item->main_general_material,
                'paint_height_width' => $item->main_paint_height_width,
                'oracal_height_width' => $item->main_oracal_height_width,
                'light_height_width' => $item->main_light_height_width,
                'lighting_type' => $item->main_lighting_type,
                'power_supply' => $item->main_power_supply,
                'power_supply_quantity' => $item->main_power_supply_quantity,
                'acrylic_cost' => $item->main_acrylic_cost,
                'pvc_cost' => $item->main_pvc_cost,
                'sticker_cost' => $item->main_sticker_cost,
                'lighting_cost' => $item->main_lighting_cost,
                'power_supply_cost' => $item->main_power_supply_cost,
                'paint_cost' => $item->main_paint_cost,
                'general_material_cost' => $item->main_general_material_cost,
                'lighting_price' => $item->main_lighting_price,
                'oracal_cost' => $item->main_oracal_cost,
                'cost' => $item->total_main_cost,
            ];
        })->toArray();

        // Additional
        $this->editAdditionals = AddCalculation::where('calculation_id', $id)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'text' => $item->add_text,
                    'height' => $item->add_height,
                    'width' => $item->add_width,
                    'materials' => $item->add_materials,
                    'sticker_height_width' => $item->add_sticker_height_width,
                    'sticker_material' => $item->add_sticker_material,
                    'general_material' => $item->add_general_material,
                    'paint_height_width' => $item->add_paint_height_width,
                    'oracal_height_width' => $item->add_oracal_height_width,
                    'light_height_width' => $item->add_light_height_width,
                    'lighting_type' => $item->add_lighting_type,
                    'power_supply' => $item->add_power_supply,
                    'power_supply_quantity' => $item->add_power_supply_quantity,
                    'acrylic_cost' => $item->add_acrylic_cost,
                    'pvc_cost' => $item->add_pvc_cost,
                    'sticker_cost' => $item->add_sticker_cost,
                    'lighting_cost' => $item->add_lighting_cost,
                    'power_supply_cost' => $item->add_power_supply_cost,
                    'paint_cost' => $item->add_paint_cost,
                    'general_material_cost' => $item->add_general_material_cost,
                    'lighting_price' => $item->add_lighting_price,
                    'oracal_cost' => $item->add_oracal_cost,
                    'cost' => $item->total_add_cost,
                ];
            })
            ->toArray();

        // Business
        $this->editBusinesses = BusinessCalculation::where('calculation_id', $id)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'text' => $item->business_text,
                    'height' => $item->business_height,
                    'width' => $item->business_width,
                    'materials' => $item->business_materials,
                    'sticker_height_width' => $item->business_sticker_height_width,
                    'sticker_material' => $item->business_sticker_material,
                    'general_material' => $item->business_general_material,
                    'paint_height_width' => $item->business_paint_height_width,
                    'oracal_height_width' => $item->business_oracal_height_width,
                    'light_height_width' => $item->business_light_height_width,
                    'lighting_type' => $item->business_lighting_type,
                    'power_supply' => $item->business_power_supply,
                    'power_supply_quantity' => $item->business_power_supply_quantity,
                    'acrylic_cost' => $item->business_acrylic_cost,
                    'pvc_cost' => $item->business_pvc_cost,
                    'sticker_cost' => $item->business_sticker_cost,
                    'lighting_cost' => $item->business_lighting_cost,
                    'power_supply_cost' => $item->business_power_supply_cost,
                    'paint_cost' => $item->business_paint_cost,
                    'general_material_cost' => $item->business_general_material_cost,
                    'lighting_price' => $item->business_lighting_price,
                    'oracal_cost' => $item->business_oracal_cost,
                    'cost' => $item->total_business_cost,
                ];
            })
            ->toArray();

        // Owner
        $this->editOwners = OwnershipCalculation::where('calculation_id', $id)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'text' => $item->ownership_text,
                    'height' => $item->ownership_height,
                    'width' => $item->ownership_width,
                    'materials' => $item->ownership_materials,
                    'sticker_height_width' => $item->ownership_sticker_height_width,
                    'sticker_material' => $item->ownership_sticker_material,
                    'general_material' => $item->ownership_general_material,
                    'paint_height_width' => $item->ownership_paint_height_width,
                    'oracal_height_width' => $item->ownership_oracal_height_width,
                    'light_height_width' => $item->ownership_light_height_width,
                    'lighting_type' => $item->ownership_lighting_type,
                    'power_supply' => $item->ownership_power_supply,
                    'power_supply_quantity' => $item->ownership_power_supply_quantity,
                    'acrylic_cost' => $item->ownership_acrylic_cost,
                    'pvc_cost' => $item->ownership_pvc_cost,
                    'sticker_cost' => $item->ownership_sticker_cost,
                    'lighting_cost' => $item->ownership_lighting_cost,
                    'power_supply_cost' => $item->ownership_power_supply_cost,
                    'paint_cost' => $item->ownership_paint_cost,
                    'general_material_cost' => $item->ownership_general_material_cost,
                    'lighting_price' => $item->ownership_lighting_price,
                    'oracal_cost' => $item->ownership_oracal_cost,
                    'cost' => $item->total_ownership_cost,
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

            foreach ($this->editlogos as $logo) {
                if (!empty($logo['id'])) {
                    LogoCalculation::where('id', $logo['id'])->update([
                        'logo_height'  => $logo['edit_logoHeight'] ?? null,
                        'logo_width'   => $logo['edit_logoWidth'] ?? null,
                        'total_logo_cost' => $logo['edit_logoCost'] ?? null, // make sure this key exists in Livewire
                        'edit_logolightHeightWidth' => $logo['edit_logolightHeightWidth'] ?? null,
                    ]);
                } else {
                    LogoCalculation::create([
                        'calculation_id' => $this->calculation->id,
                        'logo_height'    => $logo['edit_logoHeight'] ?? null,
                        'logo_width'     => $logo['edit_logoWidth'] ?? null,
                        'total_logo_cost' => $logo['edit_logoCost'] ?? null,
                        'edit_logolightHeightWidth' => $logo['edit_logolightHeightWidth'] ?? null,
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


    // Input Show Funtion



    // LOGO COST 
    public function toggleAcrylicInput($index, $size)
    {
        $selected = $this->logoCost[$index]['logoMaterials'] ?? [];

        if (in_array("acrylic{$size}mm", $selected)) {
            $this->logoCost[$index]['showAcrylicInput'] = $size;
        } else {
            $this->logoCost[$index]['showAcrylicInput'] = null;
        }
    }



    public function toggleBlackAcrylicInput($index, $size)
    {
        $selected = $this->logoCost[$index]['logoMaterials'] ?? [];

        if (in_array("black_acrylic{$size}mm", $selected)) {
            $this->logoCost[$index]['showBlackAcrylicInput'][] = $size;
        } else {
            $this->logoCost[$index]['showBlackAcrylicInput'] = array_diff(
                $this->logoCost[$index]['showBlackAcrylicInput'] ?? [],
                [$size]
            );
            unset($this->logoCost[$index]['blackAcrylicInputs']);
        }
    }

    public function togglePVCInput($index, $size)
    {
        $selected = $this->logoCost[$index]['logoMaterials'] ?? [];

        if (in_array("pvc{$size}mm", $selected)) {
            if (!isset($this->logoCost[$index]['showPVCInput'])) {
                $this->logoCost[$index]['showPVCInput'] = [];
            }
            if (!in_array($size, $this->logoCost[$index]['showPVCInput'])) {
                $this->logoCost[$index]['showPVCInput'][] = $size;
            }
        } else {
            $this->logoCost[$index]['showPVCInput'] = array_diff(
                $this->logoCost[$index]['showPVCInput'] ?? [],
                [$size]
            );
            unset($this->logoCost[$index]['pvcInputs']);
        }
    }
    public function toggleStainlessSteelInput($index, $key)
    {
        if (
            isset($this->logoCost[$index]['logoMaterials']) &&
            in_array($key, $this->logoCost[$index]['logoMaterials'])
        ) {

            // Add the key to showInputs so input box appears
            $this->logoCost[$index]['showInputs'][] = $key;
            $this->logoCost[$index]['showInputs'] = array_unique($this->logoCost[$index]['showInputs']);
        } else {
            // Remove the key so input box disappears
            if (!empty($this->logoCost[$index]['showInputs'])) {
                $this->logoCost[$index]['showInputs'] = array_filter(
                    $this->logoCost[$index]['showInputs'],
                    fn($k) => $k !== $key
                );
                $this->logoCost[$index]['showInputs'] = array_values($this->logoCost[$index]['showInputs']);
            }
        }
    }
    public function toggleStainlessgoldInput($index, $key)
    {
        if (
            isset($this->logoCost[$index]['logoMaterials']) &&
            in_array($key, $this->logoCost[$index]['logoMaterials'])
        ) {

            // Add the key to showInputs so input box appears
            $this->logoCost[$index]['showInputs'][] = $key;
            $this->logoCost[$index]['showInputs'] = array_unique($this->logoCost[$index]['showInputs']);
        } else {
            // Remove the key so input box disappears
            if (!empty($this->logoCost[$index]['showInputs'])) {
                $this->logoCost[$index]['showInputs'] = array_filter(
                    $this->logoCost[$index]['showInputs'],
                    fn($k) => $k !== $key
                );
                $this->logoCost[$index]['showInputs'] = array_values($this->logoCost[$index]['showInputs']);
            }
        }
    }


    public function toggleneonMaterialInput($index, $materialKey)
    {
        $selectedLists = [
            'logoMaterials',
            'stickerMaterial',
            'generalMaterial',
            'others'
        ];

        $selected = null;
        foreach ($selectedLists as $list) {
            if (!empty($this->logoCost[$index][$list]) && in_array($materialKey, $this->logoCost[$index][$list])) {
                $selected = $this->logoCost[$index][$list];
                break;
            }
        }

        if ($selected && in_array($materialKey, $selected)) {
            if (!isset($this->logoCost[$index]['showInputs'])) {
                $this->logoCost[$index]['showInputs'] = [];
            }
            if (!in_array($materialKey, $this->logoCost[$index]['showInputs'])) {
                $this->logoCost[$index]['showInputs'][] = $materialKey;
            }
        } else {
            $this->logoCost[$index]['showInputs'] = array_diff(
                $this->logoCost[$index]['showInputs'] ?? [],
                [$materialKey]
            );
            unset($this->logoCost[$index]['materialInputs'][$materialKey]);
        }
    }
    public function togglestickerInput($index, $materialKey)
    {
        $selected = array_merge(
            $this->logoCost[$index]['logoMaterials'] ?? [],
            $this->logoCost[$index]['stickerMaterial'] ?? []
        );

        if (in_array($materialKey, $selected)) {
            if (!isset($this->logoCost[$index]['showInputs'])) {
                $this->logoCost[$index]['showInputs'] = [];
            }
            if (!in_array($materialKey, $this->logoCost[$index]['showInputs'])) {
                $this->logoCost[$index]['showInputs'][] = $materialKey;
            }
        } else {
            $this->logoCost[$index]['showInputs'] = array_diff(
                $this->logoCost[$index]['showInputs'] ?? [],
                [$materialKey]
            );
            unset($this->logoCost[$index]['stickermaterialInputs'][$materialKey]);
        }
    }
    public function toggleGeneralMaterialInput($index, $materialKey)
    {
        $selected = $this->logoCost[$index]['generalMaterial'] ?? [];

        if (in_array($materialKey, $selected)) {
            if (!isset($this->logoCost[$index]['showGeneralInputs'])) {
                $this->logoCost[$index]['showGeneralInputs'] = [];
            }
            if (!in_array($materialKey, $this->logoCost[$index]['showGeneralInputs'])) {
                $this->logoCost[$index]['showGeneralInputs'][] = $materialKey;
            }
        } else {
            $this->logoCost[$index]['showGeneralInputs'] = array_diff(
                $this->logoCost[$index]['showGeneralInputs'] ?? [],
                [$materialKey]
            );
            unset($this->logoCost[$index]['generalMaterialInputs'][$materialKey]);
        }
    }
    public function togglepaintMaterialInput($index, $materialKey)
    {
        if (!empty($this->logoCost[$index]['logoPaintHeightWidth'])) {
            $this->logoCost[$index]['showGeneralInputs'][] = $materialKey;
        } else {
            $this->logoCost[$index]['showGeneralInputs'] = array_diff(
                $this->logoCost[$index]['showGeneralInputs'] ?? [],
                [$materialKey]
            );
            unset($this->logoCost[$index]['logoPaintInputs'][$materialKey]);
        }
    }


    public function toggleorcalMaterialInput($index, $materialKey)
    {
        $isChecked = !empty($this->logoCost[$index]['logooracalHeightWidth']);

        if ($isChecked) {
            if (!isset($this->logoCost[$index]['showGeneralInputs'])) {
                $this->logoCost[$index]['showGeneralInputs'] = [];
            }
            if (!in_array($materialKey, $this->logoCost[$index]['showGeneralInputs'])) {
                $this->logoCost[$index]['showGeneralInputs'][] = $materialKey;
            }
        } else {
            $this->logoCost[$index]['showGeneralInputs'] = array_diff(
                $this->logoCost[$index]['showGeneralInputs'] ?? [],
                [$materialKey]
            );
            unset($this->logoCost[$index]['logoOracalInputs'][$materialKey]);
        }
    }


    public function toggleLightingInput($index, $lightingType)
    {
        $selectedTypes = $this->logoCost[$index]['logoLightingType'] ?? [];
        if (!is_array($selectedTypes)) {
            $selectedTypes = [];
        }

        if (
            !isset($this->logoCost[$index]['showLightingInputs']) ||
            !is_array($this->logoCost[$index]['showLightingInputs'])
        ) {
            $this->logoCost[$index]['showLightingInputs'] = [];
        }

        if (in_array($lightingType, $selectedTypes)) {
            if (!in_array($lightingType, $this->logoCost[$index]['showLightingInputs'])) {
                $this->logoCost[$index]['showLightingInputs'][] = $lightingType;
            }
        } else {
            $this->logoCost[$index]['showLightingInputs'] = array_values(
                array_diff($this->logoCost[$index]['showLightingInputs'], [$lightingType])
            );
            unset($this->logoCost[$index]['logoLightingInputs'][$lightingType]);
        }
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
