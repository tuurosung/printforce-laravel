<?php

use Livewire\Component;
use App\Domain\PrintServices\Services\PrintServicesHandler;
use App\Models\Services\PrintService;
use App\Models\Customers\Customer;
use App\Models\Invoices\CustomerInvoice;


new class extends Component {
    public CustomerInvoice $customerInvoice;

    // Form State
    public ?string$serviceId = '';
    public ?float $unitCost = 0;
    public ?float $width = 1;
    public ?float $height = 1;
    public ?string $measuringUnit = '';
    public ?int $quantity = 1;

    public ?float $materialUnitCost = 0;
    public bool $showEmbroidery = false;


    // Derived Values
    public ?float $materialTotalCost = 0;
    public ?float $subTotal = 0;
    public ?float $total = 0;

    private function customer() {
        return $this->customerInvoice->customer;
    }


    public function updated(): void
    {
        $this->recalculate();
    }

    public function getPrintServices(): array
    {
        return app(PrintServicesHandler::class)->getPrintServicesAsArray();
    }


    public function updatedServiceId(string $value): void
    {
        $printService = PrintService::where('service_id', $value)->first();

        if (!$printService instanceof PrintService) {
            $this->unitCost = 0;
            return;
        }

        $this->showEmbroidery = $printService->category_id == "003";

        // find customer
        $customer = $this->customer();

        if (!$customer instanceof Customer) {
            $this->unitCost = 0;
            return;
        }

        $this->unitCost = app(PrintServicesHandler::class)->getServiceCost($this->customerInvoice->customer, $printService);
        $this->recalculate();
    }

    public function recalculate(): void
    {
        $width = $this->width ?? 0;
        $height = $this->height ?? 0;
        $measuringUnit = $this->measuringUnit ?? '';
        $quantity = $this->quantity ?? 0;
        $materialUnitCost = $this->materialUnitCost ?? 0;
        $this->materialTotalCost = $this->materialUnitCost * $quantity ?? 0;

        $area = (float) $width * $height;
        $convertedArea = $this->convertArea($area, $measuringUnit);

        $this->subTotal = (int) round($convertedArea * $this->unitCost * $quantity);
        $this->total = $this->subTotal + $this->materialTotalCost;
        $this->materialUnitCost = $materialUnitCost;
    }


    public function convertArea(float $area, string $measuringUnit): float
    {
        return match ($measuringUnit) {
            'inch' => $area / 144,
            default => $area
        };
    }

    public function with(): array
    {
        return [
            'printServices' => $this->getPrintServices(),
        ];
    }
};
?>

<x-modals.modal modalId="new-invoice-item-modal" wire:ignore.self>

    <form method="POST" action="{{ route('invoices.invoice-items.store', $customerInvoice) }}">
        @csrf
        <x-modals.modal-header modalTitle="Add New Invoice Item" modalId="new-invoice-item-modal" />

        <div class="p-6">

            <input type="hidden" name="service_category_id" id="serviceCategoryId" value="">

            <div class="grid grid-cols-12 gap-6">

                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <div class="">
                        <label for="serviceId" class="form-label">Service</label>
                        <select class="form-control form-select-sm" name="service_id" id="serviceId" required
                            data-fetch-url="{{ route('configuration.print-services.fetch-service-detail') }}" wire:model.live="serviceId">
                            <option value="" selected>--- Select Service ---</option>
                            @foreach ($printServices as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <div class="">
                        <label for="cost" class="form-label">Unit Cost</label>
                        <input type="text" class="form-control st" name="unit_cost" id="unitCost" value="{{ $unitCost }}" wire:model.live="unitCost" readonly required />
                    </div>
                </div>

                <div class="lg:col-span-3 md:col-span-6 sm:col-span-12 col-span-12">
                    <div class="">
                        <label for="" class="form-label">Width</label>
                        <input type="number" step="any" class="form-control" name="width" id="width" value="{{ $width }}" wire:model.live="width" required />
                    </div>
                </div>

                <div class="lg:col-span-3 md:col-span-6 sm:col-span-12 col-span-12">
                    <div class="">
                        <label for="" class="form-label">Height</label>
                        <input type="number" step="any" class="form-control " name="height" id="height" value="{{ $height }}" wire:model.live="height" required />
                    </div>
                </div>
                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <div class="mb-3">

                        <label for="" class="form-label">Measurement</label>
                        <select class="form-control form-select-sm" name="measuring_unit" id="measuringUnit" wire:model.live="measuringUnit" required>

                            <option value="ft">Feet</option>
                            <option value="inch">Inch</option>

                        </select>

                    </div>
                </div>
                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <div class="mb-3">
                        <label for="" class="form-label">Quantity</label>
                        <input type="number" class="form-control " name="quantity" id="quantity" wire:model.live="quantity" placeholder="Quantity"
                            min="1" value="{{ $quantity }}" required />
                    </div>
                </div>


                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <div class="mb-3">
                        <label for="sub_total" class="form-label">Sub-Total</label>
                        <input type="number" class="form-control" name="sub_total" id="subTotal"
                            aria-describedby="helpId" placeholder="" readonly value="{{ $subTotal }}" />
                    </div>
                </div>
                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12" wire:show="showEmbroidery">
                    <div class="mb-3">
                        <label for="material_unit_cost" class="form-label">Material Unit Cost</label>
                        <input type="number" class="form-control" name="material_unit_cost" id="materialUnitCost"
                            aria-describedby="" placeholder="" value="{{ $materialUnitCost }}" wire:model.live="materialUnitCost" />
                    </div>
                </div>
                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12" wire:show="showEmbroidery">
                    <div class="mb-3">
                        <label for="material_total_cost" class="form-label">Material Total Cost</label>
                        <input type="number" class="form-control" name="material_total_cost" id="materialTotalCost"
                            aria-describedby="" placeholder="" readonly value="{{ $materialTotalCost }}" />
                    </div>
                </div>
                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <div class="mb-3">
                        <label for="" class="form-label">Total Cost</label>
                        <input type="text" class="form-control" name="total" id="total" value="{{ $total }}" wire:model.live="total" readonly required />
                    </div>
                </div>

            </div>

        </div>

        <x-modals.modal-footer modalId="new-invoice-item-modal" btnLabel="Add Item" />
    </form>

</x-modals.modal>
