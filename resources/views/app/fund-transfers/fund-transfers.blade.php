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
<div class="d-flex justify-content-between mb-5">
    <div>
        <h4 class="h2 fw-600">Fund Transfer</h4>
    </div>
    <div>
        <button
            type="button"
            class="btn btn-primary"
            data-toggle="modal"
            data-target="#new_fundtransfer_modal">

            <i class="fas fa-plus me-3"></i>
            New Transfer

        </button>
    </div>
</div>

<div class="row mb-5">

    <div class="col-md-2">

        <div class="card border-0">
            <div class="card-body">

                <p class="mb-2">Today's Transfers</p>
                <h4 class="h4 mb-0">GHS {{ $transferSummary['today'] }}</h4>

            </div>
        </div>

    </div>
    <div class="col-md-2">

        <div class="card border-0">
            <div class="card-body">

                <p class="mb-2">Weeky Transfer</p>
                <h4 class="h4 mb-0">GHS {{ $transferSummary['week'] }}</h4>

            </div>
        </div>
    </div>
    <div class="col-md-2">

        <div class="card border-0">
            <div class="card-body">

                <p class="mb-2">Monthly Transfer</p>
                <h4 class="h4 mb-0">GHS {{ $transferSummary['month'] }}</h4>

            </div>
        </div>
    </div>
    <div class="col-md-2">

        <div class="card border-0">
            <div class="card-body">

                <p class="mb-2">Yearly Transfer</p>
                <h4 class="h4 mb-0">GHS {{ $transferSummary['year'] }}</h4>

            </div>
        </div>
    </div>

</div>

@include('layout.errors')

<div class="card border-0">
    <div class="card-body">



        <form id="filterFrm">

            <div class="d-flex mb-5">
                <div class="mb-3 me-3">
                    <label for="" class="form-label">Start Date</label>
                    <input
                        type="text"
                        class="form-control form-control-sm"
                        name="start_date"
                        id="start_date"
                        value="{{ now()->format('Y-m-d') }}"
                        required />
                </div>
                <div class="mb-3 me-3">
                    <label for="" class="form-label">End Date</label>
                    <input
                        type="text"
                        class="form-control form-control-sm"
                        name="end_date"
                        id="end_date"
                        value="{{ now()->format('Y-m-d') }}"
                        required />
                </div>
                <div class="form-group" style="padding-top: 27px;">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search me-3"></i> Filter Transfers</button>
                </div>
            </div>

        </form>

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
                    @php
                    $i = 1;
                    $total = 0;
                    @endphp

                    @foreach ($all_transfers as $transfer)

                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $transfer->date }}</td>
                        <td>{{ $transfer->sourceAccount->account_name }}</td>
                        <td>{{ $transfer->destinationAccount->account_name }}</td>
                        <td>{{ $transfer->notes }}</td>
                        <td class="text-end">{{ number_format($transfer->amount,2) }}</td>
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
                                        data-url="{{ route('edit-transfer', $transfer->transfer_id) }}"
                                        class="dropdown-item edit_transfer">

                                        <i class="fas fa-pen text-primary me-3"></i>
                                        Edit
                                    </a>

                                    <form method="POST" action="{{ route('delete.transfer', $transfer->transfer_id) }}">
                                        @csrf
                                        <a
                                            href="#"
                                            class="dropdown-item delete_transfer">

                                            <i class="fas fa-trash-alt text-danger me-3"></i>
                                            Delete
                                        </a>
                                    </form>
                                </div>
                            </div>

                        </td>
                    </tr>
                    @php
                    $total += $transfer->amount;
                    @endphp

                    @endforeach

                    <tr>
                        <td>-------</td>
                        <td>-------</td>
                        <td>-------</td>
                        <td>-------</td>
                        <td>-------</td>
                        <td class="fs-18px fw-600 Axiforma text-end">{{ number_format($total,2) }}</td>
                        <td></td>
                    </tr>


                </tbody>
            </table>
        </div>

    </div>
</div>

<form id="deleteFrm" method="POST" action="">
    @csrf
    <input type="hidden" name="product_id" value="" required>
</form>

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


    const showEditModal = function(url) {
        $.get(url, function(msg) {

            $('#modal_holder').html(msg)
            new bootstrap.Modal(document.getElementById('edit_fundtransfer_modal')).show()
        })
    }

    const confirmDelete = function(transfer) {
        new swal("Confirm", "Are you sure you want to delete this transfer?", "warning", {
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
                        transfer.closest('form').submit();
                        break;
                }
            });
    }


    $('.table tbody').on('click', '.edit_transfer', function() {

        showEditModal($(this).data('url'))
    });


    $('.table tbody').on('click', '.delete_transfer', function(event) {

        confirmDelete($(this))
    })

    /**
     * Filter cash payments
     */
    $('#filterFrm').on('submit', function(event) {
        event.preventDefault();

        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();

        const url = "{{ route('filter.transfers') }}";

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
