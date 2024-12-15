@extends('layout.app')

@section('content')

<div class="d-flex justify-content-between">
    <div class="">
        <h2 class="fs-30px fw-700 montserrat">Chart Of Accounts</h2>
    </div>
    <div>

        <button
            data-toggle="modal"
            data-target="#new_account_modal"
            type="button"
            class="btn btn-primary m-0">

            <i class="fas fa-plus me-3"></i>
            New Account

        </button>
    </div>
</div>

<div class="card border-0 mt-5">
    <ul class="nav nav-tabs nav-tabs-v2 ps-4 pe-4">
        @php
        $k = 1;
        @endphp

        @foreach ($account_types as $type)
        <li class="nav-item me-3 ">
            <a href="#{{ $type->id }}" class="nav-link {{ $k === 1 ? 'active' : '' }}" data-toggle="tab">
                {{ $type->description }}
            </a>
        </li>

        @php
        $k++;
        @endphp

        @endforeach

    </ul>
    <div class="tab-content p-4">


        @php
        $k = 1;
        @endphp

        @foreach ($account_types as $type)
        <div class="tab-pane fade {{ $k === 1 ? 'show active' : '' }}" id="{{ $type->id }}">

            <h4 class="mt-5 mb-3 fw-600 h4">{{ $type->description }} Accounts</h4>

            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">Acc. Number</th>
                        <th scope="col">Acc. Header</th>
                        <th scope="col">Acc. Name</th>
                        <th class="text-end">Debit</th>
                        <th class="text-end">Credit</th>
                        <th class="text-end">Balance</th>
                        <th scope="col" class="text-end">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($type->headers as $header)

                    @foreach ($header->accounts as $account)
                    <tr>
                        <td scope="row">
                            <a href="account_transactions.php?account_number={{ $account->account_number }}">
                                {{ $account->account_number }}
                            </a>
                        </td>
                        <td>{{ $header->description }}</td>
                        <td class="text-underline">

                            <a href="account_transactions.php?account_number={{ $account->account_number }}">
                                {{ $account->account_name }}
                            </a>

                        </td>
                        <td class="text-end">{{ number_format($account->totalDebit(),2) }}</td>
                        <td class="text-end">{{ number_format($account->totalCredit(),2) }}</td>
                        <td class="text-end">
                            {{ number_format($account->acc_balance(),2) }}
                        </td>
                        <td class="text-end">

                            <a href="#" class="me-3 text-primary">
                                <i class="fas fa-pen me-2"></i>
                                Edit
                            </a>

                            <a href="#" class="text-danger">
                                <i class="fas fa-trash-alt text-danger me-2"></i>
                                Delete
                            </a>

                        </td>
                    </tr>
                    @endforeach

                    @endforeach

                    <?php
                    // fetch all headers that belong to this type
                    // $filteredHeaders = $account->filterHeaderByType($key);

                    // $headers = $q->mysqli->query("SELECT * FROM account_headers WHERE type=$key");

                    // foreach ($filteredHeaders as $headers) {

                    //     $matchingHeader = $headers['sn'];
                    ?>


                    <?php

                    // $filteredAccounts = $account->filterByHeader($matchingHeader);

                    // if (is_array($filteredAccounts)) :

                    //     foreach ($filteredAccounts as $accounts) {

                    //         $account->account_number = $accounts['account_number'];
                    //         $account->AccountSummary();

                    ?>





                    <?php
                    // }
                    // endif;
                    ?>
                    <?php
                    // }
                    ?>

                </tbody>
            </table>

        </div>

        @php
        $k++;
        @endphp

        @endforeach



    </div>
</div>

@include('app.accounts.modals.new-account')

@endsection


@section('js')
<script type="text/javascript">
    $('.sidebar-fixed .list-group-item').removeClass('active')
    $('#accounting_nav').addClass('active')
    $('#accounting_submenu').addClass('show')
    $('#accounts_li').addClass('font-weight-bold')

    $('#print_trial_balance').on('click', function(event) {
        event.preventDefault();
        print_popup('print_trial_balance.php')
    });

    $('.nav-links').on('click', function(event) {
        $('.nav-links').removeClass('active')
        $('.nav-tabs .nav-links').removeClass('show')
        $(this).addClass('active')
        $(this).prop('aria-selected', 'false');
    });

    $('#print_pl').on('click', function(event) {
        event.preventDefault();
        print_popup('print_pandl.php')
    });

    $('#new_account_frm').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: '../serverscripts/admin/Accounts/new_account_frm.php',
            type: 'GET',
            data: $('#new_account_frm').serialize(),
            success: function(msg) {
                if (msg === 'save_successful') {
                    bootbox.alert("Account created successfully", function() {
                        window.location.reload()
                    })
                } else {
                    bootbox.alert(msg)
                }
            }
        })
    });
</script>
@endsection
