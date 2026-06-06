<?php

namespace App\Abstracts\Customers;

use App\Contracts\Customers\CustomerServiceContract;
use App\Data\CustomerData;
use App\Models\Customers\Customer;
use Illuminate\Database\Eloquent\Collection;
use Override;

abstract class BaseCustomerService implements CustomerServiceContract
{

    #[Override]
    public function getAllCustomers(): Collection
    {
        return Customer::all();
    }


    #[Override]
    public function getLatestCustomers(): Collection
    {
        return Customer::latest()->take(100)->get();
    }


    #[Override]
    public function filterCustomers(string $searchTerm): Collection
    {
        return Customer::whereLike('name', $searchTerm)
            ->orWhereLike('phone', $searchTerm)
            ->orWhereLike('category', $searchTerm)
            ->limit(10)
            ->get();
    }

    // Business Logic Delegated to Concrete Class
    abstract public function getCustomerRanking(): Collection;
    abstract public static function getCustomerStatistics(): array;


    // CRUD Left for concrete class to handle
    abstract public function createCustomer(CustomerData $data): Customer;
    abstract public function updateCustomer(Customer $customer, CustomerData $data): bool;
    abstract public function deleteCustomer(Customer $customer): bool;
}
