@extends('layout.app')


@section('content')

    <x-headers.page-header pageTitle="Invoices" currentPage="Invoices">

        <div class="hs-dropdown relative inline-flex">
            <button id="hs-dropdown-default" type="button"
                class="hs-dropdown-toggle py-2.5 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-md  border-gray-200 btn btn-primary">
                <span class="leading-tight">Actions</span>
                <i class="fi fi-rr-angle-down text-sm leading-tight font-medium hs-dropdown-open:rotate-180"></i>
            </button>
            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-md p-2 mt-2 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full z-10"
                aria-labelledby="hs-dropdown-default">

                <x-dropdowns.dropdown-item icon="plus" label="New Invoice" data-hs-overlay="#new-invoice-modal" />
                <x-dropdowns.dropdown-item icon="file-invoice" label="Configure Invoice" />

            </div>
        </div>
    </x-headers.page-header>

    <div>

    </div>


    <div class="card border-0">
        <div class="card-body">

            <div class="" id="data_holder">

                <table class="table w-full text-sm text-left rtl:text-right text-body">
                    <thead class="text-sm text-white bg-gray-700 border-b border-t border-default-medium">
                        <tr>
                            <th>#</th>
                            <th>Date Created</th>
                            <th>Type</th>
                            <th>Invoice ID</th>
                            <th>Customer Name</th>
                            <th class="text-end">Sub-Total</th>
                            <th class="text-end">Taxes</th>
                            <th class="text-end">Total</th>
                            <th class="">Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customerInvoices as $customerInvoice)
                            <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $customerInvoice->created_at }}</td>
                                <td class="flex items-center">
                                    {{ $customerInvoice->invoice_type?->label() ?? 'Unknown' }}



                                </td>
                                <td class="underline">
                                    <a
                                        href="{{ route('invoices.show', $customerInvoice) }}">{{ $customerInvoice->invoice_id }}</a>
                                </td>
                                <td>{{ $customerInvoice->customer->name }}</td>
                                <td class="text-end">{{ number_format($customerInvoice->total_value, 2) }}</td>
                                <td class="text-end">
                                    {{ number_format($customerInvoice->vat_amount + $customerInvoice->nhil_amount + $customerInvoice->getfund_amount, 2) }}
                                </td>
                                <td class="text-end">{{ number_format($customerInvoice->total_value, 2) }}</td>
                                <td class="">
                                    <span
                                        class="py-1 px-2.5 inline-flex items-center gap-x-1 text-[9px] font-bold bg-{{ $customerInvoice->status->flag() }} text-white rounded-full  dark:bg-darkerror dark:text-error">

                                        {{ $customerInvoice->status->label() }}
                                    </span>
                                </td>
                                <td class="text-end">

                                    <div class="hs-dropdown relative inline-flex">
                                        <button id="hs-dropdown-default" type="button"
                                            class="hs-dropdown-toggle inline-flex items-center gap-x-2 text-sm font-medium rounded-md  border-gray-200 cursor-pointer">
                                            <span class="leading-tight">Actions</span>
                                            <i
                                                class="fi fi-rr-angle-down text-sm leading-tight font-medium hs-dropdown-open:rotate-180"></i>
                                        </button>
                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white custom-shadow rounded-md p-2 mt-2 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full z-10"
                                            aria-labelledby="hs-dropdown-default">

                                                <x-dropdowns.dropdown-item icon="print" iconColour="primary" label="Print" data-url="{{ route('invoices.print-invoice', $customerInvoice) }}" />
                                                <x-dropdowns.dropdown-item icon="edit" iconColour="primary" label="Edit" href="{{ route('invoices.prepare-customer-invoice', $customerInvoice) }}" />

                                                <form action="{{ route('invoices.delete', $customerInvoice) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                <x-dropdowns.dropdown-item icon="trash" iconColour="danger" label="Delete" class="delete" />
                                                </form>

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

    @include('app.invoices.modals.create-invoice')

@endsection


@section('js')
<script type="text/javascript">

$(document).on('click', '.table tbody .print-invoice', function() {
    let $url = $(this).data('url')
    window.open($url, '_blank', 'height = 900, width = 800, scrollbars = yes');
})

$(document).on('click', '.table tbody .delete', function(event){
    event.preventDefault();
    const $frm = $(this).closest('form')

    swalConfirm(
        () => $frm.submit(),
        "Do you want to delete this invoice"
    )
})

</script>
@endsection
