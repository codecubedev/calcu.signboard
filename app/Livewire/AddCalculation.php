<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Calculation;
use App\Models\BaseCalculation;
use App\Models\LogoCalculation;
use App\Models\MainCalculation;
use App\Models\BusinessCalculation;
use App\Models\OwnershipCalculation;
use Illuminate\Support\Facades\Auth;
use App\Services\LogoCostCalculation;
use App\Services\MainLogoCostCalculation;
use App\Services\AddLetteringCost;
use App\Services\BusinessCost;
use App\Services\OwnerstickerCost;
use Livewire\WithFileUploads;

class AddCalculation extends Component
{

    use WithFileUploads;


    // General Info
    public $job_name, $date, $salesperson, $company_name, $customer_name, $customer_phone_no, $qt_inv_number, $remark;
    // Image Upload
    public $image = [];

    // Base Cost

    public $baseType, $baseMember, $baseHeight, $baseWidth, $baseCost = 0;


    // Logo Cost


    public $logoText, $logoHeight, $logoWidth, $logoAcrylicSize = '', $logoAcrylicCost = '', $logoBlackAcrylicSize, $logoBlackAcrylicCost, $logoPvcSize, $logoPVCCost;

    // Stainless Steel Silver
    public $logoStainlessSteelSilverType, $logoStainlessSteelCost, $logoStainlessSteelGoldType, $logoStainlessGoldCost, $logoNeonSize, $logoNeonCost;

    // Sticker
    public $logoStickerType, $logoStickerCost, $logoGeneralStickerType, $logoGeneralMaterialCost, $logoPaint = false, $logoPaintCost, $logoOracal = false, $logoOracalCost, $logoLighting = false, $logoLightingType, $logoLightingCost, $logoPowerSupply, $logoPowerSupplyQuantity;

    public $logoPowerSupplyCost, $logoPaintHeightWidth, $logoOracalHeightWidth, $logoLightHeightWidth, $logoLightingPrice;

    public  $logoTotal = 0;
    public $logoCost = [];

    // Main Cost

    public $mainText, $mainHeight, $mainWidth, $mainAcrylicSize = '', $mainAcrylicCost = '', $mainBlackAcrylicSize, $mainBlackAcrylicCost, $mainPvcSize, $mainPVCCost;

    // Stainless Steel Silver
    public $mainStainlessSteelSilverType, $mainStainlessSteelCost, $mainStainlessSteelGoldType, $mainStainlessGoldCost, $mainNeonSize, $mainNeonCost;

    // Sticker
    public $mainStickerType, $mainStickerCost, $mainGeneralStickerType, $mainGeneralMaterialCost, $mainPaint = false, $mainPaintCost, $mainOracal = false, $mainOracalCost, $mainLighting = false, $mainLightingType, $mainLightingCost, $mainPowerSupply, $mainPowerSupplyQuantity;
    public $mainPowerSupplyCost, $mainPaintHeightWidth, $mainOracalHeightWidth, $mainLightHeightWidth, $mainLightingPrice;


    public $mainIronHollow10mm, $mainIronHollow10mmCost, $mainIronHollow20mm, $mainIronHollow20mmCost, $mainSpotlight, $mainSpotlightCost, $mainDimmer, $mainDimmerCost;
    public $mainTotal = 0;
    public $mainCost = [];


    //Businness cost


    public $busText, $busHeight, $busWidth, $busAcrylicSize = '', $busAcrylicCost = '', $busBlackAcrylicSize, $busBlackAcrylicCost, $busPvcSize, $busPVCCost;

    // Stainless Steel Silver
    public $busStainlessSteelSilverType, $busStainlessSteelCost, $busStainlessSteelGoldType, $busStainlessGoldCost, $busNeonSize, $busNeonCost;

    // Sticker
    public $busStickerType, $busStickerCost, $busGeneralStickerType, $busGeneralMaterialCost, $busPaint = false, $busPaintCost, $busOracal = false, $busOracalCost, $busLighting = false, $busLightingType, $busLightingCost, $busPowerSupply, $busPowerSupplyQuantity;
    public $busPowerSupplyCost, $busPaintHeightWidth, $busOracalHeightWidth, $busLightHeightWidth, $busLightingPrice;

    public $busIronHollow10mm, $busIronHollow10mmCost, $busIronHollow20mm, $busIronHollow20mmCost, $busSpotlight, $busSpotlightCost, $busDimmer, $busDimmerCost;
    public  $busTotal = 0;
    public $busCost = [];

    //Addional Cost

