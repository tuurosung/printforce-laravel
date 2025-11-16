@extends('layout.app')

@section('content')

<x-printforce.headers.page-header title="Large Format Jobs">
</x-printforce.headers.page-header>


@can('administrator')
<div class="row mb-4">
    <div class="col-md-2">
        <x-printforce.cards.colour-card title="Today's Jobs" value="{{ $statistics['todays_jobs'] }}" bgColour="primary"
            type="count" />
    </div>
    <div class="col-md-2">
        <x-printforce.cards.colour-card title="Monthly Revenue" value="{{ $statistics['this_months_jobs'] }}"
            bgColour="warning" type="count" />
    </div>
    <div class="col-md-2">
        <x-printforce.cards.colour-card title="Annual Revenue" value="{{ $statistics['this_years_jobs'] }}"
            bgColour="success" type="count" />
    </div>
    <div class="col-md-2">
        <x-printforce.cards.colour-card title="Revenue %" value="0" bgColour="danger" type="percentage" />
    </div>
</div>
@endcan

@include('layout.errors')

<!-- tab v2 with card -->
<div class="card border-0">
    <ul class="nav nav-tabs nav-tabs-v2 ps-4 pe-4">
        <li class="nav-item me-3"><a href="#dashboard" class="nav-link active" data-bs-toggle="tab">Dashboard</a></li>
        <li class="nav-item me-3"><a href="#performance" class="nav-link" data-bs-toggle="tab">Performance</a></li>
    </ul>
    <div class="tab-content p-4">
        <div class="tab-pane fade show active" id="dashboard">


            <form method="POST" id="filter_jobs_frm" action="{{ route('jobs.largeformat.filter') }}">
                @csrf
                <div class="d-flex mb-5">
                    <div class="me-3">

                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="text" class="form-control form-control-sm" name="start_date" id="start_date"
                                value="{{ now()->format('Y-m-d') }}" />
                        </div>

                    </div>

                    <div class="me-3">

                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="text" class="form-control form-control-sm" name="end_date" id="end_date"
                                value="{{ now()->format('Y-m-d') }}" />
                        </div>

                    </div>
                    <div style="padding-top: 27px;">
                        <button type="submit" class="btn btn-primary">
                            Generate Report
                            <i class="fas fa-arrow-right ms-3  "></i>
                        </button>


                    </div>
                    <div></div>
                </div>
            </form>

            <div id="data_holder">

                

            </div>





        </div>
        <div class="tab-pane fade" id="performance">

            <h5>Revenue Performance</h5>
            <div class="table-responsive">
                <table class="table table-sm datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Description</th>
                            <th scope="col" class="text-center">Jobs</th>
                            <th scope="col" class="text-end">Revenue (GHS)</th>
                            <th scope="col" class="text-end">Performance (%)</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php
                        $i = 1;
                        @endphp
                        @foreach ($performanceSummary as $performance)
                        <tr class="">
                            <td scope="row">{{ $i++ }}</td>
                            <td>{{ $performance->service->service_name }}</td>
                            <td class="text-center">{{ $performance->jobs_count }}</td>
                            <td class="text-end pe-20px">{{ number_format($performance->jobs_sum, 2) }}</td>
                            <td class="text-end pe-20px">
                                {{ number_format($performance->jobs_sum / $performanceSummary->sum('jobs_sum') * 100, 2) }}
                            </td>

                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<div id="modal_holder"></div>
@endsection

@push('stacked-scripts')
    @vite(['resources/js/modules/jobs/largeformat/largeformat-jobs-scripts.js'])
@endpush
