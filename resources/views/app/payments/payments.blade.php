@extends('layout.app')

@section('content')

<div class="d-flex justify-content-between mb-4">
    <div>
        <h1 class="h2">Payments</h1>
    </div>
    <div>
        <!-- <a
            href="#"
            type="button"
            class="btn btn-primary"
            data-toggle="modal"
            data-target="#new_payment_modal">
            <i class="fas fa-plus me-3"></i>
            New Payment
        </a> -->
    </div>
</div>


<div class="row mb-5">

    <div class="col-md-2">

        <div class="card border-0">
            <div class="card-body">

                <p class="mb-2">Today's Payments</p>
                <h4 class="h4 mb-0">{{ number_format($stats['todays_total_payment'],2) }}</h4>

            </div>
        </div>
    </div>
    <div class="col-md-2">

        <div class="card border-0">
            <div class="card-body">

                <p class="mb-2">This Week</p>
                <h4 class="mb-0">{{ number_format($stats['weeks_total_payment'],2) }}</h4>

            </div>
        </div>
    </div>
    <div class="col-2">

        <div class="card border-0">
            <div class="card-body">

                <p class="mb-2">This Month</p>
                <h4 class="h4 mb-0">{{ number_format($stats['months_total_payment'],2) }}</h4>

            </div>
        </div>
    </div>
    <div class="col-md-2">

        <div class="card border-0">
            <div class="card-body">

                <p class="mb-2">Annual Payment</p>
                <h4 class="h4 mb-0">{{ number_format($stats['years_total_payment'],2) }}</h4>

            </div>
        </div>
    </div>

</div>

<div class="card border-0">
    <div class="card-body">

        <!-- Only show to admins -->
        <form id="filter_cash_payments_frm" class="mb-5">
            @csrf
            <div class="d-flex">
                <div class="w-200px me-2">
                    <label for="" class="form-label">Start Date</label>
                    <input type="text" class="form-control" id="start_date" name="start_date" value="{{ date('Y-m-d') }}">
                </div>
                <div class="w-200px me-2">
                    <label for="" class="form-label">End Date</label>
                    <input type="text" class="form-control" id="end_date" name="end_date" value="{{ date('Y-m-d') }}">
                </div>
                <div class="w-200px me-2">
                    <label for="" class="form-label">Customer</label>
                    <select class="custom-select browser-default" name="customer_id" id="filterCustomerId">
                        <option value="all">All Customers</option>

                        @foreach ($customers as $customer)
                        <option value="{{ $customer->customer_id }}">{{ $customer->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="w-200px">

                    <button type="submit" class="btn btn-primary wide" style="margin-top:27px !important">
                        <i class="fas fa-file-alt me-2" aria-hidden></i> Generate Report</button>

                </div>
            </div>
        </form>

        <div class="" id="data_holder">


            <table class="table table-sm">
                <thead class="">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Account</th>
                        <th class="text-end">Amount</th>
                        <th class="text-end">Option</th>
                    </tr>
                </thead>
                <tbody>

                    @php
                    $i = 1;
                    $total = 0;
                    @endphp

                    @foreach ($payments as $payment)

                    @php
                    $payment_id = $payment->payment_id;
                    @endphp
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td>{{ $payment->payment_date ?? $payment->created_at }}</td>
                        <td>{{ $payment->customer->name }}</td>
                        <td>{{ $payment->account->account_name }}<!--- Payment Account Name --> </td>
                        <td class="text-end">{{ number_format($payment->amount_paid,2) }}</td>
                        <td class="text-end">

                            <div class="dropdown">
                                <a
                                    class=""
                                    type="button"
                                    id="deleteTrigger"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                    Options
                                </a>
                                <div class="dropdown-menu" aria-labelledby="deleteTrigger">

                                    <a
                                        class="dropdown-item receipt"
                                        id="{{ $payment->payment_id }}">

                                        <i class="fas fa-print text-primary me-3"></i>
                                        Print Receipt
                                    </a>

                                    <a
                                        href="{{ route('edit.payment', $payment) }}"
                                        class="dropdown-item">
                                        <i class=" fas fa-pen text-primary me-3"></i>
                                        Edit Payment
                                    </a>
                                    <form id="deleteFrm" method="POST" action="{{ route('delete.payment', $payment) }}">
                                        @csrf
                                        <a
                                            href="#"
                                            class="dropdown-item delete_payment">

                                            <i class=" fas fa-trash-alt text-danger me-3"></i>
                                            Delete Payment
                                        </a>
                                    </form>

                                </div>
                            </div>

                        </td>
                    </tr>

                    @php
                    $total += $payment->amount_paid;
                    @endphp

                    @endforeach

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-end Axiforma fs-18px fw-600">{{ number_format($total,2) }}</td>
                        <td></td>
                    </tr>


                </tbody>
            </table>


        </div>
    </div>
</div>


@endsection

@section('js')
<script type="text/javascript">
    // initialize the selected element
    $('#filterCustomerId').select2();

    $('#new_payment_modal').on('shown.bs.modal', function(event) {
        event.preventDefault();

        $('#date').datepicker()

        $('#date').on('change', function(event) {
            event.preventDefault();
            $(this).datepicker('hide')
        });

        $('#amount_paid').focus()
    });

    // initialize the datepicker
    $('#start_date,#end_date,#payment_date').datepicker()
    $('#start_date,#end_date,#payment_date').on('change', function(event) {
        event.preventDefault();
        $(this).datepicker('hide')
    });

    $('table tbody').on('click', '.receipt', function(event) {
        event.preventDefault();
        var payment_id = $(this).attr('ID')
        print_popup('payment_receipt.php?payment_id=' + payment_id)
    });

    $('.table tbody').on('click', '.delete_payment', function(event) {

        var payment = $(this);

        bootbox.confirm('Are you sure you want to delete this payment?', function(confirmed) {
            if (confirmed) {

                payment.closest('form').submit();
            }
        }); //end bootbox
    })

    /**
     * Filter cash payments
     */
    $('#filter_cash_payments_frm').on('submit', function(event) {
        event.preventDefault();

        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();
        var customer_id = $('#customer_id').val();
        $('#filter_cash_payment_frm').serialize();
        // var _token = ;
        const url = "{{ route('filter.payments') }}";

        $.post(url, {
                _token: "{{ csrf_token() }}",
                start_date,
                end_date,
                customer_id
            },
            function(data) {
                $('#data_holder').html(data);
            }
        );

    });
</script>


@endsection
