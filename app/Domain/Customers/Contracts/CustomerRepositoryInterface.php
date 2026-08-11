<?php

declare(strict_types=1);

namespace App\Domain\Customers\Contracts;

use App\Domain\Customers\Models\Customer;
use App\DTOs\Customers\CustomerData;
use App\Enums\Customers\CustomerCategoryEnum;
use Illuminate\Support\Collection;

interface CustomerRepositoryInterface
{
    public function create(CustomerData $customerData): Customer;
    public function update(Customer $customer, CustomerData $customerData): bool;
    public function delete(Customer $customer): bool;


    public function filterCustomers(string $searchTerm): Collection;
    public function filterByCategory(CustomerCategoryEnum $category): Collection;
    public function getLatestCustomers(): Collection;
}
