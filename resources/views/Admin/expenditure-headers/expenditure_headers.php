<?php
// require main file header
require_once '../_main.php';
?>


<div class="app-content">

    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body pt-2 pb-2">
                    Expenditure Report
                    <p class="m-0 montserrat font-weight-bold" style="font-size:18px"><?php echo mycustomers(); ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body pb-2">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="font-weight-bold montserrat">Expenditure Headers</h6>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="button" class="btn elegant-color-dark btn-sm m-0" style="height:25px" data-toggle="modal" data-target="#new_category_modal"><i class="fas fa-plus mr-2"></i> New Header</button>

                        </div>
                    </div>

                    <hr class="hr">

                    <table class="table datatables">
                        <thead class="elegant-color-dark white-text">
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Description</th>
                                <th class="text-right">Amount</th>
                                <th class="text-right">Percentage</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $annual_expenditure = expenditure_period($year_start, $year_end);
                            $query = mysqli_query($db, "SELECT * FROM expenditure_headers WHERE subscriber_id='" . $active_subscriber . "' || subscriber_id='754618923' ORDER BY header_name ASC") or die('failed');

                            $i = 1;
                            while ($rows = mysqli_fetch_array($query)) {
                                $total_expenditure = expenditure_by_header($rows['header_id']);
                            ?>
                                <tr class="text-uppercase">
                                    <td class=""><?php echo $i++; ?></td>
                                    <td class=""><?php echo $rows['header_id']; ?></td>
                                    <td class=""><a href="#"><?php echo $rows['header_name']; ?></a> </td>
                                    <td class="text-right"><?php echo number_format($total_expenditure, 2); ?></td>
                                    <td class="text-right"><?php echo number_format(($total_expenditure / $annual_expenditure) * 100, 2); ?></td>
                                    <td class="text-right">
                                        <i class="fas fa-pen mr-2"></i>
                                        <i class="fas fa-trash"></i>
                                    </td>

                                </tr>

                            <?php
                            }
                            ?>

                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>




    <div id="new_category_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-side modal-top-right" style="width:300px">
            <div class="modal-content">
                <div class="modal-header elegant-color-dark">
                    <h4 class="modal-title white-text" id="myModalLabel">New Header</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="new_expenditure_header_frm">
                    <div class="modal-body">

                        <!-- <div class="form-group">
              <label for="" class="label">Header ID</label>
              <input type="text" class="form-control" name="header_id" id="header_id">
            </div> -->

                        <div class="form-group">
                            <label for="" class="label">Header Name</label>
                            <input type="text" class="form-control" name="header_name" id="header_name">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-black">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <?php require_once('../navigation/admin_footer.php'); ?>
    <script type="text/javascript">
        $('#new_expenditure_header_frm').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: '../serverscripts/admin/new_expenditure_header_frm.php',
                type: 'GET',
                data: $(this).serialize(),
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
    </script>
    </body>

    </html>