<?php

namespace App\Domain\Customers\Services;


use App\Domain\Customers\Contracts\CustomerRepositoryInterface;
use App\Facades\PrintServices;
use App\Models\Customers\Customer;
use App\Services\Accounting\AccountService;
use App\Traits\Cacheable;
use Illuminate\Database\Eloquent\Collection;

class CustomerService
{
    use Cacheable;

    public function __construct(
        private readonly CustomerRepositoryInterface $customers,
        private AccountService $accountService
    ){}


    public function getLatestCustomers(): Collection
    {
        return $this->customers->getLatestCustomers();
    }


    public function getCustomerStatistics(): array
    {
        return $this->customers->getCustomerStatistics();
    }


    public function getCustomerRanking(): Collection
    {
        return $this->customers->getCustomerRanking();
    }


    public function filterCustomers(string $searchTerm): Collection
    {
        return $this->customers->filterCustomers($searchTerm);
    }


    // CRUD Operations------------------------------------------------------------------------------------


    public function countNewCustomers()
    {
        return $this->customers->getCustomerStatistics()['new_customers'];
    }


    public function getIndexData(): array
    {
        return [
            'total_customers' => $this->customers->getCustomerStatistics()['total_customers'],
            'new_customers' => $this->countNewCustomers(),
            'statistics' => $this->getCustomerStatistics(),
            'customers' => $this->getLatestCustomers(),
            'total_jobs' => 0,
            'total_payments' => 0,
            'total_balance' => 0,
        ];
    }


    public function getShowData(Customer $customer): array
    {
        return [
            'customer' => $customer,
            'payment_accounts' => $this->accountService->getAssetAccounts(),
            'largeformat_services' => PrintServices::getLargeFormatServicesArray(),
            'design_services' => PrintServices::getDesignServicesArray(),
            'embroidery_services' => PrintServices::getEmbroideryServicesArray(),
            'press_services' => PrintServices::getPressServicesArray(),
            'photography_services' => PrintServices::getPhotographyServicesArray(),
        ];
    }

}
