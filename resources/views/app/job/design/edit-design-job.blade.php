<div
    class="modal fade"
    id="edit_design_job_modal"
    tabindex="-1"

    role="dialog"
    aria-labelledby="modalTitleId"
    aria-hidden="true">
    <div
        class="modal-dialog"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Edit Design Job
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('jobs.design.update', $designJob) }}" autocomplete="off">
                @csrf
                <div class="modal-body">

                    <p class="mb-0">Customer's Name</p>
                    <h4 class="mb-4">{{ $designJob->customer->name }}</h4>


                    <div class="row">
                        <div class="col">

                            <x-printforce.inputs.select-input
                                name="service_id"
                                id="edit_design_service_id"
                                label="Service Name"
                                :options="$design_services"
                                :selected="$designJob->service_id"
                                />

                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Cost</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="unit_cost"
                                    id="edit_design_cost"
                                    value="{{ $designJob->unit_cost }}"
                                    readonly required>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col">

                            <div class="mb-3">
                                <label for="" class="form-label">Copies</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="copies"
                                    id="edit_design_copies"
                                    value="{{ $designJob->copies }}"
                                    required>
                            </div>

                        </div>

                        <div class="col">

                            <div class="mb-3">
                                <label for="" class="form-label">Total Cost</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="total"
                                    id="edit_design_total"
                                    value="{{ $designJob->total }}"
                                    readonly required>
                            </div>

                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="" class="form-label">Notes (optional eg; Logo Design)</label>
                        <input
                            type="text"
                            class="form-control"
                            name="notes"
                            id="de_notes"
                            value="{{ $designJob->notes }}">
                    </div>

                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-check me-3  "></i>
                        Update Design Job
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>



<?php

// $customer = new Customer($q->db, $q->mysqli);
// $invoice = new Invoice($q->db, $q->mysqli);

// $account = new Account($q->db, $q->mysqli);
// $service = new Service($q->db, $q->mysqli);

// // clean the GET variable
// $_GET = array_map([$seagate, 'Clean'], $_GET);

// $customer_id = $_GET['customer_id'];
// $customer->customer_id = $customer_id;
// $customer->CustomerInfo();

?>
