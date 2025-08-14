<?php

namespace App\Services;

class MainLogoCostCalculation
{

    // public function Maincalculate(array $data): float
    // {

    //     $height = (float) $data['height'];
    //     $width = (float) $data['width'];
    //     $pcs = (int) ($data['pcs'] ?? 1);
    //     $area = ($height * $width) / 144;

    //     $neonCost = 0;
    //     $acrylicCost = 0;
    //     $blackAcrylicCost = 0;
    //     $pvcCost = 0;
    //     $whiteAcrylicCost = 0;
    //     $stainlessSteelSilverCost = 0;
    //     $stainlessSteelGoldCost = 0;
    //     $stainlessSteelGoldCost = 0;
    //     $stainlessSteelGoldCost = 0;
    //     $stickerCost = 0;
    //     $powerSupplyCost = 0;

    //     $materialPrices = $data['materialPrices'] ?? [];
    //     $materials = $data['materials'] ?? [];

    //     $skipPowerSupply = false;
    //     if (in_array('5mm_clear_acrylic', $materials)) {
    //         $price = !empty($data['mainneonmaterialInputs']) ? (float) $data['mainneonmaterialInputs'] : 130;
    //         $neonCost = $area * $price * $pcs;
    //         $skipPowerSupply = true;
    //     } elseif (in_array('10mm_clear_acrylic', $materials)) {
    //         $price = !empty($data['mainneonmaterialInputs']) ? (float) $data['mainneonmaterialInputs'] : 155;
    //         $neonCost = $area * $price * $pcs;
    //     }

    //     // MATERIAL COSTS
    //     $materials = $data['materials'] ?? [];
    //     $materialPrices = $data['materialPrices'] ?? [];

    //     foreach ($materials as $index => $material) {
    //         $materialArea = $data['areas'][$index] ?? ($height * $width);

    //         if (in_array($material, ['5mm_clear_arcylic', '10mm_clear_arcylic'])) {
    //             continue;
    //         }

    //         $acrylicInput = !empty($data['mainacrylicInput']) && strpos($material, 'acrylic') !== false ? (float)$data['mainacrylicInput'] : ($materialPrices[$material] ?? 0);
    //         $blackAcrylicInput = !empty($data['mainblackAcrylicInputs']) && strpos($material, 'black') !== false ? (float)$data['mainblackAcrylicInputs'] : ($materialPrices[$material] ?? 0);
    //         $pvcInput = !empty($data['mainpvcInputs']) && strpos($material, 'pvc') !== false ? (float)$data['mainpvcInputs'] : ($materialPrices[$material] ?? 0);
    //         $stainlessSteelSilverInput = !empty($data['mainstainlessteelsilverInputs']) && (strpos($material, 'mirror') !== false || strpos($material, 'hairline') !== false) ? (float)$data['mainstainlessteelsilverInputs'] : ($materialPrices[$material] ?? 0);
    //         $stainlessSteelGoldInputs = $stainlessSteelGoldInputs = !empty($data['mainstainlessteelgoldInputs'])
    //             ? (float) $data['mainstainlessteelgoldInputs']: ($materialPrices[$material]);;

    //         if (strpos($material, 'acrylic') !== false && strpos($material, 'black') === false) {
    //             $acrylicCost += $materialArea * $acrylicInput;
    //         } elseif (strpos($material, 'black_acrylic') !== false || strpos($material, 'black') !== false) {
    //             $blackAcrylicCost += $materialArea * $blackAcrylicInput;
    //         } elseif (strpos($material, 'pvc') !== false) {
    //             $pvcCost += $materialArea * $pvcInput;
    //         }
    //         // Silver Stainless Steel
    //         elseif (strpos($material, 'mirror') !== false || strpos($material, 'hairline') !== false) {
    //             if (!str_contains($material, 'gold_')) {
    //                 $stainlessSteelSilverCost += $materialArea * $stainlessSteelSilverInput;
    //             } else {

    //                 $stainlessSteelGoldCost += $materialArea * $stainlessSteelGoldInputs;
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
    //         if (!empty($data['stickermaterialInputs'])) {
    //             $price = (float) $data['stickermaterialInputs'];
    //         } else {
    //             $price = (float) ($data['stickerPrices'][$sticker] ?? 0);
    //         }

