@extends('layout.app')

@section('content')

<div class="pt-5">

    <div class="container full-container py-5">
        <div class="grid grid-cols-12 gap-6">

            @include('app.dashboard.new-partials.welcome-row')

            @include('app.dashboard.new-partials.top-cards')


            @include('app.dashboard.new-partials.tabbed-data')

            @include('app.dashboard.new-partials.payment-summary')

            @include('app.dashboard.new-partials.graphs')

            @include('app.dashboard.partials.monthly_summary')
        </div>
    </div>

</div>


<div class="grid grid-cols-12 mt-4 mb-5 gap-6">
    <div class="col-span-8">


    </div>
    <div class="col-span-4">



        <div class="card bg-danger darken-3 mb-0">
            <div class="card-body">
                <div class="flex items-center gap-6">
                    <i class="fi fi-rr-payroll-check text-6xl text-white"></i>
                    <div>
                        <h5 class="text-white mb-1">
                            Today's Payments
                        </h5>
                        <p class="text-white mb-0">Accounts Summary</p>
                    </div>
                </div>

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
