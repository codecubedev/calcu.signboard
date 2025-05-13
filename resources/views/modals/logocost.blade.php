 <div>
     <div class="text-end mb-3">
         <button class="btn btn-primary" wire:click="addForm">+</button>
     </div>

     @foreach ($logoCost as $index => $form)
         <div class="border p-3 mb-4 rounded">
             <div class="d-flex justify-content-between">
                 <h4>Logo Cost {{ $index + 1 }}</h4>
                 <button class="btn btn-danger btn-sm" wire:click="removeForm({{ $index }})">Remove</button>
             </div>

             <div class="row">
                 <div class="col-6 mb-3">
                     <label>Logo Text</label>
                     <input type="text" class="form-control form-control-sm" wire:model.live="logoText"
                         oninput="updateCharacterCount()">
                 </div>
                 <div class="col-6 mb-3">
                     <label>Character Count</label>
                     <input type="text" class="form-control form-control-sm" wire:model="characterCount" readonly>
                 </div>
                 <div class="col-6 mb-3">
                     <label>Logo Height (inches)</label>
                     <input type="text" class="form-control form-control-sm"
                         wire:model="logoCost.{{ $index }}.logoHeight">
                 </div>
                 <div class="col-6 mb-3">
                     <label>Logo Width (inches)</label>
                     <input type="text" class="form-control form-control-sm"
                         wire:model="logoCost.{{ $index }}.logoWidth">
                 </div>

                 <div class="col-12">
                     <h5>Materials</h5>
                     <div class="row">
                         <div class="col-md-4">
                             <strong>Clear Acrylic</strong>
                             @foreach ([3, 5, 10, 15, 20, 25] as $size)
                                 <div>
                                     <input type="checkbox" class="form-check-input"
                                         wire:model="logoCost.{{ $index }}.logoMaterials"
                                         value="acrylic{{ $size }}mm">
                                     <label>Acrylic {{ $size }}MM</label>
                                 </div>
                             @endforeach
                         </div>
                         <div class="col-md-4">
                             <strong>PVC</strong>
                             @foreach ([3, 5, 10, 15, 20, 25] as $size)
                                 <div>
                                     <input type="checkbox" class="form-check-input"
                                         wire:model="logoCost.{{ $index }}.logoMaterials"
                                         value="pvc{{ $size }}mm">
                                     <label>PVC {{ $size }}MM</label>
                                 </div>
                             @endforeach
                         </div>
                         <div class="col-md-4">
                             <strong>Sticker</strong>
                             <div>
                                 <input type="checkbox" class="form-check-input"
                                     wire:model="logoCost.{{ $index }}.logoStickerHeightWidth">
                                 <label>Sticker</label>
                             </div>
                             @php
                                 $stickers = [
                                     'whiteStickerMattLamm' => 'White Sticker Matt Lamm',
                                     'greyBase' => 'Grey Base',
                                     'lightboxSticker' => 'Lightbox Sticker',
                                     'reverseSticker' => 'Reverse Sticker',
                                     'dieCutStickerWhite' => 'Die Cut Sticker White',
                                     'dieCutStickerBlack' => 'Die Cut Sticker Black',
                                     'dieCutStickerPrinted' => 'Die Cut Sticker Printed',
                                 ];
                             @endphp
                             @foreach ($stickers as $val => $label)
                                 <div>
                                     <input type="checkbox" class="form-check-input"
                                         wire:model="logoCost.{{ $index }}.stickerMaterial"
                                         value="{{ $val }}" @if (!$form['logoStickerHeightWidth']) disabled @endif>
                                     <label>{{ $label }}</label>
                                 </div>
                             @endforeach
                         </div>
                     </div>

                     <div class="row mt-3">
                         <div class="col-md-4">
                             <strong>General Material</strong>
                             <div>
                                 <input type="checkbox" class="form-check-input"
                                     wire:model="logoCost.{{ $index }}.generalMaterial" value="channel3d">
                                 <label>3D Channel</label>
                             </div>
                             <div>
                                 <input type="checkbox" class="form-check-input"
                                     wire:model="logoCost.{{ $index }}.generalMaterial" value="aluminiumBoxUp">
                                 <label>Aluminium Box Up</label>
                             </div>
                         </div>

                         <div class="col-md-4">
                             <strong>Others</strong>
                             <div>
                                 <input type="checkbox" class="form-check-input"
                                     wire:model="logoCost.{{ $index }}.logoPaintHeightWidth">
                                 <label>Paint</label>
                             </div>
                             <div>
                                 <input type="checkbox" class="form-check-input"
                                     wire:model="logoCost.{{ $index }}.logooracalHeightWidth">
                                 <label>Oracal</label>
                             </div>
                             <div>
                                 <input type="checkbox" class="form-check-input"
                                     wire:model="logoCost.{{ $index }}.logolightHeightWidth">
                                 <label>Lighting</label>
                             </div>
                         </div>
                     </div>

                     @if ($this->logoCost[$index]['logolightHeightWidth'])
                         <div class="row mt-3">
                             <div class="col-4">
                                 <label>Lighting Type</label>
                                 @foreach (['frontlit', 'backlit', 'sidelit', 'nolight'] as $type)
                                     <div>
                                         <input type="checkbox" class="form-check-input"
                                             wire:model="logoCost.{{ $index }}.logoLightingType"
                                             value="{{ $type }}">
                                         <label>{{ ucfirst($type) }}</label>
                                     </div>
                                 @endforeach
                             </div>
                             <div class="col-4">
                                 <label>Power Supply</label>
                                 <select class="form-select" wire:model="logoCost.{{ $index }}.logoPowerSupply">
                                     <option value="None">None</option>
                                     <option value="120W">120W</option>
                                     <option value="200W">200W</option>
                                     <option value="400W">400W</option>
                                 </select>
                             </div>
                             <div class="col-4">
                                 <label>Power Supply Quantity</label>
                                 <input type="number" min="1" class="form-control form-control-sm"
                                     wire:model="logoCost.{{ $index }}.logoPowerSupplyQuantity">
                             </div>
                         </div>
                     @endif

                 </div>
             </div>
         </div>
     @endforeach
 </div>
 <script>
     function updateCharacterCount() {
         let textInput = document.getElementById("logoText").value;
         document.getElementById("logoCharacterCount").value = textInput.length;
     }
      function toggleAcrylicOptions() {
        let clearAcrylics = document.querySelectorAll(".clear-acrylic");
        let whiteAcrylic = document.querySelector(".white-acrylic");

        let clearChecked = Array.from(clearAcrylics).some(input => input.checked);
        let whiteChecked = whiteAcrylic.checked;

        clearAcrylics.forEach(input => {
            input.disabled = whiteChecked;
        });

        whiteAcrylic.disabled = clearChecked;
    }

    function toggleStickerOptions() {
        let StickerCheckbox = document.getElementById("logoStickerCheckbox");
        let stickerOptions = document.querySelectorAll(".sticker-options");

        stickerOptions.forEach(input => {
            input.disabled = !StickerCheckbox.checked;
        });
    }

 </script>
