<div class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 inset-s-0 z-80 opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none" id="assign-job-modal" hs-overlay="">
    <div
        class="hs-overlay-open:opacity-100 hs-overlay-open:duration-500 opacity-0 transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
        <div
            class="flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
            <x-modals.modal-header modalId="assign-job-modal" modalTitle="Assign Job" />
            <form method="POST" id="assignJobFrm" action="{{ route('jobs.assign-job.assign-to-user') }}">
                @csrf
                <div class="p-6">

                    <input type="hidden" name="job_type" id="job_type" value="{{ $jobType }}" required readonly/>

                    <div class="grid grid-cols-12 gap-6">

                        <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">

                            <div class="mb-3">
                                <label for="job_id" class="form-label">Job ID</label>
                                <input type="text" class="form-control" name="job_id" id="job_id" value="{{ $job->job_id }}"
                                    readonly />
                            </div>

                        </div>

                        <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">

                            <div class="mb-3">
                                <label for="" class="form-label">Select User</label>
                                <select class="form-control form-select-lg" name="user_id" id="user_id" required>
                                    <option value="">--- Select Staff ---</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->user_id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                    </div>

                </div>
            <x-modals.modal-footer btnLabel="Assign Job" modalId="assign-job-modal" />
        </div>
    </div>
</div>
