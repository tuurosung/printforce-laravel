<?php
// require core files
require_once '../_load.php';

// check if payment id was passed
if (!isset($_GET) || empty($_GET['account_number'])) {

    if (isset($_SERVER['HTTP_REFERER'])) {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        header('location: index.php');
    }
}

require_once $appLink . 'navigation/header.php';
require_once $appLink . 'navigation/admin_nav.php';

// subscription control code
require_once $appLink . 'app/_bounce.php';

// require menu
require_once '_menu.php';

?>

<?php

$account = new Account($q->db, $q->mysqli);
$customer = new Customer($q->db, $q->mysqli);
$payment = new Payment($q->db, $q->mysqli);
$transfer = new Transfer($q->db, $q->mysqli);
$expenditure = new Expenditure($q->db, $q->mysqli);

// clean the GET variable
$_GET = array_map([$seagate, 'Clean'], $_GET);

$account_number = $_GET['account_number'];

$account->account_number = $account_number;
$info = $account->AccountInfo();

$summary = $account->AccountSummary();

?>


<div class="app-content">

    <div class="d-flex justify-content-between mb-5">
        <div class="">
            <p>Account Transactions</p>
            <h2 class="titles montserrat"><?php echo $info['account_name']; ?></h2>
        </div>
        <div class="">
            <form class="form-inline" id="account_statement_frm">
                <div class="form-group mr-3">
                    <input type="text" class="form-control bg-white" id="start_date" placeholder="<?php echo $month_start; ?>">
                </div>
                <div class="form-group mr-3">
                    <input type="text" class="form-control bg-white" id="end_date" placeholder="<?php echo $month_end; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Generate Report</button>
                <button type="submit" class="btn btn-primary">Print</button>
            </form>
        </div>
    </div>


    <div class="row mb-3">

        <div class="col-2">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-2 d-flex justify-content-center align-items-center">
                            <i class="fas fa-equals fa-2x text-primary"></i>
                        </div>

                        <div class="col-10">
                            <p class="fw-600 fs-18px Axiforma">GHS <?php echo number_format($account->total_payments, 2); ?></p>
                            <p>Payments</p>
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
                            <i class="fas fa-coins fa-2x text-primary"></i>
                        </div>

                        <div class="col-10">
                            <p class="fw-600 fs-18px Axiforma">GHS <?php echo number_format($account->total_transfers_received, 2); ?></p>
                            <p>Received Transfers</p>
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
                            <i class="fas fa-chart-line fa-2x text-purple"></i>
                        </div>

                        <div class="col-10">
                            <p class="fw-600 fs-18px Axiforma">GHS <?php echo number_format($account->total_expenditure, 2); ?></p>
                            <p>Expenses</p>
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
                            <i class="fas fa-chart-pie fa-2x text-warning"></i>
                        </div>

                        <div class="col-10">
                            <p class="fw-600 fs-18px Axiforma">GHS <?php echo number_format($account->total_transfers, 2); ?></p>
                            <p>Transfers</p>
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
                            <i class="fas fa-chart-pie fa-2x text-warning"></i>
                        </div>

                        <div class="col-10">
                            <p class="fw-600 fs-18px Axiforma">GHS <?php echo number_format($account->account_balance, 2); ?></p>
                            <p>Balance</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- tab v2 with card -->
    <div class="card">
        <ul class="nav nav-tabs nav-tabs-v2 ps-4 pe-4">
            <li class="nav-item me-3"><a href="#summary" class="nav-link active" data-toggle="tab">Summary</a></li>
            <li class="nav-item me-3"><a href="#payments" class="nav-link" data-toggle="tab">Payments</a></li>
            <li class="nav-item me-3"><a href="#inboundtransfers" class="nav-link" data-toggle="tab">Inbound Transfers</a></li>
            <li class="nav-item me-3"><a href="#expenses" class="nav-link" data-toggle="tab">Expenses</a></li>
            <li class="nav-item me-3"><a href="#outbound" class="nav-link" data-toggle="tab">Outbound Transfers</a></li>
        </ul>
        <div class="tab-content p-4">

            <div class="tab-pane fade show active" id="summary">
                <h6 class="mb-5">Payments Received</h5>

                    <table class="table table-secondary">
                        <thead class="font-weight-bold">
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Trans. ID</th>
                                <th>Description</th>
                                <th class="text-right">Debit</th>
                                <th class="text-right">Credit</th>
                                <th class="text-right">Balance</th>
                                <th>Narration</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $i = 1;
                            $credit = $debit = $credit_t = $debit_t = $balance = 0;

                            $opening_balances = $q->mysqli->query("SELECT * FROM add_funds WHERE transaction_type='opening' AND subscriber_id='" . $active_subscriber . "' AND account_number='" . $account_number . "'");

                            while ($opening = $opening_balances->fetch_assoc()) {

                                $balance = $balance + (float) $opening['amount'];
                            ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $opening['date']; ?></td>
                                    <td><?php echo $opening['transaction_id']; ?></td>
                                    <td>Opening Balance</td>
                                    <td class="text-right"><?php echo number_format($opening['amount'], 2); ?></td>
                                    <td class="text-right"><?php echo number_format($history['debit'], 2); ?></td>
                                    <td class="text-right font-weight-bold"><?php echo number_format($balance, 2); ?></td>
                                    <td class="pl-3">Balance Before Transactions</td>
                                </tr>
                            <?php
                            }
                            ?>

                            <?php


                            $query = $q->mysqli->query("
                                    SELECT * FROM (

                                        SELECT payment_date as date, payment_id as trans_id,'Income' as type,'Job Payments' as notes, amount_paid as credit,'-' as debit, timestamp FROM payments WHERE account_number='$account_number' AND subscriber_id='$active_subscriber' AND status = 'active'

                                        UNION ALL

                                        SELECT date as date, expenditure_id as trans_id,'Expenditure' as type,description as notes, '' as credit,amount as debit, timestamp FROM expenditure WHERE account_number='$account_number' AND subscriber_id='$active_subscriber' AND status='active'

                                        UNION ALL

                                        SELECT date as date, payment_id as trans_id,'Creditor Payment' as type,'Payment To Supplier For Purchase' as notes, '' as credit,amount_paid as debit, timestamp FROM purchase_payments WHERE account_number='$account_number' AND subscriber_id='$active_subscriber' and status='active'

                                        UNION ALL

                                        SELECT date as date, transfer_id as trans_id,'Transfer-In' as type,notes as notes, amount as credit,'-' as debit, timestamp FROM fund_transfers WHERE destination_account='$account_number' AND subscriber_id='$active_subscriber' AND status='active'

                                        UNION ALL

                                        SELECT date as date, transfer_id as trans_id,'Transfer-Out' as type,notes as notes, '-' as credit,amount as debit, timestamp FROM fund_transfers WHERE source_account='$account_number' AND subscriber_id='$active_subscriber' AND status='active'

                                    ) r ORDER BY date DESC

                             ");

                            while ($history = $query->fetch_assoc()) {

                                $debit = (float) $history['debit'];
                                $credit = (float) $history['credit'];

                                if ($history['type'] == 'Income' || $history['type'] == 'Transfer-In') {

                                    $balance = $balance + $credit;
                                } elseif ($history['type'] == 'Expenditure' || $history['type'] == 'Transfer-Out' || $history['type'] == 'Creditor Payment') {

                                    $balance = $balance - $debit;
                                }

                                // $source=account_info($transfers['source_account']);
                                // $destination=account_info($transfers['destination_account']);
                            ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $history['date']; ?></td>
                                    <td><?php echo $history['trans_id']; ?></td>
                                    <td><?php echo $history['type']; ?></td>
                                    <td class="text-right"><?php echo number_format($credit, 2); ?></td>
                                    <td class="text-right"><?php echo number_format($debit, 2); ?></td>

                                    <td class="text-right font-weight-bold">
                                        <?php echo number_format($balance, 2); ?>
                                    </td>
                                    <td class="pl-3">
                                        <?php echo $history['notes']; ?>
                                    </td>

                                </tr>
                            <?php
                                $credit_t += $credit;
                                $debit_t += $debit;
                            }
                            ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class=" text-right fs-18px Axiforma fw-600"><?php echo number_format($debit_t, 2); ?></td>
                                <td class=" text-right fs-18px Axiforma fw-600"><?php echo number_format($credit_t, 2); ?></td>
                                <td class=" text-right fs-18px Axiforma fw-600"><?php echo number_format($balance, 2); ?></td>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>

            </div>


            <div class="tab-pane fade show" id="payments">

                <h6 class="mb-5">Payments Received</h5>

                    <table class="table table-secondary">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Account</th>
                                <th class="text-right">Amount</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            (float) $total_paid = 0;


                            $payment_history = $payment->filterByDate('', '', 'all', $account_number); // get payments made into this account

                            if (is_array($payment_history)) :
                                foreach ($payment_history as $rows) {

                            ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $rows['payment_date']; ?> | <?php if (!empty($rows['timestamp'])) {
                                                                                        echo date('H:i:s', $rows['timestamp']);
                                                                                    } ?></td>
                                        <td><?php echo $rows['customer_name']; ?></td>
                                        <td><?php echo $rows['account_name']; ?></td>
                                        <td class="text-right"><?php echo number_format($rows['amount_paid'], 2); ?></td>

                                    </tr>
                            <?php
                                    $total_paid += $rows['amount_paid'];
                                    // $total_balance+=$rows['balance'];
                                    // $update_balance=mysqli_query($db,"UPDATE ledger_transactions SET balance=balance+$debit WHERE sn='".$sn."'") or die(mysqli_error($db));
                                    // $update_balance=mysqli_query($db,"UPDATE ledger_transactions SET balance=balance+$credit WHERE sn='".$sn."'") or die(mysqli_error($db));
                                }
                            endif;
                            ?>
                            <tr class="">
                                <td colspan="4"></td>
                                <td class="text-right Axiforma" style="font-size:16px !important; font-weight:500">
                                    <?php echo number_format($total_paid, 2); ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>


            <div class="tab-pane fade" id="inboundtransfers">
                <h6 class="mb-5">Inbound Transfers</h5>

                    <table class="table table-secondary">
                        <thead>
                            <tr>
                                <th>Date / Time</th>
                                <th>Description</th>
                                <th>Deposit Account</th>
                                <th class="text-right">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            (float) $total_deposits = 0;

                            $list = $transfer->filterByDirection('', '', $account_number, 'inbound');

                            if (is_array($list)) :
                                foreach ($list as $rows) {

                            ?>
                                    <tr>
                                        <td><?php echo $rows['date']; ?>></td>
                                        <td><?php echo $rows['notes']; ?></td>
                                        <td><?php echo $account->account_name; ?></td>
                                        <td class="text-right"><?php echo number_format($rows['amount'], 2); ?></td>
                                    </tr>
                            <?php

                                    $total_deposits += $rows['amount'];
                                }
                            endif;
                            ?>
                            <tr class="">
                                <td colspan="3"></td>
                                <td class="text-right" style="font-size:16px !important; font-weight:500"><?php echo number_format($total_deposits, 2); ?></td>
                            </tr>
                        </tbody>
                    </table>
            </div>


            <div class="tab-pane fade" id="expenses">

                <p class="mb-5 Axiforma fs-23px fw-500">Expenditure History</p>

                <table class="table table-secondary">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Header</th>
                            <th>Description</th>
                            <th>Account</th>
                            <th class="text-right">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        (float) $total_expenditure = 0;

                        $list = $expenditure->filterByPeriod('', '', 'all', $account_number);

                        if (is_array($list)) :
                            $headers = $expenditure->getHeaders();
                            foreach ($list as $rows) {

                        ?>
                                <tr class="">
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $rows['date']; ?></td>
                                    <td><?php echo $rows['header_name']; ?></td>
                                    <td>
                                        <?php echo ucwords(mb_strtolower($rows['description'])); ?><br>
                                    </td>
                                    <td><?php echo $account->accounts_array[$rows['account_number']]; ?></td>
                                    <td class="text-right"><?php echo number_format($rows['amount'], 2); ?></td>

                                </tr>
                        <?php
                                $total_expenditure += $rows['amount'];
                            }
                        endif;
                        ?>
                        <tr class="">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right Axiforma" style="font-size:16px !important; font-weight:500"><?php echo number_format($total_expenditure, 2); ?></td>
                        </tr>
                    </tbody>
                </table>

            </div>


            <div class="tab-pane fade" id="outbound">
                <h6 class="mb-5">Outbound Transfers</h6>

                <table class="table table-secondary">
                    <thead>
                        <tr>
                            <th>Date / Time</th>
                            <th>Description</th>
                            <th>Deposit Account</th>
                            <th class="text-right">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        (float) $total_deposits = 0;

                        $list = $transfer->filterByDirection('', '', $account_number, 'outbound');
                        if (is_array($list)) :
                            foreach ($list as $rows) {

                        ?>
                                <tr>
                                    <td><?php echo $rows['date']; ?></td>
                                    <td><?php echo $rows['notes']; ?></td>
                                    <td><?php echo $rows['destination_account_name']; ?></td>
                                    <td class="text-right"><?php echo number_format($rows['amount'], 2); ?></td>
                                </tr>
                        <?php
                                $total_deposits += $rows['amount'];
                            }
                        endif;
                        ?>
                        <tr class="font-weight-bold">
                            <td colspan="3"></td>
                            <td class="text-right" style="font-size:16px !important; font-weight:500"><?php echo number_format($total_deposits, 2); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>


        </div>
    </div>





    <div id="modal_holder"></div>

    <?php require_once $appLink . 'navigation/main/footer.php'; ?>


    <script type="text/javascript">
        $('#date').datepicker()
        $('.list-group-item').removeClass('active')
        $('#reports_nav').addClass('active')

        $('#date').on('change', function(event) {
            event.preventDefault();
            $(this).datepicker('hide')
        });



        $('.accounts').on('click', function(event) {
            event.preventDefault();
            var account_number = $(this).attr('ID')
            $.ajax({
                url: '../serverscripts/restadmin/account_history.php?account_number=' + account_number,
                type: 'GET',
                success: function(msg) {
                    $('#data_holder').html(msg)
                    $('html, body').animate({
                        scrollTop: $("#data_holder").offset().top
                    }, 2000);

                }
            })
        });



        $('.transfer_funds').on('click', function(event) {
            event.preventDefault();
            var account_number = $(this).attr("ID")
            $.ajax({
                url: '../serverscripts/restadmin/transfer_funds_modal.php?account_number=' + account_number,
                type: 'GET',
                success: function(msg) {
                    $('#modal_holder').html(msg)
                    $('#transfer_funds_modal').modal('show')

                    $('#transfer_funds_frm').on('submit', function(event) {
                        event.preventDefault();
                        bootbox.confirm('Do you want to proceed with this transaction?', function(r) {
                            if (r === true) {
                                $.ajax({
                                    url: '../serverscripts/restadmin/transfer_funds_frm.php',
                                    type: 'GET',
                                    data: $('#transfer_funds_frm').serialize(),
                                    success: function(msg) {
                                        if (msg === 'save_successful') {
                                            bootbox.alert('Transfer Successful', function() {
                                                window.location.reload()
                                            })
                                        } else {
                                            bootbox.alert(msg)
                                        }
                                    }
                                })
                            }
                        })
                    });
                }
            })
        });
    </script>
    </body>

    </html>