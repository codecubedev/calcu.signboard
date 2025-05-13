  <div class="row">
      <h2>Main Lettering Cost</h2>
      <div class="col-6">
          <div class="mb-3">
              <label for="mainText">Main Lettering Text</label>
              <input type="text" class="form-control form-control-sm" id="mainText" wire:model.live="mainText">
          </div>
      </div>
      <div class="col-6">
          <div class="mb-3">
              <label for="mainCharacterCount">Character Count</label>
              <input type="text" class="form-control form-control-sm" id="mainCharacterCount"
                  wire:model="maincharacterCount" readonly>
          </div>
      </div>

      <div class="col-6">
          <div class="mb-3">
              <label for="mainHeight">Height (inches)</label>
              <input type="number" class="form-control form-control-sm" id="mainHeight" wire:model="mainHeight">
          </div>
      </div>
      <div class="col-6">
          <div class="mb-3">
              <label for="mainWidth">Width (inches)</label>
              <input type="number" class="form-control form-control-sm" id="mainWidth" wire:model="mainWidth">
          </div>

      </div>

      <div class="mb-3 border p-3 rounded">
          <label>Main Lettering Materials</label>
          <div class="row">
              <div class="col-md-4">
                  <strong>Clear Acrylic</strong>
                  @foreach ([3, 5, 10, 15, 20, 25] as $size)
                      <div>
                          <input type="checkbox" class="clear-acrylic form-check-input" wire:model="mainMaterials"
                              value="acrylic{{ $size }}mm">
                          <label>Acrylic {{ $size }}MM</label>
                      </div>
                  @endforeach
                  <b>White Acrylic</b>
                  <div>
                      <input type="checkbox" class="white-acrylic form-check-input" wire:model="mainMaterials"
                          value="whiteacrylic3mm">
                      <label>Acrylic 3MM</label>
                  </div>
              </div>

              <div class="col-md-4">
                  <strong>PVC</strong>
                  @foreach ([3, 5, 10, 15, 20, 25] as $size)
                      <div>
                          <input type="checkbox" class="form-check-input" wire:model="mainMaterials"
                              value="pvc{{ $size }}mm">
                          <label>PVC {{ $size }}MM</label>
                      </div>
                  @endforeach
              </div>
              <div class="col-md-4">
                  <!-- Main Sticker Checkbox -->
                  <input class="form-check-input" type="checkbox" wire:model="mainStickerHeightWidth"
                      id="mainStickerCheckbox" onchange="toggleMainStickerOptions()">
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
                          <input class="form-check-input sticker-options" type="checkbox"
                              wire:model="mainstickerMaterial" value="{{ $value }}" disabled>
                          <label class="form-check-label">{{ $label }}</label>
                      </div>
                  @endforeach
              </div>


          </div>
          <div class="row mt-3">

              <div class="col-md-4">
                  <strong>General Material</strong>
                  <div>
                      <input type="checkbox" class="form-check-input" id="channel3d" wire:model="maingeneralMaterial"
                          value="channel3d">
                      <label for="channel3d">3D Channel</label>
                  </div>
                  <div>
                      <input type="checkbox" class="form-check-input" id="aluminiumBoxUp"
                          wire:model="maingeneralMaterial" value="aluminiumBoxUp">
                      <label for="aluminiumBoxUp">Aluminium Box Up</label>
                  </div>
              </div>

              <div class="col-md-4">
                  <strong>Others</strong>

                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" wire:model="mainPaintHeightWidth">
                      <label class="form-check-label">Paint</label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" wire:model="mainoracalHeightWidth">
                      <label class="form-check-label">Oracal </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" wire:model.live="mainlightHeightWidth">
                      <label class="form-check-label">Lighting </label>
                  </div>
              </div>


          </div>
          @if ($mainlightHeightWidth)
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
                                  <input class="form-check-input" type="checkbox" wire:model="mainLightingType"
                                      value="{{ $value }}">
                                  <label class="form-check-label">{{ $label }}</label>
                              </div>
                          @endforeach

                      </div>
                  </div>
                  <div class="col-4">
                      <div class="mb-3">
                          <label for="logoPowerSupply">Power Supply</label>
                          <select class="form-select" id="logoPowerSupply" wire:model="mainPowerSupply">
                              <option value="None">None</option>
                              <option value="120W">120W</option>
                              <option value="200W">200W</option>
                              <option value="400W">400W</option>
                          </select>
                      </div>
                  </div>
                  <div class="col-4">
                      <div class="mb-3">
                          <label for="logoPowerSupplyQuantity">Power Supply
                              Quantity</label>
                          <input type="number" class="form-control form-control-sm" id="mainPowerSupplyQuantity"
                              wire:model="mainPowerSupplyQuantity" min="1">
                      </div>
                  </div>
              </div>
          @endif
      </div>
  </div>
  <script>
      function updateMainCharacterCount() {
          let textInput = document.getElementById("mainText").value;
          document.getElementById("mainCharacterCount").value = textInput.length;
      }
  </script>
