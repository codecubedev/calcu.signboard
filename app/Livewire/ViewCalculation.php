<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Calculation;
use App\Models\BaseCalculation;
use App\Models\LogoCalculation;
use App\Models\MainCalculation;
use App\Models\AddCalculation;
use App\Models\BusinessCalculation;
use App\Models\OwnershipCalculation;
use Illuminate\Support\Facades\Auth;
use App\Services\LogoCostCalculation;
use App\Services\MainLogoCostCalculation;
use App\Services\AddLetteringCost;
use App\Services\BusinessCost;
use App\Services\OwnerstickerCost;
use Livewire\WithFileUploads;

class ViewCalculation extends Component
{
    use WithFileUploads;

    public $job_name, $date, $sales_man, $totalcost, $company_name, $customer_name, $customer_phone_no;
    public $logoText, $characterCount, $baseType, $baseMember, $baseHeight, $baseWidth, $baseCost = 0;

    public $logoHeight, $logoWidth, $logoTotal = 0, $logoStickerHeightWidth,  $logooracalHeightWidth, $acrylicCost, $pvcCost;
    public  $stickerCost, $lightingCost, $powerSupplyCost, $paintCost, $generalMaterialCost, $stickerArea, $addwhiteacryliccost, $lightingprice, $orcaleCost;
    public $logoLightingTypes;
    public $logolightHeightWidth = [], $logoPowerSupply, $logoPowerSupplyQuantity = 0;
    public $logoPcs = 1, $logoPaintHeightWidth, $logoStickerHeight, $logoStickerWidth, $logoLightingWidth, $logoLightingHeight;
    public $logoMaterials = [], $stickerMaterial = [], $generalMaterial = [];
    public $logoLightingType = [];
    public $aluminium_channel_border = [];

    public $qt_inv_umber, $salesperson, $image, $remark;

    public $logoCost = [];

    public $clearacrylic;


    public $mainText = '', $mainHeight, $mainTotal = 0, $mainWidth, $mainStickerHeightWidth, $mainoracalHeightWidth, $mainacrylicCost, $mainpvcCost;
    public  $mainstickerCost, $mainlightingCost, $mainpowerSupplyCost, $mainpaintCost, $maingeneralMaterialCost, $mainlightingprice, $mainorcaleCost;
    //main

    public $mainLightingTypes;
    public $mainlightHeightWidth, $mainPowerSupply, $mainPowerSupplyQuantity = 0;
    public $mainPcs = 1, $mainPaintHeightWidth, $mainStickerHeight, $mainStickerWidth, $mainLightingWidth, $mainLightingHeight;
    public $mainMaterials = [], $mainstickerMaterial = [], $maingeneralMaterial = [];
    public $mainlogoLightingType = [];
    public $mainaluminium_channel_border = [];
    public $mainCost = [];

    //add 
    public $addText, $addacrylicCost, $addpvcCost;
    public $addHeight, $addWidth, $addTotal = 0,  $addStickerHeightWidth, $addoracalHeightWidth;
    public  $addstickerCost, $addlightingCost, $addpowerSupplyCost, $addpaintCost, $addgeneralMaterialCost, $addlightingprice, $addorcaleCost;

    public $addLightingTypes;
    public $addlightHeightWidth, $addPowerSupply, $addPowerSupplyQuantity = 0;
    public $addPcs = 1, $maincharacterCount, $addPaintHeightWidth, $addStickerHeight, $addStickerWidth, $addLightingWidth, $addLightingHeight;
    public $addMaterials = [], $addstickerMaterial = [], $addgeneralMaterial = [];
    public $addlogoLightingType = [];
    public $addaluminium_channel_border = [];
    public $addCost = [];

    //bus
    public $busText, $busacrylicCost, $buspvcCost;

    public $busHeight, $busWidth,  $busStickerHeightWidth,  $busTotal = 0, $busoracalHeightWidth;
    public  $busstickerCost, $buslightingCost, $buspowerSupplyCost, $buspaintCost, $busgeneralMaterialCost, $buslightingprice, $busorcaleCost;

    public $busLightingTypes;
    public $buslightHeightWidth, $busPowerSupply, $busPowerSupplyQuantity = 0;
    public $busPcs = 1, $busPaintHeightWidth, $busStickerHeight, $busStickerWidth, $busLightingWidth, $busLightingHeight;
    public $busMaterials = [], $busstickerMaterial = [], $busgeneralMaterial = [];
    public $buslogoLightingType = [];
    public $busaluminium_channel_border = [];
    public $busCost = [];

    // owner

    public $ownText, $ownacrylicCost, $ownpvcCost;
    public  $ownstickerCost, $ownlightingCost, $ownTotal = 0, $ownpowerSupplyCost, $ownpaintCost, $owngeneralMaterialCost, $ownlightingprice, $ownorcaleCost;

    public $ownHeight, $ownWidth, $ownStickerHeightWidth, $ownoracalHeightWidth;
    public $ownLightingTypes;
    public $ownlightHeightWidth, $ownPowerSupply, $ownPowerSupplyQuantity = 0;
    public $ownPcs = 1, $ownPaintHeightWidth, $ownStickerHeight, $ownStickerWidth, $ownLightingWidth, $ownLightingHeight;
    public $ownMaterials = [], $ownstickerMaterial = [], $owngeneralMaterial = [];
    public $ownlogoLightingType = [];
    public $ownaluminium_channel_border = [];

    public $ownCost = [];

    public $isCalculated = false;

    public $logoCostResults = [], $mainCostResults = [], $addCostResults = [], $busCostResults = [], $ownerCostResults = [];





    public function getGeneralMaterialCost($material, $height, $width, $pcs)
    {
        switch ($material) {
            case "aluminiumStrip":
                return ($height * $width / 144) * 27;

            case "channel3d":
                return $height * $width * 0.40;

            case "aluminiumBoxUp":
                return ($height < 36 && $width < 36)
                    ? ($height * $width * 0.38)
                    : (500 * $pcs * 2.5);

            case "ironHollow20mm":
                return 90.00;

            case "ironHollow10mm":
                return 45.00;

            case "spotlightWithBracket":
                return 350.00;

            case "dimmer":
                return 100.00;

            default:
                return 0;
        }
    }

    public function getmainGeneralMaterialCost($material, $height, $width, $pcs)
    {

        switch ($material) {
            case "aluminiumStrip":
                return ($height * $width / 144) * 27;

            case "channel3d":
                return $height * $width * 0.40;

            case "aluminiumBoxUp":
                return ($height < 36 && $width < 36)
                    ? ($height * $width * 0.38)
                    : (500 * $pcs * 2.5);

            case "ironHollow20mm":
                return 90.00;

            case "ironHollow10mm":
                return 45.00;

            case "spotlightWithBracket":
                return 350.00;

            case "dimmer":
                return 100.00;

            default:
                return 0;
        }
    }

    public function getaddGeneralMaterialCost($material, $height, $width, $pcs)
    {

        switch ($material) {
            case "aluminiumStrip":
                return ($height * $width / 144) * 27;

            case "channel3d":
                return $height * $width * 0.40;

            case "aluminiumBoxUp":
                return ($height < 36 && $width < 36)
                    ? ($height * $width * 0.38)
                    : (500 * $pcs * 2.5);

            case "ironHollow20mm":
                return 90.00;

            case "ironHollow10mm":
                return 45.00;

            case "spotlightWithBracket":
                return 350.00;

            case "dimmer":
                return 100.00;

            default:
                return 0;
        }
    }
    public function getbusGeneralMaterialCost($material, $height, $width, $pcs)
    {

        switch ($material) {
            case "aluminiumStrip":
                return ($height * $width / 144) * 27;

            case "channel3d":
                return $height * $width * 0.40;

            case "aluminiumBoxUp":
                return ($height < 36 && $width < 36)
                    ? ($height * $width * 0.38)
                    : (500 * $pcs * 2.5);

            case "ironHollow20mm":
                return 90.00;

            case "ironHollow10mm":
                return 45.00;

            case "spotlightWithBracket":
                return 350.00;

            case "dimmer":
                return 100.00;

            default:
                return 0;
        }
    }

    public function getownGeneralMaterialCost($material, $height, $width, $pcs)
    {

        switch ($material) {
            case "aluminiumStrip":
                return ($height * $width / 144) * 27;

            case "channel3d":
                return $height * $width * 0.40;

            case "aluminiumBoxUp":
                return ($height < 36 && $width < 36)
                    ? ($height * $width * 0.38)
                    : (500 * $pcs * 2.5);

            case "ironHollow20mm":
                return 90.00;

            case "ironHollow10mm":
                return 45.00;

            case "spotlightWithBracket":
                return 350.00;

            case "dimmer":
                return 100.00;

            default:
                return 0;
        }
    }


    public function updatedMainText()
    {
        $this->maincharacterCount = strlen($this->mainText);
    }
    public $materialPrices = [
        "acrylic3mm" => 0.15,
        "acrylic5mm" => 0.33,
        "acrylic10mm" => 0.55,
        "acrylic15mm" => 0.85,
        "acrylic20mm" => 1.15,
        "acrylic25mm" => 1.85,
        "black_acrylic3mm" => 0.20,
        "black_acrylic5mm" => 0.40,
        "black_acrylic10mm" => 0.60,
        "black_acrylic15mm" => 0.90,
        "black_acrylic20mm" => 1.20,
        "black_acrylic25mm" => 1.90,
        'mirror_frontlit' => 0.85,
        'mirror_backlit' => 0.75,
        'mirror_boxup' => 0.60,
        'hairline_frontlit' => 0.85,
        'hairline_backlit' => 0.75,
        'hairline_boxup' => 0.60,

        'gold_mirror_frontlit' => 1.00,
        'gold_mirror_backlit' => 0.85,
        'gold_mirror_boxup' => 0.75,
        'gold_hairline_frontlit' => 1.00,
        'gold_hairline_backlit' => 0.85,
        'gold_hairline_boxup' => 0.75,

        "whiteacrylic3mm" => 0.30,
        "pvc3mm" => 0.05,
        "pvc5mm" => 0.10,
        "pvc10mm" => 0.15,
        "pvc15mm" => 0.20,
        "pvc20mm" => 0.25,
        "pvc25mm" => 0.35
    ];
    public $chnaelmaterialPrices = [
        'mirror_frontlit' => 0.75,
        'mirror_backlit' => 0.65,
        'mirror_boxup' => 0.50,
        'gold_mirror_frontlit' => 0.85,
        'gold_mirror_backlit' => 0.75,
        'gold_mirror_boxup' => 0.65,

    ];


