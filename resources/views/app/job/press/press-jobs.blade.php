@extends('layout.app')

@section('content')

    <x-printforce.headers.page-header title="Press Jobs">

    </x-printforce.headers.page-header>


    <div class="row mb-4">
        <div class="col-md-2">
            <x-printforce.cards.colour-card title="Today's Jobs" value="0" bgColour="primary" type="count" />
        </div>
        <div class="col-md-2">
            <x-printforce.cards.colour-card title="Monthly Revenue" value="0" bgColour="warning" type="count" />
        </div>
        <div class="col-md-2">
            <x-printforce.cards.colour-card title="Annual Revenue" value="0" bgColour="success" type="count" />
        </div>
    </div>

    <div class="card border-0">
        <div class="card-body">

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
                        <th class="text-end">Copies</th>
                        <th class="text-end">Cost</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                        $total = 0;
                    @endphp

                    @foreach ($jobs as $job)

                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $job->date }}</td>
                            <td>{{ $job->customer?->name }}</td>
                            <td>{{ $job->service->service_name }}</td>
                            <td class="text-end pe-20px">{{ number_format($job->cost, 2) }}</td>
                            <td class="text-end pe-20px">{{ $job->copies }}</td>
                            <td class="text-end pe-20px">{{ number_format($job->total, 2) }}</td>
                            <td class="text-end">

                                <a href="#" class="edit me-1 text-primary" data-url="{{ route('jobs.press.edit', $job) }}">
                                    <i class="fas fa-pencil"></i>
                                    Edit
                                </a>

                                @can('administrator')
                                    <form method="POST" action="{{ route('jobs.press.delete', $job) }}" class="d-inline-block">
                                        @csrf
                                        @method('delete')
                                        <a href="#" class="delete text-danger">
                                            <i class=" fas fa-trash-alt text-danger"></i>
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

<script type="text/javascript" src="{{ asset('assets/js/printforce/jobs/press-jobs-scripts.js') }}"></script>

@endsection
