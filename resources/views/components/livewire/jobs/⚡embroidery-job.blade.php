<?php


use App\Enums\Services\ServiceCategoryEnum;
use App\Domain\Customers\Models\Customer;
use App\Services\PrintServicesManager;
use App\Traits\UpdatedServiceIdTrait;
use Livewire\Component;


new class extends Component {

    use UpdatedServiceIdTrait;

    public Customer $customer;


    public ?int $qty = 1;
    public ?float $cost = 0;
    public ?float $matUnitCost = 0;
    public ?string $matSupply = '';

    public ?float $purchaseCost = 0;
    public ?float $discount = 0;
    public ?float $premium = 0;
    public string $date = '';
    public string $notes = '';

    // derived
    public ?float $embroideryCost = 0;
    public ?float $subTotal = 0;
    public ?float $total = 0;

    public array $embroideryServices = [];


    public function updated(): void
    {
        $this->recalculate();
    }


    private function recalculate(): void
    {
        $cost = $this->getNumericValue($this->cost);
        $qty = $this->getNumericValue($this->qty);
        $matSupply = $this->matSupply ?? false;
        $matUnitCost = $this->getNumericValue($this->matUnitCost);

        $this->embroideryCost = (float) $cost * $qty;
        $this->purchaseCost = $matSupply == "yes" ? (float) $matUnitCost * $qty : 1;

        $this->subTotal = $this->embroideryCost;
        $this->total = (int) ($this->embroideryCost + $this->purchaseCost);
    }


    private function getNumericValue(float $value): float
    {
        return is_numeric($value) ? $value : 0;
    }


    public function mount(): void
    {
        $this->embroideryServices = ServiceCategoryEnum::EMBROIDERY->servicesArray();
    }
};
?>

<div wire:ignore.self id="embroidery_job_modal"
    class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none">
    <div
        class="hs-overlay-open:opacity-100 hs-overlay-open:duration-500 opacity-0 transition-all lg:max-w-4xl lg:w-full m-3 lg:mx-auto">
        <div
            class="flex flex-col bg-white border shadow-sm rounded-md pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
            <div class="flex justify-between items-center py-3 px-6 border-b border-border dark:border-gray-700">
                <h3 class="font-normal text-2xl font-cal-sans-regular text-gray-800 dark:text-white">
                    New Embroidery Job
                </h3>
                <button type="button"
                    class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                    data-hs-overlay="#hs-basic-modal">
                    <span class="sr-only">Close</span>
                    <i class="ti ti-x text-xl"></i>
                </button>
            </div>
            <form method="POST" action="{{ route('jobs.embroidery.store', $customer) }}" autocomplete="off">
                @csrf
                <div class="p-6 overflow-y-auto">
                    <div class="">

                        <div class="grid grid-cols-2 gap-6 mb-5">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="customer_name" class="form-label">Customer Name</label>
                                    <input type="text" class="form-control py-2.5 px-4" name="customer_name"
                                        id="customer_name" aria-describedby="" placeholder=""
                                        value="{{ $customer->name }}" readonly />
                                </div>

                            </div>
                            <div class="col">
                                <x-printforce.inputs.date-input name="date" id="embroidery_date" label="Job Date"
                                    required />
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-6 mb-5">
                            <div class="col">

                                <div class="mb-3">
                                    <label for="service_id" class="form-label">Service Name</label>
                                    <select class="form-control" name="service_id" id="embroidery_service_id" wire:model.live="serviceId" required>
                                        <option value="">--- Select one ---</option>
                                        @foreach ($embroideryServices as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>
                            <div class="col">
                                <x-printforce.inputs.text-input name="unit_cost" id="embroidery_unit_cost"
                                    label="Unit Cost" placeholder="0.00" value="{{ $cost }}" readonly="true" />
                            </div>
                        </div>


                        <div class="grid grid-cols-4 gap-6 mb-5">

                            <div class="col">
                                <x-printforce.inputs.text-input name="qty" id="qty" label="Quantity"
                                    value="{{ $qty }}" wire:model.live="qty" required />
                            </div>
                            <div class="col">
                                <x-printforce.inputs.text-input name="embroidery_cost" id="embroidery_cost"
                                    label="Embroidery Cost" placeholder="0.00" value="{{ $embroideryCost }}" wire:model.live="embroideryCost" readonly="true" required />
                            </div>
                            <div class="col-span-2">
                                <label for="" class="form-label">Material Purchase</label>
                                <select class="form-control" name="mat_supply" id="mat_supply" wire:model.live="matSupply" required>
                                    <option value="">-- Who is buying the materials? --</option>
                                    <option value="yes">Company Purchase</option>
                                    <option value="no">Client Provide</option>
                                </select>
                            </div>

                        </div>

                        <!-- Grid -->
                        <div class="grid grid-cols-4 gap-6 mb-5">
                            <div class="col">
                                <x-printforce.inputs.text-input name="mat_unit_cost" id="mat_unit_cost"
                                    label="Material Unit Cost" placeholder="0.00" wire:model.live="matUnitCost" value="{{ $this->matUnitCost }}" required />
                            </div>
                            <div class="col">
                                {{ $this->matSupply }}
                                <x-printforce.inputs.text-input name="purchase_cost" id="embroidery_purchase_cost"
                                    label="Material Purchase Cost" placeholder="0.00" wire:model.live="purchaseCost" value="{{ $this->purchaseCost }}" readonly required />
                            </div>
                            <div class="col">
                                <x-printforce.inputs.text-input name="total" id="embroidery_total" label="Overall Cost"
                                    placeholder="0.00" wire:model.live="total" value="{{ $this->total }}" readonly />
                            </div>
                        </div>



                        <x-printforce.inputs.text-input name="notes" id="em_notes"
                            label="Notes (optional eg; CRS Farmers T-shirts)" placeholder="" />


                    </div>
                </div>
                <div
                    class="flex justify-end items-center gap-x-2 py-3 px-6 border-t border-border dark:border-gray-700">
                    <button type="button"
                        class="btn-md text-sm font-medium rounded-md border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        data-hs-overlay="#hs-basic-modal">
                        Close
                    </button>
                    <button type="submit"
                        class="btn text-sm font-semibold rounded-md border border-transparent bg-primary text-white hover:bg-primaryemphasis disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        <i class="fi fi-rr-check me-3  "></i>
                        Create Embroidery Job
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
