@extends('layout.app')

@section('content')

<div class="d-flex justify-content-between">
    <div class="">
        <h2 class="fs-30px fw-700 montserrat">Chart Of Accounts</h2>
    </div>
    <div>

        <a href="{{ route('new.account') }}"  type="button" class="btn btn-primary m-0">
            <i class="fas fa-plus mr-3"></i>New Account
        </a>

    </div>
</div>

<div class="card mt-5">
    <ul class="nav nav-tabs nav-tabs-v2 ps-4 pe-4">
        @php
        $k = 1;
        @endphp

        @foreach ($account_types as $type)
        <li class="nav-item me-3 ">
            <a href="#{{ $type->id }}" class="nav-link {{ $k === 1 ? 'active' : ''; }}" data-toggle="tab">
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
        <div class="tab-pane fade {{ $k === 1 ? 'show active' : ''; }}" id="{{ $type->id }}">

            <h4 class="mb-5 montserrat">{{ $type->description }}</h4>

            <table class="table table-secondary">
                <thead>
                    <tr>
                        <th scope="col">Acc. Number</th>
                        <th scope="col">Acc. Header</th>
                        <th scope="col">Acc. Name</th>
                        <th class="text-right">Debit</th>
                        <th class="text-right">Credit</th>
                        <th class="text-right">Balance</th>
                        <th scope="col" class="text-right">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($type->headers as $header)

                    @foreach ($header->accounts as $account)
                    <tr>
                        <th scope="row">
                            <a href="account_transactions.php?account_number={{ $account->account_number }}">
                                {{ $account->account_number }}
                            </a>
                        </th>
                        <td>{{ $header->description }}</td>
                        <td class="text-underline">

                            <a href="account_transactions.php?account_number={{ $account->account_number }}">
                                {{ $account->account_name }}
                            </a>

                        </td>
                        <td  class="text-right">{{ number_format($account->totalDebit(),2) }}</td>
                        <td  class="text-right">{{ number_format($account->totalCredit(),2) }}</td>
                        <td class="text-right">
                            {{ number_format($account->acc_balance(),2) }}
                        </td>
                        <td class="text-right">

                            <a href="#" class="text-decoration-none mr-3">
                                <i class="fas fa-pen text-primary"></i>
                            </a>

                            <a href="#" class="text-decoration-none">
                                <i class="fas fa-trash-alt text-danger"></i>
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
