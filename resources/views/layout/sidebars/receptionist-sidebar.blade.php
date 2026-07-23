<aside id="application-sidebar-brand"
    class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full xl:rtl:-translate-x-0 rtl:translate-x-full  left-0 rtl:left-auto rtl:right-0 transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed top-0 with-vertical  left-sidebar transition-all duration-300 h-screen xl:z-[2] z-[60] flex-shrink-0 border-r rtl:border-l rtl:border-r-0 w-[270px] border-border dark:border-darkborder bg-white dark:bg-dark">
    <!-- ---------------------------------- -->
    <!-- Start Vertical Layout Sidebar -->
    <!-- ---------------------------------- -->
    <div class="py-5 px-5 flex justify-between">
        <div class="brand-logo flex  items-center w-full">
            <a href="../main/index.html" class="text-nowrap logo-img">
                <img src="{{ asset('images/logo.png') }}" class="dark:hidden block rtl:hidden w-40!" alt="Logo-Dark">
                <img src="{{ asset('images/logo.png') }}" class="dark:block hidden rtl:hidden rtl:dark:hidden w-fit!" alt="Logo-light">

                <img src="{{ asset('images/logo.png') }}"
                    class="dark:hidden hidden rtl:block rtl:dark:hidden w-fit!" alt="Logo-Dark">
                <img src="{{ asset('images/logo.png') }}"
                    class="dark:hidden hidden rtl:hidden rtl:dark:block w-fit!" alt="Logo-light">
            </a>
        </div>

    </div>
    <div class="overflow-hidden">
        <div class="scroll-sidebar simplebar-scrollable-y" data-simplebar="init">
            <div class="simplebar-wrapper" style="margin: 0px;">
                <div class="simplebar-height-auto-observer-wrapper">
                    <div class="simplebar-height-auto-observer"></div>
                </div>
                <div class="simplebar-mask">
                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                        <div class="simplebar-content-wrapper" tabindex="0" role="region"
                            aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                            <div class="simplebar-content" style="padding: 0px;">
                                <div class="px-6 mt-8 mini-layout" data-te-sidenav-menu-ref="">
                                    <nav class="hs-accordion-group w-full flex flex-col">
                                        <ul data-te-sidenav-menu-ref="" id="sidebarnav">



                                            <li class="sidebar-item">
                                                <a class="sidebar-link dark-sidebar-link flex align-middle" href="{{ route('dashboard') }}">
                                                    <i class="fi fi-rr-paper-plane shrink-0"></i>
                                                    <span class="hide-menu shrink-0 my-0">Dashboard</span>
                                                </a>
                                            </li>
                                            <x-sidebar.sidebar-item label="Customers" icon="users" href="{{ route('customers.customer.index') }}" />


                                            <x-sidebar.sidebar-item label="Jobs" icon="briefcase" href="{{ route('jobs.today') }}" />

                                            <x-sidebar.sidebar-item label="Debtors" icon="sack-dollar" href="{{ route('customers.debtors.view') }}" />

                                            <x-sidebar.sidebar-item label="Payments" icon="payroll-check" href="{{ route('payments.index') }}" />
                                            <x-sidebar.sidebar-item label="Invoices" icon="file-invoice-dollar" href="{{ route('invoices.index') }}" />

                                          

                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simplebar-placeholder" style="width: 269px; height: 3705px;"></div>
            </div>
            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
            </div>
            <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                <div class="simplebar-scrollbar"
                    style="height: 25px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
            </div>
        </div>
    </div>

    <!-- Bottom User Profile -->
    <div class="px-6 pt-6  bg-surface  dark:bg-dark-surface relative">
        <div class="bg-lightsecondary dark:bg-darksecondary p-4 rounded-md">
            <div class="hide-menu ">
                <div class="flex items-center">
                    <img src="{{ asset('images/user-1.jpg') }}" class="h-9 w-9 rounded-full object-cover"
                        alt="profile">
                    <div class="ml-4 rtl:mr-4 rtl:ml-0">
                        <h5 class="text-base font-semibold text-dark dark:text-white">{{ auth()->user()->name }}</h5>
                        <p class="text-xs font-normal text-link dark:text-darklink ">{{ auth()->user()->access_level->label() }}</p>
                    </div>
                    <div class="ms-auto hs-tooltip hs-tooltip-toggle">
                        <a href="javascript:void(0)"><i class="ti ti-power text-primary me-3 text-2xl "></i>
                            <span
                                class="tooltip hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible"
                                role="tooltip" style="position: fixed; left: 182.208px; top: 180.85px;">
                                Logout
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- </aside> -->

</aside>
