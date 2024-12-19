<div class="card border-0">
    <div class="card-body">

        <h4 class="h4">Payments</h4>
        <hr class="mb-4">

        <table class="table table-sm">
            <thead class="">
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Account</th>
                    <th class="text-end">Amount</th>
                </tr>
            </thead>
            <tbody>

                @php
                $i = 1;
                $total = 0;
                @endphp

                @foreach ($operatingAccount->payments as $payment)

                @php
                $payment_id = $payment->payment_id;
                @endphp
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td>{{ $payment->payment_date ?? $payment->created_at }}</td>
                    <td>{{ $payment->customer->name }}</td>
                    <td>{{ $payment->account->account_name }}<!--- Payment Account Name --> </td>
                    <td class="text-end">{{ number_format($payment->amount_paid,2) }}</td>

                </tr>

                @php
                $total += $payment->amount_paid;
                @endphp

                @endforeach

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-end Axiforma fs-18px fw-600">{{ number_format($total,2) }}</td>

                </tr>


            </tbody>
        </table>

    </div>
</div>