    public $stickerPrices = [
        "whiteStickerMattLamm" => 8.0,
        "greyBase" => 10.0,
        "lightboxSticker" => 9.0,
        "reverseSticker" => 9.0,
        "dieCutStickerWhite" => 10.8,
        "dieCutStickerBlack" => 10.8,
        "dieCutStickerPrinted" => 10.8
    ];

    public $powerSupplyPrices = [
        "120W" => 80,
        "200W" => 100,
        "400W" => 150
    ];
    public $lightingtype = [
        "frontlit" => 0.55,
        "backlit" => 0.45,
        "sidelit" => 1.3,
        "nolight" => 0.38

    ];

    public function checkpowersupply($index)
    {
        $form = $this->logoCost[$index];

        $height = (float) $form['logoHeight'];
        $width = (float) $form['logoWidth'];
        $area = ($height * $width) / 144;

        $lightingTypes = $form['logoLightingType'] ?? [];


        if (in_array('frontlit', $lightingTypes)) {
            $totalWatt = $area * 27;
            $powerUnitLimit = 350;

            $unitCount = max((int) ceil($totalWatt / $powerUnitLimit), 1);

            $this->logoCost[$index]['logoPowerSupplyQuantity'] = $unitCount;
            $this->logoCost[$index]['logoPowerSupply'] = '400W';

            $this->logoCost[$index]['powerSupplyCalculationInfo'] =
                round($totalWatt, 2) . 'W ÷ 350W = ' . $unitCount . ' units (truncated)';
        }
    }

    public function maincheckpowersupply($index)
    {
        $form = $this->mainCost[$index];

        $height = (float) $form['mainHeight'];
        $width = (float) $form['mainWidth'];
        $area = ($height * $width) / 144;

        $lightingTypes = $form['mainLightingType'] ?? [];


        if (in_array('frontlit', $lightingTypes)) {
            $totalWatt = $area * 27;
            $powerUnitLimit = 350;

            $unitCount = max((int) ceil($totalWatt / $powerUnitLimit), 1);


            $this->mainCost[$index]['mainPowerSupplyQuantity'] = $unitCount;
            $this->mainCost[$index]['mainPowerSupply'] = '400W';

            $this->mainCost[$index]['powerSupplyCalculationInfo'] =
                round($totalWatt, 2) . 'W ÷ 350W = ' . $unitCount . ' units (truncated)';
        }
    }


    public function addcheckpowersupply($index)
    {
        $form = $this->addCost[$index];

        $height = (float) $form['addHeight'];
        $width = (float) $form['addWidth'];
        $area = round(($height * $width) / 144, 2);

        $lightingTypes = $form['addLightingType'] ?? [];

        if (in_array('frontlit', $lightingTypes)) {
            $totalWatt = $area * 27;
            $powerUnitLimit = 350;

            $unitCount = max((int) ceil($totalWatt / $powerUnitLimit), 1);


            $this->addCost[$index]['addPowerSupplyQuantity'] = $unitCount;
            $this->addCost[$index]['addPowerSupply'] = '400W';

            $this->addCost[$index]['powerSupplyCalculationInfo'] =
                round($totalWatt, 2) . 'W ÷ 350W = ' . $unitCount . ' units (truncated)';
        }
    }

    public function buscheckpowersupply($index)
    {
        $form = $this->busCost[$index];

        $height = (float) $form['busHeight'];
        $width = (float) $form['busWidth'];
        $area = round(($height * $width) / 144, 2);

        $lightingTypes = $form['busLightingType'] ?? [];

        if (in_array('frontlit', $lightingTypes)) {
            $totalWatt = $area * 27;
            $powerUnitLimit = 350;

            $unitCount = max((int) ceil($totalWatt / $powerUnitLimit), 1);


            $this->busCost[$index]['busPowerSupplyQuantity'] = $unitCount;
            $this->busCost[$index]['busPowerSupply'] = '400W';

            $this->busCost[$index]['powerSupplyCalculationInfo'] =
                round($totalWatt, 2) . 'W ÷ 350W = ' . $unitCount . ' units (truncated)';
        }
    }

    public function owncheckpowersupply($index)
    {
        $form = $this->ownCost[$index];

        $height = (float) $form['ownHeight'];
        $width = (float) $form['ownWidth'];
        $area = round(($height * $width) / 144, 2);

        $lightingTypes = $form['ownLightingType'] ?? [];

        if (in_array('frontlit', $lightingTypes)) {
            $totalWatt = $area * 27;
            $powerUnitLimit = 350;

            $unitCount = max((int) ceil($totalWatt / $powerUnitLimit), 1);

            $this->ownCost[$index]['ownPowerSupplyQuantity'] = $unitCount;
            $this->ownCost[$index]['ownPowerSupply'] = '400W';

            $this->ownCost[$index]['powerSupplyCalculationInfo'] =
                round($totalWatt, 2) . 'W ÷ ' . $powerUnitLimit . 'W = ' . $unitCount . ' unit(s)';
        }
    }





    public function mount()
    {
        $this->logoCost = [
            [
                'logoHeight' => null,
                'logoWidth' => null,
                'logoMaterials' => [],
                'NeonmaterialInputs' => [],
                'stickerMaterial' => [],
                'logoStickerHeightWidth' => false,
                'logolightHeightWidth' => false,
                'logoPowerSupply' => null,
                'logoPowerSupplyQuantity' => 0,
                'logoPaintHeightWidth' => false,
                'logooracalHeightWidth' => false,
                'generalMaterial' => [],
                'lightingtype' => [],
                'logoPcs' => 1,

            ]
        ];
        $this->mainCost[] = [
            'mainText' => '',
            'characterCount' => 0,
            'mainHeight' => '',
            'mainWidth' => '',
            'mainMaterials' => [],
            'materialPrices' => [],

            'mainStickerHeightWidth' => false,
            'stickerMaterial' => [],
            'generalMaterial' => [],
            'mainPaintHeightWidth' => false,
            'mainoracalHeightWidth' => false,
            'mainlightHeightWidth' => false,
            'mainLightingType' => [],
            'mainPowerSupply' => '400W',
            'mainPowerSupplyQuantity' => 0,
            'mainPcs' => 1,
        ];
        $this->addCost[] = [
            'addText' => '',
            'characterCount' => 0,
            'addHeight' => '',
            'addWidth' => '',
            'addMaterials' => [],
            'addStickerHeightWidth' => false,
            'stickerMaterial' => [],
            'generalMaterial' => [],
            'addPaintHeightWidth' => false,
            'addoracalHeightWidth' => false,
            'addlightHeightWidth' => false,
            'addLightingType' => [],
            'addPowerSupply' => '400W',
            'addPowerSupplyQuantity' => 0,
            'mainPcs' => 1,
        ];

        $this->busCost[] = [
            'busText' => '',
            'characterCount' => 0,
            'busHeight' => '',
            'busWidth' => '',
            'busMaterials' => [],
            'busStickerHeightWidth' => false,
            'stickerMaterial' => [],
            'generalMaterial' => [],
            'busPaintHeightWidth' => false,
            'busoracalHeightWidth' => false,
            'buslightHeightWidth' => false,
            'busLightingType' => [],
            'busPowerSupply' => '400W',
            'busPowerSupplyQuantity' => 1,
            'busPcs' => 1,
        ];
        $this->ownCost[] = [
            'ownText' => '',
            'characterCount' => 0,
            'ownHeight' => '',
            'ownWidth' => '',
            'ownMaterials' => [],
            'ownStickerHeightWidth' => false,
            'stickerMaterial' => [],
            'generalMaterial' => [],
            'ownPaintHeightWidth' => false,
            'ownoracalHeightWidth' => false,
            'ownlightHeightWidth' => false,
            'ownLightingType' => [],
            'ownPowerSupply' => '400W',
            'ownPowerSupplyQuantity' => 0,
            'ownPcs' => 1,
        ];
    }

    public function updatedLogoCost($value, $key)
    {
        if (preg_match('/^(\d+)\.logoText$/', $key, $matches)) {
            $index = $matches[1];
            $this->logoCost[$index]['characterCount'] = strlen($value);
        }
    }


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




    public function addForm()
    {
        $this->logoCost[] = [
            'logoText' => '',
            'characterCount' => 0,
            'logoHeight' => '',
            'logoWidth' => '',
            'logoMaterials' => [],
            'NeonmaterialInputs' => [],
            'stickerMaterial' => [],
            'logoStickerHeightWidth' => false,
            'generalMaterial' => [],
            'logoPaintHeightWidth' => false,
            'logooracalHeightWidth' => false,
            'logolightHeightWidth' => false,
            'logoLightingType' => [],
            'logoPowerSupply' => '400W',
            'logoPowerSupplyQuantity' => 0,
        ];
    }


    public function removeForm($index)
    {
        unset($this->logoCost[$index]);
        $this->logoCost = array_values($this->logoCost); // Reindex
    }


    public function mainaddForm()
    {
        $this->mainCost[] = [
            'mainText' => '',
            'characterCount' => 0,
            'mainHeight' => '',
            'mainWidth' => '',
            'mainMaterials' => [],
            'stickerMaterial' => [],
            'mainStickerHeightWidth' => false,
            'mainlightHeightWidth' => false,
            'mainLightingType' => [],
            'mainPowerSupply' => '400W',
            'mainPowerSupplyQuantity' => 0,
            'mainPaintHeightWidth' => false,
            'mainoracalHeightWidth' => false,
            'generalMaterial' => [],
            'mainPcs' => 1,
        ];
    }

    public function updatedMainCost($value, $key)
    {
        if (preg_match('/^(\d+)\.mainText$/', $key, $matches)) {
            $index = $matches[1];
            $this->mainCost[$index]['characterCount'] = strlen($value);
        }
    }




    public function mainremoveForm($index)
    {
        unset($this->mainCost[$index]);
        $this->mainCost = array_values($this->mainCost); // Reindex
    }


