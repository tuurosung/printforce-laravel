<?php
    require_once '../../Classes/Seagate.php';
    require_once '../../Classes/Suppliers.php';

    $seagate = new SeaGate();
    $supplier = new Supplier();


    if (isset($_POST)) {
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $seagate->Clean($value);
        }

        if (!empty($_POST['purchase_id']) && !empty($_POST['description']) && !empty($_POST['unit_cost']) && !empty($_POST['qty']) && !empty($_POST['total'])) {

            $purchase_id = $_POST['purchase_id'];
            $supplier_id = $_POST['supplier_id'];
            $description = $_POST['description'];
            $unit_cost = $_POST['unit_cost'];
            $qty = $_POST['qty'];
            $total = $_POST['total'];

            echo $supplier->AddItem($purchase_id,  $supplier_id, $description, $unit_cost, $qty, $total);
        }
    } else {

        echo "Some error occurred";

    }
?>