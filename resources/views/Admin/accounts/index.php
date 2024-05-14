<?php
// require main file header
require_once '../_main.php';
?>


<?php

$year_start = date('Y-m-d', strtotime('first day of January this year'));
$year_end = date('Y-m-d', strtotime('last day of December this year'));
$account = new Account($q->db, $q->mysqli);

?>

<div class="app-content">

    <div class="d-flex justify-content-between">
        <div class="">

            <h2 class="fs-30px fw-700 montserrat">Chart Of Accounts</h2>

        </div>
        <div>

            <button type="button" class="btn btn-primary m-0" data-toggle="modal" data-target="#new_account_modal">
                <i class="fas fa-plus mr-3"></i>New Account
            </button>

        </div>
    </div>


    <!-- tab v2 with card -->
    <div class="card mt-5">
        <ul class="nav nav-tabs nav-tabs-v2 ps-4 pe-4">
            <?php
            $k = 1;
            $list = $account->accountTypes();
            foreach ($list as $key => $value) :
            ?>

                <li class="nav-item me-3 ">
                    <a href="#<?php echo $key; ?>" class="nav-link <?php echo $k === 1 ? 'active' : ''; ?>" data-toggle="tab">
                        <?php echo $value; ?>
                    </a>
                </li>

            <?php
                $k++;
            endforeach; ?>

        </ul>
        <div class="tab-content p-4">


            <?php
            $k = 1;
            $list = $account->accountTypes();
            foreach ($list as $key => $value) :
            ?>

                <div class="tab-pane fade <?php echo $k === 1 ? 'show active' : ''; ?>" id="<?php echo $key; ?>">

                    <h4 class="mb-5 montserrat"><?php echo $value; ?></h4>

                    <table class="table table-secondary">
                        <thead>
                            <tr>
                                <th scope="col">Acc. Number</th>
                                <th scope="col">Acc. Header</th>
                                <th scope="col">Acc. Name</th>
                                <th class="text-right">Acc. Balance</th>
                                <th scope="col" class="text-right">Options</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            // fetch all headers that belong to this type
                            $filteredHeaders = $account->filterHeaderByType($key);

                            // $headers = $q->mysqli->query("SELECT * FROM account_headers WHERE type=$key");

                            foreach ($filteredHeaders as $headers) {

                                $matchingHeader = $headers['sn'];
                            ?>


                                <?php

                                $filteredAccounts = $account->filterByHeader($matchingHeader);

                                if (is_array($filteredAccounts)) :

                                    foreach ($filteredAccounts as $accounts) {

                                        $account->account_number = $accounts['account_number'];
                                        $account->AccountSummary();

                                ?>
                                        <tr>
                                            <th scope="row">
                                                <a href="account_transactions.php?account_number=<?php echo $accounts['account_number']; ?>">
                                                    <?php echo $accounts['account_number']; ?>
                                                </a>
                                            </th>
                                            <td><?php echo $headers['description']; ?></td>
                                            <td class="text-underline">

                                                <a href="account_transactions.php?account_number=<?php echo $accounts['account_number']; ?>">
                                                    <?php echo $accounts['account_name']; ?>
                                                </a>

                                            </td>
                                            <td class="text-right">
                                                <?php echo number_format($account->account_balance, 2); ?>
                                            </td>
                                            <td class="text-right">

                                                <a href="#" class="text-decoration-none mr-3">
                                                    <i class="fas fa-pen text-primary"></i>
                                                </a>

                                                <a href="#" class="text-decoration-none">
                                                    <i class="fas fa-trash-alt text-danger"></i>
                                                </a>

                                            </td>
                                        </tr>


                                <?php
                                    }
                                endif;
                                ?>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>

                </div>


            <?php
                $k++;
            endforeach; ?>



        </div>
    </div>









    <div id="new_account_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-side modal-top-right">
            <div class="modal-content">
                <form id="new_account_frm" autocomplete="off">
                    <div class="modal-body">
                        <h6>New Account</h6>
                        <hr class="hr">


                        <div class="form-group">
                            <label for="">Account Type</label>
                            <select class="custom-select browser-default" name="account_header" required>
                                <?php
                                $get_headers = mysqli_query($db, "SELECT * FROM account_headers") or die(mysqli_error($db));
                                while ($header = mysqli_fetch_array($get_headers)) {
                                ?>
                                    <option value="<?php echo $header['sn']; ?>"><?php echo $header['description']; ?></option>
                                <?php
                                }
                                ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Account Name</label>
                            <input type="text" class="form-control" name="account_name" value="" required>
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea class="form-control" name="description" rows="2" cols="80"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <?php require_once $appLink . 'navigation/main/footer.php'; ?>

    <script type="text/javascript">
        $('.sidebar-fixed .list-group-item').removeClass('active')
        $('#accounting_nav').addClass('active')
        $('#accounting_submenu').addClass('show')
        $('#accounts_li').addClass('font-weight-bold')

        $('#print_trial_balance').on('click', function(event) {
            event.preventDefault();
            print_popup('print_trial_balance.php')
        });

        $('.nav-links').on('click', function(event) {
            $('.nav-links').removeClass('active')
            $('.nav-tabs .nav-links').removeClass('show')
            $(this).addClass('active')
            $(this).prop('aria-selected', 'false');
        });

        $('#print_pl').on('click', function(event) {
            event.preventDefault();
            print_popup('print_pandl.php')
        });

        $('#new_account_frm').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: '../serverscripts/admin/Accounts/new_account_frm.php',
                type: 'GET',
                data: $('#new_account_frm').serialize(),
                success: function(msg) {
                    if (msg === 'save_successful') {
                        bootbox.alert("Account created successfully", function() {
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