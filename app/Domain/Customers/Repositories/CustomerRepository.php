<?php

declare(strict_types=1);

namespace App\Domain\Customers\Repositories;

use App\Domain\Customers\Contracts\CustomerRepositoryInterface;
use App\Domain\Customers\Models\Customer;
use App\DTOs\Customers\CustomerData;
use App\Enums\Customers\CustomerCategoryEnum;
use DomainException;
use Illuminate\Support\Collection;
use Override;

final class CustomerRepository implements CustomerRepositoryInterface
{
    #[Override]
    public function create(CustomerData $customerData): Customer
    {
        $customer = Customer::create($customerData->toArray());

        if (! $customer) {
            \Log::error("Unable to create new customer", [$customerData]);
            throw new DomainException("Unable to create new customer");
        }

        return $customer;
    }


    #[Override]
    public function update(Customer $customer, CustomerData $customerData): bool
    {
        $isUpdated = $customer->update($customerData->toArray());

        if (! $isUpdated) {
            \Log::error("Unable to update customer information", [$customer, $customerData]);
            throw new DomainException("Unable to update customer information");
        }

        return true;
    }


    #[Override]
    public function delete(Customer $customer): bool
    {
        $this->guardCustomerWithBalance($customer);

        if (! $customer->delete()) {
            \Log::error("Failed to delete ustomer.", [$customer]);
            throw new DomainException("Failed to delete customer. Try again");
        }

        return true;
    }


    #[Override]
    public function filterCustomers(string $searchTerm): Collection
    {
        $searchTerm = trim($searchTerm);

        if ($searchTerm === '') {
            return $this->getLatestCustomers();
        }

        return Customer::query()
            ->where(function ($query) use ($searchTerm) {
                $query->whereLike('name', "%{$searchTerm}%")
                    ->orWhereLike('phone', "%{$searchTerm}%");
            })
            ->limit(10)
            ->get();
    }


    #[Override]
    public function filterByCategory(CustomerCategoryEnum $category): Collection
    {
        return Customer::query()
            ->where('category', $category->value)
            ->get();
    }


    public function getLatestCustomers(): Collection
    {
        return $this->baseQuery()->take(100)->get();
    }

    private function baseQuery()
    {
        return Customer::orderBy('created_at', 'desc');
    }


    // Guards ------------------------------------------------------------------------------
    private function guardCustomerWithBalance(Customer $customer): void
    {
        if ($customer->hasBalance()) {
            \Log::error("Attempt to delete a customer with a positive balance", [$customer]);
            throw new DomainException('You cannot delete a customer with a balance');
        }
    }
}