    public function additionalForm()
    {
        $this->addCost[] = [
            'addText' => '',
            'characterCount' => 0,
            'addHeight' => '',
            'addWidth' => '',
            'addMaterials' => [],
            'stickerMaterial' => [],
            'addStickerHeightWidth' => false,
            'addlightHeightWidth' => false,
            'addLightingType' => [],
            'addPowerSupply' => '400W',
            'addPowerSupplyQuantity' => 0,
            'addPaintHeightWidth' => false,
            'addoracalHeightWidth' => false,
            'generalMaterial' => [],
            'addPcs' => 1,
        ];
    }

    public function updatedAddCost($value, $key)
    {
        if (preg_match('/^(\d+)\.addText$/', $key, $matches)) {
            $index = $matches[1];
            $this->addCost[$index]['characterCount'] = strlen($value);
        }
    }
    public function addremoveForm($index)
    {
        unset($this->addCost[$index]);
        $this->addCost = array_values($this->addCost);
    }


    public function busForm()
    {
        $this->busCost[] = [
            'busText' => '',
            'characterCount' => 0,
            'busHeight' => '',
            'busWidth' => '',
            'busMaterials' => [],
            'stickerMaterial' => [],
            'busStickerHeightWidth' => false,
            'buslightHeightWidth' => false,
            'busLightingType' => [],
            'busPowerSupply' => '400W',
            'busPowerSupplyQuantity' => 1,
            'busPaintHeightWidth' => false,
            'busoracalHeightWidth' => false,
            'generalMaterial' => [],
            'busPcs' => 1,
        ];
    }

    public function updated($property, $value)
    {
        if (preg_match('/^mainCost\.(\d+)\.mainText$/', $property, $matches)) {
            $index = $matches[1];
            $this->mainCost[$index]['characterCount'] = strlen($value);
        }

        if (preg_match('/^ownCost\.(\d+)\.ownText$/', $property, $matches)) {
            $index = $matches[1];
            $this->ownCost[$index]['characterCount'] = strlen($value);
        }
    }



    public function busremoveForm($index)
    {
        unset($this->busCost[$index]);
        $this->busCost = array_values($this->busCost);
    }


    public function ownerForm()
    {
        $this->ownCost[] = [
            'ownText' => '',
            'characterCount' => 0,
            'ownHeight' => '',
            'ownWidth' => '',
            'ownMaterials' => [],
            'stickerMaterial' => [],
            'ownStickerHeightWidth' => false,
            'ownlightHeightWidth' => false,
            'ownLightingType' => [],
            'ownPowerSupply' => '400W',
            'ownPowerSupplyQuantity' => 0,
            'ownPaintHeightWidth' => false,
            'ownoracalHeightWidth' => false,
            'generalMaterial' => [],
            'ownPcs' => 1,
        ];
    }

    public function updatedown($property, $value)
    {
        if (preg_match('/^ownCost\.(\d+)\.ownText$/', $property, $matches)) {
            $index = $matches[1];
            $this->ownCost[$index]['characterCount'] = strlen($value);
        }
    }



    public function ownerremoveForm($index)
    {
        unset($this->ownCost[$index]);
        $this->ownCost = array_values($this->ownCost);
    }

    // calculation
    public function calculateBaseCost()
    {
        $this->isCalculated = true;

        // $this->validate([
        //     'job_name' => 'required',
        //     'date' => 'required',
        //     'salesperson' => 'required',
        // ]);

        if (!$this->baseType || !$this->baseMember || !$this->baseHeight || !$this->baseWidth) {
            $this->baseCost = 0.00;
        }

        $priceList = [
            "Aluminium Strip - Vertical" => ["Agent" => 25.00, "User" => 27.00],
            "Aluminium Strip - Vertical Woodgrain" => ["Agent" => 25.00, "User" => 27.00],
            "Aluminium Strip - Horizontal" => ["Agent" => 23.00, "User" => 25.00],
            "colorbond" => ["Agent" => 12.50, "User" => 15.00],
            "Alu Coil + Iron Frame + Tarpaulin (No UV Print)" => ["Agent" => 12.50, "User" => 14.00],
            "Alu Coil + Iron Frame + Tarpaulin (With UV Print)" => ["Agent" => 13.50, "User" => 15.00],
            "Lightbox" => ["Agent" => 25.00, "User" => 27.50],
            "Double Sided Lightbox" => ["Agent" => 65.00, "User" => 70.00]
        ];



        if (isset($priceList[$this->baseType]) || isset($priceList[$this->baseType][$this->baseMember])) {
            $basePrice = $priceList[$this->baseType][$this->baseMember];

            $this->baseCost = ($this->baseHeight * $this->baseWidth) / 144 * $basePrice;
        }

        //logo cost
        $this->acrylicCost = 0;
        $this->pvcCost = 0;

        $calculator = new LogoCostCalculation;
        $this->logoCostResults = [];

        foreach ($this->logoCost as $index => $form) {

            $cost = $calculator->calculate([
                'height' => $form['logoHeight'],
                'width' => $form['logoWidth'],
                'materials' => $form['logoMaterials'],
                'materialPrices' => $this->materialPrices,
                'stickers' => $form['stickerMaterial'],
                'stickerPrices' => $this->stickerPrices,
                'useSticker' => $form['logoStickerHeightWidth'],
                'useLighting' => $form['logolightHeightWidth'],
                'powerSupply' => $form['logoPowerSupply'],
                'powerSupplyQty' => $form['logoPowerSupplyQuantity'],
                'powerSupplyPrices' => $this->powerSupplyPrices,
                'usePaint' => $form['logoPaintHeightWidth'],
                'useOrcale' => $form['logooracalHeightWidth'],
                'generalMaterials' => $form['generalMaterial'] ?? [],
                'generalMaterialCostFunction' => [$this, 'getGeneralMaterialCost'],
                'lightingTypes' => $form['lightingtype'] ?? [],
                'lightingTypePrices' => $this->lightingtype,
                'pcs' => $form['logoPcs'] ?? 1,
                'neonmaterialInputs' => $form['NeonmaterialInputs'] ?? [],
                'acrylicInput' => $form['acrylicInput'] ?? [],
                'blackAcrylicInputs' => $form['blackAcrylicInputs'] ?? [],
                'pvcInputs' => $form['pvcInputs'] ?? [],
                'stainlessteelsilverInputs' => $form['stainlessteelsilverInputs'] ?? [],
                'stainlessteelgoldInputs ' => $form['stainlessteelgoldInputs '] ?? [],
                'logoPaintInputs ' => $form['logoPaintInputs '] ?? [],
                'generalMaterialInputs ' => $form['generalMaterialInputs '] ?? [],
            ]);


            $this->logoCostResults["LogoCost " . ($index + 1)] = round($cost, 2);
            $this->logoTotal = array_sum($this->logoCostResults);
        }

        // main cost

        $maincalculator = new MainLogoCostCalculation;
        $this->mainCostResults = [];

        foreach ($this->mainCost as $index => $form) {
            $cost = $maincalculator->Maincalculate([
                'height' => $form['mainHeight'] ?? 0,
                'width' => $form['mainWidth'] ?? 0,
                'materials' => $form['mainMaterials'],
                'materialPrices' => $this->materialPrices,
                'stickers' => $form['stickerMaterial'] ?? [],
                'stickerPrices' => $this->stickerPrices,
                'useSticker' => $form['mainStickerHeightWidth'] ?? false,
                'useLighting' => $form['mainlightHeightWidth'] ?? false,
                'powerSupply' => $form['mainPowerSupply'],
                'powerSupplyQty' => $form['mainPowerSupplyQuantity'],
                'powerSupplyPrices' => $this->powerSupplyPrices,
                'usePaint' => $form['mainPaintHeightWidth'] ?? false,
                'useOrcale' => $form['mainoracalHeightWidth'] ?? false,
                'generalMaterials' => $form['generalMaterial'] ?? [],
                'generalMaterialCostFunction' => [$this, 'getGeneralMaterialCost'],
                'lightingTypes' => $form['mainLightingType'] ?? [],
                'lightingTypePrices' => $this->lightingtype,
                'pcs' => $form['logoPcs'] ?? 1,
                'mainacrylicInput' => $form['mainacrylicInput'] ?? [],
                'mainblackAcrylicInputs' => $form['mainblackAcrylicInputs'] ?? [],
                'mainpvcInputs' => $form['mainpvcInputs'] ?? [],
                'mainstainlessteelsilverInputs' => $form['mainstainlessteelsilverInputs'] ?? [],
                'mainstainlessteelgoldInputs' => $form['mainstainlessteelgoldInputs'] ?? [],
                'neonmaterialInputs' => $form['mainneonmaterialInputs'] ?? [],
                'mainstickermaterialInputs' => $form['mainstickermaterialInputs'] ?? [],
                'maingeneralMaterialInputs' => $form['maingeneralMaterialInputs'] ?? [],
                'mainPaintInputs' => $form['mainPaintInputs'] ?? [],
                'mainoracalInputs' => $form['mainoracalInputs'] ?? [],
                'mainLightingInputs' => $form['mainLightingInputs'] ?? [],

            ]);

            $this->mainCostResults["MainCost " . ($index + 1)] = round($cost, 2);
            $this->mainTotal = array_sum($this->mainCostResults);
        }


        // add
        $addcalculator = new AddLetteringCost;
        $this->addCostResults = [];

        foreach ($this->addCost as $index => $form) {
            $cost = $addcalculator->addcalculate([
                'height' => $form['addHeight'] ?? 0,
                'width' => $form['addWidth'] ?? 0,
                'materials' => $form['addMaterials'] ?? [],
                'materialPrices' => $this->materialPrices,
                'stickers' => $form['stickerMaterial'] ?? [],
                'stickerPrices' => $this->stickerPrices,
                'useSticker' => $form['addStickerHeightWidth'] ?? false,
                'useLighting' => $form['addlightHeightWidth'] ?? false,
                'powerSupply' => $form['addPowerSupply'] ?? 'None',
                'powerSupplyQty' => $form['addPowerSupplyQuantity'],
                'powerSupplyPrices' => $this->powerSupplyPrices,
                'usePaint' => $form['addPaintHeightWidth'] ?? false,
                'useOrcale' => $form['addoracalHeightWidth'] ?? false,
                'generalMaterials' => $form['generalMaterial'] ?? [],
                'generalMaterialCostFunction' => [$this, 'getGeneralMaterialCost'],
                'lightingTypes' => $form['lightingtype'] ?? [],
                'lightingTypePrices' => $this->lightingtype,
                'pcs' => $form['addPcs'] ?? 1,
                'addacrylicInput' => $form['addacrylicInput'] ?? [],
                'addblackAcrylicInputs' => $form['addblackAcrylicInputs'] ?? [],
                'addpvcInputs' => $form['addpvcInputs'] ?? [],
                'addstainlessteelsilverInputs' => $form['addstainlessteelsilverInputs'] ?? [],
                'addstainlessteelgoldInputs' => $form['addstainlessteelgoldInputs'] ?? [],
                'addneonmaterialInputs' => $form['addneonmaterialInputs'] ?? [],
                'addstickermaterialInputs' => $form['addstickermaterialInputs'] ?? [],
                'addgeneralMaterialInputs' => $form['addgeneralMaterialInputs'] ?? [],
                'addpaintInputs' => $form['addpaintInputs'] ?? [],
                'addoracalInputs' => $form['addoracalInputs'] ?? [],
                'addLightingInputs' => $form['addLightingInputs'] ?? [],
            ]);

            $this->addCostResults["Addittional Cost " . ($index + 1)] = round($cost, 2);
            $this->addTotal = array_sum($this->addCostResults);
        }


        $this->busTotal = 0;
        // business
        $buscalculator = new BusinessCost;
        $this->busCostResults = [];

        foreach ($this->busCost as $index => $form) {
            $cost = $buscalculator->buscalculate([
                'height' => $form['busHeight'] ?? [],
                'width' => $form['busWidth'] ?? [],
                'materials' => $form['busMaterials'] ?? [],
                'materialPrices' => $this->materialPrices,
                'stickers' => $form['stickerMaterial'] ?? [],
                'stickerPrices' => $this->stickerPrices,
                'useSticker' => $form['busStickerHeightWidth'] ?? false,
                'useLighting' => $form['buslightHeightWidth'] ?? false,
                'powerSupply' => $form['busPowerSupply'],
                'powerSupplyQty' => $form['busPowerSupplyQuantity'],
                'powerSupplyPrices' => $this->powerSupplyPrices,
                'usePaint' => $form['busPaintHeightWidth'] ?? false,
                'useOrcale' => $form['busoracalHeightWidth'] ?? false,
                'generalMaterials' => $form['generalMaterial'] ?? [],
                'generalMaterialCostFunction' => [$this, 'getGeneralMaterialCost'],
                'lightingTypes' => $form['lightingtype'] ?? [],
                'lightingTypePrices' => $this->lightingtype,
                'pcs' => $form['busPcs'] ?? 1,
                'busacrylicInput' => $form['busacrylicInput'] ?? [],
                'busblackAcrylicInputs' => $form['busblackAcrylicInputs'] ?? [],
                'buspvcInputs' => $form['buspvcInputs'] ?? [],
                'busstainlessteelsilverInputs' => $form['busstainlessteelsilverInputs'] ?? [],
                'busstainlessteelgoldInputs' => $form['busstainlessteelgoldInputs'] ?? [],
                'busneonmaterialInputs' => $form['busneonmaterialInputs'] ?? [],
                'busstickermaterialInputs' => $form['busstickermaterialInputs'] ?? [],
                'busgeneralMaterialInputs' => $form['busgeneralMaterialInputs'] ?? [],
                'buspaintInputs' => $form['buspaintInputs'] ?? [],
                'busoracalInputs' => $form['busoracalInputs'] ?? [],
                'busLightingInputs' => $form['busLightingInputs'] ?? [],

            ]);

            $this->busCostResults["BusinessCost " . ($index + 1)] = round($cost, 2);
            $this->busTotal = array_sum($this->busCostResults);
        }


        $owncalculator = new OwnerstickerCost;
        $this->ownerCostResults = [];

        foreach ($this->ownCost as $index => $form) {
            $cost = $owncalculator->owncalculate([
                'height' => $form['ownHeight'],
                'width' => $form['ownWidth'],
                'materials' => $form['ownMaterials'],
                'materialPrices' => $this->materialPrices,
                'stickers' => $form['stickerMaterial'],
                'stickerPrices' => $this->stickerPrices,
                'useSticker' => $form['ownStickerHeightWidth'],
                'useLighting' => $form['ownlightHeightWidth'],
                'powerSupply' => $form['ownPowerSupply'],
                'powerSupplyQty' => $form['ownPowerSupplyQuantity'],
                'powerSupplyPrices' => $this->powerSupplyPrices,
                'usePaint' => $form['ownPaintHeightWidth'],
                'useOrcale' => $form['ownoracalHeightWidth'],
                'generalMaterials' => $form['generalMaterial'] ?? [],
                'generalMaterialCostFunction' => [$this, 'getGeneralMaterialCost'],
                'lightingTypes' => $form['lightingtype'] ?? [],
                'lightingTypePrices' => $this->lightingtype,
                'pcs' => $form['ownPcs'] ?? 1,
                'ownacrylicInput' => $form['ownacrylicInput'] ?? [],
                'ownblackAcrylicInputs' => $form['ownblackAcrylicInputs'] ?? [],
                'ownpvcInputs' => $form['ownpvcInputs'] ?? [],
                'ownstainlessteelsilverInputs' => $form['ownstainlessteelsilverInputs'] ?? [],
                'ownstainlessteelgoldInputs' => $form['ownstainlessteelgoldInputs'] ?? [],
                'ownneonmaterialInputs' => $form['ownneonmaterialInputs'] ?? [],
                'ownstickermaterialInputs' => $form['ownstickermaterialInputs'] ?? [],
                'owngeneralMaterialInputs' => $form['owngeneralMaterialInputs'] ?? [],
                'ownpaintInputs' => $form['ownpaintInputs'] ?? [],
                'ownoracalInputs' => $form['ownoracalInputs'] ?? [],
                'ownLightingInputs' => $form['ownLightingInputs'] ?? [],
            ]);
            $this->ownerCostResults["OwnerCost " . ($index + 1)] = round($cost, 2);

            $this->ownTotal = array_sum($this->ownerCostResults);
        }
    }

