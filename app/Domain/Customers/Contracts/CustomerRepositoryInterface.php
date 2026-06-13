<?php

namespace App\Domain\Customers\Contracts;

use App\Data\CustomerData;
use App\Models\Customers\Customer;
use Illuminate\Database\Eloquent\Collection;

interface CustomerRepositoryInterface
{

    // CRUD Operations
    public function createCustomer(CustomerData $data): Customer;
    public function updateCustomer(Customer $customer, CustomerData $data): Customer;
    public function deleteCustomer(Customer $customer): bool;


    // lifecycle
    public function setCustomerSession(Customer $customer): void;
    public function getLatestCustomers(): Collection;
    public function filterCustomers(string $searchTerm): Collection;
    public function getAllCustomers(): Collection;
    public function getCustomersArray(): array;
    public function getCustomerRanking(): Collection;
    public static function getCustomerStatistics(): array;
}
