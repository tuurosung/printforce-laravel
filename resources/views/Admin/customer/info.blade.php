@extends('layout.app')

@section('content')

<div class="d-flex justify-content-between mb-4">
    <div>
        <h4 class="montserrat fs-30px fw-600">Customer Portal</h4>
    </div>
    <div class="">

        <div class="dropdown d-inline">
            <a class="btn btn-outline-purple dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-plus mr-3  "></i> Register Jobs</a>
            <div class="dropdown-menu dropdown-primary">

                <a class="dropdown-item" href="/new-largeformatjob/ {{ $customer->customer_id }}">Large Format</a>
                <a class="dropdown-item" href="/new-largeformatjob/ {{ $customer->customer_id }}">Embroidery</a>
                <a class="dropdown-item" href="/new-largeformatjob/ {{ $customer->customer_id }}">Design Job</a>
                <a class="dropdown-item" href="/new-largeformatjob/ {{ $customer->customer_id }}">Press Job</a>
                <a class="dropdown-item" href="/new-largeformatjob/ {{ $customer->customer_id }}">Photography</a>

            </div>
        </div>

        <div class="dropdown d-inline">
            <a class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-file-invoice-dollar mr-3  "></i> Invoices</a>
            <div class="dropdown-menu dropdown-primary">

                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#new_invoice_modal">New Invoice</a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#">Invoice Pmt</a>
                <!-- <a class="dropdown-item" href="#">Something else here</a>
                    <a class="dropdown-item" href="#">Something else here</a> -->

            </div>
        </div>

        <div class="dropdown d-inline">
            <a class="btn btn-outline-primary dropdown-toggle mr-0" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-credit-card mr-3  "></i> Payment</a>
            <div class="dropdown-menu dropdown-primary">

                <a class="dropdown-item" href="new-payment/{{ $customer->customer_id }}">New Payment</a>
                <!-- <a class="dropdown-item" href="#">Something else here</a>
                    <a class="dropdown-item" href="#">Something else here</a> -->
            </div>
        </div>

    </div>
</div>

<div class="card mb-3">
    <div class="card-body">

        <div class="row">

            <div class="col-md-6 mb-4 mb-md-0">
                <p>Customer Name</p>
                <h3 class="card-title Axiforma fw-600 mb-0 text-capitalize"><a> {{ $customer->name }}</a></h3>
            </div>

            <div class="col-md-6 mb-4 mb-md-0">
                <div class="d-flex flex-row">
                    <div class="mr-5">
                        <p>Category</p>
                        <p class="fs-18px text-capitalize fw-500 Axiforma"><?php echo $customer->category; ?></p>
                    </div>
                    <div class="mr-5">
                        <p>Phone</p>
                        <p class="fs-18px text-capitalize fw-500 Axiforma"><?php echo $customer->phone; ?></p>
                    </div>
                    <div class="mr-3">
                        <p>Date Registered</p>
                        <p class="fs-18px text-capitalize fw-500 Axiforma"><?php echo $customer->date_registered; ?></p>
                    </div>

                </div>
            </div>

        </div>



    </div>
</div>

<div class="row mb-3">

    <div class="col-2">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-2 d-flex justify-content-center align-items-center">
                        <i class="fas fa-file-invoice fa-2x text-primary"></i>
                    </div>

                    <div class="col-10">
                        <p class="fw-600 fs-18px Axiforma">GHS {{ $customer->customerDebit() }}</p>
                        <p>Total Bills</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-2">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-2 d-flex justify-content-center align-items-center">
                        <i class="fas fa-credit-card fa-2x text-primary"></i>
                    </div>

                    <div class="col-10">
                        <p class="fw-600 fs-18px Axiforma">GHS {{ $customer->customerCredit(); }}</p>
                        <p>Amount Paid</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-2">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-2 d-flex justify-content-center align-items-center">
                        <i class="fas fa-coins fa-2x text-danger"></i>
                    </div>

                    <div class="col-10">
                        <p class="fw-600 fs-18px Axiforma">GHS {{ $customer->customerBalance(); }}</p>
                        <p>Balance</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-2">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-2 d-flex justify-content-center align-items-center">
                        <i class="fas fa-briefcase fa-2x text-purple"></i>
                    </div>

                    <div class="col-10">
                        <p class="fw-600 fs-18px Axiforma">{{ $customer->customerJobsCount() }}</p>
                        <p>Jobs</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>



