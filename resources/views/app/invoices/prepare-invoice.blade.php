@extends('layout.app')

@section('content')



    <x-headers.page-header pageTitle="Prepare Invoice" currentPage="Prepare Invoice">

        <div class="flex">

            <button class="btn btn-primary ms-auto me-2" data-bs-toggle="modal" data-toggle="modal" data-hs-overlay="#new-invoice-item-modal">
                <i class="fi fi-rr-plus-small me"></i> Add New Item
            </button>

            <div class="hs-dropdown relative inline-flex">
                <button id="hs-dropdown-default" type="button"
                    class="hs-dropdown-toggle py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-md border btn btn-primary">
                    <span class="leading-tight">Actions</span>
                    <i class="fi fi-rr-angle-down text-sm leading-tight font-medium hs-dropdown-open:rotate-180"></i>
                </button>
                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-md p-2 mt-2 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full z-10"
                    aria-labelledby="hs-dropdown-default">

                    <form action="{{ route('invoices.checkout-customer-invoice', $customerInvoice) }}" method="POST" id="checkoutFrm>
                        @csrf
                        <x-dropdowns.dropdown-item label="Checkout" icon="check" iconColour="primary" id="checkoutBtn" />
                    </form>

                    <x-dropdowns.dropdown-item label="Delete Invoice" icon="trash" iconColour="danger" />


                </div>
            </div>

        </div>
    </x-headers.page-header>


    <div class="card border-0 mx-auto" style="min-height:70vh;">
        <div class="card-body px-5">


            <div class="grid grid-cols-12 gap-6 mb-8">
                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <p>Invoice to</p>
                    <h5 class="text-xl font-cal-sans-regular font-normal">
                        {{ $customerInvoice->customer->name }}
                    <span
                        class="inline-flex items-center -m-2 gap-x-1.5 py-1 my-auto font-inter-bold px-3 rounded-full  text-[10px] font-medium bg-amber-500 text-white ms-3">
                        {{ $customerInvoice->customer->category->label() }}
                    </span>

                    </h5>
                    <p class="mb-0">{{ $customerInvoice->customer->phone }}</p>
                </div>
                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12"></div>
            </div>



            <div class="flex gap-6 hidden">
                <div class="col-2">
                    <div class="mb-3">
                        <label for="" class="form-label">Apply NHIL</label>
                        <select class="form-control form-select-lg" name="" id="">
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
                        <select class="form-control form-select-lg" name="" id="">
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
                <div class="flex justify-between items-center my-5">
                    <div>
                        <h5 class="fw-500 mb-0">Invoice Items</h5>
                        <p class="mb-0">Add items to the invoice</p>
                    </div>
                    <div>


                    </div>
                </div>

                <table class="table w-full">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Service</th>
                            <th scope="col" class="text-center">Unit Cost</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col">Details</th>
                            <th scope="col" class="text-end">Total</th>
                            <th scope="col" class="text-end">Actions</th>
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
                            <td class="text-end">{{ $customerInvoiceItem->total }}</td>
                            <td class="text-end">
                                <form action="{{ route('invoices.invoice-items.destroy', $customerInvoiceItem) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="text-danger m-0 p-0 cursor-pointer" type="submit">
                                        <i class="fi fi-rr-trash"></i>
                                        Remove</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                        <tr class="d-none">
                            <td colspan="4"></td>
                            <td class="text-end">Sub-Total</td>
                            <td class="text-end">{{ number_format($customerInvoice->total_value, 2) }}</td>
                            <td></td>
                        </tr>
                        <tr class="hidden">
                            <td colspan="4"></td>
                            <td class="text-end">NHIL</td>
                            <td class="text-end">{{ $customerInvoice->nhil_amount }}</td>
                            <td></td>
                        </tr>
                        <tr class="hidden">
                            <td colspan="4"></td>
                            <td class="text-end">GetFund</td>
                            <td class="text-end">{{ $customerInvoice->getfund_amount }}</td>
                            <td></td>
                        </tr>
                        <tr class="hidden">
                            <td colspan="4"></td>
                            <td class="text-end">Value Added Tax </td>
                            <td class="text-end">{{ number_format($customerInvoice->vat_amount, 2) }}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <td class="text-end">Grand Total</td>
                            <td class="text-end">{{ number_format($customerInvoice->total_value, 2) }}</td>
                            <td></td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>

    </div>

    <livewire:livewire.invoices.new-invoice-item :customerInvoice="$customerInvoice" />


@endsection

@section('js')
    <script type="text/javascript">

        $(document).on('click', '#checkoutBtn', function(event){
            event.preventDefault();
            const $form = $(this).closest('form');
            swalConfirm(() => $form.submit(), "Checkout Invoice" , {confirmText: 'Yes, Checkout Invoice'})
        })

    </script>
@endsection

