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

                    <!-- <a href="#" class="viewjob me-3 text-primary"
                                    data-url="">

                                    <i class="fas fa-file-alt"></i>
                                    JC

                                </a> -->
                    <a href="javascript:void(0)" class="edit text-primary me-3"
                        data-url="{{ route('jobs.large-format.edit', $job) }}">
                        <i class="fas fa-pen"></i>
                        Edit
                    </a>

                    @can('administrator')
                        <form method="POST" action="{{ route('jobs.large-format.delete', $job) }}" class="d-inline-block">
                            @csrf
                            @method('delete')
                            <a href="#" class="text-danger delete">

                                <i class="fas fa-trash-alt"></i>
                                Delete
                            </a>
                        </form>
                    @endcan



                </td>
            </tr>


        @endforeach

    </tbody>
</table>
