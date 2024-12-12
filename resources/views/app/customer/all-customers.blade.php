@extends('layout.app')

@section('content')

<div class="d-flex justify-content-between">
    <div class="d-flex align-items-center">
        <h4 class="h2 m-0">Customers</h4>
    </div>
    <div>
        <button
            type="button"
            href="{{ route('new-customer') }}"
            class="btn btn-primary"
            data-toggle="modal"
            data-target="#newCustomerModal">

            <i class="fas fa-plus mr-3  "></i>
            New Customer
        </button>
    </div>
</div>

<hr>

<div class="row mb-5">

    <div class="col-md-2">

        <div class="card border-0">
            <div class="card-body">

                Total Jobs
                <p
                    class=" h5 m-0">

                    GHS {{ $total_customer_debit }}
                </p>

            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card border-0">
            <div class="card-body">

                Total Payment
                <p
                    class="h5 m-0">

                    GHS {{ $total_customer_credit }}
                </p>

            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="card border-0">
            <div class="card-body">

                Total Debt
                <p class="m-0 h5">
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

                <input type="text" name="search_term" id="search_term" class="form-control w-250px mr-5" value="" placeholder="customer's name or phone number">

            </div>

        </div>

        <div id="data_holder">
            <table class="table table-sm datatables">
                <thead class="">
                    <tr>
                        <th>#</th>
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
                                <i class="fas fa-pen mr-3 text-primary "></i>
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

                    <?php
                    $total_jobs += $customer->customer_debit;
                    $total_payments += $customer->customer_credit;
                    $total_balance += $customer->customer_balance;

                    ?>
                    @endforeach




                    <tr>
                        <td>--------</td>
                        <td>--------</td>
                        <td>--------</td>
                        <td>--------</td>
                        <td class="text-end montserrat font-weight-bold" style="font-size:20px !important;">GHS <?php echo number_format($total_jobs, 2); ?></td>
                        <td class="text-end montserrat font-weight-bold" style="font-size:20px !important;">GHS <?php echo number_format($total_payments, 2); ?></td>
                        <td class="text-end montserrat font-weight-bold" style="font-size:20px !important;">GHS <?php echo number_format($total_balance, 2); ?></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

@include('app.customer.modals.new-customer-modal')

@endsection


@section('js')

@endsection
