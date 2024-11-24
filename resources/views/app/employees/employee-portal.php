<?php
// require main file header
require_once '../_main.php';
?>

<?php
// check if employee id was passed
if (!isset($_GET) || empty($_GET['employee_id'])) {
    ob_clean();
    if (isset($_SERVER['HTTP_REFERER'])) {
        header('location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        header('location: index.php');
    }
}

?>

<?php

$employee = new Employee($q->db, $q->mysqli);

$_GET = array_map([$seagate, 'Clean'], $_GET);

$employee->employee_id = $_GET['employee_id'];
$info = $employee->employeeInfo();

?>

<div class="app-content">



    <div class="d-flex justify-content-between mb-5">
        <div>
            <h2 class="fw-700 montserrat">Employee Portal</h2>
        </div>
        <div>
            <button type="button" class="btn btn-outline-primary"><i class="fas fa-plus mr-3  "></i> New Query</button>
            <button type="button" class="btn btn-outline-danger"><i class="fas fa-fire mr-3  "></i> Dismiss</button>
        </div>
    </div>

    <?php


    $e = new Employee($q->db, $q->mysqli);


    ?>

    <div class="card mb-5">
        <div class="card-body">
            <div class="row">

                <div class="col-3">
                    <p class="m-0 font-weight-bold Axiforma fs-12px"><?php echo $info['employee_id']; ?> </p>
                    <p class="m-0 font-weight-bold Axiforma fs-18px"><?php echo $info['othernames'] . ' ' . $info['surname'];  ?> </p>
                    <p class="m-0"><?php echo $info['address']; ?> </p>
                    <p class="m-0 "><?php echo $info['phone_number']; ?> </p>
                </div>

                <div class="col-3">

                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">

                </div>

            </div>
        </div>
    </div>

    <!-- tab v2 with card -->
    <div class="card">
        <ul class="nav nav-tabs nav-tabs-v2 ps-4 pe-4">
            <li class="nav-item me-3"><a href="#attendance" class="nav-link active" data-bs-toggle="tab">Attendance Records</a></li>
            <li class="nav-item me-3"><a href="#payslips" class="nav-link" data-bs-toggle="tab">Payslips</a></li>
            <li class="nav-item me-3"><a href="#discipline" class="nav-link" data-bs-toggle="tab">Disciplinary Records</a></li>
        </ul>
        <div class="tab-content p-4">
            <div class="tab-pane fade show active" id="attendance">
                <h5 class="card-title font-weight-bold montserrat mb-5">Attendance Records</h5>

                <table class="table datatables table-condensed">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Time In</th>
                            <th>Time Out</th>
                            <th>Number Of Hours</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $query = mysqli_query($db, "SELECT * FROM clocking WHERE employee_id='" . $employee_id . "' AND subscriber_id='" . $active_subscriber . "' ORDER BY date DESC") or die(mysqli_error($db));
                        while ($rows = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $rows['date']; ?></td>
                                <td><?php echo $rows['time_in']; ?></td>
                                <td><?php echo $rows['time_out']; ?></td>
                                <td><?php echo $e->ActiveHours($rows['time_in'], $rows['time_out']); ?></td>
                            </tr>
                        <?php
                        }

                        ?>

                    </tbody>
                </table>

            </div>
            <div class="tab-pane fade" id="payslips">
                <h5 class="card-title font-weight-bold montserrat mb-5">Employee Paylip</h5>

                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Lorem</th>
                            <th scope="col">Ipsum</th>
                            <th scope="col">Dolor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Lorem</td>
                            <td>Ipsum</td>
                            <td>Dolor</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Lorem</td>
                            <td>Ipsum</td>
                            <td>Dolor</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Lorem</td>
                            <td>Ipsum</td>
                            <td>Dolor</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="discipline">
                <h5 class="card-title montserrat font-weight-bold m-5">Displinary Records</h5>

                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Lorem</th>
                            <th scope="col">Ipsum</th>
                            <th scope="col">Dolor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Lorem</td>
                            <td>Ipsum</td>
                            <td>Dolor</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Lorem</td>
                            <td>Ipsum</td>
                            <td>Dolor</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Lorem</td>
                            <td>Ipsum</td>
                            <td>Dolor</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <?php require_once $appLink . 'navigation/main/footer.php'; ?>


    <script type="text/javascript">
        $('#update_passkey_frm').on('submit', function(event) {
            event.preventDefault();
            bootbox.confirm("Update employee passkey?", function(r) {
                if (r === true) {
                    $.ajax({
                        url: '../serverscripts/admin/Employees/update_passkey_frm.php',
                        type: 'GET',
                        data: $('#update_passkey_frm').serialize(),
                        success: function(msg) {
                            if (msg === 'update_successful') {
                                bootbox.alert("Pass key updated successfully", function() {
                                    window.location.reload()
                                })
                            } else {
                                bootbox.alert(msg)
                            }
                        }
                    })
                }
            })
        });
    </script>
    </body>

    </html>