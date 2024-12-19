@extends('layout.app')

@section('content')

<ul class="nav nav-pills mb-3" id="pills-tab">
    <li class="nav-item">
        <a class="nav-link active" id="pills-dashboard-tab" data-bs-toggle="pill" data-toggle="pill" href="#pills-dashboard">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-transactions-tab" data-bs-toggle="pill" data-toggle="pill" href="#pills-transactions">Transactions</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-payments-tab" data-bs-toggle="pill" data-toggle="pill" href="#pills-payments">Payments</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-inboundTransfers-tab" data-bs-toggle="pill" data-toggle="pill" href="#pills-inboundTransfers">Inbound Transfers</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-expenses-tab" data-bs-toggle="pill" data-toggle="pill" href="#pills-expenses">Expenses</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-outboundTransfers-tab" data-bs-toggle="pill" data-toggle="pill" href="#pills-outboundTransfers">Outbound Transfers</a>
    </li>
</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-dashboard">

        <div class="card border-0">
            <div class="card-body">

                <div class="d-flex justify-content-between mb-5">
                    <div class="">
                        <p>Account Transactions</p>
                        <h2 class="titles montserrat">{{ $operatingAccount->account_name }}</h2>
                    </div>
                    <div class="">

                    </div>
                </div>


                <div class="row mb-5">

                    <div class="col-md-2">

                        <div class="card border-primary border-1 shadow-sm">
                            <div class="card-body">

                                <p class="mb-2">Payments</p>
                                <h4 class="h4 mb-0">GHS {{ number_format($operatingAccount->total_payments, 2) }}</h4>

                            </div>
                        </div>

                    </div>
                    <div class="col-md-2">

                        <div class="card border-warning border-1">
                            <div class="card-body">

                                <p class="mb-2">Received Funds</p>
                                <h4 class="h4 mb-0">GHS {{ number_format($operatingAccount->total_received_funds, 2) }}</h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">

                        <div class="card border-danger border-1">
                            <div class="card-body">

                                <p class="mb-2">Expenses</p>
                                <h4 class="h4 mb-0">GHS {{ number_format($operatingAccount->total_expenditure, 2) }}</h4>

                            </div>
                        </div>

                    </div>
                    <div class="col-md-2">

                        <div class="card border-black border-1">
                            <div class="card-body">

                                <p class="mb-2">Transfers</p>
                                <h4 class="h4 mb-0">GHS {{ number_format($operatingAccount->total_transferred_funds, 2) }}</h4>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-2">

                        <div class="card border-success border-1">
                            <div class="card-body">

                                <p class="mb-2">Account Balance</p>
                                <h4 class="h4 mb-0">GHS {{ number_format($operatingAccount->account_balance, 2) }}</h4>

                            </div>
                        </div>
                    </div>

                </div>


                <div class="row">
                    <div class="col-md-8">



                        <div class="card border-primary">
                            <div class="card-body">

                                <h5 class="h5 mb-4">Recent Transactions</h5>

                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Type</th>
                                            <th>Description</th>
                                            <th class="text-end">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>2023-02-20</td>
                                            <td>Payment</td>
                                            <td>Payment for services</td>
                                            <td class="text-end">$1,000.00</td>
                                        </tr>
                                        <tr>
                                            <td>2023-02-15</td>
                                            <td>Deposit</td>
                                            <td>Deposit from bank</td>
                                            <td class="text-end">$5,000.00</td>
                                        </tr>
                                        <tr>
                                            <td>2023-02-10</td>
                                            <td>Expense</td>
                                            <td>Expense for materials</td>
                                            <td class="text-end">$2,000.00</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>

            </div>
        </div>

    </div>
    <div class="tab-pane fade" id="pills-transactions">

        @include('app.accounts.partials.account-transactionSummary')

    </div>
    <div class="tab-pane fade" id="pills-payments">

        @include('app.accounts.partials.account-payments')

    </div>
    <div class="tab-pane fade" id="pills-inboundTransfers">

        @include('app.accounts.partials.account-inboundTransfers')

    </div>
    <div class="tab-pane fade" id="pills-expenses">

        @include('app.accounts.partials.account-expenses')

    </div>
    <div class="tab-pane fade" id="pills-outboundTransfers">

        @include('app.accounts.partials.account-outboundTransfers')

    </div>
</div>




<div id="modal_holder"></div>

@endsection

@section('js')

<script type="text/javascript">
    $('#date').datepicker()
    $('.list-group-item').removeClass('active')
    $('#reports_nav').addClass('active')

    $('#date').on('change', function(event) {
        event.preventDefault();
        $(this).datepicker('hide')
    });



    $('.accounts').on('click', function(event) {
        event.preventDefault();
        var account_number = $(this).attr('ID')
        $.ajax({
            url: '../serverscripts/restadmin/account_history.php?account_number=' + account_number,
            type: 'GET',
            success: function(msg) {
                $('#data_holder').html(msg)
                $('html, body').animate({
                    scrollTop: $("#data_holder").offset().top
                }, 2000);

            }
        })
    });



    $('.transfer_funds').on('click', function(event) {
        event.preventDefault();
        var account_number = $(this).attr("ID")
        $.ajax({
            url: '../serverscripts/restadmin/transfer_funds_modal.php?account_number=' + account_number,
            type: 'GET',
            success: function(msg) {
                $('#modal_holder').html(msg)
                $('#transfer_funds_modal').modal('show')

                $('#transfer_funds_frm').on('submit', function(event) {
                    event.preventDefault();
                    bootbox.confirm('Do you want to proceed with this transaction?', function(r) {
                        if (r === true) {
                            $.ajax({
                                url: '../serverscripts/restadmin/transfer_funds_frm.php',
                                type: 'GET',
                                data: $('#transfer_funds_frm').serialize(),
                                success: function(msg) {
                                    if (msg === 'save_successful') {
                                        bootbox.alert('Transfer Successful', function() {
                                            window.location.reload()
                                        })
                                    } else {
                                        bootbox.alert(msg)
                                    }
                                }
                            })
                        }
                    })
                });
            }
        })
    });
</script>

@endsection

<?php

// $account = new Account($q->db, $q->mysqli);
// $customer = new Customer($q->db, $q->mysqli);
// $payment = new Payment($q->db, $q->mysqli);
// $transfer = new Transfer($q->db, $q->mysqli);
// $expenditure = new Expenditure($q->db, $q->mysqli);

// // clean the GET variable
// $_GET = array_map([$seagate, 'Clean'], $_GET);

// $account_number = $_GET['account_number'];

// $account->account_number = $account_number;
// $info = $account->AccountInfo();

// $summary = $account->AccountSummary();

?>
