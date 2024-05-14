<?php
    require_once '../../Classes/Seagate.php';
    require_once '../../Classes/Database.php';
    require_once '../../Classes/Suppliers.php';

    $q = new DataBase();
    $seagate = new SeaGate();
    $supplier = new Supplier();

    if (isset($_POST) && !empty($_POST['purchase_id']) && !empty($_POST['supplier_id'])) {

        foreach ($_POST as $key => $value) {
            $_POST[$key] = $seagate->Clean($value);
        }

        $purchase_id = $_POST['purchase_id'];
        $supplier_id = $_POST['supplier_id'];
        $total_tax = $_POST['total_tax'];
        $transportation = $_POST['transportation'];

        $sql = "UPDATE purchases SET total_tax = '$total_tax', transportation = '$transportation' WHERE purchase_id = '$purchase_id' AND subscriber_id = '$supplier->active_subscriber'";
        $q->mysqli->query($sql);

        if ($q->mysqli->affected_rows == 1) {
            echo 'save_successful';
        } else {
            echo 'Unable to update purchases';
        }
    } else {
        echo "Some errors occurred";
    }
?>