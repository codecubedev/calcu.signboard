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
                    <input type="text" class="form-control form-control-sm" data-index="{{ $index }}"
                        name="logoText">
                </div>
                <div class="col-6 mb-3">
                    <label>Character Count</label>
                    <input type="text" class="form-control form-control-sm" readonly
                        id="char-count-{{ $index }}">
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
                    <h5>Materials</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Clear Acrylic</strong>
                            @foreach ([3, 5, 10, 15, 20, 25] as $size)
                                <div>
                                    <input type="checkbox" class="form-check-input"
                                        wire:model="addCost.{{ $index }}.addMaterials"
                                        value="acrylic{{ $size }}mm">
                                    <label>Acrylic {{ $size }}MM</label>
                                </div>
                            @endforeach
                        </div>

                        <div class="col-md-4">
                            <strong>PVC</strong>
                            @foreach ([3, 5, 10, 15, 20, 25] as $size)
                                <div>
                                    <input type="checkbox" class="form-check-input"
                                        wire:model="addCost.{{ $index }}.addMaterials"
                                        value="pvc{{ $size }}mm">
                                    <label>PVC {{ $size }}MM</label>
                                </div>
                            @endforeach
                        </div>

                        <div class="col-md-4" x-data="{ enabled: @entangle('addCost.' . $index . '.addStickerHeightWidth') }">
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
                                        value="{{ $val }}" :disabled="!enabled">
                                    <label>{{ $label }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <strong>General Material</strong>
                            <div>
                                <input type="checkbox" class="form-check-input"
                                    wire:model="addCost.{{ $index }}.generalMaterial" value="channel3d">
                                <label>3D Channel</label>
                            </div>
                            <div>
                                <input type="checkbox" class="form-check-input"
                                    wire:model="addCost.{{ $index }}.generalMaterial" value="aluminiumBoxUp">
                                <label>Aluminium Box Up</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <strong>Others</strong>
                            <div>
                                <input type="checkbox" class="form-check-input"
                                    wire:model="addCost.{{ $index }}.addPaintHeightWidth">
                                <label>Paint</label>
                            </div>
                            <div>
                                <input type="checkbox" class="form-check-input"
                                    wire:model="addCost.{{ $index }}.addoracalHeightWidth">
                                <label>Oracal</label>
                            </div>
                            <div>
                                <input type="checkbox" class="form-check-input"
                                    wire:model.defer="addCost.{{ $index }}.addlightHeightWidth"
                                    wire:change="$refresh">
                                <label>Lighting</label>

                            </div>
                        </div>
                    </div>

                    @if ($form['addlightHeightWidth'])
                        <div class="row mt-3">
                            <div class="col-4">
                                <label>Lighting Type</label>
                                @foreach (['frontlit', 'backlit', 'sidelit', 'nolight'] as $type)
                                    <div>
                                        <input type="checkbox" class="form-check-input"
                                            wire:model="addCost.{{ $index }}.addLightingType"
                                            value="{{ $type }}">
                                        <label>{{ ucfirst($type) }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-4">
                                <label>Power Supply</label>
                                <select class="form-select" wire:model="addCost.{{ $index }}.addPowerSupply">
                                    <option value="None">None</option>
                                    <option value="120W">120W</option>
                                    <option value="200W">200W</option>
                                    <option value="400W">400W</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <label>Power Supply Quantity</label>
                                <input type="number" min="1" class="form-control form-control-sm"
                                    wire:model="addCost.{{ $index }}.addPowerSupplyQuantity">
                            </div>
                        </div>
                    @endif
                </div>
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
