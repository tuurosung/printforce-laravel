<table class="table table-sm datatables">
    <thead class="">
        <tr>
            <th>#</th>
            <th>Date</th>
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

        @foreach ($customer->largeFormatJobs as $jobs)

        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $jobs->date }}</td>
            <td>{{ $jobs->service->service_name }}</td>
            <td class="text-end pe-20px">{{ number_format($jobs->width, 2) }}</td>
            <td class="text-end pe-20px">{{ number_format($jobs->height, 2) }}</td>
            <td class="text-end pe-20px">{{ number_format($jobs->cost, 2) }}</td>
            <td class="text-end pe-20px">{{ $jobs->copies }}</td>
            <td class="text-end pe-20px">{{ number_format($jobs->total, 2) }}</td>
            <td class="text-end pe-20px">
                <a
                    href="#"
                    class="viewjob text-primary me-3"
                    style="text-decoration: none;"
                    id="{{ $jobs->job_id }}">

                    <i class="fas fa-file-alt"></i>
                    Job Card

                </a>

                <a
                href="#"
                class="job_card text-primary"
                style="text-decoration: none;"
                id="{{ $jobs->job_id }}">

                    <i class="fas fa-print"></i>
                    Print
                </a>
            </td>
        </tr>


        @endforeach

    </tbody>
</table>
