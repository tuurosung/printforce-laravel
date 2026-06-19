<h4 class="h5 mb-3">Customer Rankings</h4>

<table class="table w-full text-sm text-left rtl:text-right text-body">
    <thead class="text-sm text-dark bg-neutral-secondary-medium border-b border-t border-default-medium">
        <tr>
            <th scope="col" class="p-4">
                #
            </th>
            <th scope="col" class="px-6 py-3 font-medium">
                Customer Name
            </th>
            <th scope="col" class="px-6 py-3 font-medium">
                Total Jobs
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($customer_rankings as $customer)

            <tr class="">
                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap">
                    {{ $loop->iteration }}
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap">
                    {{ $customer['name'] }}
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap">
                    {{ $customer['total_jobs'] }}
                </td>
            </tr>

        @endforeach
    </tbody>
</table>
