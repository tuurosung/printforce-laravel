<!-- Sidebar -->
<!-- <div class="position-fixed collapse dont-collapse-sm app-sidebar bg-white-100" id="sidebar"> -->
<div class="app-sidebar bg-white-100" id="sidebar">
    <div class="app-sidebar-content ps" data-scrollbar="true" data-height="100%">
        <div class="menu mt-5">


            <x-printforce.sidebar.single-menu-item menuText="Dashboard" :menuLink="route('dashboard')"
                menuIcon="dashboard-panel" id="dashboard_nav" />

            <!-- Payments Menu -->
            <div class="menu-item has-sub">
                <a href="#" class="menu-link" id="orders_nav">
                    <i class="fi fi-rr-briefcase-dollar menu-icon"></i>
                    <span class="menu-text"> Jobs</span>
                    <span class="menu-caret">
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item">
                        <a href="{{ route('jobs.today') }}" class="menu-link" id="">
                            <span class="menu-text">Today's Jobs</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{ route('jobs.largeformat.index') }}" class="menu-link" id="">
                            <span class="menu-text">Large Format Jobs</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{ route('jobs.embroidery.index') }}" class="menu-link" id="">
                            <span class="menu-text">Embroidery Jobs</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{ route('jobs.design.index') }}" class="menu-link" id="">
                            <span class="menu-text">Design Jobs</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{ route('jobs.press.index') }}" class="menu-link" id="">
                            <span class="menu-text">Press Jobs</span>
                        </a>
                    </div>

                </div>
            </div>

            <x-printforce.sidebar.single-menu-item menuText="Customers" :menuLink="route('customers.customer.index')"
                menuIcon="users" id="customers_nav" />

            <x-printforce.sidebar.single-menu-item menuText="Debtors" :menuLink="route('customers.debtors.view')"
                menuIcon="sack-dollar" />

            <x-printforce.sidebar.single-menu-item menuText="Payment" :menuLink="route('payments.index')" />

            <x-printforce.sidebar.single-menu-item menuText="Invoices" menuIcon="file-invoice-dollar"
                :menuLink="route('invoices.index')" />

            <x-printforce.sidebar.single-menu-item menuText="Expenses" :menuLink="route('accounting.expenditure.index')"
                menuIcon="chart-histogram" />


        </div>

    </div>

</div>
<!-- Sidebar -->

<!-- </header> -->
<!--Main Navigation-->
