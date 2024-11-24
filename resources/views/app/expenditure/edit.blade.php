@extends('layout.app')

@section('content')
<div class="d-flex justify-content-center">


    <div class="col-4">

        <h3 class="montserrat fw-600 fs-30px">Edit Expenditure</h3>

        <form id="" autocomplete="off" method="POST" action="{{ route('update.expenditure') }}">

            @csrf

            <input type="text" class="form-control d-none" name="expenditure_id" id="expenditure_id" value="{{ $expenditure->expenditure_id }}" readonly required>

            <div class="card mb-3">
                <div class="card-body">

                    <div class="row">

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Amount</label>
                                <input type="number" class="form-control" step="any" min="0" name="amount" id="amount" value="{{ $expenditure->amount }}" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="text" class="form-control" name="date" id="date" value="{{ $expenditure->date }}" required>
                            </div>
                        </div>

                    </div>



                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" class="form-control" name="description" id="description" value="{{ $expenditure->description }}" required>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Expenditure Header</label>
                                <select class="browser-default custom-select select2" name="header_id" id="header_id" required>

                                    @foreach ($expenditure_headers as $header)
                                    <option value="{{ $header->header_id }}" {{ $header->header_id === $expenditure->header_id ? 'selected' : '' }}>

                                        {{ $header->header_name }}

                                    </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Account</label>
                                <select class="custom-select browser-default" name="account_number" id="account_number" required>

                                    @foreach ($all_accounts as $account)
                                    <option value="{{ $account->account_number }}" {{ $account->account_number === $expenditure->account_number ? 'selected' : '' }}>

                                        {{ $account->account_name }}

                                    </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('all.expenses') }}" type="button" class="btn btn-outline-danger"><i class="fas fa-long-arrow-alt-left mr-3  "></i> Return</a>
                <button type="submit" class="btn btn-primary mr-0"> <i class="fas fa-check mr-3"></i> Update Expense</button>
            </div>

        </form>

    </div>

</div>
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {

        $('.list-group-item').removeClass('active')
        $('#expenditure_nav').addClass('active')
        $('#expenditure_submenu').addClass('show')
        $('#expenses_li').addClass('active-submenu')

        $('#amount').focus()


        $('#header_id, #account_number').select2()

        $('#date').datepicker()


    }); // end ready
</script>
@endsection

<?php
// require main file header
// require_once '../_main.php';
?>

<?php
// check if payment id was passed
// if (!isset($_GET) || empty($_GET['expenditure_id'])) {

//     if (isset($_SERVER['HTTP_REFERER'])) {
//         header('location: ' . $_SERVER['HTTP_REFERER']);
//     } else {
//         header('location: index.php');
//     }
// }

?>

<?php
// $e = new Expenditure($q->db, $q->mysqli);
// $account = new Account($q->db, $q->mysqli);
// $expenditure = new Expenditure($q->db, $q->mysqli);

// // clean the GET variable
// $_GET = array_map([$seagate, 'Clean'], $_GET);

// $expenditure_id = $_GET['expenditure_id'];
// $expenditure->expenditure_id = $expenditure_id;
// $expenditure_info = $expenditure->expenditureInfo();

// if (!is_array($expenditure_info)) {
//     echo "<script type='text/javascript'>window.location = 'index.php'</script>";
// }

?>
