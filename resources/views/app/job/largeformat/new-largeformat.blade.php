<div
    class="modal fade"
    id="new_largeformat_modal"
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
                    New Large Format Job
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('store.largeformatjob') }}">
                @csrf

                <div class="modal-body">

                    <input type="hidden" name="customer_id" value="{{ $customer->customer_id }}" required>

                    <div class="row">

                        <div class="col">
                            <div class="mb-3">
                                <label for="service_id" class="form-label">Service</label>
                                <select
                                    class="form-select form-select-sm"
                                    name="service_id"
                                    id="lf_service">

                                    <option value="">--- Select A Service ---</option>

                                    @foreach ($services->filter(fn ($service) => $service->category_id == '001') as $service)
                                    <option
                                        value="{{ $service->service_id }}"
                                        data-cost="{{  $service[$customer->category] }}">
                                        {{ $service->service_name }}
                                    </option>
                                    @endforeach



                                </select>
                            </div>

                        </div>

                        <div class="col">
                            <div class="mb-3">
                                <label for="cost" class="form-label">Unit Cost</label>
                                <input
                                    type="text"
                                    class="form-control form-control-sm"
                                    name="cost"
                                    id="lf_cost"
                                    required />
                            </div>

                        </div>
                    </div>


                    <div class="row">

                        <div class="col">
                            <div class="mb-3">

                                <label for="" class="form-label">Unit Of Measurement</label>
                                <select
                                    class="form-select form-select-sm"
                                    name="measuring_unit"
                                    id="measuring_unit"
                                    required>

                                    <option value="ft">Feet</option>
                                    <option value="inch">Inch</option>

                                </select>

                            </div>
                        </div>

                        <div class="col-md-6 mb-4 mb-md-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Premium</label>
                                        <input
                                            type="number"
                                            step="any"
                                            class="form-control form-control-sm"
                                            name="premium"
                                            id="lf_premium"
                                            value="0"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Discount</label>
                                        <input
                                            type="number"
                                            step="any"
                                            class="form-control form-control-sm"
                                            name="discount"
                                            id="lf_discount"
                                            value="0"
                                            required>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Width</label>
                                <input
                                    type="number"
                                    step="any"
                                    class="form-control form-control-sm"
                                    name="width"
                                    id="width"
                                    required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Height</label>
                                <input
                                    type="number"
                                    step="any"
                                    class="form-control form-control-sm"
                                    name="height"
                                    id="height"
                                    required />
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Copies</label>
                                <input
                                    type="number"
                                    class="form-control form-control-sm"
                                    name="copies"
                                    id="lf_copies"
                                    min="1"
                                    value="1"
                                    required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Total Cost</label>
                                <input
                                    type="text"
                                    class="form-control form-control-sm"
                                    name="total"
                                    id="lf_total"
                                    readonly
                                    required />
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Notes (optional eg; USAID Banner)</label>
                        <input
                            type="text"
                            class="form-control form-control-sm"
                            name="notes"
                            id="lf_notes"
                            value="" />
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
                        Create Job
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
