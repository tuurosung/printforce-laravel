@extends('layout.app')

@section('content')

<x-headers.page-header pageTitle="Customer Information">

    <div class="ms-3 flex gap-3">

        <div class="hs-dropdown relative inline-flex">
            <button id="hs-dropdown-default" type="button"
                class="hs-dropdown-toggle btn btn-primary py-2 px-4 inline-flex items-center gap-x-2 text-sm">
                <span class="leading-tight">Register Jobs</span>
                <i class="fi fi-rr-angle-down text-sm leading-tight font-norma hs-dropdown-open:rotate-180"></i>
            </button>
            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-md p-2 mt-2 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full z-10"
                aria-labelledby="hs-dropdown-default">
                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700"
                    href="#" data-hs-overlay="#large_format_job_modal">
                    Large Format
                </a>
                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700"
                    href="#" data-hs-overlay="#embroidery_job_modal">
                    Embroidery
                </a>
                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700"
                    href="#" data-hs-overlay="#design_job_modal">
                    Design Job
                </a>
                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700"
                    href="#" data-hs-overlay="#press_job_modal">
                    Press Job
                </a>
            </div>
        </div>

        <div class="hs-dropdown relative inline-flex">
            <button id="hs-dropdown-default" type="button"
                class="hs-dropdown-toggle btn btn-primary py-2 px-4 inline-flex items-center gap-x-2 text-sm ">
                <span class="leading-tight">Invoices</span>
                <i class="fi fi-rr-angle-down text-sm leading-tight font-medium hs-dropdown-open:rotate-180"></i>
            </button>
            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-md p-2 mt-2 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full z-10"
                aria-labelledby="hs-dropdown-default">
                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700"
                    href="#" data-hs-overlay="#invoice_modal">
                    New Invoice
                </a>
                <!-- <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700"
                                                                                        href="#" data-hs-overlay="#">
                                                                                        New Invoice Payment
                                                                                    </a> -->

            </div>
        </div>




        <button type="button" class="btn btn-primary" data-hs-overlay="#new_payment_modal">

            <i class="fas fa-credit-card me-3  "></i>
            New Payment

        </button>
    </div>
</x-headers.page-header>

