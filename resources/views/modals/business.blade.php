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
                                        value="acrylic{{ $size }}mm">
                                    <label>Acrylic {{ $size }}MM</label>
                                </div>
                            @endforeach
                        </div>


                        <div class="col-md-3">
                            <strong>Black Acrylic</strong>
                            @foreach ([3, 5, 10, 15, 20, 25] as $size)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input"
                                        wire:model="busCost.{{ $index }}.busMaterials"
                                        value="black_acrylic{{ $size }}mm">
                                    <label class="form-check-label"> Black Acrylic {{ $size }}MM</label>
                                </div>
                            @endforeach
                        </div>

                        <div class="col-md-3">
                            <strong>PVC</strong>
                            @foreach ([3, 5, 10, 15, 20, 25] as $size)
                                <div>
                                    <input type="checkbox" class="form-check-input"
                                        wire:model="busCost.{{ $index }}.busMaterials"
                                        value="pvc{{ $size }}mm">
                                    <label>PVC {{ $size }}MM</label>
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
                                        value="{{ $key }}">
                                    <label class="form-check-label">{{ $label }}</label>
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
                                        value="{{ $key }}">
                                    <label class="form-check-label">{{ $label }}</label>
                                </div>
                            @endforeach
                        </div>

                        <div class="col-md-3" x-data="{ enabled: @entangle('ownCost.' . $index . '.ownStickerHeightWidth') }">
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
                                        value="{{ $val }}" :disabled="!enabled">
                                    <label>{{ $label }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-3">
                            <strong>General Material</strong>

                            <div>
                                <input type="checkbox" class="form-check-input"
                                    wire:model="busCost.{{ $index }}.generalMaterial" value="channel3d">
                                <label>3D Channel</label>
                            </div>

                            <div>
                                <input type="checkbox" class="form-check-input"
                                    wire:model="busCost.{{ $index }}.generalMaterial" value="aluminiumBoxUp">
                                <label>Aluminium Box Up</label>
                            </div>

                            <div>
                                <input type="checkbox" class="form-check-input"
                                    wire:model="busCost.{{ $index }}.generalMaterial" value="ironHollow20mm">
                                <label>Iron Hollow 20mm</label>
                            </div>

                            <div>
                                <input type="checkbox" class="form-check-input"
                                    wire:model="busCost.{{ $index }}.generalMaterial" value="ironHollow10mm">
                                <label>Iron Hollow 10mm</label>
                            </div>

                            <div>
                                <input type="checkbox" class="form-check-input"
                                    wire:model="busCost.{{ $index }}.generalMaterial"
                                    value="spotlightWithBracket">
                                <label>Spotlight + bracket (1 set)</label>
                            </div>

                            <div>
                                <input type="checkbox" class="form-check-input"
                                    wire:model="busCost.{{ $index }}.generalMaterial" value="dimmer">
                                <label>Dimmer</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <strong>Others</strong>
                            <div>
                                <input type="checkbox" class="form-check-input"
                                    wire:model="busCost.{{ $index }}.busPaintHeightWidth">
                                <label>Paint</label>
                            </div>
                            <div>
                                <input type="checkbox" class="form-check-input"
                                    wire:model="busCost.{{ $index }}.busoracalHeightWidth">
                                <label>Oracal</label>
                            </div>
                            <div>
                                <input type="checkbox" class="form-check-input"
                                    wire:model.defer="busCost.{{ $index }}.buslightHeightWidth"
                                    wire:change="$refresh">
                                <label>Lighting</label>
                            </div>
                        </div>


                    </div>



                    @if ($form['buslightHeightWidth'])
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <h6>Lighting Type</h6>
                                @foreach (['frontlit', 'backlit', 'sidelit', 'nolight'] as $type)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input"
                                            wire:model="busCost.{{ $index }}.busLightingType"
                                            value="{{ $type }}">
                                        <label class="form-check-label">{{ ucfirst($type) }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Power Supply</label>
                                <select class="form-select form-select-sm"
                                    wire:model="busCost.{{ $index }}.busPowerSupply">
                                    <option value="None">None</option>
                                    <option value="120W">120W</option>
                                    <option value="200W">200W</option>
                                    <option value="400W">400W</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Power Supply Quantity</label>
                                <input type="number" min="1" class="form-control form-control-sm"
                                    wire:model="busCost.{{ $index }}.busPowerSupplyQuantity">
                            </div>
                        </div>
                    @endif
                </div>
            </div>
    @endforeach
</div>
