@extends('layout.app')

@section('content')

<x-headers.page-header pageTitle="Chart Of Accounts">
    <button class="btn btn-primary m-0" onclick="Livewire.dispatch('newAccount')">
        <i class="fas fa-plus me-3"></i>
        New Account
    </button>
</x-headers.page-header>


<x-tabs.tab>

    <x-slot name="tabs">
        @php
        $i = 1;
        @endphp

        @foreach ($account_types as $type)
        <x-tabs.tab-item :label="$type->label()" :active="$loop->iteration == 1" :id="$type->name" :controls="$type->name.'-content'" />
        @endforeach

    </x-slot>

    <x-slot name="content">
        @foreach ($account_types as $type)
        <x-tabs.tab-content :active="$loop->iteration == 1" id="{{ $type->name }}-content">

            <h2 class="text-xl font-cal-sans-regular font-normal mb-5">{{ $type->name }}</h2>

            <table class="table">
                <thead>
                    <th>Account Number</th>
                    <th>Account Name</th>
                    <th class="text-end">Debit</th>
                    <th class="text-end">Credit</th>
                    <th class="text-end">Balance</th>
                    <th class="text-end">Options</th>
                </thead>
                <tbody>

                    @foreach ($type->accounts() as $account)
                    @php
                        $balances = $account->balances;
                    @endphp
                    <tr>
                        <td>{{ $account->account_number }}</td>
                        <td>{{ $account->account_name }}</td>
                        <td class="text-end">{{ $account->inflows }}</td>
                        <td class="text-end">{{ $balances->outflows }}</td>
                        <td class="text-end">{{ $account->ledger_balance }}</td>
                        <td class="text-end">
                            @can('administrator')
                            <a href="#" class="me-1 text-blue-600" onclick="Livewire.dispatch('editAccount')">Edit</a>
                            <a href="#" class="text-red-600">Delete</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </x-tabs.tab-content>
        @endforeach
    </x-slot>



</x-tabs.tab>

<livewire:livewire.accounts.account-modal />



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
