<?php

declare(strict_types= 1);

namespace App\Domain\PrintServices\Services;

use App\Domain\Customers\Models\Customer;
use App\Domain\PrintServices\Contracts\ServicesInterface;
use App\Domain\PrintServices\Models\PrintService;
use App\DTOs\Services\ServiceData;
use App\Enums\Services\ServiceCategoryEnum;
use App\Services\BaseService;
use DomainException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

final class ServiceHandler extends BaseService implements ServicesInterface
{
    public function __construct(
        public PrintService $model,
    ){}


    protected string $selectOptionKey = "service_id";
    protected string $selectOptionValue = "service_name";

    protected function modelClass(): string
    {
        return PrintService::class;
    }


    public function createNewService(ServiceData $serviceData): PrintService
    {
        $printService = $this->model->create($serviceData->toArray());

        if (! $printService) {
            throw new DomainException("Unable to create new Service");
        }

        Log::info("Service created", [$printService]);

        return $printService;
    }


    public function updateService(PrintService $service, ServiceData $serviceData): bool
    {
        $isUpdated = $service->update($serviceData->toArray());

        if (! $isUpdated) {
            throw new DomainException("Unable to update service information");
        }

        return $isUpdated;
    }


    public function deleteService(PrintService $service): bool
    {
        if (! $service->delete()) {
            throw new DomainException("Unable to delete service");
        }

        return true;
    }


    public function filterByCategory(ServiceCategoryEnum $category): Collection
    {
        return PrintService::inCategory($category)->get();
    }



    public function getServiceCost(Customer $customer, string $serviceId): float
    {
        return $this->findById($serviceId)->priceFor($customer);
    }




    // public function getServicesByCategory(string $category): EloquentCollection
    // {
    //     return $this->model->inCategory($category);
    // }


    protected function baseQuery(): Builder
    {
        return $this->model
            ->newQuery()
            ->orderByDesc("service_name");
    }





    public function getServicesByCategory(string $category): EloquentCollection
    {
        return $this->model->inCategory($category);
    }



    public function getServicesByCategoryAsArray(ServiceCategoryEnum $category): array
    {
        return $this->printServices->filterByCategory($category)
            ->mapWithKeys(function ($service) {
                return [
                    $service->service_id => $service->service_name
                ];
            })
            ->toArray();
    }



    public function getServiceDetail($serviceId)
    {
        // if service customer_category session isn't set, use individual customer category
        $customerCategory = Session::get('active_customer_invoice.customer_category');

        $service = $this->findService($serviceId);

        return [
            'service_id' => $service->service_id,
            'service_name' => $service->service_name,
            'service_category' => $service->category_id,
            'service_description' => $service->service_description,
            'service_cost' => $service ? $service[$customerCategory] : null,
        ];
    }

}
