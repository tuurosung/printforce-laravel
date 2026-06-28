<?php

namespace App\Domain\PrintJobs\Contracts;

use App\Domain\PrintJobs\Models\DesignJob;
use App\Models\Customers\Customer;

interface DesignJobServiceInterface
{
    public function create(Customer $customer, array $data): DesignJob;
    public function update(DesignJob $designJob, array $data): bool;
    public function delete(DesignJob $designJob): bool;
}
