<div class="modal fade" id="edit_press_job_modal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Edit Press Job
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('jobs.press.update', $pressJob) }}" autocomplete="off">
                @csrf
                <div class="modal-body">


                    <div class="row">
                        <div class="col-md-6">
                            <x-printforce.inputs.date-input name="date" id="press_date" label="Job Date"
                                value="{{ $pressJob->date }}" required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <x-printforce.inputs.select-input name="service_id" id="press_service_id"
                                label="Service Name" :options="$press_services" :selected="$pressJob->service_id"
                                required />

                        </div>
                        <div class="col">

                            <div class="mb-3">
                                <label for="" class="form-label">Cost</label>
                                <input type="text" class="form-control" name="cost" id="press_cost"
                                    value="{{ $pressJob->cost }}" readonly>
                            </div>

                        </div>
                    </div>


                    <div class="row">

                        <div class="col">

                            <div class="mb-3">
                                <label for="" class="form-label">Copies</label>
                                <input type="text" class="form-control" name="copies" id="press_copies"
                                    value="{{ $pressJob->copies }}" required>
                            </div>

                        </div>
                        <div class="col">

                            <div class="mb-3">
                                <label for="" class="form-label">Total Cost</label>
                                <input type="text" class="form-control" name="total" id="press_total"
                                    value="{{ $pressJob->total }}" readonly required>
                            </div>

                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="" class="form-label">Notes (optional eg; Logo Design)</label>
                        <input type="text" class="form-control" name="notes" id="press_notes" value="{{ $pressJob->notes }}"
                            placeholder="Enter any notes for this job">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
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