<!-- tab v2 with card -->
<div class="card">
    <ul class="nav nav-tabs nav-tabs-v2 ps-4 pe-4">
        <li class="nav-item me-3"><a href="#jobs" class="nav-link active" data-toggle="tab">Jobs</a></li>
        <li class="nav-item me-3"><a href="#payments" class="nav-link" data-toggle="tab">Payments</a></li>
        <!-- <li class="nav-item me-3"><a href="#summary" class="nav-link" data-toggle="tab">Summary</a></li> -->
        <li class="nav-item me-3"><a href="#invoices" class="nav-link" data-toggle="tab">Invoices</a></li>
    </ul>
    <div class="tab-content p-4">
        <div class="tab-pane fade show active" id="jobs">

            <h4 class="Axiforma mb-3">Registered Jobs</h4>

            <table class="table table-secondary">
                <thead class="">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Service</th>
                        <th class="text-right">Cost</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($customer_jobs as $jobs)

                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $jobs->date }}</td>
                        <td>{{ $jobs->service->service_name }}</td>
                        <td class="text-right">{{ $jobs->total }}</td>
                        <td class="text-right">
                            <a href="#" class="viewjob" style="text-decoration: none;" id="{{ $jobs->job_id }}">
                                <i class="fas fa-eye mr-3 text-purple  "></i>
                            </a>

                            <a href="#" class="job_card" style="text-decoration: none;" id="{{ $jobs->job_id }}">
                                <i class="fas fa-print text-primary  "></i>
                            </a>
                        </td>
                    </tr>
                    <?php
                        $total += $jobs->total;
                    ?>

                    @endforeach

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-right Axiforma fw-600 fs-18px">{{ $total }}</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>


        </div>
        <div class="tab-pane fade" id="payments">

            <h4 class="Axiforma mb-3">Payment History</h4>

            <table class="table table-secondary  ">
                <thead class="">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>ID</th>
                        <th>Account</th>
                        <th class="text-right">Amount</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customer_payments as $payments)

                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $payments['payment_date']; ?></td>
                        <td><?php if (!empty($payments['timestamp'])) {
                                echo date('H:i:s', $payments['timestamp']);
                            } ?></td>
                        <td><?php echo $payments['payment_id']; ?></td>
                        <td><?php echo $account->accounts_array[$payments['account_number']]; ?></td>
                        <td class="text-right"><?php echo $payments['amount_paid']; ?></td>
                        <td class="text-right">

                            <a href="#" class="receipt mr-3 text-purple" id="<?php echo $payments['payment_id']; ?>" style="text-decoration: none;">
                                <i class="fas fa-file-alt"></i>
                            </a>

                            <a href="#" class="edit mr-3 text-primary" id="<?php echo $payments['payment_id']; ?>" style="text-decoration: none;">
                                <i class="fas fa-pen"></i>
                            </a>

                            <a href="#" class="reverse_btn text-danger" id="<?php echo $payments['payment_id']; ?>" style="text-decoration: none;">
                                <i class="fas fa-trash-alt"></i>
                            </a>


                        </td>
                    </tr>

                    $total += (float) $payments['amount_paid'];

                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-right Axiforma fs-18px fw-600">{{ $total }}</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

        </div>
        <!-- <div class="tab-pane fade" id="summary">...</div> -->
        <div class="tab-pane fade" id="invoices">

            <h4 class="Axiforma mb-3">Invoices</h4>

            <table class="table table-secondary ">
                <thead class="">
                    <tr>
                        <th>#</th>
                        <th>Invoice ID</th>
                        <th>Customer Name</th>
                        <th>P.O. #</th>
                        <th class="text-right">Sub-Total</th>
                        <th class="text-right">Taxes</th>
                        <th class="text-right">Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($customer_invoices as $invoices)



                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $invoices['invoice_id']; ?></td>
                        <td><?php echo $customer->name; ?></td>
                        <td><?php echo $invoices['ref']; ?></td>
                        <td class="text-right"><?php echo $invoices['sub_total']; ?></td>
                        <td class="text-right"><?php echo number_format($invoices['vat_amount'] + $invoices['nhil_amount'] + $invoices['getfund_amount'], 2); ?></td>
                        <td class="text-right"><?php echo $invoices['total']; ?></td>
                        <td class="text-right">
                            <div class="dropdown open">
                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Option
                                </button>
                                <div class="dropdown-menu b-0 p-0" aria-labelledby="dropdownMenu1">
                                    <ul class="list-group">
                                        <a class="list-group-item" href="invoice_prepare.php?invoice_id=<?php echo $invoices['invoice_id']; ?>">Edit</li>
                                            <a class="list-group-item" href="customer_portal.php?customer_id=<?php echo $customers['customer_id']; ?>">Portal</a>
                                    </ul>
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




@endsection

@section('js')

@endsection



<?php
// $customer = new Customer($q->db, $q->mysqli);
// $invoice = new Invoice($q->db, $q->mysqli);
// $account = new Account($q->db, $q->mysqli);
// $service = new Service($q->db, $q->mysqli);


?>

<!--
    <script type="text/javascript" src="includes/js/CustomerPortal/customer_portal.js"></script>
    <script type="text/javascript" src="js/invoice.js"></script>
    <script type="text/javascript" src="includes/js/CustomerPortal/customerPortal.js"></script> -->