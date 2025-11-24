@extends('layout.app')

@section('content')


<x-headers.top-header pageTitle="Design Jobs"></x-headers.top-header>

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
                                        :value="$statistics['this_years_jobs_total']" icon="users"
                                        valueType="currency" />
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




<div class="card border-0">
    <div class="card-body">

        <form method="POST" id="filter_jobs_frm">
            @csrf
            <div class="d-flex gap-3 mb-5">
                <x-printforce.inputs.date-input name="start_date" id="start_date" label="Start Date"
                    value="{{ now()->format('Y-m-d') }}" />
                <x-printforce.inputs.date-input name="end_date" id="end_date" label="End Date"
                    value="{{ now()->format('Y-m-d') }}" />

                <div style="padding-top: 27px;">
                    <button type="submit" class="btn btn-primary">
                        Generate Report
                        <i class="fas fa-arrow-right ms-3  "></i>
                    </button>


                </div>
            </div>
        </form>

        <div id="data_holder">
            <table class="table table-sm datatables">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Service</th>
                        <th class="text-end">Unit Cost</th>
                        <th class="text-end">Copies</th>
                        <th class="text-end">Cost</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $total = 0;
                    @endphp

                    @foreach ($jobs as $job)

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $job->date }}</td>
                        <td>{{ $job->customer?->name }}</td>
                        <td>{{ $job->service?->service_name }}</td>
                        <td class="text-end pe-20px">{{ number_format($job->unit_cost, 2) }}</td>
                        <td class="text-end pe-20px">{{ $job->copies }}</td>
                        <td class="text-end pe-20px">{{ number_format($job->total, 2) }}</td>
                        <td class="text-end">
                            <!-- <a href="#" class="viewjob text-primary me-1" data-url="">
                                                <i class="fas fa-file-alt"></i>
                                                JC
                                            </a> -->
                            <!-- <a href="#" class="print text-primary me-1" id="">
                                                <i class="fas fa-print"></i>
                                                Print
                                            </a> -->

                            <a href="javascript:void(0)" data-url="{{ route('jobs.design.edit', $job) }}"
                                class="edit text-warning me-1">
                                <i class="fas fa-pen"></i>
                                Edit
                            </a>

                            @can('administrator')
                            <form method="POST" action="{{ route('jobs.design.delete', $job) }}" class="d-inline-block">
                                @csrf
                                @method('delete')
                                <a href="#" class="delete text-danger">
                                    <i class=" fas fa-trash-alt"></i>
                                    Delete
                                </a>
                            </form>
                            @endcan


                        </td>
                    </tr>


                    @endforeach

                </tbody>
            </table>
        </div>



    </div>
</div>

<div id="modal_holder"></div>
@endsection

@section('js')

<script type="text/javascript" src="{{ asset('assets/js/printforce/jobs/design-jobs-scripts.js') }}"></script>

@endsection
