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
    <div class="row">
        
        <div class="col-4">
            <div class="mb-3">
                <label for="logoHeight" class="form-label fw-bold">Logo Height (inches)</label>
                <input type="number" class="form-control form-control-sm" id="logoHeight" wire:model="editlogoHeight">
            </div>
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label for="logoWidth" class="form-label fw-bold">Logo Width (inches)</label>
                <input type="number" class="form-control form-control-sm" id="logoWidth" wire:model="editlogoWidth">
            </div>

        </div>
        <div class="col-4">
            <div class="mb-3">
                <label for="logoWidth" class="form-label fw-bold">Logo Cost</label>
                <input type="number" class="form-control form-control-sm" id="logoWidth" wire:model="editlogocost">
            </div>

        </div>
    </div>
    <div class="row">
        
        <div class="col-4">
            <div class="mb-3">
                <label for="logoHeight" class="form-label fw-bold">Main Height (inches)</label>
                <input type="number" class="form-control form-control-sm" id="logoHeight" wire:model="editmainHeight">
            </div>
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label for="logoWidth" class="form-label fw-bold">Main Width (inches)</label>
                <input type="number" class="form-control form-control-sm" id="logoWidth" wire:model="editmainWidth">
            </div>

        </div>
        <div class="col-4">
            <div class="mb-3">
                <label for="logoWidth" class="form-label fw-bold">Main Cost</label>
                <input type="number" class="form-control form-control-sm" id="logoWidth" wire:model="editmaincost">
            </div>

        </div>
    </div>
    <div class="row">
        
        <div class="col-4">
            <div class="mb-3">
                <label for="logoHeight" class="form-label fw-bold">Additional Height (inches)</label>
                <input type="number" class="form-control form-control-sm" id="logoHeight" wire:model="editaddHeight">
            </div>
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label for="logoWidth" class="form-label fw-bold">Additional Width (inches)</label>
                <input type="number" class="form-control form-control-sm" id="logoWidth" wire:model="editaddWidth">
            </div>

        </div>
        <div class="col-4">
            <div class="mb-3">
                <label for="logoWidth" class="form-label fw-bold">Additional Cost</label>
                <input type="number" class="form-control form-control-sm" id="logoWidth" wire:model="editaddcost">
            </div>

        </div>
    </div>
    <div class="row">
        
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
                <input type="number" class="form-control form-control-sm" id="logoWidth" wire:model="edittotalcost">
            </div>

        </div>
    </div>
    <div class="row justify-content-left">
        <div class="col-auto">
            <button type="button" wire:click="updateCalculation" class="btn btn-primary">Update</button>
        </div>
        <div class="col-auto">
            <button type="button" wire:click="saveDatabase" class="btn btn-success" >Cancel</button>
        </div>
    </div>
</div>
