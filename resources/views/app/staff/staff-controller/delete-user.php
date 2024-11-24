<?php

// Include necessary files
require_once '../../_load.php';
require_once $appLink . 'includes/autoload.php';

// initialize class instances
$q = new DataBase();
$seagate = new SeaGate();
$user = new User($q->db, $q->mysqli);

// Early exit if the request method is not POST
if (!isset($_GET)) {
    header('location: ' . $_SERVER['HTTP_REFERER']);
}

// Sanitize all input data
$_GET = array_map([$seagate, 'Clean'], $_GET);

extract($_GET);

$result = $user->delete($sn);

// Set session messages based on the result
if ($result === 'delete_successful') {

    $_SESSION['hasMsg'] = true;
    $_SESSION['Msg'] = "Bingo! User registration successful";
} else {

    $_SESSION['hasErr'] = true;
    $_SESSION['ErrMsg'] = $result;
}

// Redirect back to the previous page
header('location: ' . $_SERVER['HTTP_REFERER']);
exit;
