@extends('layout.app')

@section('content')

<div class="d-flex justify-content-between mb-4">
    <div>
        <h3 class="montserrat fw-700 fs-30px">Supplier Information</h3>
    </div>
    <div>
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#new_purchase_modal">New Supply</button>
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#new_payment_modal">Make Payment</button>
    </div>
</div>

@include('layout.errors')
<div class="card mb-3">
    <div class="card-body">
        <div class="d-flex">
            <div class="w-25 mr-3">
                Supplier Name
                <h4 class="Axiforma font-weight-bold fs-18px">{{ $supplier->supplier_name }}</h4>
            </div>
            <div class="w-25 mr-4">
                Phone Number
                <h4 class="fs-18px">{{ $supplier->supplier_phone }}</h4>
            </div>
            <div class="w-20">
                Address
                <h4 class="fs-18px">{{ $supplier->supplier_address }}</h4>
            </div>
            <div></div>
        </div>


    </div>
</div>


<div class="row mb-3">

    <div class="col-2">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-2 d-flex justify-content-center align-items-center">
                        <i class="fas fa-equals fa-2x text-primary"></i>
                    </div>

                    <div class="col-10">
                        <p class="fw-600 fs-18px Axiforma">GHS {{ number_format($supplier->totalPurchase(),2) }}</p>
                        <p>Total Supply</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-2 d-flex justify-content-center align-items-center">
                        <i class="fas fa-coins fa-2x text-primary"></i>
                    </div>

                    <div class="col-10">
                        <p class="fw-600 fs-18px Axiforma">GHS {{ number_format($supplier->totalPayment(),2) }}</p>
                        <p>Payment made</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-2 d-flex justify-content-center align-items-center">
                        <i class="fas fa-chart-line fa-2x text-purple"></i>
                    </div>

                    <div class="col-10">
                        <p class="fw-600 fs-18px Axiforma">GHS {{ number_format($supplier->supplierBalance(),2) }}</p>
                        <p>Balance</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-2 d-flex justify-content-center align-items-center">
                        <i class="fas fa-file-invoice fa-2x text-warning"></i>
                    </div>

                    <div class="col-10">
                        <p class="fw-600 fs-18px Axiforma">{{ $supplier->countInvoices() }}</p>
                        <p>Number Of Invoices</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>


<div class="card">
    <ul class="nav nav-tabs nav-tabs-v2 ps-4 pe-4">
        <li class="nav-item me-3"><a href="#invoices" class="nav-link active" data-bs-toggle="tab">Invoices</a></li>
        <li class="nav-item me-3"><a href="#payments" class="nav-link" data-bs-toggle="tab">Payments</a></li>
    </ul>
    <div class="tab-content p-4">
        <div class="tab-pane fade show active" id="invoices">

            <h5 class="">Invoices</h5>

            <table class="table table-secondary">
                <thead class="">
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Date Issued</th>
                        <th>Due Date</th>
                        <th class="text-right">Supply Cost</th>
                        <th class="text-right">Tax Amount</th>
                        <th class="text-right">Transportation</th>
                        <th class="text-right">Grand Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchases as $purchase)
                    <tr>

                        <td scope="row"><?php echo $i++; ?></td>
                        <td>{{ $purchase->purchase_id }}</td>
                        <td>{{ $purchase->date_issued }}</td>
                        <td>{{ $purchase->due_date }}</td>
                        <td class="text-right">{{ number_format($purchase->supply_cost,2) }}</td>
                        <td class="text-right">{{ number_format($purchase->total_tax,2) }}</td>
                        <td class="text-right">{{ number_format($purchase->transportation,2) }}</td>
                        <td class="text-right">{{ number_format($purchase->purchase_total,2) }}</td>

                        <td></td>
                    </tr>
                    @endforeach


                </tbody>
            </table>

        </div>
        <div class="tab-pane fade" id="payments">

            <h5 class="">Payments</h5>

            <table class="table table-secondary">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Payment #</th>
                        <th scope="col">Date</th>
                        <th scope="col">Payment Account</th>
                        <th scope="col">Reference</th>
                        <th scope="col" class="text-right">Amount Paid</th>
                        <th scope="col" class="text-right">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($payments as $payment)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $payment->payment_id }}</td>
                        <td>{{ $payment->date }}</td>
                        <td>{{ $payment->paymentAccount->account_name }}</td>
                        <td>{{ $payment->reference }}</td>
                        <td class="text-right">{{ number_format($payment->amount_paid,2) }}</td>
                        <td class="text-right">
                            <a href="{{ route('edit.supplier', $supplier->supplier_id) }}" style="text-decoration:none;" class="mr-3">
                                <i class="fas fa-pen text-primary"></i>
                            </a>
                            <a href="#" class="delete" data-url="">
                                <i class="fas fa-trash-alt text-danger"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>


        </div>
    </div>
