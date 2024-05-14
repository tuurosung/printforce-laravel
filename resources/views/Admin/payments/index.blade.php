@extends('layout.app')

@section('content')

<div class="d-flex justify-content-between mb-4">
    <div>
        <h1 class="montserrat fs-30px fw-700">Payments</h1>
    </div>
    <div>
        <a href="{{ route('new.payment', $customer_id) }}" type="button" class="btn btn-primary">
            <i class="fas fa-plus mr-3"></i> New Payment</a>
    </div>
</div>


<div class="row mb-3">

    <div class="col-2">
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-2 d-flex justify-content-center align-items-center">
                        <i class="fas fa-equals fa-2x text-primary"></i>
                    </div>

                    <div class="col-10">
                        <p class="fw-600 fs-18px Axiforma">GHS {{ number_format($todays_total_payment,2) }}</p>
                        <p>Today's Payments Jobs</p>
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
                        <i class="fas fa-coins fa-2x text-primary"></i>
                    </div>

                    <div class="col-10">
                        <p class="fw-600 fs-18px Axiforma">GHS {{ number_format($weeks_total_payment,2) }}</p>
                        <p>This Week</p>
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
                        <i class="fas fa-chart-line fa-2x text-purple"></i>
                    </div>

                    <div class="col-10">
                        <p class="fw-600 fs-18px Axiforma">GHS {{ number_format($months_total_payment,2) }}</p>
                        <p>This Month</p>
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
                        <i class="fas fa-chart-pie fa-2x text-warning"></i>
                    </div>

                    <div class="col-10">
                        <p class="fw-600 fs-18px Axiforma">GHS {{ number_format($years_total_payment,2) }}</p>
                        <p>This Year</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<div class="card">
    <div class="card-body">

        <!-- Only show to admins -->
        <form id="filter_cash_payments_frm" class="mb-5">
            @csrf
            <div class="row">
                <div class="col-md-2">
                    <label for="">Start Date</label>
                    <input type="text" class="form-control" id="start_date" name="start_date" value="{{ date('Y-m-d') }}">
                </div>
                <div class="col-md-2">
                    <label for="">End Date</label>
                    <input type="text" class="form-control" id="end_date" name="end_date" value="{{ date('Y-m-d') }}">
                </div>
                <div class="col-md-2">
                    <label for="">Customer</label>
                    <select class="custom-select browser-default" name="customer_id" id="customer_id">
                        <option value="all">All Customers</option>

                        @foreach ($all_customers as $rows)
                        <option value="{{ $rows->customer_id }}">{{ $rows->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col-md-2">

                    <button type="submit" class="btn btn-primary wide" style="margin-top:27px !important">
                        <i class="fas fa-file-alt mr-2" aria-hidden></i> Generate Report</button>

                </div>
            </div>
        </form>

        <div class="" id="data_holder">


            <table class="table table-secondary">
                <thead class="">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Account</th>
                        <th class="text-right">Amount</th>
                        <th class="text-right">Option</th>
                    </tr>
                </thead>
                <tbody>

                    @php
                    $total = 0;
                    @endphp

                    @foreach ($all_payments as $payments)

                    @php
                    $payment_id = $payments->payment_id;
                    @endphp
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td>{{ $payments->payment_date }}</td>
                        <td>{{ $payments->customer->name }}</td>
                        <td>{{ $payments->account->account_name }}<!--- Payment Account Name --> </td>
                        <td class="text-right">{{ number_format($payments->amount_paid,2) }}</td>
                        <td class="text-right">

                            <a class="receipt mr-3" id="{{ $payments->payment_id }}" style="text-decoration: none;">
                                <i class=" fas fa-print text-primary"></i>
                            </a>

                            <!-- Only show to admins -->

                            <a href="{{ route('payment.edit', $payment_id) }}" class="" style="text-decoration: none;">
                                <i class=" fas fa-pen text-purple mr-3"></i>
                            </a>

                            <a href="#" class="delete" style="text-decoration: none;" data-url="{{ route('payment.delete', $payments->payment_id) }}">
                                <i class=" fas fa-trash-alt text-danger "></i>
                            </a>






                        </td>
                    </tr>

                    @php
                    $total += $payments->amount_paid;
                    @endphp

                    @endforeach

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-right Axiforma fs-18px fw-500">{{ number_format($total,2) }}</td>
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
    // set the active sidebar menu item
    $('.list-group-item').removeClass('active')
    $('#payments_nav').addClass('active')

    // initialize the selected element
    $('#customer_id').select2();

    // initialize the datepicker
    $('#start_date,#end_date,#payment_date').datepicker()
    $('#start_date,#end_date,#payment_date').on('change', function(event) {
        event.preventDefault();
        $(this).datepicker('hide')
    });

    $('.table tbody').on('click', '.delete', function(event) {
        const $this = $(this);
        const url = $this.data('url')
        const csrfToken = '{{ csrf_token() }}';

        bootbox.confirm('Are you sure you want to delete this payment?', function(confirmed) {
            if (confirmed) {
                // window.location = url;

                $('#deleteFrm').attr('action', url);
                $('#deleteFrm').submit()

                // $.post(url, {
                //     _method: 'post',
                //     '_token': csrfToken
                // }, function(r) {
                //     window.location.reload();
                // })
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





    $(document).ready(function() {




        // initialize elements on modal shown
        // $('#new_payment_modal').on('shown.bs.modal', function() {
        //     // function setFocus() {
        //     //     $('#amount_paid').focus();
        //     // }
        //     // setTimeout(setFocus, 100);
        //     $('#amount_paid').focus();
        //     $('#customer_idd').select2({
        //         dropdownParent: $('#new_payment_modal')
        //     })
        //     $('#payment_date').datepicker()
        // })





        $('table tbody').on('click', '.receipt', function(event) {
            event.preventDefault();
            var payment_id = $(this).attr('ID')
            print_popup('payment_receipt.php?payment_id=' + payment_id)
        });


        $('.table tbody').on('click', '.edit_payment', function(event) {
            event.preventDefault();
            var payment_id = $(this).attr('ID');
            EditPayment(payment_id);
        });




        function EditPayment(payment_id) {
            if (payment_id != '') {
                $.get("../includes/modals/Payments/edit.php?payment_id=" + payment_id, function(msg) {
                    $('#modal_holder').html(msg)
                    $('#edit_payment_modal').modal('show')
                    $('#customer_idd').select2();
                    $('#date').datepicker();
                    $('#date').on('change', function() {
                        $(this).datepicker('hide')
                    })

                    $('#edit_payment_frm').on('submit', function(event) {
                        event.preventDefault();
                        bootbox.confirm("Update payment details?", function(r) {
                            if (r === true) {

                                $.ajax({
                                    url: '../serverscripts/admin/Payments/edit_payment_frm.php',
                                    type: 'GET',
                                    data: $('#edit_payment_frm').serialize(),
                                    success: function(msg) {
                                        if (msg === 'update_successful') {
                                            bootbox.alert("Payment info updated successfully", function() {
                                                window.location.reload()
                                            })
                                        } else {
                                            bootbox.alert(msg)
                                        } //end if
                                    } //end success
                                }) //end ajax

                            }
                        })
                    }); //end edit_payment_frm

                })
            }
        }
    })
</script>
@endsection


<?php
// require main file header
// require_once '../_main.php';
?>

<?php
// $payment = new Payment($q->db, $q->mysqli);
// $account = new Account($q->db, $q->mysqli);
// $customer = new Customer($q->db, $q->mysqli);
?>