    public $addText, $addHeight, $addWidth, $addAcrylicSize = '', $addAcrylicCost = '', $addBlackAcrylicSize, $addBlackAcrylicCost, $addPvcSize, $addPVCCost;

    // Stainless Steel Silver
    public $addStainlessSteelSilverType, $addStainlessSteelCost, $addStainlessSteelGoldType, $addStainlessGoldCost, $addNeonSize, $addNeonCost;

    // Sticker
    public $addStickerType, $addStickerCost, $addGeneralStickerType, $addGeneralMaterialCost, $addPaint = false, $addPaintCost, $addOracal = false, $addOracalCost, $addLighting = false, $addLightingType, $addLightingCost, $addPowerSupply, $addPowerSupplyQuantity;
    public $addPowerSupplyCost, $addPaintHeightWidth, $addOracalHeightWidth, $addLightHeightWidth, $addLightingPrice;

    public $addIronHollow10mm, $addIronHollow10mmCost, $addIronHollow20mm, $addIronHollow20mmCost, $addSpotlight, $addSpotlightCost, $addDimmer, $addDimmerCost;

    public $addTotal = 0;
    public $addCost = [];
    // Owner ship cost


    public $ownText, $ownHeight, $ownWidth, $ownAcrylicSize = '', $ownAcrylicCost = '', $ownBlackAcrylicSize, $ownBlackAcrylicCost, $ownPvcSize, $ownPVCCost;

    // Stainless Steel Silver
    public $ownStainlessSteelSilverType, $ownStainlessSteelCost, $ownStainlessSteelGoldType, $ownStainlessGoldCost, $ownNeonSize, $ownNeonCost;

    // Sticker
    public $ownStickerType, $ownStickerCost, $ownGeneralStickerType, $ownGeneralMaterialCost, $ownPaint = false, $ownPaintCost, $ownOracal = false, $ownOracalCost, $ownLighting = false, $ownLightingType, $ownLightingCost, $ownPowerSupply, $ownPowerSupplyQuantity;
    public $ownPowerSupplyCost, $ownPaintHeightWidth, $ownOracalHeightWidth, $ownLightHeightWidth, $ownLightingPrice;

    public $ownIronHollow10mm, $ownIronHollow10mmCost, $ownIronHollow20mm, $ownIronHollow20mmCost, $ownSpotlight, $ownSpotlightCost, $ownDimmer, $ownDimmerCost;

    public $ownTotal = 0;
    public $ownCost = [];

    public $maincharacterCount;
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






    public function updatedLogoCost($value, $key)
    {
        if (preg_match('/^(\d+)\.logoText$/', $key, $matches)) {
            $index = $matches[1];
            $this->logoCost[$index]['characterCount'] = strlen($value);
        }
    }



