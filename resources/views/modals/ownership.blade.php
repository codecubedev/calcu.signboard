@foreach ($ownCost as $index => $form)
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
                    wire:model="ownCost.{{ $index }}.ownText">
            </div>

            <!-- Character Count -->
            <div class="col-6 mb-3">
                <label>Character Count</label>
                <input type="text" class="form-control form-control-sm" readonly
                    wire:model="ownCost.{{ $index }}.characterCount">
            </div>

            <!-- Height & Width -->
            <div class="col-6 mb-3">
                <label>Ownership Height (inches)</label>
                <input type="number" step="0.01" class="form-control form-control-sm"
                    wire:model="ownCost.{{ $index }}.ownHeight">
            </div>
            <div class="col-6 mb-3">
                <label>Ownership Width (inches)</label>
                <input type="number" step="0.01" class="form-control form-control-sm"
                    wire:model="ownCost.{{ $index }}.ownWidth">
            </div>

            <!-- Materials Section -->
            <div class="col-12">
                <h5>Row Materials</h5>
                <div class="row">
                    <!-- Clear Acrylic -->
                    <div class="col-md-3">
                        <strong>Clear Acrylic</strong>
                        @foreach ([3, 5, 10, 15, 20, 25] as $size)
                            <div>
                                <input type="checkbox" class="form-check-input"
                                    wire:model="ownCost.{{ $index }}.ownMaterials"
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
                                    wire:model="ownCost.{{ $index }}.ownMaterials"
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
                                    wire:model="ownCost.{{ $index }}.ownMaterials"
                                    value="pvc{{ $size }}mm">
                                <label>PVC {{ $size }}MM</label>
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
                                    wire:model="ownCost.{{ $index }}.ownMaterials"
                                    value="{{ $key }}">
                                <label>{{ $label }}</label>
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
                                    wire:model="ownCost.{{ $index }}.ownMaterials"
                                    value="{{ $key }}">
                                <label>{{ $label }}</label>
                            </div>
                        @endforeach
                    </div>

                    <!-- Sticker -->
                    <div class="col-md-3" x-data="{ enabled: @entangle('ownCost.' . $index . '.ownStickerHeightWidth') }">
                        <strong>Sticker</strong>
                        <div>
                            <input type="checkbox" class="form-check-input" x-model="enabled"
                                wire:model="ownCost.{{ $index }}.ownStickerHeightWidth">
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
                                    wire:model="ownCost.{{ $index }}.stickerMaterial"
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
                            'spotlightWithBracket' => 'Spotlight + bracket (1 set)',
                            'dimmer' => 'Dimmer',
                        ] as $value => $label)
                            <div>
                                <input type="checkbox" class="form-check-input"
                                    wire:model="ownCost.{{ $index }}.generalMaterial"
                                    value="{{ $value }}">
                                <label>{{ $label }}</label>
                            </div>
                        @endforeach
                    </div>

                    <!-- Others -->
                    <div class="col-md-3">
                        <strong>Others</strong>
                        <div>
                            <input type="checkbox" class="form-check-input"
                                wire:model="ownCost.{{ $index }}.ownPaintHeightWidth">
                            <label>Paint</label>
                        </div>
                        <div>
                            <input type="checkbox" class="form-check-input"
                                wire:model="ownCost.{{ $index }}.ownoracalHeightWidth">
                            <label>Oracal</label>
                        </div>
                        <div>
                            <input type="checkbox" class="form-check-input"
                                wire:model.defer="ownCost.{{ $index }}.ownlightHeightWidth"
                                wire:change="$refresh">
                            <label>Lighting</label>
                        </div>
                    </div>
                </div>

                <!-- Lighting Section -->
                @if ($form['ownlightHeightWidth'])
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <h6>Lighting Type</h6>
                            @foreach (['frontlit', 'backlit', 'sidelit', 'nolight'] as $type)
                                <div>
                                    <input type="checkbox" class="form-check-input"
                                        wire:model="ownCost.{{ $index }}.ownLightingType"
                                        value="{{ $type }}">
                                    <label>{{ ucfirst($type) }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-4">
                            <label>Power Supply</label>
                            <select class="form-select form-select-sm"
                                wire:model="ownCost.{{ $index }}.ownPowerSupply">
                                <option value="None">None</option>
                                <option value="120W">120W</option>
                                <option value="200W">200W</option>
                                <option value="400W">400W</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Power Supply Quantity</label>
                            <input type="number" min="1" class="form-control form-control-sm"
                                wire:model="ownCost.{{ $index }}.ownPowerSupplyQuantity">
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endforeach
