<div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Additional Lettering Cost</h2>
        <button wire:click="addForm" class="btn btn-primary">Add Additional</button>
    </div>


    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Additional Cost 1</h5>
            <button class="btn btn-sm btn-danger">Remove</button>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Additional Text -->
                <div class="col-6 mb-3">
                    <label>Additional Text</label>
                    <input type="text" class="form-control form-control-sm" wire:model="addText">
                </div>
                <div class="col-6 mb-3">
                    <label>Character Count</label>
                    <input type="text" class="form-control form-control-sm" readonly value="{{ strlen($addText ?? '') }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Additional Height (inches)</label>
                    <input type="text" class="form-control form-control-sm" wire:model="addHeight">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Additional Width (inches)</label>
                    <input type="text" class="form-control form-control-sm" wire:model="addWidth">
                </div>
            </div>

            <hr>
            <h5>Raw Materials</h5>
            <div class="row">
                <!-- Clear Acrylic -->
                <div class="col-md-3 mb-3">
                    <label>Clear Acrylic</label>
                    <select class="form-select form-select-sm" wire:model="addAcrylicSize">
                        <option value="">-- Select Size --</option>
                        <option value="3">3MM</option>
                        <option value="5">5MM</option>
                        <option value="10">10MM</option>
                        <option value="15">15MM</option>
                        <option value="20">20MM</option>
                        <option value="25">25MM</option>
                    </select>
                    @if(!empty($addAcrylicSize))
                    <input type="text" class="form-control form-control-sm mt-2" placeholder="Enter Cost" wire:model="addAcrylicCost">
                    @endif
                </div>


                <!-- Black Acrylic  -->
                <div class="col-md-3 mb-3">
                    <label>Black Acrylic</label>
                    <select class="form-select form-select-sm" wire:model="addBlackAcrylicSize">
                        <option value="">-- Select Size --</option>
                        <option value="3">3MM</option>
                        <option value="5">5MM</option>
                        <option value="10">10MM</option>
                        <option value="15">15MM</option>
                        <option value="20">20MM</option>
                        <option value="25">25MM</option>
                    </select>
                    @if(!empty($addBlackAcrylicSize))
                    <input type="text" class="form-control form-control-sm mt-2" placeholder="Enter Cost" wire:model="addBlackAcrylicCost">
                    @endif
                </div>



                <!-- PVC  -->
                <div class="col-md-3 mb-3">
                    <label>PVC</label>
                    <select class="form-select form-select-sm" wire:model="addPvcSize">
                        <option value="">-- Select Size --</option>
                        <option value="3">3MM</option>
                        <option value="5">5MM</option>
                        <option value="10">10MM</option>
                        <option value="15">15MM</option>
                        <option value="20">20MM</option>
                        <option value="25">25MM</option>
                    </select>
                    @if(!empty($addPvcSize))
                    <input type="text" class="form-control form-control-sm mt-2" placeholder="Enter Cost" wire:model="addPVCCost">
                    @endif
                </div>

                <!-- Stainless Steel Silver -->
                <div class="col-md-3 mb-3">
                    <label>Stainless Steel (Silver)</label>
                    <select class="form-select form-select-sm" wire:model="addStainlessSteelSilverType">
                        <option value="">-- Select Type --</option>
                        <option value="mirror_frontlit">Mirror Frontlit</option>
                        <option value="mirror_backlit">Mirror Backlit</option>
                        <option value="mirror_boxup">Mirror BoxUp</option>
                        <option value="hairline_frontlit">Hairline Frontlit</option>
                        <option value="hairline_backlit">Hairline Backlit</option>
                        <option value="hairline_boxup">Hairline BoxUp</option>
                    </select>
                    @if(!empty($addStainlessSteelSilverType))
                    <input type="text" class="form-control form-control-sm mt-2" placeholder="Enter Cost" wire:model="addStainlessSteelCost">
                    @endif
                </div>


                <!-- Stainless Steel Gold -->
                <div class="col-md-3 mb-3">
                    <label>Stainless Steel (Gold)</label>
                    <select class="form-select form-select-sm" wire:model="addStainlessSteelGoldType">
                        <option value="">-- Select Type --</option>
                        <option value="mirror_frontlit">Mirror Frontlit</option>
                        <option value="mirror_backlit">Mirror Backlit</option>
                        <option value="mirror_boxup">Mirror BoxUp</option>
                        <option value="hairline_frontlit">Hairline Frontlit</option>
                        <option value="hairline_backlit">Hairline Backlit</option>
                        <option value="hairline_boxup">Hairline BoxUp</option>
                    </select>

                    @if(!empty($addStainlessSteelGoldType))
                    <input type="text" class="form-control form-control-sm mt-2" placeholder="Enter Cost" wire:model="addStainlessGoldCost">
                    @endif
                </div>



                <!-- Neon -->
                <div class="col-md-3 mb-3">
                    <label>Neon</label>
                    <select class="form-select form-select-sm" wire:model="neonSize">
                        <option value="">-- Select Size --</option>
                        <option value="5">5MM Clear Acrylic</option>
                        <option value="10">10MM Clear Acrylic</option>
                    </select>
                    @if(!empty($neonSize))
                    <input type="text" class="form-control form-control-sm mt-2" placeholder="Enter Cost" wire:model="addNeonCost">
                    @endif
                </div>


                <!-- Sticker -->
                <div class="col-md-3 mb-3">
                    <label>Sticker</label>
                    <select class="form-select form-select-sm" wire:model="addStickerType">
                        <option value="">-- Select Sticker --</option>
                        <option value="whiteStickerMattLamm">White Sticker Matt Lamm</option>
                        <option value="greyBase">Grey Base</option>
                        <option value="lightboxSticker">Lightbox Sticker</option>
                        <option value="reverseSticker">Reverse Sticker</option>
                        <option value="dieCutStickerWhite"> Die Cut Sticker White</option>
                        <option value="dieCutStickerBlack"> Die Cut Sticker Black</option>
                        <option value="dieCutStickerPrinted"> Die Cut Sticker Printed</option>


                    </select>

                    @if(!empty($addStickerType))
                    <input type="text" class="form-control form-control-sm mt-2" placeholder="Enter Cost" wire:model="addStickerCost">
                    @endif
                </div>





                <!-- General Material -->
                <div class="col-md-3 mb-3">
                    <label>General Material</label>
                    <select class="form-select form-select-sm" wire:model="addGeneralStickerType">
                        <option value="">-- Select General Material --</option>
                        <option value="3dChannels"> 3D Channel</option>
                        <option value="aluminiumBoxup">Aluminium Box Up</option>
                        <option value="ironHollow20mm"> Iron Hollow 20mm</option>
                        <option value="ironHollow10mm"> Iron Hollow 10mm</option>
                        <option value="spotlightBracket1set"> Spotlight + Bracket (1 set)</option>
                        <option value="dimmer"> Dimmer</option>


                    </select>

                    @if(!empty($addGeneralStickerType))
                    <input type="text" class="form-control form-control-sm mt-2" placeholder="Enter Cost" wire:model="addGeneralMaterialCost">
                    @endif
                </div>

                <!-- Others -->
                <div class="col-md-3 mt-3">
                    <strong>Others</strong>

                    <!-- Paint -->
                    <div class="mb-3">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" wire:model="showPaint"> Paint
                        </label>

                        @if(!empty($showPaint))
                        <input type="text" class="form-control form-control-sm mt-2"
                            placeholder="Enter Cost"
                            wire:model="addPaintCost">
                        @endif
                    </div>

                    <!-- Oracal -->
                    <div class="mb-3">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" wire:model="showOracal"> Oracal
                        </label>

                        @if(!empty($showOracal))
                        <input type="text" class="form-control form-control-sm mt-2"
                            placeholder="Enter Cost"
                            wire:model="addOracalCost">
                        @endif
                    </div>

                    <!-- Lighting -->

                    <div class="mb-3">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" wire:model="showLighting"> Lighting
                        </label>

                    </div>

                </div>

                <hr>

                @if(!empty($showLighting))
                <!-- Lighting -->
                <div class="col-md-3">
                    <div class="mb-3">
                        <h6>Lighting Type</h6>

                        <select class="form-select form-select-sm mt-2" wire:model="addLightingType">
                            <option value="">-- Select Lighting --</option>
                            <option value="frontlit">Frontlit</option>
                            <option value="backlit">Backlit</option>
                            <option value="sidelit">Sidelit</option>
                            <option value="nolight">No Light</option>
                        </select>

                        @if(!empty($addLightingType))
                        <input type="text" class="form-control form-control-sm mt-2"
                            placeholder="Enter Lighting Cost"
                            wire:model="addLightingCost">

                        @endif
                    </div>

                </div>


                <div class="col-md-4">
                    <label class="form-label mt-2">Power Supply</label>
                    <select class="form-select form-select-sm" wire:model="addPowerSupply">
                        <option value="400W">400W</option>
                    </select>

                </div>

                <div class="col-md-4">
                    <label class="form-label mt-2">Power Supply Quantity</label>
                    <input type="number" min="1" class="form-control form-control-sm"
                        wire:model="addPowerSupplyQuantity">

                </div>

                @endif

            </div>
        </div>
    </div>
</div>