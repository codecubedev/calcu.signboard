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

class ViewCalculation extends Component
{
    public $job_name, $date, $sales_man, $totalcost, $company_name, $customer_name, $customer_phone_no;
    public $logoText, $characterCount, $baseType, $baseMember, $baseHeight, $baseWidth, $baseCost = 0;

    public $logoHeight, $logoWidth, $logoTotal = 0, $logoStickerHeightWidth, $logooracalHeightWidth, $acrylicCost, $pvcCost;
    public  $stickerCost, $lightingCost, $powerSupplyCost, $paintCost, $generalMaterialCost, $stickerArea, $addwhiteacryliccost, $lightingprice, $orcaleCost;
    public $logoLightingTypes;
    public $logolightHeightWidth = [], $logoPowerSupply, $logoPowerSupplyQuantity = 1;
    public $logoPcs = 1, $logoPaintHeightWidth, $logoStickerHeight, $logoStickerWidth, $logoLightingWidth, $logoLightingHeight;
    public $logoMaterials = [], $stickerMaterial = [], $generalMaterial = [];
    public $logoLightingType = [];
    public $aluminium_channel_border = [];

    public $logoCost = [];


    public $mainText = '', $mainHeight, $mainTotal = 0, $mainWidth, $mainStickerHeightWidth, $mainoracalHeightWidth, $mainacrylicCost, $mainpvcCost;
    public  $mainstickerCost, $mainlightingCost, $mainpowerSupplyCost, $mainpaintCost, $maingeneralMaterialCost, $mainlightingprice, $mainorcaleCost;
    //main

    public $mainLightingTypes;
    public $mainlightHeightWidth, $mainPowerSupply, $mainPowerSupplyQuantity = 1;
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
    public $addlightHeightWidth, $addPowerSupply, $addPowerSupplyQuantity = 1;
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
    public $buslightHeightWidth, $busPowerSupply, $busPowerSupplyQuantity = 1;
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
    public $ownlightHeightWidth, $ownPowerSupply, $ownPowerSupplyQuantity = 1;
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
                return ($height < 36 && $width < 36) ? ($height * $width * 0.38) : (500 * $pcs * 2.5);
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
                // return $height * $width * 0.40;
                return $height * $width * 4.0;

