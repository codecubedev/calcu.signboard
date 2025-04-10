<div>
    
    <div class="mt-3">
        <div class="p-4">
            <h2 class="text-center mb-4" style="color:brown;">Signboard Cost Calculator</h2>
            {{-- bader --}}
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label >Job Name</label>
                        <input type="text" class="form-control form-control-sm" wire:model="job_name">
                    </div>
                    @error('job_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label >Date</label>
                        <input type="date" class="form-control form-control-sm" wire:model="date">
                    </div>
                    @error('date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


            </div>
            <div class="row">
                <div class="col-4">
                    <div class="mb-3">
                        <label >Company Name</label>
                        <input type="text" class="form-control form-control-sm" wire:model="company_name">
                    </div>
                    @error('company_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label >Customer Name</label>
                        <input type="text" class="form-control form-control-sm" wire:model="customer_name">
                    </div>
                    @error('customer_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="mb-3">
                        <label for="baseHeight" >Customer Phone Number</label>
                        <input type="text" class="form-control form-control-sm" wire:model="customer_phone_no">
                       
                    </div>
                    @error('customer_phone_no')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <div class="row">
                <h2>Base Cost :</h2>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="baseType" >Choose Base</label>
                        <select class="form-select" id="baseType" wire:model="baseType">
                            <option value="">Select Base</option>
                            <option value="Aluminium Strip - Vertical">Aluminium Strip - Vertical</option>
                            <option value="Aluminium Strip - Vertical Woodgrain">Aluminium Strip - Vertical Woodgrain
                            </option>
                            <option value="Aluminium Strip - Horizontal">Aluminium Strip - Horizontal</option>
                            <option value="colorbond">Colorbond</option>
                            <option value="Alu Coil + Iron Frame + Tarpaulin (No UV Print)">Alu Coil + Iron Frame +
                                Tarpaulin (No UV Print)</option>
                            <option value="Alu Coil + Iron Frame + Tarpaulin (With UV Print)">Alu Coil + Iron Frame +
                                Tarpaulin (With UV Print)</option>
                            <option value="Lightbox">Lightbox</option>
                            <option value="Double Sided Lightbox">Double Sided Lightbox</option>
                        </select>
                    </div>

                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="baseMember" >Member</label>
                        <select class="form-select" id="baseMember" wire:model="baseMember">
                            <option value="">Select Member</option>
                            <option value="Agent">Agent</option>
                            <option value="User">User</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="baseHeight" >Base Height (inches)</label>
                        <input type="number" class="form-control form-control-sm" id="baseHeight" wire:model="baseHeight">
                    </div>
                </div>
                <div class="col-6">

                    <div class="mb-3">
                        <label for="baseWidth" >Base Width (inches)</label>
                        <input type="number" class="form-control form-control-sm" id="baseWidth" wire:model="baseWidth">
                    </div>
                </div>


            </div>
            {{-- logo --}}
            <div class="row">
                <h2>Logo Cost</h2>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="logoText" >Logo Text</label>
                        <input type="text" class="form-control form-control-sm" id="logoText" wire:model.live="logoText"
                            oninput="updateCharacterCount()">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="logoCharacterCount" >Character Count</label>
                        <input type="text" class="form-control form-control-sm" id="logoCharacterCount" wire:model="characterCount"
                            readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="logoHeight" >Logo Height (inches)</label>
                        <input type="number" class="form-control form-control-sm" id="logoHeight" wire:model="logoHeight">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="logoWidth" >Logo Width (inches)</label>
                        <input type="number" class="form-control form-control-sm" id="logoWidth" wire:model="logoWidth">
                    </div>

                </div>

                <div class="mb-3 border p-3 rounded">
                    <label >Logo Materials</label>
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Clear Acrylic</strong>
                            @foreach ([3, 5, 10, 15, 20, 25] as $size)
                                <div>
                                    <input type="checkbox" class="clear-acrylic form-check-input"
                                        wire:model="logoMaterials" value="acrylic{{ $size }}mm">
                                    <label>Acrylic {{ $size }}MM</label>
                                </div>
                            @endforeach
                            <b>White Acrylic</b>
                            <div>
                                <input type="checkbox" class="white-acrylic form-check-input"
                                    wire:model="logoMaterials" value="whiteacrylic3mm">
                                <label>Acrylic 3MM</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <strong>PVC</strong>
                            @foreach ([3, 5, 10, 15, 20, 25] as $size)
                                <div>
                                    <input type="checkbox" class="form-check-input" wire:model="logoMaterials"
                                        value="pvc{{ $size }}mm">
                                    <label>PVC {{ $size }}MM</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-4">
                            <!-- Main Sticker Checkbox -->
                            <input class="form-check-input" type="checkbox" wire:model="logoStickerHeightWidth"
                                id="logoStickerCheckbox" onchange="toggleStickerOptions()">
                            <label class="form-check-label"><strong>Sticker</strong></label>

                            @php
                                $stickerMaterialsFirst = [
                                    'whiteStickerMattLamm' => 'White Sticker Matt Lamm',
                                    'greyBase' => 'Grey Base',
                                    'lightboxSticker' => 'Lightbox Sticker',
                                    'reverseSticker' => 'Reverse Sticker',
                                    'dieCutStickerWhite' => 'Die Cut Sticker White',
                                    'dieCutStickerBlack' => 'Die Cut Sticker Black',
                                    'dieCutStickerPrinted' => 'Die Cut Sticker Printed',
                                ];
                            @endphp

                            @foreach ($stickerMaterialsFirst as $value => $label)
                                <div class="form-check">
                                    <input class="form-check-input sticker-options" type="checkbox"
                                        wire:model="stickerMaterial" value="{{ $value }}" disabled>
                                    <label class="form-check-label">{{ $label }}</label>
                                </div>
                            @endforeach
                        </div>


                    </div>
                    <div class="row mt-3">

                        <div class="col-md-4">
                            <strong>General Material</strong>
                            <div>
                                <input type="checkbox" class="form-check-input" id="channel3d"
                                    wire:model="generalMaterial" value="channel3d">
                                <label for="channel3d">3D Channel</label>
                            </div>
                            <div>
                                <input type="checkbox" class="form-check-input" id="aluminiumBoxUp"
                                    wire:model="generalMaterial" value="aluminiumBoxUp">
                                <label for="aluminiumBoxUp">Aluminium Box Up</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <strong>Others</strong>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" wire:model="logoPaintHeightWidth">
                                <label class="form-check-label">Paint</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" wire:model="logooracalHeightWidth">
                                <label class="form-check-label">Oracal </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                    wire:model.live="logolightHeightWidth">
                                <label class="form-check-label">Lighting </label>
                            </div>
                        </div>


                    </div>
                    @if ($logolightHeightWidth)
                        <div class="row mt-3">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label >Lighting Type</label>
                                    @php
                                        $lighting = [
                                            'frontlit' => 'Frontlit',
                                            'backlit' => 'Backlit',
                                            'sidelit' => 'Sidelit',
                                            'nolight' => 'No light',
                                        ];
                                    @endphp

                                    @foreach ($lighting as $value => $label)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                wire:model="logoLightingType" value="{{ $value }}">
                                            <label class="form-check-label">{{ $label }}</label>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="logoPowerSupply" >Power Supply</label>
                                    <select class="form-select" id="logoPowerSupply" wire:model="logoPowerSupply">
                                        <option value="None">None</option>
                                        <option value="120W">120W</option>
                                        <option value="200W">200W</option>
                                        <option value="400W">400W</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="logoPowerSupplyQuantity" >Power Supply
                                        Quantity</label>
                                    <input type="number" class="form-control form-control-sm" id="logoPowerSupplyQuantity"
                                        wire:model="logoPowerSupplyQuantity" min="1">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            {{-- main --}}
            <div class="row">
                <h2>Main Lettering Cost</h2>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="mainText">Main Lettering Text</label>
                        <input type="text" class="form-control form-control-sm" id="mainText" wire:model.live="mainText">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="mainCharacterCount">Character Count</label>
                        <input type="text" class="form-control form-control-sm" id="mainCharacterCount" wire:model="maincharacterCount" readonly>
                    </div>
                </div>
                
                <div class="col-6">
                    <div class="mb-3">
                        <label for="mainHeight" >Height (inches)</label>
                        <input type="number" class="form-control form-control-sm" id="mainHeight" wire:model="mainHeight">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="mainWidth" >Width (inches)</label>
                        <input type="number" class="form-control form-control-sm" id="mainWidth" wire:model="mainWidth">
                    </div>

                </div>

                <div class="mb-3 border p-3 rounded">
                    <label >Main Lettering Materials</label>
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Clear Acrylic</strong>
                            @foreach ([3, 5, 10, 15, 20, 25] as $size)
                                <div>
                                    <input type="checkbox" class="clear-acrylic form-check-input"
                                        wire:model="mainMaterials" value="acrylic{{ $size }}mm">
                                    <label>Acrylic {{ $size }}MM</label>
                                </div>
                            @endforeach
                            <b>White Acrylic</b>
                            <div>
                                <input type="checkbox" class="white-acrylic form-check-input"
                                    wire:model="mainMaterials" value="whiteacrylic3mm">
                                <label>Acrylic 3MM</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <strong>PVC</strong>
                            @foreach ([3, 5, 10, 15, 20, 25] as $size)
                                <div>
                                    <input type="checkbox" class="form-check-input" wire:model="mainMaterials"
                                        value="pvc{{ $size }}mm">
                                    <label>PVC {{ $size }}MM</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-4">
                            <!-- Main Sticker Checkbox -->
                            <input class="form-check-input" type="checkbox" wire:model="mainStickerHeightWidth"
                                id="mainStickerCheckbox" onchange="toggleMainStickerOptions()">
                            <label class="form-check-label"><strong>Sticker</strong></label>

                            @php
                                $stickerMaterialsFirst = [
                                    'whiteStickerMattLamm' => 'White Sticker Matt Lamm',
                                    'greyBase' => 'Grey Base',
                                    'lightboxSticker' => 'Lightbox Sticker',
                                    'reverseSticker' => 'Reverse Sticker',
                                    'dieCutStickerWhite' => 'Die Cut Sticker White',
                                    'dieCutStickerBlack' => 'Die Cut Sticker Black',
                                    'dieCutStickerPrinted' => 'Die Cut Sticker Printed',
                                ];
                            @endphp

                            @foreach ($stickerMaterialsFirst as $value => $label)
                                <div class="form-check">
                                    <input class="form-check-input sticker-options" type="checkbox"
                                        wire:model="mainstickerMaterial" value="{{ $value }}" disabled>
                                    <label class="form-check-label">{{ $label }}</label>
                                </div>
                            @endforeach
                        </div>


                    </div>
                    <div class="row mt-3">

                        <div class="col-md-4">
                            <strong>General Material</strong>
                            <div>
                                <input type="checkbox" class="form-check-input" id="channel3d"
                                    wire:model="maingeneralMaterial" value="channel3d">
                                <label for="channel3d">3D Channel</label>
                            </div>
                            <div>
                                <input type="checkbox" class="form-check-input" id="aluminiumBoxUp"
                                    wire:model="maingeneralMaterial" value="aluminiumBoxUp">
                                <label for="aluminiumBoxUp">Aluminium Box Up</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <strong>Others</strong>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" wire:model="mainPaintHeightWidth">
                                <label class="form-check-label">Paint</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" wire:model="mainoracalHeightWidth">
                                <label class="form-check-label">Oracal </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                    wire:model.live="mainlightHeightWidth">
                                <label class="form-check-label">Lighting </label>
                            </div>
                        </div>


                    </div>
                    @if ($mainlightHeightWidth)
                        <div class="row mt-3">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label >Lighting Type</label>
                                    @php
                                        $lighting = [
                                            'frontlit' => 'Frontlit',
                                            'backlit' => 'Backlit',
                                            'sidelit' => 'Sidelit',
                                            'nolight' => 'No light',
                                        ];
                                    @endphp

                                    @foreach ($lighting as $value => $label)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                wire:model="mainLightingType" value="{{ $value }}">
                                            <label class="form-check-label">{{ $label }}</label>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="logoPowerSupply" >Power Supply</label>
                                    <select class="form-select" id="logoPowerSupply" wire:model="mainPowerSupply">
                                        <option value="None">None</option>
                                        <option value="120W">120W</option>
                                        <option value="200W">200W</option>
                                        <option value="400W">400W</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="logoPowerSupplyQuantity" >Power Supply
                                        Quantity</label>
                                    <input type="number" class="form-control form-control-sm" id="mainPowerSupplyQuantity"
                                        wire:model="mainPowerSupplyQuantity" min="1">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            {{-- Additional Lettering Text --}}
            <div class="row">
                <h2>Additional Lettering Text</h2>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="mainText" >Additional Lettering Text</label>
                        <input type="text" class="form-control form-control-sm" id="addText" wire:model.live="addText"
                            oninput="updateaddCharacterCount()">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="addCharacterCount" >Character Count</label>
                        <input type="text" class="form-control form-control-sm" id="addCharacterCount"
                            wire:model="characterCount" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="addHeight" >Height (inches)</label>
                        <input type="number" class="form-control form-control-sm" id="addHeight" wire:model="addHeight">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="addWidth" >Width (inches)</label>
                        <input type="number" class="form-control form-control-sm" id="addWidth" wire:model="addWidth">
                    </div>

                </div>

                <div class="mb-3 border p-3 rounded">
                    <label >Additional Lettering Materials</label>
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Clear Acrylic</strong>
                            @foreach ([3, 5, 10, 15, 20, 25] as $size)
                                <div>
                                    <input type="checkbox" class="clear-acrylic form-check-input"
                                        wire:model="addMaterials" value="acrylic{{ $size }}mm">
                                    <label>Acrylic {{ $size }}MM</label>
                                </div>
                            @endforeach
                            <b>White Acrylic</b>
                            <div>
                                <input type="checkbox" class="white-acrylic form-check-input"
                                    wire:model="addMaterials" value="whiteacrylic3mm">
                                <label>Acrylic 3MM</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <strong>PVC</strong>
                            @foreach ([3, 5, 10, 15, 20, 25] as $size)
                                <div>
                                    <input type="checkbox" class="form-check-input" wire:model="addMaterials"
                                        value="pvc{{ $size }}mm">
                                    <label>PVC {{ $size }}MM</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-4">
                            <!-- Main Sticker Checkbox -->
                            <input class="form-check-input" type="checkbox" wire:model="addStickerHeightWidth"
                                id="addStickerCheckbox" onchange="toggleaddStickerOptions()">
                            <label class="form-check-label"><strong>Sticker</strong></label>

                            @php
                                $stickerMaterialsFirst = [
                                    'whiteStickerMattLamm' => 'White Sticker Matt Lamm',
                                    'greyBase' => 'Grey Base',
                                    'lightboxSticker' => 'Lightbox Sticker',
                                    'reverseSticker' => 'Reverse Sticker',
                                    'dieCutStickerWhite' => 'Die Cut Sticker White',
                                    'dieCutStickerBlack' => 'Die Cut Sticker Black',
                                    'dieCutStickerPrinted' => 'Die Cut Sticker Printed',
                                ];
                            @endphp

                            @foreach ($stickerMaterialsFirst as $value => $label)
                                <div class="form-check">
                                    <input class="form-check-input sticker-options" type="checkbox"
                                        wire:model="addstickerMaterial" value="{{ $value }}" disabled>
                                    <label class="form-check-label">{{ $label }}</label>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="row mt-3">

                        <div class="col-md-4">
                            <strong>General Material</strong>
                            <div>
                                <input type="checkbox" class="form-check-input" id="channel3d"
                                    wire:model="addgeneralMaterial" value="channel3d">
                                <label for="channel3d">3D Channel</label>
                            </div>
                            <div>
                                <input type="checkbox" class="form-check-input" id="aluminiumBoxUp"
                                    wire:model="addgeneralMaterial" value="aluminiumBoxUp">
                                <label for="aluminiumBoxUp">Aluminium Box Up</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <strong>Others</strong>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" wire:model="addPaintHeightWidth">
                                <label class="form-check-label">Paint</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" wire:model="addoracalHeightWidth">
                                <label class="form-check-label">Oracal </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                    wire:model.live="addlightHeightWidth">
                                <label class="form-check-label">Lighting </label>
                            </div>
                        </div>


                    </div>
                    @if ($addlightHeightWidth)
                        <div class="row mt-3">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label >Lighting Type</label>
                                    @php
                                        $lighting = [
                                            'frontlit' => 'Frontlit',
                                            'backlit' => 'Backlit',
                                            'sidelit' => 'Sidelit',
                                            'nolight' => 'No light',
                                        ];
                                    @endphp

                                    @foreach ($lighting as $value => $label)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                wire:model="addLightingType" value="{{ $value }}">
                                            <label class="form-check-label">{{ $label }}</label>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="addPowerSupply" >Power Supply</label>
                                    <select class="form-select" id="addPowerSupply" wire:model="addPowerSupply">
                                        <option value="None">None</option>
                                        <option value="120W">120W</option>
                                        <option value="200W">200W</option>
                                        <option value="400W">400W</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="addPowerSupplyQuantity" >Power Supply
                                        Quantity</label>
                                    <input type="number" class="form-control form-control-sm" id="addPowerSupplyQuantity"
                                        wire:model="addPowerSupplyQuantity" min="1">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            {{-- Type of Business Text --}}
            <div class="row">
                <h2>Type of Business Text</h2>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="mainText" >Business Text</label>
                        <input type="text" class="form-control form-control-sm" id="busText" wire:model.live="busText"
                            oninput="updateBusCharacterCount()">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="busCharacterCount" >Character Count</label>
                        <input type="text" class="form-control form-control-sm" id="busCharacterCount" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="busHeight" >Height (inches)</label>
                        <input type="number" class="form-control form-control-sm" id="busHeight" wire:model="busHeight">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="busWidth" >Width (inches)</label>
                        <input type="number" class="form-control form-control-sm" id="busWidth" wire:model="busWidth">
                    </div>

                </div>

                <div class="mb-3 border p-3 rounded">
                    <label >Business Materials</label>
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Clear Acrylic</strong>
                            @foreach ([3, 5, 10, 15, 20, 25] as $size)
                                <div>
                                    <input type="checkbox" class="clear-acrylic form-check-input"
                                        wire:model="busMaterials" value="acrylic{{ $size }}mm">
                                    <label>Acrylic {{ $size }}MM</label>
                                </div>
                            @endforeach
                            <b>White Acrylic</b>
                            <div>
                                <input type="checkbox" class="white-acrylic form-check-input"
                                    wire:model="busMaterials" value="whiteacrylic3mm">
                                <label>Acrylic 3MM</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <strong>PVC</strong>
                            @foreach ([3, 5, 10, 15, 20, 25] as $size)
                                <div>
                                    <input type="checkbox" class="form-check-input" wire:model="busMaterials"
                                        value="pvc{{ $size }}mm">
                                    <label>PVC {{ $size }}MM</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-4">
                            <!-- Main Sticker Checkbox -->
                            <input class="form-check-input" type="checkbox" wire:model="busStickerHeightWidth"
                                id="busStickerCheckbox" onchange="togglebusStickerOptions()">
                            <label class="form-check-label"><strong>Sticker</strong></label>

                            @php
                                $stickerMaterialsFirst = [
                                    'whiteStickerMattLamm' => 'White Sticker Matt Lamm',
                                    'greyBase' => 'Grey Base',
                                    'lightboxSticker' => 'Lightbox Sticker',
                                    'reverseSticker' => 'Reverse Sticker',
                                    'dieCutStickerWhite' => 'Die Cut Sticker White',
                                    'dieCutStickerBlack' => 'Die Cut Sticker Black',
                                    'dieCutStickerPrinted' => 'Die Cut Sticker Printed',
                                ];
                            @endphp

                            @foreach ($stickerMaterialsFirst as $value => $label)
                                <div class="form-check">
                                    <input class="form-check-input sticker-options" type="checkbox"
                                        wire:model="busstickerMaterial" value="{{ $value }}" disabled>
                                    <label class="form-check-label">{{ $label }}</label>
                                </div>
                            @endforeach
                        </div>


                    </div>
                    <div class="row mt-3">

                        <div class="col-md-4">
                            <strong>General Material</strong>
                            <div>
                                <input type="checkbox" class="form-check-input" id="channel3d"
                                    wire:model="busgeneralMaterial" value="channel3d">
                                <label for="channel3d">3D Channel</label>
                            </div>
                            <div>
                                <input type="checkbox" class="form-check-input" id="aluminiumBoxUp"
                                    wire:model="busgeneralMaterial" value="aluminiumBoxUp">
                                <label for="aluminiumBoxUp">Aluminium Box Up</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <strong>Others</strong>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" wire:model="busPaintHeightWidth">
                                <label class="form-check-label">Paint</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" wire:model="busoracalHeightWidth">
                                <label class="form-check-label">Oracal </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                    wire:model.live="buslightHeightWidth">
                                <label class="form-check-label">Lighting </label>
                            </div>
                        </div>


                    </div>
                    @if ($buslightHeightWidth)
                        <div class="row mt-3">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label >Lighting Type</label>
                                    @php
                                        $lighting = [
                                            'frontlit' => 'Frontlit',
                                            'backlit' => 'Backlit',
                                            'sidelit' => 'Sidelit',
                                            'nolight' => 'No light',
                                        ];
                                    @endphp

                                    @foreach ($lighting as $value => $label)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                wire:model="busLightingType" value="{{ $value }}">
                                            <label class="form-check-label">{{ $label }}</label>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="logoPowerSupply" >Power Supply</label>
                                    <select class="form-select" id="busPowerSupply" wire:model="busPowerSupply">
                                        <option value="None">None</option>
                                        <option value="120W">120W</option>
                                        <option value="200W">200W</option>
                                        <option value="400W">400W</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="logoPowerSupplyQuantity" >Power Supply
                                        Quantity</label>
                                    <input type="number" class="form-control form-control-sm" id="busPowerSupplyQuantity"
                                        wire:model="busPowerSupplyQuantity" min="1">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Ownership Sticker Text --}}
            <div class="row">
                <h2>Ownership Sticker</h2>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="ownText" >Ownership Text</label>
                        <input type="text" class="form-control form-control-sm" id="ownText" wire:model.live="ownText"
                            oninput="updateownCharacterCount()">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="ownCharacterCount" >Character Count</label>
                        <input type="text" class="form-control form-control-sm" id="ownCharacterCount" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="ownHeight" >Height (inches)</label>
                        <input type="number" class="form-control form-control-sm" id="ownHeight" wire:model="ownHeight">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="ownWidth" >Width (inches)</label>
                        <input type="number" class="form-control form-control-sm" id="ownWidth" wire:model="ownWidth">
                    </div>

                </div>

                <div class="mb-3 border p-3 rounded">
                    <label >Ownership Materials</label>
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Clear Acrylic</strong>
                            @foreach ([3, 5, 10, 15, 20, 25] as $size)
                                <div>
                                    <input type="checkbox" class="clear-acrylic form-check-input"
                                        wire:model="ownMaterials" value="acrylic{{ $size }}mm">
                                    <label>Acrylic {{ $size }}MM</label>
                                </div>
                            @endforeach
                            <b>White Acrylic</b>
                            <div>
                                <input type="checkbox" class="white-acrylic form-check-input"
                                    wire:model="ownMaterials" value="whiteacrylic3mm">
                                <label>Acrylic 3MM</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <strong>PVC</strong>
                            @foreach ([3, 5, 10, 15, 20, 25] as $size)
                                <div>
                                    <input type="checkbox" class="form-check-input" wire:model="ownMaterials"
                                        value="pvc{{ $size }}mm">
                                    <label>PVC {{ $size }}MM</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-4">
                            <!-- Main Sticker Checkbox -->
                            <input class="form-check-input" type="checkbox" wire:model="ownStickerHeightWidth"
                                id="ownStickerCheckbox" onchange="toggleownerStickerOptions()">
                            <label class="form-check-label"><strong>Sticker</strong></label>

                            @php
                                $stickerMaterialsFirst = [
                                    'whiteStickerMattLamm' => 'White Sticker Matt Lamm',
                                    'greyBase' => 'Grey Base',
                                    'lightboxSticker' => 'Lightbox Sticker',
                                    'reverseSticker' => 'Reverse Sticker',
                                    'dieCutStickerWhite' => 'Die Cut Sticker White',
                                    'dieCutStickerBlack' => 'Die Cut Sticker Black',
                                    'dieCutStickerPrinted' => 'Die Cut Sticker Printed',
                                ];
                            @endphp

                            @foreach ($stickerMaterialsFirst as $value => $label)
                                <div class="form-check">
                                    <input class="form-check-input sticker-options" type="checkbox"
                                        wire:model="ownstickerMaterial" value="{{ $value }}" disabled>
                                    <label class="form-check-label">{{ $label }}</label>
                                </div>
                            @endforeach
                        </div>


                    </div>
                    <div class="row mt-3">

                        <div class="col-md-4">
                            <strong>General Material</strong>
                            <div>
                                <input type="checkbox" class="form-check-input" id="channel3d"
                                    wire:model="owngeneralMaterial" value="channel3d">
                                <label for="channel3d">3D Channel</label>
                            </div>
                            <div>
                                <input type="checkbox" class="form-check-input" id="aluminiumBoxUp"
                                    wire:model="owngeneralMaterial" value="aluminiumBoxUp">
                                <label for="aluminiumBoxUp">Aluminium Box Up</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <strong>Others</strong>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" wire:model="ownPaintHeightWidth">
                                <label class="form-check-label">Paint</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" wire:model="ownoracalHeightWidth">
                                <label class="form-check-label">Oracal </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                    wire:model.live="ownlightHeightWidth">
                                <label class="form-check-label">Lighting </label>
                            </div>
                        </div>


                    </div>
                    @if ($ownlightHeightWidth)
                        <div class="row mt-3">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label >Lighting Type</label>
                                    @php
                                        $lighting = [
                                            'frontlit' => 'Frontlit',
                                            'backlit' => 'Backlit',
                                            'sidelit' => 'Sidelit',
                                            'nolight' => 'No light',
                                        ];
                                    @endphp

                                    @foreach ($lighting as $value => $label)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                wire:model="ownLightingType" value="{{ $value }}">
                                            <label class="form-check-label">{{ $label }}</label>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="logoPowerSupply" >Power Supply</label>
                                    <select class="form-select" id="logoPowerSupply" wire:model="ownPowerSupply">
                                        <option value="None">None</option>
                                        <option value="120W">120W</option>
                                        <option value="200W">200W</option>
                                        <option value="400W">400W</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="logoPowerSupplyQuantity" >Power Supply
                                        Quantity</label>
                                    <input type="number" class="form-control form-control-sm" id="ownPowerSupplyQuantity"
                                        wire:model="mainPowerSupplyQuantity" min="1">
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-auto">
                <button type="button" wire:click="calculateBaseCost" class="btn btn-primary">
                    Calculate Cost
                </button>
            </div>
            
            <div class="col-auto">
                <button type="button" wire:click="saveDatabase" class="btn btn-success"
                    @if (!$isCalculated) disabled @endif>
                    Save
                </button>
            </div>
        </div>

        <div class="col-12 mt-2">
            <div id="calculationResults" class="col-12"
                style="height: 1000px; overflow-y: auto; border: 1px solid #ddd; padding: 10px;">
                <div class="mb-5">
                    <h2 class="text-center mb-4">Calculation Results</h2>
                    <div class="mb-3">
                        <h4>Base</h4>
                        <label class="form-label">Base Cost:</label>
                        <div id="baseCostDisplay" class="alert alert-info">{{ $baseCost ?? 0 }}</div>
                    </div>

                    <div class="mb-3">
                        <h4>Logo</h4>
                        <strong>Logo Cost: </strong>
                        <div class="alert alert-primary">{{ $logoCost ?? 0 }}</div>
                    </div>
                    <div class="mb-3">
                        <h4>Main</h4>
                        <strong>Main Cost: </strong>
                        <div class="alert alert-warning">{{ $mainCost ?? 0 }}</div>
                    </div>
                    <div class="mb-3">
                        <h4>Additional</h4>
                        <strong>Additional Cost: </strong>
                        <div class="alert alert-danger">{{ $addCost ?? 0 }}</div>
                    </div>
                    <div class="mb-3">
                        <h4>Type of Business</h4>
                        <strong>Type of Business Cost: </strong>
                        <div class="alert alert-secondary">{{ $busCost ?? 0 }}</div>
                    </div>
                    <div class="mb-3">
                        <h4>Ownership Sticker</h4>
                        <strong>Ownership Sticker Cost: </strong>
                        <div class="alert alert-info">{{ $ownCost ?? 0 }}</div>
                    </div>
                    <div class="mb-3">
                        <h4>Total Costs</h4>
                        <label class="form-label">Total Cost:</label>
                        <div id="totalCostDisplay" class="alert alert-success">
                            {{ $baseCost + $logoCost + $mainCost + $addCost + $busCost + $ownCost }}</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // logo
    function updateCharacterCount() {
        let textInput = document.getElementById("logoText").value;
        document.getElementById("logoCharacterCount").value = textInput.length;
    }
    //main
    function updateMainCharacterCount() {
        let textInput = document.getElementById("mainText").value;
        document.getElementById("mainCharacterCount").value = textInput.length;
    }

    //add
    function updateaddCharacterCount() {
        let textInput = document.getElementById("addText").value;
        document.getElementById("addCharacterCount").value = textInput.length;
    }

    function updateBusCharacterCount() {
        let textInput = document.getElementById("busText").value;
        document.getElementById("busCharacterCount").value = textInput.length;
    }


    function updateownCharacterCount() {
        let textInput = document.getElementById("ownText").value;
        document.getElementById("ownCharacterCount").value = textInput.length;
    }


    function toggleAcrylicOptions() {
        let clearAcrylics = document.querySelectorAll(".clear-acrylic");
        let whiteAcrylic = document.querySelector(".white-acrylic");

        let clearChecked = Array.from(clearAcrylics).some(input => input.checked);
        let whiteChecked = whiteAcrylic.checked;

        clearAcrylics.forEach(input => {
            input.disabled = whiteChecked;
        });

        whiteAcrylic.disabled = clearChecked;
    }

    function toggleStickerOptions() {
        let StickerCheckbox = document.getElementById("logoStickerCheckbox");
        let stickerOptions = document.querySelectorAll(".sticker-options");

        stickerOptions.forEach(input => {
            input.disabled = !StickerCheckbox.checked;
        });
    }

    function toggleMainStickerOptions() {
        let mainStickerCheckbox = document.getElementById("mainStickerCheckbox");
        let stickerOptions = document.querySelectorAll(".sticker-options");

        stickerOptions.forEach(input => {
            input.disabled = !mainStickerCheckbox.checked;
        });
    }

    function toggleaddStickerOptions() {
        let mainStickerCheckbox = document.getElementById("addStickerCheckbox");
        let stickerOptions = document.querySelectorAll(".sticker-options");

        stickerOptions.forEach(input => {
            input.disabled = !mainStickerCheckbox.checked;
        });
    }

    function togglebusStickerOptions() {
        let mainStickerCheckbox = document.getElementById("busStickerCheckbox");
        let stickerOptions = document.querySelectorAll(".sticker-options");

        stickerOptions.forEach(input => {
            input.disabled = !mainStickerCheckbox.checked;
        });
    }

    function toggleownerStickerOptions() {
        let mainStickerCheckbox = document.getElementById("ownStickerCheckbox");
        let stickerOptions = document.querySelectorAll(".sticker-options");

        stickerOptions.forEach(input => {
            input.disabled = !mainStickerCheckbox.checked;
        });
    }
</script>
