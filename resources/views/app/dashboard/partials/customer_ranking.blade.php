<div class="card border-0 h-100">
    <div class="card-body">

        <h4 class="h5 mb-3">Customer Rankings</h4>

        <div class="table-responsive">
            <table class="table table-sm datatables">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col" class="text-end">Jobs</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customer_rankings as $customer)

                        <tr class="">
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $customer['name'] }}</td>
                            <td class="text-end">{{ $customer['total_jobs'] }}</td>
                        </tr>

                    @endforeach

                </tbody>
            </table>
        </div>



    </div>
</div>
