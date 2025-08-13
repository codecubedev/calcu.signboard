<?php

namespace App\Services;

class LogoCostCalculation
{

    // public function calculate(array $data): float
    // {
    //     $height = (float) $data['height'];
    //     $width = (float) $data['width'];
    //     $pcs = (int) ($data['pcs'] ?? 1);
    //     $area = ($height * $width) / 144;

    //     $materialPrices = $data['materialPrices'] ?? [];
    //     $materials = $data['materials'] ?? [];

    //     // NEON COST
    //     $neonCost = 0;
    //     if (in_array('5mm_clear_arcylic', $materials)) {
    //         $price = !empty($data['neonmaterialInputs'])
    //             ? (float) $data['neonmaterialInputs']
    //             : 130;
    //         $neonCost = $area * $price * $pcs;
    //         $skipPowerSupply = true;
    //     } elseif (in_array('10mm_clear_arcylic', $materials)) {
    //         $price = !empty($data['neonmaterialInputs'])
    //             ? (float) $data['neonmaterialInputs']
    //             : 155;
    //         $neonCost = $area * $price * $pcs;
    //         $skipPowerSupply = false;
    //     } else {
    //         $skipPowerSupply = false;
    //     }



    //     // MATERIAL COSTS
    //     $acrylicCost = 0;
    //     $pvcCost = 0;
    //     $whiteAcrylicCost = 0;
    //     $stainlessSteelCost = 0;
    //     $blackAcrylicCost = 0;

    //     foreach ($materials as $index => $material) {
    //         if (in_array($material, ['5mm clear arcylic', '10mm clear arcylic'])) {
    //             continue; // skip already calculated neon
    //         }

    //         if (isset($materialPrices[$material])) {
    //             $price = (float) $materialPrices[$material];
    //             $materialArea = $data['areas'][$index] ?? ($height * $width);

    //             if (strpos($material, 'acrylic') !== false && strpos($material, 'black') === false) {
    //                 $acrylicCost += $materialArea * $price;
    //             } elseif (strpos($material, 'black_acrylic') !== false) {
    //                 $blackAcrylicCost += $materialArea * $price;
    //             } elseif (strpos($material, 'pvc') !== false) {
    //                 $pvcCost += $materialArea * $price;
    //             } elseif (strpos($material, 'mirror') !== false || strpos($material, 'hairline') !== false) {
    //                 $stainlessSteelCost += $materialArea * $price;

    //                 if (!empty($data['channel3d'][$index]) && isset($data['channelPrices'][$material])) {
    //                     $channelPrice = (float) $data['channelPrices'][$material];
    //                     $stainlessSteelCost += $materialArea * $channelPrice;
    //                 }
    //             }
    //         }

    //         if ($material === 'whiteacrylic3mm') {
    //             $whiteAcrylicCost += ($height * $width) * ((float) ($materialPrices['whiteacrylic3mm'] ?? 0));
    //         }
    //     }

    //     // STICKER COST
    //     $stickerArea = $data['useSticker'] ? $area : 0;
    //     $stickerCost = 0;
    //     foreach ($data['stickers'] as $sticker) {
    //         $stickerCost += $stickerArea * ((float) ($data['stickerPrices'][$sticker] ?? 0));
    //     }

    //     // LIGHTING COST
    //     $lightingCost = $data['useLighting'] ? $area * 27 : 0;

    //     // POWER SUPPLY COST
    //     $powerSupplyCost = 0;
    //     if (!$skipPowerSupply && !empty($data['powerSupply'])) {
    //         $powerSupplyPrice = (float) ($data['powerSupplyPrices'][$data['powerSupply']] ?? 0);
    //         $powerSupplyQty = (int) $data['powerSupplyQty'];
    //         $powerSupplyCost = $powerSupplyPrice * $powerSupplyQty;
    //     }

    //     // PAINT & ORCALE COST
    //     $paintCost = $data['usePaint'] ? $area * 7.50 : 0;
    //     $orcaleCost = $data['useOrcale'] ? $area * 14.50 : 0;

    //     // GENERAL MATERIAL COST
    //     $generalMaterialCost = 0;
    //     foreach ($data['generalMaterials'] as $material) {
    //         if (is_callable($data['generalMaterialCostFunction'])) {
    //             $generalMaterialCost += call_user_func(
    //                 $data['generalMaterialCostFunction'],
    //                 $material,
    //                 $height,
    //                 $width,
    //                 $pcs
    //             );
    //         }
    //     }

