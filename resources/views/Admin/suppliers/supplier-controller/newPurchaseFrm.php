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
        $seagate->RejectEmpty($_POST['date_issued'], "Select the issue date");
        $seagate->RejectEmpty($_POST['due_date'], "Due date cannot be empty");

        $supplier_id = $_POST['supplier_id'];
        $reference = $_POST['reference'];
        $date_issued = $_POST['date_issued'];
        $due_date = $_POST['due_date'];
        $notes = $_POST['notes'];

        echo $supplier->CreateInvoice($supplier_id, $reference, $date_issued, $due_date, $notes);
    } else {
        echo "Some errors occurred";
    }

?>