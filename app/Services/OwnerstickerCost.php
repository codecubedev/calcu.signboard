<?php

namespace App\Services;

class OwnerstickerCost
{
    // public function owncalculate(array $data): float
    // {
    //     $height = (float) $data['height'];
    //     $width = (float) $data['width'];
    //     $pcs = (int) ($data['pcs'] ?? 1);
    //     $area = $height * $width;
    //     $materialPrices = $data['materialPrices'] ?? [];

    //     $acrylicCost = 0;
    //     $blackAcrylicCost = 0;
    //     $pvcCost = 0;
    //     $whiteAcrylicCost = 0;
    //     $stainlessSteelCost = 0;
    //     $neonCost = 0; // ✅ Neon added

    //     foreach ($data['materials'] as $material) {
    //         $price = $materialPrices[$material] ?? 0;

    //         if (strpos($material, 'acrylic') !== false && strpos($material, 'black') === false && strpos($material, 'neon') === false) {
    //             $acrylicCost += $area * $price;
    //         } elseif (strpos($material, 'black_acrylic') !== false) {
    //             $blackAcrylicCost += $area * $price;
    //         } elseif (strpos($material, 'pvc') !== false) {
    //             $pvcCost += $area * $price;
    //         } elseif ($material === 'whiteacrylic3mm') {
    //             $whiteAcrylicCost += $area * $price;
    //         } elseif (
    //             str_contains($material, 'mirror') || str_contains($material, 'hairline') || str_contains($material, 'gold')
    //         ) {
    //             $stainlessSteelCost += $area * $price;
    //         } elseif (strpos($material, 'neon') !== false || str_contains($material, 'clear acrylic')) {
    //             $neonCost += $area * $price; // ✅ Neon or clear acrylic
    //         }
    //     }

    //     // Sticker Cost
    //     $stickerArea = $data['useSticker'] ? $area / 144 : 0;
    //     $stickerCost = 0;
    //     foreach ($data['stickers'] as $sticker) {
    //         if (isset($data['stickerPrices'][$sticker])) {
    //             $stickerCost += $stickerArea * $data['stickerPrices'][$sticker];
    //         }
    //     }

    //     // Lighting Cost
    //     $lightingCost = $data['useLighting'] ? ($area / 144) * 27 : 0;

    //     // Power Supply Cost
    //     $powerSupplyCost = ($data['powerSupplyPrices'][$data['powerSupply']] ?? 0) * $data['powerSupplyQty'];

    //     // Paint and Oracal
    //     $paintCost = $data['usePaint'] ? ($area / 144) * 7.50 : 0;
    //     $orcaleCost = $data['useOrcale'] ? ($area / 144) * 14.50 : 0;

    //     // General Material Cost
    //     $generalMaterialCost = 0;
    //     foreach ($data['generalMaterials'] as $material) {
    //         if (is_callable($data['generalMaterialCostFunction'])) {
    //             $generalMaterialCost += call_user_func($data['generalMaterialCostFunction'], $material, $height, $width, $pcs);
    //         }
    //     }

    //     // Lighting Type Cost
    //     $lightingTypeCost = 0;
    //     foreach ($data['lightingTypes'] as $lighting) {
    //         $lightingTypeCost += $data['lightingTypePrices'][$lighting] ?? 0;
    //     }

    //     return $acrylicCost + $blackAcrylicCost + $pvcCost + $whiteAcrylicCost + $stainlessSteelCost
    //         + $neonCost
    //         + $stickerCost + $lightingCost + $powerSupplyCost + $paintCost
    //         + $generalMaterialCost + $lightingTypeCost + $orcaleCost;
    // }

    public function owncalculate(array $data): float
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
            $price = !empty($data['ownneonmaterialInputs'])
                ? (float) $data['ownneonmaterialInputs']
                : 130;
            $neonCost = $area * $price * $pcs;
            $skipPowerSupply = true;
        } elseif (in_array('10mm_clear_arcylic', $materials)) {
            $price = !empty($data['ownneonmaterialInputs'])
                ? (float) $data['ownneonmaterialInputs']
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

            $acrylicInput = !empty($data['ownacrylicInput']) && strpos($material, 'acrylic') !== false
                ? (float) $data['ownacrylicInput']
                : ($materialPrices[$material] ?? 0);

            $blackAcrylicInput = !empty($data['ownblackAcrylicInputs']) && strpos($material, 'black') !== false
                ? (float) $data['ownblackAcrylicInputs']
                : ($materialPrices[$material] ?? 0);

            $pvcInput = !empty($data['ownpvcInputs']) && strpos($material, 'pvc') !== false
                ? (float) $data['ownpvcInputs']
                : ($materialPrices[$material] ?? 0);

            $stainlessSteelSilverInput = !empty($data['ownstainlessteelsilverInputs']) &&
                (strpos($material, 'mirror') !== false || strpos($material, 'hairline') !== false)
                ? (float) $data['ownstainlessteelsilverInputs']
                : ($materialPrices[$material] ?? 0);

            $stainlessSteelGoldInputs = !empty($data['ownstainlessteelgoldInputs'])
                ? (float) $data['ownstainlessteelgoldInputs']
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
            if (!empty($data['ownstickermaterialInputs'][$sticker])) {
                // Get price for this specific sticker
                $price = (float) $data['ownstickermaterialInputs'][$sticker];
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

        $printprice = isset($data['ownpaintInputs']) && $data['ownpaintInputs'] !== ''
            ? (float) $data['ownpaintInputs']
            : 7.50;
        $paintCost = !empty($data['usePaint']) ? $area * $printprice : 0;

        $orcalprice = isset($data['ownoracalInputs']) && $data['ownoracalInputs'] !== ''
            ? (float) $data['ownoracalInputs']
            : 14.50;
        $oracalCost = !empty($data['useOrcale']) ? $area * $orcalprice : 0;

        $generalMaterialCost = 0;

        foreach ($data['generalMaterials'] ?? [] as $material) {
            if (is_callable($data['generalMaterialCostFunction'] ?? null)) {

                if (!empty($data['owngeneralMaterialInputs'][$material])) {
                    $generalMaterialCost += (float) $data['owngeneralMaterialInputs'][$material];
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
            $price = !empty($data['ownLightingInputs'])
                ? (float) $data['ownLightingInputs']
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
