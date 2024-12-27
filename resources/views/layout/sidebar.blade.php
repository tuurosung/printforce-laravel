<!-- Sidebar -->
<!-- <div class="position-fixed collapse dont-collapse-sm app-sidebar bg-white-100" id="sidebar"> -->
<div class="app-sidebar bg-white-100" id="sidebar">
    <div class="app-sidebar-content ps" data-scrollbar="true" data-height="100%">
        <div class="menu mt-5">

            <div class="menu-item">
                <a href="{{ route('dashboard') }}" class="menu-link">
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
                        <a href="{{ route('largeformatjobs') }}" class="menu-link" id="">
                            <span class="menu-text">Large Format Jobs</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{ route('embroideryjobs') }}" class="menu-link" id="">
                            <span class="menu-text">Embroidery Jobs</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{ route('designjobs') }}" class="menu-link" id="">
                            <span class="menu-text">Design Jobs</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{ route('pressjobs') }}" class="menu-link" id="">
                            <span class="menu-text">Press Jobs</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="{{ route('payments') }}" class="menu-link" id="orders_nav">
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
                <a class="menu-link" href="{{ route('customers') }}" id="customers_nav">
                    <i class="fas fa-users menu-icon"></i>
                    <span class="menu-text"> Customers </span>
                </a>
            </div>

            <div class="menu-item">
                <a class="menu-link" href="{{ route('debtors') }}" id="debtors_nav">
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
                        <a href="{{ route('payments') }}" class="menu-link" id="orders_nav">
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
                <a href="{{ route('suppliers') }}" class="menu-link">
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
                <a href="{{ route('expenses') }}" class="menu-link" id="expenses_nav">
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
                <a href="{{ route('accounts') }}" class="menu-link" id="accounts_li">
                    <i class="fas fa-code-branch menu-icon"></i>
                    <span class="menu-text"> Chart Of Acc. </span>
                </a>
            </div>

            <div class="menu-item">
                <a href="{{ route('transfers') }}" class="menu-link" id="accounts_li">
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
                <a href="{{ route('users') }}" class="menu-link" id="registered_users_li">
                    <i class="fas fa-users menu-icon"></i>
                    <span class="menu-text">Registered Users</span>
                </a>
            </div>


            <div class="menu-item">
                <a href="{{ route('services') }}" class="menu-link" id="reports_li">
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
