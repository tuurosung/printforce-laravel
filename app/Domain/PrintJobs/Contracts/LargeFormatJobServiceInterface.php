<?php

namespace App\Domain\PrintJobs\Contracts;

use App\Domain\Customers\Models\Customer;
use App\Domain\PrintJobs\Models\LargeFormatJob;

interface LargeFormatJobServiceInterface
{
    public function create(Customer $customer, array $data): LargeFormatJob;
    public function update(LargeFormatJob $largeFormatJob, array $data): bool;
    public function delete(LargeFormatJob $largeFormatJob): bool;
}
