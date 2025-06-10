<div>
    <div class="row">
        <h2>Edit Cost :</h2>

        <div class="col-4">
            <div class="mb-3">
                <label for="baseHeight" class="form-label fw-bold">Base Height (inches)</label>
                <input type="number" class="form-control form-control-sm" id="baseHeight" wire:model="editbaseHeight">
            </div>
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label for="baseWidth" class="form-label fw-bold">Base Width (inches)</label>
                <input type="number" class="form-control form-control-sm" id="baseWidth" wire:model="editbaseWidth">
            </div>
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label for="baseWidth" class="form-label fw-bold">Base Cost</label>
                <input type="number" class="form-control form-control-sm" id="baseWidth" wire:model="editbasecost">
            </div>
        </div>

    </div>

    @foreach ($editLogos as $index => $logo)
        <div class="row">
            <div class="col-12">
                <h5 class="fw-bold">Logo {{ $index + 1 }}</h5>
            </div>

            <div class="col-4">
                <div class="mb-3">
                    <label class="form-label fw-bold">Logo Height (inches)</label>
                    <input type="number" class="form-control form-control-sm"
                        wire:model="editLogos.{{ $index }}.height">
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label class="form-label fw-bold">Logo Width (inches)</label>
                    <input type="number" class="form-control form-control-sm"
                        wire:model="editLogos.{{ $index }}.width">
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label class="form-label fw-bold">Logo Cost</label>
                    <input type="number" class="form-control form-control-sm"
                        wire:model="editLogos.{{ $index }}.cost">
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($editMains as $index => $main)
        <div class="row">
            <div class="col-12">
                <h5 class="fw-bold">Main {{ $index + 1 }}</h5>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label class="form-label fw-bold">Main Height (inches)</label>
                    <input type="number" class="form-control form-control-sm"
                        wire:model="editMains.{{ $index }}.height">
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label class="form-label fw-bold">Main Width (inches)</label>
                    <input type="number" class="form-control form-control-sm"
                        wire:model="editMains.{{ $index }}.width">
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label class="form-label fw-bold">Main Cost</label>
                    <input type="number" class="form-control form-control-sm"
                        wire:model="editMains.{{ $index }}.cost">
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($editAdditionals as $index => $additional)
        <div class="row">
            <div class="col-12">
                <h5 class="fw-bold">Additional {{ $index + 1 }}</h5>
            </div>

            <div class="col-4">
                <div class="mb-3">
                    <label class="form-label fw-bold">Additional Height (inches)</label>
                    <input type="number" class="form-control form-control-sm"
                        wire:model="editAdditionals.{{ $index }}.height">
                </div>
            </div>

            <div class="col-4">
                <div class="mb-3">
                    <label class="form-label fw-bold">Additional Width (inches)</label>
                    <input type="number" class="form-control form-control-sm"
                        wire:model="editAdditionals.{{ $index }}.width">
                </div>
            </div>

            <div class="col-4">
                <div class="mb-3">
                    <label class="form-label fw-bold">Additional Cost</label>
                    <input type="number" class="form-control form-control-sm"
                        wire:model="editAdditionals.{{ $index }}.cost">
                </div>
            </div>
        </div>
    @endforeach

    @foreach ($editBusinesses as $index => $business)
        <div class="row">
            <div class="col-12">
                <h5 class="fw-bold">Business {{ $index + 1 }}</h5>
            </div>

            <div class="col-4">
                <div class="mb-3">
                    <label class="form-label fw-bold">Business Height (inches)</label>
                    <input type="number" class="form-control form-control-sm"
                        wire:model="editBusinesses.{{ $index }}.height">
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label class="form-label fw-bold">Business Width (inches)</label>
                    <input type="number" class="form-control form-control-sm"
                        wire:model="editBusinesses.{{ $index }}.width">
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label class="form-label fw-bold">Business Cost</label>
                    <input type="number" class="form-control form-control-sm"
                        wire:model="editBusinesses.{{ $index }}.cost">
                </div>
            </div>
        </div>
    @endforeach
    @foreach ($editOwners as $index => $owner)
        <div class="row">
            <div class="col-12">
                <h5 class="fw-bold">Owner {{ $index + 1 }}</h5>
            </div>

            <div class="col-4">
                <div class="mb-3">
                    <label class="form-label fw-bold">Owner Height (inches)</label>
                    <input type="number" class="form-control form-control-sm"
                        wire:model="editOwners.{{ $index }}.height">
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label class="form-label fw-bold">Owner Width (inches)</label>
                    <input type="number" class="form-control form-control-sm"
                        wire:model="editOwners.{{ $index }}.width">
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label class="form-label fw-bold">Owner Cost</label>
                    <input type="number" class="form-control form-control-sm"
                        wire:model="editOwners.{{ $index }}.cost">
                </div>
            </div>
        </div>
    @endforeach



    {{-- <div class="row">

        <div class="col-4">
            <div class="mb-3">
                <label for="logoHeight" class="form-label fw-bold">Business Cost </label>
                <input type="number" class="form-control form-control-sm" id="logoHeight" wire:model="editbuscost">
            </div>
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label for="logoWidth" class="form-label fw-bold">OwnerShip Cost </label>
                <input type="number" class="form-control form-control-sm" id="logoWidth" wire:model="editowncost">
            </div>

        </div>
        <div class="col-4">
            <div class="mb-3">
                <label for="logoWidth" class="form-label fw-bold">Total Cost</label>
                <input type="number" class="form-control form-control-sm" id="logoWidth"
                    wire:model="edittotalcost">
            </div>

        </div>
    </div> --}}
    <div class="row justify-content-left">
        <div class="col-auto">
            <button type="button" wire:click="updateCalculation" class="btn btn-primary">Update</button>
        </div>
        <div class="col-auto">
            <button type="button" class="btn btn-success">Cancel</button>
        </div>
    </div>
</div>
