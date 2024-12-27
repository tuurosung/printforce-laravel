@extends('layout.app')

@section('content')

@php
$supplier = $purchase->supplier;
@endphp

<div class="d-flex justify-content-between mb-4">
    <div>
        <h2 class="h2 mb-0">Prepare Invoice</h2>
    </div>
    <div>
        <form id="saveInvoiceFrm" class="d-inline-block" method="POST" action="{{ route('offload-cart') }}">
            @csrf

            <input type="hidden" name="purchase_id" value="{{ $purchase->purchase_id }}">
            <input type="hidden" name="supply_cost" value="{{ $purchase->purchasedItems->sum('sub_total') }}">

            <button
                type="button"
                id="saveInvoiceBtn"
                class="btn btn-primary">

                <i class="fas fa-check me-3  "></i>
                Save Invoice

            </button>
        </form>
        <button
            type="button"
            class="btn btn-danger">

            <i class="fas fa-trash-alt me-3  "></i>
            Trash

        </button>

    </div>
</div>

@include('layout.errors')

<div class="row g-5">
    <div class="col-md-6">

        <div class="card border-0 h-100">
            <div class="card-body p-4">

                <h5 class="mb-3">Prepare Invoice</h5>



                <div class="card border-2 border-primary mb-3">
                    <div class="card-body">

                        <form class="
                            <?php
                            if ($purchase->lockstatus == 'locked') {
                                echo 'd-none';
                            }
                            ?>
                            " id="" autocomplete="off" method="POST" action="{{ route('add-to-cart') }}">

                            @csrf

                            <input type="text" class="d-none" name="purchase_id" value="{{ $purchase->purchase_id }}">
                            <input type="text" class="d-none" name="supplier_id" value="{{ $supplier->supplier_id }}">

                            <div class="row">
                                <div class="col">

                                    <div class="mb-3">
                                        <label for="" class="form-label">Description</label>
                                        <input
                                            type="text"
                                            class="form-control form-control-sm"
                                            name="description"
                                            id="description"
                                            required
                                            placeholder="eg: Printing of A4 Flyer"
                                            required />
                                    </div>

                                </div>

                            </div>

                            <div class="row">
                                <div class="col">

                                    <div class="mb-3">
                                        <label for="" class="form-label">Unit Cost</label>
                                        <input
                                            type="text"
                                            class="form-control form-control-sm"
                                            name="unit_cost"
                                            id="unit_cost"
                                            value=""
                                            required
                                            placeholder=""
                                            required />
                                    </div>

                                </div>
                                <div class="col">

                                    <div class="mb-3">
                                        <label for="" class="form-label">Qty</label>
                                        <input
                                            type="text"
                                            class="form-control form-control-sm"
                                            name="qty"
                                            id="qty"
                                            value="1"
                                            required />
                                    </div>

                                </div>
                                <div class="col">

                                    <div class="mb-3">
                                        <label for="" class="form-label">Total</label>
                                        <input
                                            type="text"
                                            class="form-control form-control-sm"
                                            name="sub_total"
                                            id="total"
                                            value=""
                                            readonly />
                                    </div>

                                </div>
                            </div>

                            <div class="text-end">
                                <button
                                    type="submit"
                                    class="btn btn-primary">
                                    <i class="fas fa-plus me-3 py-1 "></i>
                                    Add To Invoice
                                </button>
                            </div>

                        </form>




                    </div>
                </div>

                <div class="mb-5">
                    <div class="form-check form-check-inline mb-2 fs-12px">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1"> 17.5% VAT/NHIL</label>
                    </div>

                    <div class="form-check form-check-inline mb-2 fs-12px">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">1% COVID Levy</label>
                    </div>
                    <div class="form-check form-check-inline mb-2">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">4% Flat Rate</label>
                    </div>
                </div>




                <table class="table table-sm">
                    <thead class="">
                        <tr>
                            <th>#</th>
                            <th>Description</th>
                            <th class="text-end">Unit Price</th>
                            <th class="text-center">Qty</th>
                            <th class="text-end">Amount</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @php
                        $i = 1;
                        @endphp

                        @foreach ($purchase->cartItems as $cartItem)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>

                                {{ $cartItem->description }}

                            </td>
                            <td class="text-end">{{ number_format($cartItem->unit_cost, 2) }}</td>
                            <td class="text-center">{{ $cartItem->qty }}</td>
                            <td class="text-end">{{ number_format($cartItem->sub_total, 2)  }}</td>
                            <td class="text-end">
                                <div class="dropdown">
                                    <a
                                        class=""
                                        type="button"
                                        id="triggerId"
                                        data-toggle="dropdown"
                                        data-bs-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="fas fa-ellipsis-v    "></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="triggerId">
                                        <a class="dropdown-item d-flex" href="#">
                                            Remove
                                            <i class="fas fa-trash-alt ms-auto text-danger"></i>
                                        </a>
                                        <!-- <a class="dropdown-item" href="#">Action</a> -->
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
    <div class="col-md-6">

        <div class="card border-0 h-100">
            <div class="card-body p-4">

                <div class="d-flex justify-content-between mb-5">
                    <div class="flex-1 d-flex">
                        <i class="fas fa-paper-plane me-3  "></i>
                        <p class="mb-2 fs-14px fw-600">{{ Auth::user()->company->company_name }}</p>
                    </div>
                    <div>

                        <p class="mb-0 fs-12px">{{ Auth::user()->company->company_address }}</p>
                        <p class="mb-1 fs-12px">{{ Auth::user()->company->company_phone }}</p>
                    </div>
                </div>

                <div class=" bg-gray-100 bg-opacity-40 p-3 rounded mb-4">

                    <div class="d-flex justify-content-between">
                        <div class="col-sm-6">

                            <h6 class="h6 mb-2 fw-500 fs-14px">Invoice Number</h6>

                            <div class="row fs-12px">
                                <span class="col-sm-4">Invoice #</span>
                                <span class="col-sm-7">{{ str_pad($purchase->sn, 6, '0', STR_PAD_LEFT) }}</span>
                            </div>
                            <div class="row fs-12px">
                                <span class="col-sm-4">Date Issued :</span>
                                <span class="col-sm-7">{{ $purchase->date_issued }}</span>
                            </div>
                            <div class="row fs-12px">
                                <span class="col-sm-4">Due Date :</span>
                                <span class="col-sm-7">{{ $purchase->due_date }}</span>
                            </div>

                        </div>
                        <div class="col-md-6 text-end">

                            <div>
                                <h6 class="h6 mb-2 fw-500 fs-14px">Billed To</h6>

                                <p class="mb-0 fs-12px">{{ $supplier->supplier_name }}</p>
                                <p class="mb-0 fs-12px">{{ $supplier->supplier_address }}</p>
                                <p class="mb-1 fs-12px">{{ $supplier->supplier_phone }}</p>
                            </div>

                        </div>
                    </div>

                </div>


                <table class="table table-sm">
                    <thead class="elegant-color-dark white-text">
                        <tr>
                            <th>#</th>
                            <th>Description</th>
                            <th class="text-end">Unit Price</th>
                            <th class="text-center">Qty</th>
                            <th class="text-end">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($purchase->cartItems as $cartItem)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $cartItem->description }}</td>
                            <td class="text-end">{{ number_format($cartItem->unit_cost, 2) }}</td>
                            <td class="text-center"><?php echo $cartItem['qty']; ?></td>
                            <td class="text-end"><?php echo number_format($cartItem['sub_total'], 2); ?> </td>
                        </tr>
                        @endforeach




                    </tbody>
                </table>


                <div class="row mb-5">
                    <div class="col-md-7">

                    </div>
                    <div class="col-md-5">

                        <div class="card border-primary border-1">
                            <div class="card-body">

                                <!-- Subtotal -->
                                <div class="row fs-14px mb-2">
                                    <div class="col-md-6 text-end">
                                        Sub - Total (GHS)
                                    </div>
                                    <div class="col-md-6 font-weight-bold text-end">
                                        {{ number_format($purchase->cartItems->sum('sub_total'), 2) }}
                                    </div>
                                </div>


                                <!-- Taxes -->
                                <div class="row fs-14px mb-2">
                                    <div class="col-md-6 text-end">
                                        Total Tax(GHS)
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <?php echo number_format($supplier->total_tax, 2); ?>
                                    </div>
                                </div>


                                <!-- Total -->
                                <div class="row fs-14px">
                                    <div class="col-md-6 fw-600 text-end">
                                        TOTAL (GHS)
                                    </div>
                                    <div class="col-md-6 text-end fw-600">
                                        {{ number_format($purchase->cartItems->sum('sub_total') + $purchase->total_tax, 2) }}
                                    </div>
                                </div>


                            </div>
                        </div>







                        <section class="" style="margin-top:7rem">
                            <p class="m-0 font-weight-bold text-uppercase text-center" style="font-size:11px"><?php echo $supplier->created_by; ?></p>
                        </section>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>








