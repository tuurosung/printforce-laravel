@extends('layout.app')

@section('content')
<div class="d-flex justify-content-center">

    <div class="col-4">

        <h4 class="montserrat fw-700 fs-30px mb-4">Edit Transfer</h4>

        <form id="" autocomplete="off" method="POST" action="{{ route('update.transfer') }}">

            @csrf

            <input type="text" class="form-control d-none" name="transfer_id" value="{{ $transfer->transfer_id }}" readonly required>

            <div class="card mb-3">
                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6 mb-4 mb-md-0">
                            <div class="form-group">
                                <label for="">Amount</label>
                                <input type="text" class="form-control" name="amount" id="amount" value="{{ $transfer->amount }}" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4 mb-md-0">
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="text" class="form-control" name="date" id="date" value="{{ $transfer->date }}" required>
                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-md-6 mb-4 mb-md-0">
                            <div class="form-group">
                                <label for="">Transfer From</label>
                                <select class="browser-default custom-select" name="source" id="transfer_from">

                                    @foreach ($all_accounts as $account)
                                    <option value="{{ $account->account_number }}" {{ $transfer->source_account === $account->account_number ? 'selected' : '' }}>

                                        {{ $account->account_name }}

                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4 mb-md-0">
                            <div class="form-group">
                                <label for="">Transfer To</label>
                                <select class="browser-default custom-select" name="destination" id="transfer_to">
                                    @foreach ($all_accounts as $account)
                                    <option value="{{ $account->account_number }}" {{ $transfer->destination_account === $account->account_number ? 'selected' : '' }}>

                                        {{ $account->account_name }}

                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="">Narration</label>
                        <input type="text" class="form-control" name="notes" id="notes" value="{{ $transfer->notes }}" required>
                    </div>



                </div>
            </div>

            <div class="text-end">

                <a href="{{ route('all.transfers') }}" type="button" class="btn btn-outline-danger">
                    <i class="fas fa-long-arrow-alt-left mr-3  "></i> Close</a>

                <button type="submit" class="btn btn-primary mr-0"> <i class="fas fa-check mr-3  "></i> Update Transfer Info</button>

            </div>



        </form>


    </div>

</div>
@endsection

@section('js')
<script type="text/javascript">
    $('#date').datepicker();

    setTimeout(function() {
        $('#amount').focus();
    }, 300)

    $('#transfer_from, #transfer_to').select2();
</script>
@endsection
<?php
// require main file header
// require_once '../_main.php';
?>

<?php
// check if payment id was passed
// if (!isset($_GET) || empty($_GET['transfer_id'])) {

//     if (isset($_SERVER['HTTP_REFERER'])) {
//         header('location: ' . $_SERVER['HTTP_REFERER']);
//     } else {
//         header('location: index.php');
//     }
// }
?>

<?php
// $transfer = new Transfer($q->db, $q->mysqli);

// // clean the GET variable
// $_GET = array_map([$seagate, 'Clean'], $_GET);

// $transfer_id = $_GET['transfer_id'];
// $transfer->transfer_id = $transfer_id;
// $transfer_info = $transfer->transferInfo();

// if (!is_array($transfer_info)) {
//     echo "<script type='text/javascript'>window.location = 'index.php'</script>";
// }
?>
