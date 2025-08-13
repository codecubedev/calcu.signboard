<div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Logo Cost</h2>
        <button wire:click="addForm" class="btn btn-primary">Add Logo</button>
    </div>


    @foreach ($logoCost as $index => $form)
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Logo Cost {{ $index + 1 }}</h5>
                <button class="btn btn-sm btn-danger" wire:click="removeForm({{ $index }})">Remove</button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 mb-3">
                        <label>Logo Text</label>
                        <input type="text" class="form-control form-control-sm"
                            wire:model.live="logoCost.{{ $index }}.logoText">
                    </div>
                    <div class="col-6 mb-3">
                        <label>Character Count</label>
                        <input type="text" class="form-control form-control-sm" readonly
                            value="{{ $logoCost[$index]['characterCount'] ?? '' }}">
                    </div>
                </div>
                <hr>
                <div class="col-12">
                    <h5> Row Materials</h5>
                    <div class="row">
                        <div class="col-md-3">
                            <strong>Clear Acrylic</strong>

                            @foreach ([3, 5, 10, 15, 20, 25] as $size)
                                <div class="mb-1">
                                    <input type="checkbox" class="form-check-input"
                                        wire:model="logoCost.{{ $index }}.logoMaterials"
                                        wire:change="toggleAcrylicInput({{ $index }}, {{ $size }})"
                                        value="acrylic{{ $size }}mm">
                                    <label>Acrylic {{ $size }}MM</label>

                                    @if (!empty($logoCost[$index]['showAcrylicInput']) && $logoCost[$index]['showAcrylicInput'] == $size)
                                        <div class="col-4">
                                            <div class="mt-1 ms-4">
                                                <input type="text" class="form-control form-control-sm"
                                                    wire:model="logoCost.{{ $index }}.acrylicInput">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-3">
                            <strong>Black Acrylic</strong>

                            @foreach ([3, 5, 10, 15, 20, 25] as $size)
                                <div class="form-check mb-1">
                                    <input type="checkbox" class="form-check-input"
                                        wire:model="logoCost.{{ $index }}.logoMaterials"
                                        wire:change="toggleBlackAcrylicInput({{ $index }}, {{ $size }})"
                                        value="black_acrylic{{ $size }}mm">
                                    <label class="form-check-label">Black Acrylic {{ $size }}MM</label>

                                    {{-- Input for this size --}}
                                    @if (!empty($logoCost[$index]['showBlackAcrylicInput']) && in_array($size, $logoCost[$index]['showBlackAcrylicInput']))
                                        <div class="col-4">
                                            <div class="mt-1 ms-4">
                                                <input type="text" class="form-control form-control-sm"
                                                    wire:model="logoCost.{{ $index }}.blackAcrylicInputs">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-3">
                            <strong>PVC</strong>

                            @foreach ([3, 5, 10, 15, 20, 25] as $size)
                                <div class="mb-1">
                                    <input type="checkbox" class="form-check-input"
                                        wire:model="logoCost.{{ $index }}.logoMaterials"
                                        wire:change="togglePVCInput({{ $index }}, {{ $size }})"
                                        value="pvc{{ $size }}mm">
                                    <label>PVC {{ $size }}MM</label>

                                    @if (!empty($logoCost[$index]['showPVCInput']) && in_array($size, $logoCost[$index]['showPVCInput']))
                                        <div class="col-4">

                                            <div class="mt-1 ms-4">
                                                <input type="text" class="form-control form-control-sm"
                                                    wire:model="logoCost.{{ $index }}.pvcInputs">
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
                                        wire:model="logoCost.{{ $index }}.logoMaterials"
                                        wire:change="toggleStainlessSteelInput
                                                    ({{ $index }}, '{{ $key }}')
