@extends('layout.app')

@section('content')

    <div class="card">
        <div class="card-body py-3 d-flex justify-content-between align-items-center border-r-1">
            <p class="mb-0">You're currently viewing this invoice in read-only mode</p>
            <button id="printInvoiceBtn" class="btn btn-primary" style="border-radius: 1px;" data-url="{{ route('invoices.print-invoice', $customerInvoice) }}">
                <i class="fi fi-rr-print me-1"></i>
                Print Invoice
            </button>
        </div>
    </div>


    <div class="card border-0 mx-auto" style="min-height:70vh;">
        <div class="card-body px-5">

            <h2 class="cal-sans fw-500 mb-5">Customer Invoice</h2>


            <div class="d-flex mb-5">
                <div>
                    <h5>{{ $customerInvoice->customer->name }}</h5>
                    <p class="mb-0">Customer Type : {{ $customerInvoice->customer->category }}</p>
                    <p class="mb-0">{{ $customerInvoice->customer->phone }}</p>
                </div>
                <div>

                </div>
            </div>

            <div class="row mb-4 d-none">
                <div class="col-2">
                    <div class="mb-3">
                        <label for="" class="form-label">Apply NHIL</label>
                        <select class="form-select form-select-lg" name="" id="">
                            <option selected>Select one</option>
                            <option value="">New Delhi</option>
                            <option value="">Istanbul</option>
                            <option value="">Jakarta</option>
                        </select>
                    </div>

                </div>
                <div class="col-2">
                    <div class="mb-3">
                        <label for="" class="form-label">Apply GetFund</label>
                        <select class="form-select form-select-lg" name="" id="">
                            <option selected>Select one</option>
                            <option value="">New Delhi</option>
                            <option value="">Istanbul</option>
                            <option value="">Jakarta</option>
                        </select>
                    </div>

                </div>
                <div class="col-2">
                    <div class="mb-3">
                        <label for="" class="form-label">Apply VAT</label>
                        <select class="form-select" name="" id="">
                            <option selected>Select one</option>
                            <option value="">New Delhi</option>
                            <option value="">Istanbul</option>
                            <option value="">Jakarta</option>
                        </select>
                    </div>

                </div>
            </div>

            <div>


                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Service</th>
                            <th scope="col" class="text-center">Unit Cost</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col">Details</th>
                            <th scope="col" class="text-end">Total</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($customerInvoice->customerInvoiceItems as $customerInvoiceItem)
                            <tr class=""></tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $customerInvoiceItem->service->service_name }}</td>
                            <td class="text-center">{{ $customerInvoiceItem->unit_cost }}</td>
                            <td class="text-center">{{ $customerInvoiceItem->quantity }}</td>
                            <td>{{ $customerInvoiceItem->details }}</td>
                            <td class="text-end">{{ $customerInvoiceItem->total }}</td>
                            </tr>
                        @endforeach

                        <tr class="d-none">
                            <td colspan="4"></td>
                            <td class="text-end">Sub-Total</td>
                            <td class="text-end">{{ $customerInvoice->sub_total }}</td>
                        </tr>
                        <tr class="d-none">
                            <td colspan="4"></td>
                            <td class="text-end">NHIL</td>
                            <td class="text-end">{{ $customerInvoice->nhil_amount }}</td>
                        </tr>
                        <tr class="d-none">
                            <td colspan="4"></td>
                            <td class="text-end">GetFund</td>
                            <td class="text-end">{{ $customerInvoice->getfund_amount }}</td>
                        </tr>
                        <tr class="d-none">
                            <td colspan="4"></td>
                            <td class="text-end">Value Added Tax </td>
                            <td class="text-end">{{ $customerInvoice->vat_amount     }}</td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <td class="text-end">Grand Total</td>
                            <td class="text-end">{{ $customerInvoice->invoice_total }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>

    </div>



@endsection

@push('stacked-scripts')
    <script type="text/javascript">

        $('#printInvoiceBtn').on('click', function() {
            event.preventDefault();

            let $url = $(this).attr('data-url');

            window.open($url, '_blank', 'height = 900, width = 800, scrollbars = yes');
        })
    </script>
@endpush
