<div class="modal fade" id="assignJobModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Assign Job
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id="assignJobFrm" action="{{ route('jobs.assign-job.assign-to-user') }}">
                @csrf
            <div class="modal-body">

                <input type="hidden" name="category_id" id="category_id" value="{{ $category_id }}" required readonly/>

                <div class="row">

                    <div class="col">

                        <div class="mb-3">
                            <label for="job_id" class="form-label">Job ID</label>
                            <input type="text" class="form-control" name="job_id" id="job_id" value="{{ $job_id }}"
                                readonly />
                        </div>

                    </div>

                    <div class="col">

                        <div class="mb-3">
                            <label for="" class="form-label">Select User</label>
                            <select class="form-select form-select-lg" name="user_id" id="user_id" required>
                                <option value="">--- Select Staff ---</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->user_id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">
                    Assign Job
                    <i class="fi fi-rr-check ms-2"></i>
                </button>
            </div>
        </div>
    </div>
</div>
