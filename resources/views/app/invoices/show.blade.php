@extends('layout.app')

@section('content')

<x-headers.page-header pageTitle="Invoice Preview" currentPage="Invoice Preview">
    <button id="printInvoiceBtn" class="btn btn-primary" style="border-radius: 1px;" data-url="{{ route('invoices.print-invoice', $customerInvoice) }}">
        <i class="fi fi-rr-print me-1"></i>
        Print Invoice
    </button>
</x-headers.page-header>

<div class="bg-lightprimary border border-lightprimary text-sm text-primaryemphasis rounded-md p-4 dark:bg-darkprimary dark:border-darkprimary dark:text-primary mb-8"
    role="alert">
    <span class="font-bold">Please Note</span> You're currently viewing this invoice in read-only mode
</div>



<div class="card border-0 mx-auto" style="min-height:70vh;">
    <div class="card-body px-9">


        <div class="grid grid-cols-12 gap-6 mb-8">
            <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                <p>Invoice to</p>
                <h5 class="text-xl font-cal-sans-regular font-normal">
                    {{ $customerInvoice->customer->name }}
                    <span
                        class="inline-flex fixed items-center gap-x-1.5 py-1 mt-1 font-inter-bold px-3 rounded-full  text-[10px] font-medium bg-amber-500 text-white ms-3">
                        {{ $customerInvoice->customer->category->label() }}
                    </span>

                </h5>
                <p class="mb-0">{{ $customerInvoice->customer->phone }}</p>
            </div>
            <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12"></div>
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

                    @foreach ($customerInvoice->invoiceItems as $invoiceItems)

                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $invoiceItems->service->service_name }}</td>
                        <td class="text-center">{{ $invoiceItems->unit_cost }}</td>
                        <td class="text-center">{{ $invoiceItems->quantity }}</td>
                        <td>{{ $invoiceItems->details }}</td>
                        <td class="text-end">{{ $invoiceItems->total }}</td>
                    </tr>
                    @endforeach

                    <tr class="d-none">
                        <td colspan="4"></td>
                        <td class="text-end">Sub-Total</td>
                        <td class="text-end">{{ number_format($customerInvoice->total_value, 2) }}</td>
                    </tr>
                    <tr class="hidden">
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
                        <td class="text-end">{{ $customerInvoice->vat_amount     }}</td>
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

@push('stacked-scripts')
<script type="text/javascript">
    $('#printInvoiceBtn').on('click', function() {
        event.preventDefault();

        let $url = $(this).attr('data-url');

        window.open($url, '_blank', 'height = 900, width = 800, scrollbars = yes');
    })
</script>
@endpush
