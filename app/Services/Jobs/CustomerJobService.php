<?php

namespace App\Services\Jobs;

use App\Models\Jobs\PressJob;
use App\Models\Jobs\DesignJob;
use App\Models\Jobs\EmbroideryJob;
use App\Models\Jobs\LargeFormatJob;
use App\Models\Jobs\PhotographyJob;

class CustomerJobService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private $largeFormatJobService = new LargeFormatJobService(),
        private $embroideryJobService = new EmbroideryJobService(),
        private $designJobService = new DesignJobService(),
        private $pressJobService = new PressJobService()
    ){}


    protected function jobModels()
    {
        [
            LargeFormatJob::class,
            EmbroideryJob::class,
            DesignJob::class,
            PressJob::class,
            PhotographyJob::class,
        ];
    }

    public static function countTodaysJobs()
    {

        return collect((new self)->jobModels())->sum(fn($model) =>
            $model::whereDate('created_at', today())->count()
        );
    }


    public static function sumTodaysJobs()
    {
        return collect((new self)->jobModels())->sum(fn($model) =>
            $model::whereDate('created_at', today())->sum('total')
        );
    }


    public static function sumMonthlyJobs()
    {
        return collect((new self)->jobModels())->sum(fn($model) =>
            $model::whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->sum('total')
        );
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

        foreach ((new self)->jobModels() as $model) {
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
