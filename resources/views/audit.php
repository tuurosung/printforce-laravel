<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PrintForce - Workflow Manager For Print Businesses </title>

    <!-- set favicon -->
    <link rel="icon" type="image/png" href="http://127.0.0.1:8000/assets/img/favicon.png">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="icon" type="image/png" href="http://127.0.0.1:8000/assets/img/favicon.png">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <link href="http://127.0.0.1:8000/assets/fontawesome/css/all.css" rel="stylesheet">

    <link href="http://127.0.0.1:8000/assets/datatables/datatables.css" rel="stylesheet" media="all">

    <link href="http://127.0.0.1:8000/assets/css/ui.css" rel="stylesheet" media="all">
    <link href="http://127.0.0.1:8000/assets/css/uix.css" rel="stylesheet" media="all">

    <link href="http://127.0.0.1:8000/assets/css/datepicker.css" rel="stylesheet">
    <link href="http://127.0.0.1:8000/assets/css/toastify.min.css" rel="stylesheet">
    <link href="http://127.0.0.1:8000/assets/css/lity.min.css" rel="stylesheet">

    <script type="module" src="http://127.0.0.1:5173/@vite/client"></script>
    <link rel="stylesheet" href="http://127.0.0.1:5173/resources/sass/app.scss" />
    <script type="module" src="http://127.0.0.1:5173/resources/js/app.js"></script>


</head>

