<div class="card border-0">
    <div class="card-body">

        <h5 class="h4">Transactions</h5>
        <hr class="mb-4">

        <div class="d-flex mb-5">
            <div class="w-200px me-2">

                <div class="mb-3">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input
                        type="text"
                        class="form-control form-control-sm"
                        name="start_date"
                        id="start_date"
                        value="{{ now()->format('Y-m-d') }}"
                        required />
                </div>

            </div>

            <div class="w-200px me-2">

                <div class="mb-3">
                    <label for="end_date" class="form-label">End Date</label>
                    <input
                        type="text"
                        class="form-control form-control-sm"
                        name="end_date"
                        id="end_date"
                        value="{{ now()->format('Y-m-d') }}"
                        required />
                </div>
            </div>
            <div class="w-200px me-2" style="padding-top: 28px;">

                <button
                    type="button"
                    class="btn btn-primary">
                    Generate Report
                </button>

            </div>
            <div class="w-200px me-2"></div>
        </div>


        <table class="table table-sm">
            <thead class="font-weight-bold">
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Trans. ID</th>
                    <th>Narration</th>
                    <th>Description</th>
                    <th class="text-end">Debit</th>
                    <th class="text-end">Credit</th>
                    <th class="text-end">Balance</th>

                </tr>
            </thead>
            <tbody>

                @php
                $i = 1;
                $credit = 0;
                $debit = 0;
                $balance = 0;
                @endphp

                @foreach ($operatingAccount->addedFunds as $added_funds)
                $balance += $added_funds->amount;
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $added_funds->date }}</td>
                    <td>{{ $added_funds->transaction_id }}</td>
                    <td class="pl-3">Balance Before Transactions</td>
                    <td>Opening Balance</td>
                    <td class="text-end">{{ number_format($added_funds->amount, 2) }}</td>
                    <td class="text-end">{{ number_format($added_funds->amount, 2) }}</td>
                    <td class="text-end font-weight-bold">{{ number_format($balance, 2) }}</td>

                </tr>
                @endforeach


                @foreach ($operatingAccount->account_history as $accountHistory)

                @php
                $accountHistory['transaction_type'] == 'credit' ? $balance += $accountHistory['amount'] : $balance -= $accountHistory['amount'];
                @endphp

                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $accountHistory['date']; ?></td>
                    <td>{{ $accountHistory['transaction_id']  }}</td>
                    <td class="pl-3">
                        {{ $accountHistory['description'] }}
                    </td>
                    <td><?php echo $accountHistory['type']; ?></td>
                    <td class="text-end">
                        {{ $accountHistory['transaction_type'] === 'debit' ? number_format($accountHistory['amount'], 2) : '' }}
                    </td>
                    <td class="text-end">
                        {{ $accountHistory['transaction_type'] === 'credit' ? number_format($accountHistory['amount'], 2) : '' }}
                    </td>

                    <td class="text-end font-weight-bold">
                        {{ number_format($balance, 2) }}
                    </td>


                </tr>

                @php
                $debit += $accountHistory['transaction_type'] === 'debit' ? $accountHistory['amount'] : 0;
                $credit += $accountHistory['transaction_type'] === 'credit' ? $accountHistory['amount'] : 0;
                @endphp
                @endforeach

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class=" text-end fs-18px Axiforma fw-600">{{ number_format($debit, 2) }}</td>
                    <td class=" text-end fs-18px Axiforma fw-600">{{ number_format($credit, 2) }}</td>
                    <td class=" text-end fs-18px Axiforma fw-600">{{ number_format($balance, 2) }}</td>
                    <td></td>
                </tr>



            </tbody>
        </table>

    </div>
</div>
