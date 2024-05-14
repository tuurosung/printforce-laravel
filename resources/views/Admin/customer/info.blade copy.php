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


                <a class="dropdown-item" href="<?php echo $sideBarLink; ?>jobs/new-largeformat.php?customer_id=<?php echo $customer_id; ?>">Large Format</a>
                <a class="dropdown-item" href="<?php echo $sideBarLink; ?>jobs/new-embroidery.php?customer_id=<?php echo $customer_id; ?>">Embroidery</a>
                <a class="dropdown-item" href="<?php echo $sideBarLink; ?>jobs/new-design.php?customer_id=<?php echo $customer_id; ?>">Design Job</a>
                <a class="dropdown-item" href="<?php echo $sideBarLink; ?>jobs/new-press.php?customer_id=<?php echo $customer_id; ?>">Press Job</a>
                <a class="dropdown-item" href="<?php echo $sideBarLink; ?>jobs/new-photography.php?customer_id=<?php echo $customer_id; ?>">Photography</a>
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

                <a class="dropdown-item" href="<?php echo $sideBarLink; ?>payments/new-payment.php?customer_id=<?php echo $customer_id; ?>">New Payment</a>
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
                <h3 class="card-title Axiforma fw-600 mb-0 text-capitalize"><a><?php echo strtolower($customer->name); ?></a></h3>
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
                        <p class="fw-600 fs-18px Axiforma">GHS <?php echo number_format($customer->debit, 2); ?></p>
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
                        <p class="fw-600 fs-18px Axiforma">GHS <?php echo number_format($customer->credit, 2); ?></p>
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
                        <p class="fw-600 fs-18px Axiforma">GHS <?php echo number_format($customer->balance, 2); ?></p>
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
                        <p class="fw-600 fs-18px Axiforma"><?php echo $customer->totalJobCount; ?></p>
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
                    <?php
                    $i = 1;
                    $total = 0;
                    $jobs_query = $q->mysqli->query(" SELECT * FROM(

                            SELECT job_id,service_id,customer_id,total,date,timestamp FROM jobs_largeformat WHERE subscriber_id='$active_subscriber' AND customer_id='$customer_id'  AND status='active'

                            UNION ALL

                            SELECT job_id,service_id,customer_id,total,date,timestamp FROM jobs_embroidery WHERE subscriber_id='$active_subscriber'   AND customer_id='$customer_id'  AND status='active'

                            UNION ALL

                            SELECT job_id,service_id,customer_id,total,date,timestamp FROM jobs_photography WHERE subscriber_id='$active_subscriber'   AND customer_id='$customer_id'  AND status='active'

                            UNION ALL

                            SELECT job_id,service_id,customer_id,total,date,timestamp FROM jobs_press WHERE subscriber_id='$active_subscriber'   AND customer_id='$customer_id'  AND status='active'

                            UNION ALL

                            SELECT job_id,service_id,customer_id,total,date,timestamp FROM jobs_design WHERE subscriber_id='$active_subscriber'   AND customer_id='$customer_id'  AND status='active'
                            ) r  ORDER BY timestamp desc ");


                    while ($jobs = $jobs_query->fetch_assoc()) {

                        $service->service_id = $jobs['service_id'];
                        $service_info = $service->serviceInfo();

                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $jobs['date']; ?></td>
                            <td><?php echo $service_info['service_name']; ?></td>
                            <td class="text-right"><?php echo $jobs['total']; ?></td>
                            <td class="text-right">
                                <a href="#" class="viewjob" style="text-decoration: none;" id="<?php echo $jobs['job_id']; ?>">
                                    <i class="fas fa-eye mr-3 text-purple  "></i>
                                </a>

                                <a href="#" class="job_card" style="text-decoration: none;" id="<?php echo $jobs['job_id']; ?>">
                                    <i class="fas fa-print text-primary  "></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                        $total += $jobs['total'];
                    }
                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-right Axiforma fw-600 fs-18px"><?php echo  number_format($total, 2); ?></td>
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
                    <?php
                    $i = 1;
                    $total = 0;
                    $today = date('Y-m-d');
                    $query = mysqli_query($db, "SELECT * FROM payments  WHERE status='active' AND subscriber_id='$active_subscriber' AND customer_id='$customer_id'  ") or die(mysqli_error($db));
                    while ($payments = mysqli_fetch_array($query)) {
                        // $customer_info = customer_info($payments['customer_id']);
                        // $account_info = account_info($payments['account_number']);
                    ?>
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
                    <?php
                        $total += (float) $payments['amount_paid'];
                    }
                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-right Axiforma fs-18px fw-600"><?php echo number_format($total, 2); ?></td>
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
                    <?php
                    $i = 1;
                    $query = mysqli_query($db, "SELECT * FROM invoices WHERE subscriber_id='$active_subscriber' AND customer_id='$customer_id'") or die(mysqli_error($db));



                    while ($invoices = mysqli_fetch_array($query)) {
                        $customer->customer_id = $invoices['customer_id'];
                        $customer->CustomerInfo();
                    ?>
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
                    <?php
                    }
                    ?>

                </tbody>
            </table>

        </div>
    </div>
</div>




@endsection

@section('js')

@endsection

<?php
// require main file header
require_once '../_main.php';
?>

<?php
// require core files
require_once '../_load.php';

// check if customer id was passed
if (!isset($_GET) || empty($_GET['customer_id'])) {

    if (isset($_SERVER['HTTP_REFERER'])) {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        header('location: index.php');
    }
}


?>

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