    public function saveDatabase()
    {
        if (!$this->isCalculated) {
            // dd('hii');
        }
        $this->validate([
            'job_name' => 'required|string|max:255',
            'date' => 'required|date',
            'customer_name' => 'required',
            'company_name' => 'required',
            'customer_phone_no' => 'required',
            'salesperson' => 'required',
            'qt_inv_umber' => 'required',
            'remark' => 'required',
            'image' => 'required',


        ]);

        $imagePath = $this->image ? $this->image->store('uploads', 'public') : null;
        $calculation = Calculation::create([
            'job_name' => $this->job_name,
            'date' => $this->date,
            'sales_man' => Auth::user()->name,
            'login_type' => Auth::user()->login_type,
            'customer_name' => $this->customer_name,
            'company_name' => $this->company_name,
            'customer_phone_no' => $this->customer_phone_no,
            'salesperson' => $this->salesperson,
            'qt_inv_umber' => $this->qt_inv_umber,
            'remark' => $this->remark,
            'image' => $imagePath,

        ]);
        // dd(Auth::user()->login_type);

        // Save Base
        if ($this->baseType) {
            BaseCalculation::create([
                'calculation_id' => $calculation->id,
                'base_type' => $this->baseType,
                'base_member' => $this->baseMember,
                'base_height' => $this->baseHeight,
                'base_width' => $this->baseWidth,
                'total_base_cost' => $this->baseCost,
            ]);
        }

        foreach ($this->logoCost as $index => $logo) {
            LogoCalculation::create([
                'calculation_id' => $calculation->id,
                'logo_order' => $index + 1,
                'logo_text' => $logo['logoText'] ?? '',
                'logo_height' => $logo['logoHeight'] ?? 0,
                'logo_width' => $logo['logoWidth'] ?? 0,
                'logo_materials' => implode(',', $logo['logoMaterials'] ?? []),
                'logo_sticker_height_width' => $logo['logoStickerHeightWidth'] ? 'yes' : null,
                'logo_sticker_material' => implode(',', $logo['stickerMaterial'] ?? []),
                'logo_general_material' => implode(',', $logo['generalMaterial'] ?? []),
                'logo_paint_height_width' => $logo['logoPaintHeightWidth'] ? 'yes' : null,
                'logo_oracal_height_width' => $logo['logooracalHeightWidth'] ? 'yes' : null,
                'logo_light_height_width' => $logo['logolightHeightWidth'] ? 'yes' : null,
                'logo_lighting_type' => implode(',', $logo['lightingtype'] ?? []),
                'logo_power_supply' => $logo['logoPowerSupply'],
                'logo_power_supply_quantity' => $logo['logoPowerSupplyQuantity'],
                'logo_acrylic_cost' => $logo['logoAcrylicCost'] ?? 0,
                'logo_pvc_cost' => $logo['logoPVCCost'] ?? 0,
                'logo_sticker_cost' => $logo['logoStickerCost'] ?? 0,
                'logo_lighting_cost' => $logo['logoLightingCost'] ?? 0,
                'logo_power_supply_cost' => $logo['logoPowerSupplyCost'] ?? 0,
                'logo_paint_cost' => $logo['logoPaintCost'] ?? 0,
                'logo_general_material_cost' => $logo['logoGeneralMaterialCost'] ?? 0,
                'logo_lighting_price' => $logo['logoLightingPrice'] ?? 0,
                'logo_oracal_cost' => $logo['logoOracalCost'] ?? 0,

                'total_logo_cost' => $this->logoCostResults["LogoCost " . ($index + 1)] ?? 0,
            ]);
        }


        // Save Main
        foreach ($this->mainCost as $index => $main) {
            MainCalculation::create([
                'calculation_id' => $calculation->id,
                'main_order' => $index + 1,
                'main_text' => $main['mainText'] ?? '',
                'main_height' => $main['mainHeight'] ?? 0,
                'main_width' => $main['mainWidth'] ?? 0,
                'main_materials' => implode(',', $main['mainMaterials'] ?? []),
                'main_sticker_height_width' => $main['mainStickerHeightWidth'] ? 'yes' : null,
                'main_sticker_material' => implode(',', $main['stickerMaterial'] ?? []),
                'main_general_material' => implode(',', $main['generalMaterial'] ?? []),
                'main_paint_height_width' => $main['mainPaintHeightWidth'] ? 'yes' : null,
                'main_oracal_height_width' => $main['mainoracalHeightWidth'] ? 'yes' : null,
                'main_light_height_width' => $main['mainlightHeightWidth'] ? 'yes' : null,
                'main_lighting_type' => implode(',', $main['mainLightingType'] ?? []),
                'main_power_supply' => $main['mainPowerSupply'],
                'main_power_supply_quantity' => $main['mainPowerSupplyQuantity'],
                'main_acrylic_cost' => $main['mainAcrylicCost'] ?? 0,
                'main_pvc_cost' => $main['mainPVCCost'] ?? 0,
                'main_sticker_cost' => $main['mainStickerCost'] ?? 0,
                'main_lighting_cost' => $main['mainLightingCost'] ?? 0,
                'main_power_supply_cost' => $main['mainPowerSupplyCost'] ?? 0,
                'main_paint_cost' => $main['mainPaintCost'] ?? 0,
                'main_general_material_cost' => $main['mainGeneralMaterialCost'] ?? 0,
                'main_lighting_price' => $main['mainLightingPrice'] ?? 0,
                'main_oracal_cost' => $main['mainOracalCost'] ?? 0,

                'total_main_cost' => $this->mainCostResults["MainCost " . ($index + 1)] ?? 0,
            ]);
        }

        // Save Additional
        foreach ($this->addCost as $index => $add) {
            AddCalculation::create([
                'calculation_id' => $calculation->id,
                'add_order' => $index + 1,
                'add_text' => $add['addText'] ?? '',
                'add_height' => $add['addHeight'] ?? 0,
                'add_width' => $add['addWidth'] ?? 0,
                'add_materials' => implode(',', $add['addMaterials'] ?? []),
                'add_sticker_height_width' => $add['addStickerHeightWidth'] ? 'yes' : null,
                'add_sticker_material' => implode(',', $add['stickerMaterial'] ?? []),
                'add_general_material' => implode(',', $add['generalMaterial'] ?? []),
                'add_paint_height_width' => $add['addPaintHeightWidth'] ? 'yes' : null,
                'add_oracal_height_width' => $add['addoracalHeightWidth'] ? 'yes' : null,
                'add_light_height_width' => $add['addlightHeightWidth'] ? 'yes' : null,
                'add_lighting_type' => implode(',', $add['lightingtype'] ?? []),
                'add_power_supply' => $add['addPowerSupply'],
                'add_power_supply_quantity' => $add['addPowerSupplyQuantity'],
                'add_acrylic_cost' => $add['addAcrylicCost'] ?? 0,
                'add_pvc_cost' => $add['addPVCCost'] ?? 0,
                'add_sticker_cost' => $add['addStickerCost'] ?? 0,
                'add_lighting_cost' => $add['addLightingCost'] ?? 0,
                'add_power_supply_cost' => $add['addPowerSupplyCost'] ?? 0,
                'add_paint_cost' => $add['addPaintCost'] ?? 0,
                'add_general_material_cost' => $add['addGeneralMaterialCost'] ?? 0,
                'add_lighting_price' => $add['addLightingPrice'] ?? 0,
                'add_oracal_cost' => $add['addOracalCost'] ?? 0,

                'total_add_cost' => $this->addCostResults["Addittional Cost " . ($index + 1)] ?? 0,
            ]);
        }

        // Save Business
        foreach ($this->busCost as $index => $bus) {
            BusinessCalculation::create([
                'calculation_id' => $calculation->id,
                'business_order' => $index + 1,
                'business_text' => $bus['busText'] ?? '',
                'business_height' => $bus['busHeight'] ?? 0,
                'business_width' => $bus['busWidth'] ?? 0,
                'business_materials' => implode(',', $bus['busMaterials'] ?? []),
                'business_sticker_height_width' => $bus['busStickerHeightWidth'] ? 'yes' : null,
                'business_sticker_material' => implode(',', $bus['stickerMaterial'] ?? []),
                'business_general_material' => implode(',', $bus['generalMaterial'] ?? []),
                'business_paint_height_width' => $bus['busPaintHeightWidth'] ? 'yes' : null,
                'business_oracal_height_width' => $bus['busoracalHeightWidth'] ? 'yes' : null,
                'business_light_height_width' => $bus['buslightHeightWidth'] ? 'yes' : null,
                'business_lighting_type' => implode(',', $bus['lightingtype'] ?? []),
                'business_power_supply' => $bus['busPowerSupply'],
                'business_power_supply_quantity' => $bus['busPowerSupplyQuantity'],

                'business_acrylic_cost' => $bus['businessAcrylicCost'] ?? 0,
                'business_pvc_cost' => $bus['businessPVCCost'] ?? 0,
                'business_sticker_cost' => $bus['businessStickerCost'] ?? 0,
                'business_lighting_cost' => $bus['businessLightingCost'] ?? 0,
                'business_power_supply_cost' => $bus['businessPowerSupplyCost'] ?? 0,
                'business_paint_cost' => $bus['businessPaintCost'] ?? 0,
                'business_general_material_cost' => $bus['businessGeneralMaterialCost'] ?? 0,
                'business_lighting_price' => $bus['businessLightingPrice'] ?? 0,
                'business_oracal_cost' => $bus['businessOracalCost'] ?? 0,

                'total_business_cost' => $this->busCostResults["BusinessCost " . ($index + 1)] ?? 0,
            ]);
        }

        // Save Owner
        foreach ($this->ownCost as $index => $own) {
            OwnershipCalculation::create([
                'calculation_id' => $calculation->id,
                'ownership_order' => $index + 1,
                'ownership_text' => $own['ownText'] ?? '',
                'ownership_height' => $own['ownHeight'] ?? 0,
                'ownership_width' => $own['ownWidth'] ?? 0,
                'ownership_materials' => implode(',', array: $own['ownMaterials'] ?? []),
                'ownership_sticker_height_width' => $own['ownStickerHeightWidth'] ? 'yes' : null,
                'ownership_sticker_material' => implode(',', $own['stickerMaterial'] ?? []),
                'ownership_general_material' => implode(',', $own['generalMaterial'] ?? []),
                'ownership_paint_height_width' => $own['ownPaintHeightWidth'] ? 'yes' : null,
                'ownership_oracal_height_width' => $own['ownoracalHeightWidth'] ? 'yes' : null,
                'ownership_light_height_width' => $own['ownlightHeightWidth'] ? 'yes' : null,
                'ownership_lighting_type' => implode(',', $own['ownLightingType'] ?? []),
                'ownership_power_supply' => $own['ownPowerSupply'],
                'ownership_power_supply_quantity' => $own['ownPowerSupplyQuantity'],

                'ownership_acrylic_cost' => $own['ownerAcrylicCost'] ?? 0,
                'ownership_pvc_cost' => $own['ownerPVCCost'] ?? 0,
                'ownership_sticker_cost' => $own['ownerStickerCost'] ?? 0,
                'ownership_lighting_cost' => $own['ownerLightingCost'] ?? 0,
                'ownership_power_supply_cost' => $own['ownerPowerSupplyCost'] ?? 0,
                'ownership_paint_cost' => $own['ownerPaintCost'] ?? 0,
                'ownership_general_material_cost' => $own['ownerGeneralMaterialCost'] ?? 0,
                'ownership_lighting_price' => $own['ownerLightingPrice'] ?? 0,
                'ownership_oracal_cost' => $own['ownerOracalCost'] ?? 0,
                'total_ownership_cost' => $this->ownerCostResults["OwnerCost " . ($index + 1)] ?? 0,
            ]);
        }
        if (Auth::user()->login_type == '1') {
            return redirect('dashboard')->with('message', 'Calculation saved successfully.');
        } else {
            return redirect('salesman-data_calculation')->with('message', 'Calculation saved successfully.');
        }
    }


