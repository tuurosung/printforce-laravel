<?php

namespace App\Domain\PrintJobs\Repositories;

use App\Domain\PrintJobs\Contracts\PrintJobRepositoryInterface;
use App\Domain\PrintJobs\Models\OtherJob;
use App\Domain\PrintJobs\Models\PrintforceJob;
use App\Models\Jobs\DesignJob;
use App\Models\Jobs\EmbroideryJob;
use App\Models\Jobs\LargeFormatJob;
use App\Models\Jobs\PhotographyJob;
use App\Models\Jobs\PressJob;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Override;

class PrintJobRepository implements PrintJobRepositoryInterface
{
    public function __construct(
        private PrintforceJob $model
    ) {}

    public function findByIdAndType(string $jobId, string $jobType)
    {
        $model = $this->matchModel($jobType);

        return $model->where('job_id', $jobId)->first();
    }


    public function matchModel(string $jobType)
    {
        return match ($jobType) {
            "Large Format" => new LargeFormatJob(),
            "Embroidery" => new EmbroideryJob(),
            "Press" => new PressJob(),
            "Design" => new DesignJob(),
            "Photography" => new PhotographyJob(),
            "Others" => new OtherJob()
        };
    }


    public function assignJob(string $jobId, string $jobType, string $userId): bool
    {
        $model = $this->matchModel($jobType);

        $result = $model->where('job_id', $jobId)
            ->update([
                'job_assigned_to' => $userId,
                'job_assigned_at' => now()
            ]);

        return (bool) $result;
    }

    #[Override]
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
                fn (Builder $query) => $query->whereBetween('created_at', [$startDate, $endDate]),
            )
            ->when(
                filled($serviceId),
                fn (Builder $query) => $query->where('service_id', $serviceId),
            )
            ->when(
                filled($customerId),
                fn (Builder $query) => $query->where('customer_id', $customerId),
            );
    }



    private function baseQuery(): Builder
    {
        return $this->model->newQuery()->orderByDesc('created_at');
    }
}
