<?php
// require main file header
require_once '../_main.php';
?>

<?php
$employee = new Employee($q->db, $q->mysqli);
?>

<div class="app-content">

    <div class="d-flex justify-content-center mb-5">
        <div class="col-4">

            <h2 class="fw-700 montserrat mb-4">New Employee</h2>

            <form id="" autocomplete="off" method="POST" action="employee-controller/new-employee.php">

                <div class="card mb-3">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class="browser-default custom-select" name="role" id="role" required>
                                        <option value="">--Role--</option>

                                        <?php foreach ($employee->employeeCategories() as $key => $value) : ?>
                                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="surname" id="surname" placeholder="Surname" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="othernames" id="othernames" placeholder="Othernames" required>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="date_of_birth" id="dob" placeholder="Date Of Birth" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select class="browser-default custom-select" name="sex" required>
                                        <option value="">----Sex-----</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-1">
                                    <input type="text" class="form-control" name="address" id="" placeholder="Address" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-1">
                                    <input type="text" class="form-control" name="phone_number" id="" placeholder="Phone Number" required>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">

                        <div class="form-group">
                            <input type="text" class="form-control" name="next_of_kin" id="next_of_kin" placeholder="Next Of Kin Name" required>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-1">
                                    <input type="text" class="form-control" name="nok_phone" id="nok_phone" placeholder="Next Of Kin Phone" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-1">
                                    <input type="text" class="form-control" name="nok_address" id="nok_address" placeholder="Next Of Kin Address" required>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="card mb-3">
                    <div class="card-body">

                        <div class="form-group">
                            <input type="text" class="form-control" name="emergency_person" id="" placeholder="Emergency Person Name" required>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-1">
                                    <input type="text" class="form-control" name="emergency_contact" id="" placeholder="Emergency Contact Phone" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-1">
                                    <input type="text" class="form-control" name="emergency_address" id="" placeholder="Emergency Contact Address" required>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="text-end">
                    <a href="index.php" type="button" class="btn btn-outline-danger">
                        <i class="fas fa-long-arrow-alt-left mr-3  "></i> Return
                    </a>
                    <button type="submit" class="btn btn-primary mr-0">
                        <i class="fas fa-check mr-3  "></i> Create Employee
                    </button>
                </div>

            </form>


        </div>

    </div>






    <?php require_once $appLink . 'navigation/main/footer.php'; ?>

    <script type="text/javascript">
        $('.list-group-item').removeClass('active')
        $('#hr_nav').addClass('active')
        $('#hr_submenu').addClass('show')
        $('#employeeid_li').addClass('active-submenu')


        $('#dob').datepicker()

        $('#role').select2();

        $('#dob').on('change', function() {
            $(this).datepicker('hide');
        })

        $('#employee_frm').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: '../serverscripts/admin/Employees/new.php',
                type: 'GET',
                data: $('#employee_frm').serialize(),
                success: function(msg) {
                    if (msg === 'save_successful') {
                        bootbox.alert("Employee registration successful", function() {
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