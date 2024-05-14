@extends('layout.app')

@section('content')

<div class="d-flex justify-content-between mb-4">
    <div>
        <h4 class="fs-30px fw-600 montserrat">Customers</h4>
    </div>
    <div>
        <a type="button" href="{{ route('new-customer') }}" class="btn btn-primary"><i class="fas fa-plus mr-3  "></i> New Customer</a>
    </div>
</div>

<div class="row mb-3">

    <div class="col-2">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-2 d-flex justify-content-center align-items-center">
                        <i class="fas fa-briefcase fa-2x text-primary"></i>
                    </div>

                    <div class="col-10">
                        <p class="fw-600 fs-18px Axiforma">GHS {{ $total_customer_debit }} </p>
                        <p>Total Jobs</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-2 d-flex justify-content-center align-items-center">
                        <i class="fas fa-wallet fa-2x text-success"></i>
                    </div>

                    <div class="col-10">
                        <p class="fw-600 fs-18px Axiforma">GHS {{ $total_customer_credit }}</p>
                        <p>Total Payments</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-2 d-flex justify-content-center align-items-center">
                        <i class="fas fa-hand-holding-usd fa-2x text-danger"></i>
                    </div>

                    <div class="col-10">
                        <p class="fw-600 fs-18px Axiforma">GHS {{ $total_customer_balance }}</p>
                        <p>Total Debt</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<div class="card">
    <div class="card-body">

        <div class="row mb-4">

            <div class="col-2 col-lg-2 col-md-3 col-sm-4">

                <input type="text" name="search_term" id="search_term" class="form-control w-250px mr-5" value="" placeholder="customer's name or phone number">

            </div>

        </div>

        <div id="data_holder">
            <table class="table table-secondary">
                <thead class="">
                    <tr>
                        <th>#</th>
                        <th>Customer Name</th>
                        <th>Type</th>
                        <th>Phone Number</th>
                        <th class="text-right">Jobs</th>
                        <th class="text-right">Paid</th>
                        <th class="text-right">Balance</th>
                        <th class="text-right">Option</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($list as $customers)

                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td class="text-capitalize" style="text-decoration: underline;">
                            <a href="customer-info/{{ $customers->customer_id }}">

                                {{ strtolower($customers->name) }}

                            </a>
                        </td>
                        <td>{{ $customers->customerCategory->category_name }}</td>
                        <td><?php echo $customers['phone']; ?></td>
                        <td class="text-right">
                            <?php echo number_format($customers->customerDebit(), 2); ?>
                        </td>
                        <td class="text-right"><?php echo number_format($customers->customerCredit(), 2); ?></td>
                        <td class="text-right"><?php echo number_format($customers->customerBalance(), 2); ?></td>
                        <td class="text-right">
                            <a href="/edit-customer/{{ $customers->customer_id }}" style="text-decoration: none;">
                                <i class="fas fa-pen mr-3 text-primary "></i>
                            </a>

                            <?php //if ($user->isAdmin()) :
                            ?>

                            <a href="#" class="delete" style="text-decoration: none;" data-url="customer-controller/delete-customer.php?sn=<?php echo $customers['sn']; ?>">
                                <i class="fas fa-trash-alt text-danger" aria-hidden="true"></i>
                            </a>

                            <?php //endif;
                            ?>

                        </td>
                    </tr>

                    <?php
                    $total_jobs += $customers->customerDebit();
                    $total_payments += $customers->customerCredit();
                    $total_balance += $customers->customerBalance();

                    ?>
                    @endforeach




                    <tr>
                        <td>--------</td>
                        <td>--------</td>
                        <td>--------</td>
                        <td>--------</td>
                        <td class="text-right montserrat font-weight-bold" style="font-size:20px !important;">GHS <?php echo number_format($total_jobs, 2); ?></td>
                        <td class="text-right montserrat font-weight-bold" style="font-size:20px !important;">GHS <?php echo number_format($total_payments, 2); ?></td>
                        <td class="text-right montserrat font-weight-bold" style="font-size:20px !important;">GHS <?php echo number_format($total_balance, 2); ?></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection