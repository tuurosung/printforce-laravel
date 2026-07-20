<?php

declare(strict_types = 1);

namespace App\Domain\PrintJobs\Contracts;

use App\Contracts\BaseInterface;
use App\Domain\PrintJobs\Models\PrintforceJob;
use App\DTOs\Jobs\NewPrintJobData;
use Illuminate\Database\Eloquent\Collection;

interface PrintJobsInterface extends BaseInterface
{
    public function createNewJob(NewPrintJobData $jobData): PrintforceJob;
    public function deleteJob(PrintforceJob $printforceJob): bool;

    public function recentJobs(): Collection;

    public function filter(?string $startDate, ?string $endDate, ?string $serviceId, ?string $customerId): Collection;


    public function assignJob(PrintforceJob $printforceJob, string $userId): bool;
}
