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
            <form method="POST" action="{{ route('store.pressjob') }}" autocomplete="off">
                @csrf
                <div class="modal-body">

                    <input
                        type="hidden"
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
                                    id="pr_service">

                                    <option value="">--- Select Service ---</option>

                                    @foreach ($services->where('category_id', '004') as $service)
                                    <option
                                        value="{{ $service['service_id'] }}"
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
                                <input type="text" class="form-control form-control-sm" name="cost" id="pr_cost" readonly>
                            </div>

                        </div>
                    </div>


                    <div class="row">

                        <div class="col">

                            <div class="mb-3">
                                <label for="" class="form-label">Copies</label>
                                <input type="text" class="form-control form-control-sm" name="copies" id="pr_copies" required>
                            </div>

                        </div>
                        <div class="col">

                            <div class="mb-3">
                                <label for="" class="form-label">Total Cost</label>
                                <input type="text" class="form-control form-control-sm" name="total" id="pr_total" readonly required>
                            </div>

                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="" class="form-label">Notes (optional eg; Logo Design)</label>
                        <input type="text" class="form-control form-control-sm" name="notes" id="pr_notes" value="">
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
