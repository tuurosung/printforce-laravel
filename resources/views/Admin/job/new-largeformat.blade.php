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

            <h4 class="montserrat fs-30px fw-600 mb-3">Large Format Job</h4>

            <div class="card mb-2">
                <div class="card-body">
                    <h4 class="Axiforma"><?php echo $customer->name; ?> </h4>
                    <p><strong>Phone Number:</strong> <?php echo $customer->phone; ?></p>
                </div>
            </div>

            <form id="" autocomplete="off" method="POST" action="jobs-controller/new-largeformat.php">

                <div class="card mb-3">
                    <div class="card-body">

                        <div class="modal-body">
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
                                        <select class="browser-default custom-select" name="service_id" id="lf_service">
                                            <option value="">--- Select Service ---</option>
                                            <?php

                                            $list = $service->filterByCategory('001');

                                            foreach ($list as $services) : ?>

                                                <option value="<?php echo $services['service_id']; ?>" data-cost="<?php echo $services[$customer->category]; ?>"><?php echo $services['service_name']; ?></option>

                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Cost</label>
                                        <input type="number" step="any" class="form-control" name="cost" id="lf_cost" readonly required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6 mb-4 mb-md-0">
                                    <div class="form-group">
                                        <label for="">Unit Of Measurement</label>
                                        <select class="browser-defaut custom-select" name="measuring_unit" id="measuring_unit" value required>
                                            <option value="ft">Feet</option>
                                            <option value="inch">Inch</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4 mb-md-0">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Premium</label>
                                                <input type="number" step="any" class="form-control" name="premium" id="lf_premium" value="0" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Discount</label>
                                                <input type="number" step="any" class="form-control" name="discount" id="lf_discount" value="0" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>





                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Width</label>
                                        <input type="number" step="any" class="form-control" name="width" id="width" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Height</label>
                                        <input type="number" step="any" class="form-control" name="height" id="height" required>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Copies</label>
                                        <input type="number" class="form-control" name="copies" id="lf_copies" min="1" value="1" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Total Cost</label>
                                        <input type="text" class="form-control" name="total" id="lf_total" readonly required>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="">Notes (optional eg; USAID Banner)</label>
                                <input type="text" class="form-control" name="notes" id="lf_notes" value="">
                            </div>
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
            $('#lf_service').select2();

            var service_cost = $('#lf_service').find(":selected").data('cost');
            $("#lf_cost").val(service_cost);
            $('#width').focus()

            $('#lf_service').on('change', function(event) {
                event.preventDefault();

                var service_cost = $('#lf_service').find(":selected").data('cost');

                $("#lf_cost").val(service_cost);
                $('#width,#height,#copies').val('')

                setTimeout(function() {
                    $('#width').focus()
                }, 300);

            }); //end change event

            $('#measuring_unit').on('change', function(event) {
                event.preventDefault();
                $('#width,#height,#lf_copies,#lf_total').val('')
            });

            $("#lf_copies,#lf_premium,#lf_discount,#height,#width").on('keyup', function(event) {
                event.preventDefault();

                var width = $('#width').val()
                width = (width === '' || isNaN(width)) ? 0 : parseFloat(width)

                var height = $('#height').val()
                height = (height === "" || isNaN(height)) ? 0 : parseFloat(height)

                var copies = $('#lf_copies').val()
                copies = (copies === '' || isNaN(copies)) ? 0 : parseFloat(copies)

                var cost = $('#lf_cost').val()
                cost = (cost === '' || isNaN(cost)) ? 0 : parseFloat(cost)

                var premium = $('#lf_premium').val()
                premium = (premium === '' || isNaN(premium)) ? 0 : parseFloat(premium)

                var discount = $('#lf_discount').val()
                discount = (discount === '' || isNaN(discount)) ? 0 : parseFloat(discount)

                if ($('#measuring_unit').val() === 'ft') {
                    var total = width * height * copies * cost
                    $('#lf_total').val((Math.round(total + premium - discount)).toFixed(2))
                } else if ($('#measuring_unit').val() === 'inch') {
                    var total = ((width * height) / 144) * copies * cost
                    $('#lf_total').val(Math.round(total + premium - discount).toFixed(2))
                }
            });

            // $('#new_largeformat_frm').one('submit', function(event) {
            //     event.preventDefault();

            //     $(this).submit(function() {
            //         return false;
            //     });

            //     $.ajax({
            //         url: '../serverscripts/admin/new_largeformat_frm.php',
            //         type: 'GET',
            //         data: $('#new_largeformat_frm').serialize(),
            //         success: function(msg) {
            //             if (msg === 'save_successful') {
            //                 bootbox.alert("Job registration successful", function() {
            //                     window.location.reload()
            //                 })
            //             } else {
            //                 bootbox.alert(msg)
            //             }
            //         }
            //     }) //end ajax

            // }); //end large format submit
        </script>

        </html>