    // Main Cost

    public function toggleMainAcrylicInput($index, $size)
    {
        $selected = $this->mainCost[$index]['mainMaterials'] ?? [];

        if (in_array("acrylic{$size}mm", $selected)) {
            $this->mainCost[$index]['showAcrylicInput'] = $size;
        } else {
            $this->mainCost[$index]['showAcrylicInput'] = null;
        }
    }


    public function toggleMainBlackAcrylicInput($index, $size)
    {
        $selected = $this->mainCost[$index]['mainMaterials'] ?? [];

        if (in_array("black_acrylic{$size}mm", $selected)) {
            $this->mainCost[$index]['showBlackAcrylicInput'][] = $size;
        } else {
            $this->mainCost[$index]['showBlackAcrylicInput'] = array_diff(
                $this->mainCost[$index]['showBlackAcrylicInput'] ?? [],
                [$size]
            );
            unset($this->mainCost[$index]['blackAcrylicInputs']);
        }
    }

    public function toggleMainPVCInput($index, $size)
    {
        $selected = $this->mainCost[$index]['mainMaterials'] ?? [];

        if (in_array("pvc{$size}mm", $selected)) {
            if (!isset($this->mainCost[$index]['showPVCInput'])) {
                $this->mainCost[$index]['showPVCInput'] = [];
            }
            if (!in_array($size, $this->mainCost[$index]['showPVCInput'])) {
                $this->mainCost[$index]['showPVCInput'][] = $size;
            }
        } else {
            $this->mainCost[$index]['showPVCInput'] = array_diff(
                $this->mainCost[$index]['showPVCInput'] ?? [],
                [$size]
            );
            unset($this->mainCost[$index]['pvcInputs']);
        }
    }

    public function toggleMainStainlessSteelInput($index, $key)
    {
        if (
            isset($this->mainCost[$index]['mainMaterials']) &&
            in_array($key, $this->mainCost[$index]['mainMaterials'])
        ) {

            // Add the key to showInputs so input box appears
            $this->mainCost[$index]['showInputs'][] = $key;
            $this->mainCost[$index]['showInputs'] = array_unique($this->mainCost[$index]['showInputs']);
        } else {
            // Remove the key so input box disappears
            if (!empty($this->mainCost[$index]['showInputs'])) {
                $this->mainCost[$index]['showInputs'] = array_filter(
                    $this->mainCost[$index]['showInputs'],
                    fn($k) => $k !== $key
                );
                $this->mainCost[$index]['showInputs'] = array_values($this->mainCost[$index]['showInputs']);
            }
        }
    }

