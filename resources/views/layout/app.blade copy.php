@include('layout.partials.header')

<body class="DEFAULT_THEME bg-white dark:bg-dark" data-sidebartype="full">
    <main>
        <div class="flex" id="main-wrapper">

            @include('layout.partials.application-sidebar')

        @include('layout.topnav')
        @include('layout.sidebar')

        <div class="page-wrapper w-full" role="main">
        <!--  Header Start -->
        <header class="sticky top-header top-0 inset-x-0 z-[1] flex flex-wrap md:justify-start md:flex-nowrap text-sm  bg-white dark:bg-dark ">
          <div class="with-vertical w-full"><div class="w-full mx-auto px-4 lg:py-1 py-3 lg:px-4" aria-label="Global">
  <div class="relative md:flex md:items-center md:justify-between">
    <div class="hs-collapse  grow md:block">
      <div class="flex justify-between items-center">
        <div class="flex items-center gap-2">
          <div class="flex lg:hidden w-10 md:w-full overflow-hidden"><div class="brand-logo flex  items-center ">
  <a href="../main/index.html" class="text-nowrap logo-img">
    <img src="../assets/images/logos/dark-logo.svg" class="dark:hidden block rtl:hidden !w-fit" alt="Logo-Dark">
    <img src="../assets/images/logos/light-logo.svg" class="dark:block hidden rtl:hidden rtl:dark:hidden !w-fit" alt="Logo-light">

    <img src="../assets/images/logos/dark-logo-rtl.svg" class="dark:hidden hidden rtl:block rtl:dark:hidden !w-fit" alt="Logo-Dark">
    <img src="../assets/images/logos/light-logo-rtl.svg" class="dark:hidden hidden rtl:hidden rtl:dark:block !w-fit" alt="Logo-light">
  </a>
</div>

          </div>
          <div class="relative">
            <a class="xl:flex hidden text-xl icon-hover cursor-pointer text-link dark:text-darklink sidebartoggler h-10 w-10 hover:text-primary light-dark-hoverbg  justify-center items-center rounded-full" id="headerCollapse" href="javascript:void(0)">
              <i class="ti ti-menu-2 relative z-[1] "></i>
            </a>
            <!--Mobile Sidebar Toggle -->
            <div class="sticky top-0 inset-x-0 xl:hidden">
              <div class="flex items-center">
                <!-- Navigation Toggle -->
                <a class="text-xl icon-hover cursor-pointer text-link dark:text-darklink sidebartoggler h-10 w-10 hover:text-primary light-dark-hoverbg flex justify-center items-center rounded-full" data-hs-overlay="#application-sidebar-brand" aria-controls="application-sidebar-brand" aria-label="Toggle navigation" aria-expanded="false">
                  <i class="ti ti-menu-2 relative z-[1] "></i>
                </a>
                <!-- End Navigation Toggle -->
              </div>
            </div>
            <!-- End Sidebar Toggle -->
          </div>

          <a class="hidden lg:flex relative hs-dropdown-toggle cursor-pointer text-xl hover:text-primary text-link dark:text-darklink h-10 w-10 light-dark-hoverbg  justify-center items-center rounded-full" data-hs-overlay="#hs-focus-management-modal" aria-expanded="false">
            <i class="ti ti-search relative"></i>
          </a>

          <div class="lg:hidden">
            <button type="button" class="p-2 inline-flex h-10 w-10 text-link dark:text-darklink hover:text-primary light-dark-hoverbg  justify-center items-center rounded-full" data-hs-overlay="#navbar-offcanvas-example-menu" aria-controls="navbar-offcanvas-example-menu" aria-label="Toggle navigation" aria-expanded="false">
              <i class="ti ti-apps text-xl"></i>
            </button>
          </div>

          <!-- Menu-->
          <div id="navbar-offcanvas-example" class="hs-overlay hs-overlay-open:translate-x-0 z-[2] -translate-x-full fixed top-0 start-0 transition-all duration-300 transform h-full max-w-xs bg-white dark:bg-dark  basis-full grow sm:order-1 lg:static lg:block lg:h-auto sm:max-w-none w-[270px] lg:border-r-transparent lg:transition-none lg:translate-x-0  lg:basis-auto hidden " tabindex="-1" data-hs-overlay-close-on-resize="">
            <div class="lg:flex gap-2  items-center ">
              <div class="flex lg:hidden lg:p-0 p-5"><div class="brand-logo flex  items-center ">
  <a href="../main/index.html" class="text-nowrap logo-img">
    <img src="../assets/images/logos/dark-logo.svg" class="dark:hidden block rtl:hidden !w-fit" alt="Logo-Dark">
    <img src="../assets/images/logos/light-logo.svg" class="dark:block hidden rtl:hidden rtl:dark:hidden !w-fit" alt="Logo-light">

    <img src="../assets/images/logos/dark-logo-rtl.svg" class="dark:hidden hidden rtl:block rtl:dark:hidden !w-fit" alt="Logo-Dark">
    <img src="../assets/images/logos/light-logo-rtl.svg" class="dark:hidden hidden rtl:hidden rtl:dark:block !w-fit" alt="Logo-light">
  </a>
</div>

              </div>
              <div class="lg:p-0 p-5 lg:flex gap-2 items-center">
                <div class="lg:flex items-center">
                  <div class="hs-dropdown lg:py-4  [--strategy:static] lg:[--strategy:absolute] [--adaptive:none] sm:[--trigger:hover] relative group/menu">
            <button type="button" class="header-link-btn group-hover/menu:bg-lightprimary group-hover/menu:text-primary">
                <i class="ti ti-api-app lg:hidden lg:text-sm text-xl"></i>Apps
                <i class="ti ti-chevron-down  ms-auto lg:text-sm text-lg"></i>
            </button>

            <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] sm:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 left-0 hidden z-10 sm:mt-3 top-full start-0 min-w-[15rem] lg:w-[900px] before:absolute lg:bg-white bg-transparent dark:bg-dark lg:shadow-md shadow-none" role="menu">
                <div class="grid grid-cols-12">
                    <div class="lg:col-span-8 col-span-12 flex items-stretch lg:px-5 lg:pr-0 px-0 py-5">
                        <div class="grid grid-cols-12 lg:gap-3 w-full">
                            <div class="col-span-12 lg:col-span-6 flex items-stretch">
                                <ul>
                                    <li class="mb-5">
                                        <a href="../main/app-chat.html" class="flex gap-3 items-center  group relative">
                                            <span class="apps-icons">
                                                <img src="../assets/images/svgs/icon-dd-chat.svg" class="h-6 w-6">
                                            </span>
                                            <div class="">
                                                <h6 class="font-semibold text-sm group-hover:text-primary">
                                                    Chat Application
                                                </h6>
                                                <p class="text-xs">
                                                    New messages arrived</p>
                                            </div>

                                        </a>
                                    </li>
                                    <li class="mb-5">
                                        <a href="../main/page-user-profile.html" class="flex gap-3 items-center  group relative">
                                            <span class="apps-icons">
                                                <img src="../assets/images/svgs/icon-dd-invoice.svg" class="h-6 w-6">
                                            </span>
                                            <div class="">
                                                <h6 class="font-semibold text-sm group-hover:text-primary ">
                                                    User Profile App
                                                </h6>
                                                <p class="text-xs">
                                                    Get profile details</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mb-5">
                                        <a href="../main/app-contact.html" class="flex gap-3 items-center group relative">
                                            <span class="apps-icons">
                                                <img src="../assets/images/svgs/icon-dd-mobile.svg" class="h-6 w-6">
                                            </span>
                                            <div class="">
                                                <h6 class="font-semibold text-sm group-hover:text-primary">
                                                    Contact Application
                                                </h6>
                                                <p class="text-xs">
                                                    2 Unsaved Contacts</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mb-5">
                                        <a href="../main/app-email.html" class="flex gap-3 items-center group relative">
                                            <span class="apps-icons">
                                                <img src="../assets/images/svgs/icon-dd-message-box.svg" class="h-6 w-6">
                                            </span>
                                            <div class="">
                                                <h6 class="font-semibold text-sm group-hover:text-primary">
                                                    Email App
                                                </h6>
                                                <p class="text-xs">
                                                    Get new emails</p>
                                            </div>

                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-span-12 lg:col-span-6 flex items-stretch">
                                <ul>
                                    <li class="mb-5">
                                        <a href="../main/eco-shop.html" class="flex gap-3 items-center  group relative">
                                            <span class="apps-icons">
                                                <img src="../assets/images/svgs/icon-dd-cart.svg" class="h-6 w-6">
                                            </span>
                                            <div class="">
                                                <h6 class="font-semibold text-sm group-hover:text-primary">
                                                    eCommerce App

                                                </h6>
                                                <p class="text-xs">
                                                    learn more information</p>
                                            </div>


                                        </a>
                                    </li>
                                    <li class="mb-5">
                                        <a href="../main/app-calendar.html" class="flex gap-3 items-center group relative">
                                            <span class="apps-icons">
                                                <img src="../assets/images/svgs/icon-dd-mobile.svg" class="h-6 w-6">
                                            </span>
                                            <div class="">
                                                <h6 class="font-semibold text-sm group-hover:text-primary">
                                                    Calendar App
                                                </h6>
                                                <p class="text-xs">
                                                    Get dates</p>
                                            </div>


                                        </a>
                                    </li>
                                    <li class="mb-5">
                                        <a href="../main/page-account-settings.html" class="flex gap-3 items-center  group relative">
                                            <span class="apps-icons">
                                                <img src="../assets/images/svgs/icon-dd-lifebuoy.svg" class="h-6 w-6">
                                            </span>
                                            <div class="">
                                                <h6 class="font-semibold text-sm group-hover:text-primary ">
                                                    Account Setting App

                                                </h6>
                                                <p class="text-xs">
                                                    Account settings</p>
                                            </div>

                                        </a>
                                    </li>
                                    <li class="mb-5">
                                        <a href="../main/app-notes.html" class="flex gap-3 items-center group relative">
                                            <span class="apps-icons">
                                                <img src="../assets/images/svgs/icon-dd-application.svg" class="h-6 w-6">
                                            </span>
                                            <div class="">
                                                <h6 class="font-semibold text-sm group-hover:text-primary">
                                                    Notes Application

                                                </h6>
                                                <p class="text-xs">
                                                    To-do and Daily tasks</p>
                                            </div>

                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-span-12 md:col-span-12 border-t border-border dark:border-darkborder hidden lg:flex items-stretch pt-4 pr-4">
                                <div class="flex items-center justify-between w-full ">
                                    <div class="flex items-center text-dark dark:text-white group">
                                        <i class="ti ti-help text-lg text-dark dark:text-darklink group-hover:text-primary"></i>
                                        <a href="../main/page-faq.html" class="text-sm font-bold text-dark dark:text-darklink hover:text-primary  ml-2 group-hover:text-primary">
                                            Frequently Asked Questions
                                        </a>
                                    </div>
                                    <button type="button" class="btn py-2 px-4 ">
                                        Check
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lg:col-span-4 col-span-12  flex items-strech">
                        <div class="lg:p-5 lg:border-s border-border dark:border-darkborder">
                            <h5 class="text-xl font-semibold mb-4 text-dark dark:text-white">
                                Quick Links</h5>
                            <ul>
                                <li class="mb-4"><a href="../main/page-pricing.html" class="card-title text-sm hover:text-primary">Pricing
                                        Page</a></li>
                                <li class="mb-4"><a href="../main/authentication-login.html" class="card-title text-sm hover:text-primary">Authentication
                                        Design</a></li>
                                <li class="mb-4"><a href="../main/authentication-register.html" class="card-title text-sm hover:text-primary">Register
                                        Now</a></li>
                                <li class="mb-4"><a href="../main/authentication-error.html" class="card-title text-sm hover:text-primary">404
                                        Error
                                        Page</a></li>
                                <li class="mb-4"><a href="../main/app-notes.html" class="card-title text-sm hover:text-primary">Notes
                                        App</a>
                                </li>
                                <li class="mb-4"><a href="../main/page-user-profile.html" class="card-title text-sm hover:text-primary">User
                                        Application</a></li>
                                <li class="mb-4"><a href="../main/blog-posts.html" class="card-title text-sm hover:text-primary">Blog
                                        Design</a></li>
                                <li class="mb-4"><a href="../main/eco-checkout.html" class="card-title text-sm hover:text-primary">Shopping
                                        Cart</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
          </div>
                </div>
                <div>
                  <a href="../main/app-chat.html" class="header-link-btn dark:hover:text-primary">
                    <i class="ti ti-message-dots lg:hidden lg:text-sm text-xl"></i>Chat</a>
                </div>
                <div>
                  <a href="../main/app-calendar.html" class="header-link-btn dark:hover:text-primary">
                    <i class="ti ti-calendar lg:hidden lg:text-sm text-xl"></i>Calender</a>
                </div>
                <div>
                  <a href="../main/app-email.html" class="header-link-btn dark:hover:text-primary">
                    <i class="ti ti-mail lg:hidden lg:text-sm text-xl"></i>Email</a>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="icon-nav items-center gap-3 lg:gap-4 flex">
          <!-- Theme Toggle  -->
          <button type="button" class="hs-dark-mode-active:hidden icon-hover block hs-dark-mode group items-center font-medium hover:text-primary text-link dark:text-darklink h-10 w-10 light-dark-hoverbg  justify-center rounded-full" data-hs-theme-click-value="dark" id="dark-layout">
            <i class="ti ti-moon text-xl  text-link dark:text-darklink relative  hover:text-primary"></i>
          </button>
          <button type="button" class="hs-dark-mode-active:block icon-hover hidden hs-dark-mode group  items-center  font-medium hover:text-primary text-link dark:text-darklink h-10 w-10 light-dark-hoverbg  justify-center rounded-full" data-hs-theme-click-value="light" id="light-layout">
            <i class="ti ti-sun text-xl  text-link dark:text-darklink relative  hover:text-primary"></i>
          </button>

          <!-- Language DD -->
          <div class="hs-dropdown [--strategy:absolute] [--adaptive:none] sm:[--trigger:hover] sm:relative sm:block hidden group/menu">
    <a id="hs-dropdown-hover-event-lang" class="relative hs-dropdown-toggle icon-hover cursor-pointer h-10 w-10  light-dark-hoverbg flex justify-center items-center rounded-full group-hover/menu:bg-lightprimary group-hover/menu:text-primary">
        <img src="../assets/images/svgs/icon-flag-en.svg" alt="language" class="object-cover !w-5 !h-5 rounded-full relative z-[1]">
    </a>

    <div aria-labelledby="hs-dropdown-hover-event-lang" class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] sm:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 right-0 rtl:right-auto rtl:left-0 hidden z-10 sm:mt-3 top-auto w-full sm:w-[250px] before:absolute" role="menu">
        <div class="message-body max-h-[200px]">
            <a href="javascript:void(0)" class="dropdown-item px-5 py-3 flex items-center light-dark-hoverbg">
                <div class="flex gap-3 items-center">
                    <span class="flex-shrink-0">
                        <img src="../assets/images/svgs/icon-flag-en.svg" alt="user" class="object-cover !w-5 !h-5 rounded-full">
                    </span>
                    <span class="text-sm block font-normal  text-link dark:text-darklink">English</span>
                </div>
            </a>

            <a href="javascript:void(0)" class="dropdown-item px-5 py-3 flex items-center light-dark-hoverbg">
                <div class="flex gap-3 items-center">
                    <span class="flex-shrink-0">
                        <img src="../assets/images/svgs/icon-flag-cn.svg" alt="user" class="object-cover !w-5 !h-5 rounded-full">
                    </span>
                    <span class="text-sm block font-normal  text-link dark:text-darklink">Chinese</span>
                </div>
            </a>
            <a href="javascript:void(0)" class="dropdown-item px-5 py-3 flex items-center light-dark-hoverbg">
                <div class="flex gap-3 items-center">
                    <span class="flex-shrink-0">
                        <img src="../assets/images/svgs/icon-flag-fr.svg" alt="user" class="object-cover !w-5 !h-5 rounded-full">
                    </span>
                    <span class="text-sm block font-normal  text-link dark:text-darklink">French</span>
                </div>
            </a>
            <a href="javascript:void(0)" class="dropdown-item px-5 py-3 flex items-center light-dark-hoverbg">
                <div class="flex gap-3 items-center">
                    <span class="flex-shrink-0">
                        <img src="../assets/images/svgs/icon-flag-sa.svg" alt="user" class="object-cover !w-5 !h-5 rounded-full">
                    </span>
                    <span class="text-sm block font-normal  text-link dark:text-darklink">Arabic</span>
                </div>
            </a>
        </div>
    </div>
</div>

          <!-- Cart Canvas-->
          <a href="#" class="rounded-full icon-hover h-10 w-10 flex justify-center text-link dark:text-darklink items-center hover:text-primary  relative light-dark-hoverbg " data-hs-overlay="#hs-overlay-right-cart" aria-expanded="false">
            <i class="ti ti-basket text-xl relative "></i>
            <div class="absolute inline-flex items-center justify-center w-5 h-5 text-white text-[11px] font-medium  bg-error  rounded-full -top-0 md:-top-[0px] sm:-top-[0px] -right-1">
              2</div>
          </a>
          <!-- Notifications DD -->

