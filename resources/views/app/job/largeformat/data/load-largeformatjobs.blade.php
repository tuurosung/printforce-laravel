<table class="table table-sm datatables">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Customer</th>
            <th>Service</th>
            <th>Dimensions</th>
            <th class="text-end">Cost</th>
            <th class="text-end">Copies</th>
            <th class="text-end">Total</th>
            <th>Assigned To</th>
            <th>Job Status</th>
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
                <td>{{ $job->service?->service_name }}</td>
                <td>
                    {{ $job->details }}
                </td>
                <td class="text-end pe-20px">{{ number_format($job->cost, 2) }}</td>
                <td class="text-end pe-20px">{{ $job->copies }}</td>
                <td class="text-end pe-20px">{{ number_format($job->total, 2) }}</td>
                <td class="">

                    {{ $job->assignedTo?->name ?? '' }}

                </td>
                <td class="{{ $job->job_status === 'in_progress' ? 'text-info' : ($job->job_status === 'completed' ? 'text-success' : '') }}">

                    {{ $job->job_status_definition }}

                </td>
                <td class="text-end pe-20px">

                    <div class="dropdown">
                        <a class="dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Options
                        </a>
                        <div class="dropdown-menu" aria-labelledby="triggerId">
                            @if ($job->service)
                                <a class="dropdown-item assign-job-button d-flex" href="#"
                                    data-url="{{ route('jobs.assign-job.load', ['job_id' => $job->job_id, 'category_id' => $job->service?->category_id ?? 'N/A']) }}">
                                    Assign Job
                                    <i class="fi fi-rr-arrow-right ms-auto text-primary"></i>
                                </a>
                                <a class="dropdown-item update-jobstatus-button d-flex" href="#"
                                    data-fetch-url="{{ route('jobs.job-status.load', ['job_id' => $job->job_id, 'category_id' => $job->service?->category_id ?? 'N/A']) }}">
                                    Update Job Status
                                    <i class="fi fi-rr-clock ms-auto text-primary"></i>
                                </a>
                            @endif
                            <a class="dropdown-item edit-button d-flex" href="javascript:void(0)"
                                data-url="{{ route('jobs.largeformat.edit', $job) }}">
                                Edit
                                <i class="fi fi-rr-pencil ms-auto text-primary"></i>
                            </a>
                            @can('administrator')
                                <form method="POST" action="{{ route('jobs.largeformat.delete', $job) }}" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <a class="dropdown-item d-flex delete-button" href="#">
                                        Delete
                                        <i class="fi fi-rr-trash ms-auto text-danger ms-auto"></i>
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
