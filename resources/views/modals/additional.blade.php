<div>
    <h2>Additional Lettering Cost</h2>

    <div class="mb-3 text-end">
        <button wire:click="additionalForm" class="btn btn-primary">Add</button>
    </div>

    @foreach ($addCost as $index => $form)
    <div class="border p-3 mb-4 rounded">
        <div class="d-flex justify-content-between">
            <h4>Additional Cost {{ $index + 1 }}</h4>
            <button class="btn btn-danger btn-sm" wire:click="addremoveForm({{ $index }})">Remove</button>
        </div>

        <div class="row">
            <div class="col-6 mb-3">
                <label>Additional Text</label>
                <input type="text" class="form-control form-control-sm logo-text-input"
                    wire:model="addCost.{{ $index }}.addText" data-index="{{ $index }}">
            </div>
            <div class="col-6 mb-3">
                <label>Character Count</label>
                <input type="text" class="form-control form-control-sm" readonly
                    id="char-count-{{ $index }}" value="{{ $addCost[$index]['characterCount'] ?? '' }}">
            </div>

            <div class="col-6 mb-3">
                <label>Additional Height (inches)</label>
                <input type="text" class="form-control form-control-sm"
                    wire:model="addCost.{{ $index }}.addHeight">
            </div>
            <div class="col-6 mb-3">
                <label>Additional Width (inches)</label>
                <input type="text" class="form-control form-control-sm"
                    wire:model="addCost.{{ $index }}.addWidth">
            </div>

            <div class="col-12">
                <h5>Raw Materials</h5>
                <div class="row">
                    <!-- Clear Acrylic -->
                    <div class="col-md-3">
                        <strong>Clear Acrylic</strong>
                        @foreach ([3, 5, 10, 15, 20, 25] as $size)
                        <div>
                            <input type="checkbox" class="form-check-input"
                                wire:model="addCost.{{ $index }}.addMaterials"
                                wire:change="toggleAddAcrylicInput({{ $index }}, {{ $size }})"
                                value="acrylic{{ $size }}mm">
                            <label>Acrylic {{ $size }}MM</label>
                            @if (!empty($addCost[$index]['showAcrylicInput']) && $addCost[$index]['showAcrylicInput'] == $size)
                            <div class="col-4">
                                <div class="mt-1 ms-4">
                                    <input type="text"
                                        class="form-control form-control-sm" wire:model="addCost.{{ $index }}.addacrylicInput">
                                </div>
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>

                    <!-- Black Acrylic -->
                    <div class="col-md-3">
                        <strong>Black Acrylic</strong>
                        @foreach ([3, 5, 10, 15, 20, 25] as $size)
                        <div>
                            <input type="checkbox" class="form-check-input"
                                wire:model="addCost.{{ $index }}.addMaterials"
                                wire:change="toggleAddBlackAcrylicInput({{ $index }}, {{ $size }})"
                                value="black_acrylic{{ $size }}mm">
                            <label>Black Acrylic {{ $size }}MM</label>

                            @if (!empty($addCost[$index]['showBlackAcrylicInput']) && in_array($size, $addCost[$index]['showBlackAcrylicInput']))
                            <div class="col-4">
                                <div class="mt-1 ms-4">
                                    <input type="text"
                                        class="form-control form-control-sm"
                                        wire:model="addCost.{{ $index }}.addblackAcrylicInputs">
                                </div>
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>

                    <!-- PVC -->
                    <div class="col-md-3">
                        <strong>PVC</strong>
                        @foreach ([3, 5, 10, 15, 20, 25] as $size)
                        <div>
                            <input type="checkbox" class="form-check-input"
                                wire:model="addCost.{{ $index }}.addMaterials"
                                wire:change="toggleAddPVCInput({{ $index }}, {{ $size }})"
                                value="pvc{{ $size }}mm">
                            <label>PVC {{ $size }}MM</label>
                            @if (!empty($addCost[$index]['showPVCInput']) && in_array($size, $addCost[$index]['showPVCInput']))
                            <div class="col-4">

                                <div class="mt-1 ms-4">
                                    <input type="text" class="form-control form-control-sm"
                                        wire:model="addCost.{{ $index }}.addpvcInputs">
                                </div>
                            </div>
                            @endif

                        </div>
                        @endforeach
                    </div>

                    <div class="col-md-3">
                        <h6>Stainless Steel (Silver)</h6>
                        @foreach ([
                        'mirror_frontlit' => 'Mirror Frontlit',
                        'mirror_backlit' => 'Mirror Backlit',
                        'mirror_boxup' => 'Mirror BoxUp',
                        'hairline_frontlit' => 'Hairline Frontlit',
                        'hairline_backlit' => 'Hairline Backlit',
                        'hairline_boxup' => 'Hairline BoxUp',
                        ] as $key => $label)
                        <div class="form-check mb-1">
                            <input type="checkbox" class="form-check-input"
                                wire:model="addCost.{{ $index }}.addMaterials"
                                wire:change="toggleAddStainlessSteelInput
                                                    ({{ $index }}, '{{ $key }}')"
                                value="{{ $key }}">
                            <label class="form-check-label">{{ $label }}</label>

                            @if (!empty($addCost[$index]['showInputs']) && in_array($key, $addCost[$index]['showInputs']))
                            <div class="mt-1 ms-4">
                                <div class="col-4">
                                    <input type="text" class="form-control form-control-sm"
                                        wire:model="addCost.{{ $index }}.addstainlessteelsilverInputs">
                                </div>
                            </div>
                            @endif

                        </div>
                        @endforeach
                    </div>


                    <!-- Stainless Steel (Gold) -->
                    <div class="col-md-3">
                        <h6>Stainless Steel (Gold)</h6>
                        @foreach ([
                        'gold_mirror_frontlit' => 'Mirror Frontlit',
                        'gold_mirror_backlit' => 'Mirror Backlit',
                        'gold_mirror_boxup' => 'Mirror BoxUp',
                        'gold_hairline_frontlit' => 'Hairline Frontlit',
                        'gold_hairline_backlit' => 'Hairline Backlit',
                        'gold_hairline_boxup' => 'Hairline BoxUp',
                        ] as $key => $label)
                        <div class="form-check mb-1">
                            <input type="checkbox" class="form-check-input"
                                wire:model="addCost.{{ $index }}.addMaterials"
                                wire:change="toggleAddStainlessgoldInput({{ $index }}, '{{ $key }}')"
                                value="{{ $key }}">
                            <label class="form-check-label">{{ $label }}</label>

                            @if (isset($addCost[$index]['showInputs']) && in_array($key, $addCost[$index]['showInputs']))
                            <div class="mt-1 ms-4">
                                <div class="col-4">
                                    <input type="text" class="form-control form-control-sm"
                                        wire:model="addCost.{{ $index }}.addstainlessteelgoldInputs">

                                </div>

                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>

                    <div class="col-md-3">
                        <h6>Neon</h6>
                        @foreach ([
                        '5mm_clear_arcylic' => '5mm Clear Acrylic',
                        '10mm_clear_arcylic' => '10mm Clear Acrylic',
                        ] as $key => $label)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input"
                                wire:model="addCost.{{ $index }}.addMaterials"
                                wire:change="toggleAddNeonInput({{ $index }}, '{{ $key }}')"
                                value="{{ $key }}">
                            <label class="form-check-label">{{ $label }}</label>
                            @if (!empty($addCost[$index]['showInputs']) && in_array($key, $addCost[$index]['showInputs']))
                            <div class="mt-1 ms-4">
                                <div class="col-4">
                                    <input type="text" class="form-control form-control-sm"
                                        wire:model="addCost.{{ $index }}.addneonmaterialInputs">
                                </div>
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>

                    <div class="col-md-3" x-data="{ enabled: @entangle('addCost.' . $index . '.addStickerHeightWidth') }">
                        <strong>Sticker</strong>
                        <div>
                            <input type="checkbox" class="form-check-input" x-model="enabled"
                                wire:model="addCost.{{ $index }}.addStickerHeightWidth">
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
                                wire:model="addCost.{{ $index }}.stickerMaterial"
                                wire:change="toggleAddStickerInput({{ $index }}, '{{ $val }}')"
                                value="{{ $val }}" :disabled="!enabled">
                            <label>{{ $label }}</label>


                            @if (!empty($addCost[$index]['showInputs']) && in_array($val, $addCost[$index]['showInputs']))
                            <div class="mt-1 ms-4 col-4">
                                <input type="text" class="form-control form-control-sm"
                                    wire:model="addCost.{{ $index }}.stickermaterialInputs">
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>


                    <!-- General Materials -->
                    <div class="col-md-3">
                        <strong>General Material</strong>
                        @foreach ([
                        'channel3d' => '3D Channel',
                        'aluminiumBoxUp' => 'Aluminium Box Up',
                        'ironHollow20mm' => 'Iron Hollow 20mm',
                        'ironHollow10mm' => 'Iron Hollow 10mm',
                        'spotlightWithBracket' => 'Spotlight + bracket (1 set)',
                        'dimmer' => 'Dimmer',
                        ] as $key => $label)
                        <div>
                            <input type="checkbox" class="form-check-input"
                                wire:model="addCost.{{ $index }}.generalMaterial"
                                wire:change="toggleAddGeneralMaterialInput({{ $index }}, '{{ $key }}')"
                                value="{{ $key }}">
                            <label>{{ $label }}</label>

                            @if (!empty($addCost[$index]['showGeneralInputs']) && in_array($key, $addCost[$index]['showGeneralInputs']))
                            <div class="mt-1 ms-4 col-4">
                                <input type="text" class="form-control form-control-sm"
                                    wire:model="addCost.{{ $index }}.addgeneralMaterialInput">
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>

                    
                    <div class="col-md-4">
                        <strong>Others</strong>
                       
                       
                        <div>
                            <input type="checkbox" class="form-check-input"
                                wire:model="addCost.{{ $index }}.addPaintHeightWidth"
                                wire:change="toggleAddPaintInput({{ $index }}, 'paint')"
                                value="{{ $key }}">
                            <label>Paint</label>

                            @if (!empty($addCost[$index]['showGeneralInputs']) && in_array('paint', $addCost[$index]['showGeneralInputs']))
                            <div class="mt-1 ms-4 col-4">
                                <input type="text" class="form-control form-control-sm"
                                    wire:model="addCost.{{ $index }}.addpaintInputs">
                            </div>
                            @endif
                        </div>

                        <div>
                            <input type="checkbox" class="form-check-input"
                                wire:model="addCost.{{ $index }}.addOracalHeightWidth.{{ $key }}"
                                wire:change="toggleAddOrcalMaterialInput({{ $index }}, '{{ $key }}')"
                                value="{{ $key }}">
                            <label>Oracal</label>

                            @if (!empty($addCost[$index]['showGeneralInputs']) && in_array($key, $addCost[$index]['showGeneralInputs']))
                            <div class="mt-1 ms-4 col-4">
                                <input type="text"
                                    class="form-control form-control-sm"
                                    wire:model="addCost.{{ $index }}.addoracalInputs">
                            </div>
                            @endif
                        </div>

                        <div>
                            <input type="checkbox" class="form-check-input"
                                wire:model.defer="addCost.{{ $index }}.addlightHeightWidth"
                                wire:change="$refresh">
                            <label>Lighting</label>

                        </div>
                    </div>
                </div>
            </div>
            <hr>


            @if ($form['addlightHeightWidth'])
            <div class="row mt-3">
                <div class="col-4">
                    <label>Lighting Type</label>
                    @foreach (['frontlit', 'backlit', 'sidelit', 'nolight'] as $type)
                    <div>
                        <input type="checkbox" class="form-check-input"
                            wire:model="addCost.{{ $index }}.addLightingType"
                            wire:click="addcheckpowersupply({{ $index }})"
                            wire:change="toggleAddLightingInput({{ $index }}, '{{ $type }}')"
                            value="{{ $type }}">
                        <label>{{ ucfirst($type) }}</label>

                        @if (!empty($addCost[$index]['showLightingInputs']) && in_array($type, $addCost[$index]['showLightingInputs']))
                        <div class="mt-1 ms-4 col-4">
                            <input type="text"
                                class="form-control form-control-sm"
                                wire:model="addCost.{{ $index }}.addLightingDetails">
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
                <div class="col-4">
                    <label>Power Supply</label>
                    <select class="form-select" wire:model="addCost.{{ $index }}.addPowerSupply">
                        {{-- <option value="None">None</option>
                                <option value="120W">120W</option>
                                <option value="200W">200W</option> --}}
                        <option value="400W">400W</option>
                    </select>
                </div>
                <div class="col-4">
                    <label>Power Supply Quantity</label>
                    <input type="number" min="0" class="form-control form-control-sm"
                        wire:model="addCost.{{ $index }}.addPowerSupplyQuantity" readonly
                        style="font-weight: bold; background-color: #f0f0f0; color: #000;">
                </div>
            </div>
            @endif
        </div>
    </div>
    @endforeach
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.logo-text-input').forEach(function(input) {
            input.addEventListener('input', function() {
                const index = this.dataset.index;
                const charCountInput = document.getElementById(`char-count-${index}`);
                if (charCountInput) {
                    charCountInput.value = this.value.length;
                }
            });
        });
    });
</script>