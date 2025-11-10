@extends('layout.app')

@section('content')

    @include('layout.errors')

    <!-- tab v2 with card -->
    <div class="card border-0">
        <ul class="nav nav-tabs nav-tabs-v2 ps-4 pe-4">
            <li class="nav-item me-3"><a href="#dashboard" class="nav-link active" data-bs-toggle="tab">Dashboard</a>
            </li>
            <li class="nav-item me-3"><a href="#alljobs" class="nav-link" data-bs-toggle="tab">All Jobs</a></li>
            <li class="nav-item me-3"><a href="#largeformat" class="nav-link" data-bs-toggle="tab">Large Format</a>
            </li>
            <li class="nav-item me-3"><a href="#embroidery" class="nav-link" data-bs-toggle="tab">Embroidery</a></li>
            <li class="nav-item me-3"><a href="#design" class="nav-link" data-bs-toggle="tab">Design</a></li>
            <li class="nav-item me-3"><a href="#press" class="nav-link" data-bs-toggle="tab">Press</a></li>
            <li class="nav-item me-3"><a href="#photography" class="nav-link" data-bs-toggle="tab">Photography</a>
            </li>
            <li class="nav-item me-3"><a href="#payments" class="nav-link" data-bs-toggle="tab">Payments</a></li>
            <li class="nav-item me-3"><a href="#invoice" class="nav-link" data-bs-toggle="tab">Invoice</a></li>
        </ul>
        <div class="tab-content p-4">
            <div class="tab-pane fade show active" id="dashboard">

                <div class="d-flex justify-content-between mb-5">
                    <div></div>
                    <div>
                        <div class="dropdown d-inline">
                            <a class="btn btn-primary" type="button" id="dropdownMenu2" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">

                                <i class="fas fa-plus me-3"></i>
                                Register Jobs
                            </a>
                            <div class="dropdown-menu dropdown-primary">

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#new_largeformat_modal">
                                    Large Format
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#new_embroidery_job_modal">
                                    Embroidery
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#new_design_job_modal">
                                    Design Job
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#new_press_job_modal">
                                    Press Job
                                </a>
                                <a class="dropdown-item"
                                    href="/new-largeformatjob/ {{ $customer->customer_id }}">Photography</a>

                            </div>
                        </div>

                        <div class="dropdown d-inline">
                            <a class="btn btn-primary" type="button" id="dropdownMenu2" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">

                                <i class="fas fa-file-invoice-dollar me-3"></i>
                                Invoices
                            </a>
                            <div class="dropdown-menu dropdown-primary">

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#newInvoiceModal">New
                                    Invoice</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#">Invoice Pmt</a>
                                <!-- <a class="dropdown-item" href="#">Something else here</a>
                                                                                                            <a class="dropdown-item" href="#">Something else here</a> -->

                            </div>
                        </div>

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_payment_modal">

                            <i class="fas fa-credit-card me-3  "></i>
                            New Payment

                        </button>
                    </div>
                </div>

                <div class="d-flex justify-content-between my-4">
                    <div>
                        <h6 class="fw-500 mb-0">Customer Dashboard</h6>
                        <h1>{{ $customer->name }}</h1>

                        <div class="d-flex gap-3">
                            <span class="border-end pe-3 fs-12px">
                                Cateory
                                <p class="fs-12px text-capitalize mb-0 fw-600">{{ $customer->category }}</p>
                            </span>
                            <span class="border-end pe-3 fs-12px">
                                Phone Number
                                <p class="fs-12px text-capitalize mb-0">{{ $customer->phone }}</p>
                            </span>
                            <span>
                                Date Registered
                                <p class="fs-12px text-capitalize mb-0">{{ $customer->date_registered }}</p>
                            </span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">

                        <div class="card shadow-sm me-4 w-100px">
                            <div class="card-body">
                                <p class="mb-0">Jobs</p>
                                <p class="mb-0 fs-16px fw-600">{{ $customer->job_count }}</p>
                            </div>
                        </div>
                        <div class="card shadow-sm w-150px bg-dark me-3">
                            <div class="card-body">
                                <p class="mb-0 text-white">Total Bills</p>
                                <p class="mb-0 fs-16px fw-600 text-white">GHS
                                    {{ number_format($customer->customer_debit, 2) }}</p>
                            </div>
                        </div>
                        <div class="card shadow-sm w-150px border-pink me-3">
                            <div class="card-body">
                                <p class="mb-0">Total Payment</p>
                                <p class="mb-0 fs-16px fw-600">GHS {{ number_format($customer->customer_credit, 2) }}</p>
                            </div>
                        </div>
                        <div class="card shadow-sm w-150px bg-warning border-warning">
                            <div class="card-body">
                                <p class="mb-0 text-white">Balance</p>
                                <p class="mb-0 fs-16px fw-600 text-white">GHS
                                    {{ number_format($customer->customer_balance, 2) }}</p>
                            </div>
                        </div>

                    </div>
                </div>

                <hr>

            </div>
            <div class="tab-pane fade" id="alljobs">...</div>
            <div class="tab-pane fade" id="largeformat">

                <h4 class="mb-5">Large Format Jobs</h4>
                @include('app.customer.partials.largeFormatJobs')

            </div>
            <div class="tab-pane fade" id="embroidery">

                <h4 class="mb-5">Embroidery</h4>
                @include('app.customer.partials.embroideryJobs')

            </div>
            <div class="tab-pane fade" id="design">

                <h4 class="mb-5">Design Jobs</h4>
                @include('app.customer.partials.designJobs')

            </div>
            <div class="tab-pane fade" id="press">

                <h4 class="mb-5">Press Jobs</h4>
                @include('app.customer.partials.pressJobs')

            </div>
            <div class="tab-pane fade" id="photography">

                <h4 class="mb-5">Photography Jobs</h4>
                @include('app.customer.partials.photograpyJobs')

            </div>
            <div class="tab-pane fade" id="payments">
                @include('app.customer.partials.payments')
            </div>
            <div class="tab-pane fade" id="invoice">
                @include('app.customer.partials.invoices')
            </div>
        </div>
    </div>


    <!-- Include new service request and payment modals -->
    @include('app.job.largeformat.new-largeformat')
    @include('app.job.embroidery.new-embroidery')
    @include('app.job.design.new-design')
    @include('app.job.press.new-press')
    @include('app.payments.modals.new-payment-modal')
    @include('app.invoices.modals.create-invoice')

@endsection

@section('js')
<script src="{{ asset('assets/js/printforce/customers/design-jobs.js') }}"></script>
<script src="{{ asset('assets/js/printforce/customers/largeformat-jobs.js') }}"></script>
<script src="{{ asset('assets/js/printforce/customers/embroidery-jobs.js') }}"></script>
<script src="{{ asset('assets/js/printforce/customers/press-jobs.js') }}"></script>
<script src="{{ asset('assets/js/printforce/customers/payment.js') }}"></script>
@endsection
