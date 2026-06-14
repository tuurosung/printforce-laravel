<?php

namespace App\Domain\Customers\Services;


use App\Domain\Customers\Contracts\CustomerRepositoryInterface;
use App\Facades\PrintServices;
use App\Models\Customers\Customer;
use App\Services\Accounting\AccountService;
use App\Services\PrintServicesManager;
use App\Traits\Cacheable;
use Illuminate\Database\Eloquent\Collection;

class CustomerService
{
    use Cacheable;

    public function __construct(
        private readonly CustomerRepositoryInterface $customers,
        private readonly PrintServicesManager $printServices,
        private AccountService $accountService
    ){}


    public function findCustomer(string $customerId): Customer
    {
        return $this->customers->findCustomer($customerId);
    }

    public function getCustomersArray(): array
    {
        return $this->customers->getCustomersArray();
    }


    public function deleteCustomer(Customer $customer): bool
    {
        if ($customer->hasBalance()) {
            throw new \DomainException(
                'Cannot delete customer with balance'
            );
        }

        return $this->customers->deleteCustomer($customer);
    }


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
        $statistics = $this->getCustomerStatistics();
        return [
            'customers' => $this->getLatestCustomers(),
            'statistics' => $statistics,
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
            'design_services' => $this->printServices->getDesignServicesArray(),
            'press_services' => $this->printServices->getPressServicesArray(),
            'photography_services' => $this->printServices->getPhotographyServicesArray(),
        ];
    }

}
