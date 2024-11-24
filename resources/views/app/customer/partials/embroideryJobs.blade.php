<table class="table table-sm datatables">
    <thead class="">
        <tr>
            <th>#</th>
            <th>Date</th>
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
        @php
        $i = 1;
        $total = 0;
        @endphp

        @foreach ($customer->embroideryJobs as $jobs)

        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $jobs->date }}</td>
            <td>{{ $jobs->service->service_name }}</td>
            <td class="text-end">{{ number_format($jobs->unit_cost, 2) }}</td>
            <td class="text-center">{{ $jobs->qty }}</td>
            <td class="text-end">{{ number_format($jobs->embroidery_cost, 2) }}</td>
            <td class="text-end">{{ ucfirst($jobs->mat_supply) }}</td>
            <td class="text-end">{{ number_format($jobs->mat_unit_cost, 2) }}</td>
            <td class="text-end">{{ number_format($jobs->purchase_cost, 2) }}</td>
            <td class="text-end">{{ number_format($jobs->total, 2) }}</td>
            <td class="text-end">
                <a
                href="#"
                class="viewjob text-primary me-3"
                id="{{ $jobs->job_id }}">

                    <i class="fas fa-file-alt"></i>
                    Job Card
                </a>

                <a
                href="#"
                class="job_card text-primary"
                id="{{ $jobs->job_id }}">

                    <i class="fas fa-print"></i>
                    Print
                </a>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>
