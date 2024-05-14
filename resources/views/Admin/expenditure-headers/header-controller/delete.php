<?php
require_once '../../_load.php';
require_once $appLink . 'includes/autoload.php';

$q = new DataBase();
$seagate = new SeaGate();
$expenditureHeader = new ExpenditureHeader($q->db, $q->mysqli);

// early exit
if (!isset($_GET)) {
    header('location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

$_GET = array_map([$seagate, 'Clean'], $_GET);

$sn = $_GET['sn'];

if (!is_int($sn)) {
    header('location: ' . $_SERVER['HTTP_REFERER']);
}

$result = $expenditureHeader->delete($sn);

if ($result === 'delete_successful') {

    $_SESSION['hasMsg'] = true;
    $_SESSION['Msg'] = "Bingo! Expenditure Header deleted successfully";

} else {

    $_SESSION['hasErr'] = true;
    $_SESSION['ErrMsg'] = $result;
}

header('location: ' . $_SERVER['HTTP_REFERER']);
exit;