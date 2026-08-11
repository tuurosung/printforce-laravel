<?php

declare(strict_types= 1);

namespace App\Domain\Customers\Contracts;

use App\Contracts\BaseInterface;
use App\Domain\Customers\Models\Customer;

interface CustomerServiceInterface extends BaseInterface
{
    /**
     * Find a customer by Id
     */
    public function findById(string $customerId): Customer;



    /**
     * Sets the current customer session
     */
    public function setCustomerSession(Customer $customer): void;


}
