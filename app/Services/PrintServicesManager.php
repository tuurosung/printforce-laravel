<?php

namespace App\Services;

use App\Models\Services\Service;
use App\Models\Customers\Customer;
use PhpParser\Node\Expr\Cast\Array_;
use App\Models\Services\PrintService;

class PrintServicesManager
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get all services or filter by category and status.
     *
     * @param int|null $categoryId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getServices($categoryId = null)
    {
        $query = PrintService::query();

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        return $query->get();
    }

    public function getServicesArray($categoryId = null): array
    {
        return $this->getServices($categoryId)
            ->mapWithKeys(function ($service) {
                return [$service->service_id => $service->service_name];
            })
            ->toArray();
    }

    public function filterServicesByCategory($categoryId)
    {
        return $this->getServices($categoryId);
    }

    public function getFilteredServicesArray($categoryId): array
    {
        return $this->getServicesArray($categoryId);
    }

    public function getServiceCost($serviceId)
    {
        $service = PrintService::find($serviceId);
        $customer = Customer::find(session('current_customer'));

        if (!$service) {
            return null;
        }

        $serviceCost = $service[$customer->category];

        return $serviceCost;
    }
}
