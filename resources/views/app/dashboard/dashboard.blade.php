@extends('layout.app')

@section('content')

<div class="pt-5">

    <div class="container full-container py-5">

        <div class="grid grid-cols-12 gap-6 mb-6">
            <div class="lg:col-span-8 md:col-span-8 sm:col-span-12 col-span-12">
                @include('app.dashboard.new-partials.welcome-row')
            </div>
            <div class="lg:col-span-4 md:col-span-4 sm:col-span-12 col-span-12">
                <div class="card bg-primary darken-3 mb-0">
                    <div class="card-body">

                        <h4 class="text-xl text-white font-cal-sans-regular font-normal mb-3">Today's Payments</h4>

                        <ul class="list-group text-white mt-3">
                            @foreach ($payment_accounts as $account)
                            <li class="text-[14px]">
                                {{ $account->account_name }}
                                <span class="float-end">GHS {{ $account->todays_payment }}</span>
                            </li>
                            <hr class="my-1">
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-6 gap-6 mb-6">
            <div class="col">
                <x-cards.dashboard-card bgColour="primary" title="Payments" icon="sack-dollar" :value="$payment_statistics->monthsTotalPayment" valueType="money" />
            </div>
            <div class="col">
                <x-cards.dashboard-card bgColour="warning" title="Expenses" icon="message-dollar" :value="$monthly_expenditure" />
            </div>
            <div class="col">
                <x-cards.dashboard-card bgColour="success" title="New Customers" icon="users" :value="$countNewCustomers" valueType="number" />
            </div>
            <div class="col">
                <x-cards.dashboard-card bgColour="info" title="Jobs" icon="briefcase" value="0" valueType="number" />
            </div>
            <div class="col">
                <x-cards.dashboard-card bgColour="danger" title="Debt" icon="hand-holding-usd" value="0" valueType="number" />
            </div>
            <div class="col">
                <x-cards.dashboard-card bgColour="primary" title="Debt" icon="file-invoice-dollar" value="0" valueType="number" />
            </div>
        </div>


        <div class="grid grid-cols-12 gap-6 mb-6">
            <div class="col-span-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="text-lg">Service Performance </h4>

                        <!-- List Group -->
                        <ul class="mt-3 flex flex-col">
                            <li class="inline-flex items-center gap-x-2 py-3 px-4 text-sm border border-gray-800 text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:border-gray-700 dark:text-gray-200">
                                <div class="flex items-center justify-between w-full">
                                    <span>Service Name</span>
                                    <span>Jobs</span>
                                </div>
                            </li>
                            @foreach ($service_performance as $row)
                            <li class="inline-flex items-center gap-x-2 py-2 px-4 text-sm font-semibold bg-gray-50 border border-gray-800 text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:bg-slate-800 dark:border-gray-700 dark:text-gray-200">
                                <div class="flex items-center justify-between w-full">
                                    <span>{{ $row['service_name'] }}</span>
                                    <span>{{ $row['total'] }}</span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <!-- End List Group -->

                    </div>
                </div>
            </div>
            <div class="col-span-6"></div>
        </div>

        <div class="row gap-6">
            <div class="col-md-6 px-0!">
                <div class="card border-0 h-100 rounded-1">
                    <div class="card-body">
                        <h4 class="h5 mb-0">Income Graph</h4>

                        <div>
                            <div class="chart mb-2">
                                <canvas id="revenue_chart" class="w-100" height="250"
                                    style="display: block; box-sizing: border-box; height: 190px; width: 479px;" width="479"></canvas>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6 px-0!">
                <div class="card border-0 h-100 rounded-1">
                    <div class="card-body">
                        <h4 class="h5 mb-0">Expenses Graph</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-12 gap-6">
            @include('app.dashboard.new-partials.tabbed-data')
        </div>
    </div>

</div>


<div class="grid grid-cols-12 mt-4 mb-5 gap-6">
    <div class="col-span-8">


    </div>
    <div class="col-span-4">



    </div>
</div>





@endsection

@section('js')

<script>
    revenueGraph();

    function revenueGraph() {
        {
            const url = "{{ route('payments.graph') }}"

            $.get(url,
                function(data) {
                    console.log(data);
                    data = $.parseJSON(data)

                    var payment_date = [];
                    var total_payment = [];

                    for (var i in data) {
                        payment_date.push(data[i].payment_date);
                        total_payment.push(data[i].total_payment);
                        // alert(i)
                    }
                    // alert(sales)

                    var chartdata = {
                        labels: payment_date,
                        datasets: [{
                            label: 'Date',
                            borderColor: 'rgb(0, 13, 126)',
                            pointBackgroundColor: 'rgb(0, 13, 126)',
                            backgroundColor: 'rgba(250, 250, 250, 0)',
                            color: app.color.theme,
                            borderColor: app.color.theme,
                            borderWidth: 1.5,
                            pointBackgroundColor: app.color.theme,
                            pointBorderWidth: 1.5,
                            pointRadius: 4,
                            pointHoverBackgroundColor: app.color.theme,
                            pointHoverBorderColor: app.color.theme,
                            pointHoverRadius: 7,
                            label: 'Total Sales',
                            data: total_payment
                        }]
                    };

                    var graphTarget = $("#revenue_chart");

                    var barGraph = new Chart(graphTarget, {
                        type: 'line',
                        data: chartdata
                    });
                });
        }
    }

    // // Initialize dashboard tabs properly
    // $(document).ready(function() {
    //     // Initialize Bootstrap 5 tab functionality
    //     const dashboardTabs = document.querySelectorAll('#dashboard-tab a[data-bs-toggle="tab"]');
    //     dashboardTabs.forEach(function(tab) {
    //         tab.addEventListener('click', function(e) {
    //             e.preventDefault();
    //             const bootstrap = window.bootstrap || window.Bootstrap;
    //             if (bootstrap && bootstrap.Tab) {
    //                 const bsTab = new bootstrap.Tab(tab);
    //                 bsTab.show();
    //             }
    //         });
    //     });

    //     // Handle active tab persistence for dashboard tabs
    //     const dashboardTabTriggerEl = document.querySelector('#dashboard-tab .nav-link.active');
    //     if (dashboardTabTriggerEl) {
    //         const bootstrap = window.bootstrap || window.Bootstrap;
    //         if (bootstrap && bootstrap.Tab) {
    //             const tab = new bootstrap.Tab(dashboardTabTriggerEl);
    //             tab.show();
    //         }
    //     }
    // });
    //
</script>

@endsection
