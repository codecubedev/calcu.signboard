<?php

namespace App\Services;

class BusinessCost
{



    // public function buscalculate(array $data): float
    // {
    //     $height = (float) ($data['height'] ?? 0);
    //     $width = (float) ($data['width'] ?? 0);
    //     $pcs = (int) ($data['pcs'] ?? 1);
    //     $area = ($height * $width) / 144;

    //     $neonCost = 0;
    //     $acrylicCost = 0;
    //     $blackAcrylicCost = 0;
    //     $pvcCost = 0;
    //     $whiteAcrylicCost = 0;
    //     $stainlessSteelSilverCost = 0;
    //     $stainlessSteelGoldCost = 0;
    //     $stickerCost = 0;
    //     $powerSupplyCost = 0;

    //     $materials = $data['materials'] ?? [];
    //     $materialPrices = $data['materialPrices'] ?? [];

    //     if (in_array('5mm_clear_arcylic', $materials)) {
    //         $price = !empty($data['busneonmaterialInputs'])
    //             ? (float) $data['busneonmaterialInputs']
    //             : 130;
    //         $neonCost = $area * $price * $pcs;
    //         $skipPowerSupply = true;
    //     } elseif (in_array('10mm_clear_arcylic', $materials)) {
    //         $price = !empty($data['busneonmaterialInputs'])
    //             ? (float) $data['busneonmaterialInputs']
    //             : 155;
    //         $neonCost = $area * $price * $pcs;
    //         $skipPowerSupply = false;
    //     } else {
    //         $skipPowerSupply = false;
    //     }

    //     foreach ($materials as $index => $material) {
    //         $materialArea = $data['areas'][$index] ?? ($height * $width);

    //         if (in_array($material, ['5mm_clear_acrylic', '10mm_clear_acrylic'])) {
    //             continue;
    //         }

    //         $acrylicInput = !empty($data['busacrylicInput']) && strpos($material, 'acrylic') !== false
    //             ? (float) $data['busacrylicInput']
    //             : ($materialPrices[$material] ?? 0);

    //         $blackAcrylicInput = !empty($data['busblackAcrylicInputs']) && strpos($material, 'black') !== false
    //             ? (float) $data['busblackAcrylicInputs']
    //             : ($materialPrices[$material] ?? 0);

    //         $pvcInput = !empty($data['buspvcInputs']) && strpos($material, 'pvc') !== false
    //             ? (float) $data['buspvcInputs']
    //             : ($materialPrices[$material] ?? 0);

    //         $stainlessSteelSilverInput = !empty($data['busstainlessteelsilverInputs']) &&
    //             (strpos($material, 'mirror') !== false || strpos($material, 'hairline') !== false)
    //             ? (float) $data['busstainlessteelsilverInputs']
    //             : ($materialPrices[$material] ?? 0);

    //         $stainlessSteelGoldInputs = !empty($data['busstainlessteelgoldInputs'])
    //             ? (float) $data['busstainlessteelgoldInputs']
    //             : ($materialPrices[$material] ?? 0);

    //         if (strpos($material, 'acrylic') !== false && strpos($material, 'black') === false) {
    //             $acrylicCost += $materialArea * $acrylicInput;
    //         } elseif (strpos($material, 'black_acrylic') !== false || strpos($material, 'black') !== false) {
    //             $blackAcrylicCost += $materialArea * $blackAcrylicInput;
    //         } elseif (strpos($material, 'pvc') !== false) {
    //             $pvcCost += $materialArea * $pvcInput;
    //         } elseif (strpos($material, 'mirror') !== false || strpos($material, 'hairline') !== false) {
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
    //     $stickerArea = !empty($data['useSticker']) ? $area : 0;
    //     $stickerCost = 0;

    //     foreach ($data['stickers'] as $sticker) {
    //         if (!empty($data['busstickermaterialInputs'][$sticker])) {
    //             // Get price for this specific sticker
    //             $price = (float) $data['busstickermaterialInputs'][$sticker];
    //         } else {
    //             $price = (float) ($data['stickerPrices'][$sticker] ?? 0);
    //         }

    //         $stickerCost += $stickerArea * $price;
    //     }



    //     // ✅ POWER SUPPLY COST
    //     if (!empty($data['powerSupply'])) {
    //         $powerSupplyPrice = (float) ($data['powerSupplyPrices'][$data['powerSupply']] ?? 0);
    //         $powerSupplyQty = (int) ($data['powerSupplyQty'] ?? 0);
    //         $powerSupplyCost = $powerSupplyPrice * $powerSupplyQty;
    //     }

    //     $printprice = isset($data['busPaintInputs']) && $data['busPaintInputs'] !== ''
    //         ? (float) $data['busPaintInputs']
    //         : 7.50;
    //     $paintCost = !empty($data['usePaint']) ? $area * $printprice : 0;

