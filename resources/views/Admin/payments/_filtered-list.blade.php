<table class="table table-secondary">
    <thead class="">
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Customer</th>
            <th>Account</th>
            <th class="text-right">Amount</th>
            <th class="text-right">Option</th>
        </tr>
    </thead>
    <tbody>

        @php
        $total = 0;
        @endphp

        @foreach ($all_payments as $payments)

        @php
        $payment_id = $payments->payment_id;
        @endphp
        <tr>
            <td><?php echo $i++; ?></td>
            <td>{{ $payments->payment_date }}</td>
            <td>{{ $payments->customer->name }}</td>
            <td>{{ $payments->account->account_name }}<!--- Payment Account Name --> </td>
            <td class="text-right">{{ number_format($payments->amount_paid,2) }}</td>
            <td class="text-right">

                <a class="receipt mr-3" id="{{ $payments->payment_id }}" style="text-decoration: none;">
                    <i class=" fas fa-print text-primary"></i>
                </a>

                <!-- Only show to admins -->

                <a href="{{ route('payment.edit', $payment_id) }}" class="" style="text-decoration: none;">
                    <i class=" fas fa-pen text-purple mr-3"></i>
                </a>

                <a href="#" class="delete" style="text-decoration: none;" data-url="{{ route('payment.delete', $payments->payment_id) }}">
                    <i class=" fas fa-trash-alt text-danger "></i>
                </a>






            </td>
        </tr>

        @php
        $total += $payments->amount_paid;
        @endphp

        @endforeach

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-right Axiforma fs-18px fw-500">{{ number_format($total,2) }}</td>
            <td></td>
        </tr>


    </tbody>
</table>
