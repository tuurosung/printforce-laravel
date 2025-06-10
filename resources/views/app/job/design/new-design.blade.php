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
            <form method="POST" action="{{ route('jobs.design.store', $customer) }}" autocomplete="off">
                @csrf
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6">
                            <x-printforce.inputs.date-input
                                name="date"
                                id="design_date"
                                label="Job Date"
                                required />
                        </div>
                    </div>


                    <div class="row">
                        <div class="col">
                            <x-printforce.inputs.select-input
                                name="service_id"
                                id="design_service_id"
                                label="Service Name"
                                :options="$design_services"
                                />
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Cost</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="unit_cost"
                                    id="design_cost"
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
                                    id="design_copies"
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
                                    id="design_total"
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
