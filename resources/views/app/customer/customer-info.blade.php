@extends('layout.app')

@section('content')

<x-headers.page-header pageTitle="Customer Information">

    <div class="ms-3 flex gap-3">

        <button class="btn btn-primary" data-hs-overlay="#new-job-modal">
            <i class="fi fi-rr-plus-small me-2"></i>
            New Job
        </button>
        <div class="hs-dropdown relative hidden">
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
                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700"
                    href="#" data-hs-overlay="#other_jobs_modal">
                    Other Job
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
                    href="#" data-hs-overlay="#new-invoice-modal">
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


<div class="grid grid-cols-12 gap-6">
    <div class="col-span-3">

        <div class="card">
            <div class="card-body">

                <div class="w-full h-[200px] bg-primary rounded-xl flex justify-center items-center text-5xl text-white mb-4">
                    <i class="fi fi-sr-comment-user"></i>
                </div>

                <h3 class="font-normal text-2xl font-cal-sans-regular mb-8">{{ $customer->name }}</h3>

                <div class="flex gap-3 items-center mb-5">

                    <div class="">
                        <i class="fi fi-sr-briefcase text-xl text-gray-800"></i>
                    </div>
                    <div class="">
                        <p class="text-[12px] text-dark">Category</p>
                        <p class="text-sm text-dark">{{ $customer->category->label() }}</p>
                    </div>

                </div>

                <div class="flex gap-3 items-center mb-5">

                    <div>
                        <i class="fi fi-sr-phone-call text-xl text-warning"></i>
                    </div>
                    <div>
                        <p class="text-[12px] text-dark"> Phone</p>
                        <p class="text-sm text-dark">{{ $customer->phone }}</p>
                    </div>

                </div>

                <div class="col flex gap-3 items-center">
                    <div>
                        <i class="fi fi-sr-calendar-clock text-xl text-primary"></i>
                    </div>
                    <div>
                        <p class="text-[12px] text-dark">Date Registered</p>
                        <p class="text-sm text-dark">{{ $customer->created_at->format('Y-m-d') }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4">



                </div>

            </div>
        </div>
    </div>

    <!-- main -->
    <div class="col-span-9">

        <div class="grid grid-cols-12 gap-6 mb-5">
            <div class="col-span-3">
                <x-printforce.cards.colour-card title="Jobs" />
            </div>
            <div class="col-span-3">
                <x-printforce.cards.colour-card bgColour="danger" title="Debit" :value="$customer->debit" />
            </div>
            <div class="col-span-3">
                <x-printforce.cards.colour-card bgColour="warning" title="Credit" :value="$customer->credit" />
            </div>
            <div class="col-span-3">
                <x-printforce.cards.colour-card bgColour="success" title="Balance" :value="$customer->balance" />
            </div>
        </div>


        <x-tabs.tab>
            <x-slot name="tabs">
                <x-tabs.tab-item label="Jobs" :active="true" id="jobs-tab" controls="jobs-content" />
                <x-tabs.tab-item label="Invoices" id="invoices-tab" controls="invoices-content" />
                <x-tabs.tab-item label="Payments" id="payments-tab" controls="payments-content" />
            </x-slot>
            <x-slot name="content">

                <x-tabs.tab-content :active="true" id="jobs-content">

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
                                <th scope="col" class="px-6 py-3 font-medium text-end">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customer->printforceJobs as $job)
                            <tr class="">
                                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap">
                                    {{ $loop->iteration }}
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap">
                                    {{ $job->created_at }}
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap">
                                    {{ $job->service?->service_name }}
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap">
                                    {!! $job->details !!}
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap">
                                    {{ number_format($job->total, 2) }}
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap">
                                    {{ $job->job_status->label() }}
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-primary whitespace-nowrap text-end ">
                                    <a href="{{ route('jobs.view-job', $job) }}" class="underline text-blue-600">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </x-tabs.tab-content>
                <x-tabs.tab-content id="invoices-content">

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
                                    {{ $customerInvoice->customer->name }}
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap">
                                    {{ $customerInvoice->sub_total_value }}
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap text-end">
                                    {{ number_format($customerInvoice->vat_amount + $customerInvoice->nhil_amount + $customerInvoice->getfund_amount, 2) }}
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-dark whitespace-nowrap text-end">
                                    {{ number_format($customerInvoice->total_value, 2) }}
                                </td>

                            </tr>

                            @endforeach

                        </tbody>
                    </table>

                </x-tabs.tab-content>
                <x-tabs.tab-content id="payments-content">

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

                </x-tabs.tab-content>

            </x-slot>

        </x-tabs.tab>
    </div>
</div>










<!-- Include new service request and payment modals -->
<livewire:jobs.new-job :customer="$customer" />

@include('app.payments.modals.new-payment-modal')
@include('app.invoices.modals.create-invoice')

@endsection

@push('stacked-scripts')

@endpush

@section('js')

@endsection
