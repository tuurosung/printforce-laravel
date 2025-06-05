<?php
// require main file header
// require_once '../_main.php';
?>

<?php
// $account = new Account($q->db, $q->mysqli);
// $transfer = new Transfer($q->db, $q->mysqli);
?>

@extends('layout.app')

@section('content')
    <x-printforce.headers.page-header title="Fund Transfers">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_fundtransfer_modal">

        <i class="fas fa-plus me-3"></i>
        New Transfer

    </button>
    </x-printforce.headers.page-header>



    <div class="row mb-5">

        <div class="col-md-2">
            <x-printforce.cards.colour-card
                title="Today's Transfers"
                :value="$transferStatistics['todays_transfers']"
                bgColour="primary"
                />

        </div>
        <div class="col-md-2">
            <x-printforce.cards.colour-card
                title="Monthly Transfers"
                :value="$transferStatistics['monthly_transfers']"
                bgColour="warning"
                />

        </div>
        <div class="col-md-2">
            <x-printforce.cards.colour-card
                title="Yearly Transfers"
                :value="$transferStatistics['yearly_transfers']"
                bgColour="info"
                />

        </div>
        <div class="col-md-2">
            <x-printforce.cards.colour-card
                title="Total Transfers"
                :value="$transferStatistics['total_transfers']"
                bgColour="success"
                />

        </div>

    </div>

    @include('layout.errors')

    <div class="card border-0">
        <div class="card-body">

            @include('app.fund-transfers.partials.filter-form')

            <div id="data_holder">
                <table class="table table-sm datatables">
                    <thead class="">
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Source</th>
                            <th>Destination</th>
                            <th>Notes</th>
                            <th class="text-end">Amount</th>
                            <th class="text-end">Options</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($all_transfers as $transfer)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $transfer->date }}</td>
                                <td>{{ $transfer->sourceAccount->account_name }}</td>
                                <td>{{ $transfer->destinationAccount->account_name }}</td>
                                <td>{{ $transfer->notes }}</td>
                                <td class="text-end">{{ number_format($transfer->amount, 2) }}</td>
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
                                                data-url="{{ route('accounting.transfers.edit', $transfer) }}"
                                                class="dropdown-item edit_transfer">

                                                <i class="fas fa-pen text-primary me-3"></i>
                                                Edit
                                            </a>

                                            <form method="POST" action="{{ route('accounting.transfers.delete', $transfer) }}">
                                                @csrf
                                                <a
                                                    href="#"
                                                    class="dropdown-item delete">

                                                    <i class="fas fa-trash-alt text-danger me-3"></i>
                                                    Delete
                                                </a>
                                            </form>
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


    @include('app.fund-transfers.modals.new-fundtransfer')


    <div id="modal_holder"></div>

@endsection

@section('js')
    <script type="text/javascript">
        $('#new_fundtransfer_modal').on('shown.bs.modal', function(event) {
            event.preventDefault();
            $('#date').datepicker()
            $('#amount').focus();

            $('#transfer_from, #transfer_to').select2({
                dropdownParent: $('#new_fundtransfer_modal')
            });
        })


        $('#newTransferFrm').on('submit', function(event) {
            event.preventDefault();

            // check if source account is the same as destination account
            if ($('#source_account').val() === $('#destination_account').val()) {
                new swal("Error", "Source account and destination account cannot be the same", "error");
                return;
            }

            // remove the preventDefault and allow form to submit
            $('#newTransferFrm').off('submit').submit();
        })


        $('.table tbody').on('click', '.edit_transfer', function() {

            var url = $(this).data('url')

            $.get(url, function (response){
                $('#modal_holder').html(response)
                $('#edit_fundtransfer_modal').modal('show')
            })
        });


        $(document).on('click', '.table tbody .delete', function (){

            var transfer = $(this).closest('form')

            bootbox.confirm("Are you sure you want to delete this transfer?", function (answer) {
                if (answer) {
                    transfer.submit();
                }
            })
        })

      
        /**
         * Filter cash payments
         */
        $('#filterFrm').on('submit', function(event) {
            event.preventDefault();

            var start_date = $('#start_date').val();
            var end_date = $('#end_date').val();

            const url = "{{ route('accounting.tranfsers.filter') }}";

            $.post(url, {
                    _token: "{{ csrf_token() }}",
                    start_date,
                    end_date
                },
                function(data) {
                    $('#data_holder').html(data);

                    $('.table tbody').on('click', '.edit_transfer', function() {
                        showEditModal($(this).data('url'))
                    });

                    $('.table tbody').on('click', '.delete_transfer', function(event) {
                        confirmDelete($(this))
                    })
                }
            );
        })

    </script>
@endsection