    public function toggleMainStainlessgoldInput($index, $key)
    {
        if (
            isset($this->mainCost[$index]['mainMaterials']) &&
            in_array($key, $this->mainCost[$index]['mainMaterials'])
        ) {

            // Add the key to showInputs so input box appears
            $this->mainCost[$index]['showInputs'][] = $key;
            $this->mainCost[$index]['showInputs'] = array_unique($this->mainCost[$index]['showInputs']);
        } else {
            // Remove the key so input box disappears
            if (!empty($this->mainCost[$index]['showInputs'])) {
                $this->mainCost[$index]['showInputs'] = array_filter(
                    $this->mainCost[$index]['showInputs'],
                    fn($k) => $k !== $key
                );
                $this->mainCost[$index]['showInputs'] = array_values($this->mainCost[$index]['showInputs']);
            }
        }
    }

    public function toggleMainNeonMaterialInput($index, $materialKey)
    {
        $selectedLists = [
            'mainMaterials',
            'stickerMaterial',
            'generalMaterial',
            'others'
        ];

        $selected = null;
        foreach ($selectedLists as $list) {
            if (!empty($this->mainCost[$index][$list]) && in_array($materialKey, $this->mainCost[$index][$list])) {
                $selected = $this->mainCost[$index][$list];
                break;
            }
        }

        if ($selected && in_array($materialKey, $selected)) {
            if (!isset($this->mainCost[$index]['showInputs'])) {
                $this->mainCost[$index]['showInputs'] = [];
            }
            if (!in_array($materialKey, $this->mainCost[$index]['showInputs'])) {
                $this->mainCost[$index]['showInputs'][] = $materialKey;
            }
        } else {
            $this->mainCost[$index]['showInputs'] = array_diff(
                $this->mainCost[$index]['showInputs'] ?? [],
                [$materialKey]
            );
            unset($this->mainCost[$index]['materialInputs'][$materialKey]);
        }
    }



    public function toggleMainstickerInput($index, $materialKey)
    {
        $selected = array_merge(
            $this->mainCost[$index]['mainMaterials'] ?? [],
            $this->mainCost[$index]['stickerMaterial'] ?? []
        );

        if (in_array($materialKey, $selected)) {
            if (!isset($this->mainCost[$index]['showInputs'])) {
                $this->mainCost[$index]['showInputs'] = [];
            }
            if (!in_array($materialKey, $this->mainCost[$index]['showInputs'])) {
                $this->mainCost[$index]['showInputs'][] = $materialKey;
            }
        } else {
            $this->mainCost[$index]['showInputs'] = array_diff(
                $this->mainCost[$index]['showInputs'] ?? [],
                [$materialKey]
            );
            unset($this->mainCost[$index]['stickermaterialInputs'][$materialKey]);
        }
    }



    public function toggleMainGeneralMaterialInput($index, $materialKey)
    {
        $selected = $this->mainCost[$index]['generalMaterial'] ?? [];

        if (in_array($materialKey, $selected)) {
            if (!isset($this->mainCost[$index]['showGeneralInputs'])) {
                $this->mainCost[$index]['showGeneralInputs'] = [];
            }
            if (!in_array($materialKey, $this->mainCost[$index]['showGeneralInputs'])) {
                $this->mainCost[$index]['showGeneralInputs'][] = $materialKey;
            }
        } else {
            $this->mainCost[$index]['showGeneralInputs'] = array_diff(
                $this->mainCost[$index]['showGeneralInputs'] ?? [],
                [$materialKey]
            );
            unset($this->mainCost[$index]['generalMaterialInputs'][$materialKey]);
        }
    }



    public function toggleMainpaintMaterialInput($index, $materialKey)
    {
        if (!empty($this->mainCost[$index]['mainPaintHeightWidth'])) {
            $this->mainCost[$index]['showGeneralInputs'][] = $materialKey;
        } else {
            $this->mainCost[$index]['showGeneralInputs'] = array_diff(
                $this->mainCost[$index]['showGeneralInputs'] ?? [],
                [$materialKey]
            );
            unset($this->mainCost[$index]['MainPaintInputs']);
        }
    }




    public function toggleMainOrcalMaterialInput($index, $materialKey)
    {
        $isChecked = !empty($this->mainCost[$index]['mainoracalHeightWidth']);

        if ($isChecked) {
            if (!isset($this->mainCost[$index]['showGeneralInputs'])) {
                $this->mainCost[$index]['showGeneralInputs'] = [];
            }
            if (!in_array($materialKey, $this->mainCost[$index]['showGeneralInputs'])) {
                $this->mainCost[$index]['showGeneralInputs'][] = $materialKey;
            }
        } else {
            $this->mainCost[$index]['showGeneralInputs'] = array_diff(
                $this->mainCost[$index]['showGeneralInputs'] ?? [],
                [$materialKey]
            );

            if (isset($this->mainCost[$index]['mainOracalInputs'][$materialKey])) {
                unset($this->mainCost[$index]['mainOracalInputs'][$materialKey]);
            }
        }
    }


    public function toggleMainLightingInput($index, $lightingType)
    {
        $selectedTypes = $this->mainCost[$index]['mainLightingType'] ?? [];

        if (in_array($lightingType, $selectedTypes)) {
            if (!isset($this->mainCost[$index]['showLightingInputs'])) {
                $this->mainCost[$index]['showLightingInputs'] = [];
            }
            if (!in_array($lightingType, $this->mainCost[$index]['showLightingInputs'])) {
                $this->mainCost[$index]['showLightingInputs'][] = $lightingType;
            }
        } else {
            $this->mainCost[$index]['showLightingInputs'] = array_diff(
                $this->mainCost[$index]['showLightingInputs'] ?? [],
                [$lightingType]
            );
            unset($this->mainCost[$index]['mainLightingInputs'][$lightingType]);
        }
    }

    // Addional Cost


    public function toggleAddAcrylicInput($index, $size)
    {
        $selected = $this->addCost[$index]['addMaterials'] ?? [];

        if (in_array("acrylic{$size}mm", $selected)) {
            $this->addCost[$index]['showAcrylicInput'] = $size;
        } else {
            $this->addCost[$index]['showAcrylicInput'] = null;
        }
    }


    public function toggleAddBlackAcrylicInput($index, $size)
    {
        $selected = $this->addCost[$index]['addMaterials'] ?? [];

        if (in_array("black_acrylic{$size}mm", $selected)) {
            $this->addCost[$index]['showBlackAcrylicInput'][] = $size;
        } else {
            $this->addCost[$index]['showBlackAcrylicInput'] = array_diff(
                $this->addCost[$index]['showBlackAcrylicInput'] ?? [],
                [$size]
            );
            unset($this->addCost[$index]['blackAcrylicInputs']);
        }
    }

    public function toggleAddPVCInput($index, $size)
    {
        $selected = $this->addCost[$index]['addMaterials'] ?? [];

        if (in_array("pvc{$size}mm", $selected)) {
            if (!isset($this->addCost[$index]['showPVCInput'])) {
                $this->addCost[$index]['showPVCInput'] = [];
            }
            if (!in_array($size, $this->addCost[$index]['showPVCInput'])) {
                $this->addCost[$index]['showPVCInput'][] = $size;
            }
        } else {
            $this->addCost[$index]['showPVCInput'] = array_diff(
                $this->addCost[$index]['showPVCInput'] ?? [],
                [$size]
            );
            unset($this->addCost[$index]['pvcInputs']);
        }
    }


    public function toggleAddStainlessSteelInput($index, $key)
    {
        // Make sure the 'showInputs' array exists
        if (!isset($this->addCost[$index]['showInputs']) || !is_array($this->addCost[$index]['showInputs'])) {
            $this->addCost[$index]['showInputs'] = [];
        }

        if (
            isset($this->addCost[$index]['addMaterials']) &&
            in_array($key, $this->addCost[$index]['addMaterials'])
        ) {
            // Add the key if it's not already there
            if (!in_array($key, $this->addCost[$index]['showInputs'])) {
                $this->addCost[$index]['showInputs'][] = $key;
            }
        } else {
            // Remove the key
            $this->addCost[$index]['showInputs'] = array_filter(
                $this->addCost[$index]['showInputs'],
                fn($k) => $k !== $key
            );
            $this->addCost[$index]['showInputs'] = array_values($this->addCost[$index]['showInputs']);
        }
    }




    public function toggleAddStainlessgoldInput($index, $key)
    {
        if (
            isset($this->addCost[$index]['addMaterials']) &&
            in_array($key, $this->addCost[$index]['addMaterials'])
        ) {

            // Add the key to showInputs so input box appears
            $this->addCost[$index]['showInputs'][] = $key;
            $this->addCost[$index]['showInputs'] = array_unique($this->addCost[$index]['showInputs']);
        } else {
            // Remove the key so input box disappears
            if (!empty($this->addCost[$index]['showInputs'])) {
                $this->addCost[$index]['showInputs'] = array_filter(
                    $this->addCost[$index]['showInputs'],
                    fn($k) => $k !== $key
                );
                $this->addCost[$index]['showInputs'] = array_values($this->addCost[$index]['showInputs']);
            }
        }
    }


    public function toggleAddNeonInput($index, $materialKey)
    {
        $selectedLists = [
            'addMaterials',
            'stickerMaterial',
            'generalMaterial',
            'others'
        ];

        $selected = null;
        foreach ($selectedLists as $list) {
            if (!empty($this->addCost[$index][$list]) && in_array($materialKey, $this->addCost[$index][$list])) {
                $selected = $this->addCost[$index][$list];
                break;
            }
        }

        if ($selected && in_array($materialKey, $selected)) {
            if (!isset($this->addCost[$index]['showInputs'])) {
                $this->addCost[$index]['showInputs'] = [];
            }
            if (!in_array($materialKey, $this->addCost[$index]['showInputs'])) {
                $this->addCost[$index]['showInputs'][] = $materialKey;
            }
        } else {
            $this->addCost[$index]['showInputs'] = array_diff(
                $this->addCost[$index]['showInputs'] ?? [],
                [$materialKey]
            );
            unset($this->addCost[$index]['materialInputs'][$materialKey]);
        }
    }




    public function toggleAddStickerInput($index, $materialKey)
    {
        $selected = array_merge(
            $this->addCost[$index]['addMaterials'] ?? [],
            $this->addCost[$index]['stickerMaterial'] ?? []
        );

        if (in_array($materialKey, $selected)) {
            if (!isset($this->addCost[$index]['showInputs'])) {
                $this->addCost[$index]['showInputs'] = [];
            }
            if (!in_array($materialKey, $this->addCost[$index]['showInputs'])) {
                $this->addCost[$index]['showInputs'][] = $materialKey;
            }
        } else {
            $this->addCost[$index]['showInputs'] = array_diff(
                $this->addCost[$index]['showInputs'] ?? [],
                [$materialKey]
            );
            unset($this->addCost[$index]['stickermaterialInputs'][$materialKey]);
        }
    }




