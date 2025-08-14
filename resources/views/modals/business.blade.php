<div>
    <h2>Business Lettering Cost</h2>

    <div class="mb-3 text-end">
        <button wire:click="busForm" class="btn btn-primary">Add</button>
    </div>
    @foreach ($busCost as $index => $form)
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Business Cost {{ $index + 1 }}</h5>
            <button class="btn btn-sm btn-danger" wire:click="busremoveForm({{ $index }})">Remove</button>
        </div>

        <div class="card-body">
            <div class="row">

                <div class="row">
                    <div class="col-6 mb-3">
                        <label>Business Text</label>
                        <input type="text" class="form-control form-control-sm"
                            wire:model.live="busCost.{{ $index }}.busText">
                            </div>
                        <div class="col-6 mb-3">
                            <label>Character Count</label>
                            <input type="text" class="form-control form-control-sm" readonly
                                value="{{ $busCost[$index]['characterCount'] ?? '' }}">
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Business Height (inches)</label>
                        <input type="text" class="form-control form-control-sm"
                            wire:model="busCost.{{ $index }}.busHeight">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Business Width (inches)</label>
                        <input type="text" class="form-control form-control-sm"
                            wire:model="busCost.{{ $index }}.busWidth">
                    </div>
                </div>
                <hr>
                <div class="col-12">
                    <h5> Raw Materials</h5>
                    <div class="row">
                        <div class="col-md-3">
                            <strong>Clear Acrylic</strong>
                            @foreach ([3, 5, 10, 15, 20, 25] as $size)
                            <div>
                                <input type="checkbox" class="form-check-input"
                                    wire:model="busCost.{{ $index }}.busMaterials"
                                    wire:change="toggleBusAcrylicInput({{ $index }}, '{{ $size }}')"
                                    value="acrylic{{ $size }}mm">
                                <label>Acrylic {{ $size }}MM</label>
                                @if (!empty($busCost[$index]['showAcrylicInput']) && $busCost[$index]['showAcrylicInput'] == $size)
                                <div class="col-4">
                                    <div class="mt-1 ms-4">
                                        <input type="text"
                                            class="form-control form-control-sm" wire:model="busCost.{{ $index }}.acrylicInput">
                                    </div>
                                </div>
                                @endif
                            </div>
                            @endforeach
                        </div>


                        <div class="col-md-3">
                            <strong>Black Acrylic</strong>
                            @foreach ([3, 5, 10, 15, 20, 25] as $size)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input"
                                    wire:model="busCost.{{ $index }}.busMaterials"
                                    wire:change="toggleBusBlackAcrylicInput({{ $index }}, '{{ $size }}')"
                                    value="black_acrylic{{ $size }}mm">
                                <label class="form-check-label"> Black Acrylic {{ $size }}MM</label>
                                {{-- Input for this size --}}
                                @if (!empty($busCost[$index]['showBlackAcrylicInput']) && in_array($size, $busCost[$index]['showBlackAcrylicInput']))
                                <div class="col-4">
                                    <div class="mt-1 ms-4">
                                        <input type="text" class="form-control form-control-sm"
                                            wire:model="busCost.{{ $index }}.busblackAcrylicInputs">
                                    </div>
                                </div>
                                @endif
                            </div>
                            @endforeach
                        </div>

                        <div class="col-md-3">
                            <strong>PVC</strong>
                            @foreach ([3, 5, 10, 15, 20, 25] as $size)
                            <div>
                                <input type="checkbox" class="form-check-input"
                                    wire:model="busCost.{{ $index }}.busMaterials"
                                    wire:change="toggleBusPVCInput({{ $index }}, '{{ $size }}')"
                                    value="pvc{{ $size }}mm">
                                <label>PVC {{ $size }}MM</label>

                                @if (!empty($busCost[$index]['showPVCInput']) && in_array($size, $busCost[$index]['showPVCInput']))
                                <div class="col-4">

                                    <div class="mt-1 ms-4">
                                        <input type="text" class="form-control form-control-sm"
                                            wire:model="busCost.{{ $index }}.buspvcInputs">
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
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input"
                                    wire:model="busCost.{{ $index }}.busMaterials"
                                    wire:change="toggleBusStainlessSteelInput({{ $index }}, '{{ $key }}')"
                                    value="{{ $key }}">
                                <label class="form-check-label">{{ $label }}</label>
                                @if (!empty($busCost[$index]['showInputs']) && in_array($key, $busCost[$index]['showInputs']))
                                <div class="mt-1 ms-4">
                                    <div class="col-4">
                                        <input type="text" class="form-control form-control-sm"
                                            wire:model="busCost.{{ $index }}.busstainlessteelsilverInputs">
                                    </div>
                                </div>
                                @endif
                            </div>
                            @endforeach
                        </div>
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
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input"
                                    wire:model="busCost.{{ $index }}.busMaterials"
                                    wire:change="toggleBusStainlessgoldInput({{ $index }}, '{{ $key }}')"
                                    value="{{ $key }}">
                                <label class="form-check-label">{{ $label }}</label>
                                @if (!empty($busCost[$index]['showInputs']) && in_array($key, $busCost[$index]['showInputs']))
                                <div class="mt-1 ms-4">
                                    <div class="col-4">
                                        <input type="text" class="form-control form-control-sm"
                                            wire:model="busCost.{{ $index }}.busstainlessteelgoldInputs">

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
                                    wire:model="busCost.{{ $index }}.busMaterials"
                                    wire:change="toggleBusNeonInput({{ $index }}, '{{ $key }}')"
                                    value="{{ $key }}">
                                <label class="form-check-label">{{ $label }}</label>

                                @if (!empty($busCost[$index]['showInputs']) && in_array($key, $busCost[$index]['showInputs']))
                                <div class="mt-1 ms-4">
                                    <div class="col-4">
                                        <input type="text" class="form-control form-control-sm"
                                            wire:model="busCost.{{ $index }}.buseonmaterialInputs">
                                    </div>
                                </div>
                                @endif
                            </div>
                            @endforeach
                        </div>
                        <!--  -->
                        <div class="col-md-3" x-data="{ enabled: @entangle('busCost.' . $index . '.busStickerHeightWidth') }">
                            <strong>Sticker</strong>
                            <div>
                                <input type="checkbox" class="form-check-input" x-model="enabled"
                                    wire:model="busCost.{{ $index }}.busStickerHeightWidth">
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
                                    wire:model="busCost.{{ $index }}.stickerMaterial"
                                    wire:change="toggleBusStickerInput({{ $index }}, '{{ $val }}')"
                                    value="{{ $val }}" :disabled="!enabled">
                                <label>{{ $label }}</label>


                                @if (!empty($busCost[$index]['showInputs']) && in_array($val, $busCost[$index]['showInputs']))
                                <div class="mt-1 ms-4 col-4">
                                    <input type="text" class="form-control form-control-sm"
                                        wire:model="busCost.{{ $index }}.stickermaterialInputs">
                                </div>
                                @endif
                            </div>
                            @endforeach
                        </div>



                        <div class="col-md-3">
                            <strong>General Material</strong>
                            @php
                            $generalMaterials = [
                            'channel3d' => '3D Channel',
                            'aluminiumBoxUp' => 'Aluminium Box Up',
                            'ironHollow20mm' => 'Iron Hollow 20mm',
                            'ironHollow10mm' => 'Iron Hollow 10mm',
                            'spotlightWithBracket' => 'Spotlight + Bracket (1 set)',
                            'dimmer' => 'Dimmer',
                            ];
                            @endphp
                            @foreach ($generalMaterials as $val => $label)
                            <div class="mb-1">
                                <input type="checkbox" class="form-check-input"
                                    wire:model="busCost.{{ $index }}.generalMaterial"
                                    wire:change="toggleBusGeneralMaterialInput({{ $index }}, '{{ $val }}')"
                                    value="{{ $val }}">
                                <label>{{ $label }}</label>

                                @if (!empty($busCost[$index]['showGeneralInputs']) && in_array($val, $busCost[$index]['showGeneralInputs']))
                                <div class="mt-1 ms-4 col-4">
                                    <input type="text" class="form-control form-control-sm"
                                        wire:model="busCost.{{ $index }}.busgeneralMaterialInput">
                                </div>
                                @endif
                            </div>
                            @endforeach
                        </div>

                        <div class="col-md-3">
                            <strong>Others</strong>
                            <div>
                                <input type="checkbox" class="form-check-input"
                                    wire:model="busCost.{{ $index }}.busPaintHeightWidth"
                                    wire:change="toggleBusPaintInput({{ $index }}, '{{ $val }}')">
                                <label>Paint</label>
                                @if (!empty($busCost[$index]['showGeneralInputs']) && in_array($val, $busCost[$index]['showGeneralInputs']))
                                <div class="mt-1 ms-4 col-4">
                                    <input type="text" class="form-control form-control-sm"
                                        wire:model="busCost.{{ $index }}.buspaintInputs">
                                </div>
                                @endif
                            </div>
                            <div>
                                <input type="checkbox"
                                    class="form-check-input"
                                    wire:model="busCost.{{ $index }}.busOracalHeightWidth"
                                    wire:change="toggleBusOracalMaterialInput({{ $index }}, 'oracal')" value="oracal">
                                <label>Oracal</label>
                                @if (!empty($busCost[$index]['showGeneralInputs']) && in_array('oracal', $busCost[$index]['showGeneralInputs']))
                                <div class="mt-1 ms-4 col-4">
                                    <input type="text"
                                        class="form-control form-control-sm"
                                        wire:model="busCost.{{ $index }}.busoracalInputs">
                                </div>
                                @endif
                            </div>

                            <div>
                                <input type="checkbox" class="form-check-input"
                                    wire:model.defer="busCost.{{ $index }}.buslightHeightWidth"
                                    wire:change="$refresh">
                                <label>Lighting</label>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                @if ($form['buslightHeightWidth'])

                <div class="row">
                    <div class="col-md-4">
                        <h6>Lighting Type</h6>
                        @foreach (['frontlit', 'backlit', 'sidelit', 'nolight'] as $type)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input"
                                wire:model="busCost.{{ $index }}.busLightingType"
                                wire:click="buscheckpowersupply({{ $index }})"
                                wire:change="toggleBusLightingInput({{ $index }}, '{{ $type }}')"
                                value="{{ $type }}">
                            <label class="form-check-label">{{ ucfirst($type) }}</label>

                            @if (!empty($busCost[$index]['showLightingInputs']) && in_array($type, $busCost[$index]['showLightingInputs']))
                            <div class="mt-1 ms-4 col-4">
                                <input type="text"
                                    class="form-control form-control-sm"
                                    wire:model="busCost.{{ $index }}.busLightingDetails">
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Power Supply</label>
                        <select class="form-select form-select-sm"
                            wire:model="busCost.{{ $index }}.busPowerSupply">
                            {{-- <option value="None">None</option>
                                    <option value="120W">120W</option>
                                    <option value="200W">200W</option> --}}
                            <option value="400W">400W</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Power Supply Quantity</label>
                        <input type="number" min="0" class="form-control form-control-sm"
                            wire:model="busCost.{{ $index }}.busPowerSupplyQuantity" readonly
                            style="font-weight: bold; background-color: #f0f0f0; color: #000;">
                    </div>
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>