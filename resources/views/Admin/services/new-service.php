<?php
// require core files
require_once '../_load.php';
require_once $appLink . 'navigation/header.php';
require_once $appLink . 'navigation/admin_nav.php';

// subscription control code
require_once $appLink . 'app/_bounce.php';

// require menu
require_once '_menu.php';
?>


<?php
$service  = new Service($q->db, $q->mysqli);

?>

<div class="app-content">

    <div class="d-flex justify-content-center mb-5">

        <div class="col-5">

            <h4 class="fs-30px fw-600 montserrat">New Service</h4>

            <form id="new_service_frm" autocomplete="off" method="POST" action="service-controller/new-service.php">

                <div class="card mb-3">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="">Service Name</label>
                            <input type="text" class="form-control" name="service_name" id="service_name" value="" required>
                        </div>

                        <div class="form-group">
                            <label for="">Category</label>
                            <select class="custom-select browser-default" name="category" id="category">
                                <option value="">--- Select Category ---</option>
                                <?php
                                $list = $service->serviceCategories();
                                foreach ($list as $key => $value) : ?>

                                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>

                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Artist/Photo</label>
                                    <input type="number" step="any" class="form-control" name="artist" id="artist" value="" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Individual</label>
                                    <input type="number" step="any" class="form-control" name="individual" id="individual" value="" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Institution</label>
                                    <input type="number" step="any" class="form-control" name="institution" id="institution" value="" required>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="text-end">
                    <a href="index.php" type="button" class="btn btn-outline-danger"><i class="fas fa-long-arrow-alt-left mr-3  "></i> Return</a>
                    <button type="submit" class="btn btn-primary mr-0"> <i class="fas fa-check mr-3"></i> Create Service</button>
                </div>

            </form>
        </div>

    </div>


    <?php require_once $appLink . 'navigation/main/footer.php'; ?>


    <script type="text/javascript">
        $('#category').select2()
    </script>
    </body>

    </html>