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
use App\Services\ownerCostResults;

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
    public $addHeight, $addWidth, $addStickerHeightWidth, $addoracalHeightWidth;
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

    public $busHeight, $busWidth, $busStickerHeightWidth, $busoracalHeightWidth;
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
    public  $ownstickerCost, $ownlightingCost, $ownpowerSupplyCost, $ownpaintCost, $owngeneralMaterialCost, $ownlightingprice, $ownorcaleCost;

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
            'mainStickerHeightWidth' => false,
            'stickerMaterial' => [],
            'generalMaterial' => [],
            'mainPaintHeightWidth' => false,
            'mainoracalHeightWidth' => false,
            'mainlightHeightWidth' => false,
            'mainLightingType' => [],
            'mainPowerSupply' => 'None',
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
            'addPowerSupply' => 'None',
            'mainPowerSupplyQuantity' => 0,
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
            'mainPowerSupplyQuantity' => 0,
            'mainPcs' => 1,
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
            'ownPowerSupplyQuantity' => 0,
            'ownPcs' => 1,
        ];
    }

    public function updatedLogoCost($value, $key)
    {
        // Extract index and field name from $key
        [$index, $field] = explode('.', $key);

        // Update character count when logoText changes
        if ($field === 'logoText') {
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
            'logoMaterials' => [],
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
        // Matches "0.mainText", "1.mainText", etc.
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
            'logoMaterials' => [],
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

    public function updatedaddCost($value, $name)
    {
        if (str_ends_with($name, 'logoText')) {
            preg_match('/(\d+)/', $name, $matches);
            $index = $matches[0] ?? null;
            if (isset($index) && isset($this->addCost[$index]['logoText'])) {
                $this->addCost[$index]['characterCount'] = strlen($this->addCost[$index]['logoText']);
            }
        }
    }


    public function addremoveForm($index)
    {
        unset($this->addCost[$index]);
        $this->addCost = array_values($this->addCost); // Reindex
    }


    public function busForm()
    {
        $this->busCost[] = [
            'busText' => '',
            'characterCount' => 0,
            'busHeight' => '',
            'busWidth' => '',
            'logoMaterials' => [],
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

    public function updatedbusCost($value, $name)
    {
        if (str_ends_with($name, 'logoText')) {
            preg_match('/(\d+)/', $name, $matches);
            $index = $matches[0] ?? null;
            if (isset($index) && isset($this->busCost[$index]['logoText'])) {
                $this->busCost[$index]['characterCount'] = strlen($this->busCost[$index]['logoText']);
            }
        }
    }


    public function busremoveForm($index)
    {
        unset($this->busCost[$index]);
        $this->busCost = array_values($this->busCost); // Reindex
    }


    public function ownerForm()
    {
        $this->ownCost[] = [
            'ownText' => '',
            'characterCount' => 0,
            'ownHeight' => '',
            'ownWidth' => '',
            'logoMaterials' => [],
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

    public function updatedownerCost($value, $name)
    {
        if (str_ends_with($name, 'logoText')) {
            preg_match('/(\d+)/', $name, $matches);
            $index = $matches[0] ?? null;
            if (isset($index) && isset($this->ownCost[$index]['logoText'])) {
                $this->ownCost[$index]['characterCount'] = strlen($this->ownCost[$index]['logoText']);
            }
        }
    }


    public function ownerremoveForm($index)
    {
        unset($this->ownCost[$index]);
        $this->ownCost = array_values($this->ownCost); // Reindex
    }



    public function calculateBaseCost()
    {
        $this->isCalculated = true;

        // $this->validate([
        //     'job_name' => 'required',
        //     'date' => 'required',
        //     // 'sales_man'=>'required',
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

            $this->logoCostResults["Logo Cost " . ($index + 1)] = round($cost, 2);
            $this->logoTotal = array_sum($this->logoCostResults);
        }

        // main cost

        $maincalculator = new MainLogoCostCalculation;
        $this->mainCostResults = [];

        foreach ($this->mainCost as $index => $form) {
            $cost = $maincalculator->Maincalculate([
                'height' => $form['mainHeight'] ?? 0,
                'width' => $form['mainWidth'] ?? 0,
                'materials' => $form['mainMaterials'] ?? [],
                'materialPrices' => $this->materialPrices,
                'stickers' => $form['stickerMaterial'] ?? [],
                'stickerPrices' => $this->stickerPrices,
                'useSticker' => $form['mainStickerHeightWidth'] ?? false, // ✅ Fixed key
                'useLighting' => $form['mainlightHeightWidth'] ?? false,
                'powerSupply' => $form['mainPowerSupply'] ?? 'None',
                'powerSupplyQty' => $form['mainPowerSupplyQuantity'] ?? 0,
                'powerSupplyPrices' => $this->powerSupplyPrices,
                'usePaint' => $form['mainPaintHeightWidth'] ?? false,
                'useOrcale' => $form['mainoracalHeightWidth'] ?? false,
                'generalMaterials' => $form['generalMaterial'] ?? [],
                'generalMaterialCostFunction' => [$this, 'getGeneralMaterialCost'],
                'lightingTypes' => $form['mainLightingType'] ?? [],
                'lightingTypePrices' => $this->lightingtype,
                'pcs' => $form['logoPcs'] ?? 1,
            ]);

            $this->mainCostResults["Main Cost " . ($index + 1)] = round($cost, 2);
            $this->mainTotal = array_sum($this->mainCostResults);
        }


        // // add
        // $addcalculator = new AddLetteringCost;
        // $this->addCostResults = [];

        // foreach ($this->addCost as $index => $form) {
        //     $cost = $addcalculator->addcalculate([
        //         'height' => $form['addHeight'],
        //         'width' => $form['addWidth'],
        //         'materials' => $form['addMaterials'],
        //         'materialPrices' => $this->materialPrices,
        //         'stickers' => $form['stickerMaterial'],
        //         'stickerPrices' => $this->stickerPrices,
        //         'useSticker' => $form['addStickerHeightWidth'],
        //         'useLighting' => $form['addlightHeightWidth'],
        //         'powerSupply' => $form['addPowerSupply'],
        //         'powerSupplyQty' => $form['addPowerSupplyQuantity'],
        //         'powerSupplyPrices' => $this->powerSupplyPrices,
        //         'usePaint' => $form['addPaintHeightWidth'],
        //         'useOrcale' => $form['addoracalHeightWidth'],
        //         'generalMaterials' => $form['generalMaterial'] ?? [],
        //         'generalMaterialCostFunction' => [$this, 'getGeneralMaterialCost'],
        //         'lightingTypes' => $form['lightingtype'] ?? [],
        //         'lightingTypePrices' => $this->lightingtype,
        //         'pcs' => $form['addPcs'] ?? 1,
        //     ]);

        //     $this->addCostResults["add Cost " . ($index + 1)] = round($cost, 2);
        // }

        // // business
        // $buscalculator = new BusinessCost;
        // $this->busCostResults = [];

        // foreach ($this->busCost as $index => $form) {
        //     $cost = $buscalculator->buscalculate([
        //         'height' => $form['busHeight'],
        //         'width' => $form['busWidth'],
        //         'materials' => $form['busMaterials'],
        //         'materialPrices' => $this->materialPrices,
        //         'stickers' => $form['stickerMaterial'],
        //         'stickerPrices' => $this->stickerPrices,
        //         'useSticker' => $form['busStickerHeightWidth'],
        //         'useLighting' => $form['buslightHeightWidth'],
        //         'powerSupply' => $form['busPowerSupply'],
        //         'powerSupplyQty' => $form['busPowerSupplyQuantity'],
        //         'powerSupplyPrices' => $this->powerSupplyPrices,
        //         'usePaint' => $form['busPaintHeightWidth'],
        //         'useOrcale' => $form['busoracalHeightWidth'],
        //         'generalMaterials' => $form['generalMaterial'] ?? [],
        //         'generalMaterialCostFunction' => [$this, 'getGeneralMaterialCost'],
        //         'lightingTypes' => $form['lightingtype'] ?? [],
        //         'lightingTypePrices' => $this->lightingtype,
        //         'pcs' => $form['busPcs'] ?? 1,
        //     ]);

        //     $this->busCostResults["bus Cost " . ($index + 1)] = round($cost, 2);
        // }

        // $owncalculator = new ownerCostResults;
        // $this->ownerCostResults = [];

        // foreach ($this->ownCost as $index => $form) {
        //     $cost = $owncalculator->owncalculate([
        //         'height' => $form['ownHeight'],
        //         'width' => $form['ownWidth'],
        //         'materials' => $form['ownMaterials'],
        //         'materialPrices' => $this->materialPrices,
        //         'stickers' => $form['stickerMaterial'],
        //         'stickerPrices' => $this->stickerPrices,
        //         'useSticker' => $form['ownStickerHeightWidth'],
        //         'useLighting' => $form['ownlightHeightWidth'],
        //         'powerSupply' => $form['ownPowerSupply'],
        //         'powerSupplyQty' => $form['ownPowerSupplyQuantity'],
        //         'powerSupplyPrices' => $this->powerSupplyPrices,
        //         'usePaint' => $form['ownPaintHeightWidth'],
        //         'useOrcale' => $form['ownoracalHeightWidth'],
        //         'generalMaterials' => $form['generalMaterial'] ?? [],
        //         'generalMaterialCostFunction' => [$this, 'getGeneralMaterialCost'],
        //         'lightingTypes' => $form['lightingtype'] ?? [],
        //         'lightingTypePrices' => $this->lightingtype,
        //         'pcs' => $form['ownPcs'] ?? 1,
        //     ]);

        //     $this->ownCostResults["own Cost " . ($index + 1)] = round($cost, 2);
        // }
    }
    public function saveDatabase()
    {
        if (!$this->isCalculated) {
            return;
        }
        $this->totalcost =  $this->baseCost + $this->logoCost + $this->mainCost +  $this->addCost + $this->busCost + $this->ownCost;

        // dd($this->totalcost);
        $calculation =  Calculation::create([
            'job_name' => $this->job_name,
            'date' => $this->date,
            'sales_man' => Auth::user()->name,
            'login_type' => Auth::user()->login_type,
            'customer_name' => $this->customer_name,
            'company_name' => $this->company_name,
            'customer_phone_no' => $this->customer_phone_no,
            'total_base_cost' => $this->baseCost,
            'total_logo_cost' => $this->logoCost,
            'total_main_cost' => $this->mainCost,
            'total_add_cost' => $this->addCost,
            'total_business_cost' => $this->busCost,
            'total_ownership_cost' => $this->ownCost,
            'total_cost' => $this->totalcost,

        ]);


        if ($this->baseType) {
            // dd($calculation->id);
            BaseCalculation::create([
                'calculation_id' => $calculation->id,
                'base_type' => $this->baseType,
                'base_member' => $this->baseMember,
                'base_height' => $this->baseHeight,
                'base_width' => $this->baseWidth,
                'total_base_cost' => $this->baseCost,

            ]);
        }
        if ($this->logoHeight) {
            LogoCalculation::create([
                'calculation_id' => $calculation->id,

                'logo_text' => $this->logoText,
                'logo_height' => $this->logoHeight,
                'logo_width' => $this->logoWidth,
                'logo_materials' => implode(',', $this->logoMaterials ?? []),
                'logo_sticker_height_width' => $this->logoStickerHeightWidth ? 'yes' : null,
                'logo_sticker_material' => implode(',', $this->stickerMaterial ?? []),
                'logo_general_material' => implode(',', $this->generalMaterial ?? []),
                'logo_paint_height_width' => $this->logoPaintHeightWidth ? 'yes' : null,
                'logo_oracal_height_width' => $this->logooracalHeightWidth ? 'yes' : null,
                'logo_light_height_width' => $this->logolightHeightWidth ? 'yes' : null,
                'logo_lighting_type' => implode(',', $this->logoLightingType ?? []),
                'logo_power_supply' => $this->logoPowerSupply,
                'logo_power_supply_quantity' => $this->logoPowerSupplyQuantity,

                'logo_acrylic_cost' => $this->acrylicCost,
                'logo_pvc_cost' => $this->pvcCost,
                'logo_sticker_cost' => $this->stickerCost,
                'logo_lighting_Cost' => $this->lightingCost,
                'logo_power_supply_cost' => $this->powerSupplyCost,
                'logo_paint_cost' => $this->paintCost,
                'logo_general_material_cost' => $this->generalMaterialCost,
                'logo_lighting_price' => $this->lightingprice,
                'logo_orcale_cost' => $this->orcaleCost,
                'total_logo_cost' => $this->logoCost,

            ]);
        }
        if ($this->mainHeight) {
            MainCalculation::create([
                'calculation_id' => $calculation->id,

                'main_text' => $this->mainText,
                'main_height' => $this->mainHeight,
                'main_width' => $this->mainWidth,
                'main_materials' => implode(',', $this->mainMaterials ?? []),
                'main_sticker_height_width' => $this->mainStickerHeightWidth ? 'yes' : null,
                'main_sticker_material' => implode(',', $this->mainstickerMaterial ?? []),
                'main_general_material' => implode(',', $this->maingeneralMaterial ?? []),
                'main_paint_height_width' => $this->mainPaintHeightWidth ? 'yes' : null,
                'main_oracal_height_width' => $this->mainoracalHeightWidth ? 'yes' : null,
                'main_light_height_width' => $this->mainlightHeightWidth ? 'yes' : null,
                'main_lighting_type' => implode(',', $this->mainLightingType ?? []),
                'main_power_supply' => $this->mainPowerSupply,
                'main_power_supply_quantity' => $this->mainPowerSupplyQuantity,
                'main_acrylic_cost' => $this->mainacrylicCost,
                'main_pvc_cost' => $this->mainpvcCost,
                'main_sticker_cost' => $this->mainstickerCost,
                'main_lighting_Cost' => $this->mainlightingCost,
                'main_power_supply_cost' => $this->mainpowerSupplyCost,
                'main_paint_cost' => $this->mainpaintCost,
                'main_general_material_cost' => $this->maingeneralMaterialCost,
                'main_lighting_price' => $this->mainlightingprice,
                'main_orcale_cost' => $this->mainorcaleCost,
                'total_main_cost' => $this->mainCost,
            ]);
        }
        if ($this->addHeight) {
            AddCalculation::create([
                'calculation_id' => $calculation->id,

                'add_text' => $this->addText,
                'add_height' => $this->addHeight,
                'add_width' => $this->addWidth,
                'add_materials' => implode(',', $this->addMaterials ?? []),
                'add_sticker_height_width' => $this->addStickerHeightWidth ? 'yes' : null,
                'add_sticker_material' => implode(',', $this->addstickerMaterial ?? []),
                'add_general_material' => implode(',', $this->addgeneralMaterial ?? []),
                'add_paint_height_width' => $this->addPaintHeightWidth ? 'yes' : null,
                'add_oracal_height_width' => $this->addoracalHeightWidth ? 'yes' : null,
                'add_light_height_width' => $this->addlightHeightWidth ? 'yes' : null,
                'add_lighting_type' => implode(',', $this->addLightingType ?? []),
                'add_power_supply' => $this->addPowerSupply,
                'add_power_supply_quantity' => $this->addPowerSupplyQuantity,
                'add_acrylic_cost' => $this->addacrylicCost,
                'add_pvc_cost' => $this->addpvcCost,
                'add_sticker_cost' => $this->addstickerCost,
                'add_lighting_Cost' => $this->addlightingCost,
                'add_power_supply_cost' => $this->addpowerSupplyCost,
                'add_paint_cost' => $this->addpaintCost,
                'add_general_material_cost' => $this->addgeneralMaterialCost,
                'add_lighting_price' => $this->addlightingprice,
                'add_orcale_cost' => $this->addorcaleCost,
                'total_add_cost' => $this->addCost,
            ]);
        }
        if ($this->busHeight) {
            BusinessCalculation::create([
                'calculation_id' => $calculation->id,

                'business_text' => $this->busText,
                'business_height' => $this->busHeight,
                'business_width' => $this->busWidth,
                'business_materials' => implode(',', $this->busMaterials ?? []),
                'business_sticker_height_width' => $this->busStickerHeightWidth ? 'yes' : null,
                'business_sticker_material' => implode(',', $this->busstickerMaterial ?? []),
                'business_general_material' => implode(',', $this->busgeneralMaterial ?? []),
                'business_paint_height_width' => $this->busPaintHeightWidth ? 'yes' : null,
                'business_oracal_height_width' => $this->busoracalHeightWidth ? 'yes' : null,
                'business_light_height_width' => $this->buslightHeightWidth ? 'yes' : null,
                'business_lighting_type' => implode(',', $this->busLightingType ?? []),
                'business_power_supply' => $this->busPowerSupply,
                'business_power_supply_quantity' => $this->busPowerSupplyQuantity,
                'business_acrylic_cost' => $this->busacrylicCost,
                'business_pvc_cost' => $this->buspvcCost,
                'business_sticker_cost' => $this->busstickerCost,
                'business_lighting_Cost' => $this->buslightingCost,
                'business_power_supply_cost' => $this->buspowerSupplyCost,
                'business_paint_cost' => $this->buspaintCost,
                'business_general_material_cost' => $this->busgeneralMaterialCost,
                'business_lighting_price' => $this->buslightingprice,
                'business_orcale_cost' => $this->busorcaleCost,
                'total_business_cost' => $this->busCost,
            ]);
        }
        if ($this->busHeight) {
            BusinessCalculation::create([
                'calculation_id' => $calculation->id,

                'business_text' => $this->busText,
                'business_height' => $this->busHeight,
                'business_width' => $this->busWidth,
                'business_materials' => implode(',', $this->busMaterials ?? []),
                'business_sticker_height_width' => $this->busStickerHeightWidth ? 'yes' : null,
                'business_sticker_material' => implode(',', $this->busstickerMaterial ?? []),
                'business_general_material' => implode(',', $this->busgeneralMaterial ?? []),
                'business_paint_height_width' => $this->busPaintHeightWidth ? 'yes' : null,
                'business_oracal_height_width' => $this->busoracalHeightWidth ? 'yes' : null,
                'business_light_height_width' => $this->buslightHeightWidth ? 'yes' : null,
                'business_lighting_type' => implode(',', $this->busLightingType ?? []),
                'business_power_supply' => $this->busPowerSupply,
                'business_power_supply_quantity' => $this->busPowerSupplyQuantity,
                'business_acrylic_cost' => $this->busacrylicCost,
                'business_pvc_cost' => $this->buspvcCost,
                'business_sticker_cost' => $this->busstickerCost,
                'business_lighting_Cost' => $this->buslightingCost,
                'business_power_supply_cost' => $this->buspowerSupplyCost,
                'business_paint_cost' => $this->buspaintCost,
                'business_general_material_cost' => $this->busgeneralMaterialCost,
                'business_lighting_price' => $this->buslightingprice,
                'business_orcale_cost' => $this->busorcaleCost,
                'total_business_cost' => $this->busCost,
            ]);
        }
        if ($this->ownHeight) {
            OwnershipCalculation::create([
                'calculation_id' => $calculation->id,
                'ownership_text' => $this->ownText,
                'ownership_height' => $this->ownHeight,
                'ownership_width' => $this->ownWidth,
                'ownership_materials' => implode(',', $this->ownMaterials ?? []),
                'ownership_sticker_height_width' => $this->ownStickerHeightWidth ? 'yes' : null,
                'ownership_sticker_material' => implode(',', $this->ownstickerMaterial ?? []),
                'ownership_general_material' => implode(',', $this->owngeneralMaterial ?? []),
                'ownership_paint_height_width' => $this->ownPaintHeightWidth ? 'yes' : null,
                'ownership_oracal_height_width' => $this->ownoracalHeightWidth ? 'yes' : null,
                'ownership_light_height_width' => $this->ownlightHeightWidth ? 'yes' : null,
                'ownership_lighting_type' => implode(',', $this->ownLightingType ?? []),
                'ownership_power_supply' => $this->ownPowerSupply,
                'ownership_power_supply_quantity' => $this->ownPowerSupplyQuantity,
                'ownership_acrylic_cost' => $this->ownacrylicCost,
                'ownership_pvc_cost' => $this->ownpvcCost,
                'ownership_sticker_cost' => $this->ownstickerCost,
                'ownership_lighting_Cost' => $this->ownlightingCost,
                'ownership_power_supply_cost' => $this->ownpowerSupplyCost,
                'ownership_paint_cost' => $this->ownpaintCost,
                'ownership_general_material_cost' => $this->owngeneralMaterialCost,
                'ownership_lighting_price' => $this->ownlightingprice,
                'ownership_orcale_cost' => $this->ownorcaleCost,
                'total_ownership_cost' => $this->ownCost,
            ]);
        }
        if (Auth::user()->login_type == '1') {
            dd('Save');
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
