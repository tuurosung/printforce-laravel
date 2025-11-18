@extends('layout.app')

@section('content')

    <x-printforce.headers.page-header title="Welcome, {{ Auth::user()->name }}">



    </x-printforce.headers.page-header>



    @if (Auth::user()->access_level === 'administrator')

        <div class="card">
            <div class="card-body p-4 pb-0" data-simplebar="init">
                <div class="simplebar-wrapper" style="margin: -24px -24px 0px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content"
                                style="height: auto; overflow: hidden;">
                                <div class="simplebar-content" style="padding: 24px 24px 0px;">
                                    <div class="row flex-nowrap">
                                        <div class="col">
                                            <div class="card primary-gradient">
                                                <div class="card-body text-center px-9 pb-4">
                                                    <div
                                                        class="d-flex align-items-center justify-content-center round-48 rounded text-bg-primary flex-shrink-0 mb-3 mx-auto">
                                                        <iconify-icon icon="solar:dollar-minimalistic-linear"
                                                            class="fs-7 text-white"></iconify-icon>
                                                    </div>
                                                    <h6 class="fw-normal fs-3 mb-1">Total Orders</h6>
                                                    <h4 class="mb-3 d-flex align-items-center justify-content-center gap-1">
                                                        16,689</h4>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-white fs-2 fw-semibold text-nowrap">View
                                                        Details</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card warning-gradient">
                                                <div class="card-body text-center px-9 pb-4">
                                                    <div
                                                        class="d-flex align-items-center justify-content-center round-48 rounded text-bg-warning flex-shrink-0 mb-3 mx-auto">
                                                        <iconify-icon icon="solar:recive-twice-square-linear"
                                                            class="fs-7 text-white"></iconify-icon>
                                                    </div>
                                                    <h6 class="fw-normal fs-3 mb-1">Return Item</h6>
                                                    <h4 class="mb-3 d-flex align-items-center justify-content-center gap-1">
                                                        148</h4>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-white fs-2 fw-semibold text-nowrap">View
                                                        Details</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card secondary-gradient">
                                                <div class="card-body text-center px-9 pb-4">
                                                    <div
                                                        class="d-flex align-items-center justify-content-center round-48 rounded text-bg-secondary flex-shrink-0 mb-3 mx-auto">
                                                        <iconify-icon icon="ic:outline-backpack"
                                                            class="fs-7 text-white"></iconify-icon>
                                                    </div>
                                                    <h6 class="fw-normal fs-3 mb-1">Annual Budget</h6>
                                                    <h4 class="mb-3 d-flex align-items-center justify-content-center gap-1">
                                                        $156K</h4>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-white fs-2 fw-semibold text-nowrap">View
                                                        Details</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card danger-gradient">
                                                <div class="card-body text-center px-9 pb-4">
                                                    <div
                                                        class="d-flex align-items-center justify-content-center round-48 rounded text-bg-danger flex-shrink-0 mb-3 mx-auto">
                                                        <iconify-icon icon="ic:baseline-sync-problem"
                                                            class="fs-7 text-white"></iconify-icon>
                                                    </div>
                                                    <h6 class="fw-normal fs-3 mb-1">Cancel Orders</h6>
                                                    <h4 class="mb-3 d-flex align-items-center justify-content-center gap-1">
                                                        64</h4>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-white fs-2 fw-semibold text-nowrap">View
                                                        Details</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card success-gradient">
                                                <div class="card-body text-center px-9 pb-4">
                                                    <div
                                                        class="d-flex align-items-center justify-content-center round-48 rounded text-bg-success flex-shrink-0 mb-3 mx-auto">
                                                        <iconify-icon icon="ic:outline-forest"
                                                            class="fs-7 text-white"></iconify-icon>
                                                    </div>
                                                    <h6 class="fw-normal fs-3 mb-1">Total Income</h6>
                                                    <h4 class="mb-3 d-flex align-items-center justify-content-center gap-1">
                                                        $36,715</h4>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-white fs-2 fw-semibold text-nowrap">View
                                                        Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-placeholder" style="width: 1140px; height: 279px;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                </div>
            </div>
        </div>

        <div class="row mb-4">

            <div class="col-md-2">

                <x-printforce.cards.colour-card title="Monthly Revenue" :value="$monthly_payments" bgColour="primary"
                    valueType="money" />

            </div>


            <div class="col-md-2">
                <x-printforce.cards.colour-card title="Monthly Exp." :value="$monthly_expenditure" bgColour="danger" />
            </div>

            <div class="col-md-2">

                <x-printforce.cards.colour-card title="New Customers" :value="$countNewCustomers" bgColour="success"
                    valueType="count" />
            </div>



        </div>




        <div class="row mb-5">

            <div class="col-md-6">

                <div class="card border-0">
                    <div class="card-body">
                        <h4 class="h5 mb-0">Income Graph</h4>

                        <div>
                            <div class="chart mb-2">
                                <canvas id="revenue_chart" class="w-100" height="250"
                                    style="display: block; box-sizing: border-box; height: 190px; width: 479px;"
                                    width="479"></canvas>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

            <div class="col-md-6">

                <div class="card border-0">
                    <div class="card-body">
                        <h4 class="h5 mb-0">Expenses Graph</h4>
                    </div>
                </div>

            </div>
        </div>


        <div class="row">

            <div class="col-md-6">

                <div class="card border-0 h-100">
                    <div class="card-body">

                        <h4 class="h5 mb-5">Customer Rankings</h4>

                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Customer Name</th>
                                        <th scope="col" class="text-end">Jobs</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
            $i = 1;
                                    @endphp

                                    @foreach ($customer_rankings as $customer)

                                    <tr class="">
                                        <td scope="row">{{ $i++ }}</td>
                                        <td>{{ $customer['name'] }}</td>
                                        <td class="text-end">{{ $customer['total_jobs'] }}</td>
                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>



                    </div>
                </div>

            </div>

            <div class="col-md-6">

                <div class="card border-0 h-100">
                    <div class="card-body">

                        <h4 class="h5 mb-5">Performance Analytics</h4>

                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Description</th>
                                        <th scope="col" class="text-center">Jobs</th>
                                        <th scope="col" class="text-end">Revenue</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
            $i = 1;
                                    @endphp

                                    @foreach ($service_performance as $service_performance_row)
                                    <tr class="">
                                        <td scope="row">{{ $i++ }}</td>
                                        <td>{{ $service_performance_row['service_name'] }}</td>
                                        <td class="text-center">{{ $service_performance_row['jobs_count'] }}</td>
                                        <td class="text-end">{{ number_format($service_performance_row['jobs_sum'], 2) }}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>



                    </div>
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
</script>

@endsection
