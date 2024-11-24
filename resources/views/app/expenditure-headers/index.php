<?php
// require main file header
require_once '../_main.php';
?>


<?php
$expenditureHeader = new ExpenditureHeader($q->db, $q->mysqli);
?>


<div class="app-content">

    <div class="d-flex justify-content-between mb-4">
        <div>
            <h3 class="montserrat fs-30px fw-700">Expenditure Headers</h3>
        </div>
        <div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newCategoryModal"><i class=" fas fa-plus mr-3 "></i> New Header</button>
        </div>
    </div>



    <div class=" row">
        <div class="col-md-12 mb-4 mb-md-0">

            <div class="card">
                <div class="card-body">

                    <table class="table datatables table-secondary">
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

                                        <a href="#" id="<?php echo $rows['header_id']; ?>">
                                            <i class="fas fa-pen text-primary"></i>
                                        </a>
                                        <a href="#" id="<?php echo $rows['header_id']; ?>">
                                            <i class="fas fa-trash-alt text-danger"></i>
                                        </a>
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

                                        <a href="#" class="text-decoration-none mr-3" id="<?php echo $rows['header_id']; ?>">
                                            <i class="fas fa-pen text-primary"></i>
                                        </a>
                                        <a href="#" class="text-decoration-none delete" data-url="header-controller/delete.php?sn=<?php echo $rows['header_id']; ?>">
                                            <i class="fas fa-trash-alt text-danger"></i>
                                        </a>


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
    <div class="modal fade" id="newCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title Axiforma" id="exampleModalLabel">Add New Header</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="" autocomplete="off" method="POST" action="header-controller/create.php">

                    <div class="modal-body">

                        <div class="form-group">
                            <label for="" class="label">Header Name</label>
                            <input type="text" class="form-control" name="header_name" id="header_name" required>
                        </div>

                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-check mr-3"></i> Create Header</button>

                    </div>

                </form>
            </div>
        </div>
    </div>





    <div id="modal_holder"></div>


    <?php require_once $appLink . 'navigation/main/footer.php'; ?>

    <script type="text/javascript">
        $('.list-group-item').removeClass('active')
        $('#expenditureH_nav').addClass('active')

        $('.select2').select2()



        $('.table tbody').on('click', '.delete', function(event) {
            event.preventDefault();
            const deleteKey = $(this).data('url');

            bootbox.confirm("Do you want to delete this header?", function(r) {
                if (r === true) {
                    window.location = deleteKey
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