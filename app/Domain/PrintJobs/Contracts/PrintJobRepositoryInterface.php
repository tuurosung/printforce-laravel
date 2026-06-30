<?php

namespace App\Domain\PrintJobs\Contracts;

use Illuminate\Database\Eloquent\Collection;


interface PrintJobRepositoryInterface
{
    public function findByIdAndType(string $jobId, string $jobType);
    public function matchModel(string $jobType);
    public function assignJob(string $jobId, string $jobType, string $userId): bool;

    public function recentJobs() : Collection;
}