    //         $stickerCost += $stickerArea * $price;
    //     }




    //     // POWER SUPPLY COST
    //     $powerSupplyCost = 0;
    //     if (!empty($data['powerSupply'])) {
    //         $powerSupplyPrice = (float) ($data['powerSupplyPrices'][$data['powerSupply']] ?? 0);
    //         $powerSupplyQty = (int) $data['powerSupplyQty'];
    //         $powerSupplyCost = $powerSupplyPrice * $powerSupplyQty;
    //     }

    //     // PAINT & ORCALE COST

    //     $printprice = isset($data['logoPaintInputs'])
    //         ? (float) $data['logoPaintInputs']
    //         : 7.50;

    //     $paintCost = !empty($data['usePaint']) ? $area * $printprice : 0;

    //     $orcalprice = isset($data['logoOracalInputs'])
    //         ? (float) $data['logoOracalInputs']
    //         : 14.50;

    //     $oracalCost = $data['useOrcale'] ? $area * $orcalprice : 0;



    //     $printprice = !empty($data['logoPaintInputs']) ? (float) $data['logoPaintInputs'] : 7.50;
    //     // dd($data['logoPaintInputs']);
    //     $paintCost = !empty($data['usePaint']) ? $area * $printprice : 0;


    //     $oracalCost = $data['useOrcale'] ? $area * 14.50 : 0;



    //     // GENERAL MATERIAL COST
    //     $generalMaterialCost = 0;

    //     foreach ($data['generalMaterials'] as $material) {
    //         if (is_callable($data['generalMaterialCostFunction'])) {
    //             if (!empty($data['generalMaterialInput'])) {
    //                 $generalMaterialCost += (float) $data['generalMaterialInput'];
    //             } else {
    //                 $generalMaterialCost += call_user_func(
    //                     $data['generalMaterialCostFunction'],
    //                     $material,
    //                     $height,
    //                     $width,
    //                     $pcs
    //                 );
    //             }
    //         }
    //     }

    //     // LIGHTING TYPE COST

    //     $lightingTypeCost = 0;

    //     foreach ($data['lightingTypes'] as $lighting) {
    //         if (!empty($data['logoLightingDetails'])) {
    //             $price = (float) $data['logoLightingDetails'];
    //         } else {
    //             $price = (float) ($data['lightingTypePrices'][$lighting] ?? 0);
    //         }

    //         $lightingTypeCost += $price;
    //     }



