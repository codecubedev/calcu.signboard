<div>
    <div class="middle-content container-xxl p-0">

        <!-- BREADCRUMB -->
        <div class="page-meta">
            <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Calculation</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Job List</li>
                </ol>
            </nav>
        </div>
        <!-- /BREADCRUMB -->

        <div class="row layout-top-spacing">
        
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-8">
                    <table id="zero-config" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Job Name</th>
                                <th>Date</th>
                                <th>Sales Man</th>
                                <th>Company Name</th>
                                <th>Customer Name</th>
                                <th>Customer Phone No</th>
                                <th>Base Height</th>
                                <th>Base Width</th>
                                <th>Base Cost</th>
                                <th>Logo Height</th>
                                <th>Logo Width</th>
                                <th>Logo Cost</th>
                                <th>Main Height</th>
                                <th>Main Width</th>
                                <th>Main Cost</th>
                                <th>Additional Height</th>
                                <th>Additional Width</th>
                                <th>Additional Cost</th>
                                <th>Business Cost</th>
                                <th>Ownership Cost</th>
                                <th>Total Cost</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listcalculation as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->job_name }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->sales_man }}</td>

                                    <td>{{ $item->company_name }}</td>
                                    <td>{{ $item->customer_name }}</td>
                                    <td>{{ $item->customer_phone_no }}</td>

                                    <td>{{ $item->base_height }}</td>
                                    <td>{{ $item->base_width }}</td>
                                    <td>{{ $item->total_base_cost }}</td>
                                    <td>{{ $item->logo_height }}</td>
                                    <td>{{ $item->logo_width }}</td>
                                    <td>{{ $item->total_logo_cost }}</td>
                                    <td>{{ $item->main_height }}</td>
                                    <td>{{ $item->main_width }}</td>
                                    <td>{{ $item->total_main_cost }}</td>
                                    <td>{{ $item->add_height }}</td>
                                    <td>{{ $item->add_width }}</td>
                                    <td>{{ $item->total_add_cost }}</td>
                                    <td>{{ $item->total_business_cost }}</td>
                                    <td>{{ $item->total_ownership_cost }}</td>
                                    <td><b>{{ $item->total_cost }}</b></td>
                                    
                                    <td>
                                        <a class="badge badge-light-primary text-start me-2 action-edit" href="{{ route('edit-calculation', $item->calculation_id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                                            <button class="badge badge-light-danger text-start action-delete"
                                            data-id="{{ $item->calculation_id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" 
                                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                                                 class="feather feather-trash">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                            </svg>
                                        </button>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".action-delete").forEach(button => {
            button.addEventListener("click", function () {
                let calculationId = this.getAttribute("data-id");
                if (confirm("Are you sure you want to delete this calculation?")) {
                    fetch(`/delete-calculation/${calculationId}`, {
                        method: "DELETE",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                            "Content-Type": "application/json"
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert("Calculation deleted successfully!");
                            location.reload(); // Refresh page or remove row dynamically
                        } else {
                            alert("Error: " + data.message);
                        }
                    })
                    .catch(error => console.error("Error:", error));
                }
            });
        });
    });
</script>
