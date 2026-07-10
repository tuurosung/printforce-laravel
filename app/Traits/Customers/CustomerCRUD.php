<?php

namespace App\Traits\Customers;

use App\DTOs\Customers\CustomerData;
use App\Models\Customers\Customer;
use DomainException;

trait CustomerCRUD
{
    public function createCustomer(CustomerData $customerData): Customer
    {
        $customer = $this->model->create($customerData->toArray());

        if (! $customer) {
            throw new DomainException("Unable to create new customer");
        }

        return $customer;
    }


    public function updateCustomer(Customer $customer, CustomerData $customerData): bool
    {
        $isUpdated = $customer->update($customerData->toArray());

        if (! $isUpdated) {
            throw new DomainException("Unable to update customer information");
        }

        return true;
    }


    public function deleteCustomer(Customer $customer): bool
    {
        $this->guardCustomerWithBalance($customer);

        if (! $customer->delete()) {
            throw new DomainException("Failed to delete customer. Try again");
        }

        return true;
    }

    // Guards ------------------------------------------------------------------------------
    private function guardCustomerWithBalance(Customer $customer): void
    {
        if ($customer->hasBalance()) {
            throw new DomainException('You cannot delete a customer with a balance');
        }
    }
}
