<?php
// require main file header
require_once '../_main.php';
?>


<?php
$inv = new Invoice($q->db, $q->mysqli);
$c = new Customer($q->db, $q->mysqli);
?>

<!--Main layout-->
<main class="pt-3 mx-lg-5">
    <div class="container-fluid mt-2">



        <div class="row mb-5">
            <div class="col-md-6">
                <h4 class="titles montserrat">Invoices</h4>
            </div>
            <div class="col-md-6 text-right">
                <button type="button" class="btn elegant-color-dark m-0 btn-rounded mr-3" data-toggle="modal" data-target="#new_invoice_modal"><i class="fas fa-plus mr-2"></i> New Invoice</button>
                <a href="invoice_config.php" class="btn btn-primary btn-rounded m-0">
                    <i class="fas fa-cog mr-3"></i>
                    Configure Invoice Data
                </a>
            </div>
        </div>

        <div class="card my-5 <?php if ($s->days_remaining_negpo >= 0) {
                                    echo 'd-none';
                                } ?>">
            <div class="card-body">
                <blockquote class="blockquote bq-danger">
                    <p class="bq-title montserrat font-weight-bold">Sorry, Subscription Expired</p>
                    <p class="m-0">
                        Your subscription has expired. Please renew your subscription to continue enjoying PrintForce.
                    </p>
                </blockquote>

            </div>
        </div>

        <?php if ($s->days_remaining_negpo < 0) {
            die();
        } ?>

        <!-- <div class="row">
      <div class="col-md-3">
        <div class="card">
          <div class="card-body pt-2 pb-2">
            Total Registered Customers
            <p class="m-0 montserrat font-weight-bold" style="font-size:18px"><?php //echo mycustomers();
                                                                                ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-body pt-2 pb-2">
            New Customers This Month
            <p class="m-0 montserrat font-weight-bold" style="font-size:18px"><?php //echo this_month_customers();
                                                                                ?></p>
          </div>
        </div>
      </div>
    </div> -->


        <div class="" id="data_holder">
            <table class="table datatables table-condensed">
                <thead class="">
                    <tr>
                        <th>#</th>
                        <th>Invoice ID</th>
                        <th>Customer Name</th>
                        <th>P.O. #</th>
                        <th class="text-right">Sub-Total</th>
                        <th class="text-right">Taxes</th>
                        <th class="text-right">Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $query = mysqli_query($db, "SELECT * FROM invoices WHERE subscriber_id='" . $active_subscriber . "'") or die(mysqli_error($db));



                    while ($invoices = mysqli_fetch_array($query)) {
                        $c->customer_id = $invoices['customer_id'];
                        $c->CustomerInfo();
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $invoices['invoice_id']; ?></td>
                            <td><?php echo $c->name; ?></td>
                            <td><?php echo $invoices['ref']; ?></td>
                            <td class="text-right"><?php echo $invoices['sub_total']; ?></td>
                            <td class="text-right"><?php echo number_format($invoices['vat_amount'] + $invoices['nhil_amount'] + $invoices['getfund_amount'], 2); ?></td>
                            <td class="text-right"><?php echo $invoices['total']; ?></td>
                            <td class="text-right">
                                <a class="btn btn-primary btn-sm" href="invoice_prepare.php?invoice_id=<?php echo $invoices['invoice_id']; ?>">
                                    <i class="fas fa-pen mr-3"></i>
                                    Edit
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>






        <div class="modal fade" id="new_customer_modal">
            <div class="modal-dialog modal-side modal-top-right" role="document">
                <div class="modal-content">
                    <form id="new_customer_frm" autocomplete="off">
                        <div class="modal-body">
                            <h6 class="font-weight-bold">New Customer Registration</h6>
                            <hr class="hr">

                            <div class="form-group d-none">
                                <label for="">Customer ID</label>
                                <input type="text" class="form-control" name="customer_id" id="customer_id" value=" <?php echo customer_idgen(); ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="">Full Name Or Company Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="" required>
                            </div>

                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="text" class="form-control" name="phone" id="phone" value="">
                            </div>

                            <div class="form-group">
                                <label for="">Category</label>
                                <select class="custom-select browser-default" name="category" id="category">
                                    <option value="artist">Artist / Designer / Photographer</option>
                                    <option value="individual">Individual</option>
                                    <option value="institution">Institution</option>
                                </select>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-black">Save changes</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->



        <div id="new_invoice_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-side modal-top-right">
                <div class="modal-content">
                    <form id="new_invoice_frm">
                        <div class="modal-body">

                            <h6 class="font-weight-bold">New Invoice</h6>
                            <hr class="hr">

                            <div class="form-group">
                                <label for="">Invoice Type</label>
                                <select class="custom-select browser-default" name="invoice_type">
                                    <?php
                                    $get_invoice_types = mysqli_query($db, "SELECT * FROM invoice_types") or die(mysqli_error($db));
                                    while ($types = mysqli_fetch_array($get_invoice_types)) {
                                    ?>
                                        <option value="<?php echo $types['type_id']; ?>"><?php echo $types['name']; ?></option>
                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Customer ID</label>
                                        <!-- <input type="text" class="form-control" name="customer_id" id="customer_id" readonly> -->
                                        <select class="browser-default custom-select" name="customer_id" id="customer_idd">
                                            <?php
                                            $get_customers = mysqli_query($db, "SELECT * FROM customers WHERE subscriber_id='" . $active_subscriber . "' AND status='active' ORDER BY name asc") or die(mysqli_error($db));
                                            while ($customers = mysqli_fetch_array($get_customers)) {
                                            ?>
                                                <option value="<?php echo $customers['customer_id']; ?>"><?php echo $customers['name']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Invoice ID</label>
                                        <input type="text" class="form-control input-sm" name="invoice_id" id="invoice_id" value="<?php echo $inv->InvoiceIdGen(); ?>" readonly>
                                    </div>
                                </div>
                            </div>




                            <div class="form-group">
                                <label for="">Purchase Order # (Or reference)</label>
                                <input type="text" class="form-control input-sm" name="ref" value="">
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Date Issued</label>
                                        <input type="text" class="form-control input-sm" name="date_issued" id="date_issued" value="<?php echo $today; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Payment Due Date</label>
                                        <input type="text" class="form-control input-sm" name="due_date" id="due_date" value="<?php echo $today; ?>" required>
                                    </div>
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="">Created By</label>
                                <input type="text" name="created_by" id="created_by" class="form-control" value="" placeholder="Full Name of who'd sign the invoice">
                            </div>





                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-white" data-dismiss="modal">
                                Close
                            </button>

                            <button type="submit" class="btn btn-black ">
                                Create Invoice
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php require_once('../navigation/admin_footer.php'); ?>
        <script type="text/javascript" src="../js/invoice.js"></script>
        <script type="text/javascript">
            $('#customer_idd').select2();

            $('#new_customer_frm').one('submit', function(event) {
                event.preventDefault();
                var customer_id = $('#customer_id').val();
                $.ajax({
                    url: '../serverscripts/admin/new_customer_frm.php',
                    type: 'GET',
                    data: $('#new_customer_frm').serialize(),
                    success: function(msg) {
                        if (msg === 'save_successful') {
                            bootbox.alert("Customer registration successful", function() {
                                window.location = 'customer_portal.php?customer_id=' + customer_id
                            })
                        } else {
                            bootbox.alert(msg)
                        }
                    }
                })
            });
        </script>
        </body>

        </html>