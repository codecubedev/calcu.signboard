<div>

    <div class="mt-3">
        <div class="p-4">
            <h2 class="text-center mb-4" style="color:brown;">Signboard Cost Calculator</h2>
            {{-- bader --}}
            <div class="row">
                <div class="col-4">
                    <div class="mb-3">
                        <label>Job Name</label>
                        <input type="text" class="form-control form-control-sm" wire:model="job_name"
                            placeholder="Job Name">
                    </div>
                    @error('job_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label>Date</label>
                        <input type="date" class="form-control form-control-sm" wire:model="date">
                    </div>
                    @error('date')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label>Salesperson </label>
                        <select class="form-select form-select-sm" wire:model='salesperson'>
                            <option>Select</option>
                            <option value="Paul">Paul</option>
                            <option value="Kelly">Kelly</option>
                        </select>
                    </div>
                    @error('salesperson')
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


                <div class="col-4">
                    <div class="mb-3">
                        <label>QT/Inv Number</label>
                        <input type="text" class="form-control form-control-sm" wire:model="qt_inv_number">
                    </div>
                    @error('qt_inv_umber')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="mb-3">
                        <label>Remark</label>
                        <textarea wire:model="remark" rows="2" class="form-control"></textarea>
                    </div>
                    @error('remark')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="bg-white p-3 my-3">

                <div class="col-4">
                    <div class="mb-3">
                        <label for="baseHeight">Upload Images</label>
                        <input type="file" class="form-control form-control-sm" wire:model="image" multiple>
                    </div>

                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <!-- Image Preview -->
                @if($image && count($image) > 0)
                <h6 class="mt-3">Preview Images</h6>
                <div class="row g-2">
                    @foreach ($image as $index => $img)
                    <div class="col-4 col-md-3 col-lg-2 position-relative">

                        <!-- Delete Button on Top Right -->
                        <button type="button"
                            class="btn btn-sm btn-danger position-absolute top-0 end-0 mx-3 my-2 rounded-circle"
                            wire:click="removeImage({{ $index }})">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                width="2px" height="2px" 
                                viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-trash">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6
                 m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            </svg>
                        </button>


                        <!-- Preview Image -->
                        <img src="{{ $img->temporaryUrl() }}"
                            alt="Preview"
                            class="img-fluid rounded border"
                            style="max-height: 150px; cursor: pointer;"
                            data-bs-toggle="modal"
                            data-bs-target="#previewModal"
                            onclick="showPreview('{{ $img->temporaryUrl() }}')">
                    </div>
                    @endforeach
                </div>
                @endif


            </div>

            {{-- Base Cost --}}

            <div class="row mt-3">
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

            <!-- Logo Cost include  -->

            @include('addmodals.addlogocost')

            @include('addmodals.addmaincost')

            @include('addmodals.addadditionalcost')

            @include('addmodals.addbusinesscost')

            @include('addmodals.addownercost')

        </div>
        <div class="row justify-content-center">
            <div class="col-auto">
                <button type="button" wire:click="calculateBaseCost" class="btn btn-primary">
                    Calculate Cost
                </button>
            </div>

            <div class="col-auto">
                <button type="button" wire:click="saveDatabase" class="btn btn-success">

                    Save
                </button>
            </div>


        </div>


    </div>



    {{-- image preview --}}
    <div class="modal fade" id="previewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img id="previewImage" src="" class="img-fluid rounded shadow">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>








{{-- Script to preview image --}}
<script>
    function showPreview(src) {
        document.getElementById('previewImage').src = src;
    }
</script>