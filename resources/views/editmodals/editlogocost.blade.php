<div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Logo Cost</h2>
        <button wire:click="editForm" class="btn btn-primary">Update Logo</button>
    </div>


    @foreach ($editlogocost as $index => $form)
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Logo Cost {{ $index + 1 }}</h5>
            <button class="btn btn-sm btn-danger" wire:click="removeEditForm({{ $index }})">Remove</button>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="row">
                    <div class="col-6 mb-3">
                        <label>Logo Text</label>
                        <input type="text" class="form-control form-control-sm"
                            wire:model.live="editlogocost.{{ $index }}.edit_logoText">
                    </div>
                    <div class="col-6 mb-3">
                        <label>Character Count</label>
                        <input type="text" class="form-control form-control-sm" readonly
                            value="{{ $editlogocost[$index]['characterCount'] ?? '' }}">
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Logo Height (inches)</label>
                    <input type="text" class="form-control form-control-sm"
                        wire:model="editlogocost.{{ $index }}.edit_logoHeight">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Logo Width (inches)</label>
                    <input type="text" class="form-control form-control-sm"
                        wire:model="editlogocost.{{ $index }}.edit_logoWidth">
                </div>
            </div>
            <hr>
            <div class="col-12">
                <h5> Raw Materials</h5>
                <div class="row">
                    <div class="col-md-3">
                        <strong>Clear Acrylic</strong>

                        @foreach ([3, 5, 10, 15, 20, 25] as $size)
                        <div class="mb-1">
                            <input type="checkbox" class="form-check-input"
                                wire:model="editlogocost.{{ $index }}.edit_logoMaterials"
                                wire:change="toggleAcrylicInput({{ $index }}, {{ $size }})"
                                value="acrylic{{ $size }}mm">
                            <label>Acrylic {{ $size }}MM</label>

                            @if (!empty($editlogocost[$index]['showAcrylicInput']) && $editlogocost[$index]['showAcrylicInput'] == $size)
                            <div class="col-4">
                                <div class="mt-1 ms-4">
                                    <input type="text" class="form-control form-control-sm"
                                        wire:model="editlogocost.{{ $index }}.edit_acrylicInput">
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
                                wire:model="editlogocost.{{ $index }}.logoMaterials"
                                wire:change="toggleBlackAcrylicInput({{ $index }}, {{ $size }})"
                                value="black_acrylic{{ $size }}mm">
                            <label class="form-check-label">Black Acrylic {{ $size }}MM</label>

                            {{-- Input for this size --}}
                            @if (!empty($editlogocost[$index]['showBlackAcrylicInput']) && in_array($size, $editlogocost[$index]['showBlackAcrylicInput']))
                            <div class="col-4">
                                <div class="mt-1 ms-4">
                                    <input type="text" class="form-control form-control-sm"
                                        wire:model="editlogocost.{{ $index }}.edit_blackAcrylicInputs">
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
                                wire:model="editlogocost.{{ $index }}.edit_logoMaterials"
                                wire:change="togglePVCInput({{ $index }}, {{ $size }})"
                                value="pvc{{ $size }}mm">
                            <label>PVC {{ $size }}MM</label>

                            @if (!empty($editlogocost[$index]['showPVCInput']) && in_array($size, $editlogocost[$index]['showPVCInput']))
                            <div class="col-4">

                                <div class="mt-1 ms-4">
                                    <input type="text" class="form-control form-control-sm"
                                        wire:model="editlogocost.{{ $index }}.edit_pvcInputs">
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
                                wire:model="editlogocost.{{ $index }}.edit_logoMaterials"
                                wire:change="toggleStainlessSteelInput
                                                    ({{ $index }}, '{{ $key }}')
