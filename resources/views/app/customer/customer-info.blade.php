@extends('layout.app')

@section('content')

<div class="d-flex justify-content-between mb-4">
    <div>
        <h4 class="h2 m-0">Customer Portal</h4>
    </div>
    <div class="">

        <div class="dropdown d-inline">
            <a
                class="btn btn-primary"
                type="button" id="dropdownMenu2"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false">

                <i class="fas fa-plus me-3"></i>
                Register Jobs
            </a>
            <div class="dropdown-menu dropdown-primary">

                <a
                    class="dropdown-item"
                    href="#"
                    data-toggle="modal"
                    data-target="#new_largeformat_modal">
                    Large Format
                </a>
                <a
                    class="dropdown-item"
                    href="#"
                    data-toggle="modal"
                    data-target="#new_embroidery_job_modal">
                    Embroidery
                </a>
                <a
                    class="dropdown-item"
                    href="#"
                    data-toggle="modal"
                    data-target="#new_design_job_modal">
                    Design Job
                </a>
                <a
                    class="dropdown-item"
                    href="#"
                    data-toggle="modal"
                    data-target="#new_press_job_modal">
                    Press Job
                </a>
                <a class="dropdown-item" href="/new-largeformatjob/ {{ $customer->customer_id }}">Photography</a>

            </div>
        </div>

        <div class="dropdown d-inline">
            <a
                class="btn btn-primary"
                type="button"
                id="dropdownMenu2"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false">

                <i class="fas fa-file-invoice-dollar me-3"></i>
                Invoices
            </a>
            <div class="dropdown-menu dropdown-primary">

                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#new_invoice_modal">New Invoice</a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#">Invoice Pmt</a>
                <!-- <a class="dropdown-item" href="#">Something else here</a>
                    <a class="dropdown-item" href="#">Something else here</a> -->

            </div>
        </div>

        <button
            type="button"
            class="btn btn-primary"
            data-toggle="modal"
            data-target="#new_payment_modal">

            <i class="fas fa-credit-card me-3  "></i>
            New Payment

        </button>




    </div>
</div>


@include('layout.errors')

<div class="card border-0 mb-5 bg-primary text-white">
    <div class="card-body">

        <p class="text-white mb-0"> Customer Name </p>
        <p class="h3 m-0 text-white">{{ $customer->name }}</p>

        <hr class="border-white">

        <div class="row">
            <div class="col-md-3 text-white">
                Customer Category
                <p class="text-white h5"> {{ $customer->customer_category_description }} </p>
            </div>
            <div class="col-md-3 text-white">
                Phone Number
                <p class="text-white h5"> {{ $customer->phone }} </p>
            </div>
            <div class="col-md-3 text-white">
                Customer Category
                <p class="text-white h5"> {{ $customer->date_registered }} </p>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>


<div class="row mb-5">

    <div class="col-md-2">
        <div class="card border-0">
            <div class="card-body">

                <p class="m-0">Number Of Jobs</p>
                <h3 class="h4 m-0">{{ $customer->job_count }}</h3>

            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card border-0">
            <div class="card-body">

                <p class="m-0">Total Bills</p>
                <h3 class="h4 m-0">GHS {{ number_format($customer->customer_debit, 2) }}</h3>

            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card border-0">
            <div class="card-body">

                <p class="m-0">Total Payment</p>
                <h3 class="h4 m-0">GHS {{ number_format($customer->customer_credit, 2) }}</h3>

            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card border-0">
            <div class="card-body">

                <p class="m-0">Balance Remaining</p>
                <h3 class="h4 m-0">GHS {{ number_format($customer->customer_balance, 2) }}</h3>

            </div>
        </div>
    </div>


</div>





