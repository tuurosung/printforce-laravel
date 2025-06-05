<table class="table table-sm datatables">
    <thead class="">
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Source</th>
            <th>Destination</th>
            <th>Notes</th>
            <th class="text-end">Amount</th>
            <th class="text-end">Options</th>
        </tr>
    </thead>
    <tbody>
        @php
        $i = 1;
        $total = 0;
        @endphp

        @foreach ($filteredTransfers as $transfer)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $transfer->date }}</td>
            <td>{{ $transfer->sourceAccount->account_name }}</td>
            <td>{{ $transfer->destinationAccount->account_name }}</td>
            <td>{{ $transfer->notes }}</td>
            <td class="text-right">{{ number_format($transfer->amount,2) }}</td>
            <td class="text-end">

                <div class="dropdown">
                    <a
                        class="dropdown-toggle"
                        type="button"
                        id="triggerId"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        Options
                    </a>
                    <div class="dropdown-menu" aria-labelledby="triggerId">
                        <a
                            data-url="{{ route('accounting.transfers.edit', $transfer) }}"
                            class="dropdown-item edit_transfer">

                            <i class="fas fa-pen text-primary me-3"></i>
                            Edit
                        </a>

                        <form method="POST" action="{{ route('accounting.transfers.delete', $transfer) }}">
                            @csrf
                            <a
                                href="#"
                                class="dropdown-item delete_transfer">

                                <i class="fas fa-trash-alt text-danger me-3"></i>
                                Delete
                            </a>
                        </form>
                    </div>
                </div>

            </td>
        </tr>
        @endforeach

    </tbody>
</table>
