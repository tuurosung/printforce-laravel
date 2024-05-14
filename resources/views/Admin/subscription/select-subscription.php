<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// if invoice is already generated
if ($_SESSION['hasActiveInvoice'] === true && !empty($_SESSION['invoice_id'])) {
    header('location: secure-payment.php?invoice_id='.$_SESSION['invoice_id']);
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

$subscriber->SubscriberInfo();

if (!isset($_GET) || empty($_GET['plan_id'])) : ?>

    <script type="text/javascript">
        window.location = 'subscription-expired.php';
    </script>

<?php endif; ?>

<?php

$_GET = array_map([$seagate, 'Clean'], $_GET);

$plan_id = $_GET['plan_id'];

$plan_info = $subscriptionPlan->readOne($plan_id);


?>






<div class="app-content">

    <div class="d-flex justify-content-center">
        <div class="col-12 col-lg-8 col-md-8">

            <h2 class="montserrat mb-1">Subscription</h2>
            <p>Buy a subscription to keep enjoying PrintForce</p>

            <div class="row mt-5">

                <div class="col-md-4">


                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body">

                            <h5 class="Axiforma fw-700 text-primary fs-23px"><?php echo $plan_info['name']; ?></h5>
                            <p class="mb-5"><?php echo $plan_info['description']; ?></p>

                            <h5 class="Axiforma fs-40px fw-700 mb-5">GHS <?php echo $plan_info['price']; ?> <small class="fs-12px text-body text-opacity-50">/month*</small></h5>



                            <div class="mb-5">

                                <div class="d-flex align-items-center mb-1">
                                    <i class="fas fa-check fa-lg text-danger"></i>

                                    <div class="flex-1 ps-3">
                                        <span class="l"> 100 SMS Credits </span>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center mb-1">
                                    <i class="fas fa-check fa-lg text-danger"></i>

                                    <div class="flex-1 ps-3">
                                        <span class="l"> 100 SMS Credits </span>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4 mb-md-0">

                    <div class="card" style="border-radius:15px">
                        <div class="card-body">

                            <form id="" method="POST" action="subscription/controller/checkout.php" autocomplete="off">

                                <input type="text" name="subscriber_id" value="<?php echo $subscriber->active_subscriber; ?>" class="form-control d-none">
                                <input type="text" name="plan_id" id="plan_id" value="<?php echo $plan_id; ?>" class="form-control d-none">
                                <input type="text" name="price" id="price" value="<?php echo $plan_info['price']; ?>" class="form-control d-none">

                                <h4 class="Axiforma fw-700 text-primary fs-23px">Checkout</h4>

                                <div class="form-group">
                                    <label for="">Subscription Account</label>
                                    <input type="text" name="" id="" class="form-control" placeholder="" value="<?php echo $subscriber->company_name; ?>" readonly>
                                </div>

                                <div class="row">

                                    <div class="col-md-6 mb-4 mb-md-0">

                                        <div class="form-group">
                                            <label for="">Full Name</label>
                                            <input type="text" name="fullname" id="fullname" class="form-control" placeholder="" required>
                                        </div>

                                    </div>

                                    <div class="col-md-6 mb-4 mb-md-0">

                                        <div class="form-group">
                                            <label for="">Phone Number</label>
                                            <input type="text" name="phoneNumber" id="phoneNumber" class="form-control" placeholder="" required>
                                        </div>

                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" required>
                                </div>

                                <div class="row">

                                    <div class="col-md-6 mb-4 mb-md-0">

                                        <div class="form-group">
                                            <label for="">Months</label>
                                            <input type="number" step="1" min="1" name="months" value="1" id="months" class="form-control" placeholder="">
                                        </div>

                                    </div>

                                    <div class="col-md-6 mb-4 mb-md-0">

                                        <div class="form-group">
                                            <label for="">Total</label>
                                            <input type="number" name="total" id="total" class="form-control Axiforma fw-600" value="<?php echo number_format($plan_info['price'], 2); ?>" required readonly>
                                        </div>

                                    </div>

                                </div>

                                <span><i class="fas fa-lock text-success"></i> Secured By Ui8 Systems</span>



                                <div class="d-flex justify-content-between">
                                    <div></div>
                                    <div>
                                        <button type="submit" class="btn btn-primary mr-0"><i class="fas fa-check mr-3  "></i> Complete Subscription</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>





</div>

</div>



<?php require_once('../navigation/main/footer.php'); ?>

</body>

<script type="text/javascript">
    $('#months').on('mouseup keyup', function() {

        const price = parseFloat($('#price').val())
        var months = parseInt($('#months').val())

        var total = parseFloat(price * months);

        $('#total').val(total.toFixed(2));

    })
</script>

</html>