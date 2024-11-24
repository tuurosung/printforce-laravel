<?php
// require main file header
require_once '../_main.php';
?>


<style media="screen">
    /* .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
  color: #fff;
  background-color: #1266f1;
  -webkit-box-shadow: 0 2px 5px 0 rgb(0 0 0 / 20%), 0 2px 10px 0 rgb(0 0 0 / 10%);
  box-shadow: 0 2px 5px 0 rgb(0 0 0 / 20%), 0 2px 10px 0 rgb(0 0 0 / 10%);
  border-bottom:none;
}
.nav-pills .nav-link {
    border-radius: .25rem;
    font-size: 12px;
    text-transform: uppercase;
    padding: 17px 29px 16px;
    line-height: 1;
    background-color: #f5f5f5;
    font-weight: 500;
    color: rgba(0,0,0,.6);
    margin: .5rem;

} */
</style>

<?php
require_once '../serverscripts/Classes/Invoices.php';
$invoice_id = clean_string($_GET['invoice_id']);
$inv = new Invoice($q->db, $q->mysqli);
$inv->invoice_id = $invoice_id;
$inv->InvoiceInfo();
$inv->InvoiceConfigInfo();
$c = new Customer($q->db, $q->mysqli);
$c->customer_id = $inv->customer_id;
$c->CustomerInfo();
?>
<main class="py-3 mx-lg-5">
    <div class="container-fluid mt-2">

        <div class="row mb-3">
            <div class="col-md-4">
                <h4 class="titles montserrat">New Invoice </h4>
                <h6><?php echo $c->name; ?></h6>
            </div>
            <div class="col-md-8 text-right">

                <button type="button" class="btn elegant-color-dark white-text btn-rounded mr-3" id="print" data-invoice_id="<?php echo $invoice_id; ?>">
                    <i class="fas fa-print mr-3"></i>
                    Print Invoice</button>

                <button type="button" class="btn primary-color-dark white-text btn-rounded mr-3" id="print_pdf" data-invoice_id="<?php echo $invoice_id; ?>">
                    <i class="fas fa-file-pdf mr-3"></i>
                    Download PDF</button>

                <button type="button" class="btn danger-color-dark white-text btn-rounded">
                    <i class="fas fa-trash mr-3"></i>
                    Trash </button>


            </div>
        </div>




        <?php
        if ($inv->status == 'locked') {
        ?>
            <div class="card mb-5">
                <div class="card-body">
                    <h6 class="font-weight-bold mb-3">Payment</h6>

                    <div class="row">
                        <div class="col-md-4 pt-3" style="font-size:16px;">
                            Expected Amount : GHS <?php echo $inv->total; ?>
                        </div>
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4 text-right">
                            <button type="button" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#new_payment_modal"><i class="fas fa-credit-card mr-3"></i>Record Payment</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

        <div class="">
            <!-- Pills navs -->
            <ul class="nav nav-pills mb-3 montserrat" id="ex1" role="tablist">
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
                            <h6 class="font-weight-bold montserrat mb-3">Prepare Invoice</h6>
                            <form id="invoice_item_frm" autocomplete="off">
                                <input type="text" class="d-none" name="invoice_id" value="<?php echo $invoice_id; ?>">
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
                        </div>
                    </div>

                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>Qty</th>
                                <th>Description</th>
                                <th class="text-right">Unit Price</th>
                                <th class="text-right">Amount</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $get_invoice_items = mysqli_query($db, "SELECT * FROM invoice_items WHERE invoice_id='" . $invoice_id . "' AND subscriber_id='" . $active_subscriber . "' AND status='active'") or die(mysqli_error($db));
                            while ($items = mysqli_fetch_array($get_invoice_items)) {
                            ?>
                                <tr>
                                    <td><?php echo $items['qty']; ?></td>
                                    <td><?php echo $items['description']; ?></td>
                                    <td class="text-right"><?php echo $items['unit_cost'] ?></td>
                                    <td class="text-right"><?php echo number_format($items['total'], 2); ?> </td>
                                    <td class="text-right">
                                        <button type="button" class="btn btn-danger btn-sm remove" id="<?php echo $items['sn']; ?>">Remove</button>
                                    </td>
                                </tr>
                            <?php
                                $total_value += $items['total'];
                            }
                            ?>
                            <tr>
                                <td colspan="3" class="text-right b-0"></td>
                                <td class="text-right font-weight-bold" style="font-size:18px !important"><?php echo number_format($total_value, 2); ?></td>
                                <td></td>
                            </tr>


                        </tbody>
                    </table>

                </div>
                <div class="tab-pane fade" id="ex1-pills-2" role="tabpanel" aria-labelledby="ex1-tab-2">

                    <div class="card">
                        <div class="card-body">
                            <h6 class="font-weight-bold montserrat mb-3">Apply Taxes</h6>
                            <form id="apply_taxes_frm" autocomplete="off">
                                <input type="text" class="d-none" name="invoice_id" value="<?php echo $invoice_id; ?>">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apply VAT</label>
                                            <select class="custom-select browser-default" name="apply_vat">
                                                <option value="no" <?php if ($inv->vat_percent == 0.00) {
                                                                        echo 'selected';
                                                                    } ?>>NO</option>
                                                <option value="yes" <?php if ($inv->vat_percent != 0.00) {
                                                                        echo 'selected';
                                                                    } ?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apply GetFund</label>
                                            <select class="custom-select browser-default" name="apply_getfund">
                                                <option value="no" <?php if ($inv->getfund_percent == 0.00) {
                                                                        echo 'selected';
                                                                    } ?>>NO</option>
                                                <option value="yes" <?php if ($inv->getfund_percent != 0.00) {
                                                                        echo 'selected';
                                                                    } ?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apply NHIL</label>
                                            <select class="custom-select browser-default" name="apply_nhil">
                                                <option value="no" <?php if ($inv->nhil_percent == 0.00) {
                                                                        echo 'selected';
                                                                    } ?>>NO</option>
                                                <option value="yes" <?php if ($inv->nhil_percent != 0.00) {
                                                                        echo 'selected';
                                                                    } ?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary" style="margin-top:27px">Update Taxes</button>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>

                    <div class="mt-5">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card" style="border-bottom:solid 3px #000">
                                    <div class="card-body">
                                        <p class="m-0">VAT <?php echo $inv->config_vat_percent; ?>%</p>
                                        <p class="m-0 font-weight-bold big-text"><?php echo $inv->currency . ' ' . $inv->vat_amount; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card" style="border-bottom:solid 3px #000">
                                    <div class="card-body">
                                        <p class="m-0">GetFund <?php echo $inv->config_getfund_percent; ?>%</p>
                                        <p class="m-0 font-weight-bold big-text"><?php echo $inv->currency . ' ' . $inv->getfund_amount; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card" style="border-bottom:solid 3px #000">
                                    <div class="card-body">
                                        <p class="m-0">NHIL <?php echo $inv->config_nhil_percent; ?>%</p>
                                        <p class="m-0 font-weight-bold big-text"><?php echo $inv->currency . ' ' . $inv->nhil_amount; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="ex1-pills-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                    <div class="card" style="min-height:297mm">
                        <div class="card-body" id="pdfprint">

                            <div class="text-right">
                                <?php
                                if ($inv->invoice_type == 'pro_forma') {
                                ?>
                                    <h6 class="montserrat font-weight-bold text-primary">PRO-FORMA INVOICE</h6>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <h5 class="montserrat font-weight-bold"><?php echo $company_info['company_name']; ?></h5>
                                    <h6 class="montserrat font-weight-bold" style="font-size:12px"><?php echo $company_info['company_address']; ?></h6>
                                    <h6 class="montserrat font-weight-bold" style="font-size:12px"><?php echo $company_info['company_phone']; ?></h6>

                                </div>
                                <div class="col-md-6 text-right">
                                    <h3 class="montserrat mb-3">INVOICE</h3>



                                </div>
                            </div>
                            <p class="montserrat">Tax Identification Number (TIN): <span class="font-weight-bold"><?php echo $inv->tin_number; ?></span> </p>
                            <hr class="hr">



                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <h6 class="montserrat font-weight-bold" style="font-size:14px"><?php echo $c->name; ?></h6>
                                    <h6 class="" style="font-size:14px"><?php echo $c->location; ?></h6>
                                    <h6 class="" style="font-size:14px"><?php echo $c->phone; ?></h6>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="row">
                                        <div class="col-md-8 text-right">
                                            Invoice #
                                        </div>
                                        <div class="col-md-4 font-weight-bold">
                                            <?php echo $inv->invoice_id; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 text-right">
                                            Invoice Date
                                        </div>
                                        <div class="col-md-4 font-weight-bold">
                                            <?php echo $inv->date_issued; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 text-right">
                                            Due Date
                                        </div>
                                        <div class="col-md-4 font-weight-bold">
                                            <?php echo $inv->due_date; ?>
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
                                    $get_invoice_items = mysqli_query($db, "SELECT * FROM invoice_items WHERE invoice_id='" . $invoice_id . "' AND subscriber_id='" . $active_subscriber . "' AND status='active'") or die(mysqli_error($db));
                                    while ($items = mysqli_fetch_array($get_invoice_items)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $items['qty']; ?></td>
                                            <td><?php echo $items['description']; ?></td>
                                            <td class="text-right"><?php echo $items['unit_cost'] ?></td>
                                            <td class="text-right"><?php echo number_format($items['total'], 2); ?> </td>
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
                                    <div class="p-2" style="border:1px solid #000; min-height:150px">
                                        <h6 class="font-weight-bold montserrat m-0" style="font-size:11px">Terms & Conditions</h6>
                                        <hr class="hr">
                                        <?php
                                        $j = 1;
                                        $get_terms = mysqli_query($db, "SELECT * FROM invoice_terms WHERE subscriber_id='" . $active_subscriber . "' AND status='active'") or die(mysqli_error($db));
                                        while ($terms = mysqli_fetch_array($get_terms)) {
                                        ?>
                                            <p style="font-size:11px"><?php echo $j++ . '. ' . $terms['description']; ?></p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <!-- Subtotal -->
                                    <div class="row" style="font-size:11px">
                                        <div class="col-md-6 text-right">
                                            Sub - Total (<?php echo $inv->currency; ?>)
                                        </div>
                                        <div class="col-md-6 font-weight-bold text-right">
                                            <?php echo number_format($inv->sub_total, 2); ?>
                                        </div>
                                    </div>

                                    <!-- Taxes -->
                                    <div class="row">
                                        <div class="col-md-6 text-right">
                                            VAT(<?php echo $inv->currency; ?>)
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <?php echo number_format($inv->vat_amount, 2); ?>
                                        </div>
                                    </div>

                                    <!-- Taxes -->
                                    <div class="row">
                                        <div class="col-md-6 text-right">
                                            GetFund(<?php echo $inv->currency; ?>)
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <?php echo number_format($inv->getfund_amount, 2); ?>
                                        </div>
                                    </div>
                                    <!-- Taxes -->
                                    <div class="row">
                                        <div class="col-md-6 text-right">
                                            NHIL(<?php echo $inv->currency; ?>)
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <?php echo number_format($inv->nhil_amount, 2); ?>
                                        </div>
                                    </div>

                                    <!-- Total -->
                                    <div class="row">
                                        <div class="col-md-6 font-weight-bold text-right">
                                            TOTAL (<?php echo $inv->currency; ?>)
                                        </div>
                                        <div class="col-md-6 text-right font-weight-bold">
                                            <?php echo number_format($inv->total, 2); ?>
                                        </div>
                                    </div>

                                    <section class="" style="margin-top:7rem">
                                        <hr class="mt-5" style="border-top:dashed 1px #000; width:50%">
                                        <p class="m-0 font-weight-bold text-uppercase text-center" style="font-size:11px"><?php echo $inv->created_by; ?></p>
                                    </section>
                                </div>
                            </div>


                            <p class="text-italic text-center font-weight-bold montserrat" style="font-size:13px"><?php echo $inv->tagline; ?></p>

                            <hr style="border-top:dashed 1px #000; width:50%" class="mt-4">

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

    $("#invoice_item_frm").on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: '../serverscripts/admin/Invoices/invoice_item_frm.php',
            type: 'GET',
            data: $("#invoice_item_frm").serialize(),
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


    $('#apply_taxes_frm').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: '../serverscripts/admin/Invoices/apply_taxes_frm.php',
            type: 'GET',
            data: $("#apply_taxes_frm").serialize(),
            success: function(msg) {
                if (msg === 'update_successful') {
                    bootbox.alert('Tax Information Updated Successfully', function() {
                        window.location.reload()
                    })
                } else {
                    bootbox.alert(msg)
                }
            }
        })
    });

    $('.table tbody').on('click', '.remove', function(event) {
        event.preventDefault();
        var sn = $(this).attr('ID')
        bootbox.confirm("Remove this invoice item?", function(r) {
            if (r === true) {
                $.get('../serverscripts/admin/Invoices/delete_invoice_item.php?sn=' + sn, function(msg) {
                    if (msg === 'delete_successful') {
                        bootbox.alert("Invoice item removed", function() {
                            window.location.reload()
                        })
                    } else {
                        bootbox.alert(msg)
                    }
                }) //end get
            }
        })

    });


    $('#print').on('click', function(event) {
        event.preventDefault();
        var invoice_id = $(this).data('invoice_id')
        print_popup('invoice_print.php?invoice_id=' + invoice_id)
    });

    var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function(element, renderer) {
            return true;
        }
    };

    $('#print_pdf').click(function() {
        doc.fromHTML($('#pdfprint').html(), 15, 15, {
            'width': 170,
            'elementHandlers': specialElementHandlers
        });
        doc.save('sample-file.pdf');
    });
</script>

</html>