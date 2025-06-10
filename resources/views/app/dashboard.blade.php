@extends('layout.app')

@section('content')

        <x-printforce.headers.page-header title="Welcome, {{ Auth::user()->name }}">

        <a href="{{ route('customers.customer.index') }}" type="button" class="btn btn-primary me-3 ml-0">
            <i class="fas fa-user-plus me-3  "></i>
            Create Customer
        </a>
        <a href="{{ route('jobs.today') }}" type="button" class="btn btn-outline-warning">
            <i class="fas fa-briefcase me-3  "></i> View Jobs
        </a>

        </x-printforce.headers.page-header>





        <div class="row mb-4">

            <div class="col-md-2">

                <x-printforce.cards.colour-card
                    title="Monthly Revenue"
                    :value="$monthly_payments"
                    bgColour="primary"
                    valueType="money"
                    />

            </div>


            <div class="col-md-2">
                <x-printforce.cards.colour-card
                    title="Monthly Exp."
                    :value="$monthly_expenditure"
                    bgColour="danger"
                    />
            </div>

            <div class="col-md-2">

            <x-printforce.cards.colour-card
                    title="New Customers"
                    :value="$countNewCustomers"
                    bgColour="success"
                    valueType="count"
                    />
            </div>



        </div>


        <div class="row mb-5">

            <div class="col-md-6">

                <div class="card border-0">
                    <div class="card-body">
                        <h4 class="h5 mb-0">Income Graph</h4>

                        <div>
                            <div class="chart mb-2">
                                <canvas id="revenue_chart" class="w-100" height="250" style="display: block; box-sizing: border-box; height: 190px; width: 479px;" width="479"></canvas>
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

                        <div
                            class="table-responsive">
                            <table
                                class="table table-sm">
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

                        <div
                            class="table-responsive">
                            <table
                                class="table table-sm">
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
