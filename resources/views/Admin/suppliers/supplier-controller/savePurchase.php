<?php
    require_once '../../Classes/Seagate.php';
    require_once '../../Classes/Database.php';
    require_once '../../Classes/Suppliers.php';

    $q = new DataBase();
    $seagate = new SeaGate();
    $supplier = new Supplier();

    if (isset($_POST) && !empty($_POST['purchase_id'])) {

        foreach ($_POST as $key => $value) {
            $_POST[$key] = $seagate->Clean($value);
        }

        $purchase_id = $_POST['purchase_id'];
        $supplier->purchase_id = $purchase_id;
        $supplier->PurchaseInfo();
        $supply_cost = $supplier->supply_cost;
        $purchaseTotal = $supplier->purchaseTotal;


        $sql = "UPDATE purchases SET supply_cost = '$supply_cost', purchase_total = '$purchaseTotal', lockstatus = 'locked' WHERE purchase_id = '$purchase_id' AND subscriber_id = '$supplier->active_subscriber'";
        $q->mysqli->query($sql);

        if ($q->mysqli->affected_rows == 1) {
            echo 'save_successful';
        } else {
            echo 'Unable to save purchase';
        }
    } else {

        echo "Some errors occurred";

    }
?>