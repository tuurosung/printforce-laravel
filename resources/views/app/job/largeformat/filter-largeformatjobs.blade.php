@php
$i = 1;
$total = 0;
@endphp

@foreach ($filtered_jobs as $job)

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
