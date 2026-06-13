@extends('layout.app')


@section('content')

<x-headers.page-header pageTitle="Jobs" currentPage="Today's Jobs"></x-headers.page-header>


<div class="grid grid-cols-12 gap-6 mb-8">
    <div class="lg:col-span-3 md:col-span-3 sm:col-span-12 col-span-12">

        <x-printforce.cards.colour-card title="Total Jobs" bgColour="primary" :value="$statistics['total']" />
    </div>
    <div class="lg:col-span-3 md:col-span-3 sm:col-span-12 col-span-12">
        <x-printforce.cards.colour-card title="Today's Jobs" bgColour="warning"
            value="{{ $statistics['todays_jobs_total'] }}" />
    </div>
</div>

<div class="card card-body px-2 py-2 mb-9">
    <div class="flex">
        <div
            class="flex bg-gray-100 hover:bg-gray-200 rounded-md transition p-1 dark:bg-gray-700 dark:hover:bg-gray-600">
            <nav class="flex space-x-2 " aria-label="Tabs" role="tablist">

                <x-tabs.tab-item id="dashboard-tab" label="Dashboard" icon="paper-plane" dataHsTab="dashboard-content"
                    :ariaSelected="true" />
                <x-tabs.tab-item id="jobs-tab" label="Registered Jobs" icon="briefcase" dataHsTab="jobs-content"
                    :ariaSelected="false" />
                <x-tabs.tab-item id="invoices-tab" label="Invoices" icon="file-invoice-dollar"
                    dataHsTab="invoices-content" :ariaSelected="false" />
                <x-tabs.tab-item label="Payments" icon="sack-dollar" dataHsTab="payments-content"
                    :ariaSelected="false" />

            </nav>
        </div>
    </div>

    <div class="mt-3">
        <div id="dashboard-content" role="tabpanel" aria-labelledby="dashboard-tab" class="pt-5"></div>
    </div>
</div>





<div class="card border-0">
    <div class="card-body">

        <div class="flex gap-6 mb-8">
            <div>
                <div class="">
                    <label class="form-label">Start Date</label>
                    <input class="form-control" value="{{ now()->format('Y-m-d') }}">
                </div>
            </div>
            <div>
                <div class="">
                    <label class="form-label">End Date</label>
                    <input class="form-control" value="{{ now()->format('Y-m-d') }}">
                </div>
            </div>
            <div class="flex ">
                <button type="" class="btn btn-primary mt-auto py-2.5 px-4">
                    <i class="fi fi-rr-search me-3" aria-hidden="true"></i>Filter Jobs</button>
            </div>
        </div>

        <div class="table-responsive mb-5">
            <table class="table w-full text-sm text-left rtl:text-right text-body">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Job Type</th>
                        <th scope="col">Service</th>
                        <th scope="col">Customer</th>
                        <th scope="col" class="">Details</th>
                        <th scope="col" class="text-center">Copies</th>
                        <th scope="col" class="text-end">Total</th>
                        <th scope="col" class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($allJobs as $job)
                    <tr class="">
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $job->created_at }}</td>
                        <td>{{ $job->job_type }}</td>
                        <td>{{ $job->service?->service_name }}</td>
                        <td>{{ $job->customer?->name }}</td>
                        <td class="text-center">{{ $job->details }}</td>
                        <td class="text-center">{{ $job->unit_cost ?? $job->qty }}</td>
                        <td class="text-end">{{ number_format($job->total, 2) }}</td>
                        <td class="text-end">
                            <a href="{{ route('jobs.view-job', [$job->job_id, $job->job_type]) }}" class="underline">
                                View
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="6" class="text-end fw-600">Total</td>
                        <td class="text-end fw-600">{{ number_format($allJobs->sum('total'), 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection
