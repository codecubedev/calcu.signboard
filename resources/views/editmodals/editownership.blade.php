<div>
    @foreach ($editOwners as $index => $form)
    <div class="border p-3 mb-4 rounded">
        <div class="d-flex justify-content-between">
            <h4>Ownership Cost {{ $index + 1 }}</h4>
            <button class="btn btn-danger btn-sm" wire:click="ownerremoveForm({{ $index }})">Remove</button>
        </div>

        <div class="row">
            <!-- Ownership Text -->
            <div class="col-6 mb-3">
                <label>Ownership Text</label>
                <input type="text" class="form-control form-control-sm"
                    wire:model.live="editowncost.{{ $index }}.edit_ownText">
            </div>

            <!-- Character Count -->
            <div class="col-6 mb-3">
                <label>Character Count</label>
                <input type="text" class="form-control form-control-sm" readonly
                    value="{{ $editowncost[$index]['characterCount'] ?? '' }}">
            </div>

            <!-- Height & Width -->
            <div class="col-6 mb-3">
                <label>Ownership Height (inches)</label>
                <input type="number" step="0.01" class="form-control form-control-sm"
                    wire:model="editowncost.{{ $index }}.edit_ownHeight">
            </div>
            <div class="col-6 mb-3">
                <label>Ownership Width (inches)</label>
                <input type="number" step="0.01" class="form-control form-control-sm"
                    wire:model="editowncost.{{ $index }}.edit_ownWidth">
            </div>

            <!-- Materials Section -->
            <div class="col-12">
                <h5>Raw Materials</h5>
                <div class="row">
                    <!-- Clear Acrylic -->

                    <div class="col-md-3">
                        <strong>Clear Acrylic</strong>
                        @foreach ([3, 5, 10, 15, 20, 25] as $size)
                        <div class="mb-1">
                            <input type="checkbox" class="form-check-input"
                                wire:model="editowncost.{{ $index }}.edit_ownMaterials"
                                wire:change="toggleOwnAcrylicInput({{ $index }}, {{ $size }})"
                                value="acrylic{{ $size }}mm">
                            <label>Acrylic {{ $size }}MM</label>
                            @if (!empty($editowncost[$index]['showAcrylicInput']) && $editowncost[$index]['showAcrylicInput'] == $size)
                            <div class="col-4">
                                <div class="mt-1 ms-4">
                                    <input type="text"
                                        class="form-control form-control-sm"
                                        wire:model="editowncost.{{ $index }}.edit_ownacrylicInput">
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
                        <div class="form-check mb-1">
                            <input type="checkbox" class="form-check-input"
                                wire:model="editowncost.{{ $index }}.edit_ownMaterials"
                                wire:change="toggleOwnBlackAcrylicInput({{ $index }}, {{ $size }}) "
                                value="black_acrylic{{ $size }}mm">
                            <label>Black Acrylic {{ $size }}MM</label>
                            @if (!empty($editowncost[$index]['showBlackAcrylicInput']) && in_array($size, $editowncost[$index]['showBlackAcrylicInput']))
                            <div class="col-4">
                                <div class="mt-1 ms-4">
                                    <input type="text"
                                        class="form-control form-control-sm"
                                        wire:model="editowncost.{{ $index }}.edit_ownblackAcrylicInputs">
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
                                wire:model="editowncost.{{ $index }}.edit_ownMaterials"
                                wire:change="toggleOwnPVCInput({{ $index }}, {{ $size }})"
                                value="pvc{{ $size }}mm">
                            <label>PVC {{ $size }}MM</label>
                            @if (!empty($editowncost[$index]['showPVCInput']) && in_array($size, $editowncost[$index]['showPVCInput']))
                            <div class="col-4">

                                <div class="mt-1 ms-4">
                                    <input type="text" class="form-control form-control-sm"
                                        wire:model="editowncost.{{ $index }}.edit_ownpvcInputs">
                                </div>
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>

                    <!-- Stainless Steel (Silver) -->
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
                        <div>
                            <input type="checkbox" class="form-check-input"
                                wire:model="editowncost.{{ $index }}.edit_ownMaterials"
                                wire:change="toggleOwnStainlessSteelInput({{ $index }}, '{{ $key }}')"
                                value="{{ $key }}">
                            <label>{{ $label }}</label>
                            @if (!empty($editowncost[$index]['showInputs']) && in_array($key, $editowncost[$index]['showInputs']))
                            <div class="mt-1 ms-4">
                                <div class="col-4">
                                    <input type="text" class="form-control form-control-sm"
                                        wire:model="editowncost.{{ $index }}.edit_ownstainlessteelsilverInputs">
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
                        <div>
                            <input type="checkbox" class="form-check-input"
                                wire:model="editowncost.{{ $index }}.edit_ownMaterials"
                                wire:change="toggleOwnStainlessgoldInput({{ $index }}, '{{ $key }}')"
                                value="{{ $key }}">
                            <label>{{ $label }}</label>
                            @if (isset($editowncost[$index]['showInputs']) && in_array($key, $editowncost[$index]['showInputs']))
                            <div class="mt-1 ms-4">
                                <div class="col-4">
                                    <input type="text" class="form-control form-control-sm"
                                        wire:model="editowncost.{{ $index }}.edit_ownstainlessteelgoldInputs">

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
                                wire:model="editowncost.{{ $index }}.edit_ownMaterials"
                                wire:change="toggleOwnNeonInput({{ $index }}, '{{ $key }}')"
                                value="{{ $key }}">
                            <label class="form-check-label">{{ $label }}</label>
                            @if (!empty($editowncost[$index]['showInputs']) && in_array($key, $editowncost[$index]['showInputs']))
                            <div class="mt-1 ms-4">
                                <div class="col-4">
                                    <input type="text" class="form-control form-control-sm"
                                        wire:model="editowncost.{{ $index }}.edit_ownneonmaterialInputs">
                                </div>
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>


                    <!-- Sticker -->
                    <div class="col-md-3" x-data="{ enabled: @entangle('editowncost.' . $index . '.ownStickerHeightWidth') }">
                        <strong>Sticker</strong>
                        <div>
                            <input type="checkbox" class="form-check-input" x-model="enabled"
                                wire:model="editowncost.{{ $index }}.edit_ownStickerHeightWidth">
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
                                wire:model="editowncost.{{ $index }}.edit_stickerMaterial"
                                wire:change="toggleOwnStickerInput({{ $index }}, '{{ $val }}')"
                                value="{{ $val }}" :disabled="!enabled">
                            <label>{{ $label }}</label>
                            @if (!empty($editowncost[$index]['showInputs']) && in_array($val, $editowncost[$index]['showInputs']))
                            <div class="mt-1 ms-4 col-4">
                                <input type="text" class="form-control form-control-sm"
                                    wire:model="editowncost.{{ $index }}.edit_stickermaterialInputs">
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
                        ] as $value => $label)
                        <div>
                            <input type="checkbox" class="form-check-input"
                                wire:model="editowncost.{{ $index }}.edit_generalMaterial"
                                wire:change="toggleOwnGeneralMaterialInput({{ $index }}, '{{ $value }}')"
                                value="{{ $value }}">
                            <label>{{ $label }}</label>

                            @if (!empty($editowncost[$index]['showGeneralInputs']) && in_array($value, $editowncost[$index]['showGeneralInputs']))
                            <div class="mt-1 ms-4 col-4">
                                <input type="text" class="form-control form-control-sm"
                                    wire:model="editowncost.{{ $index }}.edit_owngeneralMaterialInput">
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>

                    <!-- Others -->
                    <div class="col-md-3">
                        <strong>Others</strong>
                        <div>
                            <input type="checkbox" class="form-check-input"
                                wire:model="editowncost.{{ $index }}.edit_ownPaintHeightWidth"
                                wire:change="toggleOwnPaintInput({{ $index }}, 'paint')">
                            <label>Paint</label>
                            @if (!empty($editowncost[$index]['showGeneralInputs']) && in_array('paint', $editowncost[$index]['showGeneralInputs']))
                            <div class="mt-1 ms-4 col-4">
                                <input type="text" class="form-control form-control-sm"
                                    wire:model="editowncost.{{ $index }}.edit_ownpaintInputs">
                            </div>
                            @endif
                        </div>
                        <div>
                            <input type="checkbox" class="form-check-input"
                                wire:model="editowncost.{{ $index }}.edit_ownoracalHeightWidth"
                                wire:change="toggleOwnOracalMaterialInput({{ $index }}, 'oracal')">
                            <label>Oracal</label>

                            @if (!empty($editowncost[$index]['showGeneralInputs']) && in_array('oracal', $editowncost[$index]['showGeneralInputs']))
                            <div class="mt-1 ms-4 col-4">
                                <input type="text"
                                    class="form-control form-control-sm"
                                    wire:model="editowncost.{{ $index }}.edit_ownoracalInputs">
                            </div>
                            @endif
                        </div>

                        <div>
                            <input type="checkbox" class="form-check-input"
                                wire:model.defer="editowncost.{{ $index }}.edit_ownlightHeightWidth"
                                wire:change="$refresh">
                            <label>Lighting</label>
                        </div>
                    </div>
                </div>

                <!-- Lighting Section -->
                @if (!empty($form['edit_ownlightHeightWidth']))
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <h6>Lighting Type</h6>
                        @foreach (['frontlit', 'backlit', 'sidelit', 'nolight'] as $type)
                        <div>
                            <input type="checkbox" class="form-check-input"
                                wire:model="editowncost.{{ $index }}.edit_ownLightingType"
                                wire:click="owncheckpowersupply({{ $index }})"
                                wire:change="toggleownLightingInput({{ $index }}, '{{ $type }}')"
                                value="{{ $type }}">
                            <label>{{ ucfirst($type) }}</label>
                            @if (!empty($editowncost[$index]['showLightingInputs']) && in_array($type, $editowncost[$index]['showLightingInputs']))
                            <div class="mt-1 ms-4 col-4">
                                <input type="text"
                                    class="form-control form-control-sm"

                                    wire:model="editowncost.{{ $index }}.edit_ownLightingDetails">
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    <div class="col-md-4">
                        <label>Power Supply</label>
                        <select class="form-select form-select-sm"
                            wire:model="editowncost.{{ $index }}.edit_ownPowerSupply">
                            {{-- <option value="None">None</option>
                                        <option value="120W">120W</option>
                                        <option value="200W">200W</option> --}}
                            <option value="400W">400W</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Power Supply Quantity</label>
                        <input type="number" min="0" class="form-control form-control-sm"
                            wire:model="editowncost.{{ $index }}.edit_ownPowerSupplyQuantity" readonly
                            style="font-weight: bold; background-color: #f0f0f0; color: #000;">
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>