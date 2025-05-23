<?php

namespace App\Services;

class LogoCostCalculation
{
    public function calculate(array $data): float
    {
        // Force numerical values
        $height = (float) $data['height'];
        $width = (float) $data['width'];
        $pcs = (int) ($data['pcs'] ?? 1);
        $area = $height * $width;

        $materialPrices = $data['materialPrices'] ?? [];

        $acrylicCost = 0;
        $pvcCost = 0;
        $whiteAcrylicCost = 0;

        foreach ($data['materials'] as $material) {
            if (isset($materialPrices[$material])) {
                $price = (float) $materialPrices[$material];
                if (strpos($material, 'acrylic') !== false) {
                    $acrylicCost += $area * $price;
                } elseif (strpos($material, 'pvc') !== false) {
                    $pvcCost += $area * $price;
                }
            }

            if ($material === 'whiteacrylic3mm') {
                $whiteAcrylicCost += $area * ((float) ($materialPrices['whiteacrylic3mm'] ?? 0));
            }
        }

        // Sticker Cost
        $stickerArea = $data['useSticker'] ? $area / 144 : 0;
        $stickerCost = 0;
        foreach ($data['stickers'] as $sticker) {
            $stickerCost += $stickerArea * ((float) ($data['stickerPrices'][$sticker] ?? 0));
        }

        // Lighting Cost
        $lightingCost = $data['useLighting'] ? ($area / 144) * 27 : 0;

        // Power Supply Cost
        $powerSupplyPrice = (float) ($data['powerSupplyPrices'][$data['powerSupply']] ?? 0);
        $powerSupplyQty = (int) $data['powerSupplyQty'];
        $powerSupplyCost = $powerSupplyPrice * $powerSupplyQty;

        // Paint and Oracal Costs
        $paintCost = $data['usePaint'] ? ($area / 144) * 7.50 : 0;
        $orcaleCost = $data['useOrcale'] ? ($area / 144) * 10.8 : 0;

        // General Material Cost
        $generalMaterialCost = 0;
        foreach ($data['generalMaterials'] as $material) {
            if (is_callable($data['generalMaterialCostFunction'])) {
                $generalMaterialCost += call_user_func(
                    $data['generalMaterialCostFunction'],
                    $material,
                    $height,
                    $width,
                    $pcs
                );
            }
        }

        // Lighting Type Cost
        $lightingTypeCost = 0;
        foreach ($data['lightingTypes'] as $lighting) {
            $lightingTypeCost += (float) ($data['lightingTypePrices'][$lighting] ?? 0);
        }

        // Return total cost
        return $acrylicCost + $pvcCost + $stickerCost + $lightingCost + $powerSupplyCost + $paintCost + $generalMaterialCost + $lightingTypeCost + $orcaleCost;
    }
}
