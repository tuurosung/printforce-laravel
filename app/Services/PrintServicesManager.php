<?php

namespace App\Services;

use App\Models\Services\Service;
use App\Models\Customers\Customer;
use App\Traits\Cacheable;
use PhpParser\Node\Expr\Cast\Array_;
use App\Models\Services\PrintService;

class PrintServicesManager
{

    use Cacheable;

    protected $cacheTag = 'print_services';


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

        return $this->rememberCache(
            'all_services' . ($categoryId ? "_cat_{$categoryId}" : ''),
            function () use ($query) {
                return $query->get();
            }
        );
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


    /**
     * Returns all Large Format Services As An Array
     *
     * @return array
     */
    public function getLargeFormatServices()
    {
        return $this->getFilteredServicesArray('001');
    }


    /**
     * Returns all Design Services As An Array
     *
     * @return array
     */
    public function getDesignServices()
    {
        return $this->getFilteredServicesArray('002');
    }


    /**
     * Returns all Embroidery Services As An Array
     *
     * @return array
     */
    public function getEmbroideryServices()
    {
        return $this->getFilteredServicesArray('003');
    }


    /**
     * Returns all Press Services As An Array
     *
     * @return array
     */
    public function getPressServices()
    {
        return $this->getFilteredServicesArray('004');
    }


    /**
     * Returns all Photography Services As An Array
     *
     * @return array
     */
    public function getPhotographyServices()
    {
        return $this->getFilteredServicesArray('005');
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
