<div class="tab-pane fade" id="invoices">

    <h4 class="mb-5">Invoices</h4>

    <table class="table table-sm w-full">
        <thead class="">
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Date Issued</th>
                <th>Due Date</th>
                <th class="text-end">Supply Cost</th>
                <th class="text-end">Tax Amount</th>
                <th class="text-end">Transportation</th>
                <th class="text-end">Grand Total</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($supplier->purchases as $purchase)
                <tr>

                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>
                        <a href="{{ route('purchases.prepare-invoice', $purchase) }}">
                            {{ $purchase->purchase_id }}
                        </a>
                    </td>
                    <td>{{ $purchase->date_issued }}</td>
                    <td>{{ $purchase->due_date }}</td>
                    <td class="text-end pe-20px">{{ number_format($purchase->supply_cost, 2) }}</td>
                    <td class="text-end pe-20px">{{ number_format($purchase->total_tax, 2) }}</td>
                    <td class="text-end pe-20px">{{ number_format($purchase->transportation, 2) }}</td>
                    <td class="text-end pe-20px">{{ number_format($purchase->purchase_total, 2) }}</td>

                </tr>
            @endforeach


        </tbody>
    </table>
</div>
