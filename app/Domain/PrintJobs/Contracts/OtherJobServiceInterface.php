<?php

namespace App\Domain\PrintJobs\Contracts;

use App\Domain\Customers\Models\Customer;
use App\Domain\PrintJobs\Models\OtherJob;

interface OtherJobServiceInterface
{
    public function createJob(Customer $customer, array $data): OtherJob;
}
