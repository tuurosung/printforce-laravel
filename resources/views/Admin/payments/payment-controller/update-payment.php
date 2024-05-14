<?php
require_once '../../_load.php';
require_once $appLink . 'includes/autoload.php';

// initialize class variables
$q = new DataBase();
$seagate = new SeaGate();
$payment = new Payment($q->db, $q->mysqli);

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

$result = $payment->update($payment_id, $customer_id, $amount_paid, $date, $account_number);

if ($result == 'update_successful') {

    $_SESSION['hasMsg'] = true;
    $_SESSION['Msg'] = "Bingo! Payment information updated successful";

} else {

    $_SESSION['hasErr'] = true;
    $_SESSION['ErrMsg'] = $result;

}

header('location: ' . $_SERVER['HTTP_REFERER']);
exit;