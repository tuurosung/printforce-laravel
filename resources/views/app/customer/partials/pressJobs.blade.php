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
                <div class="dropdown dropstart">
                    <a
                        class=""
                        type="button"
                        id="triggerId"
                        data-toggle="dropdown"
                        data-bs-toggle="dropdown">
                        Options
                    </a>
                    <div class="dropdown-menu" aria-labelledby="triggerId">
                        <a
                            href="#"
                            class="dropdown-item viewjob me-3"
                            style="text-decoration: none;"
                            id="{{ $jobs->job_id }}">

                            <i class="fas fa-file-alt  text-primary me-3"></i>
                            View Job Card

                        </a>
                        <a
                            href="#"
                            class="dropdown-item job_card"
                            style="text-decoration: none;"
                            id="{{ $jobs->job_id }}">

                            <i class="fas fa-print me-3 text-primary"></i>
                            Print Job Card
                        </a>
                    </div>
                </div>

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
