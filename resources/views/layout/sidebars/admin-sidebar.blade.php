<!-- Sidebar -->
<!-- <div class="position-fixed collapse dont-collapse-sm app-sidebar bg-white-100" id="sidebar"> -->
<div class="app-sidebar bg-white-100" id="sidebar">
    <div class="app-sidebar-content ps" data-scrollbar="true" data-height="100%">
        <div class="menu mt-5">

            @can('administrator')
                <x-printforce.sidebar.single-menu-item menuText="Dashboard" :menuLink="route('dashboard')"
                    menuIcon="dashboard-panel" id="dashboard_nav" />
            @endcan



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
                        <a href="{{ route('jobs.large-format.index') }}" class="menu-link" id="">
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
                    <!-- <div class="menu-item">
                        <a href="#" class="menu-link" id="orders_nav">
                            <span class="menu-text">Photography Jobs</span>
                        </a>
                    </div> -->
                    <!-- <div class="menu-item">
                        <a href="#" class="menu-link" id="orders_nav">
                            <span class="menu-text">Job Reports</span>
                        </a>
                    </div> -->

                </div>
            </div>

            <!-- <div class="menu-item">
            <a class="menu-link" href="payments.php">
                <i class="fas fa-credit-card menu-icon"></i>
                <span class="menu-text">Payments</span>
            </a>
        </div> -->


            <x-printforce.sidebar.single-menu-item menuText="Customers" :menuLink="route('customers.customer.index')"
                menuIcon="users" id="customers_nav" />

            @can('administrator')
                <x-printforce.sidebar.single-menu-item menuText="Debtors" :menuLink="route('customers.debtors.view')"
                    menuIcon="sack-dollar" />
            @endcan


            <!-- Payments Menu -->

            <x-printforce.sidebar.single-menu-item menuText="Payment" :menuLink="route('payments.index')" />

            <x-printforce.sidebar.single-menu-item menuText="Invoices" menuIcon="file-invoice-dollar" :menuLink="route('invoices.index')" />



            <div class="menu-divider"></div>
            @can('administrator')

                    <!-- Purchases -->
                    <x-printforce.sidebar.single-menu-item menuText="Suppliers" :menuLink="route('suppliers.index')"
                        menuIcon="seller-store" />

                    <x-printforce.sidebar.single-menu-item menuText="Purchases" :menuLink="route('purchases.index')"
                        menuIcon="shopping-cart" />
                    <x-printforce.sidebar.single-menu-item menuText="Purchase Payments"
                        :menuLink="route('purchases.payments.index')" menuIcon="money-bill-transfer" />


                    <!-- <div class="menu-item">
                    <a href="store.php" class="menu-link">
                        <i class="fas fa-store menu-icon"></i>
                        <span class="menu-text">Store Room</span>
                    </a>
                </div> -->

            @endcan

            <div class="menu-divider"></div>

            @can('administrator')

                <x-printforce.sidebar.single-menu-item menuText="Expenses" :menuLink="route('accounting.expenditure.index')"
                    menuIcon="chart-histogram" />

                <!--
                <div class="menu-item">
                    <a href="expenditure-headers/index.php" class="menu-link" id="expenditureH_nav">
                        <i class="fas fa-folder menu-icon"></i>
                        <span class="menu-text">Expenditure Headers</span>
                    </a>
                </div> -->

            @endcan






            <!-- <div class="menu-item">
            <a href="invoices.php" class="menu-link" id="invoices_li">
                <i class="fas fa-file-invoice menu-icon"></i>
                <span class="menu-text"> Generate Invoices </span>
            </a>
        </div> -->
            @can('administrator')

                <x-printforce.sidebar.single-menu-item menuText="Chart Of Accounts"
                    :menuLink="route('accounting.accounts.index')" menuIcon="bank" />

                <x-printforce.sidebar.single-menu-item menuText="Fund Transfers"
                    :menuLink="route('accounting.transfers.index')" menuIcon="money-coin-transfer" />


                <!-- <div class="menu-item">
                        <a href="accounts.php" class="menu-link" id="accounts_li">
                            <i class="fas fa-chart-bar menu-icon"></i>
                            <span class="menu-text"> Fin. Accounts </span>
                        </a>
                    </div> -->

                <!-- <div class="menu-item">
                            <a href="assets/index.php" class="menu-link">
                                <i class="fas fa-hdd menu-icon"></i>
                                <span class="menu-text"> Assets </span>
                            </a>
                        </div> -->

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

            @endcan

            <div class="menu-divider"></div>



            @can('administrator')

                <x-printforce.sidebar.single-menu-item menuText="Employees" menuLink="#" menuIcon="member-list" />


                <!--
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
                                </div> -->

                <!-- <div class="menu-item">
                                <a href="#" class="menu-link">
                                    <i class="fas fa-hand-holding-usd menu-icon"></i>
                                    <span class="menu-text">Payroll</span>
                                </a>
                            </div> -->

                <x-printforce.sidebar.single-menu-item menuText="Registered Users"
                    :menuLink="route('human-resources.users.index')" menuIcon="mode-portrait" id="registered_users_li" />


            @endcan


            <div class="menu-divider"></div>

            @can('administrator')
                <x-printforce.sidebar.single-menu-item menuText="Services"
                    :menuLink="route('configuration.print-services.index')" menuIcon="settings" />

            @endcan

        </div>

    </div>

</div>
<!-- Sidebar -->

<!-- </header> -->
<!--Main Navigation-->