    //     $orcalprice = isset($data['busOracalInputs']) && $data['busOracalInputs'] !== ''
    //         ? (float) $data['busOracalInputs']
    //         : 14.50;
    //     $oracalCost = !empty($data['useOrcale']) ? $area * $orcalprice : 0;

    //     $generalMaterialCost = 0;

    //     foreach ($data['generalMaterials'] ?? [] as $material) {
    //         if (is_callable($data['generalMaterialCostFunction'] ?? null)) {

    //             if (!empty($data['busgeneralMaterialInputs'][$material])) {
    //                 $generalMaterialCost += (float) $data['busgeneralMaterialInputs'][$material];
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


    //     $lightingTypeCost = 0;
    //     foreach ($data['lightingTypes'] ?? [] as $lighting) {
    //         $price = !empty($data['busLightingInputs'])
    //             ? (float) $data['busLightingInputs']
    //             : (float) ($data['lightingTypePrices'][$lighting] ?? 0);
    //         $lightingTypeCost += $price;
    //     }

    //     return round(
    //         $neonCost +
    //             $acrylicCost +
    //             $blackAcrylicCost +
    //             $pvcCost +
    //             $whiteAcrylicCost +
    //             $stainlessSteelSilverCost +
    //             $stainlessSteelGoldCost +
    //             $stickerCost +
    //             $powerSupplyCost +
    //             $paintCost +
    //             $generalMaterialCost +
    //             $lightingTypeCost +
    //             $oracalCost,
    //         2
    //     );
    // }
    public function buscalculate(array $data): float
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
            $price = !empty($data['busneonmaterialInputs'])
                ? (float) $data['busneonmaterialInputs']
                : 130;
            $neonCost = $area * $price * $pcs;
            $skipPowerSupply = true;
        } elseif (in_array('10mm_clear_arcylic', $materials)) {
            $price = !empty($data['busneonmaterialInputs'])
                ? (float) $data['busneonmaterialInputs']
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

            $acrylicInput = !empty($data['busacrylicInput']) && strpos($material, 'acrylic') !== false
                ? (float) $data['busacrylicInput']
                : ($materialPrices[$material] ?? 0);

            $blackAcrylicInput = !empty($data['busblackAcrylicInputs']) && strpos($material, 'black') !== false
                ? (float) $data['busblackAcrylicInputs']
                : ($materialPrices[$material] ?? 0);

            $pvcInput = !empty($data['buspvcInputs']) && strpos($material, 'pvc') !== false
                ? (float) $data['buspvcInputs']
                : ($materialPrices[$material] ?? 0);

            $stainlessSteelSilverInput = !empty($data['busstainlessteelsilverInputs']) &&
                (strpos($material, 'mirror') !== false || strpos($material, 'hairline') !== false)
                ? (float) $data['busstainlessteelsilverInputs']
                : ($materialPrices[$material] ?? 0);

            $stainlessSteelGoldInputs = !empty($data['busstainlessteelgoldInputs'])
                ? (float) $data['busstainlessteelgoldInputs']
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
            if (!empty($data['busstickermaterialInputs'][$sticker])) {
                // Get price for this specific sticker
                $price = (float) $data['busstickermaterialInputs'][$sticker];
            } else {
                $price = (float) ($data['stickerPrices'][$sticker] ?? 0);
            }

            $stickerCost += $stickerArea * $price;
        }


        if (!empty($data['powerSupply'])) {
            $powerSupplyPrice = (float) ($data['powerSupplyPrices'][$data['powerSupply']] ?? 0);
            $powerSupplyQty = (int) ($data['powerSupplyQty'] ?? 0);
            $powerSupplyCost = $powerSupplyPrice * $powerSupplyQty;
        }

        $printprice = isset($data['buspaintInputs']) && $data['buspaintInputs'] !== ''
            ? (float) $data['buspaintInputs']
            : 7.50;
        $paintCost = !empty($data['usePaint']) ? $area * $printprice : 0;

        $orcalprice = isset($data['busoracalInputs']) && $data['busoracalInputs'] !== ''
            ? (float) $data['busoracalInputs']
            : 14.50;
        $oracalCost = !empty($data['useOrcale']) ? $area * $orcalprice : 0;

        $generalMaterialCost = 0;

        foreach ($data['generalMaterials'] ?? [] as $material) {
            if (is_callable($data['generalMaterialCostFunction'] ?? null)) {

                if (!empty($data['busgeneralMaterialInputs'][$material])) {
                    $generalMaterialCost += (float) $data['busgeneralMaterialInputs'][$material];
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


        $lightingTypeCost = 0;
        foreach ($data['lightingTypes'] ?? [] as $lighting) {
            $price = !empty($data['busLightingInputs'])
                ? (float) $data['busLightingInputs']
                : (float) ($data['lightingTypePrices'][$lighting] ?? 0);
            $lightingTypeCost += $price;
        }

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
