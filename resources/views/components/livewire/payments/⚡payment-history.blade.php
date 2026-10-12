<?php

use App\Domain\Customers\Services\CustomerService;
use App\Domain\Payments\Services\PaymentService;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    protected CustomerService $customerService;
    public ?array $customers = null;

    protected PaymentService $paymentService;

    public ?string $startDate = null;
    public ?string $endDate = null;
    public ?string $customerId = null;

    public function boot(CustomerService $customerService, PaymentService $paymentService): void
    {
        $this->customerService = $customerService;
        $this->paymentService = $paymentService;
    }

    public function mount(): void
    {
        $this->customers = $this->customerService->optionsForSelect();
    }


    #[Computed]
    public function payments(): Collection
    {
        if ($this->startDate || $this->endDate || $this->customerId) {
            return $this->paymentService->getFilteredPayments(
                $this->startDate,
                $this->endDate,
                $this->customerId
            );
        }

        return $this->paymentService->getLatestPayments();
    }


    public function fetchReport(): void
    {
        $this->payments();
    }
};
?>

<div>

    <form id="filter_cash_payments_frm" class="mb-5" wire:submit="fetchReport">
        @csrf
        <div class="grid grid-cols-4 gap-6">
            <div class="me-2">
                <x-printforce.inputs.date-input id="start_date" name="start_date" label="Start Date"
                    value="{{ date('Y-m-d') }}" wire:model="startDate" />

            </div>
            <div class="me-2">
                <x-printforce.inputs.date-input id="end_date" name="end_date" label="End Date"
                    value="{{ date('Y-m-d') }}" wire:model="endDate" />
            </div>
            <div class="me-2">
                <div wire:ignore>
                    <x-printforce.inputs.advanced-select id="filterCustomerId" name="customer_id" label="Customer"
                        :options="$customers" placeholder="All Customers" wire:model="customerId" />
                </div>
            </div>
            <div class="flex items-end pb-2">

                <button type="submit" class="btn btn-primary py-3 w-full">
                    <i class="fas fa-file-alt me-2" aria-hidden></i> Generate Report</button>
            </div>
        </div>
    </form>


    <div class="" id="data_holder">

        <table class="table datatable table-sm">
            <thead class="">
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Account</th>
                    <th class="text-end">Amount</th>
                    <th class="text-end">Option</th>
                </tr>
            </thead>
            <tbody>

                @php
                    $total = 0;
                @endphp

                @foreach ($this->payments as $payment)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $payment->payment_date ?? $payment->created_at }}</td>
                    <td>{{ $payment->customer?->name }}</td>
                    <td>{{ $payment->account->account_name }}</td>
                    <td class="text-end">{{ number_format($payment->amount_paid, 2) }}</td>
                    <td class="text-end">

                        <div class="hs-dropdown relative inline-flex [--trigger:hover]">
                            <button id="hs-dropdown2" type="button" class="hs-dropdown-toggle text-primary cursor-pointer">
                                <span class="leading-tight">Options</span>
                                <i class="fi fi-rr-angle-down text-sm leading-tight hs-dropdown-open:rotate-180"></i>
                            </button>
                            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-md p-2 mt-2 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full z-10"
                                aria-labelledby="hs-dropdown2">
                                <a class="dropdown-item" href="#" id="{{ $payment->payment_id }}">
                                    <i class="fi fi-rr-print text-lg leading-none text-primary"></i>
                                    Print
                                </a>
                                @can('administrator')
                                <a class="dropdown-item edit" href="javascript:void(0)"
                                    data-url="{{ route('payments.edit', $payment) }}">
                                    <i class="fi fi-rr-edit text-lg leading-none text-primary"></i>
                                    Edit
                                </a>
                                <form id="deleteFrm" method="POST" action="{{ route('payments.delete', $payment) }}"
                                    class="d-inline-block">
                                    @csrf
                                    @method('delete')
                                    <a class="dropdown-item delete" href="#">
                                        <i class="fi fi-rr-trash text-lg leading-none text-danger"></i>
                                        Delete
                                    </a>
                                </form>
                                @endcan

                            </div>
                        </div>



                    </td>
                </tr>

                @php
                $total += $payment->amount_paid;
                @endphp

                @endforeach

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-end Axiforma fs-18px fw-600">{{ number_format($total, 2) }}</td>
                    <td></td>
                </tr>


            </tbody>
        </table>

    </div>
</div>