<div class="hs-dropdown [--strategy:absolute] [--adaptive:none] sm:[--trigger:hover] sm:relative group/menu">
    <a id="hs-dropdown-hover-event-notification" class="relative hs-dropdown-toggle h-10 w-10 text-link dark:text-darklink cursor-pointer hover:bg-lightprimary  hover:text-primary dark:hover:bg-darkprimary flex justify-center items-center rounded-full group-hover/menu:bg-lightprimary group-hover/menu:text-primary">
        <i class="ti ti-bell-ringing text-xl relative z-[1]"></i>
        <div class="absolute inline-flex items-center justify-center  text-white text-[11px] font-medium  bg-primary p-[5px] rounded-full -top-[-5px] -right-[0px]">
        </div>
    </a>
    <div class="card hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 right-0 rtl:right-auto rtl:left-0 mt-2 min-w-max top-auto w-full sm:w-[360px] hidden z-[2]" aria-labelledby="hs-dropdown-hover-event-notification" role="menu">
        <div class="flex items-center py-4 px-7 justify-between">
            <h3 class="mb-0 card-title">
                Notifications</h3>
            <span class="text-xs badge-md bg-primary text-white">5
                new</span>
        </div>
        <div class="message-body max-h-[350px]" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;"><div class="simplebar-content" style="padding: 0px;">
            <a href="javascript:void(0)" class="px-7 py-3 flex items-center light-dark-hoverbg">
                <span class="flex-shrink-0 h-12 w-12 rounded-full bg-lightprimary dark:bg-darkprimary flex justify-center items-center">
                <i class="ti ti-dashboard text-primary text-xl"></i>
                </span>
                <div class="ps-4">
                    <h5 class="text-sm">
                        Launch Admin
                    </h5>
                    <span>Just see the my new
                        admin!</span>
                </div>
            </a>
            <a href="javascript:void(0)" class="px-7 py-3 flex items-center light-dark-hoverbg">
                <span class="flex-shrink-0 h-12 w-12 rounded-full bg-lighterror dark:bg-darkerror flex justify-center items-center">
                <i class="ti ti-screen-share text-error text-xl"></i>
                </span>
                <div class="ps-4">
                    <h5 class="text-sm">
                        Meeting Today
                    </h5>
                    <span>Check your schedule</span>
                </div>
            </a>
            <a href="javascript:void(0)" class="px-7 py-3 flex items-center light-dark-hoverbg">
                <span class="flex-shrink-0 h-12 w-12 rounded-full bg-lightsuccess dark:bg-darksuccess flex justify-center items-center">
                <i class="ti ti-coin text-success text-xl"></i>
                </span>
                <div class="ps-4">
                    <h5 class="text-sm">
                        New Payment received
                    </h5>
                    <span>Check
                        your
                        earnings</span>
                </div>
            </a>
            <a href="javascript:void(0)" class="px-7 py-3 flex items-center light-dark-hoverbg">
                <span class="flex-shrink-0 h-12 w-12 rounded-full bg-lightwarning dark:bg-darkwarning flex justify-center items-center">
                <i class="ti ti-credit-card text-warning text-xl"></i>
                </span>
                <div class="ps-4">
                    <h5 class="text-sm">
                        Pay Bills
                    </h5>
                    <span>Just a reminder that you have pay</span>
                </div>
            </a>
            <a href="javascript:void(0)" class="px-7 py-3 flex items-center light-dark-hoverbg">
                <span class="flex-shrink-0 h-12 w-12 rounded-full bg-lightinfo dark:bg-darkinfo flex justify-center items-center">
                <i class="ti ti-calendar-month text-info text-xl font-thin"></i>
                </span>
                <div class="ps-4">
                    <h5 class="text-sm">
                        Go for Event
                    </h5>
                    <span>Just a reminder for
                        event</span>
                </div>
            </a>
        </div></div></div></div><div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none;"></div></div></div>
        <div class="pt-3 pb-6 px-7">
            <a href="#" class="btn btn-outline-primary block w-full">
                See All Notifications
            </a>
        </div>
    </div>
</div>
          <!-- Profile DD -->
          <div class="hs-dropdown [--strategy:absolute] [--adaptive:none] [--placement:top-left] sm:[--trigger:hover] sm:relative group/menu">
    <a id="hs-dropdown-hover-event-profile" class="relative hs-dropdown-toggle cursor-pointer align-middle rounded-full group-hover/menu:bg-lightprimary group-hover/menu:text-primary">
        <img class="object-cover w-9 h-9 rounded-full" src="../assets/images/profile/user-1.jpg" alt="" aria-hidden="true">
    </a>
    <div class="card hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 mt-2 min-w-max top-auto right-0 rtl:right-auto rtl:left-0 w-full sm:w-[360px] hidden z-[2]" aria-labelledby="hs-dropdown-hover-event-profile" role="menu">
        <div class="card-body">
            <div class="flex items-center pb-4 justify-between">
                <h3 class="mb-0 card-title">User
                    Profile</h3>
            </div>
            <div class="message-body max-h-[450px]" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;"><div class="simplebar-content" style="padding: 0px;">
                <div class="">
                    <div class="flex items-center">
                        <img src="../assets/images/profile/user-1.jpg" class="h-20 w-20 rounded-full object-cover" alt="profile">
                        <div class="ml-4 rtl:mr-4 rtl:ml-auto">
                            <h5 class="text-base">
                                Mathew Anderson
                            </h5>
                            <p class="text-xs font-normal text-link dark:text-darklink ">
                                Designer</p>
                            <span class="text-sm font-normal flex items-center text-link dark:text-darklink">
                                <i class="ti ti-mail mr-2"></i>
                                <span>info@modernize.com</span>
                            </span>
                        </div>
                    </div>

                    <ul class="mt-10">
                        <li class="mb-5">
                            <a href="../main/page-user-profile.html" class="flex gap-3 items-center group">
                                <span class="bg-lightgray dark:bg-darkgray    h-12 w-12 flex justify-center items-center rounded-md">
                                    <img src="../assets/images/svgs/icon-account.svg" class="h-6 w-6">
                                </span>

                                <div class="">
                                    <h6 class="text-sm mb-1  group-hover:text-primary">
                                        My Profile
                                    </h6>
                                    <p class="text-xs text-link dark:text-darklink font-normal">
                                        Account settings</p>
                                </div>
                            </a>
                        </li>
                        <li class="mb-5">
                            <a href="../main/app-email.html" class="flex gap-3 items-center  group">
                                <span class="bg-lightgray dark:bg-darkgray    h-12 w-12 flex justify-center items-center rounded-md">
                                    <img src="../assets/images/svgs/icon-inbox.svg" class="h-6 w-6">
                                </span>
                                <div class="">
                                    <h6 class="fext-sm mb-1  group-hover:text-primary ">
                                        My Inbox
                                    </h6>
                                    <p class="text-xs text-link dark:text-darklink font-normal">
                                        Messages &amp;
                                        Emails</p>
                                </div>
                            </a>
                        </li>
                        <li class="mb-5">
                            <a href="../main/app-kanban.html" class="flex gap-3 items-center group ">
                                <span class="bg-lightgray dark:bg-darkgray    h-12 w-12 flex justify-center items-center rounded-md">
                                    <img src="../assets/images/svgs/icon-tasks.svg" class="h-6 w-6">
                                </span>
                                <div class="">
                                    <h6 class="fext-sm mb-1  group-hover:text-primary ">
                                        My Tasks
                                    </h6>
                                    <p class="text-xs text-link dark:text-darklink font-normal">
                                        To-do and Daily
                                        tasks</p>
                                </div>
                            </a>
                        </li>
                    </ul>

                    <div class="p-5 rounded-md bg-lightprimary dark:bg-darkprimary overflow-hidden relative">
                        <h5 class="text-base leading-4 ">
                            Unlimited<br>
                            Access
                        </h5>
                        <button type="button" class="btn btn-md mt-4">
                            Upgrade
                        </button>
                        <img src="../assets/images/backgrounds/unlimited-bg.png" alt="bg-img" class="absolute right-0 top-0">
                    </div>
                </div>
            </div></div></div></div><div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none;"></div></div></div>
            <div class="mt-5">
                <a href="../main/authentication-login.html" class="btn btn-outline-primary block w-full">
                    Logout
                </a>
            </div>
        </div>
    </div>
</div>
        </div>
      </div>
    </div>
  </div>

</div></div>
          <div class="with-horizontal w-full">
            <div class="bg-white dark:bg-dark shadow-md dark:shadow-dark-md">
              <div class="container">
                <div class="w-full mx-auto">
    <div class="relative md:flex md:items-center md:justify-between">
        <div class="hs-collapse  grow md:block">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-2">
                    <div class="flex  w-10 md:w-full overflow-hidden"><div class="brand-logo flex  items-center ">
  <a href="../main/index.html" class="text-nowrap logo-img">
    <img src="../assets/images/logos/dark-logo.svg" class="dark:hidden block rtl:hidden !w-fit" alt="Logo-Dark">
    <img src="../assets/images/logos/light-logo.svg" class="dark:block hidden rtl:hidden rtl:dark:hidden !w-fit" alt="Logo-light">

    <img src="../assets/images/logos/dark-logo-rtl.svg" class="dark:hidden hidden rtl:block rtl:dark:hidden !w-fit" alt="Logo-Dark">
    <img src="../assets/images/logos/light-logo-rtl.svg" class="dark:hidden hidden rtl:hidden rtl:dark:block !w-fit" alt="Logo-light">
  </a>
</div>

                    </div>
                    <div class="relative">
                        <!--Mobile Sidebar Toggle -->
                        <div class="sticky top-0 inset-x-0 xl:hidden">
                            <div class="flex items-center">
                                <!-- Navigation Toggle -->
                                <a class="text-xl icon-hover cursor-pointer text-link dark:text-darklink sidebartoggler h-10 w-10 hover:text-primary light-dark-hoverbg flex justify-center items-center rounded-full" data-hs-overlay="#application-sidebar-brand" aria-controls="application-sidebar-brand" aria-label="Toggle navigation" aria-expanded="false">
                                    <i class="ti ti-menu-2 relative z-[1] "></i>
                                </a>
                                <!-- End Navigation Toggle -->
                            </div>
                        </div>
                        <!-- End Sidebar Toggle -->
                    </div>
                    <div>
                        <a class="hidden lg:flex relative hs-dropdown-toggle cursor-pointer text-xl hover:text-primary text-link dark:text-darklink h-10 w-10 light-dark-hoverbg  justify-center items-center rounded-full" data-hs-overlay="#hs-focus-management-modal" aria-expanded="false">
                            <i class="ti ti-search relative"></i>
                        </a>
                    </div>
                    <div class="lg:hidden">
                        <button type="button" class="p-2 inline-flex h-10 w-10 text-link dark:text-darklink hover:text-primary light-dark-hoverbg  justify-center items-center rounded-full" data-hs-overlay="#navbar-offcanvas-example-menu" aria-controls="navbar-offcanvas-example-menu" aria-label="Toggle navigation" aria-expanded="false">
                            <i class="ti ti-apps text-xl"></i>
                        </button>
                    </div>


                    <!-- Menu-->
                    <div id="navbar-offcanvas-example" class="hs-overlay hs-overlay-open:translate-x-0 z-[2] -translate-x-full fixed top-0 start-0 transition-all duration-300 transform h-full max-w-xs bg-white dark:bg-dark  basis-full grow sm:order-1 lg:static lg:block lg:h-auto sm:max-w-none w-[270px] lg:border-r-transparent lg:transition-none lg:translate-x-0  lg:basis-auto hidden " tabindex="-1" data-hs-overlay-close-on-resize="">
                        <div class="lg:flex gap-2  items-center ">
                            <div class="flex lg:hidden lg:p-0 p-5"><div class="brand-logo flex  items-center ">
  <a href="../main/index.html" class="text-nowrap logo-img">
    <img src="../assets/images/logos/dark-logo.svg" class="dark:hidden block rtl:hidden !w-fit" alt="Logo-Dark">
    <img src="../assets/images/logos/light-logo.svg" class="dark:block hidden rtl:hidden rtl:dark:hidden !w-fit" alt="Logo-light">

    <img src="../assets/images/logos/dark-logo-rtl.svg" class="dark:hidden hidden rtl:block rtl:dark:hidden !w-fit" alt="Logo-Dark">
    <img src="../assets/images/logos/light-logo-rtl.svg" class="dark:hidden hidden rtl:hidden rtl:dark:block !w-fit" alt="Logo-light">
  </a>
</div>

                            </div>
                            <div class="lg:p-0 p-5 lg:flex gap-2 items-center">
                                <div class="lg:flex items-center">
                                    <div class="hs-dropdown lg:py-4  [--strategy:static] lg:[--strategy:absolute] [--adaptive:none] sm:[--trigger:hover] relative group/menu">
            <button type="button" class="header-link-btn group-hover/menu:bg-lightprimary group-hover/menu:text-primary">
                <i class="ti ti-api-app lg:hidden lg:text-sm text-xl"></i>Apps
                <i class="ti ti-chevron-down  ms-auto lg:text-sm text-lg"></i>
            </button>

            <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] sm:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 left-0 hidden z-10 sm:mt-3 top-full start-0 min-w-[15rem] lg:w-[900px] before:absolute lg:bg-white bg-transparent dark:bg-dark lg:shadow-md shadow-none" role="menu">
                <div class="grid grid-cols-12">
                    <div class="lg:col-span-8 col-span-12 flex items-stretch lg:px-5 lg:pr-0 px-0 py-5">
                        <div class="grid grid-cols-12 lg:gap-3 w-full">
                            <div class="col-span-12 lg:col-span-6 flex items-stretch">
                                <ul>
                                    <li class="mb-5">
                                        <a href="../main/app-chat.html" class="flex gap-3 items-center  group relative">
                                            <span class="apps-icons">
                                                <img src="../assets/images/svgs/icon-dd-chat.svg" class="h-6 w-6">
                                            </span>
                                            <div class="">
                                                <h6 class="font-semibold text-sm group-hover:text-primary">
                                                    Chat Application
                                                </h6>
                                                <p class="text-xs">
                                                    New messages arrived</p>
                                            </div>

                                        </a>
                                    </li>
                                    <li class="mb-5">
                                        <a href="../main/page-user-profile.html" class="flex gap-3 items-center  group relative">
                                            <span class="apps-icons">
                                                <img src="../assets/images/svgs/icon-dd-invoice.svg" class="h-6 w-6">
                                            </span>
                                            <div class="">
                                                <h6 class="font-semibold text-sm group-hover:text-primary ">
                                                    User Profile App
                                                </h6>
                                                <p class="text-xs">
                                                    Get profile details</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mb-5">
                                        <a href="../main/app-contact.html" class="flex gap-3 items-center group relative">
                                            <span class="apps-icons">
                                                <img src="../assets/images/svgs/icon-dd-mobile.svg" class="h-6 w-6">
                                            </span>
                                            <div class="">
                                                <h6 class="font-semibold text-sm group-hover:text-primary">
                                                    Contact Application
                                                </h6>
                                                <p class="text-xs">
                                                    2 Unsaved Contacts</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="mb-5">
                                        <a href="../main/app-email.html" class="flex gap-3 items-center group relative">
                                            <span class="apps-icons">
                                                <img src="../assets/images/svgs/icon-dd-message-box.svg" class="h-6 w-6">
                                            </span>
                                            <div class="">
                                                <h6 class="font-semibold text-sm group-hover:text-primary">
                                                    Email App
                                                </h6>
                                                <p class="text-xs">
                                                    Get new emails</p>
                                            </div>

                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-span-12 lg:col-span-6 flex items-stretch">
                                <ul>
                                    <li class="mb-5">
                                        <a href="../main/eco-shop.html" class="flex gap-3 items-center  group relative">
                                            <span class="apps-icons">
                                                <img src="../assets/images/svgs/icon-dd-cart.svg" class="h-6 w-6">
                                            </span>
                                            <div class="">
                                                <h6 class="font-semibold text-sm group-hover:text-primary">
                                                    eCommerce App

                                                </h6>
                                                <p class="text-xs">
                                                    learn more information</p>
                                            </div>


                                        </a>
                                    </li>
                                    <li class="mb-5">
                                        <a href="../main/app-calendar.html" class="flex gap-3 items-center group relative">
                                            <span class="apps-icons">
                                                <img src="../assets/images/svgs/icon-dd-mobile.svg" class="h-6 w-6">
                                            </span>
                                            <div class="">
                                                <h6 class="font-semibold text-sm group-hover:text-primary">
                                                    Calendar App
                                                </h6>
                                                <p class="text-xs">
                                                    Get dates</p>
                                            </div>


                                        </a>
                                    </li>
                                    <li class="mb-5">
                                        <a href="../main/page-account-settings.html" class="flex gap-3 items-center  group relative">
                                            <span class="apps-icons">
                                                <img src="../assets/images/svgs/icon-dd-lifebuoy.svg" class="h-6 w-6">
                                            </span>
                                            <div class="">
                                                <h6 class="font-semibold text-sm group-hover:text-primary ">
                                                    Account Setting App

                                                </h6>
                                                <p class="text-xs">
                                                    Account settings</p>
                                            </div>

                                        </a>
                                    </li>
                                    <li class="mb-5">
                                        <a href="../main/app-notes.html" class="flex gap-3 items-center group relative">
                                            <span class="apps-icons">
                                                <img src="../assets/images/svgs/icon-dd-application.svg" class="h-6 w-6">
                                            </span>
                                            <div class="">
                                                <h6 class="font-semibold text-sm group-hover:text-primary">
                                                    Notes Application

                                                </h6>
                                                <p class="text-xs">
                                                    To-do and Daily tasks</p>
                                            </div>

                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-span-12 md:col-span-12 border-t border-border dark:border-darkborder hidden lg:flex items-stretch pt-4 pr-4">
                                <div class="flex items-center justify-between w-full ">
                                    <div class="flex items-center text-dark dark:text-white group">
                                        <i class="ti ti-help text-lg text-dark dark:text-darklink group-hover:text-primary"></i>
                                        <a href="../main/page-faq.html" class="text-sm font-bold text-dark dark:text-darklink hover:text-primary  ml-2 group-hover:text-primary">
                                            Frequently Asked Questions
                                        </a>
                                    </div>
                                    <button type="button" class="btn py-2 px-4 ">
                                        Check
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lg:col-span-4 col-span-12  flex items-strech">
                        <div class="lg:p-5 lg:border-s border-border dark:border-darkborder">
                            <h5 class="text-xl font-semibold mb-4 text-dark dark:text-white">
                                Quick Links</h5>
                            <ul>
                                <li class="mb-4"><a href="../main/page-pricing.html" class="card-title text-sm hover:text-primary">Pricing
                                        Page</a></li>
                                <li class="mb-4"><a href="../main/authentication-login.html" class="card-title text-sm hover:text-primary">Authentication
                                        Design</a></li>
                                <li class="mb-4"><a href="../main/authentication-register.html" class="card-title text-sm hover:text-primary">Register
                                        Now</a></li>
                                <li class="mb-4"><a href="../main/authentication-error.html" class="card-title text-sm hover:text-primary">404
                                        Error
                                        Page</a></li>
                                <li class="mb-4"><a href="../main/app-notes.html" class="card-title text-sm hover:text-primary">Notes
                                        App</a>
                                </li>
                                <li class="mb-4"><a href="../main/page-user-profile.html" class="card-title text-sm hover:text-primary">User
                                        Application</a></li>
                                <li class="mb-4"><a href="../main/blog-posts.html" class="card-title text-sm hover:text-primary">Blog
                                        Design</a></li>
                                <li class="mb-4"><a href="../main/eco-checkout.html" class="card-title text-sm hover:text-primary">Shopping
                                        Cart</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
          </div>
                                </div>
                                <div>
                                    <a href="#" class="lg:w-auto w-full lg:py-1 lg:px-3 py-2 px-3 lg:text-sm text-md flex  lg:gap-0 gap-3 header-link text-link dark:text-darklink  items-center hover:text-primary light-dark-hoverbg  rounded-md">
                                        <i class="ti ti-message-dots lg:hidden lg:text-sm text-xl"></i>Chat</a>
                                </div>
                                <div>
                                    <a href="#" class="lg:w-auto w-full lg:py-1 lg:px-3 py-2 px-3 lg:text-sm text-md flex  lg:gap-0 gap-3  header-link text-link dark:text-darklink  items-center hover:text-primary light-dark-hoverbg  rounded-md">
                                        <i class="ti ti-calendar lg:hidden lg:text-sm text-xl"></i>Calender</a>
                                </div>
                                <div>
                                    <a href="#" class="lg:w-auto w-full lg:py-1 lg:px-3 py-2 px-3 lg:text-sm text-md flex  lg:gap-0 gap-3   header-link text-link dark:text-darklink  items-center hover:text-primary light-dark-hoverbg rounded-md">
                                        <i class="ti ti-mail lg:hidden lg:text-sm text-xl"></i>Email</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="icon-nav items-center gap-3 lg:gap-4 flex">
                    <!-- Theme Toggle  -->
                    <button type="button" class="hs-dark-mode-active:hidden icon-hover block hs-dark-mode group items-center font-medium hover:text-primary text-link dark:text-darklink h-10 w-10 light-dark-hoverbg  justify-center rounded-full" data-hs-theme-click-value="dark" id="dark-layout-h">
                        <i class="ti ti-moon text-xl  text-link dark:text-darklink relative  hover:text-primary"></i>
                    </button>
                    <button type="button" class="hs-dark-mode-active:block icon-hover hidden hs-dark-mode group  items-center  font-medium hover:text-primary text-link dark:text-darklink h-10 w-10 light-dark-hoverbg  justify-center rounded-full" data-hs-theme-click-value="light" id="light-layout-h">
                        <i class="ti ti-sun text-xl  text-link dark:text-darklink relative  hover:text-primary"></i>
                    </button>

                    <!-- Language DD -->
                    <div class="hs-dropdown [--strategy:absolute] [--adaptive:none] sm:[--trigger:hover] sm:relative sm:block hidden group/menu">
    <a id="hs-dropdown-hover-event-lang" class="relative hs-dropdown-toggle icon-hover cursor-pointer h-10 w-10  light-dark-hoverbg flex justify-center items-center rounded-full group-hover/menu:bg-lightprimary group-hover/menu:text-primary">
        <img src="../assets/images/svgs/icon-flag-en.svg" alt="language" class="object-cover !w-5 !h-5 rounded-full relative z-[1]">
    </a>

    <div aria-labelledby="hs-dropdown-hover-event-lang" class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] sm:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 right-0 rtl:right-auto rtl:left-0 hidden z-10 sm:mt-3 top-auto w-full sm:w-[250px] before:absolute" role="menu">
        <div class="message-body max-h-[200px]">
            <a href="javascript:void(0)" class="dropdown-item px-5 py-3 flex items-center light-dark-hoverbg">
                <div class="flex gap-3 items-center">
                    <span class="flex-shrink-0">
                        <img src="../assets/images/svgs/icon-flag-en.svg" alt="user" class="object-cover !w-5 !h-5 rounded-full">
                    </span>
                    <span class="text-sm block font-normal  text-link dark:text-darklink">English</span>
                </div>
            </a>

            <a href="javascript:void(0)" class="dropdown-item px-5 py-3 flex items-center light-dark-hoverbg">
                <div class="flex gap-3 items-center">
                    <span class="flex-shrink-0">
                        <img src="../assets/images/svgs/icon-flag-cn.svg" alt="user" class="object-cover !w-5 !h-5 rounded-full">
                    </span>
                    <span class="text-sm block font-normal  text-link dark:text-darklink">Chinese</span>
                </div>
            </a>
            <a href="javascript:void(0)" class="dropdown-item px-5 py-3 flex items-center light-dark-hoverbg">
                <div class="flex gap-3 items-center">
                    <span class="flex-shrink-0">
                        <img src="../assets/images/svgs/icon-flag-fr.svg" alt="user" class="object-cover !w-5 !h-5 rounded-full">
                    </span>
                    <span class="text-sm block font-normal  text-link dark:text-darklink">French</span>
                </div>
            </a>
            <a href="javascript:void(0)" class="dropdown-item px-5 py-3 flex items-center light-dark-hoverbg">
                <div class="flex gap-3 items-center">
                    <span class="flex-shrink-0">
                        <img src="../assets/images/svgs/icon-flag-sa.svg" alt="user" class="object-cover !w-5 !h-5 rounded-full">
                    </span>
                    <span class="text-sm block font-normal  text-link dark:text-darklink">Arabic</span>
                </div>
            </a>
        </div>
    </div>
