@extends('layout.app')

@section('content')

<x-headers.page-header pageTitle="Job Card">
    <button class="btn btn-primary" data-hs-overlay="#assign-job-modal">
        <i class="fi fi-rr-user-pen"></i>
        Assign To
    </button>
    <button class="btn bg-green-800!" data-hs-overlay="#update-job-status-modal">
        <i class="fi fi-rr-check me-2"></i>
        Mark Complete
    </button>
    <form class="inline" action="{{ route('print-jobs.delete', $job) }}" method="POST">
        @csrf
        @method("delete")
        <button type="button"  class="btn bg-rose-500! hover:bg-rose-600!" id="deleteJobBtn">
            <i class="fi fi-rr-trash"></i>
            Delete Job
        </button>
    </form>

</x-headers.page-header>



<div class="grid grid-cols-12 gap-6">
    <!-- Sidebar -->
    <div class="lg:col-span-4 md:col-span-4 sm:col-span-12 col-span-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0">Job Timeline</h5>
                <p class="card-subtitle  mb-6">Timeline of job history and logs.</p>
                <!-- Timeline -->
                <div>
                    <!-- Heading -->
                    <div class="ps-2 my-2 first:mt-0">
                        <h3 class="text-xs font-medium uppercase text-gray-500 dark:text-gray-400">
                            {{ $job->created_at }}
                        </h3>
                    </div>
                    <!-- End Heading -->

                    <!-- Item -->
                    <div class="flex gap-x-3">
                        <!-- Icon -->
                        <div
                            class="relative last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 dark:after:bg-gray-700">
                            <div class="relative z-10 size-7 flex justify-center items-center">
                                <div class="size-2 rounded-full bg-gray-400 dark:bg-gray-600"></div>
                            </div>
                        </div>
                        <!-- End Icon -->

                        <!-- Right Content -->
                        <div class="grow pt-0.5 pb-8">
                            <h3 class="flex text-base gap-x-1.5 font-semibold text-gray-800 dark:text-white">
                                <i class="fi fi-rr-notes text-lg leading-tight font-medium"></i>
                                Created By
                            </h3>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                System User
                            </p>
                        </div>
                        <!-- End Right Content -->
                    </div>
                    <!-- End Item -->

                    <!-- Heading -->
                    <div class="ps-2 my-2 first:mt-0">
                        <h3 class="text-xs font-medium uppercase text-gray-500 dark:text-gray-400">
                            {{ $job->job_assigned_at ?? 'Pending' }}
                        </h3>
                    </div>
                    <!-- End Heading -->


                    <!-- Item -->
                    <div class="flex gap-x-3">
                        <!-- Icon -->
                        <div
                            class="relative last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 dark:after:bg-gray-700">
                            <div class="relative z-10 size-7 flex justify-center items-center">
                                <div class="size-2 rounded-full bg-gray-400 dark:bg-gray-600"></div>
                            </div>
                        </div>
                        <!-- End Icon -->

                        <!-- Right Content -->
                        <div class="grow pt-0.5 pb-8">
                            <h3 class="flex text-base gap-x-1.5 font-semibold text-gray-800 dark:text-white">
                                <i class="fi fi-rr-user-pen text-lg leading-tight font-medium"></i>
                                Assigned To
                            </h3>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ $job->assignedTo?->name }}
                            </p>
                        </div>
                        <!-- End Right Content -->
                    </div>
                    <!-- End Item -->

                    <!-- Item -->
                    <div class="flex gap-x-3">
                        <!-- Icon -->
                        <div
                            class="relative last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 dark:after:bg-gray-700">
                            <div class="relative z-10 size-7 flex justify-center items-center">
                                <div class="size-2 rounded-full bg-gray-400 dark:bg-gray-600"></div>
                            </div>
                        </div>
                        <!-- End Icon -->

                        <!-- Right Content -->
                        <div class="grow pt-0.5 pb-8">
                            <h3 class="flex text-base gap-x-1.5 font-semibold text-gray-800 dark:text-white">
                                <i class="fi fi-rr-check text-lg leading-tight font-medium"></i>
                                Completed By
                            </h3>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                System User
                            </p>
                        </div>
                        <!-- End Right Content -->
                    </div>
                    <!-- End Item -->

                    <!-- Heading -->
                    <div class="ps-2 my-2 first:mt-0">
                        <h3 class="text-xs font-medium uppercase text-gray-500 dark:text-gray-400">
                            {{ $job->completed_at ?? 'Pending Completion' }}
                        </h3>
                    </div>
                    <!-- End Heading -->

                    <!-- Item -->
                    <div class="flex gap-x-3">
                        <!-- Icon -->
                        <div
                            class="relative last:after:hidden after:absolute after:top-7 after:bottom-0 after:start-3.5 after:w-px after:-translate-x-[0.5px] after:bg-gray-200 dark:after:bg-gray-700">
                            <div class="relative z-10 size-7 flex justify-center items-center">
                                <div class="size-2 rounded-full bg-gray-400 dark:bg-gray-600"></div>
                            </div>
                        </div>
                        <!-- End Icon -->

                        <!-- Right Content -->
                        <div class="grow pt-0.5 pb-8">
                            <h3 class="flex text-base gap-x-1.5 font-semibold text-gray-800 dark:text-white">
                                <i class="fi fi-rr-calendar-check  text-lg leading-tight font-medium"></i>
                                Completed At
                            </h3>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                yyyy-mm-dd
                            </p>
                        </div>
                        <!-- End Right Content -->
                    </div>
                    <!-- End Item -->
                </div>
                <!-- End Timeline -->
            </div>
        </div>
    </div>

    <!-- Main Card -->
    <div class="lg:col-span-8 md:col-span-8 sm:col-span-12 col-span-12">
        <div class="card h-full">
            <div class="card-body">


                <div class="flex justify-between mb-7">
                    <div class="col">
                        <div class="flex mb-2">
                            <div class="w-[100px]">Customer </div>
                            <div class="fw-600">: {{ $job->customer->name }}</div>
                        </div>
                        <div class="flex mb-2">
                            <span class="w-[100px]">Email</span>
                            <span class="">: customer@email.com</span>
                        </div>
                        <div class="flex mb-3">
                            <span class="w-[100px]">Phone</span>
                            <span class="">: {{ $job->customer->phone }}</span>
                        </div>
                    </div>
                    <div class="col">

                        <div class="flex mb-2">
                            <span class="w-[80px]">Invoice ID </span>
                            <span class="fw-600">: #{{ $job->reference_id }}</span>
                        </div>

                        <div class="flex mb-2">
                            <span class="w-[80px]">Date</span>
                            <span class="fw-600">: {{ $job->date ?? $job->created_at }}</span>
                        </div>
                    </div>
                </div>

                <table class="table w-full">
                    <thead class="">
                        <tr>
                            <th>Description</th>
                            <th>Unit Price</th>
                            <th>Details</th>
                            <th>Premium</th>
                            <th>Discount</th>
                            <th class="text-end">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $job->service?->service_name }}</td>
                            <td>{{ $job->unit_cost }}</td>
                            <td>{!! $job->details ?? 'N/A' !!}</td>
                            <td>{{ $job->premium }}</td>
                            <td>{{ number_format($job->discount, 2) }}</td>
                            <td class="fw-600 text-end">{{ number_format($job->total, 2) }}</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-end">Sub - Total (GHS)</td>
                            <td class="text-end">{{ number_format($job->total, 2) }}</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-end">VAT(GHS)</td>
                            <td class="text-end">0.00</td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-end">Grand Total </td>
                            <td class="text-end font-weight-bold" style="font-size:0.9rem">
                                {{ number_format($job->total, 2) }}
                            </td>
                        </tr>
                    </tbody>
                </table>



                <div class="d-flex justify-content-between mt-5">
                    <div>

                        <div>
                            <i class="fas fa-signature fa-2x text-primary "></i>
                            <p>Front Desk Officer</p>
                            <p class="fs-8px">This is a digital signature</p>
                        </div>

                    </div>
                    <div>

                    </div>
                </div>




            </div>
        </div>
    </div>
    <!-- End Main Card -->
</div>

@include('app.job.modals.assign-job-modal')
@include('app.job.modals.update-jobstatus-modal')

@endsection

@section('js')
<script>
    $('#deleteJobBtn').on('click', function(){
        const $frm = $(this).closest('form');
        swalConfirm(() => $frm.submit(), "Are you sure you want to delete this Job?");
    })
</script>
@endsection
