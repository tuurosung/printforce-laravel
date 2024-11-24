@extends('layout.app')

@section('content')
<div class="d-flex justify-content-center">

    <div class="">

        <h4 class="Axiforma fs-30px fw-600 mb-3">New Payment</h4>



        <form id="" autocomplete="off" method="POST" action="{{ route('create.payment') }}">
            @csrf
            <div class="card mb-3">
                <div class="card-body">



                    <div class="row">

                        <div class="col-md-6 mb-4 mb-md-0">
                            <div class="form-group">
                                <label for="">Customer</label>
                                <select class="custom-select browser-default" name="customer_id" id="customer_id">

                                    <option value="">--- Select Customer ---</option>

                                    @foreach ($all_customers as $customer)

                                    <option value="{{ $customer->customer_id }}" {{ $customer->customer_id === $customer_id ? 'selected' : '' }}>
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
                                <input type="number" step="any" min="1" class="form-control" name="amount_paid" id="amount_paid">
                            </div>
                        </div>

                        <div class="col-md-6 mb-4 mb-md-0">
                            <div class="form-group">
                                <label for="">Payment Date</label>
                                <input type="text" class="form-control" name="date" id="date" value="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                        </div>

                    </div>


                    <div class="form-group">
                        <label for="">Account Number</label>
                        <select class="browser-default custom-select" name="account_number" id="account_number">

                            <option value="">--- Select Account ---</option>

                            @foreach ($operating_accounts as $account)

                            <option value="{{ $account->account_number }}">
                                {{ $account->account_name }}
                            </option>

                            @endforeach

                        </select>
                    </div>

                </div>
            </div>



            <div class="text-end">
                <a href="{{ route('payment.list') }}" type="button" class="btn btn-outline-danger"><i class="fas fa-long-arrow-alt-left mr-3  "></i> Return</a>
                <button type="submit" class="btn btn-primary mr-0"><i class="fas fa-check mr-3"></i> Create Payment</button>
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

</script>
@endsection
