@extends('layout.app')

@section('content')

<x-headers.page-header pageTitle="Prepare Invoice">
    @if ($purchase->lockstatus != 'locked')
    <form class="inline" method="POST" action="{{ route('purchases.offload-cart', $purchase) }}">
        @csrf
        <button type="button" id="saveInvoiceBtn" class="btn btn-primary">

            <i class="fas fa-check me-3  "></i>
            Save Invoice

        </button>
    </form>
    <button type="button" class="btn btn-danger">

        <i class="fas fa-trash-alt me-3  "></i>
        Trash

    </button>
    @endif

    @if ($purchase->lockstatus == 'locked')
    <button type="button" class="btn btn-primary" id="print" data-url="{{ route('purchases.print-invoice', $purchase) }}">
        <i class="fi fi-sr-print me-3"></i>
        Print Invoice
    </button>
    @endif
</x-headers.page-header>


<div class="card border-0">
    <div class="card-body px-[70px]">

        <div class="flex justify-content-between mb-5">
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

            <div class="flex justify-between">
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

        @if ($purchase->lockstatus != 'locked')

        <form class="{{ $purchase->lockstatus == 'locked' ? 'd-none' : '' }} mb-4" id="" autocomplete="off"
            method="POST" action="{{ route('purchases.purchased-items.store', $purchase) }}">

            @csrf

            <div class="grid grid-cols-12 gap-3">
                <div class="col-span-3">
                    <div class="">
                        <label for="" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description"
                            id="description" required placeholder="eg: Printing of A4 Flyer" required />
                    </div>
                </div>
                <div class="col-span-2">
                    <div class="">
                        <label for="" class="form-label">Unit Cost</label>
                        <input type="number" class="form-control" name="unit_cost"
                            id="unit_cost" value="" min="1" step="0.01" required placeholder="" required />
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="">
                        <label for="" class="form-label">Qty</label>
                        <input type="number" class="form-control" name="qty" id="qty" value="1"
                            step="1" required />
                    </div>
                </div>
                <div class="col-span-2">
                    <div class="">
                        <label for="" class="form-label">Total</label>
                        <input type="text" class="form-control" name="sub_total" id="total"
                            value="" readonly />
                    </div>
                </div>
                <div class="col-span-2 flex-col mt-auto">
                    <button type="submit" class="btn bg-blue-600 py-2.5">
                        <i class="fi fi-rr-plus-small me-3"></i>
                        Add To Invoice
                    </button>

                </div>
            </div>



        </form>
        @endif


        <table class="table">
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
                @if ($purchase->lockstatus == 'locked')
                @php
                $purchaseItems = $purchase->purchasedItems;
                @endphp
                @elseif ($purchase->lockstatus == 'editing')
                @php
                $purchaseItems = $purchase->cartItems;
                @endphp
                @endif
                @foreach ($purchaseItems as $cartItem)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        {{ $cartItem->description }}
                        @if ($purchase->lockstatus != 'locked')
                        <form method="POST"
                            action="{{ route('purchases.purchased-items.remove-from-cart', $cartItem) }}"
                            class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <a href="javascript:void(0)" class="text-danger remove-item">delete</a>
                        </form>
                        @endif

                    </td>
                    <td class="text-end">{{ number_format($cartItem->unit_cost, 2) }}</td>
                    <td class="text-center"><?php echo $cartItem['qty']; ?></td>
                    <td class="text-end"><?php echo number_format($cartItem['sub_total'], 2); ?> </td>
                </tr>
                @endforeach




            </tbody>
        </table>

        <div class="d-flex justify-content-between mt-5">
            <div>
                <p class="mb-0 fs-12px fw-600">
                    <i class="fas fa-info-circle me-2"></i>
                    You can add more items to the invoice.
                </p>
                <p class="mb-0 fs-12px fw-600">
                    <i class="fas fa-info-circle me-2"></i>
                    Click on the delete link to remove an item from the invoice.
                </p>
                <p class="mb-0 fs-12px fw-600">
                    <i class="fas fa-info-circle me-2"></i>
                    Click on the save button to save the invoice.
                </p>
            </div>
            <div>

                <table class="table table-sm">
                    <tr>
                        <td class="text-end fw-600">Sub-Total (GHS)</td>
                        <td class="text-end fw-600">
                            {{ $purchase->lockstatus == 'locked' ? number_format($purchase->total, 2) : number_format($purchase->cart_sub_total, 2) }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-end fw-600">Total Tax (GHS)</td>
                        <td class="text-end fw-600">
                            0.00
                        </td>
                    </tr>
                    <tr>
                        <td class="text-end fw-600">Total (GHS)</td>
                        <td class="text-end fw-600">
                            {{ $purchase->lockstatus == 'locked' ? number_format($purchase->total, 2) : number_format($purchase->cart_sub_total, 2) }}
                        </td>
                    </tr>
                </table>
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
        calculateItemTotal();
    });



    $('#saveInvoiceBtn').on('click', function(event) {

        const $form = $(this).closest('form');

        bootbox.confirm("Are you sure you want to save this invoice?", function(answer) {
            if (answer) {
                $form.submit();
            }
        })
    })


    $(document).on('click', '.table tbody .remove-item', function() {

        const $form = $(this).closest('form');


        bootbox.confirm("Remove this invoice item?", function(answer) {
            if (answer) {
                $form.submit();
            }
        })

    });


    $('#print').on('click', function(event) {
        event.preventDefault();
        const url = $(this).data('url');
        print_popup(url, 'Print Invoice', 800, 600);
    });

    var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function(element, renderer) {
            return true;
        }
    };

    $('#print_pdf').click(function() {
        doc.fromHTML($('#pdfprint').html(), 15, 15, {
            'width': 170,
            'elementHandlers': specialElementHandlers
        });
        doc.save('sample-file.pdf');
    });


    /**
     * Calculate the total amount for an
     * invoice item based on quantity and unit cost.
     *
     * @return void
     */
    function calculateItemTotal() {

        // do nothing if description is empty
        if ($('#description').val().trim() === '') {
            $('#total').val('');
            return;
        }

        const qty = parseFloat($('#qty').val()) ?? 0;
        const unitCost = parseFloat($('#unit_cost').val()) ?? 0;
        const total = qty * unitCost;
        $('#total').val(total.toFixed(2));
    }
</script>
@endsection
