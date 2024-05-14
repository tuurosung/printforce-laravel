<?php
// require main file header
require_once '../_main.php';
?>

<?php
// check if customer id was passed
if (!isset($_GET) || empty($_GET['customer_id'])) {

    if (isset($_SERVER['HTTP_REFERER'])) {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        header('location: index.php');
    }
}
?>

<?php
$customer = new Customer($q->db, $q->mysqli);
$invoice = new Invoice($q->db, $q->mysqli);
$account = new Account($q->db, $q->mysqli);
$service = new Service($q->db, $q->mysqli);


// clean the GET variable
$_GET = array_map([$seagate, 'Clean'], $_GET);

$customer_id = $_GET['customer_id'];
$customer->customer_id = $customer_id;
$customer->CustomerInfo();
?>

<div class="app-content">

    <div class="d-flex justify-content-center">

        <div class="col-6">

            <h4 class="montserrat fs-30px fw-600 mb-3">Embroidery Job</h4>

            <div class="card mb-2">
                <div class="card-body">
                    <h4 class="Axiforma"><?php echo $customer->name; ?> </h4>
                    <p><strong>Phone Number:</strong> <?php echo $customer->phone; ?></p>
                </div>
            </div>

            <form id="" autocomplete="off" method="POST" action="jobs-controller/new-embroidery.php">

                <div class="card mb-3">
                    <div class="card-body">

                        <div class="row d-none">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Customer ID</label>
                                    <input type="text" class="form-control" name="customer_id" id="customer_id" value=" <?php echo $customer_id; ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Service Name</label>
                                    <select class="browser-default custom-select" name="service_id" id="em_service">

                                        <option value="">--- Select Service ---</option>

                                        <?php
                                        $list = $service->filterByCategory('003');
                                        foreach ($list as $services) : ?>

                                            <option value="<?php echo $services['service_id']; ?>" data-cost="<?php echo $services[$customer->category] ?>"><?php echo $services['service_name']; ?></option>

                                        <?php endforeach; ?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Cost</label>
                                    <input type="text" class="form-control" name="cost" id="em_cost" readonly>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Quantity</label>
                                    <input type="text" class="form-control" name="qty" id="em_qty" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Embroidery Cost</label>
                                    <input type="text" class="form-control" name="em_total" id="em_total" readonly required>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card">
                    <div class="card-body">

                        <h6 class="font-weight-bold">Production Materials</h6>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Material Purchase</label>
                                    <select class="custom-select browser-default" name="mat_supply" id="mat_supply">
                                        <option value="yes">Company Purchase</option>
                                        <option value="no">Client Provide</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Unit Cost</label>
                                    <input type="text" class="form-control" name="mat_cost" id="mat_unit_cost" required>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Purchase Cost</label>
                                    <input type="text" class="form-control" name="purchase_cost" id="purchase_cost" readonly required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Overall Cost</label>
                                    <input type="text" class="form-control" name="total" id="emb_total" readonly required>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="">Notes (optional eg; CRS Farmers T-shirts)</label>
                            <input type="text" class="form-control" name="notes" id="em_notes" value="">
                        </div>

                    </div>

                </div>

                <div class="text-end">
                    <a href="<?php echo $sideBarLink; ?>customers/customer-portal.php?customer_id=<?php echo $customer_id; ?>" type="button" class="btn btn-outline-danger"><i class="fas fa-long-arrow-alt-left mr-3  "></i> Return</a>
                    <button type="submit" class="btn btn-primary mr-0"><i class="fas fa-check mr-3"></i> Create Job</button>
                </div>

            </form>

        </div>



        <?php require_once $appLink . 'navigation/main/footer.php'; ?>

        <script type="text/javascript" src="<?php echo $staticLink; ?>includes/js/CustomerPortal/customer_portal.js"></script>
        <script type="text/javascript" src="<?php echo $staticLink; ?>js/invoice.js"></script>
        <script type="text/javascript" src="<?php echo $staticLink; ?>includes/js/CustomerPortal/customerPortal.js"></script>

        </body>
        <script type="text/javascript">
            $('#em_service').select2();

            var service_cost = $('#em_service').find(":selected").data('cost');
            $("#em_cost").val(service_cost);
            setTimeout(function() {
                $('#em_qty').focus()
            }, 300);

            $('#em_service').on('change', function(event) {
                event.preventDefault();

                var service_cost = $('#em_service').find(":selected").data('cost');
                $("#em_cost").val(service_cost);

                setTimeout(function() {
                    $('#em_qty').focus()
                }, 300);

            }); //end change event

            $("#em_qty").on('keyup', function(event) {
                event.preventDefault();

                var qty = $('#em_qty').val()
                qty = (qty === '' || isNaN(qty)) ? 0 : parseInt(qty)

                var cost = $('#em_cost').val()
                cost = (cost === '' || isNaN(cost) || cost <= 0) ? 0 : parseFloat(cost)

                $('#em_total,#emb_total').val((Math.round(qty * cost)).toFixed(2))
            });


            $('#mat_supply').on('change', function(event) {
                event.preventDefault();
                var mat_supply = $(this).val()
                if (mat_supply === 'yes') {
                    $('#mat_unit_cost').prop('readonly', false)

                } else if (mat_supply === 'no') {
                    $('#mat_unit_cost,#purchase_cost').val('0.00');
                    $('#mat_unit_cost,#purchase_cost').prop('readonly', true)
                    $('#emb_total').val($('#em_total').val())
                }
            });

            $('#mat_unit_cost').on('keyup', function(event) {
                event.preventDefault();

                var qty = $('#em_qty').val()
                qty = (qty === '' || isNaN(qty)) ? 0 : parseInt(qty)

                var mat_unit_cost = $('#mat_unit_cost').val()
                mat_unit_cost = (mat_unit_cost === '' || isNaN(mat_unit_cost)) ? 0 : parseFloat(mat_unit_cost)

                $("#purchase_cost").val((Math.round(qty * mat_unit_cost)).toFixed(2))
                $('#emb_total').val((parseFloat($('#purchase_cost').val()) + parseFloat($("#em_total").val())).toFixed(2))

            });

            $('#new_embroidery_modal').on('shown.bs.modal', function(event) {
                event.preventDefault();

                $('#new_embroidery_frm').one('submit', function(event) {
                    event.preventDefault();

                    $(this).submit(function(event) {
                        return false;
                    });

                    $.ajax({
                        url: '../serverscripts/admin/new_embroidery_frm.php',
                        type: 'GET',
                        data: $('#new_embroidery_frm').serialize(),
                        success: function(msg) {
                            if (msg === 'save_successful') {
                                bootbox.alert("Job registration successful", function() {
                                    window.location.reload()
                                })
                            } else {
                                bootbox.alert(msg)
                            }
                        }
                    }) //end ajax
                }); //end large format submit

            }); //end large format modal show
        </script>

        </html>