    //     // LIGHTING TYPE COST
    //     $lightingTypeCost = 0;
    //     foreach ($data['lightingTypes'] as $lighting) {
    //         $lightingTypeCost += (float) ($data['lightingTypePrices'][$lighting] ?? 0);
    //     }

    //     // FINAL TOTAL
    //     return round(
    //         $neonCost + $acrylicCost + $blackAcrylicCost + $pvcCost + $whiteAcrylicCost +
    //             $stainlessSteelCost + $stickerCost + $lightingCost + $powerSupplyCost +
    //             $paintCost + $generalMaterialCost + $lightingTypeCost + $orcaleCost,
    //         2
    //     );
    // }
    // public function calculate(array $data): float
    // {
    //     $height = (float) $data['height'];
    //     $width = (float) $data['width'];
    //     $pcs = (int) ($data['pcs'] ?? 1);
    //     $area = ($height * $width) / 144;

    //     $materialPrices = $data['materialPrices'] ?? [];
    //     $materials = $data['materials'] ?? [];

    //     // NEON COST
    //     $neonCost = 0;
    //     if (in_array('5mm_clear_arcylic', $materials)) {
    //         $price = !empty($data['neonmaterialInputs'])
    //             ? (float) $data['neonmaterialInputs']
    //             : 130;
    //         $neonCost = $area * $price * $pcs;
    //         $skipPowerSupply = true;
    //     } elseif (in_array('10mm_clear_arcylic', $materials)) {
    //         $price = !empty($data['neonmaterialInputs'])
    //             ? (float) $data['neonmaterialInputs']
    //             : 155;
    //         $neonCost = $area * $price * $pcs;
    //         $skipPowerSupply = false;
    //     } else {
    //         $skipPowerSupply = false;
    //     }

    //     // MATERIAL COSTS
    //     $acrylicCost = 0;
    //     $pvcCost = 0;
    //     $whiteAcrylicCost = 0;
    //     $stainlessSteelslilver = 0;
    //     $blackAcrylicCost = 0;

    //     foreach ($materials as $index => $material) {
    //         if (in_array($material, ['5mm clear arcylic', '10mm clear arcylic'])) {
    //             continue; 
    //         }
    //         if (!empty($data['acrylicInput']) && strpos($material, 'acrylic') !== false) {
    //             $acrylicInput = (float) $data['acrylicInput'];
    //         } else {
    //             $acrylicInput = (float) ($materialPrices[$material] ?? 0);
    //         }
    //         if (!empty($data['blackAcrylicInputs']) && strpos($material, 'black') !== false) {
    //             $blackAcrylicInputs = (float) $data['blackAcrylicInputs'];
    //         } else {
    //             $blackAcrylicInputs = (float) ($materialPrices[$material] ?? 0);
    //         }
    //         if (!empty($data['pvcInputs']) && strpos($material, 'pvc') !== false) {
    //             $pvcInputs = (float) $data['pvcInputs'];
    //         } else {
    //             $pvcInputs = (float) ($materialPrices[$material] ?? 0);
    //         }
    //          if (!empty($data['stainlessteelsilverInputs']) && strpos($material, 'mirror') !== false) {
    //             $stainlessteelsilverInputs = (float) $data['stainlessteelsilverInputs'];
    //         } else {
    //             $stainlessteelsilverInputs = (float) ($materialPrices[$material] ?? 0);
    //         }

    //         $materialArea = $data['areas'][$index] ?? ($height * $width);
    //         if (strpos($material, 'acrylic') !== false && strpos($material, 'black') === false) {
    //             $acrylicCost += $materialArea * $acrylicInput;
    //         } elseif (strpos($material, 'black_acrylic') !== false) {
    //             $blackAcrylicCost += $materialArea * $blackAcrylicInputs;
    //         } elseif (strpos($material, 'pvc') !== false) {
    //             $pvcCost += $materialArea * $pvcInputs;

    //         } elseif (strpos($material, 'mirror') !== false || strpos($material, 'hairline') !== false) {
    //             $stainlessSteelslilver += $materialArea * $stainlessteelsilverInputs;
    //         }


    //         // elseif (strpos($material, 'mirror') !== false || strpos($material, 'hairline') !== false) {
    //         //     $stainlessSteelCost += $materialArea * $stainlessteelsilverInputs;

    //         //     if (!empty($data['channel3d'][$index]) && isset($data['channelPrices'][$material])) {
    //         //         $channelPrice = (float) $data['channelPrices'][$material];
    //         //         $stainlessSteelCost += $materialArea * $channelPrice;
    //         //     }
    //         // }

    //         if ($material === 'whiteacrylic3mm') {
    //             $whiteAcrylicCost += ($height * $width) * ((float) ($materialPrices['whiteacrylic3mm'] ?? 0));
    //         }
    //     }

