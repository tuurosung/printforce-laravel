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