</div>

                    <!-- Cart Canvas-->
                    <a href="#" class="rounded-full icon-hover h-10 w-10 flex justify-center text-link dark:text-darklink items-center hover:text-primary  relative light-dark-hoverbg " data-hs-overlay="#hs-overlay-right-cart" aria-expanded="false">
                        <i class="ti ti-basket text-xl relative "></i>
                        <div class="absolute inline-flex items-center justify-center w-5 h-5 text-white text-[11px] font-medium  bg-error  rounded-full -top-0 md:-top-[0px] sm:-top-[0px] -right-1">
                            2</div>
                    </a>
                    <!-- Notifications DD -->

<div class="hs-dropdown [--strategy:absolute] [--adaptive:none] sm:[--trigger:hover] sm:relative group/menu">
    <a id="hs-dropdown-hover-event-notification" class="relative hs-dropdown-toggle h-10 w-10 text-link dark:text-darklink cursor-pointer hover:bg-lightprimary  hover:text-primary dark:hover:bg-darkprimary flex justify-center items-center rounded-full group-hover/menu:bg-lightprimary group-hover/menu:text-primary">
        <i class="ti ti-bell-ringing text-xl relative z-[1]"></i>
        <div class="absolute inline-flex items-center justify-center  text-white text-[11px] font-medium  bg-primary p-[5px] rounded-full -top-[-5px] -right-[0px]">
        </div>
    </a>
    <div class="card hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 right-0 rtl:right-auto rtl:left-0 mt-2 min-w-max top-auto w-full sm:w-[360px] hidden z-[2]" aria-labelledby="hs-dropdown-hover-event-notification" role="menu">
        <div class="flex items-center py-4 px-7 justify-between">
            <h3 class="mb-0 card-title">
                Notifications</h3>
            <span class="text-xs badge-md bg-primary text-white">5
                new</span>
        </div>
        <div class="message-body max-h-[350px]" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;"><div class="simplebar-content" style="padding: 0px;">
            <a href="javascript:void(0)" class="px-7 py-3 flex items-center light-dark-hoverbg">
                <span class="flex-shrink-0 h-12 w-12 rounded-full bg-lightprimary dark:bg-darkprimary flex justify-center items-center">
                <i class="ti ti-dashboard text-primary text-xl"></i>
                </span>
                <div class="ps-4">
                    <h5 class="text-sm">
                        Launch Admin
                    </h5>
                    <span>Just see the my new
                        admin!</span>
                </div>
            </a>
            <a href="javascript:void(0)" class="px-7 py-3 flex items-center light-dark-hoverbg">
                <span class="flex-shrink-0 h-12 w-12 rounded-full bg-lighterror dark:bg-darkerror flex justify-center items-center">
                <i class="ti ti-screen-share text-error text-xl"></i>
                </span>
                <div class="ps-4">
                    <h5 class="text-sm">
                        Meeting Today
                    </h5>
                    <span>Check your schedule</span>
                </div>
            </a>
            <a href="javascript:void(0)" class="px-7 py-3 flex items-center light-dark-hoverbg">
                <span class="flex-shrink-0 h-12 w-12 rounded-full bg-lightsuccess dark:bg-darksuccess flex justify-center items-center">
                <i class="ti ti-coin text-success text-xl"></i>
                </span>
                <div class="ps-4">
                    <h5 class="text-sm">
                        New Payment received
                    </h5>
                    <span>Check
                        your
                        earnings</span>
                </div>
            </a>
            <a href="javascript:void(0)" class="px-7 py-3 flex items-center light-dark-hoverbg">
                <span class="flex-shrink-0 h-12 w-12 rounded-full bg-lightwarning dark:bg-darkwarning flex justify-center items-center">
                <i class="ti ti-credit-card text-warning text-xl"></i>
                </span>
                <div class="ps-4">
                    <h5 class="text-sm">
                        Pay Bills
                    </h5>
                    <span>Just a reminder that you have pay</span>
                </div>
            </a>
            <a href="javascript:void(0)" class="px-7 py-3 flex items-center light-dark-hoverbg">
                <span class="flex-shrink-0 h-12 w-12 rounded-full bg-lightinfo dark:bg-darkinfo flex justify-center items-center">
                <i class="ti ti-calendar-month text-info text-xl font-thin"></i>
                </span>
                <div class="ps-4">
                    <h5 class="text-sm">
                        Go for Event
                    </h5>
                    <span>Just a reminder for
                        event</span>
                </div>
            </a>
        </div></div></div></div><div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none;"></div></div></div>
        <div class="pt-3 pb-6 px-7">
            <a href="#" class="btn btn-outline-primary block w-full">
                See All Notifications
            </a>
        </div>
    </div>
</div>
                    <!-- Profile DD -->
                    <div class="hs-dropdown [--strategy:absolute] [--adaptive:none] [--placement:top-left] sm:[--trigger:hover] sm:relative group/menu">
    <a id="hs-dropdown-hover-event-profile" class="relative hs-dropdown-toggle cursor-pointer align-middle rounded-full group-hover/menu:bg-lightprimary group-hover/menu:text-primary">
        <img class="object-cover w-9 h-9 rounded-full" src="../assets/images/profile/user-1.jpg" alt="" aria-hidden="true">
    </a>
    <div class="card hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 mt-2 min-w-max top-auto right-0 rtl:right-auto rtl:left-0 w-full sm:w-[360px] hidden z-[2]" aria-labelledby="hs-dropdown-hover-event-profile" role="menu">
        <div class="card-body">
            <div class="flex items-center pb-4 justify-between">
                <h3 class="mb-0 card-title">User
                    Profile</h3>
            </div>
            <div class="message-body max-h-[450px]" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;"><div class="simplebar-content" style="padding: 0px;">
                <div class="">
                    <div class="flex items-center">
                        <img src="../assets/images/profile/user-1.jpg" class="h-20 w-20 rounded-full object-cover" alt="profile">
                        <div class="ml-4 rtl:mr-4 rtl:ml-auto">
                            <h5 class="text-base">
                                Mathew Anderson
                            </h5>
                            <p class="text-xs font-normal text-link dark:text-darklink ">
                                Designer</p>
                            <span class="text-sm font-normal flex items-center text-link dark:text-darklink">
                                <i class="ti ti-mail mr-2"></i>
                                <span>info@modernize.com</span>
                            </span>
                        </div>
                    </div>

                    <ul class="mt-10">
                        <li class="mb-5">
                            <a href="../main/page-user-profile.html" class="flex gap-3 items-center group">
                                <span class="bg-lightgray dark:bg-darkgray    h-12 w-12 flex justify-center items-center rounded-md">
                                    <img src="../assets/images/svgs/icon-account.svg" class="h-6 w-6">
                                </span>

                                <div class="">
                                    <h6 class="text-sm mb-1  group-hover:text-primary">
                                        My Profile
                                    </h6>
                                    <p class="text-xs text-link dark:text-darklink font-normal">
                                        Account settings</p>
                                </div>
                            </a>
                        </li>
                        <li class="mb-5">
                            <a href="../main/app-email.html" class="flex gap-3 items-center  group">
                                <span class="bg-lightgray dark:bg-darkgray    h-12 w-12 flex justify-center items-center rounded-md">
                                    <img src="../assets/images/svgs/icon-inbox.svg" class="h-6 w-6">
                                </span>
                                <div class="">
                                    <h6 class="fext-sm mb-1  group-hover:text-primary ">
                                        My Inbox
                                    </h6>
                                    <p class="text-xs text-link dark:text-darklink font-normal">
                                        Messages &amp;
                                        Emails</p>
                                </div>
                            </a>
                        </li>
                        <li class="mb-5">
                            <a href="../main/app-kanban.html" class="flex gap-3 items-center group ">
                                <span class="bg-lightgray dark:bg-darkgray    h-12 w-12 flex justify-center items-center rounded-md">
                                    <img src="../assets/images/svgs/icon-tasks.svg" class="h-6 w-6">
                                </span>
                                <div class="">
                                    <h6 class="fext-sm mb-1  group-hover:text-primary ">
                                        My Tasks
                                    </h6>
                                    <p class="text-xs text-link dark:text-darklink font-normal">
                                        To-do and Daily
                                        tasks</p>
                                </div>
                            </a>
                        </li>
                    </ul>

                    <div class="p-5 rounded-md bg-lightprimary dark:bg-darkprimary overflow-hidden relative">
                        <h5 class="text-base leading-4 ">
                            Unlimited<br>
                            Access
                        </h5>
                        <button type="button" class="btn btn-md mt-4">
                            Upgrade
                        </button>
                        <img src="../assets/images/backgrounds/unlimited-bg.png" alt="bg-img" class="absolute right-0 top-0">
                    </div>
                </div>
            </div></div></div></div><div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none;"></div></div></div>
            <div class="mt-5">
                <a href="../main/authentication-login.html" class="btn btn-outline-primary block w-full">
                    Logout
                </a>
            </div>
        </div>
    </div>
</div>
                </div>
            </div>
        </div>
    </div>

