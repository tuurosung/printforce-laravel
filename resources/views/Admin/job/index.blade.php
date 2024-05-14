<?php
require '../_main.php';
?>


<?php
// initialize class variables
$payment = new Payment($q->db, $q->mysqli);
$account = new Account($q->db, $q->mysqli);
$customer = new Customer($q->db, $q->mysqli);

$job = new Job($q->db, $q->mysqli);
$service = new Service($q->db, $q->mysqli);
$customer = new Customer($q->db, $q->mysqli);

?>


<div class="app-content">

    <div class="d-flex justify-content-between mb-5">
        <div>
            <h4 class="fs-30px fw-600 montserrat">Jobs</h4>
        </div>
        <div></div>
    </div>

    <div class="card">
        <div class="card-body">
            <?php if ($user->isAdmin()) : ?>
                <form id="filter_jobs_frm" autocomplete="off">

                    <div class="row">

                        <div class="col-2">
                            <div class="form-group">
                                <label for="">Start Date</label>
                                <input type="text" class="form-control" id="start_date" name="start_date" value="<?php echo $week_start; ?>">
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label for="">End Date</label>
                                <input type="text" class="form-control" id="end_date" name="end_date" value="<?php echo $week_end; ?>">
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label for="">Customers</label>
                                <select class="custom-select browser-default" name="customer" id="customer_id">
                                    <option value="all">All Customers</option>
                                    <?php
                                    $list = $customer->all();
                                    foreach ($list as $rows) {
                                    ?>
                                        <option value="<?php echo $rows['customer_id']; ?>"><?php echo $rows['name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label for="">Service</label>
                                <select name="service" id="service_id" class="custom-select browser-default" required="required">
                                    <option value="all">All Services</option>
                                    <?php
                                    $list = $service->all();
                                    foreach ($list as $rows) {
                                    ?>
                                        <option value="<?php echo $rows['service_id']; ?> "><?php echo $rows['service_name']; ?> </option>
                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>

                        </div>

                        <div class="col-2">
                            <button type="submit" class="btn btn-primary wide" style="margin-top:27px !important"><i class="fas fa-file-alt mr-2" aria-hidden></i> Generate Report</button>
                        </div>

                    </div>

                </form>

            <?php endif; ?>

            <div class="" id="data_holder">
                <table class="table datatables  table-secondary">
                    <thead class="">
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Job #</th>
                            <th>Customer</th>
                            <th>Service</th>
                            <th class="text-right">Cost</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $i = 1;
                        $total = 0;
                        $list = $job->filterByDate($today, $today, 'all', 'all');

                        if (is_array($list)) :
                            foreach ($list as $jobs) {

                        ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $jobs['date']; ?></td>
                                    <td style="text-decoration: underline;">
                                        <a href="" class="viewjob" id="<?php echo $jobs['job_id']; ?>"><?php echo $jobs['job_id']; ?></a>
                                    </td>
                                    <td class="text-capitalize" style="text-decoration:underline;">
                                        <a href="customer_portal.php?customer_id=<?php echo $jobs['customer_id']; ?> ">
                                            <?php echo strtolower($jobs['customer_name']); ?>
                                        </a>
                                    </td>
                                    <td><?php echo $jobs['service_name']; ?></td>
                                    <td class="text-right"><?php echo number_format($jobs['total'], 2); ?></td>
                                    <td class="text-right">

                                        <a href="#" class="viewjob mr-3" id="<?php echo $jobs['job_id']; ?>" style="text-decoration: none;">
                                            <i class="fas fa-eye text-purple"></i>
                                        </a>

                                        <a href="#" class="printjob mr-3" id="<?php echo $jobs['job_id']; ?>" style="text-decoration: none;">
                                            <i class="fas fa-print text-primary"></i>
                                        </a>

                                        <?php if ($user->isAdmin()) : ?>

                                            <a href="#" class="editjob mr-3" id="<?php echo $jobs['job_id']; ?>" style="text-decoration: none;">
                                                <i class="fas fa-pen text-primary"></i>
                                            </a>

                                            <a href="#" class="delete_job mr-3" id="<?php echo $jobs['job_id']; ?>" style="text-decoration: none;">
                                                <i class="fas fa-trash-alt text-danger"></i>
                                            </a>

                                        <?php endif; ?>


                                    </td>
                                </tr>
                        <?php
                                $total += $jobs['total'];
                            }
                        endif;
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right font-weight-bold Axiforma" style="font-size:15px !important"><?php echo  number_format($total, 2); ?></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <div class="" id="modal_holder"></div>


    <?php require_once $appLink . 'navigation/main/footer.php'; ?>

    <script type="text/javascript">
        $(document).ready(function() {

            // set the active sidebar menu item
            $('.list-group-item').removeClass('active')
            $('#jobs_nav').addClass('active')

            // initialize select2 selects
            $('#customer_id, #service_id').select2();

            // Initialize datepickers
            $('#start_date,#end_date').datepicker()
            $('#start_date,#end_date').on('change', function(event) {
                event.preventDefault();
                $(this).datepicker('hide')
            });

            // Filter form on submit
            $('#filter_jobs_frm').on('submit', function(event) {
                event.preventDefault();

                var start_date = $('#start_date').val();
                var end_date = $('#end_date').val();
                var customer = $('#customer_id').val();
                var service = $('#service_id').val();

                $.post("jobs-controller/filter-jobs.php", {
                        start_date,
                        end_date,
                        customer,
                        service
                    },
                    function(data) {

                        $('#data_holder').html(data)

                        // viewjobs on click
                        $('.table tbody').on('click', '.viewjob', function(event) {
                            event.preventDefault();
                            var job_id = $(this).attr('ID');
                            View(job_id)
                        });

                        // delete job on click
                        $('.table tbody').on('click', '.delete_job', function(event) {
                            event.preventDefault();
                            var job_id = $(this).attr('ID')
                            Delete(job_id)
                        }); //end click

                    }
                );



            });



            // viewjobs on click
            $('.table tbody').on('click', '.viewjob', function(event) {
                event.preventDefault();
                var job_id = $(this).attr('ID');
                View(job_id)
            });

            // delete job on click
            $('.table tbody').on('click', '.delete_job', function(event) {
                event.preventDefault();
                var job_id = $(this).attr('ID')
                Delete(job_id)
            }); //end click


            function View(job_id) {

                $.post("jobs-controller/view-job.php", {
                        job_id
                    },
                    function(msg) {

                        $('#modal_holder').html(msg)
                        $('#job_info_modal').modal('show')

                    }
                );
            }

            // function Edit(job_id) {

            // }

            function Delete(job_id) {
                bootbox.confirm("Delete this job?", function(r) {
                    if (r === true) {
                        $.post("jobs-controller/delete-job.php", {
                                job_id
                            },
                            function(msg) {
                                if (msg === 'delete_successful') {
                                    bootbox.alert("Job deleted successfully", function() {
                                        window.location.reload()
                                    })
                                } else {
                                    bootbox.alert(msg)
                                }
                            }
                        );
                    } //end if
                })
            }


        });
    </script>

    </body>

    </html>