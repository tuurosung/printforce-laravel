<?php

use App\Domain\PrintServices\Models\PrintService;
use App\Domain\PrintServices\Services\PrintServicesHandler;
use App\Models\Customers\Customer;
use App\Services\PrintServicesManager;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component {
    // Properties
    public Customer $customer;

    // Form State
    public string $serviceId = '';
    public ?float $width = 1;
    public ?float $height = 1;
    public ?string $measuringUnit = '';
    public ?float $copies = 1;
    public ?float $discount = 0;
    public ?float $premium = 0;
    public string $date = '';
    public string $notes = '';


    // // Derived Values
    public float $unitCost = 0;
    public float $subTotal = 0;
    // public float $taxes = 0;
    public float $total = 0;

    // Lifecycle Hooks

    #[Computed]
    public function largeFormatServices(): array
    {
        return app(PrintServicesManager::class)->getLargeFormatServicesArray();
    }


    public function updatedServiceId(string $value): void
    {
        if (blank($this->serviceId)) {
            $this->unitCost = 0;
            $this->recalculate();
            return;
        }

        // $printService = PrintService::where('service_id', $value)->first();
        $printService = app(PrintServicesHandler::class)->getServiceById($value);

        if (!$this->customer instanceof Customer) {
            return;
        }

        if (!$printService instanceof PrintService) {
            return;
        }

        $this->unitCost = app(PrintServicesHandler::class)->getServiceCost($this->customer, $printService);

        $this->recalculate();
    }


    public function updated(): void
    {
        $this->recalculate();
    }


    private function recalculate(): void
    {
        $width = $this->width ?? 0;
        $height = $this->height ?? 0;
        $copies = $this->copies ?? 0;
        $discount = $this->discount ?? 0;
        $premium = $this->premium ?? 0;

        $area = $this->calculateArea($width, $height);
        $convertedArea = $this->convertArea($area, $this->measuringUnit);

        $this->subTotal = (int) round($convertedArea * $this->unitCost * $this->copies);

        $this->total = $this->subTotal - $this->discount + $this->premium;
    }

    private function calculateArea(float $width, float $height): float
    {
        return $width * $height;
    }

    private function convertArea(float $area, string $measuringUnit): float
    {
        return match ($measuringUnit) {
            'inch' => $area / 144,
            default => $area
        };
    }



    public function with(): array
    {
        return [
            'customer' => $this->customer,
            'largeFormatServices' => $this->largeFormatServices(),
        ];
    }
};
?>

<div wire:ignore.self id="large_format_job_modal"
    class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none">
    <div
        class="hs-overlay-open:opacity-100 hs-overlay-open:duration-500 opacity-0 transition-all lg:max-w-3xl lg:w-full m-3 lg:mx-auto">
        <div
            class="flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
            <div class="flex justify-between items-center py-3 px-6 border-b border-border dark:border-gray-700">

                <h3 class="font-normal text-2xl font-cal-sans-regular text-gray-800 dark:text-white">
                    New Large Format Job
                </h3>

                <button type="button"
                    class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    data-hs-overlay="#large_format_job_modal">
                    <span class="sr-only">Close</span>
                    <i class="ti ti-x text-xl"></i>
                </button>

            </div>
            <form method="POST" action="{{ route('jobs.largeformat.store', $customer) }}">
                @csrf
                <div class="p-6 overflow-y-auto">


                    <div class="modal-body">

                        <section class="mb-8">


                            <div class="grid grid-cols-2 gap-6 mb-4">
                                <div class="mb-3">
                                    <label for="customer_name" class="form-label">Customer Name</label>
                                    <input type="text" class="form-control py-2.5 px-4" name="customer_name" id="customer_name"
                                        aria-describedby="helpId" placeholder="" value="{{ $customer->name }}" readonly
                                        readonly />
                                </div>
                                <div class="mb-3">
                                    <label for="date" class="form-label">Job Date</label>
                                    <input type="text" class="form-control datepicker-input py-2.5 px-4" name="date"
                                        id="largeformat_date" value="{{ now()->format('Y-m-d') }}" placeholder=""
                                        required />
                                </div>
                            </div>


                            <div class="grid grid-cols-2 gap-6">

                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Service Name</label>
                                        <select class="form-control py-2.5 px-4" name="service_id"
                                            wire:model.live="serviceId" required>

                                            <option value="">--</option>

                                            @foreach ($largeFormatServices as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach

                                        </select>
                                        @error('serviceId') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                    </div>

                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label for="cost" class="form-label">Unit Cost</label>
                                        <input type="text" class="form-control py-2.5 px-4" name="cost" id="largeformat_cost" value="{{ $unitCost }}"
                                            readonly required />
                                    </div>

                                </div>
                            </div>
                        </section>



                        <section class="mb-8">
                            <!-- <h6 class="mb-3">Dimension & Quantity</h6> -->

                            <div class="grid grid-cols-4 gap-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Width</label>
                                    <input type="number" step="any" class="form-control py-2.5 px-4" name="width" id="width" wire:model.live="width"
                                        required />
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Height</label>
                                    <input type="number" step="any" class="form-control py-2.5 px-4" name="height" id="height" wire:model.live="height" required />
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Unit Of Measurement</label>
                                    <select class="form-control py-2.5 px-4" name="measuring_unit" id="measuring_unit" wire:model.live="measuringUnit" required>
                                        <option value="ft">Feet</option>
                                        <option value="inch">Inch</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Copies</label>
                                    <input type="number" class="form-control py-2.5 px-4" name="copies" id="largeformat_copies" wire:model.live="copies" placeholder="Number of Copies"
                                        min="1" value="1" required />
                                </div>
                            </div>

                        </section>


                        <div class="mb-6">

                            <!-- <h6 class="mb-3">Dimensions & Pricing</h6> -->



                            <div class="grid grid-cols-4 gap-6">

                                <div class="mb-3">
                                    <label for="" class="form-label">Sub - Total</label>
                                    <input type="text" class="form-control py-2.5 px-4" name="sub_total" id="largeformat_sub_total" value="{{ $subTotal }}"
                                        readonly required />
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Discount</label>
                                    <input type="number" step="any" class="form-control py-2.5 px-4" name="discount"
                                        id="largeformat_discount" wire:model.live="discount" required>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Premium</label>
                                    <input type="number" step="any" class="form-control py-2.5 px-4" name="premium"
                                        id="largeformat_premium" wire:model.live="premium" value="0" required>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Total Cost</label>
                                    <input type="text" class="form-control py-2.5 px-4" name="total" id="largeformat_total" value="{{ $total }}" readonly
                                        required />
                                </div>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="" class="form-label">Notes (optional eg; USAID Banner)</label>
                            <input type="text" class="form-control  py-2.5 px-4" name="notes" id="lf_notes" value="" />
                        </div>

                    </div>


                </div>
                <div
                    class="flex justify-end items-center gap-x-2 py-3 px-6 border-t border-border dark:border-gray-700">
                    <button type="button"
                        class="btn-md text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        data-hs-overlay="#large_format_job_modal">
                        Close
                    </button>
                    <button type="submit"
                        class="btn-md btn text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        <i class="fi fi-rr-check me-2"></i>
                        Create Job
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
