<table class="table table-sm">
    <thead class="">
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Customer</th>
            <th>Account</th>
            <th class="text-end">Amount</th>
            <th class="text-end">Option</th>
        </tr>
    </thead>
    <tbody>

        @php
        $i = 1;
        $total = 0;
        @endphp

        @foreach ($filteredList as $payment)

        @php
        $payment_id = $payment->payment_id;
        @endphp
        <tr>
            <td><?php echo $i++; ?></td>
            <td>{{ $payment->payment_date ?? $payment->created_at }}</td>
            <td>{{ $payment->customer->name }}</td>
            <td>{{ $payment->account->account_name }}<!--- Payment Account Name --> </td>
            <td class="text-end">{{ number_format($payment->amount_paid,2) }}</td>
            <td class="text-end">

                <div class="dropdown">
                    <a
                        class=""
                        type="button"
                        id="deleteTrigger"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        Options
                    </a>
                    <div class="dropdown-menu" aria-labelledby="deleteTrigger">

                        <a
                            class="dropdown-item receipt"
                            id="{{ $payment->payment_id }}">

                            <i class="fas fa-print text-primary me-3"></i>
                            Print Receipt
                        </a>

                        <a
                            href="{{ route('edit.payment', $payment) }}"
                            class="dropdown-item">
                            <i class=" fas fa-pen text-primary me-3"></i>
                            Edit Payment
                        </a>
                        <form id="deleteFrm" method="POST" action="{{ route('delete.payment', $payment) }}">
                            @csrf
                            <a
                                href="#"
                                class="dropdown-item delete_payment">

                                <i class=" fas fa-trash-alt text-danger me-3"></i>
                                Delete Payment
                            </a>
                        </form>

                    </div>
                </div>

            </td>
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
            <td></td>
        </tr>


    </tbody>
</table>
