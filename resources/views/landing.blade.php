<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PrintForce - Workflow Manager For Print Businesses</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- ================== BEGIN core-css ================== -->
    <link href="{{ asset('assets/css/vendor.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fontawesome/css/all.css') }}" rel="stylesheet">
    <!-- ================== END core-css ================== -->

    <!-- ================== BEGIN page-css ================== -->
    <link href="{{ asset('assets/css/lity.min.css') }}" rel="stylesheet">
    <!-- ================== END page-css ================== -->



    <style media="screen">
        /* Load Google Fonts Locally */


        @font-face {
            font-family: 'Avante';
            font-weight: 700;
            src: url('{{ asset("assets/font/Avante/ITCAvantGardePro-Bold.otf") }}');
        }

        @font-face {
            font-family: 'Avante';
            font-weight: 600;
            src: url('{{ asset("assets/font/Avante/ITCAvantGardePro-Demi.otf") }}');
        }

        @font-face {
            font-family: 'Avante';
            font-weight: 500;
            src: url('{{ asset("assets/font/Avante/ITCAvantGardePro-Md.otf") }}');
        }

        @font-face {
            font-family: 'Avante';
            font-weight: 400;
            src: url('{{ asset("assets/font/Avante/ITCAvantGardePro-Bk.otf") }}');
        }

        @font-face {
            font-family: 'Avante';
            font-weight: 300;
            src: url('{{ asset("assets/font/Avante/ITCAvantGardePro-XLt.otf") }}');
        }


        .urbanist {
            font-family: 'Urbanist', sans-serif;
        }

        .Avante {
            font-family: 'Avante' !important;
        }



        a {
            color: var(--bs-black);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .btn {
            padding: 0.6rem 2.14rem;
            font-size: 12px;
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.765625rem;
            border-radius: 3px;
        }

        .bootbox-body {
            font-size: 18px;
        }

        .bootbox .modal-header {
            display: none;
        }

        .form-select {
            padding: .575rem .75rem;
        }

        .dropdown-item {
            font-size: 12px;
            font-weight: 500;
        }

        body {
            font-family: 'Avante' !important;
            font-weight: 500;
            /* background-color: #fff; */
        }

        .profile .profile-header .profile-header-cover::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: none;
        }

        .table>thead>tr>th {
            font-weight: 500;
        }

        .table>tbody>tr>td {
            font-weight: 500;
        }

        .badge {
            display: inline-block;
            padding: .35em .65em;
            font-size: .75em;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
        }

        .glass {
            filter: blur(9px) !important;
        }

        .form-control-sm {
            padding: .6rem .5rem;
        }


        hr {
            opacity: 1 !important;
        }

        .nav-pills .nav-link {
            border-radius: 35px !important;
        }
    </style>

</head>

