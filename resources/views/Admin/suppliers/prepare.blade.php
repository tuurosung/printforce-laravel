
<?php


// if (isset($_SESSION['active_purchase_invoice'])) {
//     $purchase_id = $seagate->Clean($_SESSION['active_purchase_invoice']);
//     $supplier_id = $seagate->Clean($_SESSION['active_supplier_id']);
// } elseif (isset($_GET) && !empty($_GET['purchase_id'])) {

//     $purchase_id = $seagate->Clean($_GET['purchase_id']);
//     $supplier_id = $seagate->Clean($_GET['supplier_id']);
// } else {
//     echo "<script type='text/javascript'>window.location='purchases.php';</script>";
// }


// $supplier = new Supplier($q->db, $q->mysqli);
// $supplier->purchase_id = $purchase_id;


// $supplier->supplier_id = $supplier_id;
// $supplier->SupplierInfo();

// $supplier->purchase_id = $purchase_id;
// $supplier->PurchaseInfo();

?>


<?php
include_once '../navigation/Topnav/topbar_start.php';
?>

<ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex flex-row align-items-center pl-lg-5">
    <li class="nav-item mr-4">
        <a class="nav-link montserrat font-weight-bold" href="#" style="font-size: 1.25rem; font-weight:500">PREPARE INVOICE</a>
    </li>

    <li class="nav-item mr-3">
        <a class="nav-link" href="#" id="print" data-purchase_id="<?php echo $purchase_id; ?>"><i class="fas fa-print mr-1  "></i> Print Invoice</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="print_pdf" data-purchase_id="<?php echo $purchase_id; ?>"><i class="fas fa-file-pdf mr-1  "></i> Download PDF</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="reports_jobs.php"><i class="fas fa-trash mr-1  "></i> Delete</a>
    </li>


</ul>

<?php
include_once '../navigation/Topnav/topbar_end.php';
?>

