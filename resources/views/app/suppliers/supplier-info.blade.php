@extends('layout.app')

@section('content')


@include('layout.errors')

<ul class="nav nav-pills mb-3" id="pills-tab">
    <li class="nav-item">
        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-dashboard">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-invoices">Invoices</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-payments">Payments</a>
    </li>
    <div class="ms-auto">
        <button
            type="button"
            class="btn btn-primary"
            data-toggle="modal"
            data-target="#new_purchase_modal">

            <i class="fas fa-plus me-3  "></i>
            New Supply
        </button>

        <button
            type="button"
            class="btn btn-primary"
            data-toggle="modal"
            data-target="#new_payment_modal">

            <i class="fab fa-google-wallet me-3  "></i>
            Make Payment
        </button>
    </div>
</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-dashboard">

        <div class="card border-0">
            <div class="card-body">

                <div class="card border-0 mb-5">
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="mb-2">Supplier Name</p>
                                <h3 class="h3 mb-0">{{ $supplier->supplier_name }}</h3>
                            </div>
                            <div>

                            </div>
                        </div>



                        <hr class="">

                        <div class="d-flex">
                            <div class="w-25 me-4">
                                Phone Number
                                <h4 class="h5">{{ $supplier->supplier_phone }}</h4>
                            </div>
                            <div class="w-20">
                                Address
                                <h4 class="h5">{{ $supplier->supplier_address }}</h4>
                            </div>
                            <div></div>
                        </div>


                    </div>
                </div>

                <div class="row mb-3">

                    <div class="col-md-2">

                        <div class="card border-primary border-1">
                            <div class="card-body">

                                <p class="mb-2">Total Purchases</p>
                                <h4 class="h4 mb-0">GHS {{ number_format($supplier->totalPurchase(),2) }}</h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="card border-danger">
                            <div class="card-body">

                                <p class="mb-2">Total Payment</p>
                                <h4 class="h4 mb-0">GHS {{ number_format($supplier->totalPayment(),2) }}</h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">

                        <div class="card border-1 border-success">
                            <div class="card-body">

                                <p class="mb-2">Outstanding Balance</p>
                                <h4 class="h4 mb-0">GHS {{ number_format($supplier->supplierBalance(),2) }}</h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">

                        <div class="card">
                            <div class="card-body">

                                <p class="mb-2">Total Invoices</p>
                                <h4 class="h4 mb-0">{{ $supplier->countInvoices() }}</h4>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
    <div class="tab-pane fade" id="pills-invoices">

        <div class="card border-0">
            <div class="card-body">

                <h4 class="mb-5">Invoices</h4>

                <table class="table table-sm datatables">
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
                        @foreach ($purchases as $purchase)
                        <tr>

                            <td scope="row"><?php echo $i++; ?></td>
                            <td>
                                <a href="{{ route('prepare-invoice', $purchase->purchase_id) }}">
                                    {{ $purchase->purchase_id }}
                                </a>
                            </td>
                            <td>{{ $purchase->date_issued }}</td>
                            <td>{{ $purchase->due_date }}</td>
                            <td class="text-end pe-20px">{{ number_format($purchase->supply_cost,2) }}</td>
                            <td class="text-end pe-20px">{{ number_format($purchase->total_tax,2) }}</td>
                            <td class="text-end pe-20px">{{ number_format($purchase->transportation,2) }}</td>
                            <td class="text-end pe-20px">{{ number_format($purchase->purchase_total,2) }}</td>

                        </tr>
                        @endforeach


                    </tbody>
                </table>

            </div>
        </div>

    </div>
    <div class="tab-pane fade" id="pills-payments">

        <div class="card border-0">
            <div class="card-body">

                <h4 class="mb-5">Payments</h4>

                <table class="table table-sm datatables">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Payment #</th>
                            <th scope="col">Date</th>
                            <th scope="col">Payment Account</th>
                            <th scope="col">Reference</th>
                            <th scope="col" class="text-end">Amount Paid</th>
                            <th scope="col" class="text-end">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($payments as $payment)
                        <tr>
                            <td scope="row">{{ $i++ }}</td>
                            <td>{{ $payment->payment_id }}</td>
                            <td>{{ $payment->date }}</td>
                            <td>{{ $payment->paymentAccount->account_name }}</td>
                            <td>{{ $payment->reference }}</td>
                            <td class="text-end pe-20px">{{ number_format($payment->amount_paid,2) }}</td>
                            <td class="text-end pe-20px">
                                <a
                                    class="me-3 text-primary"
                                    href="{{ route('edit-supplier', $supplier->supplier_id) }}">

                                    <i class="fas fa-pen me-2"></i>
                                    Edit
                                </a>
                                <a
                                    href="#"
                                    class="text-danger delete"
                                    data-url="">
                                    <i class="fas fa-trash-alt text-danger me-2"></i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>



    </div>
</div>

@include('app.suppliers.modals.create-new-purchase')
@include('app.suppliers.modals.create-new-supplyPayment')

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
