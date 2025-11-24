<?php

namespace App\Services;

use App\Traits\Cacheable;
use App\Models\Services\Service;
use App\Models\Customers\Customer;
use App\Traits\Services\HasArrayCollections;
use App\Traits\Services\HasCategoryCollections;
use PhpParser\Node\Expr\Cast\Array_;
use App\Models\Services\PrintService;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Collection;

class PrintServicesManager
{

    use Cacheable;
    use HasArrayCollections;
    use HasCategoryCollections;

    protected $cacheTag = 'print_services';

    protected ?Collection $services = null;

    const LARGE_FORMAT = "001";
    const DESIGN = "002";
    const EMBROIDERY = "003";
    const PRESS = "004";
    const PHOTOGRAPHY = "005";


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
    public function getAllServices()
    {

        if ($this->services === null) {
            $this->services = PrintService::get();
        }

        return $this->services;
    }


    public function filterServicesByCategory($categoryId)
    {
        return $this->getAllServices()
            ->where('category_id', $categoryId);
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


    private function findService($serviceId)
    {
        return PrintService::where('service_id', $serviceId)->first();
    }


    public static function dropCaches()
    {
        (new self())->forgetCache('all_services');
    }
}
