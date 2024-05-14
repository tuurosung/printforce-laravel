<?php
require_once '_load.php';
require_once $appLink . 'includes/autoload.php';

$q = new DataBase();
$seagate = new SeaGate();
$billing = new Billing($q->db, $q->mysqli);
$subscriber = new Subscriber($q->db, $q->mysqli);
$subscription = new Subscription($q->db, $q->mysqli);
$subscriptionPlan = new SubscriptionPlan($q->db, $q->mysqli);

if (!isset($_GET)) {
    header('location: index.php');
    exit;
}

$_GET = array_map([$seagate, 'Clean'], $_GET);



$invoice_id = $_GET['invoice_id'];
$amount = $_GET['amount'];
$reference = $_GET['reference'];

// invoice info
$invoice_info = $billing->find($invoice_id);

// plan info
$plan_info = $subscriptionPlan->readOne($invoice_info['plan_id']);


$days_cycle = $plan_info['days_cycle'];
$months = $invoice_info['months'];
$subscription_status = $subscriber->subscriptionStatus();

// call renewal funciton
$result = $subscription->renewSubscription($invoice_id, $reference, $days_cycle, $months, $subscription_status);

header('location: index.php');
exit;

?>