<ul class="nav nav-pills mb-3" id="pills-tab">
    <li class="nav-item">
        <a class="nav-link active" id="pills-largeFormat-tab" data-bs-toggle="pill" data-toggle="pill" href="#pills-largeFormat">Large Format Jobs</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-embroidery-tab" data-bs-toggle="pill" data-toggle="pill" href="#pills-embroidery">Embroidery</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-design-tab" data-bs-toggle="pill" data-toggle="pill" href="#pills-design">Design</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-press-tab" data-bs-toggle="pill" data-toggle="pill" href="#pills-press">Press</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-photography-tab" data-bs-toggle="pill" data-toggle="pill" href="#pills-photography">Photography</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-payments-tab" data-bs-toggle="pill" data-toggle="pill" href="#pills-payments">Payments</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-toggle="pill" href="#pills-contact">Invoices</a>
    </li>
</ul>

<hr class="">

<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-largeFormat">

        <div class="card border-0">
            <div class="card-body">

                <h4 class="mb-5">Large Format Jobs</h4>

                @include('app.customer.partials.largeFormatJobs')

            </div>
        </div>

    </div>

    <div class="tab-pane fade" id="pills-embroidery">

        <div class="card border-0">
            <div class="card-body">

                <h4 class="mb-5">Embroidery</h4>

                @include('app.customer.partials.embroideryJobs')

            </div>
        </div>


    </div>
    <div class="tab-pane fade" id="pills-design">

        <div class="card border-0">
            <div class="card-body">

                <h4 class="mb-5">Design Jobs</h4>

                @include('app.customer.partials.designJobs')

            </div>
        </div>

    </div>

    <div class="tab-pane fade" id="pills-press">

        <div class="card border-0">
            <div class="card-body">

                <h4 class="mb-5">Press Jobs</h4>

                @include('app.customer.partials.pressJobs')

            </div>
        </div>

    </div>

    <div class="tab-pane fade" id="pills-photography">

        <div class="card border-0">
            <div class="card-body">

                <h4 class="mb-5">Photography Jobs</h4>

                @include('app.customer.partials.photograpyJobs')

            </div>
        </div>


    </div>


    <div class="tab-pane fade" id="pills-payments">

        <div class="card border-0">
            <div class="card-body">

                <h4 class="mb-5">Payment History</h4>

                <table class="table table-sm datatables">
                    <thead class="">
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>ID</th>
                            <th>Account</th>
                            <th class="text-end">Amount</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        $total = 0;
                        @endphp

                        @foreach ($customer->payments as $payment)

                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td>{{ $payment->payment_date ?? $payment->created_at }}</td>
                            <td> {{ $payment->timestamp ?? $payment->created_at }} </td>
                            <td>{{ $payment->payment_id }}</td>
                            <td>{{ $payment->payment_account_name }}</td>
                            <td class="text-end">{{ number_format($payment->amount_paid, 2) }}</td>
                            <td class="text-end">

                                <div class="dropdown">
                                    <a
                                        class=""
                                        type="button"
                                        id="triggerId"
                                        data-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                        Options
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="triggerId">
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-receipt me-3  text-primary"></i>
                                            Reciept
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-pen me-3  text-primary"></i>
                                            Edit
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-trash-alt me-3  text-danger"></i>
                                            Delete
                                        </a>
                                    </div>
                                </div>


                            </td>
                        </tr>

                        @php
                        $total += (float) $payment->amount_paid;
                        @endphp


                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-end Axiforma fs-18px fw-600">{{ number_format($customer->payments->sum('amount_paid'), 2) }}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

    </div>
    <div class="tab-pane fade" id="pills-contact">...</div>
</div>

@include('app.job.largeformat.new-largeformat')
@include('app.job.embroidery.new-embroidery')
@include('app.job.design.new-design')
@include('app.job.press.new-press')
@include('app.payments.modals.new-payment-modal')

@endsection

@section('js')

