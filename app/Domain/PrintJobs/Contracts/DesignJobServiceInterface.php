<?php

namespace App\Domain\PrintJobs\Contracts;

use App\Domain\Customers\Models\Customer;
use App\Domain\PrintJobs\Models\DesignJob;

interface DesignJobServiceInterface
{
    public function create(Customer $customer, array $data): DesignJob;
    public function update(DesignJob $designJob, array $data): bool;
    public function delete(DesignJob $designJob): bool;
}
