<?php

namespace App\Domain\PrintJobs\Contracts;

use App\Domain\PrintJobs\Models\OtherJob;
use App\Models\Customers\Customer;

interface OtherJobServiceInterface
{
    public function createJob(Customer $customer, array $data): OtherJob;
}