<!-- Large Format Js -->
<script type="text/javascript">
    $('#lf_service').select2({
        dropdownParent: $('#new_largeformat_modal'),
    });

    var service_cost = $('#lf_service').find(":selected").data('cost');
    $("#lf_cost").val(service_cost);
    $('#width').focus()

    $('#lf_service').on('change', function(event) {
        event.preventDefault();

        var service_cost = $('#lf_service').find(":selected").data('cost');

        $("#lf_cost").val(service_cost);
        $('#width,#height,#copies').val('')

        setTimeout(function() {
            $('#width').focus()
        }, 300);

    }); //end change event

    $('#measuring_unit').on('change', function(event) {
        event.preventDefault();
        $('#width,#height,#lf_copies,#lf_total').val('')
    });

    $("#lf_copies,#lf_premium,#lf_discount,#height,#width").on('keyup', function(event) {
        event.preventDefault();

        var width = $('#width').val()
        width = (width === '' || isNaN(width)) ? 0 : parseFloat(width)

        var height = $('#height').val()
        height = (height === "" || isNaN(height)) ? 0 : parseFloat(height)

        var copies = $('#lf_copies').val()
        copies = (copies === '' || isNaN(copies)) ? 0 : parseFloat(copies)

        var cost = $('#lf_cost').val()
        cost = (cost === '' || isNaN(cost)) ? 0 : parseFloat(cost)

        var premium = $('#lf_premium').val()
        premium = (premium === '' || isNaN(premium)) ? 0 : parseFloat(premium)

        var discount = $('#lf_discount').val()
        discount = (discount === '' || isNaN(discount)) ? 0 : parseFloat(discount)

        if ($('#measuring_unit').val() === 'ft') {
            var total = width * height * copies * cost
            $('#lf_total').val((Math.round(total + premium - discount)).toFixed(2))
        } else if ($('#measuring_unit').val() === 'inch') {
            var total = ((width * height) / 144) * copies * cost
            $('#lf_total').val(Math.round(total + premium - discount).toFixed(2))
        }
    });

    // $('#new_largeformat_frm').one('submit', function(event) {
    //     event.preventDefault();

    //     $(this).submit(function() {
    //         return false;
    //     });

    //     $.ajax({
    //         url: '../serverscripts/admin/new_largeformat_frm.php',
    //         type: 'GET',
    //         data: $('#new_largeformat_frm').serialize(),
    //         success: function(msg) {
    //             if (msg === 'save_successful') {
    //                 bootbox.alert("Job registration successful", function() {
    //                     window.location.reload()
    //                 })
    //             } else {
    //                 bootbox.alert(msg)
    //             }
    //         }
    //     }) //end ajax

    // }); //end large format submit
</script>

<!-- Embroidery JS -->

<script type="text/javascript">
    $('#em_service').select2({
        dropdownParent: $('#new_embroidery_job_modal'),
    });

    var service_cost = $('#em_service').find(":selected").data('cost');

    $("#em_cost").val(service_cost);

    setTimeout(function() {
        $('#em_qty').focus()
    }, 300);

    $('#em_service').on('change', function(event) {
        event.preventDefault();

        var service_cost = $('#em_service').find(":selected").data('cost');
        $("#em_cost").val(service_cost);

        setTimeout(function() {
            $('#em_qty').focus()
        }, 300);

    }); //end change event

    $("#em_qty").on('keyup', function(event) {
        event.preventDefault();

        var qty = $('#em_qty').val()
        qty = (qty === '' || isNaN(qty)) ? 0 : parseInt(qty)

        var cost = $('#em_cost').val()
        cost = (cost === '' || isNaN(cost) || cost <= 0) ? 0 : parseFloat(cost)

        $('#em_total,#emb_total').val((Math.round(qty * cost)).toFixed(2))
    });


    $('#mat_supply').on('change', function() {
        const isMatSupply = $(this).val() === 'yes';

        $('#mat_unit_cost').prop('readonly', !isMatSupply);
        $('#mat_unit_cost, #purchase_cost').val(isMatSupply ? '' : '0.00');

        if (isMatSupply) {
            $('#mat_unit_cost').focus();
        } else {
            $('#emb_total').val($('#em_total').val());
        }
    });

    $('#mat_unit_cost').on('keyup', function(event) {
        event.preventDefault();

        var qty = $('#em_qty').val()
        qty = (qty === '' || isNaN(qty)) ? 0 : parseInt(qty)

        var mat_unit_cost = $('#mat_unit_cost').val()
        mat_unit_cost = (mat_unit_cost === '' || isNaN(mat_unit_cost)) ? 0 : parseFloat(mat_unit_cost)

        $("#purchase_cost").val((Math.round(qty * mat_unit_cost)).toFixed(2))
        $('#emb_total').val((parseFloat($('#purchase_cost').val()) + parseFloat($("#em_total").val())).toFixed(2))

    });

    $('#new_embroidery_modal').on('shown.bs.modal', function(event) {
        event.preventDefault();

        $('#new_embroidery_frm').one('submit', function(event) {
            event.preventDefault();

            $(this).submit(function(event) {
                return false;
            });

            $.ajax({
                url: '../serverscripts/admin/new_embroidery_frm.php',
                type: 'GET',
                data: $('#new_embroidery_frm').serialize(),
                success: function(msg) {
                    if (msg === 'save_successful') {
                        bootbox.alert("Job registration successful", function() {
                            window.location.reload()
                        })
                    } else {
                        bootbox.alert(msg)
                    }
                }
            }) //end ajax
        }); //end large format submit

    }); //end large format modal show
