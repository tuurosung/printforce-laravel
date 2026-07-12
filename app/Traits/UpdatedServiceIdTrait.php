<?php

namespace App\Traits;


use App\Domain\PrintServices\Services\ServiceHandler;

trait UpdatedServiceIdTrait
{

    public ?string $serviceId = '';
    public ?float $cost = 0;

    public function updatedServiceId(string $value): void
    {
        if (blank($this->serviceId)) {
            $this->unitCost = 0;
            $this->recalculate();
            return;
        }

        $this->cost = app(ServiceHandler::class)->getServiceCost($this->customer, $value);

        $this->recalculate();
    }

    public function updated(): void
    {
        $this->recalculate();
    }
}
