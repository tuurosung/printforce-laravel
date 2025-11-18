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
                    data-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('jobs.largeformat.store', $customer) }}">
                @csrf

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6">
                            <x-printforce.inputs.date-input
                                name="date"
                                id="largeformat_date"
                                label="Job Date"
                                value="{{ now()->format('Y-m-d') }}"
                                required />
                        </div>
                    </div>


                    <div class="row">

                        <div class="col">
                            <x-printforce.inputs.select-input
                                name="service_id"
                                id="largeformat_service_id"
                                label="Service Name"
                                :options="$largeformat_services"
                                />

                        </div>

                        <div class="col">
                            <div class="mb-3">
                                <label for="cost" class="form-label">Unit Cost</label>
                                <input
                                    type="text"
                                    class="form-control form-control-sm"
                                    name="cost"
                                    id="largeformat_cost"
                                    readonly
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
                                            id="largeformat_premium"
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
                                            id="largeformat_discount"
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
                                    id="largeformat_copies"
                                    placeholder="Number of Copies"
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
                                    id="largeformat_total"
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
                        data-dismiss="modal">
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
