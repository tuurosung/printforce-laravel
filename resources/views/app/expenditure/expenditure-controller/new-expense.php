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

$result = $expenditure->create($header_id, $description, $amount, $date, $account_number);

if ($result === 'save_successful') {

    $_SESSION['hasMsg'] = true;
    $_SESSION['Msg'] = "Bingo! Expense created successfully";

} else {

    $_SESSION['hasErr'] = true;
    $_SESSION['ErrMsg'] = $result;

}

header('location: ' . $_SERVER['HTTP_REFERER']);
exit;