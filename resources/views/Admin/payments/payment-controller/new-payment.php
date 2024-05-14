<?php
require_once '../../_load.php';
require_once $appLink . 'includes/autoload.php';

// initialize class variables
$q = new DataBase();
$seagate = new SeaGate();
$payment = new Payment($q->db, $q->mysqli);
$subscriber = new Subscriber($q->db, $q->mysqli);
$customer = new Customer($q->db, $q->mysqli);
$messaging = new Messaging();

// early exit
if (!isset($_POST)) {
    header('location: ' . $_SERVER['HTTP_REFERER']);
}

$_POST = array_map([$seagate, 'Clean'], $_POST);

// array of parameters that are optional
// $optional = ['notes'];

foreach ($_POST as $key => $value) {
    if (empty($value)) {
        $_SESSION['hasErr'] = true;
        $_SESSION['ErrMsg'] = "$key is required";
        header('location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}

extract($_POST);

$result = $payment->create($amount_paid, $date, $customer_id, $account_number);

if ($result == 'save_successful') {

    // get subscriber information
    $subscriber->SubscriberInfo();
    $company_name = $subscriber->company_name;

    // get customer information and prepare phone number for SMS
    $customer->customer_id = $customer_id;
    $phone_number = $customer->customerPhone();

    // message to send to customer
    $payment_success = "Your payment of GHS" . $amount_paid . "  to " . $company_name . " was successful. Powered By PrintForce | www.printforcepos.com. Sign up for free today.";

    // pass parameters to Messaging class and call send method
    $messaging->to = $phone_number;
    $messaging->message = $payment_success;
    // $messaging->send(); // send message to customer


    $_SESSION['hasMsg'] = true;
    $_SESSION['Msg'] = "Bingo! Payment successful";

} else {
    $_SESSION['hasErr'] = true;
    $_SESSION['ErrMsg'] = $result;
}

header('location: ' . $_SERVER['HTTP_REFERER']);
exit;