<?php

// Include necessary files
require_once '../../_load.php';
require_once $appLink . 'includes/autoload.php';

// initialize class instances
$q = new DataBase();
$seagate = new SeaGate();
$user = new User($q->db, $q->mysqli);

// Early exit if the request method is not POST
if (!isset($_POST)) {
    header('location: ' . $_SERVER['HTTP_REFERER']);
}

// Sanitize all input data
$_POST = array_map([$seagate, 'Clean'], $_POST);

// array of parameters that are optional
$optional = ['notes'];

// Iterate through all input data and check for required fields
foreach ($_POST as $key => $value) {
    if (empty($value) && !in_array($key, $optional)) {
        // Set error session variables and redirect back
        $_SESSION['hasErr'] = true;
        $_SESSION['ErrMsg'] = "$key is required";
        header('location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}

// Extract input data into individual variables
extract($_POST);

$result = $user->create($full_name, $phone_number, $access_level, $username, $password);

// Set session messages based on the result
if ($result === 'save_successful') {

    $_SESSION['hasMsg'] = true;
    $_SESSION['Msg'] = "Bingo! User registration successful";
} else {

    $_SESSION['hasErr'] = true;
    $_SESSION['ErrMsg'] = $result;
}

// Redirect back to the previous page
header('location: ' . $_SERVER['HTTP_REFERER']);
exit;