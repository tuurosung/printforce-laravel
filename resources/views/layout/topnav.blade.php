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
        <a href="<?php //echo $sideBarLink;
                    ?>/index.php" class="brand-logo">
            <img src="{{ asset('images/logo.png') }}" class="invert-dark" alt height="40">
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
                    <img src="{{ asset('images/user.jpg') }}" alt class="ms-100 mh-100 rounded-circle">
                </div>
                <div class="menu-text"><span class="" data-cfemail="">Username</span></div>
            </a>
            <div class="dropdown-menu dropdown-menu-end me-lg-3">
                <a class="dropdown-item d-flex align-items-center" href="#">Edit Profile <i class="fa fa-user-circle fa-fw ms-auto text-body text-opacity-50"></i></a>
                <a class="dropdown-item d-flex align-items-center" href="#">Inbox <i class="fa fa-envelope fa-fw ms-auto text-body text-opacity-50"></i></a>
                <a class="dropdown-item d-flex align-items-center" href="#">Calendar <i class="fa fa-calendar-alt fa-fw ms-auto text-body text-opacity-50"></i></a>
                <a class="dropdown-item d-flex align-items-center" href="#">Setting <i class="fa fa-wrench fa-fw ms-auto text-body text-opacity-50"></i></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item d-flex align-items-center" href="<?php //echo $staticLink;
                                                                            ?>logout.php">Log Out <i class="fa fa-toggle-off fa-fw ms-auto text-body text-opacity-50"></i></a>
            </div>
        </div>
    </div>

</div>