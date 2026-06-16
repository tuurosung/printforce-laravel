<?php

namespace App\Domain\PrintServices\Services;

use App\Domain\PrintServices\Contracts\PrintServiceRepositoryInterface;
use App\Models\Customers\Customer;
use App\Models\Services\PrintService;
use Illuminate\Support\Facades\Log;

class PrintServicesHandler
{
    public function __construct(
        private readonly PrintServiceRepositoryInterface $printServices
    ){}


    public function getPrintServices()
    {
        return $this->printServices->getAll();
    }


    public function getPrintServicesAsArray(): array
    {
        return $this->printServices->getAll()->mapWithKeys(function ($service) {
            return [
                $service->service_id => $service->service_name
            ];
        })->toArray();
    }


    public function getServiceCost(Customer $customer, PrintService $service): float
    {
        return $service->priceFor($customer);
    }

}
