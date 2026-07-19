<?php

use App\Domain\Customers\Services\CustomerService;
use App\Domain\PrintJobs\Services\PrintJobService;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    protected PrintJobService $printJobService;
    protected CustomerService $customerService;

    public ?string $customerId = null;
    public ?string $startDate = null;
    public ?string $endDate = null;
    public ?string $serviceId = null;

    public function boot(PrintJobService $printJobService, CustomerService $customerService): void
    {
        $this->printJobService = $printJobService;
        $this->customerService = $customerService;
    }

    #[Computed]
    public function jobs(): Collection
    {
        if ($this->startDate || $this->endDate || $this->serviceId || $this->customerId) {
            return $this->printJobService->filterJobs(
                $this->startDate,
                $this->endDate,
                $this->serviceId,
                $this->customerId
            );
        }

        return $this->printJobService->recentJobs();
    }

    #[Computed]
    public function customers(): array
    {
        return $this->customerService->optionsForSelect();
    }

    #[Computed]
    public function statistics(): array
    {
        return [
            'total' => $this->jobs->sum('total'),
            'todays_jobs_total' => $this->jobs->filter(fn($job) => $job->created_at?->isToday())->count(),
        ];
    }

    public function updated(): void
    {
        // $this->jobs();
    }
};
?>


<!-- View Job Component -->
<div wire:ignore.self>
    <div class="grid grid-cols-12 gap-6 mb-8">
        <div class="lg:col-span-3 md:col-span-3 sm:col-span-12 col-span-12">
            <x-printforce.cards.colour-card
                title="Total Jobs"
                bgColour="primary"
                :value="$this->statistics['total']" />
        </div>

        <div class="lg:col-span-3 md:col-span-3 sm:col-span-12 col-span-12">
            <x-printforce.cards.colour-card
                title="Today's Jobs"
                bgColour="warning"
                :value="$this->statistics['todays_jobs_total']" />
        </div>
    </div>


    <div class="card border-0">
        <div class="card-body">

            @php
            $customerSelectConfig = [
            'hasSearch' => true,
            'preventSearchFocus' => true,
            'searchPlaceholder' => 'Search...',
            'searchClasses' => 'block w-full sm:text-sm bg-transparent border-layer-line rounded-lg text-foreground placeholder:text-muted-foreground-1 focus:border-primary-focus focus:ring-primary-focus before:absolute before:inset-0 before:z-1 py-1.5 sm:py-2 px-3',
            'searchWrapperClasses' => 'bg-select p-2 -mx-1 sticky top-0',
            'placeholder' => 'Choose customer...',
            'toggleTag' => '<button type="button" aria-expanded="false"><span class="me-2" data-icon></span><span class="text-foreground" data-title></span></button>',
            'toggleClasses' => 'hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2.5 ps-4 pe-9 flex text-nowrap w-full cursor-pointer bg-layer border border-layer-line text-layer-foreground rounded-lg text-start text-sm hover:bg-layer-hover focus:outline-hidden focus:bg-layer-focus',
            'dropdownClasses' => 'mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-select border border-select-line rounded-lg shadow-xl overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-none [&::-webkit-scrollbar-track]:bg-scrollbar-track [&::-webkit-scrollbar-thumb]:bg-scrollbar-thumb',
            'optionClasses' => 'hs-selected:bg-select-item-active py-2 px-4 w-full text-sm text-select-item-foreground cursor-pointer hover:bg-select-item-hover rounded-lg focus:outline-hidden focus:bg-select-item-focus',
            'optionTemplate' => '<div>
                <div class="flex items-center">
                    <div class="me-2" data-icon></div>
                    <div class="text-foreground" data-title></div>
                </div>
            </div>',
            'extraMarkup' => '<div class="absolute top-1/2 inset-e-3 -translate-y-1/2"><svg class="shrink-0 size-3.5 text-muted-foreground-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m7 15 5 5 5-5" />
                    <path d="m7 9 5-5 5 5" />
                </svg></div>',
            ];
            @endphp

            <div class="grid grid-cols-12 gap-6 mb-5">
                <div class="lg:col-span-2 md:col-span-2 sm:col-span-12 col-span-12">
                    <input
                        type="date"
                        class="form-control"
                        name="start_date"
                        id="start_date"
                        wire:model.live="startDate"
                        placeholder="Start date" />
                </div>

                <div class="lg:col-span-2 md:col-span-2 sm:col-span-12 col-span-12">

                    <input
                        type="date"
                        class="form-control"
                        name="end_date"
                        id="end_date"
                        wire:model.live="endDate"
                        placeholder="End date" />
                </div>

                <div class="lg:col-span-2 md:col-span-2 sm:col-span-12 col-span-12">
                    <select id="job_type" class="py-2.5 px-4 pe-9 form-control" wire:model.live="serviceId" wire:ignore.self>
                        <option value="">Choose job type</option>
                        @foreach (\App\Enums\Services\ServiceCategoryEnum::options() as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="lg:col-span-2 md:col-span-2 sm:col-span-12 col-span-12">
                    <div class="hs-select relative" wire:ignore>
                        <select
                            id="customer_id"
                            name="customer_id"
                            wire:model.live="customerId"
                            data-hs-select='@json($customerSelectConfig)'
                            class="hidden py-1">
                            <option value="">Choose customer</option>

                            @foreach ($this->customers as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="lg:col-span-2 md:col-span-2 sm:col-span-12 col-span-12">
                    <button class="btn bg-blue-600 py-[11px]!">
                        Filter Jobs
                    </button>
                </div>
            </div>

            <div class="table-responsive mb-5">
                <table class="table w-full text-sm text-left rtl:text-right text-body">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date</th>
                            <th scope="col">Category</th>
                            <th scope="col">Service</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Details</th>
                            <th scope="col" class="text-center">Copies</th>
                            <th scope="col" class="text-end">Total</th>
                            <th scope="col" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($this->jobs as $job)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $job->created_at }}</td>
                            <td>
                                <p>{{ $job->job_type }}</p>
                            </td>
                            <td>
                                <p>{{ $job->service?->service_name }}</p>
                            </td>
                            <td>{{ $job->customer?->name }}</td>
                            <td>{{ $job->details }}</td>
                            <td class="text-center">{{ $job->unit_cost ?? $job->qty }}</td>
                            <td class="text-end">{{ number_format($job->total, 2) }}</td>
                            <td class="text-end">
                                <a
                                    href="{{ route('jobs.view-job', [$job]) }}"
                                    class="underline text-blue-600">
                                    View
                                </a>
                            </td>
                        </tr>
                        @endforeach

                        <tr>
                            <td colspan="6" class="text-end fw-600">Total</td>
                            <td class="text-end fw-600">{{ number_format($this->jobs->sum('total'), 2) }}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
