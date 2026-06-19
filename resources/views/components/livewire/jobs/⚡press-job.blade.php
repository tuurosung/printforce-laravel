<?php

use App\Domain\PrintServices\Services\PrintServicesHandler;
use App\Models\Customers\Customer;
use App\Services\PrintServicesManager;
use Livewire\Component;

new class extends Component {
    public Customer $customer;

    public string $serviceId = '';
    public ?float $unitCost = 0;
    public ?int $qty = 1;
    public ?float $discount = 0;
    public ?float $premium = 0;
    public ?float $subTotal = 0;
    public ?float $total = 0;
    public string $date = '';
    public string $notes = '';


    public function updatedServiceId(string $value): void
    {
        if (blank($this->serviceId)) {
            $this->unitCost = 0;
            $this->recalculate();
            return;
        }

        $printService = app(PrintServicesHandler::class)->getServiceById($value);
        $this->unitCost = app(PrintServicesHandler::class)->getServiceCost($this->customer, $printService);

        $this->recalculate();
    }

    public function updatedQty(): void
    {
        if (blank($this->qty))
            return;
        $this->recalculate();
    }


    public function recalculate(): void
    {
        $qty = $this->getNumericValue($this->qty);
        $unitCost = $this->getNumericValue($this->unitCost);
        $discount = $this->getNumericValue($this->discount);
        $premium = $this->getNumericValue($this->premium);

        $this->subTotal = (float) $unitCost * $qty;
        $this->total = (float) round($this->subTotal - $discount + $premium);

    }

    public function getNumericValue(float|int $value): float
    {
        if (!is_numeric($value))
            return 0;

        return match (true) {
            is_int($value) => (int) $value,
            is_float($value) => (float) $value,
            default => 0
        };

    }


    public function pressServices(): array
    {
        return app(PrintServicesManager::class)->getPressServicesArray();
    }


    public function with(): array
    {
        return [
            'customer' => $this->customer,
            'press_services' => $this->pressServices(),
        ];
    }
};
?>

<div id="press_job_modal" wire:ignore.self
    class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none">
    <div
        class="hs-overlay-open:opacity-100 hs-overlay-open:duration-500 opacity-0 transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
        <div
            class="flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
            <div class="flex justify-between items-center py-3 px-4 border-b border-border dark:border-gray-700">
                <h3 class="font-normal text-2xl font-cal-sans-regular text-gray-800 dark:text-white">
                    New Press Job
                </h3>
                <button type="button"
                    class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    data-hs-overlay="#hs-basic-modal">
                    <span class="sr-only">Close</span>
                    <i class="ti ti-x text-xl"></i>
                </button>
            </div>
            <form method="POST" action="{{ route('jobs.press.store', $customer) }}">
                @csrf
                <div class="p-6 overflow-y-auto">
                    <div class="modal-body">


                        <div class="grid grid-cols-12 gap-6">


                            <div
                                class="lg:col-span-6 lg:col-end-12 md:col-span-6 md:col-end-12 sm:col-span-12 col-span-12">
                                <x-printforce.inputs.date-input name="date" id="press_date" label="Job Date" required />
                            </div>
                            <div
                                class="lg:col-span-6 lg:col-end-12 md:col-span-6 md:col-end-12 sm:col-span-12 col-span-12">

                            </div>


                            <!-- Service -->
                            <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                                <div class="mb-3">
                                    <label for="service_id" class="form-label">Service Name</label>
                                    <select class="form-control select2-input" name="service_id" id="press_service_id" wire:model.live="serviceId" required>

                                        <option value="" selected>Select one</option>

                                        @foreach ($press_services as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>


                            <!-- Cost -->
                            <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Cost</label>
                                    <input type="text" class="form-control" name="cost" id="press_cost" value="{{ $unitCost }}" readonly>
                                </div>
                            </div>


                            <!-- Copies -->
                            <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Copies</label>
                                    <input type="text" class="form-control" name="copies" id="press_copies" wire:model.live="qty" required>
                                </div>
                            </div>


                            <!-- Total -->
                            <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Total Cost</label>
                                    <input type="text" class="form-control" name="total" id="press_total" value="{{ $total }}" readonly
                                        required>
                                </div>
                            </div>

                            <!-- Notes -->
                            <div class="lg:col-span-12 md:col-span-12 sm:col-span-12 col-span-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Notes (optional eg; Logo Design)</label>
                                    <input type="text" class="form-control" name="notes" id="press_notes" value="">
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div
                    class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-border dark:border-gray-700">
                    <button type="button"
                        class="btn text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        data-hs-overlay="#press_job_modal">
                        Close
                    </button>
                    <button type="submit"
                        class="btn text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        <i class="fi fi-rr-check me-3  "></i>
                        Create Press Job
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
