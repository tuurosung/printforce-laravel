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


<div class="app-content">

    <div class="d-flex justify-content-between mb-5">
        <div>
            <h2 class="fw-700 montserrat">Registered Users</h2>
        </div>
        <div>
            <a href="new-user.php" type="button" class="btn btn-primary">
                <i class="fas fa-plus mr-3"></i>
                New User
            </a>
        </div>
    </div>


    <div class="card">
        <div class="card-body">


            <table class="table table-secondary datatables">
                <thead class="">
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Access Level</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $i = 1;

                    $sql = $q->mysqli->query("SELECT * FROM users WHERE subscriber_id='$active_subscriber' and status='active'");

                    while ($users = $sql->fetch_assoc()) {

                    ?>
                        <tr class="">
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $users['user_id']; ?></td>
                            <td><?php echo $users['full_name']; ?></td>
                            <td><?php echo $users['phone_number']; ?></td>
                            <td><?php echo $users['access_level']; ?></td>
                            <td><?php echo $users['status']; ?></td>
                            <td class="text-right">

                                <a href="edit-user.php?user_id=<?php echo $users['user_id']; ?>" class="mr-3" style="text-decoration: none;" id="<?php echo $users['user_id']; ?>">
                                    <i class="fas fa-pen text-primary"></i>
                                </a>
                                <a href="#" class="delete" style="text-decoration: none;" data-url="staff-controller/delete-user.php?sn=<?php echo $users['sn']; ?>">
                                    <i class="fas fa-trash-alt text-danger"></i>
                                </a>

                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>

        </div>
    </div>


    <div class="" id="modal_holder"></div>

    <?php require_once $appLink . 'navigation/main/footer.php'; ?>

    <script type="text/javascript">
        $('.table tbody').on('click', '.delete', function(event) {
            event.preventDefault();
            const deleteKey = $(this).data('url');

            bootbox.confirm("This would permanently remove the user. Proceed?", function(r) {
                if (r === true) {
                    window.location = deleteKey;
                } //end if
            })

        });
    </script>
    </body>

    </html>