    public function addForm()
    {
        $this->logoCost[] = [
            'logoText' => '',
            'characterCount' => 0,
            'logoHeight' => '',
            'logoWidth' => '',

            // Materials
            'logoMaterials' => [],
            'acrylicInput' => 0,
            'blackAcrylicInputs' => 0,
            'pvcInputs' => 0,
            'stainlessteelsilverInputs' => 0,
            'stainlessteelgoldInputs' => 0,
            'NeonmaterialInputs' => 0,

            // Sticker
            'logoStickerHeightWidth' => false,
            'stickerMaterial' => [],
            'stickermaterialInputs' => 0,
            'logoStickerCost' => 0,

            // General
            'generalMaterial' => [],
            'generalMaterialInput' => 0,
            'logoGeneralMaterialCost' => 0,

            // Others
            'logoPaintHeightWidth' => false,
            'logoPaintInputs' => null,
            'logoPaintCost' => 0,
            'logooracalHeightWidth' => false,
            'logoOracalInputs' => null,
            'logoOracalCost' => 0,

            // Lighting
            'logolightHeightWidth' => false,
            'lightingtype' => [],   // ✅ consistent with Blade
            'logoLightingDetails' => 0,
            'logoLightingCost' => 0,
            'logoLightingPrice' => 0,

            // Power
            'logoPowerSupply' => '400W',
            'logoPowerSupplyQuantity' => 0,
            'logoPowerSupplyCost' => 0,

            // Cost fields
            'logoAcrylicCost' => 0,
            'logoPVCCost' => 0,

            // Final
            'total_logo_cost' => 0,
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

        if (preg_match('/^busCost\.(\d+)\.busText$/', $property, $matches)) {
            $index = $matches[1];
            $this->busCost[$index]['characterCount'] = strlen($value);
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








    // calculation`
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
        $this->logoAcrylicCost = 0;
        $this->logoPVCCost = 0;

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

    // Save to DB

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
            'qt_inv_number' => 'required',
            'remark' => 'required',
            'image' => 'required|array',
            'image.*' => 'image|max:1024',



        ]);

        $imagePath = [];
        if ($this->image) {
            foreach ($this->image as $img) {
                $imagePath[] = $img->store('uploads', 'public');
            }
        }

        // $imagePath = $this->image ? $this->image->store('uploads', 'public') : null;


        $calculation = Calculation::create([
            'job_name' => $this->job_name,
            'date' => $this->date,
            // 'sales_man' => Auth::user()->name,
            'login_type' => Auth::user()->login_type,
            'customer_name' => $this->customer_name,
            'company_name' => $this->company_name,
            'customer_phone_no' => $this->customer_phone_no,
            'salesperson' => $this->salesperson,
            'qt_inv_number' => $this->qt_inv_number,
            'remark' => $this->remark,
            'image' => $imagePath,
            'total_base_cost' => $this->baseCost,
            'total_logo_cost' => $this->logoTotal,
            'total_main_cost' => $this->mainTotal,
            'total_add_cost' => $this->addTotal,
            'total_business_cost' => $this->busTotal,
            'total_ownership_cost' => $this->ownTotal,
            'total_cost' => $this->baseCost + $this->logoTotal + $this->mainTotal + $this->addTotal + $this->busTotal + $this->ownTotal,




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

                // Numeric fields (cast to float or int)
                'logo_height' => (float) ($logo['logoHeight'] ?? 0),
                'logo_width'  => (float) ($logo['logoWidth'] ?? 0),

                'logo_power_supply_quantity' => (int) ($logo['logoPowerSupplyQuantity'] ?? 0),

                'logo_acrylic_cost'          => (float) ($logo['logoAcrylicCost'] ?? 0),
                'logo_black_acrylic_cost'          => (float) ($logo['logoBlackAcrylicCost'] ?? 0),
                'logo_pvc_cost'              => (float) ($logo['logoPVCCost'] ?? 0),
                'logo_stainless_steel_cost' => (float) ($logo['logoStainlessSteelCost'] ?? 0),
                'logo_stainless_gold_cost' => (float) ($logo['logoStainlessGoldCost'] ?? 0),
                'logo_neon_cost' => (float) ($logo['logoNeonCost'] ?? 0),
                'logo_sticker_cost'          => (float) ($logo['logoStickerCost'] ?? 0),
                'logo_lighting_cost'         => (float) ($logo['logoLightingCost'] ?? 0),
                'logo_power_supply_cost'     => (float) ($logo['logoPowerSupplyCost'] ?? 0),
                'logo_paint_cost'            => (float) ($logo['logoPaintCost'] ?? 0),
                'logo_general_material_cost' => (float) ($logo['logoGeneralMaterialCost'] ?? 0),
                'logo_lighting_price'        => (float) ($logo['logoLightingPrice'] ?? 0),
                'logo_oracal_cost'           => (float) ($logo['logoOracalCost'] ?? 0),
                'total_logo_cost'            => (float) ($this->logoCostResults["LogoCost " . ($index + 1)] ?? 0),

                // String / text fields
                'logo_materials'            => !empty($logo['logoMaterials']) ? implode(',', $logo['logoMaterials']) : null,
                'logo_sticker_height_width' => !empty($logo['logoStickerHeightWidth']) ? 'yes' : null,
                'logo_sticker_material'     => !empty($logo['stickerMaterial']) ? implode(',', $logo['stickerMaterial']) : null,
                'logo_general_material'     => !empty($logo['generalMaterial']) ? implode(',', $logo['generalMaterial']) : null,
                'logo_paint_height_width'   => !empty($logo['logoPaintHeightWidth']) ? 'yes' : null,
                'logo_oracal_height_width'  => !empty($logo['logooracalHeightWidth']) ? 'yes' : null,
                'logo_light_height_width'   => !empty($logo['logolightHeightWidth']) ? 'yes' : null,
                'logo_lighting_type'        => !empty($logo['lightingtype']) ? implode(',', $logo['lightingtype']) : null,
                'logo_power_supply'         => $logo['logoPowerSupply'] ?? null,
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
                // 'business_height' => $bus['busHeight'] ?? 0,
                // 'business_width' => $bus['busWidth'] ?? 0,

                'business_height' => !empty($bus['businessHeight']) ? (float) $bus['businessHeight'] : 0,
                'business_width' => !empty($bus['businessWidth']) ? (float) $bus['businessWidth'] : 0,

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
        return view('livewire.add-calculation');
    }
}
