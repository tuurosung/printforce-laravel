@extends('layout.app')

@section('content')

<x-printforce.headers.page-header title="Supplier Information">

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_purchase_modal">

        <i class="fas fa-plus me-3  "></i>
        New Supply
    </button>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_payment_modal">

        <i class="fab fa-google-wallet me-3  "></i>
        Make Payment
    </button>

</x-printforce.headers.page-header>



@include('layout.errors')

<div class="row mb-4">
    <div class="col-md-2">
        <x-printforce.cards.colour-card title="Total Purchases" bgColour="primary" :value="$supplier->total_purchase" />
    </div>
    <div class="col-md-2">
        <x-printforce.cards.colour-card title="Total Payments" bgColour="warning" :value="$supplier->total_payment" />
    </div>
    <div class="col-md-2">
        <x-printforce.cards.colour-card title="Balance" bgColour="success" :value="$supplier->supplier_balance" />
    </div>
    <div class="col-md-2">
        <x-printforce.cards.colour-card title="Purchases" bgColour="purple" :value="$supplier->number_of_invoices"
            valueType="count" />
    </div>
</div>

<!-- tab v2 with card -->
<div class="card border-0">
    <ul class="nav nav-tabs nav-tabs-v2 ps-4 pe-4">
        <li class="nav-item me-3"><a href="#dashboard" class="nav-link active" data-bs-toggle="tab">Dashboard</a>
        </li>
        <li class="nav-item me-3"><a href="#invoices" class="nav-link" data-bs-toggle="tab">Invoices</a></li>
        <li class="nav-item me-3"><a href="#payments" class="nav-link" data-bs-toggle="tab">Payments</a></li>
    </ul>
    <div class="tab-content p-4">

        <div class="tab-pane fade show active" id="dashboard">

            <div class="d-flex justify-content-between my-5">
                <div>
                    <p class="mb-0">Supplier Name</p>
                    <h1 class="h1 mb-3">{{ $supplier->supplier_name }}</h1>

                    <div class="d-flex gap-3">
                        <span class="border-end pe-3 fs-12px">
                            Phone Number
                            <p class="fs-12px text-capitalize mb-0">{{ $supplier->supplier_phone }}</p>
                        </span>
                        <span class="border-end pe-3 fs-12px">
                            Date Registered
                            <p class="fs-12px text-capitalize mb-0">{{ $supplier->created_at }}</p>
                        </span>
                        <span>
                            Address
                            <p class="fs-12px text-capitalize mb-0">{{ $supplier->supplier_address }}</p>
                        </span>
                    </div>

                </div>
                <div></div>
            </div>

        </div>

        <div class="tab-pane fade" id="invoices">

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

        <div class="tab-pane fade" id="payments">

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
                    @foreach ($supplier->payment as $payment)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $payment->payment_id }}</td>
                        <td>{{ $payment->date }}</td>
                        <td>{{ $payment->paymentAccount->account_name }}</td>
                        <td>{{ $payment->reference }}</td>
                        <td class="text-end pe-20px">{{ number_format($payment->amount_paid, 2) }}</td>
                        <td class="text-end pe-20px">
                            <a class="me-3 text-primary" href="{{ route('suppliers.edit', $supplier->supplier_id) }}">

                                <i class="fas fa-pen me-2"></i>
                                Edit
                            </a>
                            <a href="#" class="text-danger delete" data-url="">
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
