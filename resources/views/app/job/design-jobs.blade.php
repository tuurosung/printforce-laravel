@extends('layout.app')

@section('content')

<div class="d-flex justify-content-between">
    <div class="d-flex align-items-center">
        <h4 class="h2 m-0">Design Jobs</h4>
    </div>
    <div></div>
</div>

<hr class="mb-5">

<div class="card border-0">
    <div class="card-body">

        <form method="POST" id="filter_jobs_frm">
            @csrf
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

                <div class="me-3">

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
                <div style="padding-top: 27px;">
                    <button
                        type="submit"
                        class="btn btn-primary">
                        Generate Report
                        <i class="fas fa-arrow-right ms-3  "></i>
                    </button>


                </div>
                <div></div>
            </div>
        </form>

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
                    <td class="text-end pe-20px">{{ number_format($job->unit_cost, 2) }}</td>
                    <td class="text-end pe-20px">{{ $job->copies }}</td>
                    <td class="text-end pe-20px">{{ number_format($job->total, 2) }}</td>
                    <td class="text-end">
                        <div class="dropdown">
                            <a
                                class=""
                                type="button"
                                id="triggerId"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false">
                                Options
                            </a>
                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                <a
                                    href="#"
                                    class="viewjob dropdown-item me-3"
                                    data-url="{{ route('view-design-job', $job->job_id) }}">

                                    <i class="fas fa-file-alt me-3 text-primary"></i>
                                    Job Card

                                </a>
                                <a
                                    href="#"
                                    class="job_card dropdown-item me-3"
                                    id="{{ $job->job_id }}">

                                    <i class="fas fa-print me-3 text-primary"></i>
                                    Print
                                </a>

                                @can('administrator')
                                <form method="POST" action="{{ route('delete-design-job', $job->job_id) }}">
                                    @csrf
                                    @method('delete')
                                    <a
                                        href="#"
                                        class="dropdown-item delete_job"">

                                        <i class=" fas fa-trash-alt text-danger me-3"></i>
                                        Delete
                                    </a>
                                </form>
                                @endcan

                            </div>
                        </div>
                    </td>
                </tr>


                @endforeach

            </tbody>
        </table>

    </div>
</div>

<div id="modal_holder"></div>
@endsection

@section('js')

<script type="text/javascript">
    $(document).ready(function() {

        // Filter form on submit
        $('#filter_jobs_frm').on('submit', function(event) {
            event.preventDefault();

            var url = "{{ route('filter.largeformatjobs') }}";

            $.post(url, $(this).serialize())
                .done(function(data) {
                    $('tbody').html('');
                    $('tbody').append(data);

                    bindEvents();
                })
                .fail(function(data) {
                    bootbox.alert(data);
                });
        });


        // viewjobs on click
        $('.table tbody').on('click', '.viewjob', function(event) {
            event.preventDefault();

            var url = $(this).data('url');

            $.get(url, function(response) {

                $('#modal_holder').html(response);
                new bootstrap.Modal(document.getElementById('jobCardModal')).show();

            })
        });

        // delete job on click
        $('.table tbody').on('click', '.delete_job', function(event) {
            var job = $(this)

            new swal("Are you sure you want to delete this job?", {
                    "buttons": {
                        "cancel": "Cancel",
                        "catch": {
                            "text": "Yes! Delete it!",
                            "value": "catch",
                        }
                    }
                })
                .then((value) => {
                    switch (value) {
                        case "cancel":
                            new swal("Your job is safe");
                            break;
                        case "catch":
                            job.closest('form').submit();
                            break;
                    }
                });
        }); //end click


    });
</script>

@endsection
