<table class="table w-full text-sm text-left rtl:text-right text-body">
    <thead class="text-sm text-dark bg-neutral-secondary-medium border-b border-t border-default-medium">
        <tr>
            <th scope="col" class="p-4">
                #
            </th>
            <th scope="col" class="px-6 py-3 font-medium">
                Description
            </th>
            <th scope="col" class="px-6 py-3 font-medium">
                Jobs
            </th>
            <th scope="col" class="px-6 py-3 font-medium">
                Revenue
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($service_performance as $service_performance_row)
            <tr class="">
                <td scope="row">{{ $loop->iteration }}</td>
                <td class="px-6 py-4 font-medium text-dark whitespace-nowrap">
                    {{ $service_performance_row['service_name'] }}
                </td>
                <td class="px-6 py-4 font-medium text-dark whitespace-nowrap">
                    {{ $service_performance_row['jobs_count'] }}
                </td>
                <td class="px-6 py-4 font-medium text-dark whitespace-nowrap">
                    {{ number_format($service_performance_row['jobs_sum'], 2) }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