    //     return round(
    //         $neonCost + $acrylicCost + $blackAcrylicCost + $pvcCost + $whiteAcrylicCost +
    //             $stainlessSteelSilverCost + $stainlessSteelGoldCost + $stickerCost +
    //             $powerSupplyCost + $paintCost + $generalMaterialCost + $lightingTypeCost + $oracalCost,
    //         2
    //     );
    // }
    public function Maincalculate(array $data): float
    {
        $height = (float) ($data['height'] ?? 0);
        $width = (float) ($data['width'] ?? 0);
        $pcs = (int) ($data['pcs'] ?? 1);
        $area = ($height * $width) / 144;

        $neonCost = 0;
        $acrylicCost = 0;
        $blackAcrylicCost = 0;
        $pvcCost = 0;
        $whiteAcrylicCost = 0;
        $stainlessSteelSilverCost = 0;
        $stainlessSteelGoldCost = 0;
        $stickerCost = 0;
        $powerSupplyCost = 0;

        $materials = $data['materials'] ?? [];
        $materialPrices = $data['materialPrices'] ?? [];

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

        foreach ($materials as $index => $material) {
            $materialArea = $data['areas'][$index] ?? ($height * $width);

            if (in_array($material, ['5mm_clear_acrylic', '10mm_clear_acrylic'])) {
                continue;
            }

            $acrylicInput = !empty($data['mainacrylicInput']) && strpos($material, 'acrylic') !== false
                ? (float) $data['mainacrylicInput']
                : ($materialPrices[$material] ?? 0);

            $blackAcrylicInput = !empty($data['mainblackAcrylicInputs']) && strpos($material, 'black') !== false
                ? (float) $data['mainblackAcrylicInputs']
                : ($materialPrices[$material] ?? 0);

            $pvcInput = !empty($data['mainpvcInputs']) && strpos($material, 'pvc') !== false
                ? (float) $data['mainpvcInputs']
                : ($materialPrices[$material] ?? 0);

            $stainlessSteelSilverInput = !empty($data['mainstainlessteelsilverInputs']) &&
                (strpos($material, 'mirror') !== false || strpos($material, 'hairline') !== false)
                ? (float) $data['mainstainlessteelsilverInputs']
                : ($materialPrices[$material] ?? 0);

            $stainlessSteelGoldInputs = !empty($data['mainstainlessteelgoldInputs'])
                ? (float) $data['mainstainlessteelgoldInputs']
                : ($materialPrices[$material] ?? 0);

            if (strpos($material, 'acrylic') !== false && strpos($material, 'black') === false) {
                $acrylicCost += $materialArea * $acrylicInput;
            } elseif (strpos($material, 'black_acrylic') !== false || strpos($material, 'black') !== false) {
                $blackAcrylicCost += $materialArea * $blackAcrylicInput;
            } elseif (strpos($material, 'pvc') !== false) {
                $pvcCost += $materialArea * $pvcInput;
            } elseif (strpos($material, 'mirror') !== false || strpos($material, 'hairline') !== false) {
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
        $stickerArea = !empty($data['useSticker']) ? $area : 0;
        $stickerCost = 0;

        foreach ($data['stickers'] as $sticker) {
            if (!empty($data['mainstickermaterialInputs'][$sticker])) {
                // Get price for this specific sticker
                $price = (float) $data['mainstickermaterialInputs'][$sticker];
            } else {
                $price = (float) ($data['stickerPrices'][$sticker] ?? 0);
            }

            $stickerCost += $stickerArea * $price;
        }



        // ✅ POWER SUPPLY COST
        if (!empty($data['powerSupply'])) {
            $powerSupplyPrice = (float) ($data['powerSupplyPrices'][$data['powerSupply']] ?? 0);
            $powerSupplyQty = (int) ($data['powerSupplyQty'] ?? 0);
            $powerSupplyCost = $powerSupplyPrice * $powerSupplyQty;
        }

        $printprice = isset($data['mainPaintInputs']) && $data['mainPaintInputs'] !== ''
            ? (float) $data['mainPaintInputs']
            : 7.50;
        $paintCost = !empty($data['usePaint']) ? $area * $printprice : 0;

        $orcalprice = isset($data['mainOracalInputs']) && $data['mainOracalInputs'] !== ''
            ? (float) $data['mainOracalInputs']
            : 14.50;
        $oracalCost = !empty($data['useOrcale']) ? $area * $orcalprice : 0;

        $generalMaterialCost = 0;

        foreach ($data['generalMaterials'] ?? [] as $material) {
            if (is_callable($data['generalMaterialCostFunction'] ?? null)) {

                if (!empty($data['maingeneralMaterialInputs'][$material])) {
                    $generalMaterialCost += (float) $data['maingeneralMaterialInputs'][$material];
                } else {
                    $generalMaterialCost += call_user_func(
                        $data['generalMaterialCostFunction'],
                        $material,
                        $height,
                        $width,
                        $pcs
                    );
                }
            }
        }


        // ✅ LIGHTING TYPE COST
        $lightingTypeCost = 0;
        foreach ($data['lightingTypes'] ?? [] as $lighting) {
            $price = !empty($data['mainLightingInputs'])
                ? (float) $data['mainLightingInputs']
                : (float) ($data['lightingTypePrices'][$lighting] ?? 0);
            $lightingTypeCost += $price;
        }

        // ✅ TOTAL
        return round(
            $neonCost +
                $acrylicCost +
                $blackAcrylicCost +
                $pvcCost +
                $whiteAcrylicCost +
                $stainlessSteelSilverCost +
                $stainlessSteelGoldCost +
                $stickerCost +
                $powerSupplyCost +
                $paintCost +
                $generalMaterialCost +
                $lightingTypeCost +
                $oracalCost,
            2
        );
    }
}
