@extends('layout.app')

@section('content')

    <x-headers.page-header pageTitle="Payments">
        <a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_payment_modal">
            <i class="fas fa-plus me-3"></i>
            New Payment
        </a>
    </x-headers.page-header>


    @can('administrator')
    <div class="grid grid-cols-12 gap-6 mb-7">
        <div class="lg:col-span-3 md:col-span-3 sm:col-span-12 col-span-12">
            <x-printforce.cards.colour-card title="Today's Payments" :value="$statistics['todays_payment_total']"
                bgColour="primary" />

        </div>
        <div class="lg:col-span-3 md:col-span-3 sm:col-span-12 col-span-12">
            <x-printforce.cards.colour-card title="Weekly Payments" :value="$statistics['weeks_payment_total']"
                bgColour="success" />

        </div>
        <div class="lg:col-span-3 md:col-span-3 sm:col-span-12 col-span-12">
            <x-printforce.cards.colour-card title="Monthly Pmts" :value="$statistics['months_payment_total']"
                bgColour="pink" />

        </div>
        <div class="lg:col-span-3 md:col-span-3 sm:col-span-12 col-span-12">
            <x-printforce.cards.colour-card title="Annual Payments" :value="$statistics['years_payment_total']"
                bgColour="warning" />

        </div>
    </div>
    @endcan




    <div class="card border-0">
        <div class="card-body">

            <!-- Only show to admins -->
            <form id="filter_cash_payments_frm" class="mb-5">
                @csrf
                <div class="flex">
                    <div class="w-200px me-2">
                        <label for="" class="form-label">Start Date</label>

                            <input datepicker datepicker-autohide datepicker-format="yyyy-mm-dd" datepicker-autoselect-today id="default-datepicker"
                                type="text" class="font-control" placeholder="Select date" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="w-200px me-2">
                        <label for="" class="form-label">End Date</label>
                        <input type="text" class="form-control" id="end_date" name="end_date" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="w-200px me-2">
                        <label for="" class="form-label">Customer</label>
                        <select class="custom-select browser-default" name="customer_id" id="filterCustomerId2">
                            <option value="all">All Customers</option>
                            @foreach ($customers as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="w-200px">

                        <button type="submit" class="btn btn-primary wide" style="margin-top:27px !important">
                            <i class="fas fa-file-alt me-2" aria-hidden></i> Generate Report</button>

                    </div>
                </div>
            </form>



            <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
                <div class="p-4 flex items-center justify-between space-x-4">
                    <label for="input-group-1" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <i class="fi fi-rr-search"></i>
                        </div>
                        <input type="text" id="input-group-1"
                            class="block w-full max-w-96 ps-9 pe-3 py-2 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body"
                            placeholder="Search">
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
                <div class="" id="data_holder">

                    <table class="table tables table-sm">
                        <thead class="">
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Account</th>
                                <th class="text-end">Amount</th>
                                <th class="text-end">Option</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($payments as $payment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $payment->payment_date ?? $payment->created_at }}</td>
                                <td>{{ $payment->customer?->name }}</td>
                                <td>{{ $payment->account->account_name }}</td>
                                <td class="text-end">{{ number_format($payment->amount_paid, 2) }}</td>
                                <td class="text-end">

                                    <div class="hs-dropdown relative inline-flex [--trigger:hover]">
                                        <button id="hs-dropdown2" type="button"
                                            class="hs-dropdown-toggle text-primary cursor-pointer">
                                            <span class="leading-tight">Options</span>
                                            <i
                                                class="fi fi-rr-angle-down text-sm leading-tight hs-dropdown-open:rotate-180"></i>
                                        </button>
                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-md p-2 mt-2 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full z-10"
                                            aria-labelledby="hs-dropdown2">
                                            <a class="dropdown-item" href="#" id="{{ $payment->payment_id }}">
                                                <i class="fi fi-rr-print text-lg leading-none text-primary"></i>
                                                Print
                                            </a>
                                            <a class="dropdown-item edit" href="javascript:void(0)"
                                                data-url="{{ route('payments.edit', $payment) }}">
                                                <i class="fi fi-rr-edit text-lg leading-none text-primary"></i>
                                                Edit
                                            </a>
                                            <form id="deleteFrm" method="POST"
                                                action="{{ route('payments.delete', $payment) }}" class="d-inline-block">
                                                @csrf
                                                @method('delete')
                                                <a class="dropdown-item delete" href="#">
                                                    <i class="fi fi-rr-trash text-lg leading-none text-danger"></i>
                                                    Delete
                                                </a>
                                            </form>
                                        </div>
                                    </div>



                                </td>
                            </tr>

                            @php
    $total += $payment->amount_paid;
                            @endphp

                            @endforeach

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-end Axiforma fs-18px fw-600">{{ number_format($total, 2) }}</td>
                                <td></td>
                            </tr>


                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <div id="modal_holder"></div>
@endsection

@section('js')
    <script type="text/javascript" >
        const el = document.querySelector("#start_date");
        // new HSDatepicker(el);
        // alert('hi')
    </script>


    <script>
    $(document).on('click', '.table tbody .edit', function() {
        $.get($(this).data('url'), function(data) {
            $('#modal_holder').html(data)
            const modal = new HSOverlay(document.querySelector('#edit-payment-modal'));
            modal.open();
        })
    })


    $(document).on('click', '.table tbody .delete', function() {
        const $form = $(this).closest('form')

        Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            })
            .then((result) => {
                if (result.isConfirmed) {
                    $form.submit()
                }
            })
    })
    </script>
@endsection
