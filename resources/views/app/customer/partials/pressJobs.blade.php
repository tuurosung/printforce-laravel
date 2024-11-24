<table class="table table-sm">
    <thead class="">
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Service</th>
            <th class="text-right">Cost</th>
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
            <td class="text-right">{{ $jobs->total }}</td>
            <td class="text-right">
                <a href="#" class="viewjob" style="text-decoration: none;" id="{{ $jobs->job_id }}">
                    <i class="fas fa-eye mr-3 text-purple  "></i>
                </a>

                <a href="#" class="job_card" style="text-decoration: none;" id="{{ $jobs->job_id }}">
                    <i class="fas fa-print text-primary  "></i>
                </a>
            </td>
        </tr>
        <?php
        $total += $jobs->total;
        ?>

        @endforeach

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-right Axiforma fw-600 fs-18px">{{ $total }}</td>
            <td></td>
        </tr>
    </tbody>
</table>