<div class="app-content">

    <!-- tab v2 with card -->
    <div class="card">
        <ul class="nav nav-tabs nav-tabs-v2 ps-4 pe-4">
            <li class="nav-item me-3"><a href="#homev2WithCard" class="nav-link active" data-bs-toggle="tab">Home</a></li>
            <li class="nav-item me-3"><a href="#profilev2WithCard" class="nav-link" data-bs-toggle="tab">Profile</a></li>
        </ul>
        <div class="tab-content p-4">
            <div class="tab-pane fade show active" id="homev2WithCard">...</div>
            <div class="tab-pane fade" id="profilev2WithCard">...</div>
        </div>
    </div>



    <div class="">
        <!-- Pills navs -->
        <ul class="nav nav-pills xmedici_pills mb-3 montserrat" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="ex1-tab-1" data-toggle="pill" href="#ex1-pills-1" role="tab" aria-controls="ex1-pills-1" aria-selected="true">
                    New Invoice Item
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="ex1-tab-2" data-toggle="pill" href="#ex1-pills-2" role="tab" aria-controls="ex1-pills-2" aria-selected="false">
                    Tax Information
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="ex1-tab-3" data-toggle="pill" href="#ex1-pills-3" role="tab" aria-controls="ex1-pills-3" aria-selected="false">
                    Preview Invoice
                </a>
            </li>
        </ul>
        <!-- Pills navs -->

        <!-- Pills content -->
        <div class="tab-content mb-5" id="ex1-content">
            <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1">

                <div class="card mb-5">
                    <div class="card-body">

                        <h6 class="font-weight-bold montserrat mb-5">Prepare Invoice</h6>

                        <form class="mb-5
                            <?php
                            if ($supplier->lockstatus == 'locked') {
                                echo 'd-none';
                            }
                            ?>
                            " id="purchase_item_frm" autocomplete="off" method="POST">

                            <input type="text" class="d-none" name="purchase_id" value="<?php echo $purchase_id; ?>">
                            <input type="text" class="d-none" name="supplier_id" value="<?php echo $supplier_id; ?>">

                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Description</label>
                                    <input type="text" class="form-control" name="description" id="description" required placeholder="eg: Printing of A4 Flyer">
                                </div>
                                <div class="col-md-2">
                                    <label for="">Unit Cost</label>
                                    <input type="text" class="form-control" name="unit_cost" id="unit_cost" value="" required placeholder="">
                                </div>
                                <div class="col-md-2">
                                    <label for="">Qty</label>
                                    <input type="text" class="form-control" name="qty" id="qty" value="1" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="">Total</label>
                                    <input type="text" class="form-control" name="total" id="total" value="" readonly>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary wide" style="margin-top:21px">Add To Invoice</button>
                                </div>
                            </div>


                        </form>

                        <table class="table table-condensed">
                            <thead class="elegant-color-dark white-text">
                                <tr>
                                    <th>Qty</th>
                                    <th>Description</th>
                                    <th class="text-right">Unit Price</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-right">Amount</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $i = 1;
                                $get_purchase_items = mysqli_query($db, "SELECT * FROM purchase_items WHERE purchase_id='" . $purchase_id . "' AND subscriber_id='" . $active_subscriber . "' AND status='active'") or die(mysqli_error($db));

                                while ($items = mysqli_fetch_array($get_purchase_items)) :
                                ?>
                                    <tr>
                                        <td><?php echo $items['qty']; ?></td>
                                        <td><?php echo $items['description']; ?></td>
                                        <td class="text-right"><?php echo $items['unit_cost'] ?></td>
                                        <td class="text-center"><?php echo $items['qty'] ?></td>
                                        <td class="text-right"><?php echo number_format($items['sub_total'], 2); ?> </td>
                                        <td class="text-right">
                                            <button type="button" class="btn btn-danger btn-sm remove
                                                <?php
                                                if ($supplier->lockstatus == 'locked') {
                                                    echo 'd-none';
                                                }
                                                ?>
                                                " id="<?php echo $items['sn']; ?>">Remove</button>
                                        </td>
                                    </tr>
                                    <?php $total_value += $items['sub_total']; ?>



                                <?php
                                endwhile;
                                ?>

                                <tr class="">
                                    <td colspan="4" class="text-right b-0">Sub-Total</td>
                                    <td class="text-right font-weight-bold"><?php echo number_format($total_value, 2); ?></td>
                                    <td></td>
                                </tr>
                                <tr class="">
                                    <td colspan="4" class="text-right b-0">Transportation</td>
                                    <td class="text-right font-weight-bold"><?php echo number_format($supplier->transportation, 2); ?></td>
                                    <td></td>
                                </tr>
                                <tr class="">
                                    <td colspan="4" class="text-right b-0">Total Tax</td>
                                    <td class="text-right font-weight-bold"><?php echo number_format($supplier->total_tax, 2); ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right b-0"></td>
                                    <td class="text-right font-weight-bold"><?php echo number_format($supplier->purchaseTotal, 2); ?></td>
                                    <td></td>
                                </tr>

                            </tbody>
                        </table>


                        <hr>



                    </div>
                </div>



            </div>
            <div class="tab-pane fade" id="ex1-pills-2" role="tabpanel" aria-labelledby="ex1-tab-2">

                <div class="card">
                    <div class="card-body">


                        <div class="row">

                            <div class="col-4 offset-4">
                                <form id="updateFrm" autocomplete="off">
                                    <h6 class="font-weight-bold montserrat mb-5">Apply Taxes</h6>

                                    <input type="text" class="d-none" name="purchase_id" value="<?php echo $purchase_id; ?>">
                                    <input type="text" class="d-none" name="supplier_id" value="<?php echo $supplier_id; ?>">

                                    <div class="form-group">
                                        <label for="">Total Taxes</label>
                                        <input type="number" step="any" name="total_tax" id="total_tax" class="form-control" placeholder="" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Transportation</label>
                                        <input type="number" step="any" name="transportation" id="transportation" class="form-control" placeholder="" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary float-right">Update Invoice</button>
                                </form>
                            </div>


                        </div>


                    </div>
                </div>



            </div>
            <div class="tab-pane fade" id="ex1-pills-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                <div class="card" style="min-height:297mm">
                    <div class="card-body" id="pdfprint">

                        <div class="text-right">
                            <button type="button" class="btn btn-success" id="savePurchaseBtn">
                                <i class="fas fa-check mr-3  "></i> Save Invoice
                            </button>
                        </div>

                        <div class="text-right">
                            <?php
                            if ($supplier->invoice_type == 'pro_forma') {
                            ?>
                                <h6 class="montserrat font-weight-bold text-primary">PRO-FORMA INVOICE</h6>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <h4 class="jakarta  font-weight-bold"><?php echo $s->company_name; ?></h4>
                                <h5 class="montserrat " style="font-size:14px"><?php echo $s->company_address; ?></h5>
                                <h5 class="montserrat font-weight-bold" style="font-size:14px"><?php echo $s->company_phone; ?></h5>

                            </div>
                            <div class="col-md-6 text-right">
                                <h3 class="montserrat mb-3">INVOICE</h3>



                            </div>
                        </div>

                        <hr class="hr">



                        <div class="row mb-5">
                            <div class="col-md-6">
                                <h6 class="jakarta font-weight-bold" style="font-size:14px"><?php echo $supplier->supplier_name; ?></h6>
                                <h6 class="" style="font-size:14px"><?php echo $supplier->supplier_address; ?></h6>
                                <h6 class="" style="font-size:14px"><?php echo $supplier->supplier_phone; ?></h6>
                            </div>
                            <div class="col-md-6 ">
                                <div class="row">
                                    <div class="col-md-8 text-right">
                                        Invoice #
                                    </div>
                                    <div class="col-md-4 font-weight-bold">
                                        <?php echo $supplier->purchase_id; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 text-right">
                                        Invoice Date
                                    </div>
                                    <div class="col-md-4 font-weight-bold">
                                        <?php echo $supplier->date_issued; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 text-right">
                                        Due Date
                                    </div>
                                    <div class="col-md-4 font-weight-bold">
                                        <?php echo $supplier->due_date; ?>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <table class="table table-condensed">
                            <thead class="elegant-color-dark white-text">
                                <tr>
                                    <th>Qty</th>
                                    <th>Description</th>
                                    <th class="text-right">Unit Price</th>
                                    <th class="text-right">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $get_purchase_items = mysqli_query($db, "SELECT * FROM purchase_items WHERE purchase_id='" . $purchase_id . "' AND subscriber_id='" . $active_subscriber . "' AND status='active'") or die(mysqli_error($db));
                                while ($items = mysqli_fetch_array($get_purchase_items)) {
                                ?>
                                    <tr>
                                        <td><?php echo $items['qty']; ?></td>
                                        <td><?php echo $items['description']; ?></td>
                                        <td class="text-right"><?php echo $items['unit_cost'] ?></td>
                                        <td class="text-right"><?php echo number_format($items['sub_total'], 2); ?> </td>
                                    </tr>
                                <?php
                                }
                                ?>
                                <tr>
                                    <td colspan="3" class="text-right b-0"></td>
                                    <td class="text-right"></td>
                                </tr>


                            </tbody>
                        </table>


                        <div class="row mb-5">
                            <div class="col-md-7">

                            </div>
                            <div class="col-md-5">
                                <!-- Subtotal -->
                                <div class="row" style="font-size:11px">
                                    <div class="col-md-6 text-right">
                                        Sub - Total (GHS)
                                    </div>
                                    <div class="col-md-6 font-weight-bold text-right">
                                        <?php echo number_format($supplier->supply_cost, 2); ?>
                                    </div>
                                </div>

                                <!-- Taxes -->
                                <div class="row">
                                    <div class="col-md-6 text-right">
                                        Total Tax(GHS)
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <?php echo number_format($supplier->total_tax, 2); ?>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6 text-right">
                                        Transportation(GHS)
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <?php echo number_format($supplier->transportation, 2); ?>
                                    </div>
                                </div>

                                <!-- Total -->
                                <div class="row">
                                    <div class="col-md-6 font-weight-bold text-right">
                                        TOTAL (GHS)
                                    </div>
                                    <div class="col-md-6 text-right font-weight-bold">
                                        <?php echo number_format($supplier->purchaseTotal, 2); ?>
                                    </div>
                                </div>

                                <section class="" style="margin-top:7rem">
                                    <p class="m-0 font-weight-bold text-uppercase text-center" style="font-size:11px"><?php echo $supplier->created_by; ?></p>
                                </section>
                            </div>
                        </div>


                        <p class="text-italic text-center font-weight-bold montserrat" style="font-size:13px"></p>


                    </div>
                </div>
            </div>
        </div>
        <!-- Pills content -->
    </div>







</div>
<div id="modal_holder"></div>

</div>
</main>




<div id="editor"></div>
</body>

<!--   Core JS Files   -->
<?php require_once '../navigation/admin_footer.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

<script type="text/javascript">
    $('#qty,#unit_cost').on('keyup', function(event) {
        event.preventDefault();
        var qty = $('#qty').val()
        var unit_cost = $('#unit_cost').val()
        $('#total').val((parseInt(qty) * parseFloat(unit_cost)).toFixed(2))
    });

    $("#purchase_item_frm").on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: '../serverscripts/admin/Suppliers/addItem.php',
            type: 'POST',
            data: $("#purchase_item_frm").serialize(),
            success: function(msg) {
                if (msg === 'save_successful') {
                    bootbox.alert('Item added successfully', function() {
                        window.location.reload()
                    })
                } else {
                    bootbox.alert(msg)
                }
            }
        })
    });


    $('#updateFrm').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: '../serverscripts/admin/Suppliers/updateFrm.php',
            type: 'POST',
            data: $("#updateFrm").serialize(),
            success: function(msg) {
                if (msg === 'update_successful') {
                    window.location.reload()
                } else {
                    bootbox.alert(msg)
                }
            }
        })
    });

    $('#savePurchaseBtn').on('click', function(event) {
        bootbox.confirm('Save Purchase Invoice', function(r) {
            if (r === true) {
                $.post("../serverscripts/admin/Suppliers/savePurchase.php", 'purchase_id=<?php echo $purchase_id; ?>',
                    function(msg) {
                        if (msg === 'save_successful') {
                            bootbox.alert("Purchase recorded successfully", function() {
                                window.location = 'purchases.php'
                            })
                        } else {
                            bootbox.alert(msg)
                        }
                    }
                );
            }
        }) //end bootbox
    })

    // $('.table tbody').on('click', '.remove', function(event) {
    //     event.preventDefault();
    //     var sn = $(this).attr('ID')
    //     bootbox.confirm("Remove this invoice item?", function(r) {
    //         if (r === true) {
    //             $.get('../serverscripts/admin/Invoices/delete_invoice_item.php?sn=' + sn, function(msg) {
    //                 if (msg === 'delete_successful') {
    //                     bootbox.alert("Invoice item removed", function() {
    //                         window.location.reload()
    //                     })
    //                 } else {
    //                     bootbox.alert(msg)
    //                 }
    //             }) //end get
    //         }
    //     })

    // });


    // $('#print').on('click', function(event) {
    //     event.preventDefault();
    //     var purchase_id = $(this).data('purchase_id')
    //     print_popup('invoice_print.php?purchase_id=' + purchase_id)
    // });

    // var doc = new jsPDF();
    // var specialElementHandlers = {
    //     '#editor': function(element, renderer) {
    //         return true;
    //     }
    // };

    // $('#print_pdf').click(function() {
    //     doc.fromHTML($('#pdfprint').html(), 15, 15, {
    //         'width': 170,
    //         'elementHandlers': specialElementHandlers
    //     });
    //     doc.save('sample-file.pdf');
    // });
</script>

</html>
