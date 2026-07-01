<?php

namespace App\Domain\PrintJobs\Services;

use App\Domain\PrintJobs\Contracts\PrintJobRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PrintJobService
{
    public function __construct(
        private readonly PrintJobRepositoryInterface $printJobRepository
    ){}


    public function getJobByIdAndType(string $jobId, string $jobType)
    {
        return $this->printJobRepository->findByIdAndType($jobId, $jobType);
    }


    public function assignJob(string $jobId, string $jobType, string $userId)
    {
        try {
            $this->printJobRepository->assignJob($jobId, $jobType, $userId);
            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function recentJobs(): Collection
    {
        return $this->printJobRepository->recentJobs();
    }

    public function filterJobs(?string $startDate, ?string $endDate, ?string $serviceId,  ?string $customerId): Collection
    {
        return $this->printJobRepository->filter(
            $startDate,
            $endDate,
            $serviceId,
            $customerId
        );
    }
}
