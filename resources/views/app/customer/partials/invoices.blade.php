<h4 class="Axiforma mb-3">Invoices</h4>

<table class="table table-sm datatables">
    <thead class="">
        <tr>
            <th>#</th>
            <th>Date Created</th>
            <th>Invoice ID</th>
            <th>Customer Name</th>
            <th class="text-end">Sub-Total</th>
            <th class="text-end">Taxes</th>
            <th class="text-end">Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        @foreach ($customer->invoices as $customerInvoice)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $customerInvoice->created_at }}</td>
                <td>
                    <a href="#">{{ $customerInvoice->invoice_id }}</a>
                </td>
                <td>{{ $customerInvoice->customer->name }}</td>
                <td class="text-end">{{ number_format($customerInvoice->sub_total, 2) }}</td>
                <td class="text-end">
                    {{ number_format($customerInvoice->vat_amount + $customerInvoice->nhil_amount + $customerInvoice->getfund_amount, 2) }}
                </td>
                <td class="text-end">{{ number_format($customerInvoice->total, 2) }}</td>
                <td class="text-end">
                    <div class="dropdown">
                        <a class="dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            Options
                        </a>
                        <div class="dropdown-menu" aria-labelledby="triggerId">
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </div>
                </td>
            </tr>

        @endforeach

    </tbody>
</table>
