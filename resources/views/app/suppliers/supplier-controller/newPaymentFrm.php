<?php

    require_once '../../dbcon.php';
    require_once '../../Classes/Seagate.php';
    require_once '../../Classes/Suppliers.php';

    $seagate  = new SeaGate();
    $supplier = new Supplier();

    if (isset($_POST)) {

        foreach ($_POST as $key => $value) {
            $_POST[$key] = $seagate->Clean($value);
        }

        $seagate->RejectEmpty($_POST['supplier_id'], "Supplier cannot be empty");
        $seagate->RejectEmpty($_POST['amount_paid'], "Enter a valid amount");
        $seagate->RejectEmpty($_POST['account_number'], "Account cannot be empty");

        $supplier_id = $_POST['supplier_id'];
        $amount_paid = $_POST['amount_paid'];
        $reference = $_POST['reference'];
        $account_number = $_POST['account_number'];
        $date = $_POST['date'];
        $notes = $_POST['notes'];

        echo $supplier->CreatePayment($supplier_id, $amount_paid, $reference, $account_number, $date, $notes);
    } else {
        echo "Some errors occurred";
    }

?>