    //     // STICKER COST
    //     $stickerArea = $data['useSticker'] ? $area : 0;
    //     $stickerCost = 0;
    //     foreach ($data['stickers'] as $sticker) {
    //         $stickerCost += $stickerArea * ((float) ($data['stickerPrices'][$sticker] ?? 0));
    //     }

    //     // LIGHTING COST
    //     $lightingCost = $data['useLighting'] ? $area * 27 : 0;

    //     // POWER SUPPLY COST
    //     $powerSupplyCost = 0;
    //     if (!$skipPowerSupply && !empty($data['powerSupply'])) {
    //         $powerSupplyPrice = (float) ($data['powerSupplyPrices'][$data['powerSupply']] ?? 0);
    //         $powerSupplyQty = (int) $data['powerSupplyQty'];
    //         $powerSupplyCost = $powerSupplyPrice * $powerSupplyQty;
    //     }

    //     // PAINT & ORCALE COST
    //     $paintCost = $data['usePaint'] ? $area * 7.50 : 0;
    //     $orcaleCost = $data['useOrcale'] ? $area * 14.50 : 0;

    //     // GENERAL MATERIAL COST
    //     $generalMaterialCost = 0;
    //     foreach ($data['generalMaterials'] as $material) {
    //         if (is_callable($data['generalMaterialCostFunction'])) {
    //             $generalMaterialCost += call_user_func(
    //                 $data['generalMaterialCostFunction'],
    //                 $material,
    //                 $height,
    //                 $width,
    //                 $pcs
    //             );
    //         }
    //     }

    //     // LIGHTING TYPE COST
    //     $lightingTypeCost = 0;
    //     foreach ($data['lightingTypes'] as $lighting) {
    //         $lightingTypeCost += (float) ($data['lightingTypePrices'][$lighting] ?? 0);
    //     }

