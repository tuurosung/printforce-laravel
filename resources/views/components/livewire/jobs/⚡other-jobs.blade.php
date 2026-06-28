<?php

use App\Enums\Services\ServiceCategoryEnum;
use App\Models\Customers\Customer;
use Livewire\Component;
use App\Traits\UpdatedServiceIdTrait;

new class extends Component
{
    use UpdatedServiceIdTrait;

    public Customer $customer;
    public ?array $otherServices = [];

    // attributes
    // public ?float $cost = 0;
    public ?float $total = 0;
    public ?int $qty = 1;

    protected ServiceCategoryEnum $serviceCategoryEnum;

    public function boot(): void
    {
        //
    }


    public function mount(): void
    {
        $this->otherServices = ServiceCategoryEnum::OTHERS->servicesArray();
    }


    public function recalculate(): void
    {
        $this->total = $this->cost * $this->qty;
    }
};
?>

<div>
    <x-modals.modal wire:ignore.self modalId="other_jobs_modal">

        <x-modals.modal-header modalId="other_jobs_modal" modalTitle="Other Jobs" />

        <form method="POST" action="{{ route('jobs.others.store', $customer) }}">
            @csrf

            <div class="p-6">
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

                                @foreach ($this->otherServices as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>


                    <!-- Cost -->
                    <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Cost</label>
                            <input type="text" class="form-control" name="cost" id="press_cost" value="{{ $cost }}" wire:model.live="cost" readonly>
                        </div>
                    </div>


                    <!-- Copies -->
                    <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Copies</label>
                            <input type="text" class="form-control" name="qty" id="qty" wire:model.live="qty" required>
                        </div>
                    </div>


                    <!-- Total -->
                    <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Total Cost</label>
                            <input type="text" class="form-control" name="total" id="press_total" value="{{ $total }}" wire:model.live="total" readonly
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

            <x-modals.modal-footer modalId="other_jobs_modal" btnLabel="Create Job" />
        </form>

    </x-modals.modal>

</div>
