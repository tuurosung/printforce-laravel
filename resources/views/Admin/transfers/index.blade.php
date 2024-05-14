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
        <h4 class="titles">Fund Transfer</h4>
    </div>
    <div>
        <a href="{{ route('new.transfer') }}" type="button" class="btn btn-outline-primary">
            <i class="fas fa-plus mr-3"></i>New Transfer
        </a>
    </div>
</div>

<div class="row mb-3">

    <div class="col-2">
        <div class="card">
            <div class="card-body">


                <div class="row">

                    <div class="col-2 d-flex justify-content-center align-items-center">
                        <i class="fas fa-arrows-alt-h fa-2x text-primary"></i>
                    </div>

                    <div class="col-10">
                        <p class="fw-600 fs-18px Axiforma">GHS {{ $transferSummary['today'] }}</p>
                        <p>Today's Transfers</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-2 d-flex justify-content-center align-items-center">
                        <i class="fas fa-calendar-minus fa-2x text-warning"></i>
                    </div>

                    <div class="col-10">
                        <p class="fw-600 fs-18px Axiforma">GHS {{ $transferSummary['week'] }}</p>
                        <p>Weekly Transfers</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-2 d-flex justify-content-center align-items-center">
                        <i class="fas fa-calendar-minus fa-2x text-purple"></i>
                    </div>

                    <div class="col-10">
                        <p class="fw-600 fs-18px Axiforma">GHS {{ $transferSummary['month'] }}</p>
                        <p>Monthly Transfers</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-2 d-flex justify-content-center align-items-center">
                        <i class="fas fa-calendar-minus fa-2x text-pink"></i>
                    </div>

                    <div class="col-10">
                        <p class="fw-600 fs-18px Axiforma">GHS {{ $transferSummary['year'] }}</p>
                        <p>Yearly Transfers</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<div class="card">
    <div class="card-body">



        <form id="filterFrm" method="POST" action="{{ route('filter.transfers') }}">

            @csrf

            <div class="d-flex">
                <div class="form-group mr-3">
                    <label for="">Start Date</label>
                    <input type="text" class="form-control bg-white mr-3" name="start_date" id="start_date" value="{{ date('Y-m-d') }}" required>
                </div>
                <div class="form-group mr-3">
                    <label for="">End Date</label>
                    <input type="text" class="form-control bg-white mr-3" name="end_date" id="end_date" value="{{ date('Y-m-d') }}" required>
                </div>
                <div class="form-group pt-20px">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search mr-3"></i> Filter Transfers</button>
                </div>
            </div>

        </form>

        <div id="data_holder">
            <table class="table table-secondary datatables">
                <thead class="font-weight-bold">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Source</th>
                        <th>Destination</th>
                        <th>Notes</th>
                        <th class="text-right">Amount</th>
                        <th class="text-right">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $total = 0;
                    @endphp

                    @foreach ($all_transfers as $transfer)

                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $transfer->date }}</td>
                        <td>{{ $transfer->sourceAccount->account_name }}</td>
                        <td>{{ $transfer->destinationAccount->account_name }}</td>
                        <td>{{ $transfer->notes }}</td>
                        <td class="text-right">{{ number_format($transfer->amount,2) }}</td>
                        <td class="text-right">

                            <a href="{{ route('edit.transfer', $transfer->transfer_id) }}" class="mr-3 text-decoration-none">
                                <i class="fas fa-pen text-primary "></i>
                            </a>

                            <a href="#" class="text-decoration-none delete" data-url="{{ route('delete.transfer', $transfer->transfer_id) }}">
                                <i class="fas fa-trash-alt text-danger"></i>
                            </a>


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
                        <td class="fs-18px fw-600 Axiforma text-right">{{ number_format($total,2) }}</td>
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

@endsection

@section('js')
<script type="text/javascript">
    $('.table tbody').on('click', '.delete', function(event) {
        const $this = $(this);
        const url = $this.data('url')
        const csrfToken = '{{ csrf_token() }}';

        bootbox.confirm('Are you sure you want to delete this transfer?', function(confirmed) {
            if (confirmed) {
                // window.location = url;

                $('#deleteFrm').attr('action', url);
                $('#deleteFrm').submit()

            }
        }); //end bootbox
    })

    /**
     * Filter cash payments
     */
    $('#filterFrm').on('submit', function(event) {
        event.preventDefault();

        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();
        // var customer_id = $('#customer_id').val();
        $('#filter_cash_payment_frm').serialize();
        // var _token = ;
        const url = "{{ route('filter.transfers') }}";

        $.post(url, {
                _token: "{{ csrf_token() }}",
                start_date,
                end_date
            },
            function(data) {
                $('#data_holder').html(data);
            }
        );

    });






    $('.table tbody').on('click', '.edit', function() {
        var transfer_id = $(this).attr('ID')
        $.get("../includes/modals/Accounts/editTransferModal.php", 'transfer_id=' + transfer_id,
            function(msg) {
                $('#modal_holder').html(msg)
                $('#editTransferModal').modal('show')

                $('#editTransferFrm').on('submit', function(event) {
                    event.preventDefault()
                    $.ajax({
                        type: "GET",
                        url: "../serverscripts/admin/Accounts/editTransferFrm.php",
                        data: $('#editTransferFrm').serialize(),
                        success: function(msg) {
                            if (msg === 'update_successful') {
                                bootbox.alert("Information updated successful", function() {
                                    window.location.reload()
                                })
                            } else {
                                bootbox.alert(msg)
                            }
                        }
                    });
                }); //end submit

            }
        );
    });
</script>
@endsection
