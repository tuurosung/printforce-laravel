<div
    class="modal fade"
    id="new_embroidery_job_modal"
    tabindex="-1"

    role="dialog"
    aria-labelledby="modalTitleId"
    aria-hidden="true">
    <div
        class="modal-dialog modal-xl"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    New Embroidery Job
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('store.embroideryjob') }}" autocomplete="off">
                @csrf

                <div class="modal-body">

                    <input type="hidden"
                        name="customer_id"
                        value="{{ $customer->customer_id }}">

                    <div class="row">
                        <div class="col">
                            <div class="card card-primary border-primary mb-4">
                                <div class="card-body">

                                    <h6 class="mb-4">Job Details </h6>

                                    <div class="row">
                                        <div class="col">

                                            <div class="mb-3">
                                                <label for="" class="form-label">Service Name</label>
                                                <select
                                                    class="browser-default custom-select"
                                                    name="service_id"
                                                    id="em_service">

                                                    <option value="">--- Select Service ---</option>

                                                    @foreach ($services->filter(fn ($service) => $service->category_id == '003') as $service) as $service)
                                                    <option
                                                        value="{{ $service->service_id }}"
                                                        data-cost="{{  $service[$customer->category] }}">{{ $service->service_name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Cost</label>
                                                <input type="text"
                                                    class="form-control form-control-sm"
                                                    name="unit_cost"
                                                    id="em_cost"
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Quantity</label>
                                                <input type="text"
                                                    class="form-control form-control-sm"
                                                    name="qty"
                                                    id="em_qty"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Embroidery Cost</label>
                                                <input type="text"
                                                    class="form-control form-control-sm"
                                                    name="embroidery_cost"
                                                    id="em_total"
                                                    readonly
                                                    required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Notes (optional eg; CRS Farmers T-shirts)</label>
                                        <input type="text"
                                            class="form-control form-control-sm"
                                            name="notes"
                                            id="em_notes"
                                            value="">
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="col">

                            <div class="card card-warning border-warning">
                                <div class="card-body">

                                    <h6 class="mb-4">Production Details</h6>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Material Purchase</label>
                                                <select
                                                    class="form-select form-select-sm"
                                                    name="mat_supply"
                                                    id="mat_supply">
                                                    <option value="">-- Who is buying the materials? --</option>
                                                    <option value="yes">Company Purchase</option>
                                                    <option value="no">Client Provide</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Unit Cost</label>
                                                <input type="text"
                                                    class="form-control form-control-sm"
                                                    name="mat_unit_cost"
                                                    id="mat_unit_cost"
                                                    required>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Purchase Cost</label>
                                                <input type="text"
                                                    class="form-control form-control-sm"
                                                    name="purchase_cost"
                                                    id="purchase_cost"
                                                    readonly
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Overall Cost</label>
                                                <input type="text"
                                                    class="form-control form-control-sm"
                                                    name="total"
                                                    id="emb_total"
                                                    readonly
                                                    required>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
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
                        Create Embroidery Job
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
