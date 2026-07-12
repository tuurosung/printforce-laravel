<?php

namespace  App\Domain\PrintJobs\Contracts;

use App\Domain\Customers\Models\Customer;
use App\Domain\PrintJobs\Models\PressJob;

interface PressJobServiceInterface
{
    public function create(Customer $customer, array $data): PressJob;
    public function update(PressJob $product, array $data): bool;
    public function delete(PressJob $pressJob): bool;
}
