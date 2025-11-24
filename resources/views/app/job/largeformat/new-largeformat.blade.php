<div class="modal fade" id="new_largeformat_modal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    New Large Format Job
                </h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('jobs.largeformat.store', $customer) }}">
                @csrf

                <div class="modal-body">

                    <section class="mb-4">
                        <h6 class="mb-3">Job Details</h6>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="customer_name" class="form-label">Customer Name</label>
                                    <input type="text" class="form-control" name="customer_name" id="customer_name"
                                        aria-describedby="helpId" placeholder="" value="{{ $customer->name }}" readonly
                                        readonly />
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="date" class="form-label">Job Date</label>
                                    <input type="text" class="form-control datepicker-input" name="date"
                                        id="largeformat_date" value="{{ now()->format('Y-m-d') }}" placeholder=""
                                        required />
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col">
                                <div class="mb-3">
                                    <label for="" class="form-label">Service Name</label>
                                    <select class="form-select select2-input" name="service_id"
                                        id="largeformat_service_id"
                                        data-fetch_url="{{ route('configuration.print-services.get-service-cost-with-customer-id') }}"
                                        data-customer_id="{{ $customer->customer_id }}" required>

                                        <option value="">--Select Service--</option>

                                        @foreach ($largeformat_services as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach

                                    </select>
                                </div>

                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <label for="cost" class="form-label">Unit Cost</label>
                                    <input type="text" class="form-control form-control-sm" name="cost"
                                        id="largeformat_cost" readonly required />
                                </div>

                            </div>
                        </div>
                    </section>



                    <section class="mb-3">
                        <h6 class="mb-3">Dimension & Quantity</h6>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Width</label>
                                            <input type="number" step="any" class="form-control form-control-sm"
                                                name="width" id="width" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Height</label>
                                            <input type="number" step="any" class="form-control form-control-sm"
                                                name="height" id="height" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">

                                            <label for="" class="form-label">Unit Of Measurement</label>
                                            <select class="form-select form-select-sm select2-input"
                                                name="measuring_unit" id="measuring_unit" required>

                                                <option value="ft">Feet</option>
                                                <option value="inch">Inch</option>

                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Copies</label>
                                            <input type="number" class="form-control form-control-sm" name="copies"
                                                id="largeformat_copies" placeholder="Number of Copies" min="1" value="1"
                                                required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>


                    <section class="mb-3">

                        <h6 class="mb-3">Dimensions & Pricing</h6>



                        <div class="bg-light p-3 rounded-2">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Sub - Total</label>
                                        <input type="text" class="form-control form-control-sm" name="sub_total"
                                            id="largeformat_sub_total" readonly required />
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Discount</label>
                                        <input type="number" step="any" class="form-control form-control-sm"
                                            name="discount" id="largeformat_discount" value="0" required>
                                    </div>
                                </div>
                            </div>


                            <div class="row">

                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Premium</label>
                                        <input type="number" step="any" class="form-control form-control-sm"
                                            name="premium" id="largeformat_premium" value="0" required>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4 mb-md-0">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Total Cost</label>
                                        <input type="text" class="form-control form-control-sm" name="total"
                                            id="largeformat_total" readonly required />
                                    </div>
                                </div>

                            </div>

                        </div>
                    </section>


                    <div class="mb-3">
                        <label for="" class="form-label">Notes (optional eg; USAID Banner)</label>
                        <input type="text" class="form-control form-control-sm" name="notes" id="lf_notes" value="" />
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
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
