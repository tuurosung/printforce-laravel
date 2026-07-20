<?php

namespace App\Domain\PrintJobs\Services;


use App\Domain\PrintJobs\Contracts\PrintJobsInterface;
use App\Domain\PrintJobs\Models\PrintforceJob;
use App\DTOs\Jobs\NewPrintJobData;
use App\Services\BaseService;
use DomainException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Override;

class PrintJobService extends BaseService implements PrintJobsInterface
{
    public function __construct(
        private PrintforceJob $model
    ){}


    public function modelClass(): string
    {
        return PrintforceJob::class;
    }


    public function createNewJob(NewPrintJobData $jobData): PrintforceJob
    {
        $printforceJob = $this->model->create($jobData->toArray());

        if (! $printforceJob) {
            throw new DomainException("Unable to create new job");
        }

        return $printforceJob;
    }


    public function deleteJob(PrintforceJob $printforceJob): bool
    {
        if (! $printforceJob->delete()) {
            throw new DomainException("Unable to delete job, try again");
        }

        return true;
    }


    public function assignJob(PrintforceJob $printforceJob, string $userId): bool
    {
        try {

            $printforceJob
                ->update([
                    'job_assigned_to' => $userId,
                    'job_assigned_at' => now()
                ]);

        } catch (\Exception $e) {
            throw new DomainException("Unable to assign job");
        }

        return true;
    }


    public function recentJobs(): Collection
    {
        return $this->baseQuery()->get();
    }


    public function filter(?string $startDate, ?string $endDate, ?string $serviceId, ?string $customerId): Collection
    {
        return $this->filteredQuery($startDate, $endDate, $serviceId, $customerId)->get();
    }


    private function filteredQuery(
        ?string $startDate,
        ?string $endDate,
        ?string $serviceId,
        ?string $customerId,
    ): Builder {
        return $this->baseQuery()
            ->when(
                filled($startDate) && filled($endDate),
                fn(Builder $query) => $query->whereBetween('created_at', [$startDate, $endDate]),
            )
            ->when(
                filled($serviceId),
                fn(Builder $query) => $query->where('service_id', $serviceId),
            )
            ->when(
                filled($customerId),
                fn(Builder $query) => $query->where('customer_id', $customerId),
            );
    }


    private function baseQuery(): Builder
    {
        return $this->model->newQuery()->orderByDesc('created_at');
    }
}
