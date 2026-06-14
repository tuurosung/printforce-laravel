@extends('layout.app')

@section('content')

    <x-headers.page-header pageTitle="Debtors List" currentPage="Debtors">
        <button type="button" class="btn btn-primary" id="printBtn">
            <i class="fi fi-rr-print me-3"></i>
            Print Report
        </button>
    </x-headers.page-header>



    @can('administrator')
    <div class="grid grid-cols-12 gap-6 mb-8">
        <div class="lg:col-span-3 md:col-span-3 sm:col-span-12 col-span-12">

            <x-printforce.cards.colour-card title="Debtors" :value="$debtors->count()" bgColour="primary"
                valueType="count" />

        </div>
        <div class="lg:col-span-3 md:col-span-3 sm:col-span-12 col-span-12">

            <x-printforce.cards.colour-card title="Debt Amount" :value="$debtors->sum('debit') - $debtors->sum('credit')"
                bgColour="danger" valueType="money" />
        </div>
    </div>
    @endcan



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
                            <input type="text" name="search_term" id="searchCustomer"
                                class="block w-full max-w-96 ps-9 pe-3 py-2 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body"
                                value="" placeholder="name or phone number">
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
                    <div id="dropdown"
                        class="z-10 hidden bg-white border border-default-medium rounded-base shadow-lg w-32">
                        <ul class="p-2 text-sm text-body font-medium" aria-labelledby="dropdownDefaultButton">

                            <li>
                                <a href="#"
                                    class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">
                                    Category
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>


                <table class="table w-full text-sm text-left rtl:text-right text-body">
                    <thead class="thead">
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th class="text-end">Debit</th>
                            <th class="text-end">Credit</th>
                            <th class="text-end">Balance</th>
                        </tr>
                    </thead>
                    <tbody class="tbody">

                        @foreach ($debtors as $debtor)
                            <tr class="bg-neutral-primary-soft text-dark border-b border-default hover:bg-neutral-secondary-medium">
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ route('customers.customer.info', $debtor->customer_id) }}">
                                            {{ $debtor->name }}
                                        </a>
                                    </td>
                                    <td class="text-end pe-20px">{{ number_format($debtor->debit, 2) }}</td>
                                    <td class="text-end  pe-20px">{{ number_format($debtor->credit, 2) }}</td>
                                    <td class="text-end  pe-20px">{{ number_format($debtor->debit - $debtor->credit, 2) }}</td>
                                </tr>
                        @endforeach


                    </tbody>
                    <tfoot class="">
                        <tr>
                            <td class="px-6 py-4 font-medium text-dark whitespace-nowrap">#</td>
                            <td>Customer</td>
                            <td class="text-end">Debit</td>
                            <td class="text-end">Credit</td>
                            <td class="text-end">{{ $debtors->sum('balance') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection


@section('js')

<script>
$(document).ready(function() {
    $('#printBtn').click(function(e) {
        e.preventDefault();
        window.open("{{ route('customers.debtors.print') }}", '_blank',
            'height = 900, width = 800, scrollbars = yes');
    });
});
</script>t
@endsection
