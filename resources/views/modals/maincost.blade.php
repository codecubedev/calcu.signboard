<div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Main Lettering</h2>
        <button wire:click="mainmainForm" class="btn btn-primary">Add Main</button>
    </div>

    @foreach ($mainCost as $index => $form)
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Main Cost {{ $index + 1 }}</h5>
                <button class="btn btn-sm btn-danger" wire:click="mainremoveForm({{ $index }})">Remove</button>
            </div>

            <div class="card-body">
                <div class="row">
                    <!-- Main Text -->
                    <div class="col-6 mb-3">
                        <label>Main Text</label>
                        <input type="text" class="form-control form-control-sm"
                            wire:model.defer="mainCost.{{ $index }}.mainText">
                    </div>

                    <!-- Character Count -->
                    <div class="col-6 mb-3">
                        <label>Character Count</label>
                        <input type="text" class="form-control form-control-sm" readonly
                            value="{{ $form['characterCount'] ?? '' }}">
                    </div>

                    <!-- Dimensions -->
                    <div class="col-md-6 mb-3">
                        <label>Main Height (inches)</label>
                        <input type="text" class="form-control form-control-sm"
                            wire:model.defer="mainCost.{{ $index }}.mainHeight">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Main Width (inches)</label>
                        <input type="text" class="form-control form-control-sm"
                            wire:model.defer="mainCost.{{ $index }}.mainWidth">
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
                                        wire:model="mainCost.{{ $index }}.mainMaterials"
                                        value="acrylic{{ $size }}mm">
                                    <label>Acrylic {{ $size }}MM</label>
                                </div>
                            @endforeach
                        </div>

                        <!-- Black Acrylic -->
                        <div class="col-md-3">
                            <strong>Black Acrylic</strong>
                            @foreach ([3, 5, 10, 15, 20, 25] as $size)
                                <div>
                                    <input type="checkbox" class="form-check-input"
                                        wire:model="mainCost.{{ $index }}.mainMaterials"
                                        value="black_acrylic{{ $size }}mm">
                                    <label>Black Acrylic {{ $size }}MM</label>
                                </div>
                            @endforeach
                        </div>

                        <!-- PVC -->
                        <div class="col-md-3">
                            <strong>PVC</strong>
                            @foreach ([3, 5, 10, 15, 20, 25] as $size)
                                <div>
                                    <input type="checkbox" class="form-check-input"
                                        wire:model="mainCost.{{ $index }}.mainMaterials"
                                        value="pvc{{ $size }}mm">
                                    <label>PVC {{ $size }}MM</label>
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
                                        wire:model="mainCost.{{ $index }}.mainMaterials"
                                        value="{{ $key }}">
                                    <label>{{ $label }}</label>
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
                                        wire:model="mainCost.{{ $index }}.mainMaterials"
                                        value="{{ $key }}">
                                    <label>{{ $label }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-3">
                            <h6>Neon</h6>
                            @foreach ([
        '5mm clear arcylic' => '5mm Clear Acrylic',
        '10mm clear arcylic' => '10mm Clear Acrylic',
    ] as $key => $label)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input"
                                        wire:model="mainCost.{{ $index }}.mainMaterials"
                                        value="{{ $key }}">
                                    <label class="form-check-label">{{ $label }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-3" x-data="{ enabled: @entangle('ownCost.' . $index . '.ownStickerHeightWidth') }">
                            <strong>Sticker</strong>
                            <div>
                                <input type="checkbox" class="form-check-input" x-model="enabled"
                                    wire:model="mainCost.{{ $index }}.mainStickerHeightWidth">
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
                                        wire:model="mainCost.{{ $index }}.stickerMaterial"
                                        value="{{ $val }}" :disabled="!enabled">
                                    <label>{{ $label }}</label>
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
                                        wire:model="mainCost.{{ $index }}.generalMaterial"
                                        value="{{ $key }}">
                                    <label>{{ $label }}</label>
                                </div>
                            @endforeach
                        </div>
                        <!-- Others -->
                        <div class="col-md-4">
                            <h6>Others</h6>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input"
                                    wire:model="mainCost.{{ $index }}.mainPaintHeightWidth">
                                <label class="form-check-label">Paint</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input"
                                    wire:model="mainCost.{{ $index }}.mainoracalHeightWidth">
                                <label class="form-check-label">Oracal</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input"
                                    wire:model.defer="mainCost.{{ $index }}.mainlightHeightWidth"
                                    wire:change="$refresh">
                                <label class="form-check-label">Lighting</label>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <!-- Lighting Options -->
                @if ($form['mainlightHeightWidth'])
                    <div class="row">
                        <div class="col-md-4">
                            <h6>Lighting Type</h6>
                            @foreach (['frontlit', 'backlit', 'sidelit', 'nolight'] as $type)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input"
                                        wire:model="mainCost.{{ $index }}.mainLightingType"
                                        wire:click="maincheckpowersupply({{ $index }})"
                                        value="{{ $type }}">
                                    <label class="form-check-label">{{ ucfirst($type) }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Power Supply</label>
                            <select class="form-select form-select-sm"
                                wire:model="mainCost.{{ $index }}.mainPowerSupply">
                                {{-- <option value="None">None</option> --}}
                                {{-- <option value="120W">120W</option>
                                <option value="200W">200W</option> --}}
                                <option value="400W">400W</option>
                            </select>
                        </div>
                       
                        <div class="col-md-4">
                            <label class="form-label">Power Supply Quantity</label>
                            <input type="number" min="0" class="form-control form-control-sm"
                                wire:model="mainCost.{{ $index }}.mainPowerSupplyQuantity"  readonly
                                style="font-weight: bold; background-color: #f0f0f0; color: #000;">

                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</div>
