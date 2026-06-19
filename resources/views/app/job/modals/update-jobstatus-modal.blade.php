<div class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 inset-s-0 z-80 opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none" id="update-job-status-modal" hs-overlay="">
        <div
            class="hs-overlay-open:opacity-100 hs-overlay-open:duration-500 opacity-0 transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
            <div
                class="flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
            <x-modals.modal-header modalId="update-job-status-modal" modalTitle="Update Job Status" />
            <form id="updateJobStatusFrm" action="{{ route('jobs.job-status.update') }}" method="POST">
                @csrf
                <div class="p-6">

                    <input type="hidden" name="category_id" id="category_id" value="" required readonly />
                    <input type="hidden" name="job_id" id="job_id" value="" required readonly />

                    <div class="grid grid-cols-12 gap-6">
                        <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                            <div class="mb-3">
                                <label for="job_id" class="form-label">Job ID</label>
                                <input type="text" class="form-control" name="job_id" id="job_id" value="{{ $job->job_id }}"
                                    readonly />
                            </div>
                        </div>
                        <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                            <div class="">
                                <label for="job_status_select" class="form-label">Select Job Status</label>
                                <select class="form-control" name="job_status" id="job_status">
                                    <option value="pending">Pending</option>
                                    <option value="in_progress">In Progress</option>
                                    <option value="completed">Completed</option>
                                    <option value="on_hold">On Hold</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>
                        </div>
                        <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span"></div>
                        <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span"></div>
                    </div>



                </div>
                <x-modals.modal-footer btnLabel="Update Job Status" modalId="update-job-status-modal" />

            </form>
        </div>
    </div>
</div>