</div>
              </div>
            </div>
          </div>
        </header>
        <!--  Header End -->

        <!-- Horizontal Header Menu -->
        <aside class="with-horizontal lg:flex hidden">
          <nav class="relative border-b border-border dark:border-darkborder py-4">
    <div class="container">
        <div class="flex gap-1 items-center relative">
            <!-- Dropdown Menu / Multilevel -->
            <div class="hs-dropdown  [--strategy:static] lg:[--strategy:absolute] [--adaptive:none] sm:[--trigger:hover] relative">
                <button type="button" class="horizontal-menu
                    ">
                    <i class="ti ti-home-2 text-base"></i>
                    Dashboard <i class="ti ti-chevron-down ms-auto text-lg"></i>
                </button>
                <div id="dash" class="horizontal-items hs-dropdown-menu before:absolute left-0 hidden transition-[opacity,margin] duration-[0.1ms] sm:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 " role="menu">
                    <a class="horizontal-link
                    " href="../main/index.html">
                    <i class="ti ti-brand-chrome text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Modern</span>
                    </a>
                    <a class="horizontal-link
                    " href="../main/index2.html">
                    <i class="ti ti-shopping-cart text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">eCommerce</span>
                    </a>
                    <a class="horizontal-link
                    " href="../main/index3.html">
                    <i class="ti ti-currency-dollar text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">NFT</span>
                    </a>
                    <a class="horizontal-link
                    " href="../main/index4.html">
                    <i class="ti ti-cpu text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Crypto</span>
                    </a>
                    <a class="horizontal-link
                    " href="../main/index5.html">
                    <i class="ti ti-activity-heartbeat text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">General</span>
                    </a>
                    <a class="horizontal-link
                    " href="../main/index6.html">
                    <i class="ti ti-playlist text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Music</span>
                    </a>
                </div>
            </div>
            <div class="hs-dropdown  [--strategy:static] lg:[--strategy:absolute] [--adaptive:none] sm:[--trigger:hover] relative">
            <button type="button" class="horizontal-menu

            ">
            <i class="ti ti-archive text-base"></i>
            Apps <i class="ti ti-chevron-down ms-auto text-lg"></i>
            </button>
            <div class="py-4 px-3 hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] sm:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 left-0 hidden z-10 sm:mt-4 top-full start-0 min-w-[400px]  before:absolute lg:bg-white bg-transparent dark:bg-dark lg:shadow-md shadow-none" role="menu">
                <div class="grid grid-cols-12">
                    <div class="col-span-6">
                        <a class="horizontal-link
                        " href="../main/app-calendar.html">
                        <i class="ti ti-calendar text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Calendar</span>
                        </a>
                    </div>
                    <div class="col-span-6">
                        <a class="horizontal-link
                        " href="../main/app-kanban.html">
                        <i class="ti ti-layout-kanban text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Kanban</span>
                        </a>
                    </div>
                    <div class="col-span-6">
                        <a class="horizontal-link
                        " href="../main/app-chat.html">
                        <i class="ti ti-message-dots text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Chat</span>
                        </a>
                    </div>
                    <div class="col-span-6">
                        <a class="horizontal-link
                        " href="../main/app-email.html">
                        <i class="ti ti-mail text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Email</span>
                        </a>
                    </div>
                    <div class="col-span-6">
                        <a class="horizontal-link
                        " href="../main/app-contact.html">
                        <i class="ti ti-phone text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Contact Table</span>
                        </a>
                    </div>
                    <div class="col-span-6">
                        <a class="horizontal-link
                        " href="../main/app-contact2.html">
                        <i class="ti ti-list-details text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Contact List</span>
                        </a>
                    </div>
                    <div class="col-span-6">
                        <a class="horizontal-link
                        " href="../main/app-notes.html">
                        <i class="ti ti-notes text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Notes</span>
                        </a>
                    </div>
                    <div class="col-span-6">
                        <a class="horizontal-link
                        " href="../main/app-invoice.html">
                        <i class="ti ti-file-text text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Invoice</span>
                        </a>
                    </div>
                    <div class="col-span-6">
                        <a class="horizontal-link
                        " href="../main/page-user-profile.html">
                        <i class="ti ti-user-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">User Profile</span>
                        </a>
                    </div>
                    <div class="col-span-6">
                        <a class="horizontal-link
                        " href="../main/blog-posts.html">
                        <i class="ti ti-article text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Posts</span>
                        </a>
                    </div>
                    <div class="col-span-6">
                        <a class="horizontal-link
                        " href="../main/blog-detail.html">
                        <i class="ti ti-article text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Details</span>
                        </a>
                    </div>
                    <div class="col-span-6">
                        <a class="horizontal-link
                        " href="../main/eco-shop.html">
                        <i class="ti ti-shopping-cart text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Shop</span>
                        </a>
                    </div>
                    <div class="col-span-6">
                        <a class="horizontal-link
                        " href="../main/eco-shop-detail.html">
                        <i class="ti ti-basket text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Shop Detail</span>
                        </a>
                    </div>
                    <div class="col-span-6">
                        <a class="horizontal-link
                        " href="../main/eco-product-list.html">
                        <i class="ti ti-list-check text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">List</span>
                        </a>
                    </div>
                    <div class="col-span-6">
                        <a class="horizontal-link
                        " href="../main/eco-checkout.html">
                        <i class="ti ti-brand-shopee text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Checkout</span>
                        </a>
                    </div>

                </div>

            </div>
           </div>
           <div class="hs-dropdown  [--strategy:static] lg:[--strategy:absolute] [--adaptive:none] sm:[--trigger:hover] relative">
           <button type="button" class="horizontal-menu

               ">
               Pages <i class="ti ti-chevron-down ms-auto text-lg"></i>
           </button>
           <div class="py-4 px-3 hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] sm:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 left-0 hidden horizontal-items" role="menu">
               <a class="horizontal-link
               " href="../main/page-faq.html">
               <i class="ti ti-help text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">FAQ</span>
               </a>
               <a class="horizontal-link
               " href="../main/page-account-settings.html">
               <i class="ti ti-user-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Account Setting</span>
               </a>
               <a class="horizontal-link
               " href="../main/page-pricing.html">
               <i class="ti ti-currency-dollar text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Pricing</span>
               </a>
               <a class="horizontal-link
               " href="../main/widgets-cards.html">
               <i class="ti ti-cards text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Cards</span>
               </a>
               <a class="horizontal-link
               " href="../main/widgets-banners.html">
               <i class="ti ti-ad text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Banner</span>
               </a>
               <a class="horizontal-link
               " href="../main/widgets-charts.html">
               <i class="ti ti-chart-bar text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Charts</span>
               </a>
               <a class="horizontal-link
               " href="../landingpage/index.html">
               <i class="ti ti-app-window text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Landing Page</span>
               </a>

           </div>
           </div>
           <div class="hs-dropdown  [--strategy:static] lg:[--strategy:absolute] [--adaptive:none] sm:[--trigger:hover] ">
            <button type="button" class="horizontal-menu
             bg-primary text-white dark:text-white hover:bg-primary hover:text-white
            ">
            <i class="ti ti-layout-grid text-base"></i>
            UI <i class="ti ti-chevron-down ms-auto text-lg"></i>
            </button>
            <div class="py-4 px-3 hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] sm:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 left-0 hidden z-10 sm:mt-4 top-full start-0 w-full  before:absolute lg:bg-white bg-transparent dark:bg-dark lg:shadow-md shadow-none" role="menu">
                <div class="grid grid-cols-12">
                    <div class="col-span-3">
                        <a class="horizontal-link
                        " href="../main/ui-accordion.html">
                        <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Accordion</span>
                        </a>
                    </div>
                    <div class="col-span-3">
                        <a class="horizontal-link
                        " href="../main/ui-badge.html">
                        <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Badge</span>
                        </a>
                    </div>
                    <div class="col-span-3">
                        <a class="horizontal-link
                        " href="../main/ui-button.html">
                        <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Button</span>
                        </a>
                    </div>
                    <div class="col-span-3">
                        <a class="horizontal-link
                        " href="../main/ui-dropdowns.html">
                        <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Dropdowns</span>
                        </a>
                    </div>
                    <div class="col-span-3">
                        <a class="horizontal-link
                         active horizontal-link-active" href="../main/ui-modals.html">
                        <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Modals</span>
                        </a>
                    </div>
                    <div class="col-span-3">
                        <a class="horizontal-link
                        " href="../main/ui-tab.html">
                        <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Tab</span>
                        </a>
                    </div>
                    <div class="col-span-3">
                        <a class="horizontal-link
                        " href="../main/ui-tooltip-popover.html">
                        <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Tooltip &amp; Popover</span>
                        </a>
                    </div>
                    <div class="col-span-3">
                        <a class="horizontal-link
                        " href="../main/ui-notification.html">
                        <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Notification</span>
                        </a>
                    </div>
                    <div class="col-span-3">
                        <a class="horizontal-link
                        " href="../main/ui-progressbar.html">
                        <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Progressbar</span>
                        </a>
                    </div>
                    <div class="col-span-3">
                        <a class="horizontal-link
                        " href="../main/ui-pagination.html">
                        <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Pagination</span>
                        </a>
                    </div>
                    <div class="col-span-3">
                        <a class="horizontal-link
                        " href="../main/ui-typography.html">
                        <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Typography</span>
                        </a>
                    </div>
                    <div class="col-span-3">
                        <a class="horizontal-link
                        " href="../main/ui-breadcrumb.html">
                        <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Breadcrumb</span>
                        </a>
                    </div>
                    <div class="col-span-3">
                        <a class="horizontal-link
                        " href="../main/ui-offcanvas.html">
                        <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Offcanvas</span>
                        </a>
                    </div>

                    <div class="col-span-3">
                        <a class="horizontal-link
                        " href="../main/ui-lists.html">
                        <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Lists</span>
                        </a>
                    </div>
                    <div class="col-span-3">
                        <a class="horizontal-link
                        " href="../main/ui-grid.html">
                        <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Grid</span>
                        </a>
                    </div>
                    <div class="col-span-3">
                        <a class="horizontal-link
                        " href="../main/ui-carousel.html">
                        <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Carousel</span>
                        </a>
                    </div>
                    <div class="col-span-3">
                        <a class="horizontal-link
                        " href="../main/ui-scrollspy.html">
                        <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Scrollspy</span>
                        </a>
                    </div>
                    <div class="col-span-3">
                        <a class="horizontal-link
                        " href="../main/ui-spinner.html">
                        <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Spinner</span>
                        </a>
                    </div>
                    <div class="col-span-3">
                        <a class="horizontal-link
                        " href="../main/ui-link.html">
                        <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Link</span>
                        </a>
                    </div>
                    <div class="col-span-3">
                        <a class="horizontal-link
                        " href="../main/ui-chat-bubbles.html">
                        <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Chat Bubbles</span>
                        </a>
                    </div>
                    <div class="col-span-3">
                        <a class="horizontal-link
                        " href="../main/ui-datepicker.html">
                        <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Datepicker</span>
                        </a>
                    </div>
                    <div class="col-span-3">
                        <a class="horizontal-link
                        " href="../main/ui-devices.html">
                        <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Devices</span>
                        </a>
                    </div>
                    <div class="col-span-3">
                        <a class="horizontal-link
                        " href="../main/ui-ratings.html">
                        <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Ratings</span>
                        </a>
                    </div>
                    <div class="col-span-3">
                        <a class="horizontal-link
                        " href="../main/ui-stepper.html">
                        <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Stepper</span>
                        </a>
                    </div>
                    <div class="col-span-3">
                        <a class="horizontal-link
                        " href="../main/ui-timeline.html">
                        <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Timeline</span>
                        </a>
                    </div>
                    <div class="col-span-3">
                        <a class="horizontal-link
                        " href="../main/ui-toasts.html">
                        <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Toasts</span>
                        </a>
                    </div>
                    <div class="col-span-3">
                        <a class="horizontal-link
                        " href="../main/ui-skeleton.html">
                        <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Skeleton</span>
                        </a>
                    </div>
                </div>

                </div>

            </div>
            <div class="hs-dropdown  [--strategy:static] lg:[--strategy:absolute] [--adaptive:none] sm:[--trigger:hover] relative">
                <button type="button" class="horizontal-menu

                ">
                <i class="ti ti-file-text text-base"></i>
                Forms <i class="ti ti-chevron-down ms-auto text-lg"></i>
                </button>
                <div class="py-4 px-3 hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] sm:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 left-0 hidden z-10 sm:mt-4 top-full start-0 min-w-[400px]  before:absolute lg:bg-white bg-transparent dark:bg-dark lg:shadow-md shadow-none" role="menu">
                    <div class="grid grid-cols-12">
                        <div class="col-span-6">
                            <a class="horizontal-link
                            " href="../main/form-inputs.html">
                            <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Forms Input</span>
                            </a>
                        </div>
                        <div class="col-span-6">
                            <a class="horizontal-link
                            " href="../main/form-input-groups.html">
                            <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Input Groups</span>
                            </a>
                        </div>
                        <div class="col-span-6">
                            <a class="horizontal-link
                            " href="../main/form-checkbox-radio.html">
                            <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Checkbox &amp; Radios</span>
                            </a>
                        </div>
                        <div class="col-span-6">
                            <a class="horizontal-link
                            " href="../main/form-input-grid.html">
                            <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Input Grid</span>
                            </a>
                        </div>
                        <div class="col-span-6">
                            <a class="horizontal-link
                            " href="../main/form-input-number.html">
                            <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Input Number</span>
                            </a>
                        </div>
                        <div class="col-span-6">
                            <a class="horizontal-link
                            " href="../main/form-advanced-password.html">
                            <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Advanced Password</span>
                            </a>
                        </div>
                    </div>

                </div>
               </div>
               <div class="hs-dropdown  [--strategy:static] lg:[--strategy:absolute] [--adaptive:none] sm:[--trigger:hover] relative">
               <button type="button" class="horizontal-menu

                   ">
                   <i class="ti ti-layout-sidebar text-base"></i>
                   Tables <i class="ti ti-chevron-down ms-auto text-lg"></i>
               </button>
               <div class="py-4 px-3 hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] sm:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 left-0 hidden horizontal-items" role="menu">
                   <a class="horizontal-link
                   " href="../main/table-basic.html">
                   <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Basic Table</span>
                   </a>
                   <a class="horizontal-link
                   " href="../main/table-layout-highlighted.html">
                   <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Highlighted Table</span>
                   </a>
                   <a class="horizontal-link
                   " href="../main/table-miscellaneous.html">
                   <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Miscellaneous Table</span>
                   </a>
                   <a class="horizontal-link
                   " href="../main/table-editable.html">
                   <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Editable Table</span>
                   </a>
                   <a class="horizontal-link
                   " href="../main/table-datatable-basic.html">
                   <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Basic Data Table</span>
                   </a>

               </div>
               </div>
               <div class="hs-dropdown  [--strategy:static] lg:[--strategy:absolute] [--adaptive:none] sm:[--trigger:hover] relative">
               <button type="button" class="horizontal-menu

                   ">
                   <i class="ti ti-chart-pie text-base"></i>
                   Charts <i class="ti ti-chevron-down ms-auto text-lg"></i>
               </button>
               <div class="py-4 px-3 hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] sm:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 left-0 hidden horizontal-items" role="menu">
                   <a class="horizontal-link
                   " href="../main/chart-apex-line.html">
                   <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Line Chart</span>
                   </a>
                   <a class="horizontal-link
                   " href="../main/chart-apex-area.html">
                   <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Area Chart</span>
                   </a>
                   <a class="horizontal-link
                   " href="../main/chart-apex-bar.html">
                   <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Bar Chart</span>
                   </a>
                   <a class="horizontal-link
                   " href="../main/chart-apex-pie.html">
                   <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Pie Chart</span>
                   </a>
                   <a class="horizontal-link
                   " href="../main/chart-apex-radial.html">
                   <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Radial Chart</span>
                   </a>
                   <a class="horizontal-link
                   " href="../main/chart-apex-radar.html">
                   <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Radar Chart</span>
                   </a>
               </div>
               </div>
               <div class="hs-dropdown  [--strategy:static] lg:[--strategy:absolute] [--adaptive:none] sm:[--trigger:hover] relative">
               <button type="button" class="horizontal-menu

                   ">
                   <i class="ti ti-archive text-base"></i>
                   Icon <i class="ti ti-chevron-down ms-auto text-lg"></i>
               </button>

               <div class="py-4 px-3 hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] sm:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 left-0 hidden horizontal-items" role="menu">
                   <a class="horizontal-link
                   " href="../main/icon-tabler.html">
                   <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Tabler icon</span>
                   </a>
               </div>
               </div>
               <div class="hs-dropdown  [--strategy:static] lg:[--strategy:absolute] [--adaptive:none] sm:[--trigger:hover] relative">
               <button type="button" class="horizontal-menu

                   ">
                   <i class="ti ti-box-multiple text-base"></i>
                   Multi DD <i class="ti ti-chevron-down ms-auto text-lg"></i>
               </button>
               <div class="py-4 px-3 hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] sm:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 left-0 hidden horizontal-items" role="menu">
                   <a class="horizontal-link
                   " href="https://adminmart.github.io/premium-documentation/tailwind/modernize/index.html" target="_blank">
                   <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Documentation</span>
                   </a>
                   <a class="horizontal-link
                   " href="#">
                   <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Page 1</span>
                   </a>
                   <div class="hs-dropdown relative [--strategy:static] sm:[--strategy:absolute] [--adaptive:none]">
                   <button type="button" class="horizontal-link w-full ">
                       <i class="ti ti-circle text-base"></i>
                       Page 2
                       <i class="ti ti-chevron-right ms-auto text-md"></i>
                   </button>
                   <div class="py-4 px-3 hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] sm:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0  min-w-64 hidden z-10 sm:mt-2  before:absolute  before:-start-5 before:top-0 before:h-full before:w-5 top-0 start-full !mx-[10px]" role="menu">
                       <a class="horizontal-link" href="#">
                           <i class="ti ti-circle text-base"></i>
                           Page 2.1
                       </a>
                       <a class="horizontal-link" href="#">
                           <i class="ti ti-circle text-base"></i>
                           Page 2.2
                       </a>
                       <a class="horizontal-link" href="#">
                           <i class="ti ti-circle text-base"></i>
                           Page 2.2
                       </a>
                   </div>
                   </div>
                   <a class="horizontal-link
                   " href="#">
                   <i class="ti ti-circle text-base flex-shrink-0"></i> <span class="hide-menu flex-shrink-0 text-sm leading-tight">Page 3</span>
                   </a>
               </div>
               </div>
           </div>
        </div>
</nav>
        </aside>
        <!-- Horizontal Header Menu End -->

        <!-- Main Content -->
        <main class="pt-6">
          <div class="container full-container py-5">


            <!----Breadcrumb Start---->
            <div class="card bg-lightinfo dark:bg-darkinfo shadow-none dark:shadow-none position-relative overflow-hidden mb-6">
    <div class="card-body md:py-3 py-5">
        <div class=" items-center grid grid-cols-12 gap-6">
            <div class="col-span-9">
                <h4 class="font-semibold text-xl text-dark dark:text-white mb-3">Modals</h4>
                <ol class="flex items-center whitespace-nowrap" aria-label="Breadcrumb">
                    <li class="flex items-center">
                        <a class="opacity-80 text-sm text-link dark:text-darklink leading-none" href="../main/index.html">
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="p-0.5 rounded-full bg-dark dark:bg-darklink mx-2.5 flex items-center"></div>
                    </li>
                    <li class="flex items-center text-sm text-link dark:text-darklink leading-none" aria-current="page">
                        Modals
                    </li>
                </ol>
            </div>
            <div class="col-span-3 -mb-10">
                <div class="flex justify-center">
                    <img src="../assets/images/breadcrumb/ChatBc.png" alt="" class="md:-mb-7 -mb-4 h-full">
                </div>
            </div>
        </div>
    </div>
