<?php

namespace App\Contracts\Customers;

use App\Data\CustomerData;
use App\Models\Customers\Customer;
use Illuminate\Database\Eloquent\Collection;

interface CustomerServiceContract
{

    // CRUD Operations
    public function createCustomer(CustomerData $data): Customer;
    public function updateCustomer(Customer $customer, CustomerData $data): bool;
    public function deleteCustomer(Customer $customer): bool;


    // lifecycle
    public function getLatestCustomers(): Collection;
    public function filterCustomers(string $searchTerm): Collection;
    public function getAllCustomers(): Collection;
    public function getCustomersArray(): array;
    public function getCustomerRanking(): Collection;
    public static function getCustomerStatistics(): array;
}
