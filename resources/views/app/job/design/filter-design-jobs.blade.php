<h4 class="mb-4 cal-sans fw-400">{{ $title }}</h4>
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

        @foreach ($jobs as $job)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $job->date }}</td>
                <td>{{ $job->customer?->name }}</td>
                <td>{{ $job->service?->service_name }}</td>
                <td class="text-end pe-20px">{{ number_format($job->unit_cost, 2) }}</td>
                <td class="text-end pe-20px">{{ $job->copies }}</td>
                <td class="text-end pe-20px">{{ number_format($job->total, 2) }}</td>
                <td class="text-end">
                    <!-- <a href="#" class="viewjob text-primary me-1" data-url="">
                                            <i class="fas fa-file-alt"></i>
                                            JC
                                        </a> -->
                    <!-- <a href="#" class="print text-primary me-1" id="">
                                            <i class="fas fa-print"></i>
                                            Print
                                        </a> -->

                    <a href="javascript:void(0)" data-url="{{ route('jobs.design.edit', $job) }}"
                        class="edit text-warning me-1">
                        <i class="fas fa-pen"></i>
                        Edit
                    </a>

                    @can('administrator')
                        <form method="POST" action="{{ route('jobs.design.delete', $job) }}" class="d-inline-block">
                            @csrf
                            @method('delete')
                            <a href="#" class="delete text-danger">
                                <i class=" fas fa-trash-alt"></i>
                                Delete
                            </a>
                        </form>
                    @endcan


                </td>
            </tr>


        @endforeach

    </tbody>
</table>
