<?php
// require core files
require_once '../_load.php';

// check if payment id was passed
if (!isset($_GET) || empty($_GET['service_id'])) {

    if (isset($_SERVER['HTTP_REFERER'])) {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        header('location: index.php');
    }
}


require_once $appLink . 'navigation/header.php';
require_once $appLink . 'navigation/admin_nav.php';

// subscription control code
require_once $appLink . 'app/_bounce.php';

// require menu
require_once '_menu.php';
?>


<?php
$service  = new Service($q->db, $q->mysqli);

// clean the GET variable
$_GET = array_map([$seagate, 'Clean'], $_GET);

$service_id = $_GET['service_id'];
$service->service_id = $service_id;
$service_info = $service->serviceInfo();

if (!is_array($service_info)) {
    echo "<script type='text/javascript'>window.location = 'index.php'</script>";
}

?>

<div class="app-content">


    <div class="d-flex justify-content-center mb-5">

        <div class="col-5">

            <h4 class="fs-30px fw-600 montserrat mb-4">Edit Service</h4>

            <form id="" autocomplete="off" method="POST" action="service-controller/update-service.php">

                <input type="text" class="form-control d-none" name="service_id" value="<?php echo $service_info['service_id']; ?>" required readonly>

                <div class="card mb-3">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="">Service Name</label>
                            <input type="text" class="form-control" name="service_name" id="service_name" value="<?php echo $service_info['service_name']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="">Category</label>
                            <select class="custom-select browser-default" name="category" id="category">
                                <option value="">--- Select Category ---</option>
                                <?php
                                $list = $service->serviceCategories();
                                foreach ($list as $key => $value) : ?>

                                    <option value="<?php echo $key; ?>" <?php echo $key === $service_info['category_id'] ? 'selected' : '' ; ?>>
                                        <?php echo $value; ?>
                                    </option>

                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Artist/Photo</label>
                                    <input type="number" step="any" class="form-control" name="artist" id="artist" value="<?php echo number_format($service_info['artist'],2); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Individual</label>
                                    <input type="number" step="any" class="form-control" name="individual" id="individual" value="<?php echo number_format($service_info['individual'],2); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Institution</label>
                                    <input type="number" step="any" class="form-control" name="institution" id="institution" value="<?php echo number_format($service_info['institution'],2); ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="text-end">
                    <a href="index.php" type="button" class="btn btn-outline-danger"><i class="fas fa-long-arrow-alt-left mr-3  "></i> Return</a>
                    <button type="submit" class="btn btn-primary mr-0"> <i class="fas fa-check mr-3"></i> Update Service</button>
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