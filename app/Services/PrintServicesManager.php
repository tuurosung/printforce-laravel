<?php

namespace App\Services;

use App\Domain\PrintServices\Contracts\PrintServiceRepositoryInterface;
use App\Enums\Services\ServiceCategoryEnum;
use App\Models\Customers\Customer;
use App\Models\Services\PrintService;
use App\Models\Services\Service;
use App\Traits\Cacheable;
use App\Traits\Services\HasArrayCollections;
use App\Traits\Services\HasCategoryCollections;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\Cast\Array_;

class PrintServicesManager
{

    use Cacheable;
    use HasArrayCollections;
    use HasCategoryCollections;

    protected $cacheTag = 'print_services';

    protected ?Collection $services = null;



    public function __construct(
        private readonly PrintServiceRepositoryInterface $printServices
    ){}


    public function getServicesByCategory(ServiceCategoryEnum $category): Collection
    {
        return $this->printServices->filterByCategory($category);
    }


    public function getServicesByCategoryAsArray(ServiceCategoryEnum $category): array
    {
        return $this->printServices->filterByCategory($category)
            ->mapWithKeys(function ($service){
                return [
                    $service->service_id => $service->service_name
                ];
            })
            ->toArray();
    }


    public function getServiceCost(Customer $customer, PrintService $service): float
    {
        return $service->priceFor($customer);
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



    public static function dropCaches()
    {
        (new self())->forgetCache('all_services');
    }
}