    //     // FINAL TOTAL
    //     return round(
    //         $neonCost + $acrylicCost + $blackAcrylicCost + $pvcCost + $whiteAcrylicCost +
    //             $stainlessSteelslilver + $stickerCost + $lightingCost + $powerSupplyCost +
    //             $paintCost + $generalMaterialCost + $lightingTypeCost + $orcaleCost,
    //         2
    //     );
    // }
    public function calculate(array $data): float
    {
        $height = (float) $data['height'];
        $width = (float) $data['width'];
        $pcs = (int) ($data['pcs'] ?? 1);
        $area = ($height * $width) / 144;

        // Initialize cost variables
        $neonCost = 0;
        $acrylicCost = 0;
        $blackAcrylicCost = 0;
        $pvcCost = 0;
        $whiteAcrylicCost = 0;
        $stainlessSteelSilverCost = 0;
        $stainlessSteelGoldCost = 0;
        $stainlessSteelGoldCost = 0;
        $stainlessSteelGoldCost = 0;
        $stickerCost = 0;
        $powerSupplyCost = 0;

        $materialPrices = $data['materialPrices'] ?? [];
        $materials = $data['materials'] ?? [];

        // neonCost calculation logic omitted for brevity (same as your code)...
        if (in_array('5mm_clear_arcylic', $materials)) {
            $price = !empty($data['neonmaterialInputs'])
                ? (float) $data['neonmaterialInputs']
                : 130;
            $neonCost = $area * $price * $pcs;
            $skipPowerSupply = true;
        } elseif (in_array('10mm_clear_arcylic', $materials)) {
            $price = !empty($data['neonmaterialInputs'])
                ? (float) $data['neonmaterialInputs']
                : 155;
            $neonCost = $area * $price * $pcs;
            $skipPowerSupply = false;
        } else {
            $skipPowerSupply = false;
        }
        // MATERIAL COSTS
        $materials = $data['materials'] ?? [];
        $materialPrices = $data['materialPrices'] ?? [];

        foreach ($materials as $index => $material) {
            $materialArea = $data['areas'][$index] ?? ($height * $width);

            // Skip neon acrylic handled elsewhere
            if (in_array($material, ['5mm_clear_arcylic', '10mm_clear_arcylic'])) {
                continue;
            }

            // Get custom inputs or fallback to prices array
            $acrylicInput = !empty($data['acrylicInput']) && strpos($material, 'acrylic') !== false ? (float)$data['acrylicInput'] : ($materialPrices[$material] ?? 0);
            $blackAcrylicInput = !empty($data['blackAcrylicInputs']) && strpos($material, 'black') !== false ? (float)$data['blackAcrylicInputs'] : ($materialPrices[$material] ?? 0);
            $pvcInput = !empty($data['pvcInputs']) && strpos($material, 'pvc') !== false ? (float)$data['pvcInputs'] : ($materialPrices[$material] ?? 0);
            $stainlessSteelSilverInput = !empty($data['stainlessteelsilverInputs']) && (strpos($material, 'mirror') !== false || strpos($material, 'hairline') !== false) ? (float)$data['stainlessteelsilverInputs'] : ($materialPrices[$material] ?? 0);
            $stainlessSteelGoldInputs = $stainlessSteelGoldInputs = !empty($data['stainlessteelgoldInputs'])
                ? (float) $data['stainlessteelgoldInputs']
                : ($materialPrices[$material]);;

            if (strpos($material, 'acrylic') !== false && strpos($material, 'black') === false) {
                $acrylicCost += $materialArea * $acrylicInput;
            } elseif (strpos($material, 'black_acrylic') !== false || strpos($material, 'black') !== false) {
                $blackAcrylicCost += $materialArea * $blackAcrylicInput;
            } elseif (strpos($material, 'pvc') !== false) {
                $pvcCost += $materialArea * $pvcInput;
            }
            // Silver Stainless Steel
            elseif (strpos($material, 'mirror') !== false || strpos($material, 'hairline') !== false) {
                if (!str_contains($material, 'gold_')) {
                    $stainlessSteelSilverCost += $materialArea * $stainlessSteelSilverInput;
                } else {

                    $stainlessSteelGoldCost += $materialArea * $stainlessSteelGoldInputs;
                }
            }

            if ($material === 'whiteacrylic3mm') {
                $whiteAcrylicCost += ($height * $width) * ((float) ($materialPrices['whiteacrylic3mm'] ?? 0));
            }
        }

        // STICKER COST
        $stickerArea = $data['useSticker'] ? $area : 0;
        $stickerCost = 0;
        foreach ($data['stickers'] as $sticker) {
            $stickerCost += $stickerArea * ((float) ($data['stickerPrices'][$sticker] ?? 0));
        }

        // LIGHTING COST
        $lightingCost = $data['useLighting'] ? $area * 27 : 0;

        // POWER SUPPLY COST
        $powerSupplyCost = 0;
        if (!empty($data['powerSupply'])) {
            $powerSupplyPrice = (float) ($data['powerSupplyPrices'][$data['powerSupply']] ?? 0);
            $powerSupplyQty = (int) $data['powerSupplyQty'];
            $powerSupplyCost = $powerSupplyPrice * $powerSupplyQty;
        }

        // PAINT & ORCALE COST
        // $paintCost = $data['usePaint'] ? $area * 7.50 : 0;

        $printprice = !empty($data['logoPaintInputs']) ? (float) $data['logoPaintInputs'] : 7.50;
        // dd($data['logoPaintInputs']);
        $paintCost = !empty($data['usePaint']) ? $area * $printprice : 0;


        $oracalCost = $data['useOrcale'] ? $area * 14.50 : 0;



        // GENERAL MATERIAL COST
        // $generalMaterialCost = 0;
        // foreach ($data['generalMaterials'] as $material) {
        //     if (is_callable($data['generalMaterialCostFunction'])) {
        //         $generalMaterialCost += call_user_func(
        //             $data['generalMaterialCostFunction'],
        //             $material,
        //             $height,
        //             $width,
        //             $pcs
        //         );
        //     }
        // }
        $generalMaterialCost = 0;

        foreach ($data['generalMaterials'] as $index => $material) {
            $inputValue = !empty($data['generalMaterialInputs'][$index])
                ? (float) $data['generalMaterialInputs'][$index]
                : 0; // default if empty

            if (is_callable($data['generalMaterialCostFunction'])) {
                $generalMaterialCost += call_user_func(
                    $data['generalMaterialCostFunction'],
                    $material,
                    $height,
                    $width,
                    $pcs,
                    $inputValue // <-- now passing your input box value
                );
            }
        }


        // LIGHTING TYPE COST
        $lightingTypeCost = 0;
        foreach ($data['lightingTypes'] as $lighting) {
            $lightingTypeCost += (float) ($data['lightingTypePrices'][$lighting] ?? 0);
        }


        return round(
            $neonCost + $acrylicCost + $blackAcrylicCost + $pvcCost + $whiteAcrylicCost +
                $stainlessSteelSilverCost + $stainlessSteelGoldCost + $stickerCost +
                $powerSupplyCost + $paintCost + $generalMaterialCost + $lightingTypeCost + $oracalCost,
            2
        );
    }
}
