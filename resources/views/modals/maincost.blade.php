<div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Main Lettering</h2>
        <button wire:click="mainaddForm" class="btn btn-primary">Add</button>

    </div>


    @foreach ($mainCost as $index => $form)
        <div class="border p-3 mb-4 rounded">
            <div class="d-flex justify-content-between">
                <h4>Main Lettering Cost {{ $index + 1 }}</h4>
                <button class="btn btn-danger btn-sm" wire:click="mainremoveForm({{ $index }})">Remove</button>
            </div>

            <div class="row">
                <div class="col-6 mb-3">
                    <label>Main Text</label>
                    <input type="text" class="form-control form-control-sm"
                        wire:model.debounce.300ms="mainCost.{{ $index }}.mainText">
                </div>
                <div class="col-6 mb-3">
                    <label>Character Count</label>
                    <input type="text" class="form-control form-control-sm" readonly
                        value="{{ $form['characterCount'] }}">
                </div>

                <div class="col-6 mb-3">
                    <label>Main Height (inches)</label>
                    <input type="text" class="form-control form-control-sm"
                        wire:model.live="mainCost.{{ $index }}.mainHeight">
                </div>
                <div class="col-6 mb-3">
                    <label>Main Width (inches)</label>
                    <input type="text" class="form-control form-control-sm"
                        wire:model.live="mainCost.{{ $index }}.mainWidth">
                </div>
            </div>

            <h5>Materials</h5>
            <div class="row">
                <div class="col-md-4">
                    <h6>Clear Acrylic</h6>
                    @foreach ([3, 5, 10, 15, 20, 25] as $size)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input"
                                wire:model="mainCost.{{ $index }}.mainMaterials"
                                value="acrylic{{ $size }}mm">
                            <label class="form-check-label">Acrylic {{ $size }}MM</label>
                        </div>
                    @endforeach
                </div>

                <div class="col-md-4">
                    <h6>PVC</h6>
                    @foreach ([3, 5, 10, 15, 20, 25] as $size)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input"
                                wire:model="mainCost.{{ $index }}.mainMaterials"
                                value="pvc{{ $size }}mm">
                            <label class="form-check-label">PVC {{ $size }}MM</label>
                        </div>
                    @endforeach
                </div>

                <div class="col-md-4" x-data="{ enabled: @entangle('mainCost.' . $index . '.mainStickerHeightWidth') }">
                    <h6>Sticker</h6>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" x-model="enabled"
                            wire:model="mainCost.{{ $index }}.mainStickerHeightWidth">
                        <label class="form-check-label">Sticker</label>
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
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input"
                                wire:model="mainCost.{{ $index }}.stickerMaterial" value="{{ $val }}"
                                :disabled="!enabled">
                            <label class="form-check-label">{{ $label }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <h6>General Material</h6>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input"
                            wire:model="mainCost.{{ $index }}.generalMaterial" value="channel3d">
                        <label class="form-check-label">3D Channel</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input"
                            wire:model="mainCost.{{ $index }}.generalMaterial" value="aluminiumBoxUp">
                        <label class="form-check-label">Aluminium Box Up</label>
                    </div>
                </div>

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

            @if ($form['mainlightHeightWidth'])
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <h6>Lighting Type</h6>
                        @foreach (['frontlit', 'backlit', 'sidelit', 'nolight'] as $type)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input"
                                    wire:model="mainCost.{{ $index }}.mainLightingType"
                                    value="{{ $type }}">
                                <label class="form-check-label">{{ ucfirst($type) }}</label>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Power Supply</label>
                        <select class="form-select form-select-sm"
                            wire:model="mainCost.{{ $index }}.mainPowerSupply">
                            <option value="None">None</option>
                            <option value="120W">120W</option>
                            <option value="200W">200W</option>
                            <option value="400W">400W</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Power Supply Quantity</label>
                        <input type="number" min="1" class="form-control form-control-sm"
                            wire:model="mainCost.{{ $index }}.mainPowerSupplyQuantity">
                    </div>
                </div>
            @endif
        </div>
    @endforeach
</div>
