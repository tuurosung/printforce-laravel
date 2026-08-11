@extends('layout.app')

@section('content')

<x-headers.page-header pageTitle="Customers" currentPage="Customers">
    <button onclick="Livewire.dispatch('new-customer')" class="btn btn-primary">
        New Customer
    </button>

</x-headers.page-header>


@can('administrator')

<div class="grid grid-cols-12 gap-6 mb-6">
    <div class="lg:col-span-3 md:col-span-3 sm:col-span-12 col-span-12">
        <x-printforce.cards.colour-card bgColour="primary" :value="$statistics->newCustomers" title="New Customers" valueType="number" />
    </div>
    <div class="lg:col-span-3 md:col-span-3 sm:col-span-12 col-span-12">
        <x-printforce.cards.colour-card bgColour="danger" :value="$statistics->totalCustomers" title="All Customers" valueType="number" />
    </div>
    <div class="lg:col-span-3 md:col-span-3 sm:col-span-12 col-span-12">
        <x-printforce.cards.colour-card bgColour="success" :value="0" title="Active Customers" valueType="number" />
    </div>
    <div class="lg:col-span-3 md:col-span-3 sm:col-span-12 col-span-12">
        <x-printforce.cards.colour-card bgColour="warning" :value="0" title="Dormant Customers" valueType="number" />
    </div>
</div>

@endcan


@include('layout.errors')

<div class="card border-0">
    <div class="card-body">

        @livewire('livewire.customers.customer-list')

    </div>
</div>


@livewire('livewire.customers.customer-modal')

<div id="modal_holder"></div>

@endsection

@section('js')


@endsection