</script>

<!-- Design JS -->

<script type="text/javascript">
    $('#de_service').select2({
        dropdownParent: $('#new_design_job_modal'),
    });

    var service_cost = $('#de_service').find(":selected").data('cost');
    $("#de_cost").val(service_cost);

    $('#de_service').on('change', function(event) {
        event.preventDefault();

        var service_cost = $('#de_service').find(":selected").data('cost');
        $("#de_cost").val(service_cost);

        setTimeout(function() {
            $('#de_copies').focus()
        }, 300);

    }); //end change event

    $("#de_copies").on('keyup', function(event) {
        event.preventDefault();

        var copies = $('#de_copies').val()
        copies = (copies === '' || isNaN(copies) || copies === 'undefined') ? 0 : parseInt(copies);

        var cost = $('#de_cost').val()
        cost = (cost === '' || isNaN(cost) || cost === 'undefined') ? 0 : parseFloat(cost);

        $('#de_total').val((Math.round(copies * cost)).toFixed(2))
    });
</script>

<!-- Press JS -->

<script type="text/javascript">
    $('#pr_service').select2({
        dropdownParent: $('#new_press_job_modal'),
    });

    var service_cost = $('#pr_service').find(":selected").data('cost');
    $("#pr_cost").val(service_cost);
    $('#pr_copies').focus()

    $('#pr_service').on('change', function(event) {
        event.preventDefault();

        var service_cost = $('#pr_service').find(":selected").data('cost');
        $("#pr_cost").val(service_cost);
        $('#pr_copies').focus()
    }); //end change event

    $("#pr_copies").on('keyup', function(event) {
        event.preventDefault();

        var copies = $('#pr_copies').val()
        copies = (copies === '' || isNaN(copies) || copies === 'undefined') ? 0 : parseInt(copies)

        var cost = $('#pr_cost').val()
        cost = (cost === '' || isNaN(cost) || cost === 'undefined') ? 0 : parseFloat(cost)

        $('#pr_total').val((copies * cost).toFixed(2))
    });
</script>


<!-- Payment JS -->

<script type="text/javascript">
    $('#account_number, #customer_id').select2({
        dropdownParent: $('#new_payment_modal'),
    });
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

        $('#amount_paid').focus()
    });
</script>

@endsection

<!--
    <script type="text/javascript" src="includes/js/CustomerPortal/customer_portal.js"></script>
    <script type="text/javascript" src="js/invoice.js"></script>
    <script type="text/javascript" src="includes/js/CustomerPortal/customerPortal.js"></script> -->
