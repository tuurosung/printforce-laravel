<div class="modal fade" id="updateJobStatusModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Update Job Status
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateJobStatusFrm" action="{{ route('jobs.job-status.update') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <input type="hidden" name="category_id" id="category_id" value="{{ $category_id }}" required readonly />
                    <input type="hidden" name="job_id" id="job_id" value="{{ $job_id }}" required readonly />

                    <div class="form-group">
                        <label for="job_status_select" class="form-label">Select Job Status</label>
                        <select class="form-select" name="job_status" id="job_status">
                            <option value="pending">Pending</option>
                            <option value="in_progress">In Progress</option>
                            <option value="completed">Completed</option>
                            <option value="on_hold">On Hold</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Update Job Status
                        <i class="fi fi-rr-check ms-3"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
