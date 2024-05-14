<?php
    require_once '../../_load.php';
    require_once $appLink.'includes/autoload.php';

    // initialize class variables
    $q = new DataBase();
    $seagate = new SeaGate();
    $billing = new Billing($q->db, $q->mysqli);

    // early exit
    if (!isset($_POST)) {
        header('location: ' . $_SERVER['REFERER']);
        exit;
    }

    // Clean the data for xss protection
    $_POST = array_map([$seagate, 'Clean'], $_POST);

    foreach ($_POST as $key => $value) {

        if (empty($value)) {

            $_SESSION['hasErr'] = true;
            $_SESSION['ErrMsg'] = "Please fill out all required fields($value)";
            header('location: ' . $_SERVER['HTTP_REFERER']);
            exit;

        } else {

            $$key = $seagate->Clean($value);

        }
    }

    // call the checkout method
    $result = $billing->checkout($subscriber_id, $plan_id, $price, $months, $total, $fullname, $phoneNumber, $email);

    if ($result === 'billing_successful') {
        $_SESSION['hasMsg'] = true;
        $_SESSION['Msg'] = 'Bingo! Your billing was successfully. Proceed to make payment';
    } else {
        $_SESSION['hasErr'] = true;
        $_SESSION['ErrMsg'] = $result;
    }

    header('location: ' . $_SERVER['HTTP_REFERER']);
    exit;