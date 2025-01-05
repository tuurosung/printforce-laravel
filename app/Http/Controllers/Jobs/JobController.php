<?php

namespace App\Http\Controllers\Jobs;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Models\Jobs\PressJob;
use App\Models\Jobs\DesignJob;
use App\Models\Jobs\EmbroideryJob;
use App\Models\Jobs\LargeFormatJob;
use App\Models\Jobs\PhotographyJob;
use App\Http\Controllers\Controller;

class JobController extends Controller
{


    public static function servicePerformanceAnalytics()
    {
        $jobs = [];

        $largeFormatJobs = LargeFormatJob::with('service')->selectRaw('service_id, SUM(total) as jobs_sum, COUNT(job_id) as jobs_count')
            ->groupBy('service_id')
            ->limit(10)
            ->get();



        foreach ($largeFormatJobs as $largeFormatJob) {

            $jobs[] = [
                'service_id' => $largeFormatJob->service_id,
                'service_name' => $largeFormatJob->service->service_name,
                'jobs_count' => $largeFormatJob->jobs_count,
                'jobs_sum' => $largeFormatJob->jobs_sum
            ];

        }

        $embroideryJobs = EmbroideryJob::with('service')->selectRaw('service_id, SUM(total) as jobs_sum, COUNT(job_id) as jobs_count')
            ->groupBy('service_id')
            ->get();

        foreach ($embroideryJobs as $embroideryJob) {

            $jobs[] = [
                'service_id' => $embroideryJob->service_id,
                'service_name' => $embroideryJob->service->service_name,
                'jobs_count' => $embroideryJob->jobs_count,
                'jobs_sum' => $embroideryJob->jobs_sum
            ];

        }

        usort($jobs, function ($a, $b) {
            return $b['jobs_sum'] <=> $a['jobs_sum'];
        });

        return $jobs;
    }


    public static function countAllJobs()
    {
        return collect([
            LargeFormatJob::count(),
            EmbroideryJob::count(),
            DesignJob::count(),
            PressJob::count(),
            PhotographyJob::count()
        ])->sum();
    }

    public static function sumOfAllJobs()
    {
        return collect([
            LargeFormatJob::sum('total'),
            EmbroideryJob::sum('total'),
            DesignJob::sum('total'),
            PressJob::sum('total'),
            PhotographyJob::sum('total')
        ])->sum();
    }
}
