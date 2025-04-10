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
use Auth;
class ViewCalculation extends Component
{
    public $job_name,$date,$sales_man,$totalcost,$company_name,$customer_name,$customer_phone_no;
    public $logoText, $characterCount, $baseType, $baseMember, $baseHeight, $baseWidth, $baseCost = 0;

    public $logoHeight, $logoWidth, $logoStickerHeightWidth, $logooracalHeightWidth,$acrylicCost,$pvcCost;
    public  $stickerCost , $lightingCost , $powerSupplyCost , $paintCost , $generalMaterialCost , $lightingprice , $orcaleCost;
    public $logoLightingTypes;
    public $logolightHeightWidth, $logoPowerSupply, $logoPowerSupplyQuantity = 1;
    public $logoPcs = 1, $logoPaintHeightWidth, $logoStickerHeight, $logoStickerWidth, $logoLightingWidth, $logoLightingHeight;
    public $logoMaterials = [], $stickerMaterial = [], $generalMaterial = [];
    public $logoLightingType = [];
    public $aluminium_channel_border = [];

    public $logoCost = 0;


    public $mainText ='', $mainHeight, $mainWidth, $mainStickerHeightWidth, $mainoracalHeightWidth,$mainacrylicCost,$mainpvcCost;
    public  $mainstickerCost , $mainlightingCost , $mainpowerSupplyCost , $mainpaintCost , $maingeneralMaterialCost , $mainlightingprice , $mainorcaleCost;

    public $mainLightingTypes;
    public $mainlightHeightWidth, $mainPowerSupply, $mainPowerSupplyQuantity = 1;
    public $mainPcs = 1, $mainPaintHeightWidth, $mainStickerHeight, $mainStickerWidth, $mainLightingWidth, $mainLightingHeight;
    public $mainMaterials = [], $mainstickerMaterial = [], $maingeneralMaterial = [];
    public $mainlogoLightingType = [];
    public $mainaluminium_channel_border = [];

    public $mainCost = 0;

    public $addText, $addacrylicCost,$addpvcCost;


    public $addHeight, $addWidth, $addStickerHeightWidth, $addoracalHeightWidth;
    public  $addstickerCost , $addlightingCost , $addpowerSupplyCost , $addpaintCost , $addgeneralMaterialCost , $addlightingprice , $addorcaleCost;

    public $addLightingTypes;
    public $addlightHeightWidth, $addPowerSupply, $addPowerSupplyQuantity = 1;
    public $addPcs = 1,$maincharacterCount ,$addPaintHeightWidth, $addStickerHeight, $addStickerWidth, $addLightingWidth, $addLightingHeight;
    public $addMaterials = [], $addstickerMaterial = [], $addgeneralMaterial = [];
    public $addlogoLightingType = [];
    public $addaluminium_channel_border = [];

    public $addCost = 0;

    public $busText, $busacrylicCost,$buspvcCost;

    public $busHeight, $busWidth, $busStickerHeightWidth, $busoracalHeightWidth;
    public  $busstickerCost , $buslightingCost , $buspowerSupplyCost , $buspaintCost , $busgeneralMaterialCost , $buslightingprice , $busorcaleCost;

    public $busLightingTypes;
    public $buslightHeightWidth, $busPowerSupply, $busPowerSupplyQuantity = 1;
    public $busPcs = 1, $busPaintHeightWidth, $busStickerHeight, $busStickerWidth, $busLightingWidth, $busLightingHeight;
    public $busMaterials = [], $busstickerMaterial = [], $busgeneralMaterial = [];
    public $buslogoLightingType = [];
    public $busaluminium_channel_border = [];

    public $busCost = 0;

    public $ownText, $ownacrylicCost,$ownpvcCost;
    public  $ownstickerCost , $ownlightingCost , $ownpowerSupplyCost , $ownpaintCost , $owngeneralMaterialCost , $ownlightingprice , $ownorcaleCost;

    public $ownHeight, $ownWidth, $ownStickerHeightWidth, $ownoracalHeightWidth;
    public $ownLightingTypes;
    public $ownlightHeightWidth, $ownPowerSupply, $ownPowerSupplyQuantity = 1;
    public $ownPcs = 1, $ownPaintHeightWidth, $ownStickerHeight, $ownStickerWidth, $ownLightingWidth, $ownLightingHeight;
    public $ownMaterials = [], $ownstickerMaterial = [], $owngeneralMaterial = [];
    public $ownlogoLightingType = [];
    public $ownaluminium_channel_border = [];

    public $ownCost = 0;

    public $isCalculated = false;
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
                return ($height *  $pcs * 5.5) ;

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


