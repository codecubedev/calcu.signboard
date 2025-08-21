<div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Logo Cost</h2>
        <button wire:click="addForm" class="btn btn-primary">Add Logo</button>
    </div>


    @foreach ($editLogos as $index => $form)
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Logo Cost {{ $index + 1 }}</h5>
                <button class="btn btn-sm btn-danger" wire:click="removeForm({{ $index }})">Remove</button>
            </div>
            <div class="card-body">
                <div class="row">


                    <div class="row">
                        <div class="col-6 mb-3">
                            <label>Logo Text</label>
                            <input type="text" class="form-control form-control-sm"
                                wire:model.live="editLogos.{{ $index }}.text">
                        </div>
                        <div class="col-6 mb-3">
                            <label>Character Count</label>
                            <input type="text" class="form-control form-control-sm" readonly
                                value="{{ $logoCost[$index]['characterCount'] ?? '' }}">
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Logo Height (inches)</label>
                        <input type="text" class="form-control form-control-sm"
                            wire:model="editLogos.{{ $index }}.height">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Logo Width (inches)</label>
                        <input type="text" class="form-control form-control-sm"
                            wire:model="editLogos.{{ $index }}.width">
                    </div>
                </div>
                <hr>



                <div class="col-12">
                    <h6>Raw Materials</h6>
                    <div class="row">

                        {{-- ✅ Clear Acrylic --}}
                        <div class="col-2">
                            <strong>Clear Acrylic</strong><br>
                            @foreach ([3, 5, 10, 15, 20, 25] as $size)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input"
                                        wire:model="editLogos.{{ $index }}.acrylic"
                                        value="acrylic{{ $size }}mm">
                                    <label>Acrylic {{ $size }}MM</label>
                                </div>
                            @endforeach
                        </div>

                        {{-- ✅ Black Acrylic --}}
                        <div class="col-2">
                            <strong>Black Acrylic</strong><br>
                            @foreach ([3, 5, 10, 15, 20, 25] as $size)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input"
                                        wire:model="editLogos.{{ $index }}.black_acrylic"
                                        value="black_acrylic{{ $size }}mm">
                                    <label>Black Acrylic {{ $size }}MM</label>
                                </div>
                            @endforeach
                        </div>

                        {{-- ✅ PVC --}}
                        <div class="col-2">
                            <strong>PVC</strong><br>
                            @foreach ([3, 5, 10, 15, 20, 25] as $size)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input"
                                        wire:model="editLogos.{{ $index }}.pvc"
                                        value="pvc{{ $size }}mm">
                                    <label>PVC {{ $size }}MM</label>
                                </div>
                            @endforeach
                        </div>

                        {{-- ✅ Stainless Steel --}}
                        <div class="col-2">
                            <strong>Stainless Steel (Silver)</strong><br>
                            @foreach (['mirror_frontlit', 'mirror_backlit', 'mirror_boxup', 'hairline_frontlit', 'hairline_backlit', 'hairline_boxup'] as $item)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input"
                                        wire:model="editLogos.{{ $index }}.stainless"
                                        value="{{ $item }}">
                                    <label>{{ ucwords(str_replace('_', ' ', $item)) }}</label>
                                </div>
                            @endforeach
                        </div>

                        {{-- ✅ Sticker --}}
                        <div class="col-2">
                            <strong>Sticker</strong><br>
                            @foreach (['sticker', 'whiteStickerMattLamm', 'greyBase', 'lightboxSticker'] as $item)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input"
                                        wire:model="editLogos.{{ $index }}.sticker"
                                        value="{{ $item }}">
                                    <label>{{ $item }}</label>
                                </div>
                            @endforeach
                        </div>

                        {{-- ✅ General --}}
                        <div class="col-2">
                            <strong>General Material</strong><br>
                            @foreach (['3dChannel', 'aluminiumBoxUp', 'ironHollow20mm', 'ironHollow10mm'] as $item)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input"
                                        wire:model="editLogos.{{ $index }}.general"
                                        value="{{ $item }}">
                                    <label>{{ $item }}</label>
                                </div>
                            @endforeach
                        </div>

                    </div>


                </div>

                @if (!empty($form['edit_logolightHeightWidth']))
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
