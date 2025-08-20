<div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Main Lettering</h2>
        <button wire:click="editmainForm" class="btn btn-primary">Update Main</button>
    </div>

    @foreach ($editMains as $index => $form)
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Main Cost {{ $index + 1 }}</h5>
            <button class="btn btn-sm btn-danger" wire:click="editmainremoveForm({{ $index }})">Remove</button>
        </div>

        <div class="card-body">
            <div class="row">
                <!-- Main Text -->
                <div class="col-6 mb-3">
                    <label>Main Text</label>
                    <input type="text" class="form-control form-control-sm"
                        wire:model.live="editMains.{{ $index }}.text">
                </div>

                <!-- Character Count -->
                <div class="col-6 mb-3">
                    <label>Character Count</label>
                    <input type="text" class="form-control form-control-sm" readonly
                        value="{{ $editMains[$index]['characterCount'] ?? '' }}">
                </div>

                <!-- Dimensions -->
                <div class="col-md-6 mb-3">
                    <label>Main Height (inches)</label>
                    <input type="text" class="form-control form-control-sm"
                        wire:model.defer="editMains.{{ $index }}.height">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Main Width (inches)</label>
                    <input type="text" class="form-control form-control-sm"
                        wire:model.defer="editMains.{{ $index }}.width">
                </div>
            </div>

            <hr>

            <!-- Raw Materials -->
            <div class="col-12">
                <h5>Raw Materials</h5>
                <div class="row">

                    <!-- Clear Acrylic -->
                    <div class="col-md-3">
                        <strong>Clear Acrylic</strong>
                        @foreach ([3, 5, 10, 15, 20, 25] as $size)
                        <div>
                            <input type="checkbox" class="form-check-input"
                                wire:model="editmaincost.{{ $index }}.edit_mainMaterials"
                                wire:change="toggleMainAcrylicInput({{ $index }}, {{ $size }})"
                                value="acrylic{{ $size }}mm">
                            <label>Acrylic {{ $size }}MM</label>

                            @if (!empty($editmaincost[$index]['showAcrylicInput']) && $editmaincost[$index]['showAcrylicInput'] == $size)
                            <div class="col-4">
                                <div class="mt-1 ms-4">
                                    <input type="text"
                                        class="form-control form-control-sm" wire:model="editmaincost.{{ $index }}.edit_mainacrylicInput">
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
                                wire:model="editmaincost.{{ $index }}.edit_mainMaterials"
                                wire:change="toggleMainBlackAcrylicInput({{ $index }}, {{ $size }})"
                                value="black_acrylic{{ $size }}mm">
                            <label>Black Acrylic {{ $size }}MM</label>

                            @if (!empty($editmaincost[$index]['showBlackAcrylicInput']) && in_array($size, $editmaincost[$index]['showBlackAcrylicInput']))
                            <div class="col-4">
                                <div class="mt-1 ms-4">
                                    <input type="text"
                                        class="form-control form-control-sm"
                                        wire:model="editmaincost.{{ $index }}.edit_mainblackAcrylicInputs.{{ $size }}">
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
                                wire:model="editmaincost.{{ $index }}.edit_mainMaterials"
                                wire:change="toggleMainPVCInput({{ $index }}, {{ $size }})"
                                value="pvc{{ $size }}mm">
                            <label>PVC {{ $size }}MM</label>
                            @if (!empty($editmaincost[$index]['showPVCInput']) && in_array($size, $editmaincost[$index]['showPVCInput']))
                            <div class="col-4">

                                <div class="mt-1 ms-4">
                                    <input type="text" class="form-control form-control-sm"
                                        wire:model="editmaincost.{{ $index }}.edit_mainpvcInputs">
                                </div>
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>

                    <!-- Stainless Steel (Silver) -->
                    <div class="col-md-3">
                        <strong>Stainless Steel (Silver)</strong>
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
                                wire:model="editmaincost.{{ $index }}.edit_mainMaterials"
                                wire:change="toggleMainStainlessSteelInput({{ $index }}, '{{ $key }}')"
                                value="{{ $key }}">
                            <label>{{ $label }}</label>
                            @if (!empty($editmaincost[$index]['showInputs']) && in_array($key, $editmaincost[$index]['showInputs']))
                            <div class="mt-1 ms-4">
                                <div class="col-4">
                                    <input type="text" class="form-control form-control-sm"
                                        wire:model="editmaincost.{{ $index }}.edit_mainstainlessteelsilverInputs">
                                </div>
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>

                    <!-- Stainless Steel (Gold) -->
                    <div class="col-md-3">
                        <strong>Stainless Steel (Gold)</strong>
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
                                wire:model="editmaincost.{{ $index }}.edit_mainMaterials"
                                wire:change="toggleMainStainlessgoldInput({{ $index }}, '{{ $key }}')"
                                value="{{ $key }}">
                            <label>{{ $label }}</label>

                            @if (!empty($editmaincost[$index]['showInputs']) && in_array($key, $editmaincost[$index]['showInputs']))
                            <div class="mt-1 ms-4">
                                <div class="col-4">
                                    <input type="text" class="form-control form-control-sm"
                                        wire:model="editmaincost.{{ $index }}.edit_mainstainlessteelgoldInputs">

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
                                wire:model="editmaincost.{{ $index }}.edit_mainMaterials"
                                wire:change="toggleMainNeonMaterialInput({{ $index }}, '{{ $key }}')"
                                value="{{ $key }}">
                            <label class="form-check-label">{{ $label }}</label>

                            @if (!empty($editmaincost[$index]['showInputs']) && in_array($key, $editmaincost[$index]['showInputs']))
                            <div class="mt-1 ms-4">
                                <div class="col-4">
                                    <input type="text" class="form-control form-control-sm"
                                        wire:model="editmaincost.{{ $index }}.edit_mainneonmaterialInputs">
                                </div>
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>






                    <div class="col-md-3" x-data="{ enabled: @entangle('editmaincost.' . $index . '.mainStickerHeightWidth') }">
                        <strong>Sticker</strong>
                        <div>
                            <input type="checkbox" class="form-check-input" x-model="enabled"
                                wire:model="editmaincost.{{ $index }}.edit_mainStickerHeightWidth">
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
                                wire:model="editmaincost.{{ $index }}.stickerMaterial"
                                wire:change="toggleMainstickerInput({{ $index }}, '{{ $val }}')"
                                value="{{ $val }}" :disabled="!enabled">
                            <label>{{ $label }}</label>
                            @if (!empty($editmaincost[$index]['showInputs']) && in_array($val, $editmaincost[$index]['showInputs']))
                            <div class="mt-1 ms-4 col-4">
                                <input type="text" class="form-control form-control-sm"
                                    wire:model="editmaincost.{{ $index }}.edit_mainstickermaterialInputs.{{ $val }}">
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
                        'spotlightWithBracket' => 'Spotlight + Bracket',
                        'dimmer' => 'Dimmer',
                        ] as $key => $label)
                        <div>
                            <input type="checkbox" class="form-check-input"
                                wire:model="editmaincost.{{ $index }}.generalMaterial"
                                wire:change="toggleMainGeneralMaterialInput({{ $index }}, '{{ $key }}')"
                                value="{{ $key }}">
                            <label>{{ $label }}</label>

                            @if (!empty($editmaincost[$index]['showGeneralInputs']) && in_array($key, $editmaincost[$index]['showGeneralInputs']))
                            <div class="mt-1 ms-4 col-4">
                                <input type="text" class="form-control form-control-sm"
                                    wire:model="editmaincost.{{ $index }}.edit_maingeneralMaterialInputs.{{ $key }}">
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>



                    <!-- Others -->
                    <div class="col-md-4">
                        <h6>Others</h6>



                        <div class="form-check">
                            <input type="checkbox" class="form-check-input"
                                wire:model="editmaincost.{{ $index }}.mainPaintHeightWidth"
                                wire:change="toggleMainpaintMaterialInput({{ $index }}, 'paint')">
                            <label class="form-check-label">Paint</label>

                            @if (!empty($editmaincost[$index]['showGeneralInputs']) && in_array('paint', $editmaincost[$index]['showGeneralInputs']))
                            <div class="mt-1 ms-4 col-4">
                                <input type="text" class="form-control form-control-sm"
                                    wire:model="editmaincost.{{ $index }}.edit_mainPaintInputs">
                            </div>
                            @endif
                        </div>


                        <div class="form-check">
                            <input type="checkbox" class="form-check-input"
                                wire:model="editmaincost.{{ $index }}.mainoracalHeightWidth"
                                wire:change="toggleMainOrcalMaterialInput({{ $index }}, '{{ $key }}')"
                                wire:key="oracal-{{ $index }}-{{ $key }}">
                            <label class="form-check-label">Oracal</label>

                            @if (!empty($editmaincost[$index]['showGeneralInputs']) && in_array($key, $editmaincost[$index]['showGeneralInputs']))
                            <div class="mt-1 ms-4 col-4">
                                <input type="text"
                                    class="form-control form-control-sm"
                                    wire:model="editmaincost.{{ $index }}.edit_mainoracalInputs.{{ $key }}">
                            </div>
                            @endif
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input"
                                wire:model.defer="editmaincost.{{ $index }}.edit_mainlightHeightWidth"
                                wire:change="$refresh">
                            <label class="form-check-label">Lighting</label>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <!-- Lighting Options -->
            @if (!empty($form['edit_mainlightHeightWidth']))
            <div class="row">
                <div class="col-md-4">
                    <h6>Lighting Type</h6>
                    @foreach (['frontlit', 'backlit', 'sidelit', 'nolight'] as $type)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input"
                            wire:model="editmaincost.{{ $index }}.edit_mainLightingType"
                            wire:click="maincheckpowersupply({{ $index }})"
                            wire:change="toggleMainLightingInput({{ $index }}, '{{ $type }}')"
                            value="{{ $type }}">
                        <label class="form-check-label">{{ ucfirst($type) }}</label>

                        @if (!empty($editmaincost[$index]['showLightingInputs']) && in_array($type, $editmaincost[$index]['showLightingInputs']))
                        <div class="mt-1 ms-4 col-4">
                            <input type="text"
                                class="form-control form-control-sm"
                                wire:model="editmaincost.{{ $index }}.edit_mainLightingInputs.{{ $type }}">
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>



                <div class="col-md-4">
                    <label class="form-label">Power Supply</label>
                    <select class="form-select form-select-sm"
                        wire:model="editmaincost.{{ $index }}.edit_mainPowerSupply">
                        {{-- <option value="None">None</option> --}}
                        {{-- <option value="120W">120W</option>
                                <option value="200W">200W</option> --}}
                        <option value="400W">400W</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Power Supply Quantity</label>
                    <input type="number" min="0" class="form-control form-control-sm"
                        wire:model="editmaincost.{{ $index }}.edit_mainPowerSupplyQuantity" readonly
                        style="font-weight: bold; background-color: #f0f0f0; color: #000;">

                </div>
            </div>
            @endif
        </div>
    </div>
    @endforeach
</div>