@extends('layout.app')

@section('content')

<x-headers.page-header pageTitle="Supplier Information" currentPage="Supplier Information">
    <button type="button" class="btn btn-primary" data-hs-overlay="#new-purchase-modal">

        <i class="fas fa-plus me-3  "></i>
        New Supply
    </button>

    <button type="button" class="btn btn-primary" data-hs-overlay="#new_payment_modal">

        <i class="fab fa-google-wallet me-3  "></i>
        Make Payment
    </button>
</x-headers.page-header>





@include('layout.errors')

<div class="grid grid-cols-12 gap-6 mb-8">
    <div class="lg:col-span-3 md:col-span-3 sm:col-span-12 col-span-12">
        <x-printforce.cards.colour-card title="Total Purchases" bgColour="primary" :value="$supplier->total_purchase" />
    </div>
    <div class="lg:col-span-3 md:col-span-3 sm:col-span-12 col-span-12">
        <x-printforce.cards.colour-card title="Total Payments" bgColour="warning" :value="$supplier->total_payment" />
    </div>
    <div class="lg:col-span-3 md:col-span-3 sm:col-span-12 col-span-12">
        <x-printforce.cards.colour-card title="Balance" bgColour="success" :value="$supplier->supplier_balance" />
    </div>
    <div class="lg:col-span-3 md:col-span-3 sm:col-span-12 col-span-12">
        <x-printforce.cards.colour-card title="Purchases" bgColour="pink" :value="$supplier->number_of_invoices"
            valueType="count" />
    </div>
</div>

<div class="card mb-5">
    <div class="card-body">

        <div class="flex">
            <div
                class="flex bg-gray-100 hover:bg-gray-200 rounded-md transition p-1 dark:bg-gray-700 dark:hover:bg-gray-600">
                <nav class="flex space-x-2 " aria-label="Tabs" role="tablist">

                    <x-tabs.tab-item id="dashboard-tab" label="Dashboard" icon="paper-plane"
                        dataHsTab="dashboard-content" :ariaSelected="true" />
                    <x-tabs.tab-item id="invoices-tab" label="Invoices" icon="file-invoice-dollar"
                        dataHsTab="invoices-content" :ariaSelected="false" />
                    <x-tabs.tab-item label="Payments" icon="sack-dollar" dataHsTab="payments-content"
                        :ariaSelected="false" />

                </nav>
            </div>
        </div>

        <div class="mt-3">
            <div id="dashboard-content" role="tabpanel" aria-labelledby="dashboard-tab" class="pt-5">
                @include('app.suppliers.partials.dashboard')
            </div>
            <div id="invoices-content" role="tabpanel" aria-labelledby="invoices-tab" class="pt-5 hidden">
                @include('app.suppliers.partials.purchase-invoices')
            </div>
            <div id="payments-content" role="tabpanel" aria-labelledby="payments-tab" class="pt-5 hidden">
                @include('app.suppliers.partials.purchase-payments')
            </div>
        </div>

    </div>
</div>





@include('app.suppliers.modals.create-new-purchase')
@include('app.suppliers.modals.new-purchase-payment')

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
