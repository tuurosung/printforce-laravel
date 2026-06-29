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

<x-tabs.tab>
    <x-slot name="tabs">
        <x-tabs.tab-item id="dashboard-tab" label="Dashboard" :active="true" controls="dashboard-content" />
        <x-tabs.tab-item id="invoices-tab" label="Invoices" :active="false" controls="invoices-content" />
        <x-tabs.tab-item id="payments-tab" label="Payments" :active="false" controls="payments-content" />
    </x-slot>
    <x-slot name="content">

        <x-tabs.tab-content
            id="dashboard-content"
            labelledby="dashboard-tab"
            :active="true">

        </x-tabs.tab-content>


        <x-tabs.tab-content
            id="invoices-content"
            labelledby="invoices-tab"
            :active="false">

            @include('app.suppliers.partials.purchase-invoices')

        </x-tabs.tab-content>


        <x-tabs.tab-content
            id="payments-content"
            labelledby="payments-tab"
            :active="false">

            @include('app.suppliers.partials.purchase-payments')

        </x-tabs.tab-content>

    </x-slot>
</x-tabs.tab>

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
        
    });
</script>
@endsection