"
                                        value="{{ $key }}">
                                    <label class="form-check-label">{{ $label }}</label>

                                    @if (!empty($logoCost[$index]['showInputs']) && in_array($key, $logoCost[$index]['showInputs']))
                                        <div class="mt-1 ms-4">
                                            <div class="col-4">
                                                <input type="text" class="form-control form-control-sm"
                                                    wire:model="logoCost.{{ $index }}.stainlessteelsilverInputs">
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
                                <div class="form-check mb-1">
                                    <input type="checkbox" class="form-check-input"
                                        wire:model="logoCost.{{ $index }}.logoMaterials"
                                        wire:change="toggleStainlessgoldInput({{ $index }}, '{{ $key }}')"
                                        value="{{ $key }}">
                                    <label class="form-check-label">{{ $label }}</label>

                                    @if (!empty($logoCost[$index]['showInputs']) && in_array($key, $logoCost[$index]['showInputs']))
                                        <div class="mt-1 ms-4">
                                            <div class="col-4">
                                                <input type="text" class="form-control form-control-sm"
                                                    wire:model="logoCost.{{ $index }}.stainlessteelgoldInputs">

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
                                <div class="form-check mb-1">
                                    <input type="checkbox" class="form-check-input"
                                        wire:model="logoCost.{{ $index }}.logoMaterials"
                                        wire:change="toggleneonMaterialInput({{ $index }}, '{{ $key }}')"
                                        value="{{ $key }}">
                                    <label class="form-check-label">{{ $label }}</label>

                                    @if (!empty($logoCost[$index]['showInputs']) && in_array($key, $logoCost[$index]['showInputs']))
                                        <div class="mt-1 ms-4">
                                            <div class="col-4">
                                                <input type="text" class="form-control form-control-sm"
                                                    wire:model="logoCost.{{ $index }}.NeonmaterialInputs">
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach

                        </div>

                        <div class="col-md-3" x-data="{ enabled: @entangle('ownCost.' . $index . '.ownStickerHeightWidth') }">
                            <strong>Sticker</strong>
                            <div>
                                <input type="checkbox" class="form-check-input" x-model="enabled"
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
                                <div class="mb-1">
                                    <input type="checkbox" class="form-check-input"
                                        wire:model="logoCost.{{ $index }}.stickerMaterial"
                                        wire:change="togglestickerInput({{ $index }}, '{{ $val }}')"
                                        value="{{ $val }}" :disabled="!enabled">
                                    <label>{{ $label }}</label>

                                    @if (!empty($logoCost[$index]['showInputs']) && in_array($val, $logoCost[$index]['showInputs']))
                                        <div class="mt-1 ms-4 col-4">
                                            <input type="text" class="form-control form-control-sm"
                                                wire:model="logoCost.{{ $index }}.stickermaterialInputs">
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
                                        wire:model="logoCost.{{ $index }}.generalMaterial"
                                        wire:change="toggleGeneralMaterialInput({{ $index }}, '{{ $val }}')"
                                        value="{{ $val }}">
                                    <label>{{ $label }}</label>

                                    @if (!empty($logoCost[$index]['showGeneralInputs']) && in_array($val, $logoCost[$index]['showGeneralInputs']))
                                        <div class="mt-1 ms-4 col-4">

                                            <input type="text" class="form-control form-control-sm"
                                                wire:model="logoCost.{{ $index }}.generalMaterialInput">

                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <div class="col-md-3">
                            <strong>Others</strong>
                            <div>
                                <input type="checkbox" class="form-check-input"
                                    wire:model="logoCost.{{ $index }}.logoPaintHeightWidth"
                                    wire:change="togglepaintMaterialInput({{ $index }}, '{{ $val }}')">
                                <label>Paint</label>
                                @if (!empty($logoCost[$index]['showGeneralInputs']) && in_array($val, $logoCost[$index]['showGeneralInputs']))
                                    <div class="mt-1 ms-4 col-4">
                                        <input type="text" class="form-control form-control-sm"
                                            wire:model="logoCost.{{ $index }}.logoPaintInputs">
                                    </div>
                                @endif
                            </div>
                            <div>
                                <input type="checkbox" class="form-check-input"
                                    wire:model="logoCost.{{ $index }}.logooracalHeightWidth"
                                    value="oracal"
                                    wire:change="toggleorcalMaterialInput({{ $index }}, 'oracal')">
                                <label>Oracal</label>

                                @if (!empty($logoCost[$index]['showGeneralInputs']) && in_array('oracal', $logoCost[$index]['showGeneralInputs']))
                                    <div class="mt-1 ms-4 col-4">
                                        <input type="text" class="form-control form-control-sm"
                                            wire:model="logoCost.{{ $index }}.logoOracalInputs">
                                    </div>
                                @endif
                            </div>


                            <div>
                                <input type="checkbox" class="form-check-input"
                                    wire:model.defer="logoCost.{{ $index }}.logolightHeightWidth"
                                    wire:change="$refresh">
                                <label>Lighting</label>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($form['logolightHeightWidth'])
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <h6>Lighting Type</h6>
                            @foreach (['frontlit', 'backlit', 'sidelit', 'nolight'] as $type)
                                <div class="mb-2">
                                    <input type="checkbox" class="form-check-input" value="{{ $type }}"
                                        wire:model="logoCost.{{ $index }}.lightingtype"
                                    wire:change="toggleLightingInput({{ $index }}, '{{ $val }}')">
                                    <label>{{ ucfirst($type) }}</label>

                                    @if (in_array($type, $logoCost[$index]['lightingtype'] ?? []))
                                    <div class="mt-1 ms-4 col-4">
                                        <input type="text" class="form-control mt-1"
                                            wire:model="logoCost.{{ $index }}.logoLightingDetails">
                                    </div>
                                       
                                    @endif
                                </div>
                            @endforeach
                        </div>


                        <div class="col-md-4">
                            <label class="form-label">Power Supply</label>
                            <select class="form-select form-select-sm"
                                wire:model.live="logoCost.{{ $index }}.logoPowerSupply">
                                {{-- <option value="None">None</option> --}}
                                {{-- <option value="120W">120W</option>
                                <option value="200W">200W</option> --}}
                                <option value="400W">400W</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Power Supply Quantity</label>
                            <input type="number" min="0" class="form-control form-control-sm"
                                wire:model="logoCost.{{ $index }}.logoPowerSupplyQuantity" readonly
                                style="font-weight: bold; background-color: #f0f0f0; color: #000;">
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</div>