<div>

    <div class="mt-3">
        <div class="p-4">
            <h2 class="text-center mb-4" style="color:brown;">Signboard Cost Calculator</h2>
            {{-- bader --}}
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label>Job Name</label>
                        <input type="text" class="form-control form-control-sm" wire:model="job_name">
                    </div>
                    @error('job_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label>Date</label>
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
                        <label>Company Name</label>
                        <input type="text" class="form-control form-control-sm" wire:model="company_name">
                    </div>
                    @error('company_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label>Customer Name</label>
                        <input type="text" class="form-control form-control-sm" wire:model="customer_name">
                    </div>
                    @error('customer_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="mb-3">
                        <label for="baseHeight">Customer Phone Number</label>
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
                        <label for="baseType">Choose Base</label>
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
                        <label for="baseMember">Member</label>
                        <select class="form-select" id="baseMember" wire:model="baseMember">
                            <option value="">Select Member</option>
                            <option value="Agent">Agent</option>
                            <option value="User">User</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="baseHeight">Base Height (inches)</label>
                        <input type="number" class="form-control form-control-sm" id="baseHeight"
                            wire:model="baseHeight">
                    </div>
                </div>
                <div class="col-6">

                    <div class="mb-3">
                        <label for="baseWidth">Base Width (inches)</label>
                        <input type="number" class="form-control form-control-sm" id="baseWidth"
                            wire:model="baseWidth">
                    </div>
                </div>


            </div>
            {{-- logo --}}
            @include('modals.logocost')
            {{-- main --}}
            @include('modals.maincost')
            {{-- Additional Lettering Text --}}
            @include('modals.additional')
            {{-- Type of Business Text --}}
            @include('modals.business')
            {{-- Ownership Sticker Text --}}
            @include('modals.ownership')
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
                        @foreach ($logoCostResults as $label => $cost)
                        <strong>{{ $label }}: </strong>

                        <div class="alert alert-primary">{{ $cost ?? 0 }}</div>
                        @endforeach

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
                            {{ $baseCost + $mainCost + $addCost + $busCost + $ownCost }}</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
   
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