<div class="card">
    <div class="card-body">

        <div class="flex">
            <div
                class="flex bg-gray-100 hover:bg-gray-200 rounded-md transition p-1 dark:bg-gray-700 dark:hover:bg-gray-600">
                <nav class="flex space-x-2 " aria-label="Tabs" role="tablist">

                    <x-tabs.tab-item id="dashboard-tab" label="Dashboard" icon="paper-plane"
                        dataHsTab="dashboard-content" :ariaSelected="true" />
                    <x-tabs.tab-item id="jobs-tab" label="Registered Jobs" icon="briefcase" dataHsTab="jobs-content"
                        :ariaSelected="false" />
                    <x-tabs.tab-item id="invoices-tab" label="Invoices" icon="file-invoice-dollar"
                        dataHsTab="invoices-content" :ariaSelected="false" />
                    <x-tabs.tab-item label="Payments" icon="sack-dollar" dataHsTab="payments-content"
                        :ariaSelected="false" />

                </nav>
            </div>
        </div>

        <div class="mt-3">
            <div id="dashboard-content" role="tabpanel" aria-labelledby="dashboard-tab" class="pt-5">
                <p class="text-gray-500 dark:text-gray-400">
                    Customer Name
                </p>

                <div class="grid grid-cols-2 gap-4 mb-9">
                    <div class="col">

                        <h3 class="font-normal text-4xl font-cal-sans-regular mb-8">{{ $customer->name }}</h3>

                        <div class="grid grid-cols-3 gap-4">
                            <div class="col flex gap-3 items-center border-r me-5">

                                <div class="">
                                    <i class="fi fi-sr-briefcase text-2xl text-gray-800"></i>
                                </div>
                                <div class="">
                                    <p class="text-sm text-dark">Category</p>
                                    <p class="text-sm text-dark">{{ $customer->category->label() }}</p>
                                </div>

                            </div>
                            <div class="col flex gap-3 items-center border-r me-5">

                                <div>
                                    <i class="fi fi-sr-phone-call text-2xl text-warning"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-dark"> Phone</p>
                                    <p class="text-sm text-dark">{{ $customer->phone }}</p>
                                </div>

                            </div>
                            <div class="col flex gap-3 items-center">
                                <div>
                                    <i class="fi fi-sr-calendar-clock text-2xl text-primary"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-dark">Date Registered</p>
                                    <p class="text-sm text-dark">{{ $customer->created_at->format('Y-m-d') }}</p>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>

                <div class="grid grid-cols-6 gap-4">
                    <div class="col">
                        <x-cards.colour-card2 title="Total Jobs" colour="primary" icon="users"
                            :value="$customer->job_count ?? 0" valueType="number" />
                    </div>
                    <div class="col">
                        <x-cards.colour-card2 title="Pending" colour="warning" icon="alarm-clock"
                            :value="$customer->pending_job_count ?? 0" valueType="number" />
                    </div>
                    <div class="col">
                        <x-cards.colour-card2 title="Complete" colour="success" icon="check"
                            :value="$customer->pending_job_count ?? 0" valueType="number" />
                    </div>
                    <div class="col">
                        <x-cards.colour-card2 title="Debit" colour="danger" icon="calculator-money"
                            :value="$customer->debit ?? 0" valueType="number" />
                    </div>
                    <div class="col">
                        <x-cards.colour-card2 title="Credit" colour="warning" icon="credit-card-check"
                            :value="$customer->credit ?? 0" valueType="number" />
                    </div>
                    <div class="col">
                        <x-cards.colour-card2 title="Balance" colour="primary" icon="badge-dollar"
                            :value="$customer->balance ?? 0" valueType="number" />
                    </div>
                </div>

            </div>
            <div id="jobs-content" class="hidden py-5" role="tabpanel" aria-labelledby="jobs-tab">


                <h4 class="mb-5 text-2xl">Registered Jobs</h4>

                <div
                    class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
                    <div class="p-4 flex items-center justify-between space-x-4">
                        <label for="input-group-1" class="sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <!-- <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                                                                                        height="24" fill="none" viewBox="0 0 24 24">
                                                                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                                                                                            d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                                                                                                    </svg> -->
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
                                        class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Category</a>
                                </li>


                            </ul>
                        </div>
                    </div>

                    <table class="table w-full text-sm text-left rtl:text-right text-body">
                        <thead
                            class="text-sm text-dark bg-neutral-secondary-medium border-b border-t border-default-medium">
                            <tr>
                                <th scope="col" class="p-4">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium">
                                    Date
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium">
                                    Service Name
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium">
                                    Details
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium">
                                    Total
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium">
                                    Assigned To
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customer->getCustomerJobs() as $job)
                            <tr class="">
                                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap">
                                    {{ $loop->iteration }}</td>
                                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap">
                                    {{ $job->date }}</td>
                                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap">
                                    {{ $job->service?->service_name }}</td>
                                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap">
                                    {{ $job->details }}</td>
                                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap">
                                    {{ number_format($job->total, 2) }}</td>
                                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap">
                                    {{ $job->job_status_definition }}</td>
                                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap">
                                    {{ $job->assignedTo?->name }}</td>
                                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap">

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
            <div id="invoices-content" class="hidden pt-5" role="tabpanel" aria-labelledby="invoices-tab">

                <h4 class="mb-5 text-2xl text-semibold">Invoices</h4>

                <div
                    class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
                    <div class="p-4 flex items-center justify-between space-x-4">
                        <label for="input-group-1" class="sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <!-- <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                                                                                        height="24" fill="none" viewBox="0 0 24 24">
                                                                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                                                                                            d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                                                                                                    </svg> -->
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
                                        class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Category</a>
                                </li>


                            </ul>
                        </div>
                    </div>

                    <table class="table w-full text-sm text-left rtl:text-right text-body">
                        <thead
                            class="text-sm text-dark bg-neutral-secondary-medium border-b border-t border-default-medium">
                            <tr>
                                <th scope="col" class="p-4">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium">
                                    Date
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium">
                                    Invoice Id
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium">
                                    Customer Name
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium text-end">
                                    Sub-Total
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium text-end">
                                    Taxes
                                </th>
                                <th scope="col" class="px-6 py-3 font-medium text-end">
                                    Total
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customer->invoices as $customerInvoice)
                            <tr>
                                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap">
                                    {{ $loop->iteration }}
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap">
                                    {{ $customerInvoice->created_at }}
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap">
                                    <a href="#">{{ $customerInvoice->invoice_id }}</a>
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap">
                                    {{ $customerInvoice->customer->name }}</td>
                                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap">
                                    {{ $customerInvoice->sub_total }}</td>
                                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap text-end">
                                    {{ number_format($customerInvoice->vat_amount + $customerInvoice->nhil_amount + $customerInvoice->getfund_amount, 2) }}
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap text-end">
                                    {{ number_format($customerInvoice->total, 2) }}</td>

                            </tr>

                            @endforeach

                        </tbody>
                    </table>

                </div>
                <div id="payments-content" class="hidden" role="tabpanel" aria-labelledby="payments-tab">

                    <h4 class="mb-5">Payment History</h4>

                    <table class="table table-sm datatables">
                        <thead class="">
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Account</th>
                                <th class="text-end">Amount</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $total = 0;
                            @endphp

                            @foreach ($customer->payments as $payment)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $payment->payment_date ?? $payment->created_at }}</td>
                                <td>{{ $payment->timestamp ?? $payment->created_at }} </td>
                                <td>{{ $payment->payment_account_name }}</td>
                                <td class="text-end">{{ number_format($payment->amount_paid, 2) }}</td>
                                <td class="text-end">

                                    <div class="dropdown">
                                        <a class="" type="button" id="triggerId" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            Options
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-receipt me-3  text-primary"></i>
                                                Reciept
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-pen me-3  text-primary"></i>
                                                Edit
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-trash-alt me-3  text-danger"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>


                                </td>
                            </tr>

                            @php
                            $total += (float) $payment->amount_paid;
                            @endphp


                            @endforeach
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-end Axiforma fs-18px fw-600">
                                    {{ number_format($customer->payments->sum('amount_paid'), 2) }}
                                </td>
                                <td></td>
                            </tr>
                        </tfoot>
                        </tbody>
                    </table>
                    <p class="text-gray-500 dark:text-gray-400">
                        Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.
                        Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four
                        loko
                        farm-to-table craft beer twee.
                        Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl
                        cillum PBR.
                        Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.
                        Keytar helvetica VHS salvia yr, vero magna velit sapiente.
                    </p>
                </div>

            </div>
        </div>
    </div>


    @include('layout.errors')





    <!-- Include new service request and payment modals -->
    <livewire:livewire.jobs.large-format-job :customer="$customer" />
    <livewire:livewire.jobs.embroidery-job :customer="$customer" />
    <livewire:livewire.jobs.design-job :customer="$customer" />
    <livewire:livewire.jobs.press-job :customer="$customer" />

    @include('app.payments.modals.new-payment-modal')
    @include('app.invoices.modals.create-invoice')

    @endsection

    @push('stacked-scripts')

    @endpush

    @section('js')

    @endsection
