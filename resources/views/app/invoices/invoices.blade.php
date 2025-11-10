@extends('layout.app')


@section('content')

    <div class="d-flex justify-content-between mb-5">
        <h2>Invoices</h2>
        <div>
            <button type="button" class="btn btn-primary m-0 btn-rounded me-3" data-toggle="modal"
                data-target="#newInvoiceModal"><i class="fas fa-plus me-2"></i> New Invoice</button>
            <a href="invoice_config.php" class="btn btn-primary btn-rounded m-0">
                <i class="fas fa-cog me-3"></i>
                Configure Invoice Data
            </a>
        </div>
    </div>

    <div class="card border-0">
        <div class="card-body">

            <div class="" id="data_holder">

                <table class="table datatables table-condensed">
                    <thead class="">
                        <tr>
                            <th>#</th>
                            <th>Date Created</th>
                            <th>Invoice ID</th>
                            <th>Customer Name</th>
                            <th class="text-end">Sub-Total</th>
                            <th class="text-end">Taxes</th>
                            <th class="text-end">Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customerInvoices as $customerInvoice)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $customerInvoice->created_at }}</td>
                                <td>
                                    <a href="#">{{ $customerInvoice->invoice_id }}</a>
                                </td>
                                <td>{{ $customerInvoice->customer->name }}</td>
                                <td class="text-end">{{ number_format($customerInvoice->sub_total, 2) }}</td>
                                <td class="text-end">
                                    {{ number_format($customerInvoice->vat_amount + $customerInvoice->nhil_amount + $customerInvoice->getfund_amount, 2) }}
                                </td>
                                <td class="text-end">{{ number_format($customerInvoice->total, 2) }}</td>
                                <td class="text-end">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            Options
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
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

    @include('app.invoices.modals.create-invoice')

@endsection
