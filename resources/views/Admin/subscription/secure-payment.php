<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


// require core files
require_once '../_load.php';
require_once $appLink . 'navigation/header.php';
// include_once $appLink . 'navigation/Topnav/_blanktopbar.php';

// require menu
require_once '_menu.php';

// initialize variables
$subscriptionPlan = new SubscriptionPlan($q->db, $q->mysqli);
$subscriber = new Subscriber($q->db, $q->mysqli);
$billing = new Billing($q->db, $q->mysqli);

$subscriber->SubscriberInfo();

if (!isset($_GET) || empty($_GET['invoice_id'])) : ?>

    <script type="text/javascript">
        window.location = 'subscription-expired.php';
    </script>

<?php endif; ?>

<?php

$_GET = array_map([$seagate, 'Clean'], $_GET);

$invoice_id = $_GET['invoice_id'];
// $plan_info = $subscriptionPlan->readOne($plan_id);
$invoice_info = $billing->find($invoice_id);

?>

<!-- <div class="app-content"> -->

<div class="d-flex justify-content-center mt-5">
    <div class="col-12 col-lg-3 col-md-6">

        <div class="card" style="border-radius:15px">
            <div class="card-body">

                <div class="d-flex justify-content-between mb-5">
                    <div>
                        <p class="mb-1 fs-18px Axiforma text-primary">Invoice</p>
                        <div>
                            <p class="fw-600">PrintForce LTD</p>
                            <p>Office 06, Farhabink Storey</p>
                            <p>Tamale, Northern Region</p>
                        </div>
                    </div>
                    <div class="Axiforma fs-20px fw-500">
                        <img src="<?php echo $staticLink; ?>images/SiteIcon.svg">

                    </div>
                </div>



                <div class="mb-5">
                    <h5>Bill To:</h5>
                    <p class="fw-500"><?php echo $invoice_info['full_name']; ?></p>
                    <p><?php echo $subscriber->company_name; ?></p>
                    <p><?php echo $invoice_info['phone_number']; ?> | <?php echo $invoice_info['email']; ?> </p>
                    <p></p>
                </div>



                <form id="" method="POST" action="#" autocomplete="off">

                    <input type="text" name="subscriber_id" value="<?php echo $subscriber->active_subscriber; ?>" class="form-control d-none">
                    <input type="text" name="tx_ref" id="tx_ref" value="<?php echo $invoice_id; ?>" class="form-control d-none">
                    <input type="text" name="amount" id="amount" value="<?php echo $invoice_info['total']; ?>" class="form-control d-none">

                    <input type="text" name="phone_number" id="phone_number" value="<?php echo $invoice_info['phone_number']; ?>" class="form-control d-none">
                    <input type="text" name="full_name" id="full_name" value="<?php echo $invoice_info['full_name']; ?>" class="form-control d-none">
                    <input type="text" name="email" id="email" value="<?php echo $invoice_info['email']; ?>" class="form-control d-none">


                    <p>Amount Payable</p>
                    <h5 class=" mb-5"> GHS <?php echo number_format($invoice_info['total'], 2); ?> <small class="fs-12px text-body text-opacity-50"></small></h5>





                    <div class="d-flex justify-content-between mb-3">
                        <div></div>
                        <div>

                            <button type="button" class="btn btn-outline-danger">Cancel Transaction</button>
                            <button type="button" id="payBtn" class="btn btn-primary mr-0"><i class="fas fa-credit-card mr-3  "></i> Make Payment</button>
                        </div>
                    </div>
                    <span><i class="fas fa-lock text-success"></i> Secured By Ui8 Systems</span>

                </form>

            </div>
        </div>
    </div>
</div>





</div>

</div>

<div id="modal_holder"></div>


<?php require_once$appLink.'navigation/main/footer.php'; ?>

</body>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script type="text/javascript">
    $('#payBtn').on("click", function() {
        const invoice_id = '<?php echo $invoice_info['invoice_id']; ?>'
        const email = '<?php echo $invoice_info['email']; ?>'
        const amount = '<?php echo number_format($invoice_info['total'], 2); ?>'

        $.post("payment-prompt.php", {
                invoice_id,
                email,
                amount
            },
            function(data) {
                $('#modal_holder').html(data);
            }
        );
    })
</script>


</html>