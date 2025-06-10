<table class="table table-sm datatable">
    <thead class="">
        <tr>
            <th>#</th>
            <th>Date Created</th>
            <th>Customer Name</th>
            <th>Type</th>
            <th>Phone Number</th>
            <th class="text-end">Jobs</th>
            <th class="text-end">Paid</th>
            <th class="text-end">Balance</th>
            <th class="text-end">Option</th>
        </tr>
    </thead>
    <tbody>

        @php
        $i = 1;
        $total_jobs = 0;
        $total_payments = 0;
        $total_balance = 0;
        @endphp

        @foreach ($customers as $customer)

        <tr>
            <td><?php echo $i++; ?></td>
            <td>{{ $customer->created_at->format('M d, Y') }}</td>
            <td class="text-capitalize" style="text-decoration: underline;">
                <a href="{{ route('customers.customer.info', $customer) }}">

                    {{ strtolower($customer->name) }}

                </a>
            </td>
            <td>{{ $customer->customer_category_description }}</td>
            <td><?php echo $customer['phone']; ?></td>
            <td class="text-end">
                <?php echo number_format($customer->customer_debit, 2); ?>
            </td>
            <td class="text-end"><?php echo number_format($customer->customer_credit, 2); ?></td>
            <td class="text-end"><?php echo number_format($customer->customer_balance, 2); ?></td>
            <td class="text-end">
                <a href="javascript:void(0)" data-url="{{ route('customers.customer.edit', $customer) }}"
                    class="text-primary edit  me-3">
                    <i class="fas fa-pen text-primary "></i>
                    Edit
                </a>

                @can('administrator')
                <form method="POST" action="{{ route('customers.customer.delete', $customer) }}" class="d-inline-block">
                    @csrf
                    @method('delete')
                    <a href="javascript:void(0)" class="text-danger delete">
                        <i class="fas fa-trash-alt text-danger" aria-hidden="true"></i>
                        Delete
                    </a>
                </form>
                @endcan
            </td>
        </tr>

        @endforeach


    </tbody>
</table>