<body class="">
    <div class="app">
        <div id="header" class="app-header">

            <div class="mobile-toggler">
                <button type="button" class="menu-toggler" data-toggle="sidebar-mobile">
                    <span class="bar"></span>
                    <span class="bar"></span>
                </button>
            </div>


            <div class="brand">
                <div class="desktop-toggler">
                    <button type="button" class="menu-toggler" data-toggle="sidebar-minify">
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </button>
                </div>
                <a href="/index.php" class="brand-logo">
                    <img src="http://127.0.0.1:8000/images/logo.png" class="invert-dark" alt height="40">
                </a>
            </div>




            <div class="menu">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex flex-row align-items-center pl-lg-5">
                    <li class="nav-item mr-4">
                        <!-- <a class="nav-link montserrat font-weight-bold" href="#" style="font-size: 1.25rem; font-weight:500">CUSTOMERS</a> -->
                    </li>

                    <!-- <input type="text" name="search_term" id="search_term" class="form-control w-250px mr-5" value="" placeholder="customer's name or phone number"> -->

                    <li class="nav-item mr-3 w-150px">
                        <!-- <a class="nav-link" href="#" data-toggle="modal" data-target="#new_customer_modal"><i class="fas fa-plus mr-1  "></i> New Customer</a> -->
                    </li>
                    <!-- <li class="nav-item">
        <a class="nav-link" href="reports_jobs.php"><i class="fas fa-file-alt mr-1  "></i> Reports</a>
    </li> -->


                </ul>

                <div class="menu-item">
                    <a href="#" class="menu-link">
                        <span class="mr-3">
                            Company Name
                        </span>
                        |
                        Days Remaining
                    </a>
                </div>

                <div class="menu-item dropdown">
                    <a href="#" data-bs-toggle="dropdown" data-display="static" class="menu-link">
                        <div class="menu-icon"><i class="fa fa-bell nav-icon"></i></div>
                        <div class="menu-label">1</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-notification">
                        <h6 class="dropdown-header text-body-emphasis mb-1">Notifications</h6>
                        <a href="#" class="dropdown-notification-item">
                            <div class="dropdown-notification-icon">
                                <i class="fa fa-envelope-open-text fa-lg fa-fw text-success"></i>
                            </div>
                            <div class="dropdown-notification-info">
                                <div class="title">We just upgraded to version 6.0</div>
                                <div class="time">just now</div>
                            </div>
                            <div class="dropdown-notification-arrow">
                                <i class="fa fa-chevron-right"></i>
                            </div>
                        </a>
                        <a href="#" class="dropdown-notification-item d-none">
                            <div class="dropdown-notification-icon">
                                <i class="far fa-user-circle fa-lg fa-fw text-muted"></i>
                            </div>
                            <div class="dropdown-notification-info">
                                <div class="title">3 new customer account is created</div>
                                <div class="time">2 minutes ago</div>
                            </div>
                            <div class="dropdown-notification-arrow">
                                <i class="fa fa-chevron-right"></i>
                            </div>
                        </a>
                        <a href="#" class="dropdown-notification-item d-none">
                            <div class="dropdown-notification-icon">
                                <img src="assets/img/icon/android.svg" alt width="26">
                            </div>
                            <div class="dropdown-notification-info">
                                <div class="title">Your android application has been approved</div>
                                <div class="time">5 minutes ago</div>
                            </div>
                            <div class="dropdown-notification-arrow">
                                <i class="fa fa-chevron-right"></i>
                            </div>
                        </a>
                        <a href="#" class="dropdown-notification-item d-none">
                            <div class="dropdown-notification-icon">
                                <img src="assets/img/icon/paypal.svg" alt width="26">
                            </div>
                            <div class="dropdown-notification-info">
                                <div class="title">Paypal payment method has been enabled for your store</div>
                                <div class="time">10 minutes ago</div>
                            </div>
                            <div class="dropdown-notification-arrow">
                                <i class="fa fa-chevron-right"></i>
                            </div>
                        </a>
                        <div class="p-2 text-center mb-n1">
                            <a href="#" class="text-body-emphasis text-opacity-50 text-decoration-none">See all</a>
                        </div>
                    </div>
                </div>

                <div class="menu-item dropdown">
                    <a href="#" data-bs-toggle="dropdown" data-display="static" class="menu-link">
                        <div class="menu-img online">
                            <img src="http://127.0.0.1:8000/images/user.jpg" alt class="ms-100 mh-100 rounded-circle">
                        </div>
                        <div class="menu-text"><span class="" data-cfemail="">Username</span></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end me-lg-3">
                        <a class="dropdown-item d-flex align-items-center" href="#">Edit Profile <i class="fa fa-user-circle fa-fw ms-auto text-body text-opacity-50"></i></a>
                        <a class="dropdown-item d-flex align-items-center" href="#">Inbox <i class="fa fa-envelope fa-fw ms-auto text-body text-opacity-50"></i></a>
                        <a class="dropdown-item d-flex align-items-center" href="#">Calendar <i class="fa fa-calendar-alt fa-fw ms-auto text-body text-opacity-50"></i></a>
                        <a class="dropdown-item d-flex align-items-center" href="#">Setting <i class="fa fa-wrench fa-fw ms-auto text-body text-opacity-50"></i></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item d-flex align-items-center" href="logout.php">Log Out <i class="fa fa-toggle-off fa-fw ms-auto text-body text-opacity-50"></i></a>
                    </div>
                </div>
            </div>

        </div> <!-- Sidebar -->
        <!-- <div class="position-fixed collapse dont-collapse-sm app-sidebar bg-white-100" id="sidebar"> -->
        <div class="app-sidebar bg-white-100" id="sidebar">
            <div class="app-sidebar-content ps" data-scrollbar="true" data-height="100%">
                <div class="menu mt-5">

                    <div class="menu-item">
                        <a href="index.php" class="menu-link">
                            <i class="fas fa-laptop menu-icon"></i>
                            <span class="menu-text"> Dashboard</span> </a>
                    </div>


                    <!-- Payments Menu -->
                    <div class="menu-item has-sub">
                        <a href="#" class="menu-link" id="orders_nav">
                            <i class="fas fa-briefcase menu-icon"></i>
                            <span class="menu-text"> Jobs</span>
                            <span class="menu-caret">
                                <b class="caret"></b>
                            </span>
                        </a>
                        <div class="menu-submenu">
                            <div class="menu-item">
                                <a href="http://127.0.0.1:8000/largeformatjobs" class="menu-link" id="">
                                    <span class="menu-text">Large Format Jobs</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="http://127.0.0.1:8000/embroideryjobs" class="menu-link" id="">
                                    <span class="menu-text">Embroidery Jobs</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="http://127.0.0.1:8000/designjobs" class="menu-link" id="">
                                    <span class="menu-text">Design Jobs</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="http://127.0.0.1:8000/pressjobs" class="menu-link" id="">
                                    <span class="menu-text">Press Jobs</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="http://127.0.0.1:8000/payments" class="menu-link" id="orders_nav">
                                    <span class="menu-text">Photography Jobs</span>
                                </a>
                            </div>

                        </div>
                    </div>

                    <!-- <div class="menu-item">
            <a class="menu-link" href="payments.php">
                <i class="fas fa-credit-card menu-icon"></i>
                <span class="menu-text">Payments</span>
            </a>
        </div> -->

                    <div class="menu-item">
                        <a class="menu-link" href="http://127.0.0.1:8000/customers" id="customers_nav">
                            <i class="fas fa-users menu-icon"></i>
                            <span class="menu-text"> Customers </span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link" href="http://127.0.0.1:8000/customers/debtors" id="debtors_nav">
                            <i class="fas fa-hand-holding-usd menu-icon"></i>
                            <span class="menu-text">Debtors</span>
                        </a>
                    </div>

                    <!-- Payments Menu -->
                    <div class="menu-item has-sub">
                        <a href="#" class="menu-link" id="orders_nav">
                            <i class="fas fa-file-invoice menu-icon"></i>
                            <span class="menu-text"> Payments</span>
                            <span class="menu-caret">
                                <b class="caret"></b>
                            </span>
                        </a>
                        <div class="menu-submenu">
                            <div class="menu-item">
                                <a href="http://127.0.0.1:8000/payments" class="menu-link" id="orders_nav">
                                    <span class="menu-text">- Payments History</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="/new-payment" class="menu-link" id="orders_nav">
                                    <span class="menu-text">- New Payment</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Purchases -->
                    <div class="menu-item">
                        <a href="http://127.0.0.1:8000/suppliers" class="menu-link">
                            <i class="fas fa-people-carry menu-icon"></i>
                            <span class="menu-text">Suppliers</span>
                        </a>
                    </div>

                    <!-- <div class="menu-item">
            <a href="store.php" class="menu-link">
                <i class="fas fa-store menu-icon"></i>
                <span class="menu-text">Store Room</span>
            </a>
        </div> -->

                    <div class="menu-item">
                        <a href="http://127.0.0.1:8000/expenditure" class="menu-link" id="expenses_nav">
                            <i class="fas fa-chart-line menu-icon"></i>
                            <span class="menu-text">Expenses</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a href="expenditure-headers/index.php" class="menu-link" id="expenditureH_nav">
                            <i class="fas fa-folder menu-icon"></i>
                            <span class="menu-text">Expenditure Headers</span>
                        </a>
                    </div>


                    <!-- <div class="menu-item">
            <a href="invoices.php" class="menu-link" id="invoices_li">
                <i class="fas fa-file-invoice menu-icon"></i>
                <span class="menu-text"> Generate Invoices </span>
            </a>
        </div> -->

                    <div class="menu-item">
                        <a href="http://127.0.0.1:8000/accounts" class="menu-link" id="accounts_li">
                            <i class="fas fa-code-branch menu-icon"></i>
                            <span class="menu-text"> Chart Of Acc. </span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a href="http://127.0.0.1:8000/transfers" class="menu-link" id="accounts_li">
                            <i class="fas fa-long-arrow-alt-right menu-icon"></i>
                            <span class="menu-text">Fund Transfers </span>
                        </a>
                    </div>

                    <!-- <div class="menu-item">
            <a href="accounts.php" class="menu-link" id="accounts_li">
                <i class="fas fa-chart-bar menu-icon"></i>
                <span class="menu-text"> Fin. Accounts </span>
            </a>
        </div> -->

                    <div class="menu-item">
                        <a href="assets/index.php" class="menu-link">
                            <i class="fas fa-hdd menu-icon"></i>
                            <span class="menu-text"> Assets </span>
                        </a>
                    </div>

                    <!-- <div class="menu-item">
            <a href="trial_balance.php" class="menu-link" id="accounts_li">
                <i class="fas fa-chart-line menu-icon"></i>
                <span class="menu-text"> Trial Balance </span>
            </a>
        </div> -->

                    <!-- <div class="menu-item">
            <a href="profit_and_loss.php" class="menu-link" id="accounts_li">
                <i class="fas fa-balance-scale menu-icon"></i>
                <span class="menu-text">Profit And Loss</span>
            </a>
        </div> -->

                    <div class="menu-item has-sub">
                        <a href="#" class="menu-link" id="">
                            <i class="fas fa-users menu-icon"></i>
                            <span class="menu-text">HR Manager</span>
                            <span class="menu-caret">
                                <b class="caret">

                                </b>
                            </span>
                        </a>
                        <div class="menu-submenu">
                            <div class="menu-item">
                                <a href="employees/new-employee.php" class="menu-link" id="">
                                    <span class="menu-text">- New Employee</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="employees/index.php" class="menu-link" id="">
                                    <span class="menu-text">- All Employees</span>
                                </a>
                            </div>
                        </div>
                    </div>


                    <div class="menu-item has-sub">
                        <a href="#" class="menu-link" id="">
                            <i class="fab fa-stripe menu-icon"></i>
                            <span class="menu-text">Salary</span>
                            <span class="menu-caret">
                                <b class="caret">

                                </b>
                            </span>
                        </a>
                        <div class="menu-submenu">
                            <div class="menu-item">
                                <a href="" class="menu-link" id="">
                                    <span class="menu-text">- Create WageBill</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="" class="menu-link" id="">
                                    <span class="menu-text">- All WageBills</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="" class="menu-link" id="">
                                    <span class="menu-text">- PaySlips</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="menu-item">
            <a href="#" class="menu-link">
                <i class="fas fa-hand-holding-usd menu-icon"></i>
                <span class="menu-text">Payroll</span>
            </a>
        </div> -->

                    <div class="menu-item">
                        <a href="staff/index.php" class="menu-link" id="registered_users_li">
                            <i class="fas fa-users menu-icon"></i>
                            <span class="menu-text">Registered Users</span>
                        </a>
                    </div>


                    <div class="menu-item">
                        <a href="http://127.0.0.1:8000/services" class="menu-link" id="reports_li">
                            <i class="fas fa-cogs menu-icon"></i>
                            <span class="menu-text">Services</span>
                        </a>
                    </div>



                </div>

            </div>

        </div>
        <!-- Sidebar -->

        <!-- </header> -->
        <!--Main Navigation-->

        <div class="app-content">

            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <h4 class="h2 m-0">Large Format Jobs</h4>
                </div>
                <div>
                    <button
                        type="button"
                        class="btn btn-primary"
                        data-toggle="modal"
                        data-target="#jobCardModal">
                        Button
                    </button>

                </div>
            </div>

            <hr class="mb-5">

            <div class="card border-0">
                <div class="card-body">

                    <form method="POST" id="filter_jobs_frm">
                        <input type="hidden" name="_token" value="8E16trnPFimgRGLXuaXcstZ71Giye4dUUmH4BQSV" autocomplete="off">
                        <div class="d-flex mb-5">
                            <div class="me-3">

                                <div class="mb-3">
                                    <label for="start_date" class="form-label">Start Date</label>
                                    <input
                                        type="text"
                                        class="form-control form-control-sm"
                                        name="start_date"
                                        id="start_date"
                                        value="2024-12-12" />
                                </div>

                            </div>

                            <div class="me-3">

                                <div class="mb-3">
                                    <label for="end_date" class="form-label">End Date</label>
                                    <input
                                        type="text"
                                        class="form-control form-control-sm"
                                        name="end_date"
                                        id="end_date"
                                        value="2024-12-12" />
                                </div>

                            </div>
                            <div style="padding-top: 27px;">
                                <button
                                    type="submit"
                                    class="btn btn-primary">
                                    Generate Report
                                    <i class="fas fa-arrow-right ms-3  "></i>
                                </button>


                            </div>
                            <div></div>
                        </div>
                    </form>

                    <table class="table table-sm datatables">
                        <thead class="">
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Service</th>
                                <th class="text-end">Width</th>
                                <th class="text-end">Height</th>
                                <th class="text-end">Cost</th>
                                <th class="text-end">Copies</th>
                                <th class="text-end">Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>


                            <tr>
                                <td>1</td>
                                <td>2024-12-09 09:40:04</td>
                                <td>Basil Barrett</td>
                                <td>FLEXY / BANNER</td>
                                <td class="text-end pe-20px">5.00</td>
                                <td class="text-end pe-20px">6.00</td>
                                <td class="text-end pe-20px">5.00</td>
                                <td class="text-end pe-20px">1</td>
                                <td class="text-end pe-20px">150.00</td>
                                <td class="text-end pe-20px">

                                    <div class="dropdown">
                                        <a
                                            class=""
                                            type="button"
                                            id="triggerId"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                            Options
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a
                                                href="#"
                                                class="viewjob dropdown-item me-3"
                                                data-url="http://127.0.0.1:8000/largeformatjobs/view-job-card/D25B-547E-1E61-4826-0B0E-C03A-4AB9-62C5">

                                                <i class="fas fa-file-alt me-3 text-primary"></i>
                                                Job Card

                                            </a>
                                            <a
                                                href="#"
                                                class="job_card dropdown-item me-3"
                                                id="D25B-547E-1E61-4826-0B0E-C03A-4AB9-62C5">

                                                <i class="fas fa-print me-3 text-primary"></i>
                                                Print
                                            </a>
                                            <a
                                                href="#"
                                                class="dropdown-item"
                                                id="D25B-547E-1E61-4826-0B0E-C03A-4AB9-62C5">

                                                <i class="fas fa-trash-alt text-danger me-3"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>


                                </td>
                            </tr>



                            <tr>
                                <td>2</td>
                                <td>2024-11-26 02:03:23</td>
                                <td>Zenia Swanson</td>
                                <td>FLEXY / BANNER</td>
                                <td class="text-end pe-20px">5.00</td>
                                <td class="text-end pe-20px">6.00</td>
                                <td class="text-end pe-20px">7.00</td>
                                <td class="text-end pe-20px">1</td>
                                <td class="text-end pe-20px">210.00</td>
                                <td class="text-end pe-20px">

                                    <div class="dropdown">
                                        <a
                                            class=""
                                            type="button"
                                            id="triggerId"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                            Options
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a
                                                href="#"
                                                class="viewjob dropdown-item me-3"
                                                data-url="http://127.0.0.1:8000/largeformatjobs/view-job-card/61C6-AABF-A554-489F-6A58-2A0F-574E-CCAE">

                                                <i class="fas fa-file-alt me-3 text-primary"></i>
                                                Job Card

                                            </a>
                                            <a
                                                href="#"
                                                class="job_card dropdown-item me-3"
                                                id="61C6-AABF-A554-489F-6A58-2A0F-574E-CCAE">

                                                <i class="fas fa-print me-3 text-primary"></i>
                                                Print
                                            </a>
                                            <a
                                                href="#"
                                                class="dropdown-item"
                                                id="61C6-AABF-A554-489F-6A58-2A0F-574E-CCAE">

                                                <i class="fas fa-trash-alt text-danger me-3"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>


                                </td>
                            </tr>



                            <tr>
                                <td>3</td>
                                <td>2024-11-25 14:31:55</td>
                                <td>Jolie Bush</td>
                                <td>MESH / FLAG</td>
                                <td class="text-end pe-20px">2.00</td>
                                <td class="text-end pe-20px">4.00</td>
                                <td class="text-end pe-20px">1.00</td>
                                <td class="text-end pe-20px">1</td>
                                <td class="text-end pe-20px">8.00</td>
                                <td class="text-end pe-20px">

                                    <div class="dropdown">
                                        <a
                                            class=""
                                            type="button"
                                            id="triggerId"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                            Options
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a
                                                href="#"
                                                class="viewjob dropdown-item me-3"
                                                data-url="http://127.0.0.1:8000/largeformatjobs/view-job-card/FA94-76CC-E089-9794-DEBF-F018-C44D-1EE4">

                                                <i class="fas fa-file-alt me-3 text-primary"></i>
                                                Job Card

                                            </a>
                                            <a
                                                href="#"
                                                class="job_card dropdown-item me-3"
                                                id="FA94-76CC-E089-9794-DEBF-F018-C44D-1EE4">

                                                <i class="fas fa-print me-3 text-primary"></i>
                                                Print
                                            </a>
                                            <a
                                                href="#"
                                                class="dropdown-item"
                                                id="FA94-76CC-E089-9794-DEBF-F018-C44D-1EE4">

                                                <i class="fas fa-trash-alt text-danger me-3"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>


                                </td>
                            </tr>



                            <tr>
                                <td>4</td>
                                <td>2024-11-25 13:24:17</td>
                                <td>Basia Rutledge</td>
                                <td>Example Service</td>
                                <td class="text-end pe-20px">8.00</td>
                                <td class="text-end pe-20px">6.00</td>
                                <td class="text-end pe-20px">10.00</td>
                                <td class="text-end pe-20px">1</td>
                                <td class="text-end pe-20px">480.00</td>
                                <td class="text-end pe-20px">

                                    <div class="dropdown">
                                        <a
                                            class=""
                                            type="button"
                                            id="triggerId"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                            Options
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a
                                                href="#"
                                                class="viewjob dropdown-item me-3"
                                                data-url="http://127.0.0.1:8000/largeformatjobs/view-job-card/3512-DE1A-84F0-49DA-30EE-3E06-252F-9B30">

                                                <i class="fas fa-file-alt me-3 text-primary"></i>
                                                Job Card

                                            </a>
                                            <a
                                                href="#"
                                                class="job_card dropdown-item me-3"
                                                id="3512-DE1A-84F0-49DA-30EE-3E06-252F-9B30">

                                                <i class="fas fa-print me-3 text-primary"></i>
                                                Print
                                            </a>
                                            <a
                                                href="#"
                                                class="dropdown-item"
                                                id="3512-DE1A-84F0-49DA-30EE-3E06-252F-9B30">

                                                <i class="fas fa-trash-alt text-danger me-3"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>


                                </td>
                            </tr>



                            <tr>
                                <td>5</td>
                                <td>2024-11-25 12:41:33</td>
                                <td>Armando Washington</td>
                                <td>Example Service</td>
                                <td class="text-end pe-20px">4.00</td>
                                <td class="text-end pe-20px">8.00</td>
                                <td class="text-end pe-20px">10.00</td>
                                <td class="text-end pe-20px">1</td>
                                <td class="text-end pe-20px">320.00</td>
                                <td class="text-end pe-20px">

                                    <div class="dropdown">
                                        <a
                                            class=""
                                            type="button"
                                            id="triggerId"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                            Options
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a
                                                href="#"
                                                class="viewjob dropdown-item me-3"
                                                data-url="http://127.0.0.1:8000/largeformatjobs/view-job-card/C828-17FE-BEFF-05C1-65CE-B753-103C-164B">

                                                <i class="fas fa-file-alt me-3 text-primary"></i>
                                                Job Card

                                            </a>
                                            <a
                                                href="#"
                                                class="job_card dropdown-item me-3"
                                                id="C828-17FE-BEFF-05C1-65CE-B753-103C-164B">

                                                <i class="fas fa-print me-3 text-primary"></i>
                                                Print
                                            </a>
                                            <a
                                                href="#"
                                                class="dropdown-item"
                                                id="C828-17FE-BEFF-05C1-65CE-B753-103C-164B">

                                                <i class="fas fa-trash-alt text-danger me-3"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>


                                </td>
                            </tr>



                            <tr>
                                <td>6</td>
                                <td>2024-11-24 21:24:22</td>
                                <td>Armando Washington</td>
                                <td>Example Service</td>
                                <td class="text-end pe-20px">5.00</td>
                                <td class="text-end pe-20px">7.00</td>
                                <td class="text-end pe-20px">10.00</td>
                                <td class="text-end pe-20px">1</td>
                                <td class="text-end pe-20px">350.00</td>
                                <td class="text-end pe-20px">

                                    <div class="dropdown">
                                        <a
                                            class=""
                                            type="button"
                                            id="triggerId"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                            Options
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a
                                                href="#"
                                                class="viewjob dropdown-item me-3"
                                                data-url="http://127.0.0.1:8000/largeformatjobs/view-job-card/E931-7630-D317-288D-C7C2-86BB-8E1A-80F2">

                                                <i class="fas fa-file-alt me-3 text-primary"></i>
                                                Job Card

                                            </a>
                                            <a
                                                href="#"
                                                class="job_card dropdown-item me-3"
                                                id="E931-7630-D317-288D-C7C2-86BB-8E1A-80F2">

                                                <i class="fas fa-print me-3 text-primary"></i>
                                                Print
                                            </a>
                                            <a
                                                href="#"
                                                class="dropdown-item"
                                                id="E931-7630-D317-288D-C7C2-86BB-8E1A-80F2">

                                                <i class="fas fa-trash-alt text-danger me-3"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>


                                </td>
                            </tr>



                            <tr>
                                <td>7</td>
                                <td>2024-11-24 16:12:26</td>
                                <td>Davis Burch</td>
                                <td>FLEXY / BANNER</td>
                                <td class="text-end pe-20px">5.00</td>
                                <td class="text-end pe-20px">7.00</td>
                                <td class="text-end pe-20px">5.00</td>
                                <td class="text-end pe-20px">1</td>
                                <td class="text-end pe-20px">175.00</td>
                                <td class="text-end pe-20px">

                                    <div class="dropdown">
                                        <a
                                            class=""
                                            type="button"
                                            id="triggerId"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                            Options
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a
                                                href="#"
                                                class="viewjob dropdown-item me-3"
                                                data-url="http://127.0.0.1:8000/largeformatjobs/view-job-card/3603-E6CA-D835-A14C-22F5-83A7-B308-6F86">

                                                <i class="fas fa-file-alt me-3 text-primary"></i>
                                                Job Card

                                            </a>
                                            <a
                                                href="#"
                                                class="job_card dropdown-item me-3"
                                                id="3603-E6CA-D835-A14C-22F5-83A7-B308-6F86">

                                                <i class="fas fa-print me-3 text-primary"></i>
                                                Print
                                            </a>
                                            <a
                                                href="#"
                                                class="dropdown-item"
                                                id="3603-E6CA-D835-A14C-22F5-83A7-B308-6F86">

                                                <i class="fas fa-trash-alt text-danger me-3"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>


                                </td>
                            </tr>



                            <tr>
                                <td>8</td>
                                <td>2024-11-24 16:11:52</td>
                                <td>Davis Burch</td>
                                <td>Example Service</td>
                                <td class="text-end pe-20px">5.00</td>
                                <td class="text-end pe-20px">6.00</td>
                                <td class="text-end pe-20px">12.00</td>
                                <td class="text-end pe-20px">1</td>
                                <td class="text-end pe-20px">360.00</td>
                                <td class="text-end pe-20px">

                                    <div class="dropdown">
                                        <a
                                            class=""
                                            type="button"
                                            id="triggerId"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                            Options
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a
                                                href="#"
                                                class="viewjob dropdown-item me-3"
                                                data-url="http://127.0.0.1:8000/largeformatjobs/view-job-card/B554-461E-3895-A0B5-12CA-CA3D-E1FE-1F98">

                                                <i class="fas fa-file-alt me-3 text-primary"></i>
                                                Job Card

                                            </a>
                                            <a
                                                href="#"
                                                class="job_card dropdown-item me-3"
                                                id="B554-461E-3895-A0B5-12CA-CA3D-E1FE-1F98">

                                                <i class="fas fa-print me-3 text-primary"></i>
                                                Print
                                            </a>
                                            <a
                                                href="#"
                                                class="dropdown-item"
                                                id="B554-461E-3895-A0B5-12CA-CA3D-E1FE-1F98">

                                                <i class="fas fa-trash-alt text-danger me-3"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>


                                </td>
                            </tr>



                            <tr>
                                <td>9</td>
                                <td>2024-03-27 11:50:53</td>
                                <td>Test Customer</td>
                                <td>Example Service</td>
                                <td class="text-end pe-20px">2.00</td>
                                <td class="text-end pe-20px">3.00</td>
                                <td class="text-end pe-20px">10.00</td>
                                <td class="text-end pe-20px">1</td>
                                <td class="text-end pe-20px">60.00</td>
                                <td class="text-end pe-20px">

                                    <div class="dropdown">
                                        <a
                                            class=""
                                            type="button"
                                            id="triggerId"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                            Options
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a
                                                href="#"
                                                class="viewjob dropdown-item me-3"
                                                data-url="http://127.0.0.1:8000/largeformatjobs/view-job-card/LF0013">

                                                <i class="fas fa-file-alt me-3 text-primary"></i>
                                                Job Card

                                            </a>
                                            <a
                                                href="#"
                                                class="job_card dropdown-item me-3"
                                                id="LF0013">

                                                <i class="fas fa-print me-3 text-primary"></i>
                                                Print
                                            </a>
                                            <a
                                                href="#"
                                                class="dropdown-item"
                                                id="LF0013">

                                                <i class="fas fa-trash-alt text-danger me-3"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>


                                </td>
                            </tr>



                            <tr>
                                <td>10</td>
                                <td>2024-04-04 01:45:22</td>
                                <td>Davis Burch</td>
                                <td>FLEXY / BANNER</td>
                                <td class="text-end pe-20px">4.00</td>
                                <td class="text-end pe-20px">5.00</td>
                                <td class="text-end pe-20px">5.00</td>
                                <td class="text-end pe-20px">1</td>
                                <td class="text-end pe-20px">100.00</td>
                                <td class="text-end pe-20px">

                                    <div class="dropdown">
                                        <a
                                            class=""
                                            type="button"
                                            id="triggerId"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                            Options
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a
                                                href="#"
                                                class="viewjob dropdown-item me-3"
                                                data-url="http://127.0.0.1:8000/largeformatjobs/view-job-card/LF0016">

                                                <i class="fas fa-file-alt me-3 text-primary"></i>
                                                Job Card

                                            </a>
                                            <a
                                                href="#"
                                                class="job_card dropdown-item me-3"
                                                id="LF0016">

                                                <i class="fas fa-print me-3 text-primary"></i>
                                                Print
                                            </a>
                                            <a
                                                href="#"
                                                class="dropdown-item"
                                                id="LF0016">

                                                <i class="fas fa-trash-alt text-danger me-3"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>


                                </td>
                            </tr>



                            <tr>
                                <td>11</td>
                                <td>2024-04-03 13:43:42</td>
                                <td>Test Customer</td>
                                <td>SAV</td>
                                <td class="text-end pe-20px">5.00</td>
                                <td class="text-end pe-20px">4.00</td>
                                <td class="text-end pe-20px">1.50</td>
                                <td class="text-end pe-20px">1</td>
                                <td class="text-end pe-20px">30.00</td>
                                <td class="text-end pe-20px">

                                    <div class="dropdown">
                                        <a
                                            class=""
                                            type="button"
                                            id="triggerId"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                            Options
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a
                                                href="#"
                                                class="viewjob dropdown-item me-3"
                                                data-url="http://127.0.0.1:8000/largeformatjobs/view-job-card/LF0015">

                                                <i class="fas fa-file-alt me-3 text-primary"></i>
                                                Job Card

                                            </a>
                                            <a
                                                href="#"
                                                class="job_card dropdown-item me-3"
                                                id="LF0015">

                                                <i class="fas fa-print me-3 text-primary"></i>
                                                Print
                                            </a>
                                            <a
                                                href="#"
                                                class="dropdown-item"
                                                id="LF0015">

                                                <i class="fas fa-trash-alt text-danger me-3"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>


                                </td>
                            </tr>



                            <tr>
                                <td>12</td>
                                <td>2024-03-28 22:55:01</td>
                                <td>Hasad Skinner</td>
                                <td>SAV</td>
                                <td class="text-end pe-20px">4.00</td>
                                <td class="text-end pe-20px">8.00</td>
                                <td class="text-end pe-20px">5.00</td>
                                <td class="text-end pe-20px">1</td>
                                <td class="text-end pe-20px">160.00</td>
                                <td class="text-end pe-20px">

                                    <div class="dropdown">
                                        <a
                                            class=""
                                            type="button"
                                            id="triggerId"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                            Options
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a
                                                href="#"
                                                class="viewjob dropdown-item me-3"
                                                data-url="http://127.0.0.1:8000/largeformatjobs/view-job-card/LF0014">

                                                <i class="fas fa-file-alt me-3 text-primary"></i>
                                                Job Card

                                            </a>
                                            <a
                                                href="#"
                                                class="job_card dropdown-item me-3"
                                                id="LF0014">

                                                <i class="fas fa-print me-3 text-primary"></i>
                                                Print
                                            </a>
                                            <a
                                                href="#"
                                                class="dropdown-item"
                                                id="LF0014">

                                                <i class="fas fa-trash-alt text-danger me-3"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>


                                </td>
                            </tr>



                            <tr>
                                <td>13</td>
                                <td>2023-01-13 00:00:00</td>
                                <td>Test Customer</td>
                                <td>SAV</td>
                                <td class="text-end pe-20px">5.00</td>
                                <td class="text-end pe-20px">7.00</td>
                                <td class="text-end pe-20px">1.50</td>
                                <td class="text-end pe-20px">1</td>
                                <td class="text-end pe-20px">53.00</td>
                                <td class="text-end pe-20px">

                                    <div class="dropdown">
                                        <a
                                            class=""
                                            type="button"
                                            id="triggerId"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                            Options
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a
                                                href="#"
                                                class="viewjob dropdown-item me-3"
                                                data-url="http://127.0.0.1:8000/largeformatjobs/view-job-card/LF0001">

                                                <i class="fas fa-file-alt me-3 text-primary"></i>
                                                Job Card

                                            </a>
                                            <a
                                                href="#"
                                                class="job_card dropdown-item me-3"
                                                id="LF0001">

                                                <i class="fas fa-print me-3 text-primary"></i>
                                                Print
                                            </a>
                                            <a
                                                href="#"
                                                class="dropdown-item"
                                                id="LF0001">

                                                <i class="fas fa-trash-alt text-danger me-3"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>


                                </td>
                            </tr>



                            <tr>
                                <td>14</td>
                                <td>2024-03-27 11:45:34</td>
                                <td>Hasad Skinner</td>
                                <td>MESH / FLAG</td>
                                <td class="text-end pe-20px">7.00</td>
                                <td class="text-end pe-20px">2.00</td>
                                <td class="text-end pe-20px">3.00</td>
                                <td class="text-end pe-20px">1</td>
                                <td class="text-end pe-20px">42.00</td>
                                <td class="text-end pe-20px">

                                    <div class="dropdown">
                                        <a
                                            class=""
                                            type="button"
                                            id="triggerId"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                            Options
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a
                                                href="#"
                                                class="viewjob dropdown-item me-3"
                                                data-url="http://127.0.0.1:8000/largeformatjobs/view-job-card/LF0012">

                                                <i class="fas fa-file-alt me-3 text-primary"></i>
                                                Job Card

                                            </a>
                                            <a
                                                href="#"
                                                class="job_card dropdown-item me-3"
                                                id="LF0012">

                                                <i class="fas fa-print me-3 text-primary"></i>
                                                Print
                                            </a>
                                            <a
                                                href="#"
                                                class="dropdown-item"
                                                id="LF0012">

                                                <i class="fas fa-trash-alt text-danger me-3"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>


                                </td>
                            </tr>



                            <tr>
                                <td>15</td>
                                <td>2024-03-27 11:43:55</td>
                                <td>Hasad Skinner</td>
                                <td>FLEXY / BANNER</td>
                                <td class="text-end pe-20px">5.00</td>
                                <td class="text-end pe-20px">8.00</td>
                                <td class="text-end pe-20px">7.00</td>
                                <td class="text-end pe-20px">1</td>
                                <td class="text-end pe-20px">280.00</td>
                                <td class="text-end pe-20px">

                                    <div class="dropdown">
                                        <a
                                            class=""
                                            type="button"
                                            id="triggerId"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                            Options
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a
                                                href="#"
                                                class="viewjob dropdown-item me-3"
                                                data-url="http://127.0.0.1:8000/largeformatjobs/view-job-card/LF0011">

                                                <i class="fas fa-file-alt me-3 text-primary"></i>
                                                Job Card

                                            </a>
                                            <a
                                                href="#"
                                                class="job_card dropdown-item me-3"
                                                id="LF0011">

                                                <i class="fas fa-print me-3 text-primary"></i>
                                                Print
                                            </a>
                                            <a
                                                href="#"
                                                class="dropdown-item"
                                                id="LF0011">

                                                <i class="fas fa-trash-alt text-danger me-3"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>


                                </td>
                            </tr>



                            <tr>
                                <td>16</td>
                                <td>2024-03-27 11:40:10</td>
                                <td>Hasad Skinner</td>
                                <td>SAV</td>
                                <td class="text-end pe-20px">4.00</td>
                                <td class="text-end pe-20px">8.00</td>
                                <td class="text-end pe-20px">5.00</td>
                                <td class="text-end pe-20px">1</td>
                                <td class="text-end pe-20px">160.00</td>
                                <td class="text-end pe-20px">

                                    <div class="dropdown">
                                        <a
                                            class=""
                                            type="button"
                                            id="triggerId"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                            Options
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a
                                                href="#"
                                                class="viewjob dropdown-item me-3"
                                                data-url="http://127.0.0.1:8000/largeformatjobs/view-job-card/LF0010">

                                                <i class="fas fa-file-alt me-3 text-primary"></i>
                                                Job Card

                                            </a>
                                            <a
                                                href="#"
                                                class="job_card dropdown-item me-3"
                                                id="LF0010">

                                                <i class="fas fa-print me-3 text-primary"></i>
                                                Print
                                            </a>
                                            <a
                                                href="#"
                                                class="dropdown-item"
                                                id="LF0010">

                                                <i class="fas fa-trash-alt text-danger me-3"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>


                                </td>
                            </tr>



                            <tr>
                                <td>17</td>
                                <td>2023-07-26 00:00:00</td>
                                <td>Tuurosung</td>
                                <td>SAV</td>
                                <td class="text-end pe-20px">5.00</td>
                                <td class="text-end pe-20px">9.00</td>
                                <td class="text-end pe-20px">1.50</td>
                                <td class="text-end pe-20px">1</td>
                                <td class="text-end pe-20px">68.00</td>
                                <td class="text-end pe-20px">

                                    <div class="dropdown">
                                        <a
                                            class=""
                                            type="button"
                                            id="triggerId"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                            Options
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a
                                                href="#"
                                                class="viewjob dropdown-item me-3"
                                                data-url="http://127.0.0.1:8000/largeformatjobs/view-job-card/LF0009">

                                                <i class="fas fa-file-alt me-3 text-primary"></i>
                                                Job Card

                                            </a>
                                            <a
                                                href="#"
                                                class="job_card dropdown-item me-3"
                                                id="LF0009">

                                                <i class="fas fa-print me-3 text-primary"></i>
                                                Print
                                            </a>
                                            <a
                                                href="#"
                                                class="dropdown-item"
                                                id="LF0009">

                                                <i class="fas fa-trash-alt text-danger me-3"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>


                                </td>
                            </tr>



                            <tr>
                                <td>18</td>
                                <td>2023-07-23 00:00:00</td>
                                <td>Tuurosung</td>
                                <td>SAV</td>
                                <td class="text-end pe-20px">5.00</td>
                                <td class="text-end pe-20px">6.00</td>
                                <td class="text-end pe-20px">1.50</td>
                                <td class="text-end pe-20px">1</td>
                                <td class="text-end pe-20px">45.00</td>
                                <td class="text-end pe-20px">

                                    <div class="dropdown">
                                        <a
                                            class=""
                                            type="button"
                                            id="triggerId"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                            Options
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a
                                                href="#"
                                                class="viewjob dropdown-item me-3"
                                                data-url="http://127.0.0.1:8000/largeformatjobs/view-job-card/LF0007">

                                                <i class="fas fa-file-alt me-3 text-primary"></i>
                                                Job Card

                                            </a>
                                            <a
                                                href="#"
                                                class="job_card dropdown-item me-3"
                                                id="LF0007">

                                                <i class="fas fa-print me-3 text-primary"></i>
                                                Print
                                            </a>
                                            <a
                                                href="#"
                                                class="dropdown-item"
                                                id="LF0007">

                                                <i class="fas fa-trash-alt text-danger me-3"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>


                                </td>
                            </tr>



                            <tr>
                                <td>19</td>
                                <td>2023-07-12 00:00:00</td>
                                <td>Melyssa Conley</td>
                                <td>FLEXY / BANNER</td>
                                <td class="text-end pe-20px">5.00</td>
                                <td class="text-end pe-20px">8.00</td>
                                <td class="text-end pe-20px">5.00</td>
                                <td class="text-end pe-20px">2</td>
                                <td class="text-end pe-20px">400.00</td>
                                <td class="text-end pe-20px">

                                    <div class="dropdown">
                                        <a
                                            class=""
                                            type="button"
                                            id="triggerId"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                            Options
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a
                                                href="#"
                                                class="viewjob dropdown-item me-3"
                                                data-url="http://127.0.0.1:8000/largeformatjobs/view-job-card/LF0006">

                                                <i class="fas fa-file-alt me-3 text-primary"></i>
                                                Job Card

                                            </a>
                                            <a
                                                href="#"
                                                class="job_card dropdown-item me-3"
                                                id="LF0006">

                                                <i class="fas fa-print me-3 text-primary"></i>
                                                Print
                                            </a>
                                            <a
                                                href="#"
                                                class="dropdown-item"
                                                id="LF0006">

                                                <i class="fas fa-trash-alt text-danger me-3"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>


                                </td>
                            </tr>



                            <tr>
                                <td>20</td>
                                <td>2023-04-16 00:00:00</td>
                                <td>Jolie Woodward</td>
                                <td>SAV</td>
                                <td class="text-end pe-20px">5.00</td>
                                <td class="text-end pe-20px">8.00</td>
                                <td class="text-end pe-20px">1.50</td>
                                <td class="text-end pe-20px">1</td>
                                <td class="text-end pe-20px">100.00</td>
                                <td class="text-end pe-20px">

                                    <div class="dropdown">
                                        <a
                                            class=""
                                            type="button"
                                            id="triggerId"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                            Options
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a
                                                href="#"
                                                class="viewjob dropdown-item me-3"
                                                data-url="http://127.0.0.1:8000/largeformatjobs/view-job-card/LF0005">

                                                <i class="fas fa-file-alt me-3 text-primary"></i>
                                                Job Card

                                            </a>
                                            <a
                                                href="#"
                                                class="job_card dropdown-item me-3"
                                                id="LF0005">

                                                <i class="fas fa-print me-3 text-primary"></i>
                                                Print
                                            </a>
                                            <a
                                                href="#"
                                                class="dropdown-item"
                                                id="LF0005">

                                                <i class="fas fa-trash-alt text-danger me-3"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>


                                </td>
                            </tr>



                            <tr>
                                <td>21</td>
                                <td>2023-04-14 00:00:00</td>
                                <td>Test Customer</td>
                                <td>MESH / FLAG</td>
                                <td class="text-end pe-20px">20.00</td>
                                <td class="text-end pe-20px">15.00</td>
                                <td class="text-end pe-20px">1.00</td>
                                <td class="text-end pe-20px">1</td>
                                <td class="text-end pe-20px">300.00</td>
                                <td class="text-end pe-20px">

                                    <div class="dropdown">
                                        <a
                                            class=""
                                            type="button"
                                            id="triggerId"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                            Options
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a
                                                href="#"
                                                class="viewjob dropdown-item me-3"
                                                data-url="http://127.0.0.1:8000/largeformatjobs/view-job-card/LF0004">

                                                <i class="fas fa-file-alt me-3 text-primary"></i>
                                                Job Card

                                            </a>
                                            <a
                                                href="#"
                                                class="job_card dropdown-item me-3"
                                                id="LF0004">

                                                <i class="fas fa-print me-3 text-primary"></i>
                                                Print
                                            </a>
                                            <a
                                                href="#"
                                                class="dropdown-item"
                                                id="LF0004">

                                                <i class="fas fa-trash-alt text-danger me-3"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>


                                </td>
                            </tr>



                            <tr>
                                <td>22</td>
                                <td>2023-04-14 00:00:00</td>
                                <td>Tuurosung</td>
                                <td>FLEXY / BANNER</td>
                                <td class="text-end pe-20px">5.00</td>
                                <td class="text-end pe-20px">8.00</td>
                                <td class="text-end pe-20px">3.00</td>
                                <td class="text-end pe-20px">1</td>
                                <td class="text-end pe-20px">120.00</td>
                                <td class="text-end pe-20px">

                                    <div class="dropdown">
                                        <a
                                            class=""
                                            type="button"
                                            id="triggerId"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                            Options
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a
                                                href="#"
                                                class="viewjob dropdown-item me-3"
                                                data-url="http://127.0.0.1:8000/largeformatjobs/view-job-card/LF0003">

                                                <i class="fas fa-file-alt me-3 text-primary"></i>
                                                Job Card

                                            </a>
                                            <a
                                                href="#"
                                                class="job_card dropdown-item me-3"
                                                id="LF0003">

                                                <i class="fas fa-print me-3 text-primary"></i>
                                                Print
                                            </a>
                                            <a
                                                href="#"
                                                class="dropdown-item"
                                                id="LF0003">

                                                <i class="fas fa-trash-alt text-danger me-3"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>


                                </td>
                            </tr>



                            <tr>
                                <td>23</td>
                                <td>2023-01-14 00:00:00</td>
                                <td>Test Customer</td>
                                <td>MESH / FLAG</td>
                                <td class="text-end pe-20px">9.00</td>
                                <td class="text-end pe-20px">7.00</td>
                                <td class="text-end pe-20px">1.00</td>
                                <td class="text-end pe-20px">1</td>
                                <td class="text-end pe-20px">63.00</td>
                                <td class="text-end pe-20px">

                                    <div class="dropdown">
                                        <a
                                            class=""
                                            type="button"
                                            id="triggerId"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                            Options
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a
                                                href="#"
                                                class="viewjob dropdown-item me-3"
                                                data-url="http://127.0.0.1:8000/largeformatjobs/view-job-card/LF0002">

                                                <i class="fas fa-file-alt me-3 text-primary"></i>
                                                Job Card

                                            </a>
                                            <a
                                                href="#"
                                                class="job_card dropdown-item me-3"
                                                id="LF0002">

                                                <i class="fas fa-print me-3 text-primary"></i>
                                                Print
                                            </a>
                                            <a
                                                href="#"
                                                class="dropdown-item"
                                                id="LF0002">

                                                <i class="fas fa-trash-alt text-danger me-3"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>


                                </td>
                            </tr>



                        </tbody>
                    </table>

                </div>
            </div>


        </div>

    </div>
