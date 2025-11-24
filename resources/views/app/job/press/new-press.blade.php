<div
    class="modal fade"
    id="new_press_job_modal"
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
                    New Press Job
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('jobs.press.store', $customer) }}">
                @csrf
                <div class="modal-body">


                    <div class="row">
                        <div class="col-md-6">
                            <x-printforce.inputs.date-input
                                name="date"
                                id="press_date"
                                label="Job Date"
                                required
                                />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="service_id" class="form-label">Service Name</label>
                                <select class="form-select select2-input" name="service_id" id="press_service_id"
                                    data-fetch_url="{{ route('configuration.print-services.get-service-cost-with-customer-id') }}"
                                    data-customer_id="{{ $customer->customer_id }}" required>

                                    <option value="" selected>Select one</option>

                                    @foreach ($press_services as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach

                                </select>
                            </div>

                        </div>
                        <div class="col">

                            <div class="mb-3">
                                <label for="" class="form-label">Cost</label>
                                <input type="text" class="form-control form-control-sm" name="cost" id="press_cost" readonly>
                            </div>

                        </div>
                    </div>


                    <div class="row">

                        <div class="col">

                            <div class="mb-3">
                                <label for="" class="form-label">Copies</label>
                                <input type="text" class="form-control form-control-sm" name="copies" id="press_copies" required>
                            </div>

                        </div>
                        <div class="col">

                            <div class="mb-3">
                                <label for="" class="form-label">Total Cost</label>
                                <input type="text" class="form-control form-control-sm" name="total" id="press_total" readonly required>
                            </div>

                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="" class="form-label">Notes (optional eg; Logo Design)</label>
                        <input type="text" class="form-control form-control-sm" name="notes" id="press_notes" value="">
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
                        Create Press Job
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
