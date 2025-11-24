<div class="card border-0 h-100">
    <div class="card-body">

        <h4 class="h5 mb-3">Performance Analytics</h4>

        <div class="table-responsive">
            <table class="table table-sm">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Description</th>
                        <th scope="col" class="text-center">Jobs</th>
                        <th scope="col" class="text-end">Revenue</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($service_performance as $service_performance_row)
                        <tr class="">
                            <td scope="row">{{ $loop->iteration }}</td>
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