</div>




<!-- New Purchase Modal -->
<div class="modal fade" id="new_purchase_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Purchase Invoice</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="" autocomplete="off" method="POST" action="{{ route('create.purchase') }}">
                @csrf
                <div class="modal-body">

                    <div class="form-group d-none">
                        <label for="">Supplier ID</label>
                        <input type="text" class="form-control" name="supplier_id" id="supplier_id" value="{{ $supplier->supplier_id }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Reference</label>
                        <input type="text" name="reference" id="reference" class="form-control" placeholder="AM/5209">
                    </div>

                    <div class="row">

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Date Issued</label>
                                <input type="text" name="date_issued" id="date_issued" class="form-control" placeholder="2023-02-09" value="{{ $today }}" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Due Date</label>
                                <input type="text" name="due_date" id="due_date" class="form-control" placeholder="2023-02-09" value="{{ $suggested_due_date }}" required>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="">Footnotes</label>
                        <textarea class="form-control" rows="2" cols="2" name="notes" id="notes" placeholder="Stock For July"></textarea>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-check mr-3"></i> Create Invoice</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- New Payment Modal -->
<div class="modal fade" id="new_payment_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="" autocomplete="off" action="{{ route('create.purchase.payment') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <input class="form-control d-none" type="text" name="supplier_id" value="{{ $supplier->supplier_id }}">

                    <div class="form-group d-none">
                        <label for="">Supplier ID</label>
                        <input type="text" class="form-control" name="supplier_id" id="supplier_id" value="{{ $supplier->supplier_id }}" readonly>
                    </div>

                    <div class="row">

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Amount Paid</label>
                                <input type="text" class="form-control" name="amount_paid" id="amount_paid" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Cheque # / Reference</label>
                                <input type="text" class="form-control" name="reference" id="reference">
                            </div>
                        </div>

                    </div>



                    <div class="row">

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Payment Date</label>
                                <input type="text" class="form-control" name="date" id="date" value="{{ $today }}" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Account Number</label>
                                <select class="browser-default custom-select" name="account_number" id="account_number" required>
                                    <option value="">--- Select Account ---</option>

                                    @foreach ($operating_accounts as $account)
                                    <option value="{{ $account->account_number }}">{{ $account->account_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="">Notes</label>
                        <textarea rows="" cols="2" class="form-control" name="notes"></textarea>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-check mr-3  "></i> Record Payment</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    $(document).ready(function() {

        $('#date_issued, #due_date').datepicker();

        $('#date_issued, #due_date').on('changeDate', function() {
            $(this).datepicker('hide');
        })

        $('#new_payment_modal').on('shown.bs.modal', function() {
            setTimeout(function() {
                $('#amount_paid').focus();
            }, 300)
        })

        $('#qty').on('keyup', function(event) {
            event.preventDefault();
            var unit_cost = parseFloat($('#unit_cost').val())
            var qty = parseFloat($(this).val())
            $('#total_cost').val((unit_cost * qty).toFixed(2))
        });

        $('#newPurchaseFrm').on('submit', function(event) {
            event.preventDefault();

            $(this).submit(function(event) {
                return false;
            })

            $.ajax({
                url: '../serverscripts/admin/Suppliers/newPurchaseFrm.php',
                type: 'POST',
                data: $('#newPurchaseFrm').serialize(),
                success: function(msg) {
                    if (msg === 'save_successful') {
                        bootbox.alert("Purchase Recorded Successfully", function() {
                            window.location = 'prepareSupplierInvoice.php';
                        })
                    } else {
                        bootbox.alert(msg)
                    }
                }
            }) //end ajax

        });

        $('#newPaymentFrm').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: '../serverscripts/admin/Suppliers/newPaymentFrm.php',
                type: 'POST',
                data: $('#newPaymentFrm').serialize(),
                success: function(msg) {
                    if (msg === 'save_successful') {
                        bootbox.alert("Payment Recorded Successfully", function() {
                            window.location.reload()
                        })
                    } else {
                        bootbox.alert(msg)
                    }
                }
            })
        });

    });
</script>
@endsection
