<?php

namespace App\Domain\PrintJobs\Services;

use App\Domain\PrintJobs\Contracts\PrintJobRepositoryInterface;

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
}
