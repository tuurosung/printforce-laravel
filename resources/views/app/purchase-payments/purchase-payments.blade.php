@extends('layout.app')


@section('content')

<x-headers.page-header pageTitle="Purchase Payments">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_payment_modal">

        <i class="fi fi-rr-wallet fa-google-wallet me-3"></i>
        Make Payment
    </button>
</x-headers.page-header>


<div class="card border-0">
    <div class="card-body">
        <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">

            <div class="p-4 flex items-center justify-between space-x-4">
                <label for="input-group-1" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <i class="fi fi-rr-search"></i>
                    </div>
                    <!-- <input type="text" id="input-group-1"
                            class="block w-full max-w-96 ps-9 pe-3 py-2 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body"
                            placeholder="Search"> -->
                    <form action="{{ route('customers.filter') }}" id="searchCustomersFrm">
                        @csrf
                        <input type="text" name="search_term" id="searchCustomer" class="block w-full max-w-96 ps-9 pe-3 py-2 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body" value=""
                            placeholder="name or phone number">
                    </form>
                </div>
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                    class="shrink-0 inline-flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-3 py-2 focus:outline-none"
                    type="button">

                    <i class="fi fi-rr-filter text-sm me-2 -ms-0.5"></i>
                    Filter by
                    <i class="fi fi-rr-angle-down text-xs w-4 h-4 ms-1.5 -me-0.5"></i>

                </button>
                <!-- Dropdown menu -->
                <div id="dropdown" class="z-10 hidden bg-white border border-default-medium rounded-base shadow-lg w-32">
                    <ul class="p-2 text-sm text-body font-medium" aria-labelledby="dropdownDefaultButton">

                        <li>
                            <a href="#" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">
                                Category
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

            <table class="table w-full text-sm text-left rtl:text-right text-body">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Supplier Name</th>
                        <th scope="col">Account</th>
                        <th scope="col" class="text-end">Amount Paid</th>
                        <th class="text-end">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $payment)
                    <tr class="">
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $payment->date }}</td>
                        <td>{{ $payment->supplier->supplier_name }}</td>
                        <td>{{ $payment->paymentAccount->account_name }}</td>
                        <td class="text-end">{{ number_format($payment->amount_paid, 2) }}</td>
                        <td class="text-end">
                            <div class="hs-dropdown relative inline-flex">
                                <button id="hs-dropdown-default" type="button" class="hs-dropdown-toggle">
                                    <span class="leading-tight">Actions</span>
                                    <i class="fi fi-rr-angle-small-down text-base leading-tight font-medium hs-dropdown-open:rotate-180"></i>
                                </button>
                                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-md p-2 mt-2 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full z-10" aria-labelledby="hs-dropdown-default">
                                    <x-dropdowns.dropdown-item href="#" label="Edit" icon="edit" iconColour="blue-600" data-url="{{ route('purchase-payment.edit', $payment) }}" />
                                    <form method="POST" action="{{ route('purchase-payment.destroy', $payment) }}" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <x-dropdowns.dropdown-item href="#" label="Delete" icon="trash" iconColour="danger" />
                                    </form>
                                </div>
                            </div>

                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>

    </div>
</div>


<div id="modal_holder"></div>

@endsection


@section('js')

<script>
    $(document).on('click', '.table tbody .edit', function() {

        const url = $(this).data('url');

        $.get(url, function(response) {
            $('#modal_holder').html(response);
            $('#edit_payment_modal').modal('show');
            initializeSelect2()
            initializeDatepickers()
        })
    });


    $(document).on('click', '.table tbody .delete', function() {

        $form = $(this).closest('form');

        bootbox.confirm("Are you sure you want to delete this payment?", function(result) {
            if (result) {
                $form.submit();
            }
        })
    });
</script>
@endsection
