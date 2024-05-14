<?php require_once '../navigation/header.php'; ?>
<?php require_once '../navigation/admin_nav.php'; ?>



<?php
$e = new Expenditure($q->db, $q->mysqli);
?>


<?php
include_once '../navigation/Topnav/topbar_start.php';
?>

<ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex flex-row align-items-center pl-lg-5">
    <li class="nav-item mr-4">
        <a class="nav-link montserrat font-weight-bold" href="#" style="font-size: 1.25rem; font-weight:500">EXPENSE HEADERS</a>
    </li>

    <li class="nav-item mr-3">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#newCategoryModal"><i class="fas fa-plus mr-1  "></i> Add Header</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="expenditure.php"><i class="fas fa-file-alt mr-1  "></i> Expenses</a>
    </li>


</ul>

<?php
include_once '../navigation/Topnav/topbar_end.php';
?>


<div class="app-content">

        <?php
        require_once '../includes/subscription.php';
        ?>


        <div class="row">
            <div class="col-md-12 mb-4 mb-md-0">

                <div class="card" style="min-height: 80vh;">
                    <div class="card-body">

                        <h4 class="montserrat mb-5 font-weight-bold">All Headers</h4>

                        <table class="table datatables table-condensed">
                            <thead class="">
                                <tr>
                                    <th>#</th>
                                    <th>Description</th>
                                    <th>Type</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php


                                $sql = "SELECT * FROM expenditure_headers WHERE  subscriber_id = '754618923'  AND status='active' ORDER BY header_name ASC";
                                $r = $mysqli->query($sql);
                                $i = 1;

                                while ($rows = $r->fetch_assoc()) :
                                ?>
                                    <tr class="">
                                        <td class=""><?php echo $i++; ?></td>
                                        <td class="text-capitalize"><a href="#"><?php echo ucfirst(strtolower($rows['header_name'])); ?></a> </td>
                                        <td>System Default</td>
                                        <td class="text-right">
                                            <div class="dropdown open">
                                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Options
                                                </button>
                                                <div class="dropdown-menu p-0 b-0 dropdown-menu-right minioptions" aria-labelledby="dropdownMenu1">
                                                    <ul class="list-group">
                                                        <li class="list-group-item edit" id="<?php echo $rows['header_id']; ?>"><i class="fas fa-pen mr-3"></i> Edit</li>
                                                        <li class="list-group-item delete_header" id="<?php echo $rows['header_id']; ?>"><i class="fas fa-trash mr-3  "></i> Delete</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>

                                <?php endwhile; ?>


                                <?php

                                $sql = "SELECT * FROM expenditure_headers WHERE subscriber_id='$active_subscriber' AND status='active' ORDER BY header_name ASC";
                                $r = $mysqli->query($sql);
                                $i = 1;

                                while ($rows = $r->fetch_assoc()) : ?>

                                    <tr class="">
                                        <td class=""><?php echo $i++; ?></td>
                                        <td class="text-capitalize"><a href="#"><?php echo ucfirst(strtolower($rows['header_name'])); ?></a> </td>
                                        <td>My Headers</td>
                                        <td class="text-right">
                                            <div class="dropdown open <?php if ($rows['subscriber_id'] != $active_subscriber) {
                                                                            echo 'd-none';
                                                                        } ?>">
                                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Options
                                                </button>
                                                <div class="dropdown-menu p-0 b-0 dropdown-menu-right minioptions" aria-labelledby="dropdownMenu1">
                                                    <ul class="list-group">
                                                        <li class="list-group-item edit" id="<?php echo $rows['header_id']; ?>"><i class="fas fa-pen mr-3"></i> Edit</li>
                                                        <li class="list-group-item delete_header" id="<?php echo $rows['header_id']; ?>"><i class="fas fa-trash mr-3  "></i> Delete</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>

                                <?php endwhile; ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="newCategoryModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Header</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="newHeaderFrm" autocomplete="off">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="" class="label">Header Name</label>
                                <input type="text" class="form-control" name="header_name" id="header_name" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-black"><i class="fas fa-plus mr-3  "></i> Save Header</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div id="modal_holder"></div>


        <?php require_once('../navigation/admin_footer.php'); ?>
        <script type="text/javascript">
            $('.list-group-item').removeClass('active')
            $('#expenditureH_nav').addClass('active')

            $('.select2').select2()

            $('#newHeaderFrm').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: '../serverscripts/admin/Expenditure/newHeaderFrm.php',
                    type: 'GET',
                    data: $('#newHeaderFrm').serialize(),
                    success: function(msg) {
                        if (msg === 'save_successful') {
                            bootbox.alert('Header Added Successfully', function() {
                                window.location.reload()
                            })
                        } else {
                            bootbox.alert(msg)
                        }
                    }
                })
            });

            $('.table tbody').on('click', '.delete_header', function(event) {
                event.preventDefault();
                var header_id = $(this).attr('ID')
                bootbox.confirm("Do you want to delete this header?", function(r) {
                    if (r === true) {
                        $.get('../serverscripts/admin/Expenditure/delete_header.php?header_id=' + header_id, function(msg) {
                            if (msg === 'delete_successful') {
                                bootbox.alert("Header deleted successfully", function() {
                                    window.location.reload()
                                })
                            } else {
                                bootbox.alert(msg)
                            }
                        })
                    }
                }) //end confirm
            })



            $('.table tbody').on('click', '.edit', function(event) {
                event.preventDefault();
                var header_id = $(this).attr('ID')
                $.get("../serverscripts/admin/Expenditure/editHeaderModal.php?header_id=" + header_id,
                    function(msg) {
                        $('#modal_holder').html(msg)
                        $('#editHeaderModal').modal('show')

                        $('#editHeaderFrm').on('submit', function(event) {
                            event.preventDefault();
                            $.ajax({
                                type: "GET",
                                url: "../serverscripts/admin/Expenditure/editHeaderFrm.php",
                                data: $('#editHeaderFrm').serialize(),
                                success: function(response) {
                                    if (response === 'update_successful') {
                                        bootbox.alert('Header Updated Successfully', function() {
                                            window.location.reload()
                                        })
                                    } else {
                                        bootbox.alert(response)
                                    }
                                }
                            });
                        })
                    }
                );
            })
        </script>
        </body>

        </html>