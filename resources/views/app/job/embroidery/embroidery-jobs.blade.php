@extends('layout.app')

@section('content')
    <x-headers.top-header pageTitle="Embroidery Jobs">
        <!-- <button class="btn btn-primary btn-sm ms-3 px-3">Print</button> -->
    </x-headers.top-header>

    @can('administrator')
        <div class="card">
            <div class="card-body p-4 pb-0" data-simplebar="init">
                <div class="simplebar-wrapper" style="margin: -24px -24px 0px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content"
                                style="height: auto; overflow: hidden;">
                                <div class="simplebar-content" style="padding: 24px 24px 0px;">
                                    <div class="row flex-nowrap mb-3">
                                        <div class="col">
                                            <x-cards.colour-card2 title="Todays Jobs" colour="primary" icon="sack-dollar"
                                                :value="$statistics['todays_jobs_total']" valueType="currency" />
                                        </div>
                                        <div class="col">
                                            <x-cards.colour-card2 title="This Months Jobs" colour="danger"
                                                :value="$statistics['this_months_jobs_total']" icon="usd-square"
                                                valueType="currency" />
                                        </div>
                                        <div class="col">
                                            <x-cards.colour-card2 title="This Years Jobs" colour="success"
                                                :value="$statistics['this_years_jobs_total']" icon="users" valueType="currency" />
                                        </div>
                                        <div class="col">
                                            <x-cards.colour-card2 title="Pending Jobs" colour="warning" value="0"
                                                icon="alarm-clock" valueType="number" />
                                        </div>
                                        <div class="col"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-placeholder" style="width: 1140px; height: 279px;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                </div>
            </div>
        </div>
    @endcan





    @include('layout.errors')

    <div id="dashboard-tab">
        <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row" role="tablist">
            <li class="nav-item">
                <a href="#jobs_report"
                    class="nav-link gap-6 d-flex align-items-center justify-content-center active px-3 px-md-3 me-0 me-md-2 fs-11"
                    id="jobs_report-tab" data-bs-toggle="tab" role="tab" aria-controls="jobs_report" aria-selected="true">
                    <i class="fi fi-sr-chart-simple fs-9px"></i>
                    <span class="d-none d-md-block fw-medium">Jobs Report</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#performance_analytics"
                    class="nav-link gap-6 d-flex align-items-center justify-content-center px-3 px-md-3 me-0 me-md-2 fs-11"
                    id="performance_analytics-tab" data-bs-toggle="tab" role="tab" aria-controls="performance_analytics"
                    aria-selected="false">
                    <i class="fi fi-sr-users fs-9px"></i>
                    <span class="d-none d-md-block fw-medium">Performance Analytics</span>
                </a>
            </li>
            <!-- <li class="nav-item ms-auto">
                        <a href="#add_notes" class="btn btn-primary d-flex align-items-center px-3 gap-6 fs-11" id="add-notes">
                            <i class="fi fi-sr-plus fs-9px"></i>
                            <span class="d-none d-md-block fw-medium fs-3">Add Notes</span>
                        </a>
                    </li> -->
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="jobs_report" role="tabpanel" aria-labelledby="jobs_report-tab">

                <div class="card">
                    <div class="card-body">
                        @can('administrator')
                            <form method="POST" id="filter_jobs_frm" action="{{ route('jobs.embroidery.filter') }}">
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
                        @endcan


                        <div id="data_holder"></div>
                    </div>
                </div>



            </div>
            <div class="tab-pane fade" id="performance_analytics" role="tabpanel"
                aria-labelledby="performance_analytics-tab">

                <div class="card">
                    <div class="card-body">
                        <h4 class="h4 mb-5">Monthly Revenue Performance</h4>

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

                                    @foreach ($performanceSummary as $performance)
                                        <tr class="">
                                            <td scope="row">{{ $loop->iteration }}</td>
                                            <td>{{ $performance->service->service_name }}</td>
                                            <td class="text-center">{{ $performance->jobs_count }}</td>
                                            <td class="text-end pe-20px">{{ number_format($performance->jobs_sum, 2) }}</td>
                                            <td class="text-end pe-20px">
                                                {{ number_format($performance->jobs_sum / $performanceSummary->sum('jobs_sum') * 100, 2) }}
                                            </td>
                                            <td class="text-end pe-20px">



                                            </td>
                                        </tr>
                                    @endforeach




                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>



    <div id="modal_holder"></div>

@endsection

@push('stacked-scripts')
    @vite(['resources/js/modules/jobs/embroidery/embroidery-job-scripts.js'])
@endpush