            case "aluminiumBoxUp":
                // return ($height < 36 && $width < 36) ? ($height * $width * 0.38) : (500 * $pcs * 2.5);
                return ($height *  $pcs * 5.5);

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
                return ($height < 36 && $width < 36) ? ($height * $width * 0.38) : (500 * $pcs * 2.5);
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
                return ($height < 36 && $width < 36) ? ($height * $width * 0.38) : (500 * $pcs * 2.5);
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
                return ($height < 36 && $width < 36) ? ($height * $width * 0.38) : (500 * $pcs * 2.5);
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
        "acrylic5mm" => 0.35,
        "acrylic10mm" => 0.55,
        "acrylic15mm" => 0.85,
        "acrylic20mm" => 1.15,
        "acrylic25mm" => 1.85,
        "whiteacrylic3mm" => 0.30,
        "pvc3mm" => 0.11,
        "pvc5mm" => 0.15,
        "pvc10mm" => 0.24,
        "pvc15mm" => 0.41,
        "pvc20mm" => 0.48,
        "pvc25mm" => 0.65
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
        "frontlit" => 80,
        "backlit" => 100,
        "sidelit" => 150,
        "nolight" => 150

    ];



    public function mount()
    {
        $this->logoCost[] = [
            'logoText' => '',
            'characterCount' => 0,
            'logoHeight' => '',
            'logoWidth' => '',
            'logoMaterials' => [],
            'materialPrices' => [],
            'stickerMaterial' => [],
            'stickerPrices' => [],
            'logoStickerHeightWidth' => false,
            'logolightHeightWidth' => false,
            'logoLightingType' => [],
            'logoPowerSupply' => 'None',
            'logoPowerSupplyQuantity' => 1,
            'logoPaintHeightWidth' => false,
            'logooracalHeightWidth' => false,
            'generalMaterial' => [],
            'logoPcs' => 1,
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
            'mainPowerSupply' => 'None',
            'mainPowerSupplyQuantity' => 1,
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
            'addPowerSupply' => 'None',
            'addPowerSupplyQuantity' => 1,
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
            'busPowerSupply' => 'None',
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
            'ownPowerSupply' => 'None',
            'ownPowerSupplyQuantity' => 1,
            'ownPcs' => 1,
        ];
    }

    public function updatedLogoCost($value, $key)
    {
        // Matches "0.logoText", "1.logoText", etc.
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
            'logoMaterials' => [],
            'stickerMaterial' => [],
            'logoStickerHeightWidth' => false,
            'generalMaterial' => [],
            'logoPaintHeightWidth' => false,
            'logooracalHeightWidth' => false,
            'logolightHeightWidth' => false,
            'logoLightingType' => [],
            'logoPowerSupply' => 'None',
            'logoPowerSupplyQuantity' => 1,
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
            'mainPowerSupply' => 'None',
            'mainPowerSupplyQuantity' => 1,
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
            'addPowerSupply' => 'None',
            'addPowerSupplyQuantity' => 1,
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
            'busPowerSupply' => 'None',
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
            'ownPowerSupply' => 'None',
            'ownPowerSupplyQuantity' => 1,
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

        $this->validate([
            'job_name' => 'required',
            'date' => 'required',
            // 'sales_man'=>'required',
        ]);

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
        $lightingtype = [
            "frontlit" => 80,
            "backlit" => 100,
            "sidelit" => 150,
            "nolight" => 150

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
                'powerSupply' => $form['mainPowerSupply'] ?? 'None',
                'powerSupplyQty' => $form['mainPowerSupplyQuantity'],
                'powerSupplyPrices' => $this->powerSupplyPrices,
                'usePaint' => $form['mainPaintHeightWidth'] ?? false,
                'useOrcale' => $form['mainoracalHeightWidth'] ?? false,
                'generalMaterials' => $form['generalMaterial'] ?? [],
                'generalMaterialCostFunction' => [$this, 'getGeneralMaterialCost'],
                'lightingTypes' => $form['mainLightingType'] ?? [],
                'lightingTypePrices' => $this->lightingtype,
                'pcs' => $form['logoPcs'] ?? 1,
            ]);

            $this->mainCostResults["MainCost " . ($index + 1)] = round($cost, 2);
            $this->mainTotal = array_sum($this->mainCostResults);
        }


        // // add
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
            ]);

            $this->addCostResults["Addittional Cost " . ($index + 1)] = round($cost, 2);
            $this->addTotal = array_sum($this->addCostResults);
        }


        // // business
        $buscalculator = new BusinessCost;
        $this->busCostResults = [];

        foreach ($this->busCost as $index => $form) {
            $cost = $buscalculator->buscalculate([
                'height' => $form['busHeight'] ?? 0,
                'width' => $form['busWidth'] ?? 0,
                'materials' => $form['busMaterials'] ?? [],
                'materialPrices' => $this->materialPrices,
                'stickers' => $form['stickerMaterial'] ?? [],
                'stickerPrices' => $this->stickerPrices,
                'useSticker' => $form['busStickerHeightWidth'] ?? false,
                'useLighting' => $form['buslightHeightWidth'] ?? false,
                'powerSupply' => $form['busPowerSupply'] ?? 'None',
                'powerSupplyQty' => $form['busPowerSupplyQuantity'],
                'powerSupplyPrices' => $this->powerSupplyPrices,
                'usePaint' => $form['busPaintHeightWidth'] ?? false,
                'useOrcale' => $form['busoracalHeightWidth'] ?? false,
                'generalMaterials' => $form['generalMaterial'] ?? [],
                'generalMaterialCostFunction' => [$this, 'getGeneralMaterialCost'],
                'lightingTypes' => $form['lightingtype'] ?? [],
                'lightingTypePrices' => $this->lightingtype,
                'pcs' => $form['busPcs'] ?? 1,
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

        ]);


        $calculation = Calculation::create([
            'job_name' => $this->job_name,
            'date' => $this->date,
            'sales_man' => Auth::user()->name,
            'login_type' => Auth::user()->login_type,
            'customer_name' => $this->customer_name,
            'company_name' => $this->company_name,
            'customer_phone_no' => $this->customer_phone_no,
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
                'ownership_materials' => implode(',', $own['ownMaterials'] ?? []),
                'ownership_sticker_height_width' => $own['ownStickerHeightWidth'] ? 'yes' : null,
                'ownership_sticker_material' => implode(',', $own['stickerMaterial'] ?? []),
                'ownership_general_material' => implode(',', $own['generalMaterial'] ?? []),
                'ownership_paint_height_width' => $own['ownPaintHeightWidth'] ? 'yes' : null,
                'ownership_oracal_height_width' => $own['ownoracalHeightWidth'] ? 'yes' : null,
                'ownership_light_height_width' => $own['ownlightHeightWidth'] ? 'yes' : null,
                'ownership_lighting_type' => implode(',', $own['lightingtype'] ?? []),
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



    public function render()
    {
        $this->characterCount = strlen($this->logoText);
        return view('livewire.view-calculation');
    }
}
