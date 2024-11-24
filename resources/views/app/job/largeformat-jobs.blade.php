@extends('layout.app')

@section('content')

<div class="d-flex justify-content-between">
    <div class="d-flex align-items-center">
        <h4 class="h2 m-0">Large Format Jobs</h4>
    </div>
    <div></div>
</div>

<hr class="mb-5">

<div class="card border-0">
    <div class="card-body">

        <div class="d-flex mb-5">
            <div class="me-3">

                <div class="mb-3">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input
                        type="text"
                        class="form-control form-control-sm"
                        name="start_date"
                        id="start_date"
                        value="{{ now()->format('Y-m-d') }}" />
                </div>

            </div>

            <div>

                <div class="mb-3">
                    <label for="end_date" class="form-label">End Date</label>
                    <input
                        type="text"
                        class="form-control form-control-sm"
                        name="end_date"
                        id="end_date"
                        value="{{ now()->format('Y-m-d') }}" />
                </div>

            </div>
            <div></div>
            <div></div>
        </div>

        <table class="table table-sm datatables">
            <thead class="">
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Service</th>
                    <th class="text-end">Width</th>
                    <th class="text-end">Height</th>
                    <th class="text-end">Cost</th>
                    <th class="text-end">Copies</th>
                    <th class="text-end">Total</th>
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
                    <td class="text-end pe-20px">{{ number_format($job->width, 2) }}</td>
                    <td class="text-end pe-20px">{{ number_format($job->height, 2) }}</td>
                    <td class="text-end pe-20px">{{ number_format($job->cost, 2) }}</td>
                    <td class="text-end pe-20px">{{ $job->copies }}</td>
                    <td class="text-end pe-20px">{{ number_format($job->total, 2) }}</td>
                    <td class="text-end pe-20px">
                        <a
                            href="#"
                            class="viewjob text-primary me-3"
                            style="text-decoration: none;"
                            id="{{ $job->job_id }}">

                            <i class="fas fa-file-alt"></i>
                            Job Card

                        </a>

                        <a
                            href="#"
                            class="job_card text-primary me-3"
                            style="text-decoration: none;"
                            id="{{ $job->job_id }}">

                            <i class="fas fa-print"></i>
                            Print
                        </a>

                        <a
                            href="#"
                            class="text-danger"
                            id="{{ $job->job_id }}">

                            <i class="fas fa-trash-alt"></i>
                            Delete
                        </a>
                    </td>
                </tr>


                @endforeach

            </tbody>
        </table>

    </div>
</div>



@endsection

@section('js')

@endsection
