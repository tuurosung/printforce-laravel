<?php

namespace App\Domain\PrintJobs\Services;

use App\Domain\PrintJobs\Models\DesignJob;
use App\Domain\PrintJobs\Models\EmbroideryJob;
use App\Domain\PrintJobs\Models\LargeFormatJob;
use App\Domain\PrintJobs\Models\PhotographyJob;
use App\Domain\PrintJobs\Models\PressJob;
use App\Domain\PrintJobs\Services\DesignJobService;
use App\Domain\PrintJobs\Services\EmbroideryJobService;
use App\Domain\PrintJobs\Services\LargeFormatJobService;
use App\Domain\PrintJobs\Services\PressJobService;

class CustomerJobService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private LargeFormatJobService $largeFormatJobService,
        private EmbroideryJobService $embroideryJobService,
        private DesignJobService $designJobService,
        private PressJobService $pressJobService
    ){}


    protected static function jobModels()
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

        return collect(self::jobModels())->sum(fn($model) =>
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
