@extends('layout.app')

@section('content')

<div class="d-flex justify-content-center">
    <div>

        <h4 class="Axiforma fs-30px fw-600 mb-3">Edit Payment</h4>

        @if ($errors->any())



        <div class="alert alert-danger">
            <ul class="list-group b-0">
                @foreach ($errors->all() as $error)
                <li class="list-group-item bg-none b-0">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form id="" autocomplete="off" method="POST" action="{{ route('payment.update') }}">

            @csrf

            <div class="card mb-3">
                <div class="card-body">

                    <input type="hidden" class="form-control" name="payment_id" value="{{ $payment->payment_id }}" readonly required>

                    <div class="row">

                        <div class="col-md-6 mb-4 mb-md-0">
                            <div class="form-group">
                                <label for="">Customer</label>
                                <select class="custom-select browser-default" name="customer_id" id="customer_id" required>
                                    <option value="">--- Select Customer ---</option>

                                    @foreach ($all_customers as $customer)

                                    <option value="{{ $customer->customer_id }}" {{ $customer->customer_id === $payment->customer_id ? 'selected' : '' }}>
                                        {{ $customer->name }}
                                    </option>

                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4 mb-md-0">

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-4 mb-md-0">
                            <div class="form-group">
                                <label for="">Amount Paid</label>
                                <input type="number" step="any" class="form-control" name="amount_paid" id="amount_paid" value="{{ $payment->amount_paid }}" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4 mb-md-0">
                            <div class="form-group">
                                <label for="">Payment Date</label>
                                <input type="text" class="form-control" name="date" id="date" value="{{ $payment->payment_date }}" required>
                            </div>
                        </div>

                    </div>


                    <div class="form-group">
                        <label for="">Account Number </label>
                        <select class="browser-default custom-select" name="account_number" id="account_number" required>

                            <option value="">--- Select Account ---</option>

                            @foreach ($operating_accounts as $account)

                            <option value="{{ $account->account_number }}" {{ $account->account_number === $payment->account_number ? 'selected' : '' }}>
                                {{ $account->account_name }}
                            </option>

                            @endforeach


                        </select>
                    </div>

                </div>
            </div>



            <div class="text-end">
                <a href="{{ route('payment.list') }}" type="button" class="btn btn-outline-danger"><i class="fas fa-long-arrow-alt-left mr-3  "></i> Return</a>
                <button type="submit" class="btn btn-primary mr-0"><i class="fas fa-check mr-3"></i> Update Payment</button>
            </div>

        </form>

    </div>
</div>



@endsection

@section('js')
<script type="text/javascript">
    $('#account_number, #customer_id').select2();
    $('#date').datepicker();

    $('#date').on('change', function() {
        $(this).datepicker('hide')
    })

    setTimeout(function() {
        $('#amount_paid').focus()
    }, 300);


    $('#new_payment_frm').on('submit', function(event) {
        event.preventDefault();
        $(this).submit(function(event) {
            return false;
        });
        $.ajax({
            url: '../serverscripts/admin/Payments/new.php',
            type: 'GET',
            data: $('#new_payment_frm').serialize(),
            success: function(msg) {
                if (msg === 'save_successful') {
                    bootbox.alert("Payment Recorded Successfully", function() {
                        window.location.reload()
                    })
                } else {
                    bootbox.alert(msg)
                }
            }
        }) //end ajax
    }); //end large format submit

    $('#new_payment_modal').on('shown.bs.modal', function(event) {
        event.preventDefault();
        $('#date').datepicker()

        $('#date').on('change', function(event) {
            event.preventDefault();
            $(this).datepicker('hide')
        });
    });
</script>
@endsection
