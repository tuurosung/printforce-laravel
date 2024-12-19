@extends('layout.app')

@section('content')

<div class="d-flex justify-content-between">
    <div class="">
        <h2 class="h2">Chart Of Accounts</h2>
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
                            <a href="{{ route('account-transactions', $account) }}">
                                {{ $account->account_number }}
                            </a>
                        </td>
                        <td>{{ $header->description }}</td>
                        <td class="text-underline">

                            <a href="account_transactions.php?account_number={{ $account->account_number }}">
                                {{ $account->account_name }}
                            </a>

                        </td>
                        <td class="text-end">{{ number_format($account->total_debit,2) }}</td>
                        <td class="text-end">{{ number_format($account->total_credit,2) }}</td>
                        <td class="text-end">
                            {{ number_format($account->account_balance,2) }}
                        </td>
                        <td class="text-end">

                            <div class="dropdown">
                                <a
                                    class="dropdown-toggle"
                                    type="button"
                                    id="triggerId"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                    Options
                                </a>
                                <div class="dropdown-menu" aria-labelledby="triggerId">
                                    <a
                                        href="#"
                                        class="dropdown-item me-3 edit_account"
                                        data-url="{{ route('edit-account', $account->account_number) }}">

                                        <i class="fas fa-pen me-3 text-primary"></i>
                                        Edit

                                    </a>

                                    <form class="d-inline-block dropdown-item" method="POST" action="{{ route('delete-account', $account->account_number) }}">
                                        @csrf
                                        <a
                                            href="#"
                                            class="text-danger text-decoration-none delete_account">

                                            <i class="fas fa-trash-alt text-danger me-3"></i>
                                            Delete

                                        </a>
                                    </form>
                                </div>
                            </div>




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

<div id="modal_holder"></div>
@endsection


@section('js')
<script type="text/javascript">
    $('#print_trial_balance').on('click', function(event) {
        event.preventDefault();
        print_popup('print_trial_balance.php')
    });

    $('#print_pl').on('click', function(event) {
        event.preventDefault();
        print_popup('print_pandl.php')
    });

    $('.table tbody').on('click', '.edit_account', function(event) {

        var url = $(this).data('url');

        $.get(url, function(response) {
            // console.log(response);

            $('#modal_holder').html(response);
            new bootstrap.Modal(document.getElementById('edit_account_modal')).show()
        })
    });

    $('.table tbody').on('click', '.delete_account', function(event) {
        event.preventDefault();

        var account = $(this)

        new swal("Are you sure you want to delete this account?", {
                buttons: {
                    cancel: "Cancel",
                    catch: {
                        text: "Yes! Delete it!",
                        value: "catch",
                    }
                }
            })
            .then((value) => {
                switch (value) {
                    case "cancel":
                        break;
                    case "catch":
                        account.closest('form').submit();
                        break;
                }
            });
    });
</script>
@endsection
