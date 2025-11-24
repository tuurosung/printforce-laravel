@extends('layout.app')

@section('content')

    <h4 class="mb-3">Welcome, {{ Auth::user()->name }}</h4>

    <div class="card shadow-none bg-primary rounded-1 d-none">
        <div class="card-body">

        </div>
    </div>

    <div class="row mt-4 mb-5">
        <div class="col-md-8">
            <div class="card text-bg-primary mb-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="d-flex flex-column h-100">
                                <div class="hstack gap-3 mb-4">
                                    <span
                                        class="d-flex align-items-center justify-content-center round-48 bg-white rounded flex-shrink-0">
                                        <i class="fi fi-sr-chart-simple fs-7"></i>
                                    </span>
                                    <h5 class="text-white fs-6 mb-0 text-nowrap">Welcome, {{ Auth::user()->name }}
                                    </h5>
                                </div>
                                <div class="mt-4 mt-sm-auto">
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="text-white">Today's Payments</span>
                                            <h4 class="mb-0 text-white mt-1 text-nowrap fs-13 ">
                                                {{ number_format($todays_payments, 2) }}
                                            </h4>
                                        </div>
                                        <div class="col-6 border-start border-light" style="--bs-border-opacity: .15;">
                                            <span class="text-white">Jobs Registered</span>
                                            <h4 class="mb-0 text-white mt-1 text-nowrap fs-13">
                                                {{ $todays_jobs_count }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-md-end">
                            <img src="{{ asset('images/face-painting.png') }}" alt="welcome" class="img-fluid mb-n7 mt-2"
                                width="180">
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="col-md-4">

            <div class="card bg-danger darken-3 mb-0 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center gap-6">
                        <i class="fi fi-rr-payroll-check display-6 text-white"></i>
                        <div>
                            <h5 class="text-white mb-1">
                                Today's Payments
                            </h5>
                            <p class="text-white mb-0 opacity-75">Accounts Summary</p>
                        </div>
                    </div>

                    <ul class="list-group text-white mt-3">
                        @foreach ($payment_accounts as $account)
                            <li class="fs-14px">
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


    @if (Auth::user()->access_level === 'administrator')

    <div id="dashboard-tab">
        <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row" role="tablist">
            <li class="nav-item">
                <a href="#monthly_summary"
                    class="nav-link gap-6 d-flex align-items-center justify-content-center active px-3 px-md-3 me-0 me-md-2 fs-11"
                    id="monthly_summary-tab" data-bs-toggle="tab" role="tab" aria-controls="monthly_summary" aria-selected="true">
                    <i class="fi fi-sr-chart-simple fs-9px"></i>
                    <span class="d-none d-md-block fw-medium">Monthly Summary</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#customer_ranking"
                    class="nav-link gap-6 d-flex align-items-center justify-content-center px-3 px-md-3 me-0 me-md-2 fs-11"
                    id="customer_ranking-tab" data-bs-toggle="tab" role="tab" aria-controls="customer_ranking" aria-selected="false">
                    <i class="fi fi-sr-users fs-9px"></i>
                    <span class="d-none d-md-block fw-medium">Customer Ranking</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#analytics"
                    class="nav-link gap-6 d-flex align-items-center justify-content-center px-3 px-md-3 me-0 me-md-2 fs-11"
                    id="analytics-tab" data-bs-toggle="tab" role="tab" aria-controls="analytics" aria-selected="false">
                    <i class="fi fi-sr-chart-pie fs-9px"></i>
                    <span class="d-none d-md-block fw-medium">Analytics</span>
                </a>
            </li>
            <li class="nav-item ms-auto">
                <a href="#add_notes" class="btn btn-primary d-flex align-items-center px-3 gap-6 fs-11" id="add-notes">
                    <i class="fi fi-sr-plus fs-9px"></i>
                    <span class="d-none d-md-block fw-medium fs-3">Add Notes</span>
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="monthly_summary" role="tabpanel" aria-labelledby="monthly_summary-tab">

                @include('app.dashboard.partials.monthly_summary')

            </div>
            <div class="tab-pane fade" id="customer_ranking" role="tabpanel" aria-labelledby="customer_ranking-tab">

                @include('app.dashboard.partials.customer_ranking')

            </div>
            <div class="tab-pane fade" id="analytics" role="tabpanel" aria-labelledby="analytics-tab">

                @include('app.dashboard.partials.analytics')

            </div>
        </div>
    </div>



    @endif


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
// </script>

@endsection
