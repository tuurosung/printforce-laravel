<?php
// require main file header
require_once '../_main.php';
?>

<?php
$employee = new Employee($q->db, $q->mysqli);
?>

<div class="app-content">

    <div class="d-flex justify-content-between mb-5">
        <div>
            <h2 class="fw-700 montserrat">Employees</h2>
        </div>
        <div>
            <a href="new-employee.php" type="button" class="btn btn-primary">
                <i class="fas fa-plus mr-3"></i>
                New User
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            <table class="table datatables table-secondary">
                <thead class="">
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Role</th>
                        <th>Phone #</th>
                        <th class="text-right">Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $list = $employee->all();

                    if (is_array($list)) :
                        foreach ($list as $employees) {

                    ?>
                            <tr class="">
                                <td><?php echo $i++; ?></td>
                                <td style="text-decoration: underline;">
                                    <a href="employee-portal.php?employee_id=<?php echo $employees['employee_id']; ?>">
                                        <?php echo $employees['surname']; ?> <?php echo $employees['othernames']; ?>
                                    </a>

                                </td>
                                <td><?php echo $employee->findCat($employees['role']); ?></td>
                                <td><?php echo $employees['phone_number']; ?></td>
                                <td class="text-right">
                                    <a href="#" class="mr-3 text-decoration-none">
                                        <i class="fas fa-pen text-primary"></i>
                                    </a>
                                    <a href="employee-portal.php?employee_id=<?php echo $employees['employee_id']; ?>" class="mr-3 text-decoration-none">
                                        <i class="fas fa-eye text-purple  "></i>
                                    </a>
                                    <a href="#" class="text-decoration-none">
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
    </div>


    <?php require_once $appLink . 'navigation/main/footer.php'; ?>

    <script type="text/javascript">

    </script>

    </body>

    </html>