"
                                value="{{ $key }}">
                            <label class="form-check-label">{{ $label }}</label>

                            @if (!empty($editlogocost[$index]['showInputs']) && in_array($key, $editlogocost[$index]['showInputs']))
                            <div class="mt-1 ms-4">
                                <div class="col-4">
                                    <input type="text" class="form-control form-control-sm"
                                        wire:model="editlogocost.{{ $index }}.edit_stainlessteelsilverInputs">
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
                                wire:model="editlogocost.{{ $index }}.edit_logoMaterials"
                                wire:change="toggleStainlessgoldInput({{ $index }}, '{{ $key }}')"
                                value="{{ $key }}">
                            <label class="form-check-label">{{ $label }}</label>

                            @if (!empty($editlogocost[$index]['showInputs']) && in_array($key, $editlogocost[$index]['showInputs']))
                            <div class="mt-1 ms-4">
                                <div class="col-4">
                                    <input type="text" class="form-control form-control-sm"
                                        wire:model="editlogocost.{{ $index }}.edit_stainlessteelgoldInputs">

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
                                wire:model="editlogocost.{{ $index }}.edit_logoMaterials"
                                wire:change="toggleneonMaterialInput({{ $index }}, '{{ $key }}')"
                                value="{{ $key }}">
                            <label class="form-check-label">{{ $label }}</label>

                            @if (!empty($editlogocost[$index]['showInputs']) && in_array($key, $editlogocost[$index]['showInputs']))
                            <div class="mt-1 ms-4">
                                <div class="col-4">
                                    <input type="text" class="form-control form-control-sm"
                                        wire:model="editlogocost.{{ $index }}.edit_NeonmaterialInputs">
                                </div>
                            </div>
                            @endif
                        </div>
                        @endforeach

                    </div>

                    <div class="col-md-3" x-data="{ enabled: @entangle('editlogocost.' . $index . '.logoStickerHeightWidth') }">
                        <strong>Sticker</strong>
                        <div>
                            <input type="checkbox" class="form-check-input" x-model="enabled"
                                wire:model="editlogocost.{{ $index }}.edit_logoStickerHeightWidth">
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
                                wire:model="editlogocost.{{ $index }}.edit_stickerMaterial"
                                wire:change="togglestickerInput({{ $index }}, '{{ $val }}')"
                                value="{{ $val }}" :disabled="!enabled">
                            <label>{{ $label }}</label>

                            @if (!empty($editlogocost[$index]['showInputs']) && in_array($val, $editlogocost[$index]['showInputs']))
                            <div class="mt-1 ms-4 col-4">
                                <input type="text" class="form-control form-control-sm"
                                    wire:model="editlogocost.{{ $index }}.edit_stickermaterialInputs.{{ $val }}">
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
                                wire:model="editlogocost.{{ $index }}.edit_generalMaterial"
                                wire:change="toggleGeneralMaterialInput({{ $index }}, '{{ $val }}')"
                                value="{{ $val }}">
                            <label>{{ $label }}</label>

                            @if (!empty($editlogocost[$index]['showGeneralInputs']) && in_array($val, $editlogocost[$index]['showGeneralInputs']))
                            <div class="mt-1 ms-4 col-4">

                                <input type="text" class="form-control form-control-sm"
                                    wire:model="editlogocost.{{ $index }}.edit_generalMaterialInput">

                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>

                    <div class="col-md-3">
                        <strong>Others</strong>
                        <div>
                            <input type="checkbox" class="form-check-input"
                                wire:model="editlogocost.{{ $index }}.edit_logoPaintHeightWidth"
                                wire:change="togglepaintMaterialInput({{ $index }}, '{{ $val }}')">
                            <label>Paint</label>
                            @if (!empty($editlogocost[$index]['showGeneralInputs']) && in_array($val, $editlogocost[$index]['showGeneralInputs']))
                            <div class="mt-1 ms-4 col-4">
                                <input type="text" class="form-control form-control-sm"
                                    wire:model="editlogocost.{{ $index }}.edit_logoPaintInputs">
                            </div>
                            @endif
                        </div>
                        <div>
                            <input type="checkbox" class="form-check-input"
                                wire:model="editlogocost.{{ $index }}.logooracalHeightWidth"
                                value="oracal"
                                wire:change="toggleorcalMaterialInput({{ $index }}, 'oracal')">
                            <label>Oracal</label>

                            @if (!empty($editlogocost[$index]['showGeneralInputs']) && in_array('oracal', $editlogocost[$index]['showGeneralInputs']))
                            <div class="mt-1 ms-4 col-4">
                                <input type="text" class="form-control form-control-sm"
                                    wire:model="editlogocost.{{ $index }}.edit_logoOracalInputs">
                            </div>
                            @endif
                        </div>


                        <div>
                            <input type="checkbox" class="form-check-input"
                                wire:model.defer="editlogocost.{{ $index }}.edit_logolightHeightWidth"
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
                            wire:model="editlogocost.{{ $index }}.edit_lightingtype"
                            wire:change="toggleLightingInput({{ $index }}, '{{ $val }}')">
                        <label>{{ ucfirst($type) }}</label>

                        @if (in_array($type, $editlogocost[$index]['lightingtype'] ?? []))
                        <div class="mt-1 ms-4 col-4">
                            <input type="text" class="form-control mt-1"
                                wire:model="editlogocost.{{ $index }}.edit_logoLightingDetails">
                        </div>

                        @endif
                    </div>
                    @endforeach
                </div>


                <div class="col-md-4">
                    <label class="form-label">Power Supply</label>
                    <select class="form-select form-select-sm"
                        wire:model.live="editlogocost.{{ $index }}.edit_logoPowerSupply">
                        {{-- <option value="None">None</option> --}}
                        {{-- <option value="120W">120W</option>
                                <option value="200W">200W</option> --}}
                        <option value="400W">400W</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Power Supply Quantity</label>
                    <input type="number" min="0" class="form-control form-control-sm"
                        wire:model="editlogocost.{{ $index }}.edit_logoPowerSupplyQuantity" readonly
                        style="font-weight: bold; background-color: #f0f0f0; color: #000;">
                </div>
            </div>
            @endif
        </div>
    </div>
    @endforeach
</div>