<?php

namespace App\Services\Jobs;

use App\Models\Jobs\PressJob;
use App\Models\Jobs\DesignJob;
use App\Models\Jobs\EmbroideryJob;
use App\Models\Jobs\LargeFormatJob;
use App\Models\Jobs\PhotographyJob;

class JobService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private $largeFormatJobService = new LargeFormatJobService(),
        private $embroideryJobService = new EmbroideryJobService(),
        private $designJobService = new DesignJobService(),
        private $pressJobService = new PressJobService()
    )
    {
        //
    }



    /**
     * Return the sum of all jobs for a given month
     */
    public function getMonthlyJobSum()
    {

        $largeFormatJobTotal = $this->largeFormatJobService->monthlyJobTotal();
        $embroideryJobTotal = $this->embroideryJobService->monthlyJobTotal();
        $designJobTotal = $this->designJobService->monthlyJobTotal();
        $pressJobTotal = $this->pressJobService->monthlyJobTotal();

        return collect([
            $largeFormatJobTotal,
            $embroideryJobTotal,
            $designJobTotal,
            $pressJobTotal,
        ])->sum();
    }


    public static function findJobById(string $job_id)
    {
        $models = [
            LargeFormatJob::class,
            EmbroideryJob::class,
            DesignJob::class,
            PressJob::class,
            PhotographyJob::class,
        ];

        foreach ($models as $model) {
            $job = $model::where('job_id', $job_id)->first();
            if ($job = $model::firstWhere('job_id', $job_id)) {
                return [
                    'job' => $job,
                    'job_category' => class_basename($model)
                ];
            }
        }

        return null;
    }
}
