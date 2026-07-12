@extends('layout.app')

@section('content')

    <x-headers.page-header pageTitle="Customers" currentPage="Customers">
        <button type="button" class="btn-md text-sm font-semibold rounded-md border cursor-pointer
                                border-transparent bg-primary text-white
                                hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none
                                dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
            data-hs-overlay="#hs-basic-modal">
            <i class="fi fi-br-plus me-3"></i>
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
                    <div id="dropdown"  class="z-10 hidden bg-white border border-default-medium rounded-base shadow-lg w-32">
                        <ul class="p-2 text-sm text-body font-medium" aria-labelledby="dropdownDefaultButton">

                            <li>
                                <a href="#"  class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">
                                    Category
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>

                <div id="data_holder">

                    <table class="table w-full text-sm text-left rtl:text-right text-body">
                        <thead
                            class="text-sm text-white bg-gray-700 border-b border-t border-default-medium">
                            <tr>
                                <th scope="col" class="">
                                    #
                                </th>
                                <th scope="col" class="">
                                    Date Created
                                </th>
                                <th scope="col" class="">
                                    Customer Name
                                </th>
                                <th scope="col" class="">
                                    Type
                                </th>
                                <th scope="col" class="">
                                    Phone
                                </th>
                                <th scope="col" class="text-end">
                                    Debit
                                </th>
                                <th scope="col" class="text-end">
                                    Credit
                                </th>
                                <th scope="col" class="text-end">
                                    Balance
                                </th>
                                <th scope="col" class="text-end">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                            <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                                <!-- <td class="w-4 p-4">
                                            <div class="flex items-center">
                                                <input id="table-checkbox-21" type="checkbox" value=""
                                                    class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                                                <label for="table-checkbox-21" class="sr-only">Table checkbox</label>
                                            </div>
                                        </td> -->
                                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap">
                                    {{ $loop->iteration }}
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap">
                                    {{ $customer->created_at->format('Y-m-d') }}
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap underline">
                                    <a href="{{ route('customers.customer.info', $customer) }}">
                                        {{ $customer->name }}
                                    </a>
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap">
                                    {{ $customer->category->label() }}
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap">
                                    {{ $customer->phone }}
                                </td>
                                <td class="px-6 py-4 text-dark text-end">
                                    {{ $customer->credit }}
                                </td>
                                <td class="px-6 py-4 text-dark text-end">
                                    {{ $customer->debit }}
                                </td>
                                <td class="px-6 py-4 text-dark text-end">
                                    {{ $customer->balance }}
                                </td>
                                <td class="px-6 py-4 text-end">
                                    <div class="hs-dropdown relative inline-flex">
                                        <a id="hs-dropdown-default" type="button"
                                            class="hs-dropdown-toggle inline-flex items-center gap-x-2 text-sm font-medium text-primary underline cursor-pointer">
                                            <span class="leading-tight">Options</span>
                                            <i
                                                class="fi fi-rr-angle-down text-base leading-tight font-medium hs-dropdown-open:rotate-180 text-sm"></i>
                                        </a>
                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-md p-2 mt-2 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full z-10"
                                            aria-labelledby="hs-dropdown-default">

                                            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800
                                                        hover:bg-gray-100 focus:outline-none focus:bg-gray-100
                                                        dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700 edit"
                                                href="#" data-url="{{ route('customers.customer.edit', $customer) }}">
                                                <i class="fi fi-rr-edit text-lg leading-none text-primary"></i>
                                                Edit
                                            </a>
                                            @can('administrator')
                                            <form method="POST" action="{{ route('customers.customer.delete', $customer) }}"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800
                                                                    hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400
                                                                    dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700 delete"
                                                    href="javascript:void(0)">
                                                    <i class="fi fi-rr-trash text-lg leading-none text-danger"></i>
                                                    Delete
                                                </a>
                                            </form>
                                            @endcan
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
    </div>

    @include('app.customer.modals.new-customer-modal')

    <div id="modal_holder"></div>

@endsection

@section('js')

    <script type="text/javascript">

        $('#searchCustomer').on('keyup', function(){

            let $searchFrm = $('#searchCustomersFrm');
            let $data = $searchFrm.serializeArray();
            let $url = $searchFrm.attr('action')

            $.get($url, $data, function (data) {
                $('#data_holder').html(data);
                HSDropdown.autoInit();
            })
        })

        $(document).on('click', '.table tbody .edit', function(){

            const $url = $(this).data('url');

            $.get($url, function (data) {
                $('#modal_holder').html(data);

                const element = document.querySelector('#edit-customer-modal')
                const modal = new HSOverlay(element);
                modal.open();
            })
        })

        $(document).on('click', '.table tbody .delete', function (){
            const $form = $(this).closest('form');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $form.submit();
                }
            })
        })

    </script>


@endsection
