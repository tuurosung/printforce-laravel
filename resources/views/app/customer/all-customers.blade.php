@extends('layout.app')

@section('content')

<div class="d-flex justify-content-between mb-4">
    <div class="d-flex align-items-center">
        <h4 class="h2 m-0">Customers</h4>
    </div>
    <div>
        <button
            type="button"
            class="btn btn-primary"
            data-toggle="modal"
            data-target="#newCustomerModal">

            <i class="fas fa-plus me-3"></i>
            New Customer
        </button>
    </div>
</div>


<div class="row mb-5">

    <div class="col-md-2">

        <div class="card border-0 bg-primary">
            <div class="card-body">

                <p class="mb-0 text-white">Total Jobs</p>
                <p
                    class=" h5 m-0 text-white">

                    GHS {{ $total_customer_debit }}
                </p>

            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card border-0 bg-warning">
            <div class="card-body">

                <p class="text-white m-0"> Total Payment</p>
                <p
                    class="h5 m-0 text-white">

                    GHS {{ $total_customer_credit }}
                </p>

            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="card border-0 bg-danger">
            <div class="card-body">

                <p class="text-white m-0">Total Debt</p>
                <p class="m-0 h5 text-white">
                    GHS {{ $total_customer_balance }}
                </p>

            </div>
        </div>
    </div>

</div>

<div class="card border-0">
    <div class="card-body">

        <div class="row mb-4">

            <div class="col-2 col-lg-2 col-md-3 col-sm-4">

                <form action="" id="searchCustomersFrm">
                    @csrf
                    <input
                        type="text"
                        name="search_term"
                        id="searchCustomer"
                        class="form-control w-250px me-5"
                        value=""
                        placeholder="customer's name or phone number">
                </form>



            </div>

        </div>

        <div id="data_holder">
            <table class="table table-sm datatable">
                <thead class="">
                    <tr>
                        <th>#</th>
                        <th>Date Created</th>
                        <th>Customer Name</th>
                        <th>Type</th>
                        <th>Phone Number</th>
                        <th class="text-end">Jobs</th>
                        <th class="text-end">Paid</th>
                        <th class="text-end">Balance</th>
                        <th class="text-end">Option</th>
                    </tr>
                </thead>
                <tbody>

                    @php
                    $i = 1;
                    $total_jobs = 0;
                    $total_payments = 0;
                    $total_balance = 0;
                    @endphp

                    @foreach ($customers as $customer)

                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td>{{ $customer->created_at }}</td>
                        <td class="text-capitalize" style="text-decoration: underline;">
                            <a href="{{ route('customer-info', $customer) }}">

                                {{ strtolower($customer->name) }}

                            </a>
                        </td>
                        <td>{{ $customer->customer_category_description }}</td>
                        <td><?php echo $customer['phone']; ?></td>
                        <td class="text-end">
                            <?php echo number_format($customer->customer_debit, 2); ?>
                        </td>
                        <td class="text-end"><?php echo number_format($customer->customer_credit, 2); ?></td>
                        <td class="text-end"><?php echo number_format($customer->customer_balance, 2); ?></td>
                        <td class="text-end">
                            <a
                                href="/edit-customer/{{ $customer->customer_id }}"
                                class="text-primary me-3">
                                <i class="fas fa-pen me-3 text-primary "></i>
                                Edit
                            </a>

                            <?php //if ($user->isAdmin()) :
                            ?>

                            <a
                                href="#"
                                class="text-danger delete"
                                data-url="customer-controller/delete-customer.php?sn=<?php echo $customer['sn']; ?>">
                                <i class="fas fa-trash-alt text-danger" aria-hidden="true"></i>
                                Delete
                            </a>

                            <?php //endif;
                            ?>

                        </td>
                    </tr>

                    @endforeach


                </tbody>
            </table>
        </div>

    </div>
</div>

@include('app.customer.modals.new-customer-modal')

@endsection


@section('js')

<script>
    $('#newCustomerModal').on('shown.bs.modal', function() {
        $('#name').focus();
    });

    $('#searchCustomer').on('keyup', function() {

        const url = "{{ route('filter-customers') }}";
        $.post(url, $('#searchCustomersFrm').serialize(), function(data) {
            $('#data_holder').html(data);
        })
    })
</script>
@endsection
