 <div class="row">
     <h2>Additional Lettering Text</h2>
     <div class="col-6">
         <div class="mb-3">
             <label for="mainText">Additional Lettering Text</label>
             <input type="text" class="form-control form-control-sm" id="addText" wire:model.live="addText"
                 oninput="updateaddCharacterCount()">
         </div>
     </div>
     <div class="col-6">
         <div class="mb-3">
             <label for="addCharacterCount">Character Count</label>
             <input type="text" class="form-control form-control-sm" id="addCharacterCount"
                 wire:model="characterCount" readonly>
         </div>
     </div>
     <div class="col-6">
         <div class="mb-3">
             <label for="addHeight">Height (inches)</label>
             <input type="number" class="form-control form-control-sm" id="addHeight" wire:model="addHeight">
         </div>
     </div>
     <div class="col-6">
         <div class="mb-3">
             <label for="addWidth">Width (inches)</label>
             <input type="number" class="form-control form-control-sm" id="addWidth" wire:model="addWidth">
         </div>

     </div>

     <div class="mb-3 border p-3 rounded">
         <label>Additional Lettering Materials</label>
         <div class="row">
             <div class="col-md-4">
                 <strong>Clear Acrylic</strong>
                 @foreach ([3, 5, 10, 15, 20, 25] as $size)
                     <div>
                         <input type="checkbox" class="clear-acrylic form-check-input" wire:model="addMaterials"
                             value="acrylic{{ $size }}mm">
                         <label>Acrylic {{ $size }}MM</label>
                     </div>
                 @endforeach
                 <b>White Acrylic</b>
                 <div>
                     <input type="checkbox" class="white-acrylic form-check-input" wire:model="addMaterials"
                         value="whiteacrylic3mm">
                     <label>Acrylic 3MM</label>
                 </div>
             </div>

             <div class="col-md-4">
                 <strong>PVC</strong>
                 @foreach ([3, 5, 10, 15, 20, 25] as $size)
                     <div>
                         <input type="checkbox" class="form-check-input" wire:model="addMaterials"
                             value="pvc{{ $size }}mm">
                         <label>PVC {{ $size }}MM</label>
                     </div>
                 @endforeach
             </div>
             <div class="col-md-4">
                 <!-- Main Sticker Checkbox -->
                 <input class="form-check-input" type="checkbox" wire:model="addStickerHeightWidth"
                     id="addStickerCheckbox" onchange="toggleaddStickerOptions()">
                 <label class="form-check-label"><strong>Sticker</strong></label>

                 @php
                     $stickerMaterialsFirst = [
                         'whiteStickerMattLamm' => 'White Sticker Matt Lamm',
                         'greyBase' => 'Grey Base',
                         'lightboxSticker' => 'Lightbox Sticker',
                         'reverseSticker' => 'Reverse Sticker',
                         'dieCutStickerWhite' => 'Die Cut Sticker White',
                         'dieCutStickerBlack' => 'Die Cut Sticker Black',
                         'dieCutStickerPrinted' => 'Die Cut Sticker Printed',
                     ];
                 @endphp

                 @foreach ($stickerMaterialsFirst as $value => $label)
                     <div class="form-check">
                         <input class="form-check-input sticker-options" type="checkbox" wire:model="addstickerMaterial"
                             value="{{ $value }}" disabled>
                         <label class="form-check-label">{{ $label }}</label>
                     </div>
                 @endforeach
             </div>

         </div>
         <div class="row mt-3">

             <div class="col-md-4">
                 <strong>General Material</strong>
                 <div>
                     <input type="checkbox" class="form-check-input" id="channel3d" wire:model="addgeneralMaterial"
                         value="channel3d">
                     <label for="channel3d">3D Channel</label>
                 </div>
                 <div>
                     <input type="checkbox" class="form-check-input" id="aluminiumBoxUp" wire:model="addgeneralMaterial"
                         value="aluminiumBoxUp">
                     <label for="aluminiumBoxUp">Aluminium Box Up</label>
                 </div>
             </div>

             <div class="col-md-4">
                 <strong>Others</strong>

                 <div class="form-check">
                     <input class="form-check-input" type="checkbox" wire:model="addPaintHeightWidth">
                     <label class="form-check-label">Paint</label>
                 </div>
                 <div class="form-check">
                     <input class="form-check-input" type="checkbox" wire:model="addoracalHeightWidth">
                     <label class="form-check-label">Oracal </label>
                 </div>
                 <div class="form-check">
                     <input class="form-check-input" type="checkbox" wire:model.live="addlightHeightWidth">
                     <label class="form-check-label">Lighting </label>
                 </div>
             </div>


         </div>
         @if ($addlightHeightWidth)
             <div class="row mt-3">
                 <div class="col-4">
                     <div class="mb-3">
                         <label>Lighting Type</label>
                         @php
                             $lighting = [
                                 'frontlit' => 'Frontlit',
                                 'backlit' => 'Backlit',
                                 'sidelit' => 'Sidelit',
                                 'nolight' => 'No light',
                             ];
                         @endphp

                         @foreach ($lighting as $value => $label)
                             <div class="form-check">
                                 <input class="form-check-input" type="checkbox" wire:model="addLightingType"
                                     value="{{ $value }}">
                                 <label class="form-check-label">{{ $label }}</label>
                             </div>
                         @endforeach

                     </div>
                 </div>
                 <div class="col-4">
                     <div class="mb-3">
                         <label for="addPowerSupply">Power Supply</label>
                         <select class="form-select" id="addPowerSupply" wire:model="addPowerSupply">
                             <option value="None">None</option>
                             <option value="120W">120W</option>
                             <option value="200W">200W</option>
                             <option value="400W">400W</option>
                         </select>
                     </div>
                 </div>
                 <div class="col-4">
                     <div class="mb-3">
                         <label for="addPowerSupplyQuantity">Power Supply
                             Quantity</label>
                         <input type="number" class="form-control form-control-sm" id="addPowerSupplyQuantity"
                             wire:model="addPowerSupplyQuantity" min="1">
                     </div>
                 </div>
             </div>
         @endif
     </div>
 </div>
<script>
    function updateaddCharacterCount() {
        let textInput = document.getElementById("addText").value;
        document.getElementById("addCharacterCount").value = textInput.length;
    }
</script>