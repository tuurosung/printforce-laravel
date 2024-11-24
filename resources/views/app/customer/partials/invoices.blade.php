<h4 class="Axiforma mb-3">Invoices</h4>

<table class="table table-secondary ">
    <thead class="">
        <tr>
            <th>#</th>
            <th>Invoice ID</th>
            <th>Customer Name</th>
            <th>P.O. #</th>
            <th class="text-right">Sub-Total</th>
            <th class="text-right">Taxes</th>
            <th class="text-right">Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        @foreach ($customer->invoices as $invoices)



        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $invoices['invoice_id']; ?></td>
            <td><?php echo $customer->name; ?></td>
            <td><?php echo $invoices['ref']; ?></td>
            <td class="text-right"><?php echo $invoices['sub_total']; ?></td>
            <td class="text-right"><?php echo number_format($invoices['vat_amount'] + $invoices['nhil_amount'] + $invoices['getfund_amount'], 2); ?></td>
            <td class="text-right"><?php echo $invoices['total']; ?></td>
            <td class="text-right">
                <div class="dropdown open">
                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Option
                    </button>
                    <div class="dropdown-menu b-0 p-0" aria-labelledby="dropdownMenu1">
                        <ul class="list-group">
                            <a class="list-group-item" href="invoice_prepare.php?invoice_id=<?php echo $invoices['invoice_id']; ?>">Edit</li>
                                <a class="list-group-item" href="customer_portal.php?customer_id=<?php echo $customers['customer_id']; ?>">Portal</a>
                        </ul>
                    </div>
                </div>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>