    public function calculateBaseCost(){
        $this->isCalculated = true; 

        $this->validate([
            'job_name'=>'required',
            'date'=>'required',
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
            // dd($this->baseCost);
        }

        $area = ($this->logoHeight ?? 0) * ($this->logoWidth ?? 0);

        $this->acrylicCost = 0;
        $this->pvcCost = 0;
        $whiteacryliccost = 0;
        // dd($this->materialPrices);
        // logo cost
        foreach ($this->logoMaterials as $material) {
            if (isset($this->materialPrices[$material])) {
                if (strpos($material, 'acrylic') !== false) {
                    
                    $this->acrylicCost += $area * $this->materialPrices[$material];
                } elseif (strpos($material, 'pvc') !== false) {
                    $this->pvcCost += $area * $this->materialPrices[$material]; 
                }
            }
        
            if ($material === 'whiteacrylic3mm') {
                $whiteacryliccost += $area * $this->materialPrices[$material];
            }
        }
        
        if ($this->logoStickerHeightWidth === true) {
            $this->stickerArea = $area / 144;
        } else {
            $this->stickerArea = 0;

        }
        $this->stickerCost = 0;
        foreach ($this->stickerMaterial as $sticker) {
            if (isset($this->stickerPrices[$sticker])) {
                $this->stickerCost +=  $this->stickerArea * $this->stickerPrices[$sticker];
            }

        }

        if ($this->logolightHeightWidth === true) {
            $lightingArea = $area;
            $this->lightingCost = ($lightingArea / 144) * 27;
        } else {
            $this->lightingCost = 0;
        }

        $this->powerSupplyCost = isset($this->powerSupplyPrices[$this->logoPowerSupply])
            ? $this->powerSupplyPrices[$this->logoPowerSupply] * $this->logoPowerSupplyQuantity: 0;

        $this->generalMaterialCost = 0;
        $this->lightingprice = 0;
        $pcs = $this->logoPcs ?? 1;
        if (!empty($this->generalMaterial)) {
            foreach ($this->generalMaterial as $material) {
                $this->generalMaterialCost += $this->getGeneralMaterialCost($material, $this->logoHeight, $this->logoWidth, $pcs);
                // dd($generalMaterialCost);
            }
        } elseif (!empty($this->logoLightingType)) {
            $this->lightingprice = 0;

            foreach ($this->logoLightingType as $lighting) {
                if (isset($lightingtype[$lighting])) {
                    $this->lightingprice += $lightingtype[$lighting];
                }
            }

        }


        // paint
        if ($this->logoPaintHeightWidth === true) {
            $paintArea = $area;
            $this->paintCost = ($paintArea / 144) * 7.50;
        } else {
            $this->paintCost = 0;

        }
        // orcale
        if ($this->logooracalHeightWidth === true) {
            $orcaleArea = $area;
            $this->orcaleCost = ($orcaleArea / 144) * 10.8;
        } else {
            $this->orcaleCost = 0;

        }


        $this->logoCost = $this->acrylicCost + $this->pvcCost + $this->stickerCost + $this->lightingCost + $this->powerSupplyCost + $this->paintCost + $this->generalMaterialCost + $this->lightingprice + $this->orcaleCost;
        // dd($acrylicCost , $pvcCost , $stickerCost , $lightingCost , $powerSupplyCost , $paintCost , $generalMaterialCost , $lightingprice , $orcaleCost);
        
        
        // main cost
        $mainarea = ($this->mainHeight ?? 0) * ($this->mainWidth ?? 0);

        
        $mainacrylicCost = 0;
        $mainpvcCost = 0;
        $mainwhiteacryliccost = 0;
        foreach ($this->mainMaterials as $material) {
            if (isset($this->materialPrices[$material])) {
                if (strpos($material, 'acrylic') !== false) {
                    
                    $this->mainacrylicCost += $mainarea * $this->materialPrices[$material];
                } elseif (strpos($material, 'pvc') !== false) {
                    $this->mainpvcCost += $mainarea * $this->materialPrices[$material]; 
                }
            }
        
            if ($material === 'whiteacrylic3mm') {
                $mainwhiteacryliccost += $mainarea * $this->materialPrices[$material];

            }
        }
        
        if ($this->mainStickerHeightWidth === true) {
            $mainstickerArea = $mainarea / 144;
        } else {
            $mainstickerArea = 0;

        }
        $this->mainstickerCost = 0;
        foreach ($this->mainstickerMaterial as $sticker) {
            if (isset($this->stickerPrices[$sticker])) {
                $this->mainstickerCost += $mainstickerArea * $this->stickerPrices[$sticker];
            }

        }

        if ($this->mainlightHeightWidth === true) {
            $mainlightingArea = $mainarea;
            $this->mainlightingCost = ($mainlightingArea / 144) * 27;
        } else {
            $this->mainlightingCost = 0;
        }

        $mainpowerSupplyCost = isset($this->powerSupplyPrices[$this->mainPowerSupply])? $this->powerSupplyPrices[$this->mainPowerSupply] * $this->mainPowerSupplyQuantity: 0;

        $this->maingeneralMaterialCost = 0;
        $this->mainlightingprice = 0;
        $pcs = $this->mainPcs ?? 1;
        if (!empty($this->maingeneralMaterial)) {
            foreach ($this->maingeneralMaterial as $material) {
                $this->maingeneralMaterialCost += $this->getmainGeneralMaterialCost($material, $this->mainHeight, $this->mainWidth, $this->maincharacterCount);
            }
        } elseif (!empty($this->mainLightingType)) {
            $this->mainlightingprice = 0;

            foreach ($this->mainLightingType as $lighting) {
                if (isset($lightingtype[$lighting])) {
                    $this->mainlightingprice += $lightingtype[$lighting];
                }
            }

        }


        // paint
        if ($this->mainPaintHeightWidth === true) {
            $mainpaintArea = $mainarea;
            $this->mainpaintCost = ($mainpaintArea / 144) * 7.50;
        } else {
            $this->mainpaintCost = 0;

        }
        // orcale
        if ($this->mainoracalHeightWidth === true) {
            $mainorcaleArea = $mainarea;
            $this->mainorcaleCost = ($mainorcaleArea / 144) * 10.8;
        } else {
            $this->mainorcaleCost = 0;

        }
        $this->mainCost = $this->mainacrylicCost + $this->mainpvcCost + $this->mainstickerCost + $this->mainlightingCost + $this->mainpowerSupplyCost + $this->mainpaintCost + $this->maingeneralMaterialCost + $this->mainlightingprice + $this->mainorcaleCost;
        // dd($mainacrylicCost , $mainpvcCost , $mainstickerCost , $mainlightingCost , $mainpowerSupplyCost , $mainpaintCost , $maingeneralMaterialCost , $mainlightingprice ,$mainorcaleCost);

         
        // add cost
        $addarea = ($this->addHeight ?? 0) * ($this->addWidth ?? 0);
        
        $this->addacrylicCost = 0;
        $this->addpvcCost = 0;
        $this->addwhiteacryliccost = 0;
        foreach ($this->addMaterials as $material) {
            if (isset($this->materialPrices[$material])) {
                if (strpos($material, 'acrylic') !== false) {
                    
                    $this->addacrylicCost += $addarea * $this->materialPrices[$material];
                } elseif (strpos($material, 'pvc') !== false) {
                    $this->addpvcCost += $addarea * $this->materialPrices[$material]; 
                }
            }
        
            if ($material === 'whiteacrylic3mm') {
                $mainwhiteacryliccost += $mainarea * $this->materialPrices[$material];

            }
        }
        
        if ($this->addStickerHeightWidth === true) {
            $addstickerArea = $addarea / 144;
        } else {
            $addstickerArea = 0;

        }
        $this->addstickerCost = 0;
        foreach ($this->addstickerMaterial as $sticker) {
            if (isset($this->stickerPrices[$sticker])) {
                $this->addstickerCost += $addstickerArea * $this->stickerPrices[$sticker];
            }

        }

        if ($this->addlightHeightWidth === true) {
            $addlightingArea = $addarea;
            $this->addlightingCost = ($addlightingArea / 144) * 27;
        } else {
            $this->addlightingCost = 0;
        }

        $addpowerSupplyCost = isset($this->powerSupplyPrices[$this->addPowerSupply])? $this->powerSupplyPrices[$this->addPowerSupply] * $this->addPowerSupplyQuantity: 0;

        $this->addgeneralMaterialCost = 0;
        $addlightingprice = 0;
        $pcs = $this->mainPcs ?? 1;
        if (!empty($this->addgeneralMaterial)) {
            foreach ($this->addgeneralMaterial as $material) {
                $this->addgeneralMaterialCost += $this->getaddGeneralMaterialCost($material, $this->addHeight, $this->addWidth, $pcs);
            }
        } elseif (!empty($this->addLightingType)) {
            $this->addlightingprice = 0;

            foreach ($this->addLightingType as $lighting) {
                if (isset($lightingtype[$lighting])) {
                    $this->addlightingprice += $lightingtype[$lighting];
                }
            }

        }


        // paint
        if ($this->addPaintHeightWidth === true) {
            $addpaintArea = $addarea;
            $this->addpaintCost = ($addpaintArea / 144) * 7.50;
        } else {
            $this->addpaintCost = 0;

        }
        // orcale
        if ($this->addoracalHeightWidth === true) {
            $addorcaleArea = $addarea;
            $this->addorcaleCost = ($addorcaleArea / 144) * 10.8;
        } else {
            $this->addorcaleCost = 0;

        }
        $this->addCost = $this->addacrylicCost +$this->addpvcCost + $this->addstickerCost + $this->addlightingCost + $this->addpowerSupplyCost + $this->addpaintCost + $this->addgeneralMaterialCost + $this->addlightingprice + $this->addorcaleCost;
        // dd( $addacrylicCost , $addpvcCost , $addstickerCost , $addlightingCost , $addpowerSupplyCost ,$addpaintCost , $addgeneralMaterialCost , $addlightingprice , $addorcaleCost);


         
        // business cost
        $busarea = ($this->busHeight ?? 0) * ($this->busWidth ?? 0);
        
        $this->busacrylicCost = 0;
        $this->buspvcCost = 0;
        $buswhiteacryliccost = 0;
        foreach ($this->busMaterials as $material) {
            if (isset($this->materialPrices[$material])) {
                if (strpos($material, 'acrylic') !== false) {
                    
                    $this->busacrylicCost += $busarea * $this->materialPrices[$material];
                } elseif (strpos($material, 'pvc') !== false) {
                    $this->buspvcCost += $busarea * $this->materialPrices[$material]; 
                }
            }
        
            if ($material === 'whiteacrylic3mm') {
                $buswhiteacryliccost += $busarea * $this->materialPrices[$material];

            }
        }
        
        if ($this->busStickerHeightWidth === true) {
            $busstickerArea = $busarea / 144;
        } else {
            $busstickerArea = 0;

        }
        $this->busstickerCost = 0;
        foreach ($this->busstickerMaterial as $sticker) {
            if (isset($this->stickerPrices[$sticker])) {
                $this->busstickerCost += $busstickerArea * $this->stickerPrices[$sticker];
            }

        }

        if ($this->buslightHeightWidth === true) {
            $buslightingArea = $busarea;
            $this->buslightingCost = ($buslightingArea / 144) * 27;
        } else {
            $this->buslightingCost = 0;
        }

        $buspowerSupplyCost = isset($this->powerSupplyPrices[$this->busPowerSupply])? $this->powerSupplyPrices[$this->busPowerSupply] * $this->busPowerSupplyQuantity: 0;

        $busgeneralMaterialCost = 0;
        $buslightingprice = 0;
        $pcs = $this->mainPcs ?? 1;
        if (!empty($this->busgeneralMaterial)) {
            foreach ($this->busgeneralMaterial as $material) {
                $this->busgeneralMaterialCost += $this->getbusGeneralMaterialCost($material, $this->busHeight, $this->busWidth, $pcs);
                // dd($busgeneralMaterialCost );
            }
        } elseif (!empty($this->busLightingType)) {
            $this->buslightingprice = 0;

            foreach ($this->busLightingType as $lighting) {
                if (isset($lightingtype[$lighting])) {
                    $this->buslightingprice += $lightingtype[$lighting];
                }
            }

        }


        // paint
        if ($this->busPaintHeightWidth === true) {
            $buspaintArea = $busarea;
            $this->buspaintCost = ($buspaintArea / 144) * 7.50;
        } else {
            $this->buspaintCost = 0;

        }
        // orcale
        if ($this->busoracalHeightWidth === true) {
            $busorcaleArea = $busarea;
            $this->busorcaleCost = ($busorcaleArea / 144) * 10.8;
        } else {
            $this->busorcaleCost = 0;

        }
        // dd($busacrylicCost ,$buspvcCost , $busstickerCost , $buslightingCost , $buspowerSupplyCost , $buspaintCost , $busgeneralMaterialCost , $buslightingprice , $busorcaleCost);
        $this->busCost = $this->busacrylicCost +$this->buspvcCost + $this->busstickerCost + $this->buslightingCost + $this->buspowerSupplyCost + $this->buspaintCost + $this->busgeneralMaterialCost + $this->buslightingprice + $this->busorcaleCost;
    
        // owner cost
        $ownarea = ($this->ownHeight ?? 0) * ($this->ownWidth ?? 0);
            
        $this->ownacrylicCost = 0;
        $this->ownpvcCost = 0;
        $ownwhiteacryliccost = 0;
        foreach ($this->ownMaterials as $material) {
            if (isset($this->materialPrices[$material])) {
                if (strpos($material, 'acrylic') !== false) {
                    
                    $this->ownacrylicCost += $ownarea * $this->materialPrices[$material];
                } elseif (strpos($material, 'pvc') !== false) {
                    $this->ownpvcCost +=  $ownarea * $this->materialPrices[$material]; 
                }
            }
        
            if ($material === 'whiteacrylic3mm') {
                $ownwhiteacryliccost += $ownarea * $this->materialPrices[$material];

            }
        }
        
        if ($this->ownStickerHeightWidth === true) {
            $ownstickerArea = $ownarea / 144;
        } else {
            $ownstickerArea = 0;

        }
        $ownstickerCost = 0;
        foreach ($this->ownstickerMaterial as $sticker) {
            if (isset($this->stickerPrices[$sticker])) {
                $this->ownstickerCost += $ownstickerArea * $this->stickerPrices[$sticker];
            }

        }

        if ($this->ownlightHeightWidth === true) {
            $ownlightingArea = $ownarea;
            $this->ownlightingCost = ($ownlightingArea / 144) * 27;
        } else {
            $this->ownlightingCost = 0;
        }

        $ownpowerSupplyCost = isset($this->powerSupplyPrices[$this->ownPowerSupply])? $this->powerSupplyPrices[$this->ownPowerSupply] * $this->ownPowerSupplyQuantity: 0;

        $this->owngeneralMaterialCost = 0;
        $this->ownlightingprice = 0;
        $pcs = $this->mainPcs ?? 1;
        if (!empty($this->owngeneralMaterial)) {
            foreach ($this->owngeneralMaterial as $material) {
                $this->owngeneralMaterialCost += $this->getownGeneralMaterialCost($material, $this->ownHeight, $this->ownWidth, $pcs);
                // dd($busgeneralMaterialCost );
            }
        } elseif (!empty($this->ownLightingType)) {
            $this->ownlightingprice = 0;

            foreach ($this->ownLightingType as $lighting) {
                if (isset($lightingtype[$lighting])) {
                    $this->ownlightingprice += $lightingtype[$lighting];
                }
            }

        }


        // paint
        if ($this->ownPaintHeightWidth === true) {
            $ownpaintArea = $ownarea;
            $this->ownpaintCost = ($ownpaintArea / 144) * 7.50;
        } else {
            $this->ownpaintCost = 0;

        }
        // orcale
        if ($this->ownoracalHeightWidth === true) {
            $ownorcaleArea = $ownarea;
            $this->ownorcaleCost = ($ownorcaleArea / 144) * 10.8;
        } else {
            $this->ownorcaleCost = 0;

        }
        // dd($ownacrylicCost ,$ownpvcCost , $ownstickerCost , $ownlightingCost , $ownpowerSupplyCost , $ownpaintCost , $owngeneralMaterialCost , $ownlightingprice , $ownorcaleCost);
        $this->ownCost = $this->ownacrylicCost +$this->ownpvcCost + $this->ownstickerCost + $this->ownlightingCost + $this->ownpowerSupplyCost + $this->ownpaintCost + $this->owngeneralMaterialCost + $this->ownlightingprice + $this->ownorcaleCost;

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
            'customer_name'=>$this->customer_name,
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

        
        if($this->baseType){
            // dd($calculation->id);
            BaseCalculation::create([
                'calculation_id'=>$calculation->id,
                'base_type' => $this->baseType,
                'base_member' => $this->baseMember,
                'base_height' => $this->baseHeight,
                'base_width' => $this->baseWidth,
                'total_base_cost' => $this->baseCost,

            ]); 
        }
        if($this->logoHeight){
            LogoCalculation::create([
                'calculation_id'=>$calculation->id,

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
        if($this->mainHeight){
            MainCalculation::create([
                'calculation_id'=>$calculation->id,

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
        if($this->addHeight){
            AddCalculation::create([
                'calculation_id'=>$calculation->id,

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
        if($this->busHeight){
         BusinessCalculation::create([
                'calculation_id'=>$calculation->id,

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
        if($this->busHeight){
            BusinessCalculation::create([
                'calculation_id'=>$calculation->id,

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
        if($this->ownHeight){
            OwnershipCalculation::create([
                'calculation_id'=>$calculation->id,
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
        if(Auth::user()->login_type == '1'){
            dd('Save');
            return redirect('dashboard')->with('message', 'Calculation saved successfully.');

        }else{
            return redirect('salesman-data_calculation')->with('message', 'Calculation saved successfully.');

        }

        
    }
    

    public function render()
    {
        $this->characterCount = strlen($this->logoText);
        return view('livewire.view-calculation');
    }
}