</div>
            <!----Breadcrumb End---->
            <div class="grid grid-cols-12 gap-6">
              <div class=" lg:col-span-4 md:col-span-6 sm:col-span-12 col-span-12">
                <div class="card">
                  <div class="card-body">
                     <div class="flex justify-between items-center mb-0">
                      <h5 class="card-title mb-0">Default Modal</h5>
                      <button class="w-9 h-9 flex items-center justify-center rounded-full bg-lightprimary text-primary hover:bg-primary hover:text-white dark:bg-darkprimary dark:hover:bg-primary" data-hs-overlay="#hs-focus-management-modal1" aria-expanded="false">
                        <i class="ti ti-code text-xl"></i>
                      </button>
                      <div id="hs-focus-management-modal1" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 w-full h-full fixed top-0 start-0 z-[60] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none hidden">
                        <div class="hs-overlay-open:opacity-100 hs-overlay-open:duration-500 opacity-0 transition-all lg:max-w-4xl lg:w-full m-3 lg:mx-auto">
                          <div class="flex flex-col bg-white dark:bg-dark  shadow-md dark:shadow-dark-md rounded-md pointer-events-auto">
                            <div class="items-center gap-x-2 py-3 px-4 dark:border-darkborder">

                              <div class="overflow-hidden">
                                <div class="flex justify-between">
                                  <h5 class="text-lg font-semibold mb-4 px-4 text-dark dark:text-white">Default Modal -
                                    View Code</h5>
                                  <button type="button" class="flex justify-center items-center size-7 text-base font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100  dark:text-white dark:hover:bg-gray-700" data-hs-overlay="#hs-focus-management-modal1" aria-expanded="false">
                                    <span class="sr-only">Close</span>
                                     <i class="ti ti-x text-xl"></i>
                                  </button>
                                </div>

                                <div class="message-body max-h-[300px]" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;"><div class="simplebar-content" style="padding: 0px;">
                                  <pre class="mt-0 language-html" tabindex="0"> <code class="language-html">
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-basic-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
Open modal
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">id</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-basic-modal<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay-open:opacity-100 hs-overlay-open:duration-500 opacity-0 transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>font-bold text-base text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               Modal title
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-basic-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>sr-only<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Close<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>ti ti-x text-xl<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>p-4 overflow-y-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>mt-1 text-base text-gray-800 dark:text-gray-400<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               This is a wider card with supporting text below as a natural lead-in to additional content.
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-basic-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Close
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Save changes
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
            </code>
                                                    </pre>
                                </div></div></div></div><div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none; transform: translate3d(0px, 171px, 0px);"></div></div></div>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- end -->
                    </div>
                    <p class="text-sm mb-6">The default form of a modal dialog.</p>
                    <button type="button" class="btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-basic-modal" aria-expanded="false">
                        Open modal
                      </button>

                      <div id="hs-basic-modal" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 size-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none hidden">
                        <div class="hs-overlay-open:opacity-100 hs-overlay-open:duration-500 opacity-0 transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                          <div class="flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                            <div class="flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700">
                              <h3 class="font-bold text-base text-gray-800 dark:text-white">
                                Modal title
                              </h3>
                              <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-basic-modal" aria-expanded="false">
                                <span class="sr-only">Close</span>
                                <i class="ti ti-x text-xl"></i>
                              </button>
                            </div>
                            <div class="p-4 overflow-y-auto">
                              <p class="mt-1 text-base text-gray-800 dark:text-gray-400">
                                This is a wider card with supporting text below as a natural lead-in to additional content.
                              </p>
                            </div>
                            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700">
                              <button type="button" class="btn-md text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-basic-modal" aria-expanded="false">
                                Close
                              </button>
                              <button type="button" class="btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                Save changes
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class=" lg:col-span-4 md:col-span-6 sm:col-span-12 col-span-12">
                <div class="card">
                  <div class="card-body">
                     <div class="flex justify-between items-center mb-0">
                      <h5 class="card-title mb-0">Slide down animation</h5>
                      <button class="w-9 h-9 flex items-center justify-center rounded-full bg-lightprimary text-primary hover:bg-primary hover:text-white dark:bg-darkprimary dark:hover:bg-primary" data-hs-overlay="#hs-focus-management-modal2" aria-expanded="false">
                        <i class="ti ti-code text-xl"></i>
                      </button>
                      <div id="hs-focus-management-modal2" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden w-full h-full fixed top-0 start-0 z-[60] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none">
                        <div class="hs-overlay-open:opacity-100 hs-overlay-open:duration-500 opacity-0 transition-all lg:max-w-4xl lg:w-full m-3 lg:mx-auto">
                          <div class="flex flex-col bg-white dark:bg-dark  shadow-md dark:shadow-dark-md rounded-md pointer-events-auto">
                            <div class="items-center gap-x-2 py-3 px-4 dark:border-darkborder">

                              <div class="overflow-hidden">
                                <div class="flex justify-between">
                                  <h5 class="text-lg font-semibold mb-4 px-4 text-dark dark:text-white">Slide down animation -
                                    View Code</h5>
                                  <button type="button" class="flex justify-center items-center size-7 text-base font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100  dark:text-white dark:hover:bg-gray-700" data-hs-overlay="#hs-focus-management-modal2" aria-expanded="false">
                                    <span class="sr-only">Close</span>
                                     <i class="ti ti-x text-xl"></i>
                                  </button>
                                </div>

                                <div class="message-body max-h-[300px]" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;"><div class="simplebar-content" style="padding: 0px;">
                                  <pre class="mt-0 language-html" tabindex="0"> <code class="language-html">
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-slide-down-animation-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
Open modal
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">id</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-slide-down-animation-modal<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>font-bold text-base text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               Modal title
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-slide-down-animation-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>sr-only<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Close<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>ti ti-x text-xl<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>p-4 overflow-y-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>mt-1 text-base text-gray-800 dark:text-gray-400<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               This is a wider card with supporting text below as a natural lead-in to additional content.
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-slide-down-animation-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Close
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Save changes
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
            </code>
                                                    </pre>
                                </div></div></div></div><div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none;"></div></div></div>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- end -->
                    </div>
                    <p class="text-sm mb-6">Default modal dialog with slide down animation.</p>
                    <button type="button" class="btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-slide-down-animation-modal" aria-expanded="false">
                        Open modal
                      </button>

                      <div id="hs-slide-down-animation-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                          <div class="flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                            <div class="flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700">
                              <h3 class="font-bold text-base text-gray-800 dark:text-white">
                                Modal title
                              </h3>
                              <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-slide-down-animation-modal" aria-expanded="false">
                                <span class="sr-only">Close</span>
                                <i class="ti ti-x text-xl"></i>
                              </button>
                            </div>
                            <div class="p-4 overflow-y-auto">
                              <p class="mt-1 text-gray-800 text-base dark:text-gray-400">
                                This is a wider card with supporting text below as a natural lead-in to additional content.
                              </p>
                            </div>
                            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700">
                              <button type="button" class="btn-md text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-slide-down-animation-modal" aria-expanded="false">
                                Close
                              </button>
                              <button type="button" class="btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                Save changes
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class=" lg:col-span-4 md:col-span-6 sm:col-span-12 col-span-12">
                <div class="card">
                  <div class="card-body">
                     <div class="flex justify-between items-center mb-0">
                      <h5 class="card-title mb-0">Slide up animation</h5>
                      <button class="w-9 h-9 flex items-center justify-center rounded-full bg-lightprimary text-primary hover:bg-primary hover:text-white dark:bg-darkprimary dark:hover:bg-primary" data-hs-overlay="#hs-focus-management-modal3" aria-expanded="false">
                        <i class="ti ti-code text-xl"></i>
                      </button>
                      <div id="hs-focus-management-modal3" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden w-full h-full fixed top-0 start-0 z-[60] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none">
                        <div class="hs-overlay-open:opacity-100 hs-overlay-open:duration-500 opacity-0 transition-all lg:max-w-4xl lg:w-full m-3 lg:mx-auto">
                          <div class="flex flex-col bg-white dark:bg-dark  shadow-md dark:shadow-dark-md rounded-md pointer-events-auto">
                            <div class="items-center gap-x-2 py-3 px-4 dark:border-darkborder">

                              <div class="overflow-hidden">
                                <div class="flex justify-between">
                                  <h5 class="text-lg font-semibold mb-4 px-4 text-dark dark:text-white">Slide up animation -
                                    View Code</h5>
                                  <button type="button" class="flex justify-center items-center size-7 text-base font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100  dark:text-white dark:hover:bg-gray-700" data-hs-overlay="#hs-focus-management-modal3" aria-expanded="false">
                                    <span class="sr-only">Close</span>
                                     <i class="ti ti-x text-xl"></i>
                                  </button>
                                </div>

                                <div class="message-body max-h-[300px]" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;"><div class="simplebar-content" style="padding: 0px;">
                                  <pre class="mt-0 language-html" tabindex="0"> <code class="language-html">
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-slide-up-animation-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
Open modal
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">id</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-slide-up-animation-modal<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-14 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>font-bold text-base text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               Modal title
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-dropup-toggle flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-slide-up-animation-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>sr-only<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Close<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>ti ti-x text-xl<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>p-4 overflow-y-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>mt-1 text-base text-gray-800 dark:text-gray-400<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               This is a wider card with supporting text below as a natural lead-in to additional content.
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-dropup-toggle btn-md text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-slide-up-animation-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Close
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Save changes
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
            </code>
                                                    </pre>
                                </div></div></div></div><div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none;"></div></div></div>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- end -->
                    </div>
                    <p class="text-sm mb-6">Default dialog with slide down animation.</p>
                    <button type="button" class="btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-slide-up-animation-modal" aria-expanded="false">
                        Open modal
                      </button>

                      <div id="hs-slide-up-animation-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-14 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                          <div class="flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                            <div class="flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700">
                              <h3 class="font-bold text-base text-gray-800 dark:text-white">
                                Modal title
                              </h3>
                              <button type="button" class="hs-dropup-toggle flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-slide-up-animation-modal" aria-expanded="false">
                                <span class="sr-only">Close</span>
                                <i class="ti ti-x text-xl"></i>
                              </button>
                            </div>
                            <div class="p-4 overflow-y-auto">
                              <p class="mt-1 text-base text-gray-800 dark:text-gray-400">
                                This is a wider card with supporting text below as a natural lead-in to additional content.
                              </p>
                            </div>
                            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700">
                              <button type="button" class="hs-dropup-toggle btn-md text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-slide-up-animation-modal" aria-expanded="false">
                                Close
                              </button>
                              <button type="button" class="btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                Save changes
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class=" lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                <div class="card">
                  <div class="card-body">
                     <div class="flex justify-between items-center mb-0">
                      <h5 class="card-title mb-0">Modal Sizes</h5>
                      <button class="w-9 h-9 flex items-center justify-center rounded-full bg-lightprimary text-primary hover:bg-primary hover:text-white dark:bg-darkprimary dark:hover:bg-primary" data-hs-overlay="#hs-focus-management-modal4" aria-expanded="false">
                        <i class="ti ti-code text-xl"></i>
                      </button>
                      <div id="hs-focus-management-modal4" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden w-full h-full fixed top-0 start-0 z-[60] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none">
                        <div class="hs-overlay-open:opacity-100 hs-overlay-open:duration-500 opacity-0 transition-all lg:max-w-4xl lg:w-full m-3 lg:mx-auto">
                          <div class="flex flex-col bg-white dark:bg-dark  shadow-md dark:shadow-dark-md rounded-md pointer-events-auto">
                            <div class="items-center gap-x-2 py-3 px-4 dark:border-darkborder">

                              <div class="overflow-hidden">
                                <div class="flex justify-between">
                                  <h5 class="text-lg font-semibold mb-4 px-4 text-dark dark:text-white">Modal Sizes -
                                    View Code</h5>
                                  <button type="button" class="flex justify-center items-center size-7 text-base font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100  dark:text-white dark:hover:bg-gray-700" data-hs-overlay="#hs-focus-management-modal4" aria-expanded="false">
                                    <span class="sr-only">Close</span>
                                     <i class="ti ti-x text-xl"></i>
                                  </button>
                                </div>

                                <div class="message-body max-h-[300px]" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;"><div class="simplebar-content" style="padding: 0px;">
                                  <pre class="mt-0 language-html" tabindex="0"> <code class="language-html">
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-medium rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-small-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
Small Modal
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">id</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-small-modal<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>font-bold text-base text-base text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               Modal title
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-small-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>sr-only<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Close<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>ti ti-x text-xl<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>p-4 overflow-y-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>mt-1 text-base text-gray-800 dark:text-gray-400<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               This is a wider card with supporting text below as a natural lead-in to additional content.
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-small-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Close
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Save changes
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-medium rounded-md border border-transparent bg-secondary text-white hover:bg-secondaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-medium-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
Medium Modal
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">id</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-medium-modal<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all md:max-w-2xl md:w-full m-3 md:mx-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>font-bold text-base text-base text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               Modal title
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-medium-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>sr-only<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Close<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>ti ti-x text-xl<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>p-4 overflow-y-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>mt-1 text-base text-gray-800 dark:text-gray-400<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               This is a wider card with supporting text below as a natural lead-in to additional content.
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-medium-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Close
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Save changes
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-medium rounded-md border border-transparent bg-success text-white hover:bg-successemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-large-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
Large Modal
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">id</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-large-modal<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all lg:max-w-4xl lg:w-full m-3 lg:mx-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>font-bold text-base text-base text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               Modal title
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-large-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>sr-only<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Close<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>ti ti-x text-xl<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>p-4 overflow-y-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>mt-1 text-base text-gray-800 dark:text-gray-400<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               This is a wider card with supporting text below as a natural lead-in to additional content.
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-large-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Close
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Save changes
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-semibold rounded-md border border-transparent bg-warning text-white hover:bg-warningemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-extra-large-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
EXtra large model
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">id</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-extra-large-modal<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all xl:max-w-6xl xl:w-full m-3 xl:mx-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>font-bold text-base text-base text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               Modal title
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-extra-large-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>sr-only<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Close<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>ti ti-x text-xl<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>p-4 overflow-y-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>mt-1 text-base text-gray-800 dark:text-gray-400<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               This is a wider card with supporting text below as a natural lead-in to additional content.
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-extra-large-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Close
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Save changes
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
            </code>
                                                    </pre>
                                </div></div></div></div><div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none;"></div></div></div>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- end -->
                    </div>
                    <p class="text-sm mb-6">Modals have four optional sizes.</p>
                  <div class="flex gap-2 flex-wrap">
                    <button type="button" class="btn-md text-sm font-medium rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-small-modal" aria-expanded="false">
                        Small Modal
                      </button>

                      <div id="hs-small-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                          <div class="flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                            <div class="flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700">
                              <h3 class="font-bold text-base text-gray-800 dark:text-white">
                                Modal title
                              </h3>
                              <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-small-modal" aria-expanded="false">
                                <span class="sr-only">Close</span>
                                <i class="ti ti-x text-xl"></i>
                              </button>
                            </div>
                            <div class="p-4 overflow-y-auto">
                              <p class="mt-1 text-base text-gray-800 dark:text-gray-400">
                                This is a wider card with supporting text below as a natural lead-in to additional content.
                              </p>
                            </div>
                            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700">
                              <button type="button" class="btn-md text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-small-modal" aria-expanded="false">
                                Close
                              </button>
                              <button type="button" class="btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                Save changes
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <button type="button" class="btn-md text-sm font-medium rounded-md border border-transparent bg-secondary text-white hover:bg-secondaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-medium-modal" aria-expanded="false">
                        Medium Modal
                      </button>

                      <div id="hs-medium-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all md:max-w-2xl md:w-full m-3 md:mx-auto">
                          <div class="flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                            <div class="flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700">
                              <h3 class="font-bold text-base text-gray-800 dark:text-white">
                                Modal title
                              </h3>
                              <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-medium-modal" aria-expanded="false">
                                <span class="sr-only">Close</span>
                                <i class="ti ti-x text-xl"></i>
                              </button>
                            </div>
                            <div class="p-4 overflow-y-auto">
                              <p class="mt-1 text-base text-gray-800 dark:text-gray-400">
                                This is a wider card with supporting text below as a natural lead-in to additional content.
                              </p>
                            </div>
                            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700">
                              <button type="button" class="btn-md text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-medium-modal" aria-expanded="false">
                                Close
                              </button>
                              <button type="button" class="btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                Save changes
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <button type="button" class="btn-md text-sm font-medium rounded-md border border-transparent bg-success text-white hover:bg-successemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-large-modal" aria-expanded="false">
                        Large Modal
                      </button>

                      <div id="hs-large-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all lg:max-w-4xl lg:w-full m-3 lg:mx-auto">
                          <div class="flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                            <div class="flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700">
                              <h3 class="font-bold  text-base text-gray-800 dark:text-white">
                                Modal title
                              </h3>
                              <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-large-modal" aria-expanded="false">
                                <span class="sr-only">Close</span>
                                <i class="ti ti-x text-xl"></i>
                              </button>
                            </div>
                            <div class="p-4 overflow-y-auto">
                              <p class="mt-1 text-base text-gray-800 dark:text-gray-400">
                                This is a wider card with supporting text below as a natural lead-in to additional content.
                              </p>
                            </div>
                            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700">
                              <button type="button" class="btn-md text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-large-modal" aria-expanded="false">
                                Close
                              </button>
                              <button type="button" class="btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                Save changes
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <button type="button" class="btn-md text-sm font-semibold rounded-md border border-transparent bg-warning text-white hover:bg-warningemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-extra-large-modal" aria-expanded="false">
                        EXtra large model
                      </button>
                 <div id="hs-extra-large-modal" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none">
                        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all xl:max-w-6xl xl:w-full m-3 xl:mx-auto">
                          <div class="flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                            <div class="flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700">
                              <h3 class="font-bold text-base text-gray-800 dark:text-white">
                                Modal title
                              </h3>
                              <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-extra-large-modal" aria-expanded="false">
                                <span class="sr-only">Close</span>
                                <i class="ti ti-x text-xl"></i>
                              </button>
                            </div>
                            <div class="p-4 overflow-y-auto">
                              <p class="mt-1 text-base text-gray-800 dark:text-gray-400">
                                This is a wider card with supporting text below as a natural lead-in to additional content.
                              </p>
                            </div>
                            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700">
                              <button type="button" class="btn-md text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-extra-large-modal" aria-expanded="false">
                                Close
                              </button>
                              <button type="button" class="btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                Save changes
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>

                  </div>
                  </div>
                </div>
              </div>
              <div class=" lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                <div class="card">
                  <div class="card-body">
                     <div class="flex justify-between items-center mb-6">
                      <h5 class="card-title mb-0">Scrolling behavior</h5>
                      <button class="w-9 h-9 flex items-center justify-center rounded-full bg-lightprimary text-primary hover:bg-primary hover:text-white dark:bg-darkprimary dark:hover:bg-primary" data-hs-overlay="#hs-focus-management-modal5" aria-expanded="false">
                        <i class="ti ti-code text-xl"></i>
                      </button>
                      <div id="hs-focus-management-modal5" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden w-full h-full fixed top-0 start-0 z-[60] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none">
                        <div class="hs-overlay-open:opacity-100 hs-overlay-open:duration-500 opacity-0 transition-all lg:max-w-4xl lg:w-full m-3 lg:mx-auto">
                          <div class="flex flex-col bg-white dark:bg-dark  shadow-md dark:shadow-dark-md rounded-md pointer-events-auto">
                            <div class="items-center gap-x-2 py-3 px-4 dark:border-darkborder">

                              <div class="overflow-hidden">
                                <div class="flex justify-between">
                                  <h5 class="text-lg font-semibold mb-4 px-4 text-dark dark:text-white">Scrolling behavior -
                                    View Code</h5>
                                  <button type="button" class="flex justify-center items-center size-7 text-base font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100  dark:text-white dark:hover:bg-gray-700" data-hs-overlay="#hs-focus-management-modal5" aria-expanded="false">
                                    <span class="sr-only">Close</span>
                                     <i class="ti ti-x text-xl"></i>
                                  </button>
                                </div>

                                <div class="message-body max-h-[300px]" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;"><div class="simplebar-content" style="padding: 0px;">
                                  <pre class="mt-0 language-html" tabindex="0"> <code class="language-html">
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-scroll-inside-body-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
Scroll inside body
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">id</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-scroll-inside-body-modal<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto h-[calc(100%-3.5rem)]<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>max-h-full overflow-hidden flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>font-bold text-base text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               Modal title
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-scroll-inside-body-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>sr-only<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Close<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>ti ti-x text-xl<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>p-4 overflow-y-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>space-y-4<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span><span class="token punctuation">&gt;</span></span>
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>text-lg font-semibold text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Be bold<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>mt-1 text-base text-gray-800 dark:text-gray-400<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
                     Motivate teams to do their best work. Offer best practices to get users going in the right direction. Be bold and offer just enough help to get the work started, and then get out of the way. Give accurate information so users can make educated decisions. Know your user's struggles and desired outcomes and give just enough information to let them get where they need to go.
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
               <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
               <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span><span class="token punctuation">&gt;</span></span>
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>text-lg font-semibold text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Be optimistic<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>mt-1 text-base text-gray-800 dark:text-gray-400<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
                     Focusing on the details gives people confidence in our products. Weave a consistent story across our fabric and be diligent about vocabulary across all messaging by being brand conscious across products to create a seamless flow across all the things. Let people know that they can jump in and start working expecting to find a dependable experience across all the things. Keep teams in the loop about what is happening by informing them of relevant features, products and opportunities for success. Be on the journey with them and highlight the key points that will help them the most - right now. Be in the moment by focusing attention on the important bits first.
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
               <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
               <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span><span class="token punctuation">&gt;</span></span>
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>text-lg font-semibold text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Be practical, with a wink<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>mt-1 text-base text-gray-800 dark:text-gray-400<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
                     Keep our own story short and give teams just enough to get moving. Get to the point and be direct. Be concise - we tell the story of how we can help, but we do it directly and with purpose. Be on the lookout for opportunities and be quick to offer a helping hand. At the same time realize that nobody likes a nosy neighbor. Give the user just enough to know that something awesome is around the corner and then get out of the way. Write clear, accurate, and concise text that makes interfaces more usable and consistent - and builds trust. We strive to write text that is understandable by anyone, anywhere, regardless of their culture or language so that everyone feels they are part of the team.
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
               <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-scroll-inside-body-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Close
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Save changes
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-semibold rounded-md border border-transparent bg-error text-white hover:bg-erroremphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-scroll-inside-viewport-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
Scroll inside viewport
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">id</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-scroll-inside-viewport-modal<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>font-bold text-base text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               Modal title
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-scroll-inside-viewport-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>sr-only<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Close<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>ti ti-x text-xl<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>p-4 overflow-y-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>space-y-4<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span><span class="token punctuation">&gt;</span></span>
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>text-lg font-semibold text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Be bold<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>mt-1 text-base text-gray-800 dark:text-gray-400<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
                     Motivate teams to do their best work. Offer best practices to get users going in the right direction. Be bold and offer just enough help to get the work started, and then get out of the way. Give accurate information so users can make educated decisions. Know your user's struggles and desired outcomes and give just enough information to let them get where they need to go.
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
               <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
               <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span><span class="token punctuation">&gt;</span></span>
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>text-lg font-semibold text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Be optimistic<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>mt-1 text-base text-gray-800 dark:text-gray-400<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
                     Focusing on the details gives people confidence in our products. Weave a consistent story across our fabric and be diligent about vocabulary across all messaging by being brand conscious across products to create a seamless flow across all the things. Let people know that they can jump in and start working expecting to find a dependable experience across all the things. Keep teams in the loop about what is happening by informing them of relevant features, products and opportunities for success. Be on the journey with them and highlight the key points that will help them the most - right now. Be in the moment by focusing attention on the important bits first.
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
               <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
               <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span><span class="token punctuation">&gt;</span></span>
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>text-lg font-semibold text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Be practical, with a wink<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>mt-1 text-base text-gray-800 dark:text-gray-400<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
                     Keep our own story short and give teams just enough to get moving. Get to the point and be direct. Be concise - we tell the story of how we can help, but we do it directly and with purpose. Be on the lookout for opportunities and be quick to offer a helping hand. At the same time realize that novbody likes a nosy neighbor. Give the user just enough to know that something awesome is around the corner and then get out of the way. Write clear, accurate, and concise text that makes interfaces more usable and consistent - and builds trust. We strive to write text that is understandable by anyone, anywhere, regardless of their culture or language so that everyone feels they are part of the team.
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
               <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-scroll-inside-viewport-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Close
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Save changes
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
            </code>
                                                    </pre>
                                </div></div></div></div><div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none;"></div></div></div>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- end -->
                    </div>
                   <div class="flex flex-wrap gap-2">
                    <button type="button" class="btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-scroll-inside-body-modal" aria-expanded="false">
                        Scroll inside body
                      </button>

                      <div id="hs-scroll-inside-body-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto h-[calc(100%-3.5rem)]">
                            <div class="max-h-full overflow-hidden flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                              <div class="flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700">
                                <h3 class="font-bold text-base text-gray-800 dark:text-white">
                                  Modal title
                                </h3>
                                <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-scroll-inside-body-modal" aria-expanded="false">
                                  <span class="sr-only">Close</span>
                                  <i class="ti ti-x text-xl"></i>
                                </button>
                              </div>
                              <div class="p-4 overflow-y-auto">
                                <div class="space-y-4">
                                  <div>
                                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Be bold</h3>
                                    <p class="mt-1 text-base text-gray-800 dark:text-gray-400">
                                      Motivate teams to do their best work. Offer best practices to get users going in the right direction. Be bold and offer just enough help to get the work started, and then get out of the way. Give accurate information so users can make educated decisions. Know your user's struggles and desired outcomes and give just enough information to let them get where they need to go.
                                    </p>
                                  </div>

                                  <div>
                                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Be optimistic</h3>
                                    <p class="mt-1 text-base text-gray-800 dark:text-gray-400">
                                      Focusing on the details gives people confidence in our products. Weave a consistent story across our fabric and be diligent about vocabulary across all messaging by being brand conscious across products to create a seamless flow across all the things. Let people know that they can jump in and start working expecting to find a dependable experience across all the things. Keep teams in the loop about what is happening by informing them of relevant features, products and opportunities for success. Be on the journey with them and highlight the key points that will help them the most - right now. Be in the moment by focusing attention on the important bits first.
                                    </p>
                                  </div>

                                  <div>
                                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Be practical, with a wink</h3>
                                    <p class="mt-1 text-base text-gray-800 dark:text-gray-400">
                                      Keep our own story short and give teams just enough to get moving. Get to the point and be direct. Be concise - we tell the story of how we can help, but we do it directly and with purpose. Be on the lookout for opportunities and be quick to offer a helping hand. At the same time realize that nobody likes a nosy neighbor. Give the user just enough to know that something awesome is around the corner and then get out of the way. Write clear, accurate, and concise text that makes interfaces more usable and consistent - and builds trust. We strive to write text that is understandable by anyone, anywhere, regardless of their culture or language so that everyone feels they are part of the team.
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700">
                                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-scroll-inside-body-modal" aria-expanded="false">
                                  Close
                                </button>
                                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                  Save changes
                                </button>
                              </div>
                            </div>
                          </div>
                      </div>

                      <button type="button" class="btn-md text-sm font-semibold rounded-md border border-transparent bg-error text-white hover:bg-erroremphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-scroll-inside-viewport-modal" aria-expanded="false">
                        Scroll inside viewport
                      </button>

                      <div id="hs-scroll-inside-viewport-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                          <div class="flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                            <div class="flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700">
                              <h3 class="font-bold text-base text-gray-800 dark:text-white">
                                Modal title
                              </h3>
                              <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-scroll-inside-viewport-modal" aria-expanded="false">
                                <span class="sr-only">Close</span>
                                <i class="ti ti-x text-xl"></i>
                              </button>
                            </div>
                            <div class="p-4 overflow-y-auto">
                              <div class="space-y-4">
                                <div>
                                  <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Be bold</h3>
                                  <p class="mt-1 text-base text-gray-800 dark:text-gray-400">
                                    Motivate teams to do their best work. Offer best practices to get users going in the right direction. Be bold and offer just enough help to get the work started, and then get out of the way. Give accurate information so users can make educated decisions. Know your user's struggles and desired outcomes and give just enough information to let them get where they need to go.
                                  </p>
                                </div>

                                <div>
                                  <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Be optimistic</h3>
                                  <p class="mt-1 text-base text-gray-800 dark:text-gray-400">
                                    Focusing on the details gives people confidence in our products. Weave a consistent story across our fabric and be diligent about vocabulary across all messaging by being brand conscious across products to create a seamless flow across all the things. Let people know that they can jump in and start working expecting to find a dependable experience across all the things. Keep teams in the loop about what is happening by informing them of relevant features, products and opportunities for success. Be on the journey with them and highlight the key points that will help them the most - right now. Be in the moment by focusing attention on the important bits first.
                                  </p>
                                </div>

                                <div>
                                  <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Be practical, with a wink</h3>
                                  <p class="mt-1 text-base text-gray-800 dark:text-gray-400">
                                    Keep our own story short and give teams just enough to get moving. Get to the point and be direct. Be concise - we tell the story of how we can help, but we do it directly and with purpose. Be on the lookout for opportunities and be quick to offer a helping hand. At the same time realize that novbody likes a nosy neighbor. Give the user just enough to know that something awesome is around the corner and then get out of the way. Write clear, accurate, and concise text that makes interfaces more usable and consistent - and builds trust. We strive to write text that is understandable by anyone, anywhere, regardless of their culture or language so that everyone feels they are part of the team.
                                  </p>
                                </div>
                              </div>
                            </div>
                            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700">
                              <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-scroll-inside-viewport-modal" aria-expanded="false">
                                Close
                              </button>
                              <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                Save changes
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                   </div>
                  </div>
                </div>
              </div>
              <div class=" lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                <div class="card">
                  <div class="card-body">
                     <div class="flex justify-between items-center mb-0">
                      <h5 class="card-title mb-0">Vertically centered</h5>
                      <button class="w-9 h-9 flex items-center justify-center rounded-full bg-lightprimary text-primary hover:bg-primary hover:text-white dark:bg-darkprimary dark:hover:bg-primary" data-hs-overlay="#hs-focus-management-modal6" aria-expanded="false">
                        <i class="ti ti-code text-xl"></i>
                      </button>
                      <div id="hs-focus-management-modal6" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden w-full h-full fixed top-0 start-0 z-[60] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none">
                        <div class="hs-overlay-open:opacity-100 hs-overlay-open:duration-500 opacity-0 transition-all lg:max-w-4xl lg:w-full m-3 lg:mx-auto">
                          <div class="flex flex-col bg-white dark:bg-dark  shadow-md dark:shadow-dark-md rounded-md pointer-events-auto">
                            <div class="items-center gap-x-2 py-3 px-4 dark:border-darkborder">

                              <div class="overflow-hidden">
                                <div class="flex justify-between">
                                  <h5 class="text-lg font-semibold mb-4 px-4 text-dark dark:text-white">Vertically centered -
                                    View Code</h5>
                                  <button type="button" class="flex justify-center items-center size-7 text-base font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100  dark:text-white dark:hover:bg-gray-700" data-hs-overlay="#hs-focus-management-modal6" aria-expanded="false">
                                    <span class="sr-only">Close</span>
                                     <i class="ti ti-x text-xl"></i>
                                  </button>
                                </div>

                                <div class="message-body max-h-[300px]" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;"><div class="simplebar-content" style="padding: 0px;">
                                  <pre class="mt-0 language-html" tabindex="0"> <code class="language-html">
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-vertically-centered-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
Vertically centered modal
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">id</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-vertically-centered-modal<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      "&gt;
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>font-bold text-base text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               Modal title
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-vertically-centered-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>sr-only<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Close<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>ti ti-x text-xl<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>p-4 overflow-y-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>mt-1 text-base text-gray-800 dark:text-gray-400<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               This is a wider card with supporting text below as a natural lead-in to additional content.
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-vertically-centered-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Close
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Save changes
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-semibold rounded-md border border-transparent bg-secondary text-white hover:bg-secondaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-vertically-centered-scrollable-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
Vertically centered scrollable modal
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">id</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-vertically-centered-scrollable-modal<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto h-[calc(100%-3.5rem)]<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>max-h-full overflow-hidden flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>font-bold text-base text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               Modal title
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-vertically-centered-scrollable-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>sr-only<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Close<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>ti ti-x text-xl<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>p-4 overflow-y-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>space-y-4<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span><span class="token punctuation">&gt;</span></span>
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>text-lg font-semibold text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Be bold<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>mt-1 text-base text-gray-800 dark:text-gray-400<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
                     Motivate teams to do their best work. Offer best practices to get users going in the right direction. Be bold and offer just enough help to get the work started, and then get out of the way. Give accurate information so users can make educated decisions. Know your user's struggles and desired outcomes and give just enough information to let them get where they need to go.
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
               <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
               <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span><span class="token punctuation">&gt;</span></span>
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>text-lg font-semibold text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Be optimistic<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>mt-1 text-base text-gray-800 dark:text-gray-400<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
                     Focusing on the details gives people confidence in our products. Weave a consistent story across our fabric and be diligent about vocabulary across all messaging by being brand conscious across products to create a seamless flow across all the things. Let people know that they can jump in and start working expecting to find a dependable experience across all the things. Keep teams in the loop about what is happening by informing them of relevant features, products and opportunities for success. Be on the journey with them and highlight the key points that will help them the most - right now. Be in the moment by focusing attention on the important bits first.
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
               <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
               <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span><span class="token punctuation">&gt;</span></span>
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>text-lg font-semibold text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Be practical, with a wink<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>mt-1 text-base text-gray-800 dark:text-gray-400<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
                     Keep our own story short and give teams just enough to get moving. Get to the point and be direct. Be concise - we tell the story of how we can help, but we do it directly and with purpose. Be on the lookout for opportunities and be quick to offer a helping hand. At the same time realize that nobody likes a nosy neighbor. Give the user just enough to know that something awesome is around the corner and then get out of the way. Write clear, accurate, and concise text that makes interfaces more usable and consistent - and builds trust. We strive to write text that is understandable by anyone, anywhere, regardless of their culture or language so that everyone feels they are part of the team.
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
               <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-vertically-centered-scrollable-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Close
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Save changes
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
            </code>
                                                    </pre>
                                </div></div></div></div><div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none;"></div></div></div>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- end -->
                    </div>
                    <p class="text-sm mb-6">Vertically centered modal examples</p>
                      <div class="flex flex-wrap gap-2">
                        <button type="button" class="btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-vertically-centered-modal" aria-expanded="false">
                            Vertically centered modal
                          </button>
                          <div id="hs-vertically-centered-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                            <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">"&gt;
                              <div class="flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                                <div class="flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700">
                                  <h3 class="font-bold text-base text-gray-800 dark:text-white">
                                    Modal title
                                  </h3>
                                  <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-vertically-centered-modal" aria-expanded="false">
                                    <span class="sr-only">Close</span>
                                    <i class="ti ti-x text-xl"></i>
                                  </button>
                                </div>
                                <div class="p-4 overflow-y-auto">
                                  <p class="mt-1 text-base text-gray-800 dark:text-gray-400">
                                    This is a wider card with supporting text below as a natural lead-in to additional content.
                                  </p>
                                </div>
                                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700">
                                  <button type="button" class="btn-md text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-vertically-centered-modal" aria-expanded="false">
                                    Close
                                  </button>
                                  <button type="button" class="btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                    Save changes
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>


                          <button type="button" class="btn-md text-sm font-semibold rounded-md border border-transparent bg-secondary text-white hover:bg-secondaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-vertically-centered-scrollable-modal" aria-expanded="false">
                            Vertically centered scrollable modal
                          </button>

                          <div id="hs-vertically-centered-scrollable-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                            <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto h-[calc(100%-3.5rem)]">
                              <div class="max-h-full overflow-hidden flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                                <div class="flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700">
                                  <h3 class="font-bold text-base text-gray-800 dark:text-white">
                                    Modal title
                                  </h3>
                                  <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-vertically-centered-scrollable-modal" aria-expanded="false">
                                    <span class="sr-only">Close</span>
                                    <i class="ti ti-x text-xl"></i>
                                  </button>
                                </div>
                                <div class="p-4 overflow-y-auto">
                                  <div class="space-y-4">
                                    <div>
                                      <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Be bold</h3>
                                      <p class="mt-1 text-base text-gray-800 dark:text-gray-400">
                                        Motivate teams to do their best work. Offer best practices to get users going in the right direction. Be bold and offer just enough help to get the work started, and then get out of the way. Give accurate information so users can make educated decisions. Know your user's struggles and desired outcomes and give just enough information to let them get where they need to go.
                                      </p>
                                    </div>

                                    <div>
                                      <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Be optimistic</h3>
                                      <p class="mt-1 text-base text-gray-800 dark:text-gray-400">
                                        Focusing on the details gives people confidence in our products. Weave a consistent story across our fabric and be diligent about vocabulary across all messaging by being brand conscious across products to create a seamless flow across all the things. Let people know that they can jump in and start working expecting to find a dependable experience across all the things. Keep teams in the loop about what is happening by informing them of relevant features, products and opportunities for success. Be on the journey with them and highlight the key points that will help them the most - right now. Be in the moment by focusing attention on the important bits first.
                                      </p>
                                    </div>

                                    <div>
                                      <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Be practical, with a wink</h3>
                                      <p class="mt-1 text-base text-gray-800 dark:text-gray-400">
                                        Keep our own story short and give teams just enough to get moving. Get to the point and be direct. Be concise - we tell the story of how we can help, but we do it directly and with purpose. Be on the lookout for opportunities and be quick to offer a helping hand. At the same time realize that nobody likes a nosy neighbor. Give the user just enough to know that something awesome is around the corner and then get out of the way. Write clear, accurate, and concise text that makes interfaces more usable and consistent - and builds trust. We strive to write text that is understandable by anyone, anywhere, regardless of their culture or language so that everyone feels they are part of the team.
                                      </p>
                                    </div>
                                  </div>
                                </div>
                                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700">
                                  <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-vertically-centered-scrollable-modal" aria-expanded="false">
                                    Close
                                  </button>
                                  <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                    Save changes
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class=" lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                <div class="card">
                  <div class="card-body">
                     <div class="flex justify-between items-center mb-0">
                      <h5 class="card-title mb-0">Focus management</h5>
                      <button class="w-9 h-9 flex items-center justify-center rounded-full bg-lightprimary text-primary hover:bg-primary hover:text-white dark:bg-darkprimary dark:hover:bg-primary" data-hs-overlay="#hs-focus-management-modal7" aria-expanded="false">
                        <i class="ti ti-code text-xl"></i>
                      </button>
                      <div id="hs-focus-management-modal7" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden w-full h-full fixed top-0 start-0 z-[60] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none">
                        <div class="hs-overlay-open:opacity-100 hs-overlay-open:duration-500 opacity-0 transition-all lg:max-w-4xl lg:w-full m-3 lg:mx-auto">
                          <div class="flex flex-col bg-white dark:bg-dark  shadow-md dark:shadow-dark-md rounded-md pointer-events-auto">
                            <div class="items-center gap-x-2 py-3 px-4 dark:border-darkborder">

                              <div class="overflow-hidden">
                                <div class="flex justify-between">
                                  <h5 class="text-lg font-semibold mb-4 px-4 text-dark dark:text-white">Focus management -
                                    View Code</h5>
                                  <button type="button" class="flex justify-center items-center size-7 text-base font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100  dark:text-white dark:hover:bg-gray-700" data-hs-overlay="#hs-focus-management-modal7" aria-expanded="false">
                                    <span class="sr-only">Close</span>
                                     <i class="ti ti-x text-xl"></i>
                                  </button>
                                </div>

                                <div class="message-body max-h-[300px]" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;"><div class="simplebar-content" style="padding: 0px;">
                                  <pre class="mt-0 language-html" tabindex="0"> <code class="language-html">
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-focus-management-modals<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
Focus Modal
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">id</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-focus-management-modals<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>font-bold text-base text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               Modal title
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-focus-management-modals<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>sr-only<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Close<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>ti ti-x text-xl<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>p-4 overflow-y-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>label</span> <span class="token attr-name">for</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>input-label<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>block text-gray-800 text-sm font-medium mb-2 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Email<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>label</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>input</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>email<span class="token punctuation">"</span></span> <span class="token attr-name">id</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>input-label<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-primary focus:ring-primary dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400<span class="token punctuation">"</span></span> <span class="token attr-name">placeholder</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>you@site.com<span class="token punctuation">"</span></span> <span class="token attr-name">autofocus</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-focus-management-modals<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Close
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Save changes
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
            </code>
                                                    </pre>
                                </div></div></div></div><div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none;"></div></div></div>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- end -->
                    </div>
                    <p class="card-subtitle  mb-6">Pass the <code class="text-error bg-lightwarning dark:bg-darkwarning">'autoFocus'</code> prop an element <code class="text-error bg-lightwarning dark:bg-darkwarning">'ref'</code> to focus on a specific element.</p>
                    <button type="button" class="btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-focus-management-modals" aria-expanded="false">
                        Focus Modal
                      </button>

                      <div id="hs-focus-management-modals" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                          <div class="flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                            <div class="flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700">
                              <h3 class="font-bold text-base text-gray-800 dark:text-white">
                                Modal title
                              </h3>
                              <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-focus-management-modals" aria-expanded="false">
                                <span class="sr-only">Close</span>
                                <i class="ti ti-x text-xl"></i>
                              </button>
                            </div>
                            <div class="p-4 overflow-y-auto">
                              <label for="input-label" class="block text-gray-800 text-sm font-medium mb-2 dark:text-white">Email</label>
                              <input type="email" id="input-label" class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-primary focus:ring-primary dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400" placeholder="you@site.com" autofocus="">
                            </div>
                            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700">
                              <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-focus-management-modals" aria-expanded="false">
                                Close
                              </button>
                              <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                Save changes
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class=" lg:col-span-12 md:col-span-12 sm:col-span-12 col-span-12">
                <div class="card">
                  <div class="card-body">
                     <div class="flex justify-between items-center mb-0">
                      <h5 class="card-title mb-0">Fullscreen Modal</h5>
                      <button class="w-9 h-9 flex items-center justify-center rounded-full bg-lightprimary text-primary hover:bg-primary hover:text-white dark:bg-darkprimary dark:hover:bg-primary" data-hs-overlay="#hs-focus-management-modal8" aria-expanded="false">
                        <i class="ti ti-code text-xl"></i>
                      </button>
                      <div id="hs-focus-management-modal8" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden w-full h-full fixed top-0 start-0 z-[60] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none">
                        <div class="hs-overlay-open:opacity-100 hs-overlay-open:duration-500 opacity-0 transition-all lg:max-w-4xl lg:w-full m-3 lg:mx-auto">
                          <div class="flex flex-col bg-white dark:bg-dark  shadow-md dark:shadow-dark-md rounded-md pointer-events-auto">
                            <div class="items-center gap-x-2 py-3 px-4 dark:border-darkborder">

                              <div class="overflow-hidden">
                                <div class="flex justify-between">
                                  <h5 class="text-lg font-semibold mb-4 px-4 text-dark dark:text-white">Fullscreen Modal -
                                    View Code</h5>
                                  <button type="button" class="flex justify-center items-center size-7 text-base font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100  dark:text-white dark:hover:bg-gray-700" data-hs-overlay="#hs-focus-management-modal8" aria-expanded="false">
                                    <span class="sr-only">Close</span>
                                     <i class="ti ti-x text-xl"></i>
                                  </button>
                                </div>

                                <div class="message-body max-h-[300px]" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;"><div class="simplebar-content" style="padding: 0px;">
                                  <pre class="mt-0 language-html" tabindex="0"> <code class="language-html">
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>m-1 ms-0 btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-full-screen-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
Full screen
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">id</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-full-screen-modal<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay-open:mt-0 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-10 opacity-0 transition-all max-w-full h-full<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex flex-col bg-white dark:bg-gray-800 h-full pointer-events-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>font-bold text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               Modal title
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-full-screen-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>sr-only<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Close<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>ti ti-x text-xl<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>p-4 overflow-y-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>mt-1 text-gray-800 dark:text-gray-400<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               This is a wider card with supporting text below as a natural lead-in to additional content.
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-end items-center gap-x-2 py-3 mt-auto px-4 border-t dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-full-screen-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Close
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Save changes
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>m-1 ms-0 btn-md text-sm font-semibold rounded-md border border-transparent bg-secondary text-white hover:bg-secondaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-full-screen-modal-below-sm<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
Full screen below sm
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">id</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-full-screen-modal-below-sm<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay-open:mt-0 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-10 opacity-0 transition-all max-w-full sm:hs-overlay-open:mt-10 sm:mt-0 sm:max-w-lg sm:mx-auto sm:h-auto h-full<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex flex-col bg-white sm:border sm:rounded-md sm:shadow-sm sm:h-auto h-full dark:bg-gray-800 sm:dark:border-gray-700 pointer-events-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>font-bold text-base text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               Modal title
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-full-screen-modal-below-sm<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>sr-only<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Close<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>ti ti-x text-xl<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>p-4 overflow-y-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>mt-1 text-base text-gray-800 dark:text-gray-400<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               This is a wider card with supporting text below as a natural lead-in to additional content.
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-end items-center gap-x-2 py-3 px-4 border-t mt-auto dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-full-screen-modal-below-sm<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Close
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Save changes
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>m-1 ms-0 btn-md text-sm font-semibold rounded-md border border-transparent bg-success text-white hover:bg-successemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-full-screen-modal-below-md<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
Full screen below md
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">id</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-full-screen-modal-below-md<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay hidden size-full fixed top-0 start-0 z-[120] overflow-x-hidden overflow-y-auto pointer-events-none<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay-open:mt-0 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-10 opacity-0 transition-all max-w-full md:hs-overlay-open:mt-10 md:mt-0 md:max-w-lg md:mx-auto md:h-auto h-full<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex flex-col bg-white md:border md:rounded-md md:shadow-sm md:h-auto h-full dark:bg-gray-800 md:dark:border-gray-700 pointer-events-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>font-bold text-base text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               Modal title
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-full-screen-modal-below-md<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>sr-only<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Close<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>ti ti-x text-xl<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>p-4 overflow-y-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>mt-1 text-base text-gray-800 dark:text-gray-400<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               This is a wider card with supporting text below as a natural lead-in to additional content.
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-end items-center gap-x-2 py-3 px-4 border-t mt-auto dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-full-screen-modal-below-md<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Close
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Save changes
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>m-1 ms-0 btn-md text-sm font-semibold rounded-md border border-transparent bg-warning text-white hover:bg-warningemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-full-screen-modal-below-lg<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
Full screen below lg
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">id</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-full-screen-modal-below-lg<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay hidden size-full fixed top-0 start-0 z-[120] overflow-x-hidden overflow-y-auto pointer-events-none<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay-open:mt-0 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-10 opacity-0 transition-all max-w-full lg:hs-overlay-open:mt-10 lg:mt-0 lg:max-w-lg lg:mx-auto lg:h-auto h-full<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex flex-col bg-white lg:border lg:rounded-md lg:shadow-sm lg:h-auto h-full dark:bg-gray-800 lg:dark:border-gray-700 pointer-events-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>font-bold text-base text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               Modal title
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-full-screen-modal-below-lg<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>sr-only<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Close<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>ti ti-x text-xl<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>p-4 overflow-y-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>mt-1 text-base text-gray-800 dark:text-gray-400<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               This is a wider card with supporting text below as a natural lead-in to additional content.
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-end items-center gap-x-2 py-3 px-4 border-t mt-auto dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-full-screen-modal-below-lg<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Close
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Save changes
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>m-1 ms-0 btn-md text-sm font-semibold rounded-md border border-transparent bg-error text-white hover:bg-erroremphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-full-screen-modal-below-xl<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
Full screen below xl
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">id</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-full-screen-modal-below-xl<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay hidden size-full fixed top-0 start-0 z-[120] overflow-x-hidden overflow-y-auto pointer-events-none<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay-open:mt-0 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-10 opacity-0 transition-all max-w-full xl:hs-overlay-open:mt-10 xl:mt-0 xl:max-w-lg xl:mx-auto xl:h-auto h-full<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex flex-col bg-white xl:border xl:rounded-md xl:shadow-sm xl:h-auto h-full dark:bg-gray-800 xl:dark:border-gray-700 pointer-events-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>font-bold text-base text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               Modal title
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-full-screen-modal-below-xl<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>sr-only<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Close<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>ti ti-x text-xl<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>p-4 overflow-y-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>mt-1 text-base text-gray-800 dark:text-gray-400<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               This is a wider card with supporting text below as a natural lead-in to additional content.
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-end items-center gap-x-2 py-3 px-4 border-t mt-auto dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-full-screen-modal-below-xl<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Close
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Save changes
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
            </code>
                                                    </pre>
                                </div></div></div></div><div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none;"></div></div></div>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- end -->
                    </div>
                    <p class="card-subtitle  mb-6">Another override is the option to pop up a modal that covers the user viewport.</p>
                      <div class="flex flex-wrap gap-2">
                        <button type="button" class="m-1 ms-0 btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-full-screen-modal" aria-expanded="false">
                            Full screen
                          </button>
                          <div id="hs-full-screen-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                            <div class="hs-overlay-open:mt-0 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-10 opacity-0 transition-all max-w-full h-full">
                              <div class="flex flex-col bg-white dark:bg-gray-800 h-full pointer-events-auto">
                                <div class="flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700">
                                  <h3 class="font-bold text-gray-800 dark:text-white">
                                    Modal title
                                  </h3>
                                  <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-full-screen-modal" aria-expanded="false">
                                    <span class="sr-only">Close</span>
                                    <i class="ti ti-x text-xl"></i>
                                  </button>
                                </div>
                                <div class="p-4 overflow-y-auto">
                                  <p class="mt-1 text-gray-800 dark:text-gray-400">
                                    This is a wider card with supporting text below as a natural lead-in to additional content.
                                  </p>
                                </div>
                                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700 mt-auto">
                                  <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-full-screen-modal" aria-expanded="false">
                                    Close
                                  </button>
                                  <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                    Save changes
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <button type="button" class="m-1 ms-0 btn-md text-sm font-semibold rounded-md border border-transparent bg-secondary text-white hover:bg-secondaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-full-screen-modal-below-sm" aria-expanded="false">
                            Full screen below sm
                          </button>
                          <div id="hs-full-screen-modal-below-sm" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                            <div class="hs-overlay-open:mt-0 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-10 opacity-0 transition-all max-w-full sm:hs-overlay-open:mt-10 sm:mt-0 sm:max-w-lg sm:mx-auto sm:h-auto h-full">
                              <div class="flex flex-col bg-white sm:border sm:rounded-md sm:shadow-sm sm:h-auto h-full dark:bg-gray-800 sm:dark:border-gray-700 pointer-events-auto">
                                <div class="flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700">
                                  <h3 class="font-bold text-base text-gray-800 dark:text-white">
                                    Modal title
                                  </h3>
                                  <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-full-screen-modal-below-sm" aria-expanded="false">
                                    <span class="sr-only">Close</span>
                                     <i class="ti ti-x text-xl"></i>
                                  </button>
                                </div>
                                <div class="p-4 overflow-y-auto">
                                  <p class="mt-1 text-base text-gray-800 dark:text-gray-400">
                                    This is a wider card with supporting text below as a natural lead-in to additional content.
                                  </p>
                                </div>
                                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t mt-auto dark:border-gray-700">
                                  <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-full-screen-modal-below-sm" aria-expanded="false">
                                    Close
                                  </button>
                                  <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                    Save changes
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <button type="button" class="m-1 ms-0 btn-md text-sm font-semibold rounded-md border border-transparent bg-success text-white hover:bg-successemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-full-screen-modal-below-md" aria-expanded="false">
                            Full screen below md
                          </button>
                          <div id="hs-full-screen-modal-below-md" class="hs-overlay hidden size-full fixed top-0 start-0 z-[120] overflow-x-hidden overflow-y-auto pointer-events-none">
                            <div class="hs-overlay-open:mt-0 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-10 opacity-0 transition-all max-w-full md:hs-overlay-open:mt-10 md:mt-0 md:max-w-lg md:mx-auto md:h-auto h-full">
                              <div class="flex flex-col bg-white md:border md:rounded-md md:shadow-sm md:h-auto h-full dark:bg-gray-800 md:dark:border-gray-700 pointer-events-auto">
                                <div class="flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700">
                                  <h3 class="font-bold text-base text-gray-800 dark:text-white">
                                    Modal title
                                  </h3>
                                  <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-full-screen-modal-below-md" aria-expanded="false">
                                    <span class="sr-only">Close</span>
                                     <i class="ti ti-x text-xl"></i>
                                  </button>
                                </div>
                                <div class="p-4 overflow-y-auto">
                                  <p class="mt-1 text-base text-gray-800 dark:text-gray-400">
                                    This is a wider card with supporting text below as a natural lead-in to additional content.
                                  </p>
                                </div>
                                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t mt-auto dark:border-gray-700">
                                  <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-full-screen-modal-below-md" aria-expanded="false">
                                    Close
                                  </button>
                                  <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                    Save changes
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <button type="button" class="m-1 ms-0 btn-md text-sm font-semibold rounded-md border border-transparent bg-warning text-white hover:bg-warningemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-full-screen-modal-below-lg" aria-expanded="false">
                            Full screen below lg
                          </button>

                          <div id="hs-full-screen-modal-below-lg" class="hs-overlay hidden size-full fixed top-0 start-0 z-[120] overflow-x-hidden overflow-y-auto pointer-events-none">
                            <div class="hs-overlay-open:mt-0 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-10 opacity-0 transition-all max-w-full lg:hs-overlay-open:mt-10 lg:mt-0 lg:max-w-lg lg:mx-auto lg:h-auto h-full">
                              <div class="flex flex-col bg-white lg:border lg:rounded-md lg:shadow-sm lg:h-auto h-full dark:bg-gray-800 lg:dark:border-gray-700 pointer-events-auto">
                                <div class="flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700">
                                  <h3 class="font-bold text-base text-gray-800 dark:text-white">
                                    Modal title
                                  </h3>
                                  <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-full-screen-modal-below-lg" aria-expanded="false">
                                    <span class="sr-only">Close</span>
                                     <i class="ti ti-x text-xl"></i>
                                  </button>
                                </div>
                                <div class="p-4 overflow-y-auto">
                                  <p class="mt-1 text-base text-gray-800 dark:text-gray-400">
                                    This is a wider card with supporting text below as a natural lead-in to additional content.
                                  </p>
                                </div>
                                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t mt-auto dark:border-gray-700">
                                  <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-full-screen-modal-below-lg" aria-expanded="false">
                                    Close
                                  </button>
                                  <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                    Save changes
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>

                          <button type="button" class="m-1 ms-0 btn-md text-sm font-semibold rounded-md border border-transparent bg-error text-white hover:bg-erroremphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-full-screen-modal-below-xl" aria-expanded="false">
                            Full screen below xl
                          </button>

                          <div id="hs-full-screen-modal-below-xl" class="hs-overlay hidden size-full fixed top-0 start-0 z-[120] overflow-x-hidden overflow-y-auto pointer-events-none">
                            <div class="hs-overlay-open:mt-0 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-10 opacity-0 transition-all max-w-full xl:hs-overlay-open:mt-10 xl:mt-0 xl:max-w-lg xl:mx-auto xl:h-auto h-full">
                              <div class="flex flex-col bg-white xl:border xl:rounded-md xl:shadow-sm xl:h-auto h-full dark:bg-gray-800 xl:dark:border-gray-700 pointer-events-auto">
                                <div class="flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700">
                                  <h3 class="font-bold text-base text-gray-800 dark:text-white">
                                    Modal title
                                  </h3>
                                  <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-full-screen-modal-below-xl" aria-expanded="false">
                                    <span class="sr-only">Close</span>
                                     <i class="ti ti-x text-xl"></i>
                                  </button>
                                </div>
                                <div class="p-4 overflow-y-auto">
                                  <p class="mt-1 text-base text-gray-800 dark:text-gray-400">
                                    This is a wider card with supporting text below as a natural lead-in to additional content.
                                  </p>
                                </div>
                                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t mt-auto dark:border-gray-700">
                                  <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-full-screen-modal-below-xl" aria-expanded="false">
                                    Close
                                  </button>
                                  <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                    Save changes
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class=" lg:col-span-4 md:col-span-6 sm:col-span-12 col-span-12">
                <div class="card">
                  <div class="card-body">
                     <div class="flex justify-between items-center mb-0">
                      <h5 class="card-title mb-0">Toggle between modals</h5>
                      <button class="w-9 h-9 flex items-center justify-center rounded-full bg-lightprimary text-primary hover:bg-primary hover:text-white dark:bg-darkprimary dark:hover:bg-primary" data-hs-overlay="#hs-focus-management-modal9" aria-expanded="false">
                        <i class="ti ti-code text-xl"></i>
                      </button>
                      <div id="hs-focus-management-modal9" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden w-full h-full fixed top-0 start-0 z-[60] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none">
                        <div class="hs-overlay-open:opacity-100 hs-overlay-open:duration-500 opacity-0 transition-all lg:max-w-4xl lg:w-full m-3 lg:mx-auto">
                          <div class="flex flex-col bg-white dark:bg-dark  shadow-md dark:shadow-dark-md rounded-md pointer-events-auto">
                            <div class="items-center gap-x-2 py-3 px-4 dark:border-darkborder">

                              <div class="overflow-hidden">
                                <div class="flex justify-between">
                                  <h5 class="text-lg font-semibold mb-4 px-4 text-dark dark:text-white">Toggle between modals -
                                    View Code</h5>
                                  <button type="button" class="flex justify-center items-center size-7 text-base font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100  dark:text-white dark:hover:bg-gray-700" data-hs-overlay="#hs-focus-management-modal9" aria-expanded="false">
                                    <span class="sr-only">Close</span>
                                     <i class="ti ti-x text-xl"></i>
                                  </button>
                                </div>

                                <div class="message-body max-h-[300px]" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;"><div class="simplebar-content" style="padding: 0px;">
                                  <pre class="mt-0 language-html" tabindex="0"> <code class="language-html">
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-toggle-between-modals-first-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
Toggle modal
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">id</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-toggle-between-modals-first-modal<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>font-bold text-base text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               Modal 1
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-toggle-between-modals-first-modal<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay-close</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>sr-only<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Close<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>ti ti-x text-xl<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>p-4 overflow-y-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>mt-1 text-base text-gray-800 dark:text-gray-400<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               Show a second modal and hide this one with the button below.
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-toggle-between-modals-second-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Open second modal
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">id</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-toggle-between-modals-second-modal<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>font-bold text-base text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               Modal 2
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-toggle-between-modals-second-modal<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay-close</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>sr-only<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Close<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>ti ti-x text-xl<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>p-4 overflow-y-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>mt-1 text-base text-gray-800 dark:text-gray-400<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               Hide this modal and show the first with the button below.
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-toggle-between-modals-first-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Back to first
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
            </code>
                                                    </pre>
                                </div></div></div></div><div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none;"></div></div></div>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- end -->
                    </div>
                    <p class="text-sm mb-6">Toggle between two separate modals.</p>
                    <button type="button" class="btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-toggle-between-modals-first-modal" aria-expanded="false">
                        Toggle modal
                      </button>

                      <div id="hs-toggle-between-modals-first-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                          <div class="flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                            <div class="flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700">
                              <h3 class="font-bold text-base text-gray-800 dark:text-white">
                                Modal 1
                              </h3>
                              <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-toggle-between-modals-first-modal" data-hs-overlay-close="" aria-expanded="false">
                                <span class="sr-only">Close</span>
                                <i class="ti ti-x text-xl"></i>
                              </button>
                            </div>
                            <div class="p-4 overflow-y-auto">
                              <p class="mt-1 text-base text-gray-800 dark:text-gray-400">
                                Show a second modal and hide this one with the button below.
                              </p>
                            </div>
                            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700">
                              <button type="button" class="btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-toggle-between-modals-second-modal" aria-expanded="false">
                                Open second modal
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div id="hs-toggle-between-modals-second-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                          <div class="flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                            <div class="flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700">
                              <h3 class="font-bold text-base text-gray-800 dark:text-white">
                                Modal 2
                              </h3>
                              <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-toggle-between-modals-second-modal" data-hs-overlay-close="" aria-expanded="false">
                                <span class="sr-only">Close</span>
                                <i class="ti ti-x text-xl"></i>
                              </button>
                            </div>
                            <div class="p-4 overflow-y-auto">
                              <p class="mt-1 text-base text-gray-800 dark:text-gray-400">
                                Hide this modal and show the first with the button below.
                              </p>
                            </div>
                            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700">
                              <button type="button" class="btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-toggle-between-modals-first-modal" aria-expanded="false">
                                Back to first
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class=" lg:col-span-4 md:col-span-6 sm:col-span-12 col-span-12">
                <div class="card">
                  <div class="card-body">
                     <div class="flex justify-between items-center mb-0">
                      <h5 class="card-title mb-0">Stacked Overlays</h5>
                      <button class="w-9 h-9 flex items-center justify-center rounded-full bg-lightprimary text-primary hover:bg-primary hover:text-white dark:bg-darkprimary dark:hover:bg-primary" data-hs-overlay="#hs-focus-management-modal10" aria-expanded="false">
                        <i class="ti ti-code text-xl"></i>
                      </button>
                      <div id="hs-focus-management-modal10" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden w-full h-full fixed top-0 start-0 z-[60] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none">
                        <div class="hs-overlay-open:opacity-100 hs-overlay-open:duration-500 opacity-0 transition-all lg:max-w-4xl lg:w-full m-3 lg:mx-auto">
                          <div class="flex flex-col bg-white dark:bg-dark  shadow-md dark:shadow-dark-md rounded-md pointer-events-auto">
                            <div class="items-center gap-x-2 py-3 px-4 dark:border-darkborder">

                              <div class="overflow-hidden">
                                <div class="flex justify-between">
                                  <h5 class="text-lg font-semibold mb-4 px-4 text-dark dark:text-white">Stacked Overlays -
                                    View Code</h5>
                                  <button type="button" class="flex justify-center items-center size-7 text-base font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100  dark:text-white dark:hover:bg-gray-700" data-hs-overlay="#hs-focus-management-modal10" aria-expanded="false">
                                    <span class="sr-only">Close</span>
                                     <i class="ti ti-x text-xl"></i>
                                  </button>
                                </div>

                                <div class="message-body max-h-[300px]" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;"><div class="simplebar-content" style="padding: 0px;">
                                  <pre class="mt-0 language-html" tabindex="0"> <code class="language-html">
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-stacked-overlays<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
Stacked modal
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">id</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-stacked-overlays<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay hs-overlay-backdrop-open:bg-gray-900/50 hidden size-full fixed top-0 start-0 z-[60] overflow-x-hidden overflow-y-auto pointer-events-none<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>font-bold text-base text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               Modal title (level 1)
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-stacked-overlays<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>sr-only<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Close<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
               <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>svg</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex-shrink-0 size-4<span class="token punctuation">"</span></span> <span class="token attr-name">xmlns</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>http://www.w3.org/2000/svg<span class="token punctuation">"</span></span> <span class="token attr-name">width</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>24<span class="token punctuation">"</span></span> <span class="token attr-name">height</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>24<span class="token punctuation">"</span></span> <span class="token attr-name">viewBox</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>0 0 24 24<span class="token punctuation">"</span></span> <span class="token attr-name">fill</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>none<span class="token punctuation">"</span></span> <span class="token attr-name">stroke</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>currentColor<span class="token punctuation">"</span></span> <span class="token attr-name">stroke-width</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>2<span class="token punctuation">"</span></span> <span class="token attr-name">stroke-linecap</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>round<span class="token punctuation">"</span></span> <span class="token attr-name">stroke-linejoin</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>round<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>path</span> <span class="token attr-name">d</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>M18 6 6 18<span class="token punctuation">"</span></span><span class="token punctuation">/&gt;</span></span>
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>path</span> <span class="token attr-name">d</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>m6 6 12 12<span class="token punctuation">"</span></span><span class="token punctuation">/&gt;</span></span>
               <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>svg</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>p-4 overflow-y-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>mt-1 text-base mb-2 text-gray-800 dark:text-gray-400<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               Stacked Overlays modals are a user interface design concept where multiple overlay windows, or modals, are displayed on top of each other, typically in a web or app interface. These modals are often used to present additional information, confirm actions, or to guide users through multi-step processes. The key characteristic of Stacked Overlays is their layered appearance, where each new modal partially covers the previous one, creating a stack effect. This stacking can provide a visual cue to users about the depth of their interaction or the sequence of tasks. To maintain usability, these modals are designed with careful attention to transparency, size, and the ability to easily return to previous layers. They often incorporate animations for smooth transitions between layers and may include features like dimming the background to focus user attention on the active modal.
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-stacked-overlays-2<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay-options</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">'</span>{
               "isClosePrev": false
               }<span class="token punctuation">'</span></span><span class="token punctuation">&gt;</span></span>
            Open modal
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-stacked-overlays<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Close
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Save changes
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">id</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-stacked-overlays-2<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay hs-overlay-backdrop-open:bg-gray-900/70 hidden size-full fixed top-0 start-0 z-[70] overflow-x-hidden overflow-y-auto pointer-events-none<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>font-bold text-base text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               Modal title (level 2)
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-stacked-overlays-2<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay-options</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">'</span>{
               "isClosePrev": false
               }<span class="token punctuation">'</span></span><span class="token punctuation">&gt;</span></span>
               <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>sr-only<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Close<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
               <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>svg</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex-shrink-0 size-4<span class="token punctuation">"</span></span> <span class="token attr-name">xmlns</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>http://www.w3.org/2000/svg<span class="token punctuation">"</span></span> <span class="token attr-name">width</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>24<span class="token punctuation">"</span></span> <span class="token attr-name">height</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>24<span class="token punctuation">"</span></span> <span class="token attr-name">viewBox</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>0 0 24 24<span class="token punctuation">"</span></span> <span class="token attr-name">fill</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>none<span class="token punctuation">"</span></span> <span class="token attr-name">stroke</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>currentColor<span class="token punctuation">"</span></span> <span class="token attr-name">stroke-width</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>2<span class="token punctuation">"</span></span> <span class="token attr-name">stroke-linecap</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>round<span class="token punctuation">"</span></span> <span class="token attr-name">stroke-linejoin</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>round<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>path</span> <span class="token attr-name">d</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>M18 6 6 18<span class="token punctuation">"</span></span><span class="token punctuation">/&gt;</span></span>
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>path</span> <span class="token attr-name">d</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>m6 6 12 12<span class="token punctuation">"</span></span><span class="token punctuation">/&gt;</span></span>
               <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>svg</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>p-4 overflow-y-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>mt-1 text-base mb-2 text-gray-800 dark:text-gray-400<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               Stacked Overlays modals represent a design approach in user interfaces, where several overlay windows, known as modals, are layered on top of one another. This is commonly seen in web or mobile application interfaces.
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-stacked-overlays-3<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay-options</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">'</span>{
               "isClosePrev": false
               }<span class="token punctuation">'</span></span><span class="token punctuation">&gt;</span></span>
            Open modal
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-stacked-overlays-2<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay-options</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">'</span>{
               "isClosePrev": false
               }<span class="token punctuation">'</span></span><span class="token punctuation">&gt;</span></span>
            Close
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Save changes
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">id</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-stacked-overlays-3<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay hs-overlay-backdrop-open:bg-gray-900/80 hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>font-bold text-base text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               Modal title (level 3)
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-stacked-overlays-3<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay-options</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">'</span>{
               "isClosePrev": false
               }<span class="token punctuation">'</span></span><span class="token punctuation">&gt;</span></span>
               <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>sr-only<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Close<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
               <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>svg</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex-shrink-0 size-4<span class="token punctuation">"</span></span> <span class="token attr-name">xmlns</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>http://www.w3.org/2000/svg<span class="token punctuation">"</span></span> <span class="token attr-name">width</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>24<span class="token punctuation">"</span></span> <span class="token attr-name">height</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>24<span class="token punctuation">"</span></span> <span class="token attr-name">viewBox</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>0 0 24 24<span class="token punctuation">"</span></span> <span class="token attr-name">fill</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>none<span class="token punctuation">"</span></span> <span class="token attr-name">stroke</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>currentColor<span class="token punctuation">"</span></span> <span class="token attr-name">stroke-width</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>2<span class="token punctuation">"</span></span> <span class="token attr-name">stroke-linecap</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>round<span class="token punctuation">"</span></span> <span class="token attr-name">stroke-linejoin</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>round<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>path</span> <span class="token attr-name">d</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>M18 6 6 18<span class="token punctuation">"</span></span><span class="token punctuation">/&gt;</span></span>
                  <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>path</span> <span class="token attr-name">d</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>m6 6 12 12<span class="token punctuation">"</span></span><span class="token punctuation">/&gt;</span></span>
               <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>svg</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>p-4 overflow-y-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>mt-1 text-base text-gray-800 dark:text-gray-400<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               Stacked Overlays: UI design with layered modals, often in web/apps, where each window overlays the previous one.
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-stacked-overlays-3<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay-options</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">'</span>{
               "isClosePrev": false
               }<span class="token punctuation">'</span></span><span class="token punctuation">&gt;</span></span>
            Close
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Save changes
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
            </code>
                                                    </pre>
                                </div></div></div></div><div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none;"></div></div></div>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- end -->
                    </div>
                    <p class="text-sm mb-6">modals are layered on top of one another.</p>
                    <button type="button" class="btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-stacked-overlays" aria-expanded="false">
                        Stacked modal
                      </button>

                      <div id="hs-stacked-overlays" class="hs-overlay hs-overlay-backdrop-open:bg-gray-900/50 hidden size-full fixed top-0 start-0 z-[60] overflow-x-hidden overflow-y-auto pointer-events-none">
                        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                          <div class="flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                            <div class="flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700">
                              <h3 class="font-bold text-base text-gray-800 dark:text-white">
                                Modal title (level 1)
                              </h3>
                              <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-stacked-overlays" aria-expanded="false">
                                <span class="sr-only">Close</span>
                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>
                              </button>
                            </div>

                            <div class="p-4 overflow-y-auto">
                              <p class="mt-1 text-base mb-2 text-gray-800 dark:text-gray-400">
                                Stacked Overlays modals are a user interface design concept where multiple overlay windows, or modals, are displayed on top of each other, typically in a web or app interface. These modals are often used to present additional information, confirm actions, or to guide users through multi-step processes. The key characteristic of Stacked Overlays is their layered appearance, where each new modal partially covers the previous one, creating a stack effect. This stacking can provide a visual cue to users about the depth of their interaction or the sequence of tasks. To maintain usability, these modals are designed with careful attention to transparency, size, and the ability to easily return to previous layers. They often incorporate animations for smooth transitions between layers and may include features like dimming the background to focus user attention on the active modal.
                              </p>

                              <button type="button" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-stacked-overlays-2" data-hs-overlay-options="{
                                &quot;isClosePrev&quot;: false
                              }" aria-expanded="false">
                                Open modal
                              </button>
                            </div>

                            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700">
                              <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-stacked-overlays" aria-expanded="false">
                                Close
                              </button>
                              <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                Save changes
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div id="hs-stacked-overlays-2" class="hs-overlay hs-overlay-backdrop-open:bg-gray-900/70 hidden size-full fixed top-0 start-0 z-[70] overflow-x-hidden overflow-y-auto pointer-events-none">
                        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                          <div class="flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                            <div class="flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700">
                              <h3 class="font-bold text-base text-gray-800 dark:text-white">
                                Modal title (level 2)
                              </h3>
                              <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-stacked-overlays-2" data-hs-overlay-options="{
                                &quot;isClosePrev&quot;: false
                              }" aria-expanded="false">
                                <span class="sr-only">Close</span>
                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>
                              </button>
                            </div>

                            <div class="p-4 overflow-y-auto">
                              <p class="mt-1 text-base mb-2 text-gray-800 dark:text-gray-400">
                                Stacked Overlays modals represent a design approach in user interfaces, where several overlay windows, known as modals, are layered on top of one another. This is commonly seen in web or mobile application interfaces.
                              </p>

                              <button type="button" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-stacked-overlays-3" data-hs-overlay-options="{
                                &quot;isClosePrev&quot;: false
                              }" aria-expanded="false">
                                Open modal
                              </button>
                            </div>

                            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700">
                              <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-stacked-overlays-2" data-hs-overlay-options="{
                                &quot;isClosePrev&quot;: false
                              }" aria-expanded="false">
                                Close
                              </button>
                              <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                Save changes
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div id="hs-stacked-overlays-3" class="hs-overlay hs-overlay-backdrop-open:bg-gray-900/80 hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                          <div class="flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                            <div class="flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700">
                              <h3 class="font-bold text-base text-gray-800 dark:text-white">
                                Modal title (level 3)
                              </h3>
                              <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-stacked-overlays-3" data-hs-overlay-options="{
                                &quot;isClosePrev&quot;: false
                              }" aria-expanded="false">
                                <span class="sr-only">Close</span>
                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>
                              </button>
                            </div>

                            <div class="p-4 overflow-y-auto">
                              <p class="mt-1 text-base text-gray-800 dark:text-gray-400">
                                Stacked Overlays: UI design with layered modals, often in web/apps, where each window overlays the previous one.
                              </p>
                            </div>

                            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700">
                              <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-stacked-overlays-3" data-hs-overlay-options="{
                                &quot;isClosePrev&quot;: false
                              }" aria-expanded="false">
                                Close
                              </button>
                              <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                Save changes
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
              <div class=" lg:col-span-4 md:col-span-6 sm:col-span-12 col-span-12">
                <div class="card">
                  <div class="card-body">
                     <div class="flex justify-between items-center mb-0">
                      <h5 class="card-title mb-0">Custom backdrop color</h5>
                      <button class="w-9 h-9 flex items-center justify-center rounded-full bg-lightprimary text-primary hover:bg-primary hover:text-white dark:bg-darkprimary dark:hover:bg-primary" data-hs-overlay="#hs-focus-management-modal11" aria-expanded="false">
                        <i class="ti ti-code text-xl"></i>
                      </button>
                      <div id="hs-focus-management-modal11" class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden w-full h-full fixed top-0 start-0 z-[60] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none">
                        <div class="hs-overlay-open:opacity-100 hs-overlay-open:duration-500 opacity-0 transition-all lg:max-w-4xl lg:w-full m-3 lg:mx-auto">
                          <div class="flex flex-col bg-white dark:bg-dark  shadow-md dark:shadow-dark-md rounded-md pointer-events-auto">
                            <div class="items-center gap-x-2 py-3 px-4 dark:border-darkborder">

                              <div class="overflow-hidden">
                                <div class="flex justify-between">
                                  <h5 class="text-lg font-semibold mb-4 px-4 text-dark dark:text-white">Custom backdrop color -
                                    View Code</h5>
                                  <button type="button" class="flex justify-center items-center size-7 text-base font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100  dark:text-white dark:hover:bg-gray-700" data-hs-overlay="#hs-focus-management-modal11" aria-expanded="false">
                                    <span class="sr-only">Close</span>
                                     <i class="ti ti-x text-xl"></i>
                                  </button>
                                </div>

                                <div class="message-body max-h-[300px]" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;"><div class="simplebar-content" style="padding: 0px;">
                                  <pre class="mt-0 language-html" tabindex="0"> <code class="language-html">
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-basic-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
Open modal
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">id</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-basic-modal<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>hs-overlay-open:opacity-100 hs-overlay-open:duration-500 opacity-0 transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>h3</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>font-bold text-base text-gray-800 dark:text-white<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               Modal title
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>h3</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-basic-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>span</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>sr-only<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>Close<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>span</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>i</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>ti ti-x text-xl<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>i</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>p-4 overflow-y-auto<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>p</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>mt-1 text-base text-gray-800 dark:text-gray-400<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
               This is a wider card with supporting text below as a natural lead-in to additional content.
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>p</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>div</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span> <span class="token attr-name">data-hs-overlay</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>#hs-basic-modal<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Close
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>button</span> <span class="token attr-name">type</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>button<span class="token punctuation">"</span></span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation attr-equals">=</span><span class="token punctuation">"</span>btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
            Save changes
            <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>button</span><span class="token punctuation">&gt;</span></span>
         <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
      <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
   <span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>div</span><span class="token punctuation">&gt;</span></span>
            </code>
                                                    </pre>
                                </div></div></div></div><div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none;"></div></div></div>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- end -->
                    </div>
                    <p class="card-subtitle  mb-6">Use <code class="text-error bg-lightwarning dark:bg-darkwarning">'hs-overlay-backdrop-open:'</code> to change the backdrop color.</p>
                    <button type="button" class="btn-md text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-custom-backdrop-modal" aria-expanded="false">
                        Custom Backdrop
                      </button>

                      <div id="hs-custom-backdrop-modal" class="hs-overlay hs-overlay-backdrop-open:bg-blue-900/80 hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none">
                        <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                          <div class="flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                            <div class="flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700">
                              <h3 class="font-bold text-base text-gray-800 dark:text-white">
                                Modal title
                              </h3>
                              <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-custom-backdrop-modal" aria-expanded="false">
                                <span class="sr-only">Close</span>
                                <i class="ti ti-x text-xl"></i>
                              </button>
                            </div>
                            <div class="p-4 overflow-y-auto">
                              <p class="mt-1 text-base text-gray-800 dark:text-gray-400">
                                This is a wider card with supporting text below as a natural lead-in to additional content.
                              </p>
                            </div>
                            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700">
                              <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#hs-custom-backdrop-modal" aria-expanded="false">
                                Close
                              </button>
                              <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                Save changes
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
        <!-- Main Content End -->
      </div>

        <div class="app-content" id="content">
            <div class="container-fluid">

                @yield('content')

            </div>
        </div>

    </div>

    </main>

    <script src="{{ asset('flowbite.min.js') }}"></script>

</body>

@include('layout.partials.footer')

@yield('js')
