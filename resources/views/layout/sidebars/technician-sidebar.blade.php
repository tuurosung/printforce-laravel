<!-- Sidebar -->
<!-- <div class="position-fixed collapse dont-collapse-sm app-sidebar bg-white-100" id="sidebar"> -->
<div class="app-sidebar bg-white-100" id="sidebar">
    <div class="app-sidebar-content ps" data-scrollbar="true" data-height="100%">
        <div class="menu mt-5">


            <x-printforce.sidebar.single-menu-item menuText="Dashboard" :menuLink="route('dashboard')"
                menuIcon="dashboard-panel" id="dashboard_nav" />

            <div class="menu-item">
                <a href="{{ route('jobs.largeformat.index') }}" class="menu-link" id="accounts_li">
                    <i class="fas fa-chart-bar menu-icon"></i>
                    <span class="menu-text"> Large Format Jobs </span>
                </a>
            </div>

            <div class="menu-item">
                <a href="{{ route('jobs.embroidery.index') }}" class="menu-link" id="accounts_li">
                    <i class="fas fa-chart-bar menu-icon"></i>
                    <span class="menu-text"> Embroidery Jobs </span>
                </a>
            </div>

            <div class="menu-item">
                <a href="{{ route('jobs.design.index') }}" class="menu-link" id="accounts_li">
                    <i class="fas fa-chart-bar menu-icon"></i>
                    <span class="menu-text"> Design Jobs </span>
                </a>
            </div>

            <div class="menu-item">
                <a href="{{ route('jobs.press.index') }}" class="menu-link" id="accounts_li">
                    <i class="fas fa-chart-bar menu-icon"></i>
                    <span class="menu-text"> Press Jobs </span>
                </a>
            </div>



        </div>

    </div>

</div>
<!-- Sidebar -->

<!-- </header> -->
<!--Main Navigation-->
