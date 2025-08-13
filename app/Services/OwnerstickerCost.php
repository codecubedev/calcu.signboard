<?php

namespace App\Services;

class OwnerstickerCost
{
    public function owncalculate(array $data): float
    {
        $height = (float) $data['height'];
        $width = (float) $data['width'];
        $pcs = (int) ($data['pcs'] ?? 1);
        $area = $height * $width;
        $materialPrices = $data['materialPrices'] ?? [];

        $acrylicCost = 0;
        $blackAcrylicCost = 0;
        $pvcCost = 0;
        $whiteAcrylicCost = 0;
        $stainlessSteelCost = 0;
        $neonCost = 0; // ✅ Neon added

        foreach ($data['materials'] as $material) {
            $price = $materialPrices[$material] ?? 0;

            if (strpos($material, 'acrylic') !== false && strpos($material, 'black') === false && strpos($material, 'neon') === false) {
                $acrylicCost += $area * $price;
            } elseif (strpos($material, 'black_acrylic') !== false) {
                $blackAcrylicCost += $area * $price;
            } elseif (strpos($material, 'pvc') !== false) {
                $pvcCost += $area * $price;
            } elseif ($material === 'whiteacrylic3mm') {
                $whiteAcrylicCost += $area * $price;
            } elseif (
                str_contains($material, 'mirror') || str_contains($material, 'hairline') || str_contains($material, 'gold')
            ) {
                $stainlessSteelCost += $area * $price;
            } elseif (strpos($material, 'neon') !== false || str_contains($material, 'clear acrylic')) {
                $neonCost += $area * $price; // ✅ Neon or clear acrylic
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
        $powerSupplyCost = ($data['powerSupplyPrices'][$data['powerSupply']] ?? 0) * $data['powerSupplyQty'];

        // Paint and Oracal
        $paintCost = $data['usePaint'] ? ($area / 144) * 7.50 : 0;
        $orcaleCost = $data['useOrcale'] ? ($area / 144) * 14.50 : 0;

        // General Material Cost
        $generalMaterialCost = 0;
        foreach ($data['generalMaterials'] as $material) {
            if (is_callable($data['generalMaterialCostFunction'])) {
                $generalMaterialCost += call_user_func($data['generalMaterialCostFunction'], $material, $height, $width, $pcs);
            }
        }

        // Lighting Type Cost
        $lightingTypeCost = 0;
        foreach ($data['lightingTypes'] as $lighting) {
            $lightingTypeCost += $data['lightingTypePrices'][$lighting] ?? 0;
        }

        return $acrylicCost + $blackAcrylicCost + $pvcCost + $whiteAcrylicCost + $stainlessSteelCost
            + $neonCost 
            + $stickerCost + $lightingCost + $powerSupplyCost + $paintCost
            + $generalMaterialCost + $lightingTypeCost + $orcaleCost;
    }
}
