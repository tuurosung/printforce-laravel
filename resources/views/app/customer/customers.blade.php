@extends('layout.app')

@section('content')

    <x-headers.top-header pageTitle="Customers">

        <button type="button" class="btn btn-primary ms-3" data-toggle="modal" data-target="#newCustomerModal">

            <i class="fas fa-plus me-3"></i>
            New Customer
        </button>

    </x-headers.top-header>

    @can('administrator')
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
                                <div class="row flex-nowrap mb-3">
                                    <div class="col">
                                        <x-cards.colour-card2 title="New Customers" colour="primary" icon="users"
                                            :value="$statistics['new_customers']" valueType="number" />
                                    </div>
                                    <div class="col">
                                        <x-cards.colour-card2 title="All Customers" colour="danger"
                                            :value="$statistics['total_customers']" icon="usd-square" valueType="" />
                                    </div>
                                    <div class="col">
                                        <x-cards.colour-card2 title="Active Customers" colour="success" :value="0   "
                                            icon="users" valueType="" />
                                    </div>
                                    <div class="col">
                                        <x-cards.colour-card2 title="Dormant Customers" colour="warning" value="0"
                                            icon="alarm-clock" valueType="number" />
                                    </div>
                                    <div class="col"></div>
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
    @endcan


    @include('layout.errors')

    <div class="card border-0">
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-2 col-lg-2 col-md-3 col-sm-4">
                    <form action="" id="searchCustomersFrm">
                        @csrf
                        <input type="text" name="search_term" id="searchCustomer" class="form-control w-250px me-5" value=""
                            placeholder="customer's name or phone number">
                    </form>
                </div>
            </div>

            <div id="data_holder">
                <table class="table table-sm datatables">
                    <thead class="table-dark">
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
                                <td><?php    echo $customer['phone']; ?></td>
                                <td class="text-end">
                                    <?php    echo number_format($customer->debit, 2); ?>
                                </td>
                                <td class="text-end"><?php    echo number_format($customer->credit, 2); ?></td>
                                <td class="text-end"><?php    echo number_format($customer->balance, 2); ?></td>
                                <td class="text-end">
                                    <div class="dropdown open">
                                        <a class="dropdown-toggle" type="button" id="triggerId"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Options
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a href="javascript:void(0)" data-url="{{ route('customers.customer.edit', $customer) }}"
                                                class="dropdown-item text-primary edit  me-3 d-flex">
                                                Edit
                                                <i class="fas fa-pen text-primary ms-auto"></i>
                                            </a>
                                            @can('administrator')
                                                <form method="POST" action="{{ route('customers.customer.delete', $customer) }}" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="javascript:void(0)" class="dropdown-item text-danger delete d-flex">
                                                        Delete
                                                        <i class="fas fa-trash-alt text-danger ms-auto" aria-hidden="true"></i>
                                                    </a>
                                                </form>
                                            @endcan
                                        </div>
                                    </div>

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

@push('stacked-scripts')
    @vite(['resources/js/modules/customers/customers.js'])
@endpush
