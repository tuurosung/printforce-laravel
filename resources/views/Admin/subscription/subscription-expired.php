<?php

// require core files
require_once '../_load.php';
require_once $appLink.'navigation/header.php';
include_once $appLink.'navigation/Topnav/_blanktopbar.php';

// require menu
require_once '_menu.php';

$subscriber = new Subscriber($q->db, $q->mysqli);
$billing = new Billing($q->db, $q->mysqli);

$subscriber->SubscriberInfo();

$subscriber_id = $subscriber->active_subscriber;

?>


<div class="app-content" style="margin-right:15rem">

    <div class="card border-0 theme-gray-600 rounded-4 mb-4" data-bs-theme="dark">
        <div class="card-body py-5">

            <h1 class="Axiforma fw-600">Errrmmm! Looks like your has subscription expired</h1>

            <p class="fs-15px montserrat font-weight-bold">Not to worry, your data is safe with us.  </p>
            <p class="m-0">
                Please renew your subscription to continue enjoying PrintForce.
            </p>

        </div>
    </div>


    <?php if (is_array($billing->myInvoices($subscriber_id))) : ?>

        <div>
            <h5 class="Axiforma">Invoices </h5>
            <div class="list-group list-group-flush">

                <li href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex  fw-600">
                        <div class="col-1">#</div>
                        <div class="col-2">Invoice ID</div>
                        <div class="col-3">Date Created</div>
                        <div class="col-1">Price</div>
                        <div class="col-1">Months</div>
                        <div class="col-1">Total</div>
                        <div class="col-2">Status</div>
                        <div class="col-1">
                            Option
                        </div>
                    </div>
                </li>
                <?php
                $i = 1;
                ?>
                <?php foreach ($billing->myInvoices($subscriber_id) as $invoice) : ?>
                    <li href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex">
                            <div class="col-1"><?php echo $i++; ?></div>
                            <div class="col-2"><?php echo $invoice['invoice_id']; ?></div>
                            <div class="col-3"><?php echo $invoice['date_created']; ?></div>
                            <div class="col-1"><?php echo number_format($invoice['price'], 2); ?></div>
                            <div class="col-1"><?php echo $invoice['months']; ?></div>
                            <div class="col-1"><?php echo number_format($invoice['total'], 2); ?></div>
                            <div class="col-2"><?php echo $invoice['payment_status']; ?></div>
                            <div class="col-1">
                                <a href="secure-payment.php?invoice_id=<?php echo $invoice['invoice_id']; ?>">
                                    <i class="fas fa-credit-card text-indigo"></i> <span> Pay </span>
                                </a>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>

            </div>


        </div>

    <?php endif; ?>




    <div class="row gx-4 py-5" data-bs-theme="dark">

        <div class="col-xl-3 col-md-6 py-3 py-xl-5">

            <div class="card border-0 rounded-4 h-100">
                <div class="card-body fs-14px p-30px d-flex flex-column">
                    <div class="d-flex align-items-center">
                        <div class="flex-1">
                            <div class="h5 Axiforma ">Free Plan</div>
                            <div class="display-6 fw-bold mb-0 Axiforma">GHS 1 <small class="h5 text-body text-opacity-50">/month*</small></div>
                        </div>
                        <div>
                            <span class="iconify display-4 text-gray-500 rounded-3" data-icon="solar:usb-bold-duotone"></span>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <div class="mb-5 text-body text-opacity-75 flex-1">
                        <div class="d-flex align-items-center mb-1">
                            <i class="fa fa-check fa-lg text-gray-500"></i>
                            <div class="flex-1 ps-3"><span class="font-monospace small">Customers:</span> <b class="text-body">10 GB</b></div>
                        </div>
                        <div class="d-flex align-items-center mb-1">
                            <i class="fa fa-check fa-lg text-gray-500"></i>
                            <div class="flex-1 ps-3"><span class="font-monospace small">Job Registrations:</span> <b class="text-body">100 GB</b></div>
                        </div>
                        <div class="d-flex align-items-center mb-1">
                            <i class="fa fa-check fa-lg text-gray-500"></i>
                            <div class="flex-1 ps-3"><span class="font-monospace small">SMS Credits:</span> <b class="text-body">1</b></div>
                        </div>
                        <div class="d-flex align-items-center mb-1">
                            <i class="fa fa-check fa-lg text-gray-500"></i>
                            <div class="flex-1 ps-3"><span class="font-monospace small">SSL Certificate:</span> <b class="text-body"> Shared</b></div>
                        </div>
                        <div class="d-flex align-items-center mb-1">
                            <i class="fa fa-check fa-lg text-gray-500"></i>
                            <div class="flex-1 ps-3"><span class="font-monospace small">Email Accounts:</span> <b class="text-body"> 5</b></div>
                        </div>
                        <div class="d-flex align-items-center mb-1">
                            <i class="fa fa-check fa-lg text-gray-500"></i>
                            <div class="flex-1 ps-3"><span class="font-monospace small">24/7 Support:</span> <b class="text-body"> Yes</b></div>
                        </div>
                        <div class="d-flex align-items-center mb-1">
                            <i class="fa fa-times fa-lg text-body text-opacity-25"></i>
                            <div class="flex-1 ps-3"><span class="font-monospace small">Backup:</span> <b class="text-body"> Daily</b></div>
                        </div>
                        <div class="d-flex align-items-center mb-1">
                            <i class="fa fa-times fa-lg text-body text-opacity-25"></i>
                            <div class="flex-1 ps-3"><span class="font-monospace small">Uptime Guarantee:</span> <b class="text-body"> 99.9%</b></div>
                        </div>
                        <div class="d-flex align-items-center mb-1">
                            <i class="fa fa-times fa-lg text-body text-opacity-25"></i>
                            <div class="flex-1 ps-3"><span class="font-monospace small">FTP Access:</span> <b class="text-body"> Yes</b></div>
                        </div>
                        <div class="d-flex align-items-center mb-1">
                            <i class="fa fa-times fa-lg text-body text-opacity-25"></i>
                            <div class="flex-1 ps-3"><span class="font-monospace small">Control Panel:</span> <b class="text-body"> cPanel</b></div>
                        </div>
                        <div class="d-flex align-items-center mb-1">
                            <i class="fa fa-times fa-lg text-body text-opacity-25"></i>
                            <div class="flex-1 ps-3"><span class="font-monospace small">Free Domain:</span> <b class="text-body"> No</b></div>
                        </div>
                        <div class="d-flex align-items-center mb-1">
                            <i class="fa fa-times fa-lg text-body text-opacity-25"></i>
                            <div class="flex-1 ps-3"><span class="font-monospace small">Firewall:</span> <b class="text-body"> No</b></div>
                        </div>
                    </div>
                    <div class="mx-n2">
                        <a href="select-subscription.php?plan_id=40af6e15dce0" class="btn btn-light btn-lg w-100 Axiforma fw-400"> Buy Subscription <i class="fas fa-long-arrow-alt-right ml-3"></i></a>
                    </div>
                </div>
            </div>
        </div>


        <!--  Premium Column -->
        <div class="col-xl-3 col-md-6 py-3 py-xl-5">

            <div class="card border-0 rounded-4 h-100 bg-primary">
                <div class="card-body fs-14px p-30px d-flex flex-column">
                    <div class="d-flex align-items-center">
                        <div class="flex-1">
                            <div class="h5 Axiforma ">Premium Plan</div>
                            <div class="display-6 fw-bold mb-0 Axiforma">GHS 150 <small class="h5 text-body text-opacity-50">/month*</small></div>
                        </div>
                        <div>
                            <span class="iconify display-4 text-gray-500 rounded-3" data-icon="solar:usb-bold-duotone"></span>
                        </div>
                    </div>
                    <hr class="my-4" />
                    <div class="mb-5 text-body text-opacity-75 flex-1">
                        <div class="d-flex align-items-center mb-1">
                            <i class="fa fa-check fa-lg text-gray-500"></i>
                            <div class="flex-1 ps-3"><span class="font-monospace small">Storage:</span> <b class="text-body">10 GB</b></div>
                        </div>
                        <div class="d-flex align-items-center mb-1">
                            <i class="fa fa-check fa-lg text-gray-500"></i>
                            <div class="flex-1 ps-3"><span class="font-monospace small">Bandwidth:</span> <b class="text-body">100 GB</b></div>
                        </div>
                        <div class="d-flex align-items-center mb-1">
                            <i class="fa fa-check fa-lg text-gray-500"></i>
                            <div class="flex-1 ps-3"><span class="font-monospace small">Domain Names:</span> <b class="text-body">1</b></div>
                        </div>
                        <div class="d-flex align-items-center mb-1">
                            <i class="fa fa-check fa-lg text-gray-500"></i>
                            <div class="flex-1 ps-3"><span class="font-monospace small">SSL Certificate:</span> <b class="text-body"> Shared</b></div>
                        </div>
                        <div class="d-flex align-items-center mb-1">
                            <i class="fa fa-check fa-lg text-gray-500"></i>
                            <div class="flex-1 ps-3"><span class="font-monospace small">Email Accounts:</span> <b class="text-body"> 5</b></div>
                        </div>
                        <div class="d-flex align-items-center mb-1">
                            <i class="fa fa-check fa-lg text-gray-500"></i>
                            <div class="flex-1 ps-3"><span class="font-monospace small">24/7 Support:</span> <b class="text-body"> Yes</b></div>
                        </div>
                        <div class="d-flex align-items-center mb-1">
                            <i class="fa fa-times fa-lg text-body text-opacity-25"></i>
                            <div class="flex-1 ps-3"><span class="font-monospace small">Backup:</span> <b class="text-body"> Daily</b></div>
                        </div>
                        <div class="d-flex align-items-center mb-1">
                            <i class="fa fa-times fa-lg text-body text-opacity-25"></i>
                            <div class="flex-1 ps-3"><span class="font-monospace small">Uptime Guarantee:</span> <b class="text-body"> 99.9%</b></div>
                        </div>
                        <div class="d-flex align-items-center mb-1">
                            <i class="fa fa-times fa-lg text-body text-opacity-25"></i>
                            <div class="flex-1 ps-3"><span class="font-monospace small">FTP Access:</span> <b class="text-body"> Yes</b></div>
                        </div>
                        <div class="d-flex align-items-center mb-1">
                            <i class="fa fa-times fa-lg text-body text-opacity-25"></i>
                            <div class="flex-1 ps-3"><span class="font-monospace small">Control Panel:</span> <b class="text-body"> cPanel</b></div>
                        </div>
                        <div class="d-flex align-items-center mb-1">
                            <i class="fa fa-times fa-lg text-body text-opacity-25"></i>
                            <div class="flex-1 ps-3"><span class="font-monospace small">Free Domain:</span> <b class="text-body"> No</b></div>
                        </div>
                        <div class="d-flex align-items-center mb-1">
                            <i class="fa fa-times fa-lg text-body text-opacity-25"></i>
                            <div class="flex-1 ps-3"><span class="font-monospace small">Firewall:</span> <b class="text-body"> No</b></div>
                        </div>
                    </div>
                    <div class="mx-n2">
                        <a href="select-subscription.php?plan_id=745e27fb8c4a" class="btn btn-light btn-lg w-100 Axiforma fw-400">Buy Subscription <i class="fas fa-long-arrow-alt-right ml-3"></i></a>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>

</div>



<?php require_once $appLink.'navigation/main/footer.php'; ?>

</body>

<script type="text/javascript">

</script>

</html>