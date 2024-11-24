<table class="table table-secondary datatables">
    <thead class="font-weight-bold">
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Source</th>
            <th>Destination</th>
            <th>Notes</th>
            <th class="text-right">Amount</th>
            <th class="text-right">Options</th>
        </tr>
    </thead>
    <tbody>
        @php
            $total = 0;
        @endphp

        @foreach ($all_transfers as $transfer)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $transfer->date }}</td>
            <td>{{ $transfer->sourceAccount->account_name }}</td>
            <td>{{ $transfer->destinationAccount->account_name }}</td>
            <td>{{ $transfer->notes }}</td>
            <td class="text-right">{{ number_format($transfer->amount,2) }}</td>
            <td class="text-right">

                <a href="edit-transfer.php?transfer_id=<?php //echo $transfers['transfer_id'];
                                                        ?>" class="mr-3 text-decoration-none">
                    <i class="fas fa-pen text-primary "></i>
                </a>

                <a href="#" class="text-decoration-none delete" data-url="transfer-controller/delete-transfer.php?sn=<?php //echo $transfers['sn'];
                                                                                                                        ?>">
                    <i class="fas fa-trash-alt text-danger"></i>
                </a>


            </td>
        </tr>
        @php
        $total += $transfer->amount;
        @endphp

        @endforeach

        <tr>
            <td>-------</td>
            <td>-------</td>
            <td>-------</td>
            <td>-------</td>
            <td>-------</td>
            <td class="fs-18px fw-600 Axiforma text-right">{{ number_format($total,2) }}</td>
            <td></td>
        </tr>
    </tbody>
</table>
