@extends('layout.print')

@section('content')
    <div class="card border-0 mx-auto" style="min-height:70vh;">
        <div class="card-body px-5">

            <h2 class="cal-sans fw-500 mb-5">Customer Invoice</h2>


            <div class="flex justify-between mb-5">
                <div>
                    <h5>{{ $customerInvoice->customer->name }}</h5>
                    <p class="mb-0">Customer Type : {{ $customerInvoice->customer->category }}</p>
                    <p class="mb-0">{{ $customerInvoice->customer->phone }}</p>
                </div>
                <div class="flex flex-col">
                    <table class="w-50">
                        <tbody>
                            <tr>
                                <td>Date Issued</td>
                                <td>{{ $customerInvoice->invoice_date->format('d M, Y') }}</td>
                            </tr>
                            <tr>
                                <td>Due Date</td>
                                <td>{{ $customerInvoice->due_date->format('d M, Y') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>



            <div>


                <table class="table w-full text-sm text-left rtl:text-right text-body">
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

                        @foreach ($customerInvoice->invoiceItems as $customerInvoiceItem)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $customerInvoiceItem->service->service_name }}</td>
                                <td class="text-center">{{ $customerInvoiceItem->unit_cost }}</td>
                                <td class="text-center">{{ $customerInvoiceItem->quantity }}</td>
                                <td>{{ $customerInvoiceItem->details }}</td>
                                <td class="text-end">{{ number_format($customerInvoiceItem->total, 2) }}</td>
                            </tr>
                        @endforeach

                        <tr class="d-none">
                            <td colspan="4"></td>
                            <td class="text-end">Sub-Total</td>
                            <td class="text-end">{{ number_format($customerInvoice->total_value, 2) }}</td>
                        </tr>
                        <tr class="d-none">
                            <td colspan="4"></td>
                            <td class="text-end">NHIL</td>
                            <td class="text-end">{{ $customerInvoice->nhil_amount }}</td>
                        </tr>
                        <tr class="hidden">
                            <td colspan="4"></td>
                            <td class="text-end">GetFund</td>
                            <td class="text-end">{{ $customerInvoice->getfund_amount }}</td>
                        </tr>
                        <tr class="hidden">
                            <td colspan="4"></td>
                            <td class="text-end">Value Added Tax </td>
                            <td class="text-end">{{ number_format($customerInvoice->vat_amount, 2) }}</td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <td class="text-end">Grand Total</td>
                            <td class="text-end">{{ number_format($customerInvoice->total_value, 2) }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>

    </div>
@endsection


@section('js')
    <script>
        window.print()
    </script>
@endsection
