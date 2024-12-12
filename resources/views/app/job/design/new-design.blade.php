<div
    class="modal fade"
    id="new_design_job_modal"
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
                    New Design Job
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('store.designjob') }}" autocomplete="off">
                @csrf
                <div class="modal-body">

                    <input type="hidden"
                        class="form-control"
                        name="customer_id"
                        id="customer_id"
                        value="{{ $customer->customer_id }}"
                        readonly required>


                    <div class="row">
                        <div class="col">

                            <div class="mb-3">
                                <label for="" class="form-label">Service Name</label>
                                <select
                                    class="form-select form-select-sm"
                                    name="service_id"
                                    id="de_service">

                                    <option value="">--- Select Service --</option>

                                    @foreach ($services->where('category_id', '002') as $service)
                                    <option
                                        value="{{ $service->service_id }}"
                                        data-cost="{{ $service[$customer->category] }}">

                                        {{ $service['service_name'] }}

                                    </option>
                                    @endforeach


                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Cost</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="unit_cost"
                                    id="de_cost"
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
                                    id="de_copies"
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
                                    id="de_total"
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
                            value="">
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
                        Create Design Job
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
