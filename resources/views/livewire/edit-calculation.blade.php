<div>



    <div class="mt-3">
        <div class="p-4">
            <h2 class="text-center mb-4" style="color:brown;">Update Signboard Cost Calculator</h2>
            {{-- bader --}}
            <div class="row">
                <div class="col-4">
                    <div class="mb-3">
                        <label>Job Name</label>
                        <input type="text" class="form-control form-control-sm" wire:model="edit_job_name">
                    </div>
                    @error('job_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>




                <div class="col-4">
                    <div class="mb-3">
                        <label>Date</label>
                        <input type="date" class="form-control form-control-sm" wire:model="edit_date">
                    </div>
                    @error('edit_date')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label>Salesperson </label>
                        <select class="form-select form-select-sm" wire:model='edit_salesperson'>
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
                        <input type="text" class="form-control form-control-sm" wire:model="edit_company_name">
                    </div>
                    @error('company_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label>Customer Name</label>
                        <input type="text" class="form-control form-control-sm" wire:model="edit_customer_name">
                    </div>
                    @error('customer_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="mb-3">
                        <label for="baseHeight">Customer Phone Number</label>
                        <input type="text" class="form-control form-control-sm" wire:model="edit_customer_phone_no">

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
                        <input type="text" class="form-control form-control-sm" wire:model="edit_qt_inv_number">
                    </div>
                    @error('qt_inv_umber')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-4">
                    <div class="mb-3">
                        <label>Remark</label>
                        <textarea wire:model="edit_remark" rows="2" class="form-control"></textarea>
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
                        <input type="file" class="form-control form-control-sm" wire:model="edit_image" multiple>
                    </div>

                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Image Preview -->
                <!-- Image Preview -->
                @if(!empty($edit_image) && count($edit_image) > 0)
                <h6 class="mt-3">Preview Images</h6>
                <div class="row g-2">
                    @foreach ($edit_image as $index => $img)
                    <div class="col-4 col-md-3 col-lg-2 position-relative">

                        <!-- Remove Button -->
                        <button type="button"
                            class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1 rounded-circle"
                            wire:click="removeImage({{ $index }})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-trash">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path
                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                </path>
                            </svg>
                        </button>

                        <!-- Preview -->
                        @if(is_object($img) && method_exists($img, 'temporaryUrl'))
                        {{-- New uploaded image --}}
                        <img src="{{ $img->temporaryUrl() }}"
                            alt="Preview"
                            class="img-fluid rounded border"
                            style="max-height: 150px; cursor: pointer;"
                            data-bs-toggle="modal"
                            data-bs-target="#previewModal"
                            onclick="showPreview('{{ $img->temporaryUrl() }}')">
                        @elseif(is_string($img))
                        {{-- Existing DB image --}}
                        <img src="{{ Storage::url($img) }}"
                            alt="Preview"
                            class="img-fluid rounded border"
                            style="max-height: 150px; cursor: pointer;"
                            data-bs-toggle="modal"
                            data-bs-target="#previewModal"
                            onclick="showPreview('{{ Storage::url($img) }}')">
                        @endif
                    </div>
                    @endforeach
                </div>
                @endif



                {{-- Base Cost --}}

                <div class="row mt-3">
                    <h2>Base Cost :</h2>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="baseType">Choose Base</label>
                            <select class="form-select" id="baseType" wire:model="edit_baseType">
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
                            <select class="form-select" id="baseMember" wire:model="edit_baseMember">
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
                                wire:model="edit_baseHeight">
                        </div>
                    </div>
                    <div class="col-6">

                        <div class="mb-3">
                            <label for="baseWidth">Base Width (inches)</label>
                            <input type="number" class="form-control form-control-sm" id="baseWidth"
                                wire:model="edit_baseWidth">
                        </div>
                    </div>


                </div>



                {{-- logo --}}
                @include('editmodals.editlogocost')
                {{-- main --}}
                @include('editmodals.editmain')
                {{-- Additional Lettering Text --}}
                @include('editmodals.editadditional')
                {{-- Type of Business Text --}}
                @include('editmodals.editbusiness')
                {{-- Ownership Sticker Text --}}
                @include('editmodals.editownership')

            </div>
            <div class="row justify-content-center">
                <div class="col-auto">
                    <div class="col-auto">
                        <button type="button" wire:click="updateCalculation" class="btn btn-primary">Update</button>
                    </div>
                </div>

                <div class="col-auto">
                    <button type="button" class="btn btn-success">Cancel</button>
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
                            <div id="baseCostDisplay" class="alert alert-info">{{ $edit_baseCost ?? 0 }}</div>
                        </div>

                        <div class="mb-3">
                            <h4>Logo</h4>

                            @foreach ($editLogoCostResults as $label => $cost)
                            <strong>{{ $label }}: </strong>
                            <div class="alert alert-secondary">{{ $cost ?? 0 }}</div>
                            @endforeach

                            <strong>Total Logo Cost:</strong>
                            <div class="alert alert-danger">{{ $edit_logoTotal }}</div>
                        </div>

                        <div class="mb-3">
                            <h4>Main Cost</h4>

                            @foreach ($editMainCostResults as $label => $cost)
                            <strong>{{ $label }}: </strong>
                            <div class="alert alert-secondary">{{ $cost ?? 0 }}</div>
                            @endforeach

                            <strong>Total Main Cost:</strong>
                            <div class="alert alert-primary">{{ $edit_mainTotal }}</div>
                        </div>
                        <div class="mb-3">
                            <h4>Additional Cost </h4>

                            @foreach ($editAddCostResults as $label => $cost)
                            <strong>{{ $label }}: </strong>
                            <div class="alert alert-secondary">{{ $cost ?? 0 }}</div>
                            @endforeach

                            <strong>Total Additional Cost:</strong>
                            <div class="alert alert-warning">{{ $edit_addTotal }}</div>
                        </div>
                        <div class="mb-3">
                            <h4>Type of Business</h4>

                            @foreach ($editBusCostResults as $label => $cost)
                            <strong>{{ $label }}: </strong>
                            <div class="alert alert-secondary">{{ $cost ?? 0 }}</div>
                            @endforeach

                            <strong>Total Business Cost:</strong>
                            <div class="alert alert-success">{{ $edit_busTotal }}</div>
                        </div>
                        <div class="mb-3">
                            <h4>Ownership Sticker</h4>

                            @foreach ($editOwnerCostResults as $label => $cost)
                            <strong>{{ $label }}: </strong>
                            <div class="alert alert-secondary">{{ $cost ?? 0 }}</div>
                            @endforeach

                            <strong>Total Ownership Sticker Cost:</strong>
                            <div class="alert alert-danger">{{ $edit_ownTotal }}</div>
                        </div>
                        <div class="mb-3">
                            <h4>Total Costs</h4>
                            <label class="form-label">Total Cost:</label>
                            <div id="totalCostDisplay" class="alert alert-success">
                                {{ $edit_logoTotal + $edit_mainTotal + $edit_addTotal + $edit_busTotal + $edit_ownTotal }}
                            </div>
                                      
                        </div>
                        {{-- <div class="mb-3">
                        <h4>Main</h4>
                        <strong>Main Cost: </strong>
                        <div class="alert alert-warning">{{ $mainCost ?? 0 }}
                    </div>
                </div> --}}
                {{-- <div class="mb-3">
                        <h4>Additional</h4>
                        <strong>Additional Cost: </strong>
                        <div class="alert alert-danger">{{ $addCost ?? 0 }}
            </div>
        </div> --}}
        {{-- <div class="mb-3">
                        <h4>Type of Business</h4>
                        <strong>Type of Business Cost: </strong>
                        <div class="alert alert-secondary">{{ $busCost ?? 0 }}
    </div>
</div> --}}
{{-- <div class="mb-3">
                        <h4>Ownership Sticker</h4>
                        <strong>Ownership Sticker Cost: </strong>
                        <div class="alert alert-info">{{ $ownCost ?? 0 }}</div>
</div> --}}


</div>
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