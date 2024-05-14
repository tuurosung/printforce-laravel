<?php
// require main file header
require_once '../_main.php';
?>

<?php
unset($_SESSION['active_purchase_invoice']);
$supplier = new Supplier($q->db, $q->mysqli);
?>


<?php
include_once '../navigation/Topnav/topbar_start.php';
?>

<ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex flex-row align-items-center pl-lg-5">
    <li class="nav-item mr-4">
        <a class="nav-link montserrat font-weight-bold" href="#" style="font-size: 1.25rem; font-weight:500">PURCHASES</a>
    </li>

    <!-- <li class="nav-item mr-3">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#new_supplier_modal"><i class="fas fa-plus mr-1  "></i> New Supplier</a>
    </li> -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="reports_jobs.php"><i class="fas fa-file-alt mr-1  "></i> Reports</a>
    </li> -->


</ul>

<?php
include_once '../navigation/Topnav/topbar_end.php';
?>

<div class="app-content">

    <?php require_once '../includes/subscription.php'; ?>

    <div class="card">
        <div class="card-body">

            <h4 class="card-title"><a>Purchase Invoices</a></h4>

        </div>
    </div>

    <div class="card">
        <div class="card-body">

            <h4 class="montserrat font-weight-bold mb-5">Purchase Invoices</h4>

            <table class="table">
                <thead class="elegant-color text-white">
                    <tr>
                        <th>#</th>
                        <th>Purchase ID</th>
                        <th>Supplier Name</th>
                        <th>Date Issued</th>
                        <th>Due Date</th>
                        <th class="text-right">Supply Cost</th>
                        <th class="text-right">Tax</th>
                        <th class="text-right">Transportation</th>
                        <th class="text-right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $sql = "SELECT * FROM purchases WHERE subscriber_id = '$active_subscriber'";
                    $r = $mysqli->query($sql);
                    while ($rows = $r->fetch_assoc()) :
                        // $supplier->purchase_id = $rows['purchase_id'];
                        // $supplier->PurchaseInfo();
                    ?>

                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td class="" style="text-decoration:underline">
                                <a href="prepareSupplierInvoice.php?purchase_id=<?php echo $rows['purchase_id']; ?>&supplier_id=<?php echo $rows['supplier_id']; ?>">
                                    <?php echo $rows['purchase_id']; ?>
                                </a>
                            </td>
                            <td><?php echo $supplier->suppliers_array[$rows['supplier_id']]; ?></td>
                            <td><?php echo $rows['date_issued']; ?></td>
                            <td><?php echo $rows['due_date']; ?></td>
                            <td class="text-right"><?php echo number_format($rows['supply_cost'], 2); ?></td>
                            <td class="text-right"><?php echo number_format($rows['total_tax'], 2); ?></td>
                            <td class="text-right"><?php echo number_format($rows['transportation'], 2); ?></td>
                            <td class="text-right"><?php echo number_format($rows['purchase_total'], 2); ?></td>
                        </tr>

                    <?php
                    endwhile;
                    ?>
                </tbody>
            </table>

        </div>
    </div>




    <?php require_once('../navigation/admin_footer.php'); ?>
    <script type="text/javascript">

    </script>
    </body>

    </html>