<div class="modal fade" id="edit_largeformat_modal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Update Large Format Job
                </h5>
                <button type="button" class="btn-close" data-dismiss="modal" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('jobs.largeformat.update', $largeFormatJob) }}">
                @csrf

                <div class="modal-body">

                <h5 class="mb-2">Customer Information</h5>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="customer_name" class="form-label">Customer's Name</label>
                            <input
                                type="text"
                                class="form-control"
                                name="customer_name"
                                id="customer_name"
                                aria-describedby=""
                                placeholder=""
                                value="{{ $largeFormatJob->customer->name }}" readonly
                            />
                        </div>

                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="text" class="form-control" name="date" id="date" value="{{ $largeFormatJob->date }}" />
                        </div>
                    </div>
                </div>

                <section class="mb-3">
                    <h5 class="mt-3 mb-2">Service Details</h5>

                    <div class="row">

                        <div class="col">

                            <div class="mb-3">
                                <label for="service_id" class="form-label">Service Name</label>
                                <select class="form-select form-select-lg" name="service_id" id="service_id"
                                    data-customer_id="{{ $largeFormatJob->customer_id }}"
                                    data-fetch-url="{{ route('configuration.print-services.get-service-cost-with-customer-id') }}">
                                    @foreach ($largeformat_services as $key => $value)
                                        <option value="{{ $key }}" {{ $largeFormatJob->service_id == $key ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="col">
                            <div class="mb-3">
                                <label for="cost" class="form-label">Unit Cost</label>
                                <input type="text" class="form-control form-control-sm" name="cost" id="edit_largeformat_cost"
                                    value="{{ $largeFormatJob->cost }}" readonly required />
                            </div>

                        </div>

                    </div>
                </section>

                <section class="mb-3">
                    <h5 class="mb-2">Dimensions & Quantity</h5>
                    <div class="row">

                        <div class="col">

                            <div class="row">

                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Width</label>
                                        <input type="number" step="any" class="form-control form-control-sm" name="width" id="edit_width"
                                            value="{{ $largeFormatJob->width }}" required />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Height</label>
                                        <input type="number" step="any" class="form-control form-control-sm" name="height" id="edit_height"
                                            value="{{ $largeFormatJob->height }}" required />
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="col">

                            <div class="row">

                                <div class="col">
                                    <div class="mb-3">

                                        <label for="" class="form-label">Unit Of Measurement</label>
                                        <select class="form-select form-select-sm" name="measuring_unit" id="edit_measuring_unit" required>

                                            <option value="ft" {{ $largeFormatJob->measuring_unit == "ft" ? 'selected' : '' }}>Feet
                                            </option>
                                            <option value="inch" {{ $largeFormatJob->measuring_unit == "inch" ? 'selected' : '' }}>Inch
                                            </option>

                                        </select>

                                    </div>
                                </div>

                                <div class="col">

                                    <div class="mb-3">
                                        <label for="" class="form-label">Copies</label>
                                        <input type="number" class="form-control form-control-sm" name="copies" id="edit_largeformat_copies"
                                            placeholder="Number of Copies" min="1" value="{{ $largeFormatJob->copies }}" required />
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </section>


                <section class="mb-3">
                    <h5 class="mb-2">Pricing Details</h5>

                    <div class="bg-light rounded-2 p-3">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="sub_total" class="form-label">Sub-Total</label>
                                    <input type="number" class="form-control" name="sub_total" id="sub_total" aria-describedby=""
                                        placeholder="" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="" class="form-label">Premium</label>
                                    <input type="number" step="any" class="form-control form-control-sm" name="premium"
                                        id="edit_largeformat_premium" value="{{ $largeFormatJob->premium }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="" class="form-label">Discount</label>
                                    <input type="number" step="any" class="form-control form-control-sm" name="discount"
                                        id="edit_largeformat_discount" value="{{ $largeFormatJob->discount }}" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="" class="form-label">Total Cost</label>
                                    <input type="text" class="form-control form-control-sm" name="total" id="edit_largeformat_total"
                                        value="{{ $largeFormatJob->total }}" readonly required />
                                </div>
                            </div>
                        </div>
                    </div>

                </section>


                <section class="mb-3">
                    <h5 class="mb-2">Additional Notes</h5>
                    <div class="mb-3">
                        <label for="" class="form-label">Notes (optional eg; USAID Banner)</label>
                        <input type="text" class="form-control form-control-sm" name="notes" id="lf_notes" value="" />
                    </div>
                </section>







                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-check me-3  "></i>
                        Update Job
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
