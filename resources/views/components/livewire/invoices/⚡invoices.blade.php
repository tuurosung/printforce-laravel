<?php

use App\Domain\Customers\Services\CustomerService;
use App\Domain\Invoices\Services\InvoiceService;
use App\DTOs\Invoices\FilterInvoiceData;
use App\Livewire\Forms\FilterInvoiceForm;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    protected CustomerService $customerService;
    protected InvoiceService $invoiceService;

    public FilterInvoiceForm $form;
    public FilterInvoiceData $appliedFilters;


    public function boot(
        CustomerService $customerService,
        InvoiceService $invoiceService
    ): void {
        $this->customerService = $customerService;
        $this->invoiceService = $invoiceService;
    }


    public function mount(): void
    {
        $this->appliedFilters = FilterInvoiceData::forCurrentMonth();
        $this->form->fillFrom($this->appliedFilters);
    }

    #[Computed]
    public function customers()
    {
        return $this->customerService->getAll();
    }

    #[Computed]
    public function customerInvoices()
    {
        return $this->invoiceService->getInvoices($this->appliedFilters);
    }


    public function applyFilters(): void
    {
        $this->form->validate();
        $this->appliedFilters = $this->form->toData();

        unset($this->customerInvoices);
    }
};
?>

<div class="card border-0" wire:ignore.self>
    <div class="card-body">

        <!-- Only show to admins -->
        <form id="" class="mb-10" wire:submit="applyFilters">
            @csrf
            <div class="grid grid-cols-4 gap-2 mb-5">
                <div class="">
                    <label for="" class="form-label">Start Date</label>
                    <input
                        type="date"
                        class="form-control"
                        id="start_date"
                        name="start_date"
                        value=""
                        required
                        wire:model="form.startDate">
                </div>
                <div class="ms-2">
                    <label for="" class="form-label">End Date</label>
                    <input
                        type="date"
                        class="form-control"
                        id="end_date"
                        name="end_date"
                        value="{{ $form->endDate }}"
                        required
                        wire:model="form.endDate">
                </div>
                <div class="ms-2">
                    <label for="" class="form-label">Customer</label>
                    <select name="customer_id" id="customer_id" class="form-select" wire:model="form.customerId">
                        <option value="">Select Customer</option>
                        @foreach ($this->customers as $customer)
                            <option value="{{ $customer->customer_id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-end justify-end">
                    <button type="submit" class="btn btn-primary w-100" style="">
                        <i class="fas fa-file-alt me-2" aria-hidden></i> Generate Report</button>

                </div>
            </div>

        </form>


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
                    @foreach ($this->customerInvoices as $customerInvoice)
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

                            <div class="hs-dropdown dropdown relative inline-flex">
                                <button id="hs-dropdown-default" type="button"
                                    class="hs-dropdown-toggle inline-flex items-center gap-x-2 text-sm font-medium rounded-md  border-gray-200 cursor-pointer">
                                    <span class="leading-tight">Actions</span>
                                    <i
                                        class="fi fi-rr-angle-down text-sm leading-tight font-medium hs-dropdown-open:rotate-180"></i>
                                </button>
                                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white custom-shadow rounded-md p-2 mt-2 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full z-10"
                                    aria-labelledby="hs-dropdown-default">

                                    <x-dropdowns.dropdown-item class="print-invoice" icon="print" iconColour="primary" label="Print" data-url="{{ route('invoices.print-invoice', $customerInvoice) }}" />
                                    <x-dropdowns.dropdown-item icon="edit" iconColour="primary" label="Edit" href="{{ route('invoices.prepare-customer-invoice', $customerInvoice) }}" />

                                    @can('administrator')
                                    <form action="{{ route('invoices.delete', $customerInvoice) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-dropdowns.dropdown-item icon="trash" iconColour="danger" label="Delete" class="delete" />
                                    </form>
                                    @endcan


                                </div>
                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        @script
            <script>
                HSStaticMethods.autoInit(['dropdown'])
                const el = document.querySelector(".dropdown");
                if (el) new HSDropdown(el);
            </script>

        @endscript

    </div>
</div>