<div id="modal_holder"></div>


<div id="editor"></div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

<script type="text/javascript">
    $('#qty,#unit_cost').on('keyup', function(event) {
        event.preventDefault();
        var qty = $('#qty').val()
        var unit_cost = $('#unit_cost').val()
        $('#total').val((parseInt(qty) * parseFloat(unit_cost)).toFixed(2))
    });

    $('#saveInvoiceBtn').on('click', function(event) {

        new swal("Confirm","You cannot edit the invoice after saving, Do you want to proceed?","warning", {
            buttons : {
                cancel : "Cancel",
                catch: {
                    text: "Yes, Delete it!",
                    value: "catch"
                }
            }
        })
        .then ((value) => {
            switch (value) {
                case "cancel" :
                    break;
                case "catch" :
                    $('#saveInvoiceFrm').submit();
                    break;
            }
        })
    })

    $('#updateFrm').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: '../serverscripts/admin/Suppliers/updateFrm.php',
            type: 'POST',
            data: $("#updateFrm").serialize(),
            success: function(msg) {
                if (msg === 'update_successful') {
                    window.location.reload()
                } else {
                    bootbox.alert(msg)
                }
            }
        })
    });

    $('#savePurchaseBtn').on('click', function(event) {
        bootbox.confirm('Save Purchase Invoice', function(r) {
            if (r === true) {
                $.post("../serverscripts/admin/Suppliers/savePurchase.php", 'purchase_id={{ $purchase->purchase_id }}',
                    function(msg) {
                        if (msg === 'save_successful') {
                            bootbox.alert("Purchase recorded successfully", function() {
                                window.location = 'purchases.php'
                            })
                        } else {
                            bootbox.alert(msg)
                        }
                    }
                );
            }
        }) //end bootbox
    })

    // $('.table tbody').on('click', '.remove', function(event) {
    //     event.preventDefault();
    //     var sn = $(this).attr('ID')
    //     bootbox.confirm("Remove this invoice item?", function(r) {
    //         if (r === true) {
    //             $.get('../serverscripts/admin/Invoices/delete_invoice_item.php?sn=' + sn, function(msg) {
    //                 if (msg === 'delete_successful') {
    //                     bootbox.alert("Invoice item removed", function() {
    //                         window.location.reload()
    //                     })
    //                 } else {
    //                     bootbox.alert(msg)
    //                 }
    //             }) //end get
    //         }
    //     })

    // });


    // $('#print').on('click', function(event) {
    //     event.preventDefault();
    //     var purchase_id = $(this).data('purchase_id')
    //     print_popup('invoice_print.php?purchase_id=' + purchase_id)
    // });

    // var doc = new jsPDF();
    // var specialElementHandlers = {
    //     '#editor': function(element, renderer) {
    //         return true;
    //     }
    // };

    // $('#print_pdf').click(function() {
    //     doc.fromHTML($('#pdfprint').html(), 15, 15, {
    //         'width': 170,
    //         'elementHandlers': specialElementHandlers
    //     });
    //     doc.save('sample-file.pdf');
    // });
</script>
@endsection


<?php


// if (isset($_SESSION['active_purchase_invoice'])) {
//     $purchase_id = $seagate->Clean($_SESSION['active_purchase_invoice']);
//     $supplier_id = $seagate->Clean($_SESSION['active_supplier_id']);
// } elseif (isset($_GET) && !empty($_GET['purchase_id'])) {

//     $purchase_id = $seagate->Clean($_GET['purchase_id']);
//     $supplier_id = $seagate->Clean($_GET['supplier_id']);
// } else {
//     echo "<script type='text/javascript'>window.location='purchases.php';</script>";
// }


// $supplier = new Supplier($q->db, $q->mysqli);
// $supplier->purchase_id = $purchase_id;


// $supplier->supplier_id = $supplier_id;
// $supplier->SupplierInfo();

// $supplier->purchase_id = $purchase_id;
// $supplier->PurchaseInfo();

?>
