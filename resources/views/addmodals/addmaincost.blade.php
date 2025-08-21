<div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Main Lettering</h2>
        <button wire:click="addForm" class="btn btn-primary">Add Main</button>
    </div>


    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Main Cost 1</h5>
            <button class="btn btn-sm btn-danger">Remove</button>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Main Text -->
                <div class="col-6 mb-3">
                    <label>Main Text</label>
                    <input type="text" class="form-control form-control-sm" wire:model="mainText">
                </div>
                <div class="col-6 mb-3">
                    <label>Character Count</label>
                    <input type="text" class="form-control form-control-sm" readonly value="{{ strlen($mainText ?? '') }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Main Height (inches)</label>
                    <input type="text" class="form-control form-control-sm" wire:model="mainHeight">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Main Width (inches)</label>
                    <input type="text" class="form-control form-control-sm" wire:model="mainWidth">
                </div>
            </div>

            <hr>
            <h5>Raw Materials</h5>
            <div class="row">
                <!-- Clear Acrylic -->
                <div class="col-md-3 mb-3">
                    <label>Clear Acrylic</label>
                    <select class="form-select form-select-sm" wire:model="mainAcrylicSize">
                        <option value="">-- Select Size --</option>
                        <option value="3">3MM</option>
                        <option value="5">5MM</option>
                        <option value="10">10MM</option>
                        <option value="15">15MM</option>
                        <option value="20">20MM</option>
                        <option value="25">25MM</option>
                    </select>
                    @if(!empty($mainAcrylicSize))
                    <input type="text" class="form-control form-control-sm mt-2" placeholder="Enter Cost" wire:model="mainAcrylicCost">
                    @endif
                </div>


                <!-- Black Acrylic  -->
                <div class="col-md-3 mb-3">
                    <label>Black Acrylic</label>
                    <select class="form-select form-select-sm" wire:model="mainBlackAcrylicSize">
                        <option value="">-- Select Size --</option>
                        <option value="3">3MM</option>
                        <option value="5">5MM</option>
                        <option value="10">10MM</option>
                        <option value="15">15MM</option>
                        <option value="20">20MM</option>
                        <option value="25">25MM</option>
                    </select>
                    @if(!empty($mainBlackAcrylicSize))
                    <input type="text" class="form-control form-control-sm mt-2" placeholder="Enter Cost" wire:model="mainBlackAcrylicCost">
                    @endif
                </div>



                <!-- PVC  -->
                <div class="col-md-3 mb-3">
                    <label>PVC</label>
                    <select class="form-select form-select-sm" wire:model="mainPvcSize">
                        <option value="">-- Select Size --</option>
                        <option value="3">3MM</option>
                        <option value="5">5MM</option>
                        <option value="10">10MM</option>
                        <option value="15">15MM</option>
                        <option value="20">20MM</option>
                        <option value="25">25MM</option>
                    </select>
                    @if(!empty($mainPvcSize))
                    <input type="text" class="form-control form-control-sm mt-2" placeholder="Enter Cost" wire:model="mainPVCCost">
                    @endif
                </div>

                <!-- Stainless Steel Silver -->
                <div class="col-md-3 mb-3">
                    <label>Stainless Steel (Silver)</label>
                    <select class="form-select form-select-sm" wire:model="mainStainlessSteelSilverType">
                        <option value="">-- Select Type --</option>
                        <option value="mirror_frontlit">Mirror Frontlit</option>
                        <option value="mirror_backlit">Mirror Backlit</option>
                        <option value="mirror_boxup">Mirror BoxUp</option>
                        <option value="hairline_frontlit">Hairline Frontlit</option>
                        <option value="hairline_backlit">Hairline Backlit</option>
                        <option value="hairline_boxup">Hairline BoxUp</option>
                    </select>
                    @if(!empty($mainStainlessSteelSilverType))
                    <input type="text" class="form-control form-control-sm mt-2" placeholder="Enter Cost" wire:model="mainStainlessSteelCost">
                    @endif
                </div>


                <!-- Stainless Steel Gold -->
                <div class="col-md-3 mb-3">
                    <label>Stainless Steel (Gold)</label>
                    <select class="form-select form-select-sm" wire:model="mainStainlessSteelGoldType">
                        <option value="">-- Select Type --</option>
                        <option value="mirror_frontlit">Mirror Frontlit</option>
                        <option value="mirror_backlit">Mirror Backlit</option>
                        <option value="mirror_boxup">Mirror BoxUp</option>
                        <option value="hairline_frontlit">Hairline Frontlit</option>
                        <option value="hairline_backlit">Hairline Backlit</option>
                        <option value="hairline_boxup">Hairline BoxUp</option>
                    </select>

                    @if(!empty($mainStainlessSteelGoldType))
                    <input type="text" class="form-control form-control-sm mt-2" placeholder="Enter Cost" wire:model="mainStainlessGoldCost">
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
                    <input type="text" class="form-control form-control-sm mt-2" placeholder="Enter Cost" wire:model="mainNeonCost">
                    @endif
                </div>


                <!-- Sticker -->
                <div class="col-md-3 mb-3">
                    <label>Sticker</label>
                    <select class="form-select form-select-sm" wire:model="mainStickerType">
                        <option value="">-- Select Sticker --</option>
                        <option value="whiteStickerMattLamm">White Sticker Matt Lamm</option>
                        <option value="greyBase">Grey Base</option>
                        <option value="lightboxSticker">Lightbox Sticker</option>
                        <option value="reverseSticker">Reverse Sticker</option>
                        <option value="dieCutStickerWhite"> Die Cut Sticker White</option>
                        <option value="dieCutStickerBlack"> Die Cut Sticker Black</option>
                        <option value="dieCutStickerPrinted"> Die Cut Sticker Printed</option>


                    </select>

                    @if(!empty($mainStickerType))
                    <input type="text" class="form-control form-control-sm mt-2" placeholder="Enter Cost" wire:model="mainStickerCost">
                    @endif
                </div>





                <!-- General Material -->
                <div class="col-md-3 mb-3">
                    <label>General Material</label>
                    <select class="form-select form-select-sm" wire:model="mainGeneralStickerType">
                        <option value="">-- Select General Material --</option>
                        <option value="3dChannels"> 3D Channel</option>
                        <option value="aluminiumBoxup">Aluminium Box Up</option>
                        <option value="ironHollow20mm"> Iron Hollow 20mm</option>
                        <option value="ironHollow10mm"> Iron Hollow 10mm</option>
                        <option value="spotlightBracket1set"> Spotlight + Bracket (1 set)</option>
                        <option value="dimmer"> Dimmer</option>


                    </select>

                    @if(!empty($mainGeneralStickerType))
                    <input type="text" class="form-control form-control-sm mt-2" placeholder="Enter Cost" wire:model="mainGeneralMaterialCost">
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
                            wire:model="mainPaintCost">
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
                            wire:model="mainOracalCost">
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

                        <select class="form-select form-select-sm mt-2" wire:model="mainLightingType">
                            <option value="">-- Select Lighting --</option>
                            <option value="frontlit">Frontlit</option>
                            <option value="backlit">Backlit</option>
                            <option value="sidelit">Sidelit</option>
                            <option value="nolight">No Light</option>
                        </select>

                        @if(!empty($mainLightingType))
                        <input type="text" class="form-control form-control-sm mt-2"
                            placeholder="Enter Lighting Cost"
                            wire:model="mainLightingCost">

                        @endif
                    </div>

                </div>


                <div class="col-md-4">
                    <label class="form-label mt-2">Power Supply</label>
                    <select class="form-select form-select-sm" wire:model="mainPowerSupply">
                        <option value="400W">400W</option>
                    </select>

                </div>

                <div class="col-md-4">
                    <label class="form-label mt-2">Power Supply Quantity</label>
                    <input type="number" min="1" class="form-control form-control-sm"
                        wire:model="mainPowerSupplyQuantity">

                </div>

                @endif

            </div>
        </div>
    </div>
</div>