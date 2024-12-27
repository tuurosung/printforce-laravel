<?php
// require core files
require_once '../_load.php';

// check if user id was passed
if (!isset($_GET) || empty($_GET['user_id'])) {

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
$user = new User($q->db, $q->mysqli);

// clean the GET variable
$_GET = array_map([$seagate, 'Clean'], $_GET);

$user_id = $_GET['user_id'];
$user->user_id = $user_id;
$user->UserInfo();
?>


<div class="app-content">

    <div class="d-flex justify-content-center">

        <div class="col-4">

            <h2 class="fw-700 montserrat mb-3">Edit User</h2>

            <form method="POST" action="staff-controller/new-user.php" enctype="multipart/form-data" autocomplete="off">

                <div class="card mb-3">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="">Full Name</label>
                            <input type="text" class="form-control" name="full_name" id="full_name" value="<?php echo $user->full_name; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="text" class="form-control" name="phone_number" id="phone_number" value="<?php echo $user->phone_number; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="">Access Level</label>
                            <select class="browser-default custom-select" name="access_level" id="access_level" value="">

                                <?php
                                foreach ($user->userAccessLevels() as $key => $value) : ?>

                                    <option value="<?php echo $key; ?>" <?php echo $user->access_level === $key ? 'selected' : '' ?> > <?php echo $value; ?></option>

                                <?php endforeach; ?>

                            </select>
                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-4 mb-md-0">
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" value="" required readonly>
                                </div>
                            </div>

                            <div class="col-md-6 mb-4 mb-md-0">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" value="" required>
                                </div>
                            </div>

                        </div>





                    </div>
                </div>

                <div class="text-end">
                    <a href="index.php" type="button" class="btn btn-outline-danger"><i class="fas fa-long-arrow-alt-left mr-3  "></i> Return</a>
                    <button type="submit" class="btn btn-primary mr-0"><i class="fas fa-check mr-3  "></i> Update User Information</button>
                </div>

            </form>


        </div>

    </div>





    <div class="" id="modal_holder"></div>

    <?php require_once $appLink . 'navigation/main/footer.php'; ?>

    <script type="text/javascript">
        $('#access_level').select2()
    </script>
    </body>

    </html>