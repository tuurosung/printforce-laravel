<div class="tab-pane fade" id="payments">

    <h4 class="mb-5">Payments</h4>

    <table class="table table-sm w-full">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Payment #</th>
                <th scope="col">Date</th>
                <th scope="col">Payment Account</th>
                <th scope="col">Reference</th>
                <th scope="col" class="text-end">Amount Paid</th>
                <th scope="col" class="text-end">Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($supplier->payment as $payment)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $payment->payment_id }}</td>
                    <td>{{ $payment->date }}</td>
                    <td>{{ $payment->paymentAccount->account_name }}</td>
                    <td>{{ $payment->reference }}</td>
                    <td class="text-end pe-20px">{{ number_format($payment->amount_paid, 2) }}</td>
                    <td class="text-end pe-20px">
                        <a class="me-3 text-primary" href="{{ route('suppliers.edit', $supplier->supplier_id) }}">

                            <i class="fas fa-pen me-2"></i>
                            Edit
                        </a>
                        <a href="#" class="text-danger delete" data-url="">
                            <i class="fas fa-trash-alt text-danger me-2"></i>
                            Delete
                        </a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

</div>
