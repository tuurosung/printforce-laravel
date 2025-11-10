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

    @can('administrator')
    <div class="row mb-5">

        <div class="col-md-3">

            <x-printforce.cards.colour-card
                title="New Customers"
                value="{{ $statistics['new_customers'] }}"
                bgColour="primary"
                valueType="count" />
        </div>
        <div class="col-md-3">

        <x-printforce.cards.colour-card
                title="All Customers"
                value="{{ $statistics['total_customers'] }}"
                bgColour="warning"
                valueType="count" />


        </div>


    </div>

    @endcan

    @include('layout.errors')

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

                        @foreach ($customers as $customer)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $customer->created_at }}</td>
                            <td class="text-capitalize" style="text-decoration: underline;">
                                <a href="{{ route('customers.customer.info', $customer) }}">

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
                                    href="javascript:void(0)"
                                    data-url="{{ route('customers.customer.edit', $customer) }}"
                                    class="text-primary edit  me-3">
                                    <i class="fas fa-pen text-primary "></i>
                                    Edit
                                </a>

                                @can('administrator')
                                <form method="POST" action="{{ route('customers.customer.delete', $customer) }}" class="d-inline-block">
                                    @csrf
                                    @method('delete')
                                <a
                                    href="javascript:void(0)"
                                    class="text-danger delete">
                                    <i class="fas fa-trash-alt text-danger" aria-hidden="true"></i>
                                    Delete
                                </a>
                                </form>
                                @endcan


                            </td>
                        </tr>

                        @endforeach


                    </tbody>
                </table>
            </div>

        </div>
    </div>

    @include('app.customer.modals.new-customer-modal')

    <div id="modal_holder"></div>

@endsection


@section('js')

<script type="text/javascript" src="{{ asset('assets/js/printforce/customers/customers.js') }}"></script>
@endsection
