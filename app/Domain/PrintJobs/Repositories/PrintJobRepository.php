<?php

namespace App\Domain\PrintJobs\Repositories;

use App\Domain\PrintJobs\Contracts\PrintJobRepositoryInterface;
use App\Domain\PrintJobs\Models\OtherJob;
use App\Models\Jobs\DesignJob;
use App\Models\Jobs\EmbroideryJob;
use App\Models\Jobs\LargeFormatJob;
use App\Models\Jobs\PhotographyJob;
use App\Models\Jobs\PressJob;

class PrintJobRepository implements PrintJobRepositoryInterface
{
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
            "Others" => new OtherJob(   )
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
}
