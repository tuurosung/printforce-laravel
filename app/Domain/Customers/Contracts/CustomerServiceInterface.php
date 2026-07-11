<?php

declare(strict_types= 1);

namespace App\Domain\Customers\Contracts;

use App\Domain\Customers\Models\Customer;
use App\DTOs\Customers\CustomerData;
use Illuminate\Database\Eloquent\Collection;

interface CustomerServiceInterface
{
    /**
     * Find a customer by Id
     */
    public function findById(string $customerId): Customer;


    /**
     * Return customers list as an array
     */
    public function getCustomersArray(): array;


    /**
     * Get latest customers. Return a list of top 100
     */
    public function getLatestCustomers(): Collection;


    /**
     * Sets the current customer session
     */
    public function setCustomerSession(Customer $customer): void;



    // CRUD ----------------------------------------------------------------------------


    /**
     * Creates a new customer
     */
    public function createCustomer(CustomerData $customerData): Customer;


    /**
     * Updates an existing customer
     */
    public function updateCustomer(Customer $customer, CustomerData $customerData): bool;


    /**
     * Deletes an existing customer
     */
    public function deleteCustomer(Customer $customer): bool;


    /**
     * Retrieve all customers
     */
    public function allCustomers(): Collection;

}
