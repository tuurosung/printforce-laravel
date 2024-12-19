<div class="card border-0">
    <div class="card-body">

        <h5 class="h4">Expenses</h5>
        <hr class="mb-5">

        <table class="table datatables table-sm">
            <thead class="">
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Header</th>
                    <th>Description</th>
                    <th>Account</th>
                    <th class="text-end">Amount</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = 1;
                $total = 0;
                @endphp

                @foreach ($operatingAccount->expenditure as $expenditure)

                @php
                $expenditure_id = $expenditure->expenditure_id
                @endphp

                <tr class="">
                    <td>{{ $i++ }}</td>
                    <td>{{ $expenditure->date }}</td>
                    <td>{{ $expenditure->header?->header_name }}</td>
                    <td>
                        {{ $expenditure->description }}
                    </td>
                    <td>{{ $expenditure->account->account_name }}</td>
                    <td class="text-end pe-20px">{{ number_format($expenditure->amount,2) }}</td>
                    <td class="text-end col-2">

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
                                    data-url="{{ route('edit-expense', $expenditure_id) }}"
                                    class="me-3 dropdown-item edit_expense">

                                    <i class="fas fa-pen text-primary me-3"></i>
                                    Edit

                                </a>

                                <form id="deleteFrm" method="POST" action="{{ route('delete-expense', $expenditure->expenditure_id) }}">
                                    @csrf
                                    <a
                                        href="#"
                                        class="delete_expense dropdown-item"
                                        data-url="">

                                        <i class="fas fa-trash-alt text-danger me-3"></i>
                                        Delete

                                    </a>
                                </form>
                            </div>
                        </div>



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
                    <td class="text-end Axiforma fs-20px fw-600 pe-20px">
                        {{ number_format($total,2) }}
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>

    </div>
</div>
