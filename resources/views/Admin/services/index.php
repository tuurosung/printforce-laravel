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

    <div class="d-flex justify-content-between mb-5">
        <div>
            <h4 class="fs-30px fw-600 montserrat">Services</h4>
        </div>
        <div>
            <a href="new-service.php" type="button" class="btn btn-outline-primary"><i class="fas fa-plus mr-3  "></i> New Service</a>
        </div>
    </div>

    <!-- tab v2 with card -->
    <div class="card">
        <ul class="nav nav-tabs nav-tabs-v2 ps-4 pe-4">
            <!-- <li class="nav-item me-3"><a href="#homev2WithCard" class="nav-link active" data-bs-toggle="tab">Home</a></li>
            <li class="nav-item me-3"><a href="#profilev2WithCard" class="nav-link" data-bs-toggle="tab">Profile</a></li> -->


            <?php
            $k = 1; //
            foreach ($service->serviceCategories() as $key => $value) : ?>
                <li class="nav-item me-3"><a href="#<?php echo $key; ?>" class="nav-link <?php echo $k++ === 1 ? 'active' : ''; ?> " data-bs-toggle="tab"><?php echo $value; ?></a></li>
            <?php endforeach; ?>
        </ul>
        <div class="tab-content p-4">
            <?php
            $k = 1; //
            foreach ($service->serviceCategories() as $key => $value) : ?>
                <div class="tab-pane fade <?php echo $k++ === 1 ? 'show active' : ''; ?>" id="<?php echo $key; ?>">

                    <h5><?php echo $value; ?></h5>

                    <table class="table  table-secondary">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Service Name</th>
                                <th class="text-right">Artist</th>
                                <th class="text-right">Individual</th>
                                <th class="text-right">Institution</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $list = $service->filterByCategory($key);
                            if (is_array($list)) :
                                foreach ($list as $services) {

                            ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $services['service_name']; ?></td>
                                        <td class="text-right"><?php echo number_format($services['artist'], 2); ?></td>
                                        <td class="text-right"><?php echo number_format($services['individual'], 2); ?></td>
                                        <td class="text-right"><?php echo number_format($services['institution'], 2); ?></td>
                                        <td class="text-right">

                                            <a href="edit-service.php?service_id=<?php echo $services['service_id']; ?>" style="text-decoration:none">
                                                <i class="fas fa-pen text-primary mr-3  "></i>
                                            </a>
                                            <a href="#" style="text-decoration: none;">
                                                <i class="fas fa-trash-alt text-danger  "></i>
                                            </a>

                                        </td>
                                    </tr>

                            <?php
                                }
                            endif;
                            ?>
                        </tbody>
                    </table>

                </div>
            <?php endforeach; ?>
        </div>
    </div>



    <?php require_once $appLink . 'navigation/main/footer.php'; ?>


    <script type="text/javascript">
        $('#new_service_frm').on('submit', function(event) {
            event.preventDefault();
            // var customer_id=$('#customer_id').val();
            $.ajax({
                url: '../serverscripts/admin/new_service_frm.php',
                type: 'POST',
                data: $('#new_service_frm').serialize(),
                success: function(msg) {
                    if (msg === 'save_successful') {
                        bootbox.alert("Service registration successful", function() {
                            window.location.reload()
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