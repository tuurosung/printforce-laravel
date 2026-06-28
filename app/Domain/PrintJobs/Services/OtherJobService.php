<?php

namespace App\Domain\PrintJobs\Services;

use App\Domain\PrintJobs\Contracts\OtherJobServiceInterface;
use App\Models\Customers\Customer;
use App\Domain\PrintJobs\Models\OtherJob;
use Override;

class OtherJobService implements OtherJobServiceInterface
{
    public function __construct(
        private OtherJob $model
    ) {}


    public function createJob(Customer $customer, array $data): OtherJob
    {
        return $customer->otherJobs()->create($data);
    }
}
