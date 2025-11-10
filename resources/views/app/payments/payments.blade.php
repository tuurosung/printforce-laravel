@extends('layout.app')

@section('content')

    <x-printforce.headers.page-header title="Payments">
        <a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_payment_modal">
            <i class="fas fa-plus me-3"></i>
            New Payment
        </a>
    </x-printforce.headers.page-header>

    @can('administrator')
        <div class="row mb-4">
            <div class="col-md-2">
                <x-printforce.cards.colour-card title="Today's Payments" :value="$statistics['todays_payments']"
                    bgColour="primary" />

            </div>
            <div class="col-md-2">
                <x-printforce.cards.colour-card title="Weekly Payments" :value="$statistics['this_weeks_payments']"
                    bgColour="success" />

            </div>
            <div class="col-md-2">
                <x-printforce.cards.colour-card title="Monthly Pmts" :value="$statistics['this_months_payments']"
                    bgColour="pink" />

            </div>
            <div class="col-md-2">
                <x-printforce.cards.colour-card title="Annual Payments" :value="$statistics['this_years_payments']"
                    bgColour="warning" />

            </div>
        </div>
    @endcan




    <div class="card border-0">
        <div class="card-body">

            <!-- Only show to admins -->
            <form id="filter_cash_payments_frm" class="mb-5">
                @csrf
                <div class="d-flex">
                    <div class="w-200px me-2">
                        <label for="" class="form-label">Start Date</label>
                        <input type="text" class="form-control" id="start_date" name="start_date"
                            value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="w-200px me-2">
                        <label for="" class="form-label">End Date</label>
                        <input type="text" class="form-control" id="end_date" name="end_date" value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="w-200px me-2">
                        <label for="" class="form-label">Customer</label>
                        <select class="custom-select browser-default" name="customer_id" id="filterCustomerId2">
                            <option value="all">All Customers</option>



                        </select>
                    </div>
                    <div class="w-200px">

                        <button type="submit" class="btn btn-primary wide" style="margin-top:27px !important">
                            <i class="fas fa-file-alt me-2" aria-hidden></i> Generate Report</button>

                    </div>
                </div>
            </form>

            <div class="" id="data_holder">


                <table class="table datatables table-sm">
                    <thead class="">
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Customer</th>
                            <th>Account</th>
                            <th class="text-end">Amount</th>
                            <th class="text-end">Option</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($payments as $payment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $payment->payment_date ?? $payment->created_at }}</td>
                            <td>{{ $payment->customer->name }}</td>
                            <td>{{ $payment->account->account_name }}</td>
                            <td class="text-end">{{ number_format($payment->amount_paid, 2) }}</td>
                            <td class="text-end">

                                <a href="javascript:void(0)" class="text-primary receipt me-1" id="{{ $payment->payment_id }}">
                                    <i class="fi fi-sr-print text-primary"></i>
                                    Print
                                </a>

                                <a href="javascript:void(0)" data-url="{{ route('payments.edit', $payment) }}" class="text-primary me-1 edit">
                                    <i class="fi fi-rc-pencil"></i>
                                    Edit
                                </a>

                                <form id="deleteFrm" method="POST" action="{{ route('payments.delete', $payment) }}" class="d-inline-block">
                                    @csrf
                                    @method('delete')
                                    <a href="#" class="delete text-danger">
                                        <i class="fi fi-rr-trash text-danger"></i>
                                        Delete
                                    </a>
                                </form>
                            </td>
                        </tr>

                        @php
        $total += $payment->amount_paid;
                        @endphp

                        @endforeach

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-end Axiforma fs-18px fw-600">{{ number_format($total, 2) }}</td>
                            <td></td>
                        </tr>


                    </tbody>
                </table>


            </div>
        </div>
    </div>

    <div id="modal_holder"></div>
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('assets/js/printforce/payments/payments.js') }}"></script>


@endsection