</body>

<script type="text/javascript" src="http://127.0.0.1:8000/assets/js/jquery.js"></script>
<script type="text/javascript" src="http://127.0.0.1:8000/assets/js/popper.min.js"></script>
<script type="text/javascript" src="http://127.0.0.1:8000/assets/js/bootbox.js"></script>
<script type="text/javascript" src="http://127.0.0.1:8000/assets/datatables/datatables.js"></script>
<script type="text/javascript" src="http://127.0.0.1:8000/assets/js/bootstrap-datepicker.js"></script>

<script type="text/javascript" src="http://127.0.0.1:8000/assets/js/app.js"></script>
<script type="text/javascript" src="http://127.0.0.1:8000/assets/js/app.min.js"></script>
<script type="text/javascript" src="http://127.0.0.1:8000/assets/js/bootstrap.js"></script>
<script type="text/javascript" src="http://127.0.0.1:8000/assets/js/bootstrap-modal.js"></script>
<script type="text/javascript" src="http://127.0.0.1:8000/assets/js/modules/chart.js"></script>
<script type="text/javascript" src="http://127.0.0.1:8000/assets/js/toastify.min.js"></script>
<script type="text/javascript" src="http://127.0.0.1:8000/assets/js/lity.min.js"></script>
<script type="text/javascript" src="http://127.0.0.1:8000/assets/js/printThis.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js" type="text/javascript"></script>


