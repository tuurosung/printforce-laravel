<?php
require_once '../../_load.php';
require_once $appLink . 'includes/autoload.php';

$q = new DataBase();
$seagate = new SeaGate();
$expenditure = new Expenditure($q->db, $q->mysqli);

// early exit
if (!isset($_POST)) {
    header('location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

$_POST = array_map([$seagate, 'Clean'], $_POST);

foreach ($_POST as $key => $value) {
    if (empty($value)) {
        $_SESSION['hasErr'] = true;
        $_SESSION['ErrMsg'] = "$key is required";
    }
}

extract($_POST);

// Validate input parameters
if (empty($expenditure_id) || empty($header_id) || empty($description) || $amount < 0 || empty($date) || empty($account_number)) {

    $_SESSION['hasErr'] = true;
    $_SESSION['ErrMsg'] = "Invalid data provided";
    header('location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

if (!$seagate->isDate($date)) {

    $_SESSION['hasErr'] = true;
    $_SESSION['ErrMsg'] = "Invalid date provided";
    header('location: ' . $_SERVER['HTTP_REFERER']);
    exit;

}

$result = $expenditure->update($expenditure_id, $header_id, $description, $amount, $date, $account_number);

if ($result === 'update_successful') {

    $_SESSION['hasMsg'] = true;
    $_SESSION['Msg'] = "Bingo! Expense updated successfully";

} else {

    $_SESSION['hasErr'] = true;
    $_SESSION['ErrMsg'] = $result;

}

header('location: ' . $_SERVER['HTTP_REFERER']);
exit;