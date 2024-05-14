<table class="table datatables table-secondary">
    <thead class="">
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Header</th>
            <th>Description</th>
            <th>Account</th>
            <th class="text-right">Amount</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php
        $total = 0;
        @endphp

        @foreach ($all_expenses as $expenditure)
        <tr class="">
            <td>{{ $i++ }}</td>
            <td>{{ $expenditure->date }}</td>
            <td>{{ $expenditure->headers->header_name }}</td>
            <td>
                {{ $expenditure->description }}
            </td>
            <td>{{ $expenditure->account->account_name }}</td>
            <td class="text-right">{{ number_format($expenditure->amount,2) }}</td>
            <td class="text-right col-2">

                <a href="{{ route('edit.expenditure', $expenditure->expenditure_id) }}" class="mr-3 text-decoration-none">
                    <i class="fas fa-pen text-primary"></i>
                </a>

                <a href="#" class="delete" data-url="expenditure-controller/delete.php?sn=<?php //echo $rows['sn'];
                                                                                            ?>">
                    <i class="fas fa-trash-alt text-danger"></i>
                </a>

            </td>
        </tr>

        @php
        $total += $expenditure->amount; //increment total by amount
        @endphp

        @endforeach

        <tr>
            <td>-----------</td>
            <td>-----------</td>
            <td>-----------</td>
            <td>-----------</td>
            <td>-----------</td>
            <td class="text-right Axiforma fs-20px fw-600">
                {{ number_format($total,2) }}
            </td>
            <td></td>
        </tr>
    </tbody>
</table>
