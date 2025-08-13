<?php

namespace App\Services;

class AddLetteringCost
{
    public function addcalculate(array $data): float
    {
        $height = (float) $data['height'];
        $width = (float) $data['width'];
        $pcs = (int) ($data['pcs'] ?? 1);
        $area = $height * $width;

        $materialPrices = $data['materialPrices'] ?? [];

        $acrylicCost = 0;
        $pvcCost = 0;
        $whiteAcrylicCost = 0;
        $blackAcrylicCost = 0;
        $stainlessSteelCost = 0;
        $neonCost = 0; // <-- New variable for neon

        foreach ($data['materials'] as $material) {
            if (isset($materialPrices[$material])) {
                $price = (float) $materialPrices[$material];

                if (strpos($material, 'acrylic') !== false && strpos($material, 'black') === false && strpos($material, 'neon') === false) {
                    $acrylicCost += $area * $price;
                } elseif (strpos($material, 'black_acrylic') !== false) {
                    $blackAcrylicCost += $area * $price;
                } elseif (strpos($material, 'pvc') !== false) {
                    $pvcCost += $area * $price;
                } elseif (strpos($material, 'mirror') !== false || strpos($material, 'hairline') !== false) {
                    $stainlessSteelCost += $area * $price;
                } elseif (strpos($material, 'neon') !== false || str_contains($material, 'clear arcylic')) {
                    $neonCost += $area * $price;
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
            if (isset($data['stickerPrices'][$sticker])) {
                $stickerCost += $stickerArea * $data['stickerPrices'][$sticker];
            }
        }

        // Lighting Cost
        $lightingCost = $data['useLighting'] ? ($area / 144) * 27 : 0;

        // Power Supply Cost
        $powerSupplyCost = $data['powerSupplyPrices'][$data['powerSupply']] ?? 0;
        $powerSupplyCost *= $data['powerSupplyQty'];

        // Paint and Oracal Costs
        $paintCost = $data['usePaint'] ? ($area / 144) * 7.50 : 0;
        $orcaleCost = $data['useOrcale'] ? ($area / 144) * 14.50 : 0;

        // General Material Cost
        $generalMaterialCost = 0;
        foreach ($data['generalMaterials'] as $material) {
            if (is_callable($data['generalMaterialCostFunction'])) {
                $generalMaterialCost += call_user_func($data['generalMaterialCostFunction'], $material, $data['height'], $data['width'], $data['pcs']);
            }
        }

        // Lighting Type Cost
        $lightingTypeCost = 0;
        foreach ($data['lightingTypes'] as $lighting) {
            if (isset($data['lightingTypePrices'][$lighting])) {
                $lightingTypeCost += $data['lightingTypePrices'][$lighting];
            }
        }

        return $acrylicCost + $blackAcrylicCost + $pvcCost + $whiteAcrylicCost + $stainlessSteelCost
            + $neonCost + $stickerCost + $lightingCost + $powerSupplyCost + $paintCost + $generalMaterialCost
            + $lightingTypeCost + $orcaleCost;
    }
}