    public function toggleAddGeneralMaterialInput($index, $materialKey)
    {
        $selected = $this->addCost[$index]['generalMaterial'] ?? [];

        if (in_array($materialKey, $selected)) {
            if (!isset($this->addCost[$index]['showGeneralInputs'])) {
                $this->addCost[$index]['showGeneralInputs'] = [];
            }
            if (!in_array($materialKey, $this->addCost[$index]['showGeneralInputs'])) {
                $this->addCost[$index]['showGeneralInputs'][] = $materialKey;
            }
        } else {
            $this->addCost[$index]['showGeneralInputs'] = array_diff(
                $this->addCost[$index]['showGeneralInputs'] ?? [],
                [$materialKey]
            );
            unset($this->addCost[$index]['generalMaterialInputs'][$materialKey]);
        }
    }



    public function toggleAddPaintInput($index, $materialKey)
    {
        if (!isset($this->addCost[$index]['showGeneralInputs'])) {
            $this->addCost[$index]['showGeneralInputs'] = [];
        }

        if (!empty($this->addCost[$index]['addPaintHeightWidth'])) {
            if (!in_array($materialKey, $this->addCost[$index]['showGeneralInputs'])) {
                $this->addCost[$index]['showGeneralInputs'][] = $materialKey;
            }
        } else {
            $this->addCost[$index]['showGeneralInputs'] = array_diff(
                $this->addCost[$index]['showGeneralInputs'],
                [$materialKey]
            );
            unset($this->addCost[$index]['addPaintInputs']);
        }
    }




    public function toggleAddOrcalMaterialInput($index, $materialKey)
    {
        if (!isset($this->addCost[$index]['showGeneralInputs'])) {
            $this->addCost[$index]['showGeneralInputs'] = [];
        }
        if (!isset($this->addCost[$index]['addOracalInputs'])) {
            $this->addCost[$index]['addOracalInputs'] = [];
        }

        $isChecked = !empty($this->addCost[$index]['addOracalHeightWidth'][$materialKey] ?? false);

        if ($isChecked) {
            if (!in_array($materialKey, $this->addCost[$index]['showGeneralInputs'])) {
                $this->addCost[$index]['showGeneralInputs'][] = $materialKey;
            }
        } else {
            $this->addCost[$index]['showGeneralInputs'] = array_values(array_diff(
                $this->addCost[$index]['showGeneralInputs'],
                [$materialKey]
            ));
            unset($this->addCost[$index]['addOracalInputs'][$materialKey]);
        }
    }


    public function toggleAddLightingInput($index, $lightingType)
    {
        $selectedTypes = $this->addCost[$index]['addLightingType'] ?? [];

        if (in_array($lightingType, $selectedTypes)) {
            if (!isset($this->addCost[$index]['showLightingInputs'])) {
                $this->addCost[$index]['showLightingInputs'] = [];
            }
            if (!in_array($lightingType, $this->addCost[$index]['showLightingInputs'])) {
                $this->addCost[$index]['showLightingInputs'][] = $lightingType;
            }
        } else {
            $this->addCost[$index]['showLightingInputs'] = array_diff(
                $this->addCost[$index]['showLightingInputs'] ?? [],
                [$lightingType]
            );
            unset($this->addCost[$index]['addLightingInputs'][$lightingType]);
        }
    }


    // Businness Cost


    public function toggleBusAcrylicInput($index, $size)
    {
        $selected = $this->busCost[$index]['busMaterials'] ?? [];

        if (in_array("acrylic{$size}mm", $selected)) {
            $this->busCost[$index]['showAcrylicInput'] = $size;
        } else {
            $this->busCost[$index]['showAcrylicInput'] = null;
        }
    }


    public function toggleBusBlackAcrylicInput($index, $size)
    {
        $selected = $this->busCost[$index]['busMaterials'] ?? [];

        if (in_array("black_acrylic{$size}mm", $selected)) {
            $this->busCost[$index]['showBlackAcrylicInput'][] = $size;
        } else {
            $this->busCost[$index]['showBlackAcrylicInput'] = array_diff(
                $this->busCost[$index]['showBlackAcrylicInput'] ?? [],
                [$size]
            );
            unset($this->busCost[$index]['blackAcrylicInputs']);
        }
    }

    public function toggleBusPVCInput($index, $size)
    {
        $selected = $this->busCost[$index]['busMaterials'] ?? [];

        if (in_array("pvc{$size}mm", $selected)) {
            if (!isset($this->busCost[$index]['showPVCInput'])) {
                $this->busCost[$index]['showPVCInput'] = [];
            }
            if (!in_array($size, $this->busCost[$index]['showPVCInput'])) {
                $this->busCost[$index]['showPVCInput'][] = $size;
            }
        } else {
            $this->busCost[$index]['showPVCInput'] = array_diff(
                $this->busCost[$index]['showPVCInput'] ?? [],
                [$size]
            );
            unset($this->busCost[$index]['pvcInputs']);
        }
    }


    public function toggleBusStainlessSteelInput($index, $key)
    {
        // Make sure the 'showInputs' array exists
        if (!isset($this->busCost[$index]['showInputs']) || !is_array($this->busCost[$index]['showInputs'])) {
            $this->busCost[$index]['showInputs'] = [];
        }

        if (
            isset($this->busCost[$index]['busMaterials']) &&
            in_array($key, $this->busCost[$index]['busMaterials'])
        ) {
            // Add the key if it's not already there
            if (!in_array($key, $this->busCost[$index]['showInputs'])) {
                $this->busCost[$index]['showInputs'][] = $key;
            }
        } else {
            // Remove the key
            $this->busCost[$index]['showInputs'] = array_filter(
                $this->busCost[$index]['showInputs'],
                fn($k) => $k !== $key
            );
            $this->busCost[$index]['showInputs'] = array_values($this->busCost[$index]['showInputs']);
        }
    }




    public function toggleBusStainlessgoldInput($index, $key)
    {
        if (
            isset($this->busCost[$index]['busMaterials']) &&
            in_array($key, $this->busCost[$index]['busMaterials'])
        ) {

            // Add the key to showInputs so input box appears
            $this->busCost[$index]['showInputs'][] = $key;
            $this->busCost[$index]['showInputs'] = array_unique($this->busCost[$index]['showInputs']);
        } else {
            // Remove the key so input box disappears
            if (!empty($this->busCost[$index]['showInputs'])) {
                $this->busCost[$index]['showInputs'] = array_filter(
                    $this->busCost[$index]['showInputs'],
                    fn($k) => $k !== $key
                );
                $this->busCost[$index]['showInputs'] = array_values($this->busCost[$index]['showInputs']);
            }
        }
    }


    public function toggleBusNeonInput($index, $materialKey)
    {
        $selectedLists = [
            'busMaterials',
            'stickerMaterial',
            'generalMaterial',
            'others'
        ];

        $selected = null;
        foreach ($selectedLists as $list) {
            if (!empty($this->busCost[$index][$list]) && in_array($materialKey, $this->busCost[$index][$list])) {
                $selected = $this->busCost[$index][$list];
                break;
            }
        }

        if ($selected && in_array($materialKey, $selected)) {
            if (!isset($this->busCost[$index]['showInputs'])) {
                $this->busCost[$index]['showInputs'] = [];
            }
            if (!in_array($materialKey, $this->busCost[$index]['showInputs'])) {
                $this->busCost[$index]['showInputs'][] = $materialKey;
            }
        } else {
            $this->busCost[$index]['showInputs'] = array_diff(
                $this->busCost[$index]['showInputs'] ?? [],
                [$materialKey]
            );
            unset($this->busCost[$index]['NeonmaterialInputs'][$materialKey]);
        }
    }



    public function toggleBusStickerInput($index, $materialKey)
    {
        $selected = array_merge(
            $this->busCost[$index]['addMaterials'] ?? [],
            $this->busCost[$index]['stickerMaterial'] ?? []
        );

        if (in_array($materialKey, $selected)) {
            if (!isset($this->busCost[$index]['showInputs'])) {
                $this->busCost[$index]['showInputs'] = [];
            }
            if (!in_array($materialKey, $this->busCost[$index]['showInputs'])) {
                $this->busCost[$index]['showInputs'][] = $materialKey;
            }
        } else {
            $this->busCost[$index]['showInputs'] = array_diff(
                $this->busCost[$index]['showInputs'] ?? [],
                [$materialKey]
            );
            unset($this->addCost[$index]['stickermaterialInputs'][$materialKey]);
        }
    }

    public function toggleBusGeneralMaterialInput($index, $materialKey)
    {
        $selected = $this->busCost[$index]['generalMaterial'] ?? [];

        if (in_array($materialKey, $selected)) {
            if (!isset($this->busCost[$index]['showGeneralInputs'])) {
                $this->busCost[$index]['showGeneralInputs'] = [];
            }
            if (!in_array($materialKey, $this->busCost[$index]['showGeneralInputs'])) {
                $this->busCost[$index]['showGeneralInputs'][] = $materialKey;
            }
        } else {
            $this->busCost[$index]['showGeneralInputs'] = array_diff(
                $this->busCost[$index]['showGeneralInputs'] ?? [],
                [$materialKey]
            );
            unset($this->busCost[$index]['generalMaterialInputs'][$materialKey]);
        }
    }



    public function toggleBusPaintInput($index, $materialKey)
    {
        if (!isset($this->busCost[$index]['showGeneralInputs'])) {
            $this->busCost[$index]['showGeneralInputs'] = [];
        }

        if (!empty($this->busCost[$index]['busPaintHeightWidth'])) {
            if (!in_array($materialKey, $this->busCost[$index]['showGeneralInputs'])) {
                $this->busCost[$index]['showGeneralInputs'][] = $materialKey;
            }
        } else {
            $this->busCost[$index]['showGeneralInputs'] = array_diff(
                $this->busCost[$index]['showGeneralInputs'],
                [$materialKey]
            );
            unset($this->busCost[$index]['busPaintInputs']);
        }
    }




