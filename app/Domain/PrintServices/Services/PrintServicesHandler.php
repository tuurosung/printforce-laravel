<?php

namespace App\Domain\PrintServices\Services;

use App\Domain\PrintServices\Contracts\PrintServiceRepositoryInterface;
use App\Domain\PrintServices\Models\PrintService;
use App\Models\Customers\Customer;
use Illuminate\Support\Collection;

class PrintServicesHandler
{
    public function __construct(
        private readonly PrintServiceRepositoryInterface $printServices
    ){}


    public function createService(array $data): PrintService
    {
        return $this->printServices->create($data);
    }


    public function updateService(PrintService $printService, array $data): bool
    {
        return $this->printServices->update($printService, $data);
    }


    public function deleteService(PrintService $printService): bool
    {
        return $this->printServices->delete($printService);
    }


    public function getPrintServices()
    {
        return $this->printServices->getAll();
    }


    public function getPrintServicesAsArray(): array
    {
        return $this->getPrintServices()->mapWithKeys(function ($service) {
            return [
                $service->service_id => $service->service_name
            ];
        })->toArray();
    }


    public function getServiceCost(Customer $customer, PrintService $service): float
    {
        return $service->priceFor($customer);
    }


    public function getServiceCategories(): Collection
    {
        return $this->printServices->allServiceCategories();
    }


    public function getServiceById(string $serviceId): PrintService
    {
        return $this->printServices->findById($serviceId);
    }

}