<body>
    <!-- BEGIN #app -->
    <div id="app" class="app">
        <!-- BEGIN #header -->
        <div id="header" class="app-header navbar navbar-expand-lg p-0">
            <div class="container-xxl px-3 px-lg-5">
                <button class="navbar-toggler border-0 p-0 me-3 fs-24px shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                    <span class="h-2px w-25px bg-gray-500 d-block mb-1"></span>
                    <span class="h-2px w-25px bg-gray-500 d-block"></span>
                </button>
                <a class="navbar-brand d-flex align-items-center position-relative me-auto" href="index.html">
                    <img src="{{ asset('images/logo.png') }}" class="invert-dark" alt="" height="29">
                </a>
                <div class="collapse navbar-collapse" id="navbarContent">
                    <div class="navbar-nav ms-auto mb-2 mb-lg-0 fw-500">
                        <div class="nav-item me-2">
                            <a href="#home" class="nav-link">Home</a>
                        </div>
                        <div class="nav-item me-2">
                            <a href="#about" class="nav-link">About</a>
                        </div>
                        <div class="nav-item me-2">
                            <a href="#features" class="nav-link">Features</a>
                        </div>
                        <div class="nav-item me-2">
                            <a href="#pricing" class="nav-link">Pricing</a>
                        </div>
                        <!-- <div class="nav-item me-2">
                            <a href="#testimonials" class="nav-link">Testimonials</a>
                        </div> -->
                        <!-- <div class="nav-item me-2">
                            <a href="#blog" class="nav-link">Blog</a>
                        </div> -->
                        <div class="nav-item me-2">
                            <a href="#contact" class="nav-link">Contact</a>
                        </div>
                    </div>
                </div>
                <div class="ms-3">
                    <button data-bs-toggle="modal" data-bs-target="#loginModal" class="btn btn-primary fw-bold rounded-pill px-3 py-2">
                        <i class="fa fa-unlock-keyhole me-2"></i>
                        Sign In
                    </button>
                </div>
            </div>
        </div>
        <!-- END #header -->

        <!-- BEGIN #home -->
        <div id="home" class="py-5 position-relative bg-gray-900" data-bs-theme="dark" style="background-image: url('{{ asset("images/hero-cover.png") }}'); background-repeat: no-repeat; background-position: top left; background-size: cover">
            <!-- BEGIN container -->
            <div class="container-xxl p-3 p-lg-5">
                <!-- BEGIN div-hero-content -->
                <div class="div-hero-content z-3 position-relative">
                    <!-- BEGIN row -->
                    <div class="row">
                        <!-- BEGIN col-8 -->
                        <div class="col-xl-8 offset-xl-2 text-center">
                            <!-- BEGIN hero-title-desc -->
                            <h1 class="display-2 fw-600 mb-2 mt-4 text-center">
                                Workflow Manager For <span class="text-theme">Digital Print</span> Businesses
                            </h1>
                            <div class="fs-18px text-body text-opacity-75 mb-4 text-center">
                                Join our many users nationwide who rely on PrintForce to manage<br>
                                their Startups, Print Companies, Creative Studios, <br>
                                and freelance graphic designers.
                            </div>
                            <!-- END hero-title-desc -->



                            <div class="mb-2">
                                <a href="#" class="btn btn-lg btn-theme px-3">Create Account <i class="fa fa-arrow-right ms-2 opacity-5"></i></a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" class="btn btn-lg btn-white px-3">
                                    <i class="fa fa-lock me-2 opacity-5"></i>
                                    Sign Into Your Account
                                </a>
                            </div>


                            <hr class="my-4 opacity-1">

                            <div class="d-flex justify-content-center">
                                <div class="col-md-3 text-center">
                                    <div class="d-flex align-items-center">
                                        <div class="h1 text-body text-opacity-25 me-3"><iconify-icon icon="bi:download"></iconify-icon></div>
                                        <div>
                                            <div class="fw-500 mb-0 h3">47</div>
                                            <div class="fw-500 text-body text-opacity-75">Companies</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 text-center">
                                    <div class="d-flex align-items-center">
                                        <div class="h1 text-body text-opacity-25 me-3"><iconify-icon icon="bi:bootstrap"></iconify-icon></div>
                                        <div>
                                            <div class="fw-500 mb-0 h3">3.0.3</div>
                                            <div class="fw-500 text-body text-opacity-75">Version</div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex align-items-center">
                                        <div class="h1 text-body text-opacity-25 me-3"><iconify-icon icon="bi:bootstrap"></iconify-icon></div>
                                        <div>
                                            <div class="fw-500 mb-0 h3">24/7</div>
                                            <div class="fw-500 text-body text-opacity-75">Support</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- END col-8 -->
                    </div>
                    <!-- END row -->
                </div>
                <!-- END div-hero-content -->

            </div>
            <!-- END container -->
        </div>
        <!-- END #home -->

        <!-- BEGIN #about -->
        <div id="about" class="py-5 bg-component">
            <div class="container-xxl p-3 p-lg-5 text-center">
                <h1 class="mb-3">About PrintForce</h1>
                <p class="fs-16px text-body mb-5">
                    PrintForce is a high-performance workflow manager for <br> creatives, designers and print studios, automating
                    their operations and keeping records whilst they unleash thier creativity.
                </p>
                <div class="row text-start g-3 gx-lg-5 gy-lg-4">
                    <div class="col-xl-3 col-lg-4 col-sm-6 d-flex">
                        <div class="w-50px h-50px rounded-3 bg-blue bg-opacity-15 text-blue fs-32px d-flex align-items-center justify-content-center">
                            <i class="fas fa-mobile-screen-button"></i>
                        </div>
                        <div class="flex-1 ps-3">
                            <h4>Responsive Design</h4>
                            <p class="mb-0">
                                Designed to provide a consistent and outstanding user experience across various devices and screen sizes.
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6 d-flex">
                        <div class="w-50px h-50px rounded-3 bg-indigo bg-opacity-15 text-indigo fs-32px d-flex align-items-center justify-content-center">
                            <i class="fas fa-cog    "></i>
                            <iconify-icon icon="solar:settings-bold-duotone"></iconify-icon>
                        </div>
                        <div class="flex-1 ps-3">
                            <h4>Customizable</h4>
                            <p class="mb-0">
                                Tailor the application to your needs with ease. Customize layouts, colors and more without requiring extensive coding knowledge.
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6 d-flex">
                        <div class="w-50px h-50px rounded-3 bg-warning bg-opacity-15 text-warning fs-32px d-flex align-items-center justify-content-center">
                            <i class="fas fa-bolt"></i>
                            <iconify-icon icon="solar:bolt-bold-duotone"></iconify-icon>
                        </div>
                        <div class="flex-1 ps-3">
                            <h4>High Performance</h4>
                            <p class="mb-0">
                                Optimized for speed and performance, PrintForce ensures a seamless user experience, even with large datasets and high traffic.
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6 d-flex">
                        <div class="w-50px h-50px rounded-3 bg-cyan bg-opacity-15 text-cyan fs-32px d-flex align-items-center justify-content-center">
                            <i class="fas fa-lock"></i>
                            <iconify-icon icon="solar:lock-keyhole-bold-duotone"></iconify-icon>
                        </div>
                        <div class="flex-1 ps-3">
                            <h4>Secure</h4>
                            <p class="mb-0">
                                We take security seriously, so you can rest assured that your data is protected and your workflow is safeguarded.
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6 d-flex">
                        <div class="w-50px h-50px rounded-3 bg-green bg-opacity-15 text-green fs-32px d-flex align-items-center justify-content-center">
                            <i class="fas fa-users"></i>
                            <iconify-icon icon="solar:dialog-2-bold-duotone"></iconify-icon>
                        </div>
                        <div class="flex-1 ps-3">
                            <h4>Community Support</h4>
                            <p class="mb-0">
                                Be part of our active community of developers and designers, where we share knowledge, insights, and support one another.
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6 d-flex">
                        <div class="w-50px h-50px rounded-3 bg-red bg-opacity-15 text-red fs-32px d-flex align-items-center justify-content-center">
                            <i class="fas fa-headset"></i>
                            <iconify-icon icon="solar:help-bold-duotone"></iconify-icon>
                        </div>
                        <div class="flex-1 ps-3">
                            <h4>24/7 Support</h4>
                            <p class="mb-0">
                                If you ever need help, our friendly support team is just a click away, ready to lend a hand with any questions or issues.
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6 d-flex">
                        <div class="w-50px h-50px rounded-3 bg-pink bg-opacity-15 text-pink fs-32px d-flex align-items-center justify-content-center">
                            <i class="fas fa-shield-alt"></i>
                            <iconify-icon icon="solar:tuning-bold-duotone"></iconify-icon>
                        </div>
                        <div class="flex-1 ps-3">
                            <h4>Scalable Infrastructure</h4>
                            <p class="mb-0">
                                PrintForce offers flexibility and scalability to meet diverse business needs with reliable performance.
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6 d-flex">
                        <div class="w-50px h-50px rounded-3 bg-gray-500 bg-opacity-15 text-gray-500 fs-32px d-flex align-items-center justify-content-center">
                            <i class="fas fa-tachometer-alt"></i>
                            <iconify-icon icon="solar:widget-5-bold-duotone"></iconify-icon>
                        </div>
                        <div class="flex-1 ps-3">
                            <h4>Intuitive User Interface</h4>
                            <p class="mb-0">
                                Designed to boost your productivity and creativity, our intuitive interface is streamlined to make your workflow smoother.
                            </p>
                        </div>
                    </div>
                </div>


                <div class="card border-0 bg-primary mt-5">
                    <div class="card-body py-4">

                        <div class="d-flex align-items-center justify-content-center">
                            <h4 class="h3 m-0 text-white">Ready to get started?</h4>
                            <div class="ms-3">
                                <a href="{{ route('login') }}" class="btn btn-light fw-bold rounded-pill px-3 py-2">Create Account</a>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
        <!-- END #about -->

        <!-- BEGIN #features -->
        <div id="features" class="py-5 position-relative d-none" data-bs-theme="dark">
            <div class="container-xxl p-3 p-lg-5 z-2 position-relative">
                <div class="text-center mb-5">
                    <h1 class="mb-3">Our Unique Features</h1>
                    <p class="fs-16px text-body text-opacity-50 mb-5">
                        Explore Studio Admin Template's standout features. <br>
                        With advanced customization and seamless integration, create powerful and stunning <br>
                        admin interfaces, enhancing productivity and user satisfaction.
                    </p>
                </div>
                <div class="row g-3 g-lg-5">
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <a href="assets/img/landing/mockup-1.jpg" data-lity class="shadow d-block"><img src="assets/img/landing/mockup-1-thumb.jpg" alt="" class="mw-100"></a>
                        <div class="text-center my-3 text-body fw-bold">Theme Dashboard</div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <a href="assets/img/landing/mockup-2.jpg" data-lity class="shadow d-block"><img src="assets/img/landing/mockup-2-thumb.jpg" alt="" class="mw-100"></a>
                        <div class="text-center my-3 text-body fw-bold">POS System UI</div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <a href="assets/img/landing/mockup-3.jpg" data-lity class="shadow d-block"><img src="assets/img/landing/mockup-3-thumb.jpg" alt="" class="mw-100"></a>
                        <div class="text-center my-3 text-body fw-bold">Email Inbox</div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <a href="assets/img/landing/mockup-4.jpg" data-lity class="shadow d-block"><img src="assets/img/landing/mockup-4-thumb.jpg" alt="" class="mw-100"></a>
                        <div class="text-center my-3 text-body fw-bold">Pricing Page</div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <a href="assets/img/landing/mockup-5.jpg" data-lity class="shadow d-block"><img src="assets/img/landing/mockup-5-thumb.jpg" alt="" class="mw-100"></a>
                        <div class="text-center my-3 text-body fw-bold">User Profile</div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <a href="assets/img/landing/mockup-6.jpg" data-lity class="shadow d-block"><img src="assets/img/landing/mockup-6-thumb.jpg" alt="" class="mw-100"></a>
                        <div class="text-center my-3 text-body fw-bold">Analytics Page</div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <a href="assets/img/landing/mockup-7.jpg" data-lity class="shadow d-block"><img src="assets/img/landing/mockup-7-thumb.jpg" alt="" class="mw-100"></a>
                        <div class="text-center my-3 text-body fw-bold">Studio Widgets</div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <a href="assets/img/landing/mockup-8.jpg" data-lity class="shadow d-block"><img src="assets/img/landing/mockup-8-thumb.jpg" alt="" class="mw-100"></a>
                        <div class="text-center my-3 text-body fw-bold">Kitchen Order Page</div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <a href="assets/img/landing/mockup-9.jpg" data-lity class="shadow d-block"><img src="assets/img/landing/mockup-9-thumb.jpg" alt="" class="mw-100"></a>
                        <div class="text-center my-3 text-body fw-bold">Order Details Page</div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <a href="assets/img/landing/mockup-10.jpg" data-lity class="shadow d-block"><img src="assets/img/landing/mockup-10-thumb.jpg" alt="" class="mw-100"></a>
                        <div class="text-center my-3 text-body fw-bold">Messenger</div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <a href="assets/img/landing/mockup-11.jpg" data-lity class="shadow d-block"><img src="assets/img/landing/mockup-11-thumb.jpg" alt="" class="mw-100"></a>
                        <div class="text-center my-3 text-body fw-bold">Table Control Page</div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <a href="assets/img/landing/mockup-12.jpg" data-lity class="shadow d-block"><img src="assets/img/landing/mockup-12-thumb.jpg" alt="" class="mw-100"></a>
                        <div class="text-center my-3 text-body fw-bold">Customer Order Page</div>
                    </div>
                </div>
            </div>
            <div class="position-absolute bg-size-cover bg-position-center bg-no-repeat top-0 start-0 w-100 h-100" style="background-image: url(assets/img/landing/content-cover.jpg);"></div>
            <div class="position-absolute bg-gray-900 bg-opacity-80 top-0 start-0 w-100 h-100"></div>
        </div>
        <!-- END #features -->


        <!-- BEGIN #pricing -->
        <div id="pricing" class="py-5 bg-component">
            <div class="container-xxl p-3 p-lg-5">
                <h1 class="mb-3 text-center">Our Pricing Plans</h1>
                <p class="fs-16px text-center mb-0">
                    Our pricing plans are designed to be flexible and affordable, providing value for businesses of all sizes. <br>
                    Whether you're just starting out or an established business, we have a plan that fits your needs.
                </p>

                <div class="row g-3 py-3 gx-lg-5 py-lg-5">
                    <div class="col-xl-4 col-md-4 col-sm-6 py-xl-5">
                        <div class="card border-0 rounded-4 h-100 bg-light">
                            <div class="card-body fs-13px p-25px d-flex flex-column">
                                <div class="d-flex align-items-center">
                                    <div class="flex-1">
                                        <div class="h6 ">Starter Plan</div>
                                        <div class="h2 fw-bold mb-0">&cent;99 <small class="h6 text-body text-opacity-50">/month*</small></div>
                                    </div>
                                    <div>
                                        <iconify-icon icon="solar:usb-bold-duotone" class="display-6 text-gray-500"></iconify-icon>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="mb-5 text-body text-opacity-75 flex-1">
                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fa fa-check fa-lg text-black"></i>
                                        <div class="flex-1 ps-3"><span class="">Customers:</span> <b class="text-body">50 Customers</b></div>
                                    </div>
                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fa fa-check fa-lg"></i>
                                        <div class="flex-1 ps-3"><span class="">Job Registration:</span> <b class="text-body">70 Jobs</b></div>
                                    </div>
                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fa fa-check fa-lg text-black"></i>
                                        <div class="flex-1 ps-3"><span class="">SMS Bundle:</span> <b class="text-body">20 SMS</b></div>
                                    </div>
                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fa fa-check fa-lg text-black"></i>
                                        <div class="flex-1 ps-3"><span class="">Users:</span> <b class="text-body"> 2 User Accounts</b></div>
                                    </div>

                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fa fa-times fa-lg text-body text-opacity-25"></i>
                                        <div class="flex-1 ps-3"><span class="">Business Intelligence::</span> <b class="text-body"> No</b></div>
                                    </div>

                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fa fa-times fa-lg text-body text-opacity-25"></i>
                                        <div class="flex-1 ps-3"><span class="">Data Analytics:</span> <b class="text-body"> No</b></div>
                                    </div>
                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fa fa-times fa-lg text-body text-opacity-25"></i>
                                        <div class="flex-1 ps-3"><span class="">Image Uploads:</span> <b class="text-body"> No</b></div>
                                    </div>
                                </div>
                                <div class="mx-n2">
                                    <a href="#" class="btn btn-black btn-lg fs-16px w-100 border-0">
                                        Get Started <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 col-sm-6 py-xl-0">
                        <div class="card border-0 rounded-4 shadow bg-gradient-blue-indigo text-white h-100" data-bs-theme="dark">
                            <div class="card-body fs-14px p-25px h-100 d-flex flex-column">
                                <div class="d-flex align-items-center">
                                    <div class="flex-1">
                                        <div class="h6 ">Premium Plan</div>
                                        <div class="h1 fw-bold mb-0">&cent; 150 <small class="h6 text-body text-opacity-50">/month*</small></div>
                                    </div>
                                    <div>
                                        <iconify-icon icon="solar:cup-first-bold-duotone" class="display-5 text-white text-opacity-50"></iconify-icon>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="mb-5 text-body flex-1">
                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fa fa-check fa-lg text-white"></i>
                                        <div class="flex-1 ps-3"><span class="">
                                                Customers:</span> <b class="text-body">Unlimited</b>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fa fa-check fa-lg"></i>
                                        <div class="flex-1 ps-3"><span class="">
                                                Job Registration:</span> <b class="text-body">Unlimited</b>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fa fa-check fa-lg text-white"></i>
                                        <div class="flex-1 ps-3"><span class="">
                                                SMS Bundle:</span> <b class="text-body">Unlimited</b>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fa fa-check fa-lg text-white"></i>
                                        <div class="flex-1 ps-3"><span class="">
                                                Users:</span> <b class="text-body"> Unlimited</b>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fa fa-check fa-lg text-white"></i>
                                        <div class="flex-1 ps-3"><span class="">
                                                Business Intelligence::</span> <b class="text-body"> Yes</b>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fa fa-check fa-lg text-white"></i>
                                        <div class="flex-1 ps-3"><span class="">
                                                Data Analytics:</span> <b class="text-body"> Yes</b>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fa fa-check fa-lg text-white"></i>
                                        <div class="flex-1 ps-3"><span class="">
                                                Image Uploads:</span> <b class="text-body"> Yes</b>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fa fa-check text-white fa-lg"></i>
                                        <div class="flex-1 ps-3"><span class="">
                                                Email Accounts:</span> <b class="text-white">Unlimited</b>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fa fa-check text-white fa-lg"></i>
                                        <div class="flex-1 ps-3"><span class="">
                                                24/7 Support:</span> <b class="text-white">Yes</b>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fa fa-check text-white fa-lg"></i>
                                        <div class="flex-1 ps-3"><span class="">
                                                Backup:</span> <b class="text-white">Daily</b>
                                        </div>
                                    </div>



                                </div>
                                <a href="#" class="btn btn-light btn-lg fs-16px w-100 text-black ">Get Started <i class="fa fa-arrow-right ms-3 opacity-5"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 col-sm-6 py-xl-5">
                        <div class="card border-0 rounded-4 h-100 bg-light">
                            <div class="card-body fs-13px p-25px d-flex flex-column">
                                <div class="d-flex align-items-center">
                                    <div class="flex-1">
                                        <div class="h6">Business Plan</div>
                                        <div class="h2 fw-bold mb-0">
                                            &cent; 200 <small class="h6 text-body text-opacity-50">/month*</small></div>
                                    </div>
                                    <div>
                                        <iconify-icon icon="solar:buildings-bold-duotone" class="display-6 text-gray-500"></iconify-icon>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="mb-5 text-body text-opacity-75 flex-1">
                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fa fa-check fa-lg text-black"></i>
                                        <div class="flex-1 ps-3"><span class="">
                                                Customers:</span> <b class="text-body">Unlimited</b>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fa fa-check fa-lg"></i>
                                        <div class="flex-1 ps-3"><span class="">
                                                Job Registration:</span> <b class="text-body">Unlimited</b>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fa fa-check fa-lg text-black"></i>
                                        <div class="flex-1 ps-3"><span class="">
                                                SMS Bundle:</span> <b class="text-body">Unlimited</b>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fa fa-check fa-lg text-black"></i>
                                        <div class="flex-1 ps-3"><span class="">
                                                Users:</span> <b class="text-body"> Unlimited</b>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fa fa-check fa-lg text-black"></i>
                                        <div class="flex-1 ps-3"><span class="">
                                                Business Intelligence::</span> <b class="text-body"> Yes</b>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fa fa-check fa-lg text-black"></i>
                                        <div class="flex-1 ps-3"><span class="">
                                                Data Analytics:</span> <b class="text-body"> Yes</b>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fa fa-check fa-lg text-black"></i>
                                        <div class="flex-1 ps-3"><span class="">
                                                Image Uploads:</span> <b class="text-body"> Yes</b>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fa fa-check text-black fa-lg"></i>
                                        <div class="flex-1 ps-3"><span class="">
                                                Email Accounts:</span> <b class="text-black">Unlimited</b>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fa fa-check text-black fa-lg"></i>
                                        <div class="flex-1 ps-3"><span class="">
                                                24/7 Support:</span> <b class="text-black">Yes</b>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fa fa-check text-black fa-lg"></i>
                                        <div class="flex-1 ps-3"><span class="">
                                                Backup:</span> <b class="text-black">Daily</b>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fa fa-check text-black fa-lg"></i>
                                        <div class="flex-1 ps-3"><span class="">
                                            AI Generated Summaries:</span> <b class="text-body">Yes</b>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fa fa-check text-black fa-lg"></i>
                                        <div class="flex-1 ps-3"><span class="">Customer Login Job Uploads</span></div>
                                    </div>
                                    <div class="d-flex align-items-center mb-1">
                                        <i class="fa fa-check text-black fa-lg"></i>
                                        <div class="flex-1 ps-3"><span class="">5-Day Expiry Overlap</span></div>
                                    </div>
                                </div>
                                <div class="mx-n2">
                                    <a href="#" class="btn btn-black btn-lg fs-15px w-100 border-0">
                                        Get Started <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END #pricing -->

        <!-- BEGIN #testimonials -->
        <div id="testimonials" class="py-5 d-none">
            <div class="container-xxl p-3 p-lg-5">
                <div class="text-center mb-5">
                    <h1 class="mb-3 text-center">What Our Clients Say</h1>
                    <p class="fs-16px text-body text-opacity-50 text-center mb-0">
                        Read testimonials from our satisfied customers. <br>
                        Discover how Studio Admin Template enhances productivity and exceeds expectations <br>
                        with its ease of use, advanced features, and exceptional support.
                    </p>
                </div>
                <div class="row g-3 g-lg-4 mb-4">
                    <div class="col-xl-4 col-md-6">
                        <div class="card p-4 border-0 h-100 rounded-5">
                            <div class="d-flex align-items-center mb-3">
                                <img src="assets/img/user/user.jpg" class="rounded-circle me-3 w-50px" alt="Client 1">
                                <div>
                                    <h5 class="mb-0">John Doe</h5>
                                    <small class="text-muted">CEO, Company</small>
                                </div>
                            </div>
                            <div class="mb-4 d-flex">
                                <i class="fa fa-quote-left fa-2x text-body text-opacity-15"></i>
                                <div class="p-3">
                                    <div class="text-warning d-flex mb-2">
                                        <iconify-icon icon="ic:baseline-star" class="fs-18px"></iconify-icon>
                                        <iconify-icon icon="ic:baseline-star" class="fs-18px"></iconify-icon>
                                        <iconify-icon icon="ic:baseline-star" class="fs-18px"></iconify-icon>
                                        <iconify-icon icon="ic:baseline-star" class="fs-18px"></iconify-icon>
                                        <iconify-icon icon="ic:baseline-star" class="fs-18px"></iconify-icon>
                                    </div>
                                    Studio Admin Template transformed our workflow.
                                    The customization options are unparalleled, and the support team is incredibly responsive.
                                </div>
                                <div class="d-flex align-items-end">
                                    <i class="fa fa-quote-right fa-2x text-body text-opacity-15"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card p-4 border-0 h-100 rounded-5">
                            <div class="d-flex align-items-center mb-3">
                                <img src="assets/img/user/user-7.jpg" class="rounded-circle me-3 w-50px" alt="Client 1">
                                <div>
                                    <h5 class="mb-0">Michael Brown</h5>
                                    <small class="text-muted">CTO, Innovate Corp</small>
                                </div>
                            </div>
                            <div class="mb-4 d-flex">
                                <i class="fa fa-quote-left fa-2x text-body text-opacity-15"></i>
                                <div class="p-3">
                                    <div class="text-warning d-flex mb-2">
                                        <iconify-icon icon="ic:baseline-star" class="fs-18px"></iconify-icon>
                                        <iconify-icon icon="ic:baseline-star" class="fs-18px"></iconify-icon>
                                        <iconify-icon icon="ic:baseline-star" class="fs-18px"></iconify-icon>
                                        <iconify-icon icon="ic:baseline-star" class="fs-18px"></iconify-icon>
                                        <iconify-icon icon="ic:baseline-star" class="fs-18px"></iconify-icon>
                                    </div>
                                    Our productivity has soared since adopting this template.
                                    The features are top-notch, and the user experience is outstanding.
                                </div>
                                <div class="d-flex align-items-end">
                                    <i class="fa fa-quote-right fa-2x text-body text-opacity-15"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card p-4 border-0 h-100 rounded-5">
                            <div class="d-flex align-items-center mb-3">
                                <img src="assets/img/user/user-10.jpg" class="rounded-circle me-3 w-50px" alt="Client 1">
                                <div>
                                    <h5 class="mb-0">Emily Johnson</h5>
                                    <small class="text-muted">Project Manager, Creative Agency</small>
                                </div>
                            </div>
                            <div class="mb-4 d-flex">
                                <i class="fa fa-quote-left fa-2x text-body text-opacity-15"></i>
                                <div class="p-3">
                                    <div class="text-warning d-flex mb-2">
                                        <iconify-icon icon="ic:baseline-star" class="fs-18px"></iconify-icon>
                                        <iconify-icon icon="ic:baseline-star" class="fs-18px"></iconify-icon>
                                        <iconify-icon icon="ic:baseline-star" class="fs-18px"></iconify-icon>
                                        <iconify-icon icon="ic:baseline-star" class="fs-18px"></iconify-icon>
                                        <iconify-icon icon="ic:baseline-star" class="fs-18px"></iconify-icon>
                                    </div>
                                    This template is a game-changer.
                                    It's intuitive, flexible, and the seamless integration
                                    has made our projects run smoother than ever.
                                </div>
                                <div class="d-flex align-items-end">
                                    <i class="fa fa-quote-right fa-2x text-body text-opacity-15"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 d-none d-xl-block"></div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card p-4 border-0 h-100 rounded-5">
                            <div class="d-flex align-items-center mb-3">
                                <img src="assets/img/user/user-8.jpg" class="rounded-circle me-3 w-50px" alt="Client 1">
                                <div>
                                    <h5 class="mb-0">David Lee</h5>
                                    <small class="text-muted">Founder, Startup Hub</small>
                                </div>
                            </div>
                            <div class="mb-4 d-flex">
                                <i class="fa fa-quote-left fa-2x text-body text-opacity-15"></i>
                                <div class="p-3">
                                    <div class="text-warning d-flex mb-2">
                                        <iconify-icon icon="ic:baseline-star" class="fs-18px"></iconify-icon>
                                        <iconify-icon icon="ic:baseline-star" class="fs-18px"></iconify-icon>
                                        <iconify-icon icon="ic:baseline-star" class="fs-18px"></iconify-icon>
                                        <iconify-icon icon="ic:baseline-star" class="fs-18px"></iconify-icon>
                                        <iconify-icon icon="ic:baseline-star" class="fs-18px"></iconify-icon>
                                    </div>
                                    Studio Admin Template has exceeded all our expectations.
                                    The advanced features and excellent support make it a standout choice.
                                </div>
                                <div class="d-flex align-items-end">
                                    <i class="fa fa-quote-right fa-2x text-body text-opacity-15"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card p-4 border-0 h-100 rounded-5">
                            <div class="d-flex align-items-center mb-3">
                                <img src="assets/img/user/user.jpg" class="rounded-circle me-3 w-50px" alt="Client 1">
                                <div>
                                    <h5 class="mb-0">John Doe</h5>
                                    <small class="text-muted">CEO, Company</small>
                                </div>
                            </div>
                            <div class="mb-4 d-flex">
                                <i class="fa fa-quote-left fa-2x text-body text-opacity-15"></i>
                                <div class="p-3">
                                    <div class="text-warning d-flex mb-2">
                                        <iconify-icon icon="ic:baseline-star" class="fs-18px"></iconify-icon>
                                        <iconify-icon icon="ic:baseline-star" class="fs-18px"></iconify-icon>
                                        <iconify-icon icon="ic:baseline-star" class="fs-18px"></iconify-icon>
                                        <iconify-icon icon="ic:baseline-star" class="fs-18px"></iconify-icon>
                                        <iconify-icon icon="ic:baseline-star" class="fs-18px"></iconify-icon>
                                    </div>
                                    Studio Admin Template transformed our workflow.
                                    The customization options are unparalleled, and the support team is incredibly responsive.
                                </div>
                                <div class="d-flex align-items-end">
                                    <i class="fa fa-quote-right fa-2x text-body text-opacity-15"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END #testimonials -->

        <!-- BEGIN #blog -->
        <div id="blog" class="py-5 bg-component d-none">
            <div class="container-xxl p-3 p-lg-5">
                <div class="text-center mb-5">
                    <h1 class="mb-3 text-center">Our Latest Insights</h1>
                    <p class="fs-16px text-body text-opacity-50 text-center mb-0">
                        Dive into our blog for the latest trends, tips, and updates <br>
                        on web development, design, and industry best practices. Stay informed and inspired <br>
                        with expert insights and valuable resources.
                    </p>
                </div>
                <div class="row g-3 g-xl-4 mb-5">
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="d-flex flex-column h-100 rounded-4 overflow-hidden shadow-lg mb-5 mb-lg-0">
                            <div>
                                <img src="assets/img/landing/blog-1.jpg" alt="" class="object-fit-cover h-200px w-100 d-block">
                            </div>
                            <div class="flex-1 p-3 pb-0">
                                <div class="mb-2">
                                    <span class="bg-theme bg-opacity-15 text-theme px-2 py-1 rounded small fw-bold">Web Design</span>
                                </div>
                                <h5>Mastering Responsive Design: A Guide for Beginners</h5>
                                <p>Explore the fundamentals of responsive web design and learn essential tips to create websites that look great on any device.</p>
                            </div>
                            <div class="p-3 pt-0 text-body text-opacity-50">July 15, 2024</div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="d-flex flex-column h-100 rounded-4 overflow-hidden shadow-lg mb-5 mb-lg-0">
                            <div>
                                <img src="assets/img/landing/blog-2.jpg" alt="" class="object-fit-cover h-200px w-100 d-block">
                            </div>
                            <div class="flex-1 p-3 pb-0">
                                <div class="mb-2">
                                    <span class="bg-theme bg-opacity-15 text-theme px-2 py-1 rounded small fw-bold">UXUI Design</span>
                                </div>
                                <h5>The Future of UI/UX Trends in 2024</h5>
                                <p>Discover the latest trends shaping user interface and experience design in the digital landscape this year.</p>
                            </div>
                            <div class="p-3 pt-0 text-body text-opacity-50">July 11, 2024</div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="d-flex flex-column h-100 rounded-4 overflow-hidden shadow-lg mb-5 mb-lg-0">
                            <div>
                                <img src="assets/img/landing/blog-3.jpg" alt="" class="object-fit-cover h-200px w-100 d-block">
                            </div>
                            <div class="flex-1 p-3 pb-0">
                                <div class="mb-2">
                                    <span class="bg-theme bg-opacity-15 text-theme px-2 py-1 rounded small fw-bold">Search Engine</span>
                                </div>
                                <h5>Effective SEO Strategies for 2024</h5>
                                <p>Dive into actionable SEO strategies and tips to boost your website’s visibility and drive organic traffic.</p>
                            </div>
                            <div class="p-3 pt-0 text-body text-opacity-50">June 29, 2024</div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="d-flex flex-column h-100 rounded-4 overflow-hidden shadow-lg mb-5 mb-lg-0">
                            <div>
                                <img src="assets/img/landing/blog-4.jpg" alt="" class="object-fit-cover h-200px w-100 d-block">
                            </div>
                            <div class="flex-1 p-3 pb-0">
                                <div class="mb-2">
                                    <span class="bg-theme bg-opacity-15 text-theme px-2 py-1 rounded small fw-bold">Cyber Security</span>
                                </div>
                                <h5>Security Essentials: Protecting Your Website from Cyber Threats</h5>
                                <p>Essential security measures and best practices to safeguard your website and user data from cyber threats.</p>
                            </div>
                            <div class="p-3 pt-0 text-body text-opacity-50">June 27, 2024</div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a href="#" class="text-decoration-none text-body text-opacity-50 h6">See More Company Stories <i class="fa fa-arrow-right ms-3"></i></a>
                </div>
            </div>
        </div>
        <!-- END #blog -->

        <!-- BEGIN #contact -->
        <div id="contact" class="py-5">
            <div class="container-xl p-3 p-lg-5">
                <div class="text-center mb-5">
                    <h1 class="mb-3 text-center">Contact Us</h1>
                    <p class="fs-16px text-black text-center mb-0">
                        Ready to get started or have a question? Let's talk! <br>
                        Reach out to us and our team will be happy to help with any <br>
                        inquiries, support, or partnership opportunities.
                    </p>
                </div>
                <div class="row gx-3 gx-lg-5">
                    <div class="col-lg-6">
                        <h4>Contact Us to Discuss Your Project</h4>
                        <p>
                            Do you have a project in mind? We’re eager to discuss it with you. Whether you’re looking for advice, have questions, or want to share your ideas, feel free to reach out.
                        </p>
                        <p>
                            <span class="fw-bolder">Kindred Technologies</span><br>
                            Office 06, Far-Habink Storey<br>
                            Filling Point - Tamale, GH<br><br>

                            Monday - Saturday: 9:00 AM - 6:00 PM<br>
                            Sunday: Closed<br> <br>

                            Phone: <a href="#" class="text-theme">(+233) 024 617 3282</a><br>
                            International: <a href="#" class="text-theme">(+233) 020 698 2464</a><br>
                            Email:
                            <a href="mailto:info@kindredghtechnologies.com" class="text-theme">
                                info@kindredghtechnologies.com
                            </a>
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <form action="" method="GET" name="form_contact_us">
                            <div class="row gy-3 mb-3">
                                <div class="col-6">
                                    <label class="form-label">First Name <span class="text-theme">*</span></label>
                                    <input type="text" class="form-control form-control-lg fs-15px">
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Last Name <span class="text-theme">*</span></label>
                                    <input type="text" class="form-control form-control-lg fs-15px">
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Email <span class="text-theme">*</span></label>
                                    <input type="text" class="form-control form-control-lg fs-15px">
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Phone <span class="text-theme">*</span></label>
                                    <input type="text" class="form-control form-control-lg fs-15px">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Message <span class="text-theme">*</span></label>
                                    <textarea class="form-control form-control-lg fs-15px" rows="8"></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-theme btn-lg btn-block px-4 fs-15px">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END #contact -->

        <!-- BEGIN #footer -->
        <div id="footer" class="py-5 bg-gray-800 text-body text-opacity-75" data-bs-theme="dark">
            <div class="container-xxl px-3 px-lg-5">
                <div class="row gx-lg-5 gx-3 gy-lg-4 gy-3">
                    <div class="col-lg-3 col-md-6">
                        <h5 class="mb-4">About Us</h5>
                        <p class="mb-4">
                            PrintForce is your go-to solution for creatives, designers and print studios. It's a stunning, responsive,
                            and high-performance web application. Inspired By Design, Built For Work
                        </p>
                        <h5>Follow Us</h5>
                        <div class="d-flex">
                            <a href="#" class="me-2 text-body text-opacity-50"><i class="fab fa-lg fa-facebook fa-fw"></i></a>
                            <a href="#" class="me-2 text-body text-opacity-50"><i class="fab fa-lg fa-instagram fa-fw"></i></a>
                            <a href="#" class="me-2 text-body text-opacity-50"><i class="fab fa-lg fa-twitter fa-fw"></i></a>
                            <a href="#" class="me-2 text-body text-opacity-50"><i class="fab fa-lg fa-youtube fa-fw"></i></a>
                            <a href="#" class="me-2 text-body text-opacity-50"><i class="fab fa-lg fa-linkedin fa-fw"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5>Quick Links</h5>
                        <ul class="list-unstyled">
                            <li class="mb-3px"><a href="#" class="text-decoration-none text-body text-opacity-75">Newsroom</a></li>
                            <li class="mb-3px"><a href="#" class="text-decoration-none text-body text-opacity-75">Company Info</a></li>
                            <li class="mb-3px"><a href="#" class="text-decoration-none text-body text-opacity-75">Careers</a></li>
                            <li class="mb-3px"><a href="#" class="text-decoration-none text-body text-opacity-75">For Investors</a></li>
                            <li class="mb-3px"><a href="#" class="text-decoration-none text-body text-opacity-75">Brand Resources</a></li>
                        </ul>
                        <hr class="text-body text-opacity-50">
                        <h5>Services</h5>
                        <ul class="list-unstyled">
                            <li class="mb-3px"><a href="#" class="text-decoration-none text-body text-opacity-75">Web Development</a></li>
                            <li class="mb-3px"><a href="#" class="text-decoration-none text-body text-opacity-75">App Development</a></li>
                            <li class="mb-3px"><a href="#" class="text-decoration-none text-body text-opacity-75">SEO</a></li>
                            <li class="mb-3px"><a href="#" class="text-decoration-none text-body text-opacity-75">Marketing</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5>Resources</h5>
                        <ul class="list-unstyled">
                            <li class="mb-3px"><a href="#" class="text-decoration-none text-body text-opacity-75">Documentation</a></li>
                            <li class="mb-3px"><a href="#" class="text-decoration-none text-body text-opacity-75">Support</a></li>
                            <li class="mb-3px"><a href="#" class="text-decoration-none text-body text-opacity-75">FAQs</a></li>
                            <li class="mb-3px"><a href="#" class="text-decoration-none text-body text-opacity-75">Community</a></li>
                            <li class="mb-3px"><a href="#" class="text-decoration-none text-body text-opacity-75">Tutorials</a></li>
                        </ul>
                        <hr class="text-body text-opacity-50">
                        <h5>Legal</h5>
                        <ul class="list-unstyled">
                            <li class="mb-3px"><a href="#" class="text-decoration-none text-body text-opacity-75">Privacy Policy</a></li>
                            <li class="mb-3px"><a href="#" class="text-decoration-none text-body text-opacity-75">Terms of Service</a></li>
                            <li class="mb-3px"><a href="#" class="text-decoration-none text-body text-opacity-75">Cookie Policy</a></li>
                            <li class="mb-3px"><a href="#" class="text-decoration-none text-body text-opacity-75">Compliance</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5>Help Center</h5>
                        <ul class="list-unstyled">
                            <li class="mb-3px"><a href="#" class="text-decoration-none text-body text-opacity-75">Contact Form</a></li>
                            <li class="mb-3px"><a href="#" class="text-decoration-none text-body text-opacity-75">Live Chat Support</a></li>
                            <li class="mb-3px"><a href="#" class="text-decoration-none text-body text-opacity-75">Portal Help Center</a></li>
                            <li class="mb-3px"><a href="#" class="text-decoration-none text-body text-opacity-75">Email Support</a></li>
                            <li class="mb-3px"><a href="#" class="text-decoration-none text-body text-opacity-75">Technical Documentation</a></li>
                            <li class="mb-3px"><a href="#" class="text-decoration-none text-body text-opacity-75">Service Updates</a></li>
                            <li class="mb-3px"><a href="#" class="text-decoration-none text-body text-opacity-75">Developer API</a></li>
                            <li class="mb-3px"><a href="#" class="text-decoration-none text-body text-opacity-75">Knowledge Base</a></li>
                        </ul>
                    </div>
                </div>
                <hr class="text-body text-opacity-50">
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-lg-0">
                        <div class="footer-copyright-text">&copy; {{ now()->format('Y') }} PrintForce All Rights Reserved</div>
                    </div>
                    <div class="col-sm-6 text-sm-end">
                        <div class="dropdown me-4 d-inline">
                            <a href="#" class="text-decoration-none dropdown-toggle text-body text-opacity-50" data-bs-toggle="dropdown">United States (English)</a>
                            <ul class="dropdown-menu">
                                <li><a href="#" class="dropdown-item">United States (English)</a></li>
                                <li><a href="#" class="dropdown-item">United Kingdom (English)</a></li>
                                <li><a href="#" class="dropdown-item">China (简体中文)</a></li>
                                <li><a href="#" class="dropdown-item">Brazil (Português)</a></li>
                                <li><a href="#" class="dropdown-item">Germany (Deutsch)</a></li>
                                <li><a href="#" class="dropdown-item">France (Français)</a></li>
                                <li><a href="#" class="dropdown-item">Japan (日本語)</a></li>
                                <li><a href="#" class="dropdown-item">Korea (한국어)</a></li>
                                <li><a href="#" class="dropdown-item">Latin America (Español)</a></li>
                                <li><a href="#" class="dropdown-item">Spain (Español)</a></li>
                            </ul>
                        </div>
                        <a href="#" class="text-decoration-none text-body text-opacity-50">Sitemap</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END #footer -->


    </div>
    <!-- END #app -->

    @include('auth.login-modal')

    <!-- ================== BEGIN core-js ================== -->
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('assets/js/vendor.min.js') }}" type="967f91c2a965fff459265cde-text/javascript"></script>
    <script src="{{ asset('assets/js/app.min.js') }}" type="967f91c2a965fff459265cde-text/javascript"></script>
    <script type="text/javascript" src={{ asset('assets/js/vendor.min.js') }}></script>
    <script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/email-decode.js') }}"></script>
    <!-- ================== END core-js ================== -->

    <!-- ================== BEGIN page-js ================== -->
    <script src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js" type="967f91c2a965fff459265cde-text/javascript"></script>
    <script src="assets/plugins/lity/dist/lity.min.js" type="967f91c2a965fff459265cde-text/javascript"></script>
    <!-- ================== END page-js ================== -->


    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Y3Q0VGQKY3" type="967f91c2a965fff459265cde-text/javascript"></script>
    <script type="967f91c2a965fff459265cde-text/javascript">
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-Y3Q0VGQKY3');
    </script>
    <script src="/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="967f91c2a965fff459265cde-|49" defer></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"8f85ee484b84bd98","version":"2024.10.5","r":1,"token":"4db8c6ef997743fda032d4f73cfeff63","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}}}' crossorigin="anonymous"></script>
</body>

</html>
