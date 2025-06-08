@extends('layout.app')

@section('content')
<x-printforce.headers.page-header title="Embroidery Jobs">

</x-printforce.headers.page-header>


<div class="row mb-4">
    <div class="col-md-2">
        <x-printforce.cards.colour-card title="Today's Jobs" value="{{ $jobs->sum('total') }}" bgColour="primary"
            type="count" />
    </div>
    <div class="col-md-2">
        <x-printforce.cards.colour-card title="Monthly Revenue" value="{{ $thisMonthsRevenue }}" bgColour="warning"
            type="count" />
    </div>
    <div class="col-md-2">
        <x-printforce.cards.colour-card title="Annual Revenue" value="{{ $thisMonthsRevenue }}" bgColour="success"
            type="count" />
    </div>
    <div class="col-md-2">
    </div>
    <div class="col-md-2"></div>
</div>


<!-- tab v2 with card -->
<div class="card border-0">
    <ul class="nav nav-tabs nav-tabs-v2 ps-4 pe-4">
        <li class="nav-item me-3"><a href="#dashboard" class="nav-link active" data-bs-toggle="tab">Dashboard</a></li>
        <li class="nav-item me-3"><a href="#performance" class="nav-link" data-bs-toggle="tab">Revenue Performance</a>
        </li>
    </ul>
    <div class="tab-content p-4">
        <div class="tab-pane fade show active" id="dashboard">

            <form method="POST" id="filter_jobs_frm">
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
                <table class="table table-sm datatables">
                    <thead class="">
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Service</th>
                            <th class="text-end">Unit Cost</th>
                            <th class="text-center">Qty</th>
                            <th class="text-end">Embr. Cost</th>
                            <th class="text-end">Mat. Supply</th>
                            <th class="text-end">Mat. Unit Cost</th>
                            <th class="text-end">Purchase Cost</th>
                            <th class="text-end">Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($jobs as $job)


                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $job->date }}</td>
                            <td>{{ $job->customer?->name }}</td>
                            <td>{{ $job->service->service_name }}</td>
                            <td class="text-end pe-20px">{{ number_format($job->unit_cost, 2) }}</td>
                            <td class="text-center">{{ $job->qty }}</td>
                            <td class="text-end pe-20px">{{ number_format($job->embroidery_cost, 2) }}</td>
                            <td class="text-end  pe-20px">{{ ucfirst($job->mat_supply) }}</td>
                            <td class="text-end pe-20px">{{ number_format($job->mat_unit_cost, 2) }}</td>
                            <td class="text-end pe-20px">{{ number_format($job->purchase_cost, 2) }}</td>
                            <td class="text-end pe-20px">{{ number_format($job->total, 2) }}</td>
                            <td class="text-end pe-20px">

                                <a href="#" class="edit text-primary me-1"
                                    data-url="{{ route('jobs.embroidery.edit', $job) }}">
                                    <i class="fas fa-pen"></i>
                                    Edit
                                </a>

                                @can('administrator')
                                <form method="POST" action="{{ route('jobs.embroidery.delete', $job) }}"
                                    class="d-inline-block">
                                    @csrf
                                    @method('delete')
                                    <a href="#" class="delete  text-danger">
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
        <div class="tab-pane fade" id="performance">

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

@section('js')

<script type="text/javascript" src="{{ asset('assets/js/printforce/jobs/embroidery-jobs-scripts.js') }}"></script>

@endsection
