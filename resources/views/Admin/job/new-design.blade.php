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

            <h4 class="Axiforma fs-30px fw-600 mb-3">Design Job</h4>

            <div class="card mb-2">
                <div class="card-body">
                    <h4 class="Axiforma"><?php echo $customer->name; ?> </h4>
                    <p><strong>Phone Number:</strong> <?php echo $customer->phone; ?></p>
                </div>
            </div>

            <form id="" autocomplete="off" method="POST" action="jobs-controller/new-design.php">

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
                                    <select class="browser-default custom-select" name="service_id" id="de_service">
                                        <option value="">--- Select Service --</option>
                                        <?php
                                        $list = $service->filterByCategory('002');
                                        foreach ($list as $services) :
                                        ?>
                                            <option value="<?php echo $services['service_id']; ?>" data-cost="<?php echo $services[$customer->category] ?>"><?php echo $services['service_name']; ?></option>
                                        <?php
                                        endforeach;
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Cost</label>
                                    <input type="text" class="form-control" name="cost" id="de_cost" readonly required>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Copies</label>
                                    <input type="text" class="form-control" name="copies" id="de_copies" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Cost</label>
                                    <input type="text" class="form-control" name="total" id="de_total" readonly required>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="">Notes (optional eg; Logo Design)</label>
                            <input type="text" class="form-control" name="notes" id="de_notes" value="">
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
            $('#de_service').select2();

            var service_cost = $('#de_service').find(":selected").data('cost');
            $("#de_cost").val(service_cost);

            $('#de_service').on('change', function(event) {
                event.preventDefault();

                var service_cost = $('#de_service').find(":selected").data('cost');
                $("#de_cost").val(service_cost);

                setTimeout(function() {
                    $('#de_copies').focus()
                }, 300);

            }); //end change event

            $("#de_copies").on('keyup', function(event) {
                event.preventDefault();

                var copies = $('#de_copies').val()
                copies = (copies === '' || isNaN(copies) || copies === 'undefined') ? 0 : parseInt(copies);

                var cost = $('#de_cost').val()
                cost = (cost === '' || isNaN(cost) || cost === 'undefined') ? 0 : parseFloat(cost);

                $('#de_total').val((Math.round(copies * cost)).toFixed(2))
            });
        </script>

        </html>