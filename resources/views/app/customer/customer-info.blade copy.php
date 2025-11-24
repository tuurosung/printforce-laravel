@extends('layout.app')

@section('content')

    <x-headers.top-header pageTitle="Customer Information">

        <div class="ms-3">
            <div class="dropdown d-inline">
                <a class="btn btn-primary" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">

                    <i class="fas fa-plus me-3"></i>
                    Register Jobs
                </a>
                <div class="dropdown-menu dropdown-primary">

                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#new_largeformat_modal">
                        Large Format
                    </a>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#new_embroidery_job_modal">
                        Embroidery
                    </a>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#new_design_job_modal">
                        Design Job
                    </a>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#new_press_job_modal">
                        Press Job
                    </a>
                    <a class="dropdown-item" href="/new-largeformatjob/ {{ $customer->customer_id }}">Photography</a>

                </div>
            </div>

            <div class="dropdown d-inline">
                <a class="btn btn-primary" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">

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

    </x-headers.top-header>

    @include('layout.errors')




    <div id="dashboard-tab">
        <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row" role="tablist">
            <li class="nav-item">
                <a href="#dashboard"
                    class="nav-link gap-6 d-flex align-items-center justify-content-center active px-3 px-md-3 me-0 me-md-2 fs-11"
                    id="dashboard-tab" data-bs-toggle="tab" role="tab" aria-controls="dashboard" aria-selected="true">
                    <i class="fi fi-sr-chart-simple fs-9px"></i>
                    <span class="d-none d-md-block fw-medium">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#registered_jobs"
                    class="nav-link gap-6 d-flex align-items-center justify-content-center px-3 px-md-3 me-0 me-md-2 fs-11"
                    id="registered_jobs-tab" data-bs-toggle="tab" role="tab" aria-controls="registered_jobs"
                    aria-selected="false">
                    <i class="fi fi-sr-users fs-9px"></i>
                    <span class="d-none d-md-block fw-medium">Registered Jobs</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#invoices"
                    class="nav-link gap-6 d-flex align-items-center justify-content-center px-3 px-md-3 me-0 me-md-2 fs-11"
                    id="invoices-tab" data-bs-toggle="tab" role="tab" aria-controls="invoices" aria-selected="false">
                    <i class="fi fi-rr-file-invoice-dollar fs-10px"></i>
                    <span class="d-none d-md-block fw-medium">Invoices</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#payments"
                    class="nav-link gap-6 d-flex align-items-center justify-content-center px-3 px-md-3 me-0 me-md-2 fs-11"
                    id="payments-tab" data-bs-toggle="tab" role="tab" aria-controls="payments" aria-selected="false">
                    <i class="fi fi-sr-chart-pie fs-9px"></i>
                    <span class="d-none d-md-block fw-medium">Payments</span>
                </a>
            </li>
            <!-- <li class="nav-item ms-auto">
                    <a href="#add_notes" class="btn btn-primary d-flex align-items-center px-3 gap-6 fs-11" id="add-notes">
                        <i class="fi fi-sr-plus fs-9px"></i>
                        <span class="d-none d-md-block fw-medium fs-3">Add Notes</span>
                    </a>
                </li> -->
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">

                <div class="row">
                    <div class="col-md-8">
                        <div class="card text-bg-danger mb-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="d-flex flex-column h-100">
                                            <div class="hstack gap-3 mb-4">
                                                <span
                                                    class="d-flex align-items-center justify-content-center round-48 bg-white rounded flex-shrink-0">

                                                    <i class="fi fi-sr-briefcase-arrow-right fs-7 text-danger"></i>
                                                </span>
                                                <div>
                                                    <p class="mb-0 text-white">Customer Name</p>
                                                    <h5 class="text-white fs-6 mb-0 text-nowrap">{{ $customer->name }}</h5>
                                                </div>
                                            </div>
                                            <div class="mt-4 mt-sm-auto">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <span class="text-white">Total Jobs</span>
                                                        <h4 class="mb-0 text-white mt-1 text-nowrap fs-13 fw-500 cal-sans">
                                                            GHS {{ number_format($customer->customer_debit, 2) }}</h4>
                                                    </div>
                                                    <div class="col-6 border-start border-light" style="--bs-border-opacity: .15;">
                                                        <span class="text-white">Total Payment</span>
                                                        <h4 class="mb-0 text-white mt-1 text-nowrap fs-13 fw-500 cal-sans">
                                                            GHS {{ number_format($customer->customer_credit) }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 text-center text-md-end">
                                        <img src="{{ asset('images/Image-3.png') }}" alt="welcome" class="img-fluid mb-n7 mt-2"
                                            width="180">
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-bg-dark text-white h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center h-100">
                                    <div class="d-flex align-items-center">
                                        <a href="JavaScript: void(0);">
                                            <i class="fi fi-sr-sack-dollar display-6 text-white"></i>
                                        </a>
                                        <div class="ms-3">
                                            <h4 class="card-title mb-0 text-white">
                                                Outstanding Balance
                                            </h4>
                                            <p class="text-white fs-32px mb-0 cal-sans">GHS {{ number_format($customer->customer_balance, 2) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between pb-6 border-bottom">
                                    <div>
                                        <span class="text-muted fw-medium">Category</span>
                                    </div>
                                    <div class="text-end">
                                        <h6 class="fw-500 mb-1 lh-base">{{ $customer->category }}</h6>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between py-6 border-bottom">
                                    <div>
                                        <span class="text-muted fw-medium">Phone Number</span>
                                    </div>
                                    <div class="text-end">
                                        <h6 class="fw-500 mb-1 lh-base">{{ $customer->phone }}</h6>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between pt-6">
                                    <div>
                                        <span class="text-muted fw-medium">Date Registered</span>
                                    </div>
                                    <div class="text-end">
                                        <h6 class="fw-500 mb-1 lh-base">{{ $customer->date_registered }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <div class="tab-pane fade" id="registered_jobs" role="tabpanel" aria-labelledby="registered_jobs-tab">

                <div class="card">
                    <div class="card-body">

                        <table class="table table-sm datatables">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">Details</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Job Status</th>
                                    <th scope="col">Assigned To</th>
                                    <th scope="col" class="text-end">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customer->getCustomerJobs() as $job)
                                    <tr class="">
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $job->date }}</td>
                                        <td>{{ $job->service->service_name }}</td>
                                        <td>{{ $job->details }}</td>
                                        <td>{{ $job->details }}</td>
                                        <td>{{ $job->job_status_definition }}</td>
                                        <td>{{ $job->job_assigned_to }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>

            <div class="tab-pane fade" id="invoices" role="tabpanel" aria-labelledby="invoices-tab">
                @include('app.customer.partials.invoices')
            </div>

            <div class="tab-pane fade" id="payments" role="tabpanel" aria-labelledby="payments-tab">
                @include('app.customer.partials.payments')
            </div>
        </div>
    </div>

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
