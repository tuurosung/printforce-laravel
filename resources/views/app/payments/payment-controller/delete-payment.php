<?php
require_once '../../_load.php';
require_once $appLink . 'includes/autoload.php';

$q = new DataBase();
$seagate = new SeaGate();
$payment = new Payment($q->db, $q->mysqli);

// early exit
if (!isset($_GET)) {
    header('location: ' . $_SERVER['HTTP_REFERER']);
}

// clean the GET variable
$_GET = array_map([$seagate, 'Clean'], $_GET);

$sn = $_GET['sn'];

$result = $payment->delete($sn);

if ($result === 'delete_successful') {
    $_SESSION['hasMsg'] = true;
    $_SESSION['Msg'] = "Bingo! Payment deleted successfully";
} else {
    $_SESSION['hasErr'] = true;
    $_SESSION['ErrMsg'] = $result;
}

header('location: ' . $_SERVER['HTTP_REFERER']);
exit;