<script type="text/javascript">
    $('a[data-toggle="pill"], a[data-toggle="tab"], a[data-bs-toggle="pill"], a[data-bs-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });

    var activeTab = localStorage.getItem('activeTab');

    if (activeTab) {
        $('.nav a[href="' + activeTab + '"]').tab('show');
    }


    $('.datatable').DataTable({
        'sorting': false,
        'paging': false,
        'searching': false,
        'stateSave': true,
        language: {
            search: ""
        },
        responsive: true,
        buttons: [{
                extend: 'print',
                className: 'btn btn-default'
            },
            {
                extend: 'csv',
                className: 'btn btn-default'
            }
        ]
    })

    $('.datatables').DataTable({
        'sorting': false,
        'paging': true,
        'stateSave': true,
        pageLength: 10,
        responsive: true,
        buttons: [{
                extend: 'print',
                className: 'btn btn-default'
            },
            {
                extend: 'csv',
                className: 'btn btn-default'
            }
        ],
        language: {
            search: '',
            searchPlaceholder: "Search..."
        },
    })

    $('#start_date,#end_date').datepicker()

    $('#start_date,#end_date').on('change', function(event) {
        event.preventDefault();
        $(this).datepicker('hide')
    });

    // ! function($) {
    //     $(document).on("click", "ul.nav li.parent > a > span.icon", function() {
    //         $(this).find('em:first').toggleClass("glyphicon-minus");
    //     });
    //     $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    // }(window.jQuery);

    $(function() {

        $('a[data-toggle="pill"]').on('shown.bs.tab', function(e) {
            localStorage.setItem('lastTab', $(this).attr('href'));
        });
        var lastTab = localStorage.getItem('lastTab');

        if (lastTab) {
            $('[href="' + lastTab + '"]').tab('show');
        }

    });

    $(window).on('resize', function() {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function() {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })


    // $('.datatables').DataTable({
    //     'paging': false,
    //     'sort': false
    // })
    $('#start_date,#end_date,.datepicker').datepicker()
    $('#start_date,#end_date,.datepicker').on('change', function(event) {
        event.preventDefault();
        $(this).datepicker('hide')
    });

    function popup(url) {
        window.open(url, 'popUpWindow', 'height=1900,width=800,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes')
    }
</script>

<script type="text/javascript">
    $.fn.modal.Constructor.prototype._enforceFocus = function() {};

    $(function() {

        $('a[data-toggle="pill"]').on('shown.bs.tab', function(e) {
            localStorage.setItem('lastTab', $(this).attr('href'));
        });
        var lastTab = localStorage.getItem('lastTab');

        if (lastTab) {
            $('[href="' + lastTab + '"]').tab('show');
        }

    });

    $(function() {

        $('a[data-toggle="tab"], a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
            localStorage.setItem('lastTab', $(this).attr('href'));
        });
        var lastTab = localStorage.getItem('lastTab');

        if (lastTab) {
            $('[href="' + lastTab + '"]').tab('show');
        }

    });

    $('#start_date,#end_date,.datepicker').datepicker()

    $('#start_date,#end_date,.datepicker').on('change', function(event) {
        event.preventDefault();
        $(this).datepicker('hide')
    });

    function print_popup(id) {
        window.open(id, "popupWindow", "width=620,height=600,scrollbars=yes");
    }

    $('#activity_type').on('change', function(event) {
        event.preventDefault();
        if ($(this).val() === 'break' || $(this).val() === 'leave') {
            $('#destination').prop('readonly', false)
        } else if ($(this).val() === 'attendance') {
            $('#destination').prop('readonly', true)
            $('#destination').val('N/A')
        }
    });

    $('#clock_in_frm').on('submit', function(event) {
        event.preventDefault();
        bootbox.confirm("Record Attendance?", function(r) {
            if (r === true) {

                $.ajax({
                    url: '../serverscripts/admin/Employees/clock_in_frm.php',
                    type: 'GET',
                    data: $('#clock_in_frm').serialize(),
                    success: function(msg) {
                        if (msg === 'save_successful') {
                            bootbox.alert("Attendance recorded successfully", function() {
                                window.location.reload()
                            })
                        } else {
                            bootbox.alert(msg)
                        }
                    }
                }) //end ajax

            }
        })
    }); //end submit


    $('#activity_log_frm').one('submit', function(event) {
        event.preventDefault()
        bootbox.confirm("Log this activity?", function(r) {
            if (r === true) {
                $.ajax({
                    url: '../serverscripts/admin/activity_log_frm.php',
                    type: 'GET',
                    data: $('#activity_log_frm').serialize(),
                    success: function(msg) {
                        if (msg === 'save_successful') {
                            bootbox.alert('Activity logged successfully', function() {
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

<!-- if session has message -->



<script type="text/javascript">
    $('.table tbody').on('click', '.viewjob', function(event) {
        event.preventDefault();
        var url = $(this).data('url');

        $.ajax({
            type: 'GET',
            url: url,
            success: function(response) {
                $('#modal_holder').html(response);
                $('#jobCardModal').modal('show')
            }
        })
    });
    $(document).ready(function() {

        bindEvents();

        // Filter form on submit
        $('#filter_jobs_frm').on('submit', function(event) {
            event.preventDefault();

            var url = "http://127.0.0.1:8000/largeformatjobs/filter";

            $.post(url, $(this).serialize())
                .done(function(data) {
                    $('tbody').html('');
                    $('tbody').append(data);

                    bindEvents();
                })
                .fail(function(data) {
                    bootbox.alert(data);
                });
        });

        function bindEvents() {
            // $('.table tbody').on('click', '.viewjob', function(event) {
            //     event.preventDefault();
            //     var url = $(this).data('url');

            //     $.get(url, function(response) {
            //         $('#modal_holder').html(response);
            //         $('#jobCardModal').modal('show');
            //     })

            //     // View(url);
            // });

            $('.table tbody').on('click', '.delete_job', function(event) {
                event.preventDefault();
                var job_id = $(this).attr('ID');
                Delete(job_id);
            });
        }



        // // viewjobs on click
        // $('.table tbody').on('click', '.viewjob', function(event) {
        //     event.preventDefault();
        //     var job_id = $(this).attr('ID');
        //     View(job_id)
        // });

        // // delete job on click
        // $('.table tbody').on('click', '.delete_job', function(event) {
        //     event.preventDefault();
        //     var job_id = $(this).attr('ID')
        //     Delete(job_id)
        // }); //end click


        function View(url) {
            $.get(url)
                .done(function(response) {
                    $('#modal_holder').html(response);
                    $('#jobCardModal').modal('show');
                });
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
