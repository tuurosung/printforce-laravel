<?php

namespace App\Domain\PrintJobs\Contracts;

use App\Domain\PrintJobs\Models\LargeFormatJob;
use App\Models\Customers\Customer;

interface LargeFormatJobServiceInterface
{
    public function create(Customer $customer, array $data): LargeFormatJob;
    public function update(LargeFormatJob $largeFormatJob, array $data): bool;
    public function delete(LargeFormatJob $largeFormatJob): bool;
}
