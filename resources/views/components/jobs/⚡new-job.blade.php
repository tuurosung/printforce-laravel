<?php

use App\Domain\Customers\Models\Customer;
use App\Domain\PrintServices\Models\PrintService;
use App\Domain\PrintServices\Services\ServiceHandler;
use App\Enums\Services\ServiceCategoryEnum;
use Livewire\Attributes\Computed;
use Livewire\Component;


new class extends Component {

    public Customer $customer;
    protected ServiceHandler $serviceHandler;

    public ?string $serviceId = null;
    public ?float $unitCost = 0;
    public ?float $width = 1;
    public ?float $height = 1;
    public ?string $measuringUnit = null;
    public ?int $quantity = 1;
    public ?float $materialUnitCost = 0;
    public bool $showEmbroidery = false;
    public bool $showDimensions = false;
    public ?string $notes = '';


    public function boot(ServiceHandler $serviceHandler): void
    {
        $this->serviceHandler = $serviceHandler;
    }

    #[Computed]
    public function printServices(): array
    {
        return $this->serviceHandler->optionsForSelect();
    }

    #[Computed]
    public function materialTotalCost(): float
    {
        return ($this->materialUnitCost ?? 0) * ($this->quantity ?? 0);
    }

    #[Computed]
    public function subTotal(): float
    {
        $area = ($this->width ?? 0) * ($this->height ?? 0);
        $convertedArea = $this->convertArea((float) $area, $this->measuringUnit ?? '');

        return (int) round($convertedArea * ($this->unitCost ?? 0) * ($this->quantity ?? 0));
    }

    #[Computed]
    public function total(): float
    {
        return $this->subTotal + $this->materialTotalCost;
    }


    public function updatedServiceId(string $value): void
    {
        $printService = PrintService::where('service_id', $value)->first();

        if (!$printService instanceof PrintService) {
            $this->unitCost = 0;
            return;
        }

        $this->showEmbroidery = $printService->category_id === ServiceCategoryEnum::EMBROIDERY;
        $this->showDimensions = $printService->category_id !== ServiceCategoryEnum::EMBROIDERY;

        $customer = $this->customer;

        if (!$customer instanceof Customer) {
            $this->unitCost = 0;
            return;
        }

        $this->unitCost = $this->serviceHandler->getServiceCost($customer, $this->serviceId);
    }


    private function convertArea(float $area, string $measuringUnit): float
    {
        return match ($measuringUnit) {
            'inch' => $area / 144,
            default => $area,
        };
    }
};
?>

<x-modals.modal modalId="new-job-modal" wire:ignore.self>
    <x-modals.modal-header modalId="new-job-modal" modalTitle="New Job" />

    <form method="POST" action="{{ route('print-jobs.store', $customer) }}">
        @csrf

        <input type="hidden" name="customer_id" value="{{ $customer->customer_id }}" />

        <div class="px-3 py-6">

            <div class="row mb-5">
                <div class="col-md-6">
                    <x-dropdowns.dropdown-with-search label="Service" name="service_id" id="service_id" :options="$this->printServices" wire:model.live="serviceId" wire:ignore.self />
                </div>
                <div class="col-md-6">
                    <div class="">
                        <label for="cost" class="form-label">Unit Cost</label>
                        <input type="text" class="form-control st" name="unit_cost" id="unit_cost" value="{{ $unitCost }}" wire:model.live="unitCost" readonly required />
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-12 gap-6 px-4" wire:show="showDimensions">
                <div class="col-span-3">
                    <div class="">
                        <label for="" class="form-label">Width</label>
                        <input type="number" step="any" class="form-control" name="width" id="width" value="{{ $width }}" wire:model.live.blur="width" required />
                    </div>
                </div>
                <div class="col-span-3">
                    <div class="">
                        <label for="" class="form-label">Height</label>
                        <input type="number" step="any" class="form-control " name="height" id="height" value="{{ $height }}" wire:model.live.blur="height" required />
                    </div>
                </div>
                <div class="col-span-6">
                    <div class="mb-3">

                        <label for="" class="form-label">Measurement</label>
                        <select class="form-control form-select-sm" name="measuring_unit" id="measuringUnit" wire:model.live="measuringUnit" required>

                            <option value="ft">Feet</option>
                            <option value="inch">Inch</option>

                        </select>

                    </div>
                </div>
            </div>


            <div class="row mb-5">

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Quantity</label>
                        <input type="number" class="form-control " name="quantity" id="quantity" wire:model.live="quantity" placeholder="Quantity"
                            min="1" value="{{ $quantity }}" required />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="sub_total" class="form-label">Sub-Total</label>
                        <input type="number" class="form-control" name="sub_total" id="subTotal"
                            aria-describedby="helpId" placeholder="" readonly value="{{ $this->subTotal }}" />
                    </div>
                </div>
            </div>


            <div class="row mb-5" wire:show="showEmbroidery">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="material_unit_cost" class="form-label">Material Unit Cost</label>
                        <input type="number" class="form-control" name="mat_unit_cost" id="materialUnitCost"
                            aria-describedby="" placeholder="" value="{{ $materialUnitCost }}" wire:model.live="materialUnitCost" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="material_total_cost" class="form-label">Material Total Cost</label>
                        <input type="number" class="form-control" name="purchase_cost" id="materialTotalCost"
                            aria-describedby="" placeholder="" readonly value="{{ $this->materialTotalCost }}" />
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Total Cost</label>
                        <input type="text" class="form-control" name="total" id="total" value="{{ $this->total }}" readonly required />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="" class="form-label">File Name</label>
                        <input type="text" class="form-control" name="notes" id="notes" value="{{ $this->notes }}" />
                    </div>
                </div>
            </div>


        </div>

        <x-modals.modal-footer modalId="new-job-modal" btnLabel="Create Job" />

    </form>
</x-modals.modal>