    public function toggleBusOracalMaterialInput($index, $materialKey)
    {
        if (!isset($this->busCost[$index]['showGeneralInputs'])) {
            $this->busCost[$index]['showGeneralInputs'] = [];
        }
        if (!isset($this->busCost[$index]['busOracalInputs'])) {
            $this->busCost[$index]['busOracalInputs'] = [];
        }

        $isChecked = in_array($materialKey, (array)($this->busCost[$index]['busOracalHeightWidth'] ?? []));

        if ($isChecked) {
            if (!in_array($materialKey, $this->busCost[$index]['showGeneralInputs'])) {
                $this->busCost[$index]['showGeneralInputs'][] = $materialKey;
            }
        } else {
            $this->busCost[$index]['showGeneralInputs'] = array_values(array_diff(
                $this->busCost[$index]['showGeneralInputs'],
                [$materialKey]
            ));
            unset($this->busCost[$index]['busOracalInputs'][$materialKey]);
        }
    }




    public function toggleBusLightingInput($index, $lightingType)
    {
        $selectedTypes = (array)($this->busCost[$index]['busLightingType'] ?? []);

        if (in_array($lightingType, $selectedTypes)) {
            if (!isset($this->busCost[$index]['showLightingInputs'])) {
                $this->busCost[$index]['showLightingInputs'] = [];
            }
            if (!in_array($lightingType, $this->busCost[$index]['showLightingInputs'])) {
                $this->busCost[$index]['showLightingInputs'][] = $lightingType;
            }
        } else {
            $this->busCost[$index]['showLightingInputs'] = array_diff(
                $this->busCost[$index]['showLightingInputs'] ?? [],
                [$lightingType]
            );
            unset($this->busCost[$index]['busLightingInputs'][$lightingType]);
        }
    }



    // Owner Cost

    public function toggleOwnAcrylicInput($index, $size)
    {
        $selected = (array)($this->ownCost[$index]['ownMaterials'] ?? []);

        if (in_array("acrylic{$size}mm", $selected)) {
            $this->ownCost[$index]['showAcrylicInput'] = $size;
        } else {
            $this->ownCost[$index]['showAcrylicInput'] = null;
        }
    }



    public function toggleOwnBlackAcrylicInput($index, $size)
    {
        $selected = $this->ownCost[$index]['ownMaterials'] ?? [];

        if (in_array("black_acrylic{$size}mm", $selected)) {
            $this->ownCost[$index]['showBlackAcrylicInput'][] = $size;
        } else {
            $this->ownCost[$index]['showBlackAcrylicInput'] = array_diff(
                $this->ownCost[$index]['showBlackAcrylicInput'] ?? [],
                [$size]
            );
            unset($this->ownCost[$index]['blackAcrylicInputs']);
        }
    }

    public function toggleOwnPVCInput($index, $size)
    {
        $selected = $this->ownCost[$index]['ownMaterials'] ?? [];

        if (in_array("pvc{$size}mm", $selected)) {
            if (!isset($this->ownCost[$index]['showPVCInput'])) {
                $this->ownCost[$index]['showPVCInput'] = [];
            }
            if (!in_array($size, $this->ownCost[$index]['showPVCInput'])) {
                $this->ownCost[$index]['showPVCInput'][] = $size;
            }
        } else {
            $this->ownCost[$index]['showPVCInput'] = array_diff(
                $this->ownCost[$index]['showPVCInput'] ?? [],
                [$size]
            );
            unset($this->ownCost[$index]['pvcInputs']);
        }
    }


    public function toggleOwnStainlessSteelInput($index, $key)
    {
        // Make sure the 'showInputs' array exists
        if (!isset($this->ownCost[$index]['showInputs']) || !is_array($this->ownCost[$index]['showInputs'])) {
            $this->ownCost[$index]['showInputs'] = [];
        }

        if (
            isset($this->ownCost[$index]['ownMaterials']) &&
            in_array($key, $this->ownCost[$index]['ownMaterials'])
        ) {
            // Add the key if it's not already there
            if (!in_array($key, $this->ownCost[$index]['showInputs'])) {
                $this->ownCost[$index]['showInputs'][] = $key;
            }
        } else {
            // Remove the key
            $this->ownCost[$index]['showInputs'] = array_filter(
                $this->ownCost[$index]['showInputs'],
                fn($k) => $k !== $key
            );
            $this->ownCost[$index]['showInputs'] = array_values($this->ownCost[$index]['showInputs']);
        }
    }




    public function toggleOwnStainlessgoldInput($index, $key)
    {
        if (
            isset($this->ownCost[$index]['ownMaterials']) &&
            in_array($key, $this->ownCost[$index]['ownMaterials'])
        ) {

            // Add the key to showInputs so input box appears
            $this->ownCost[$index]['showInputs'][] = $key;
            $this->ownCost[$index]['showInputs'] = array_unique($this->ownCost[$index]['showInputs']);
        } else {
            // Remove the key so input box disappears
            if (!empty($this->ownCost[$index]['showInputs'])) {
                $this->ownCost[$index]['showInputs'] = array_filter(
                    $this->ownCost[$index]['showInputs'],
                    fn($k) => $k !== $key
                );
                $this->ownCost[$index]['showInputs'] = array_values($this->ownCost[$index]['showInputs']);
            }
        }
    }


    public function toggleOwnNeonInput($index, $materialKey)
    {
        $selectedLists = [
            'ownMaterials',
            'stickerMaterial',
            'generalMaterial',
            'others'
        ];

        $selected = null;
        foreach ($selectedLists as $list) {
            if (!empty($this->ownCost[$index][$list]) && in_array($materialKey, $this->ownCost[$index][$list])) {
                $selected = $this->ownCost[$index][$list];
                break;
            }
        }

        if ($selected && in_array($materialKey, $selected)) {
            if (!isset($this->ownCost[$index]['showInputs'])) {
                $this->ownCost[$index]['showInputs'] = [];
            }
            if (!in_array($materialKey, $this->ownCost[$index]['showInputs'])) {
                $this->ownCost[$index]['showInputs'][] = $materialKey;
            }
        } else {
            $this->ownCost[$index]['showInputs'] = array_diff(
                $this->ownCost[$index]['showInputs'] ?? [],
                [$materialKey]
            );
            unset($this->ownCost[$index]['NeonmaterialInputs'][$materialKey]);
        }
    }



    public function toggleOwnStickerInput($index, $materialKey)
    {
        $selected = array_merge(
            $this->ownCost[$index]['addMaterials'] ?? [],
            $this->ownCost[$index]['stickerMaterial'] ?? []
        );

        if (in_array($materialKey, $selected)) {
            if (!isset($this->ownCost[$index]['showInputs'])) {
                $this->ownCost[$index]['showInputs'] = [];
            }
            if (!in_array($materialKey, $this->ownCost[$index]['showInputs'])) {
                $this->ownCost[$index]['showInputs'][] = $materialKey;
            }
        } else {
            $this->ownCost[$index]['showInputs'] = array_diff(
                $this->ownCost[$index]['showInputs'] ?? [],
                [$materialKey]
            );
            unset($this->addCost[$index]['stickermaterialInputs'][$materialKey]);
        }
    }

    public function toggleOwnGeneralMaterialInput($index, $materialKey)
    {
        $selected = $this->ownCost[$index]['generalMaterial'] ?? [];

        if (in_array($materialKey, $selected)) {
            if (!isset($this->ownCost[$index]['showGeneralInputs'])) {
                $this->ownCost[$index]['showGeneralInputs'] = [];
            }
            if (!in_array($materialKey, $this->ownCost[$index]['showGeneralInputs'])) {
                $this->ownCost[$index]['showGeneralInputs'][] = $materialKey;
            }
        } else {
            $this->ownCost[$index]['showGeneralInputs'] = array_diff(
                $this->ownCost[$index]['showGeneralInputs'] ?? [],
                [$materialKey]
            );
            unset($this->ownCost[$index]['generalMaterialInputs'][$materialKey]);
        }
    }



    public function toggleOwnPaintInput($index, $materialKey)
    {
        if (!isset($this->ownCost[$index]['showGeneralInputs'])) {
            $this->ownCost[$index]['showGeneralInputs'] = [];
        }

        if (!empty($this->ownCost[$index]['ownPaintHeightWidth'])) {
            if (!in_array($materialKey, $this->ownCost[$index]['showGeneralInputs'])) {
                $this->ownCost[$index]['showGeneralInputs'][] = $materialKey;
            }
        } else {
            $this->ownCost[$index]['showGeneralInputs'] = array_diff(
                $this->ownCost[$index]['showGeneralInputs'],
                [$materialKey]
            );
            unset($this->ownCost[$index]['ownPaintInputs']);
        }
    }




    public function toggleOwnOracalMaterialInput($index, $materialKey)
    {
        if (!isset($this->ownCost[$index]['showGeneralInputs'])) {
            $this->ownCost[$index]['showGeneralInputs'] = [];
        }
        if (!isset($this->ownCost[$index]['ownOracalInputs'])) {
            $this->ownCost[$index]['ownOracalInputs'] = [];
        }

        $isChecked = in_array($materialKey, (array)($this->ownCost[$index]['ownoracalHeightWidth'] ?? []));

        if ($isChecked) {
            if (!in_array($materialKey, $this->ownCost[$index]['showGeneralInputs'])) {
                $this->ownCost[$index]['showGeneralInputs'][] = $materialKey;
            }
        } else {
            $this->ownCost[$index]['showGeneralInputs'] = array_values(array_diff(
                $this->ownCost[$index]['showGeneralInputs'],
                [$materialKey]
            ));
            unset($this->ownCost[$index]['ownOracalInputs'][$materialKey]);
        }
    }




    public function toggleownLightingInput($index, $lightingType)
    {
        $selectedTypes = (array)($this->ownCost[$index]['ownLightingType'] ?? []);

        if (in_array($lightingType, $selectedTypes)) {
            if (!isset($this->ownCost[$index]['showLightingInputs'])) {
                $this->ownCost[$index]['showLightingInputs'] = [];
            }
            if (!in_array($lightingType, $this->ownCost[$index]['showLightingInputs'])) {
                $this->ownCost[$index]['showLightingInputs'][] = $lightingType;
            }
        } else {
            $this->ownCost[$index]['showLightingInputs'] = array_diff(
                $this->ownCost[$index]['showLightingInputs'] ?? [],
                [$lightingType]
            );
            unset($this->ownCost[$index]['ownLightingInputs'][$lightingType]);
        }
    }




    public function render()
    {
        $this->characterCount = strlen($this->logoText);
        return view('livewire.view-calculation');
    }
}
