<?php

namespace App\Http\Controllers\Jobs;

use App\Models\Job;
use App\Services\Jobs\JobService;
use App\Traits\Cacheable;
use Illuminate\Http\Request;
use App\Models\Jobs\PressJob;
use App\Models\Jobs\DesignJob;
use App\Models\Jobs\EmbroideryJob;
use App\Models\Jobs\LargeFormatJob;
use App\Models\Jobs\PhotographyJob;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Services\Jobs\PressJobService;
use App\Services\Jobs\DesignJobService;
use App\Helpers\JobHelpers\PressJobHelpers;
use App\Services\Jobs\EmbroideryJobService;
use App\Helpers\JobHelpers\DesignJobHelpers;
use App\Services\Jobs\LargeFormatJobService;
use App\Helpers\JobHelpers\EmbroideryJobHelpers;
use App\Helpers\JobHelpers\LargeFormatJobHelpers;
use App\Helpers\JobHelpers\PhotographyJobHelpers;

class JobController extends Controller
{

    use Cacheable;

    protected $cacheTag = 'jobs';


    public function todaysJobs()
    {
        $largeFormatJobService = new LargeFormatJobService();
        $embroideryJobService = new EmbroideryJobService();
        $designJobsService = new DesignJobService();
        $pressJobService = new PressJobService();

        $todays_largeformat_jobs = $largeFormatJobService->getTodaysJobs();
        $todays_embroidery_jobs = $embroideryJobService->getTodaysJobs();
        $todays_press_jobs = $pressJobService->getTodaysPressJobs();
        $todays_design_jobs = $designJobsService->getTodaysJobs();
        $todays_photography_jobs = PhotographyJobHelpers::getTodaysJobs();

        return view('app.job.todays-jobs', compact('todays_largeformat_jobs', 'todays_embroidery_jobs', 'todays_press_jobs', 'todays_design_jobs', 'todays_photography_jobs'));
    }


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
                'service_name' => $largeFormatJob->service?->service_name,
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
                'service_name' => $embroideryJob->service?->service_name,
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

    /**
     * Returns the sum of all jobs for the current month
     * @return mixed
     */
    public function sumOfAllJobsThisMonth()
    {
        $jobService = new JobService();

        return $jobService->getMonthlyJobSum();

        // return $this->rememberCache(
        //     'sumOfAllJobsThisMonth',
        //     function () {
        //         return collect([
        //             LargeFormatJob::whereMonth('created_at', now()->format('m'))->whereYear('created_at', now()->format('Y'))->sum('total'),
        //             EmbroideryJob::whereMonth('created_at', now()->format('m'))->whereYear('created_at', now()->format('Y'))->sum('total'),
        //             DesignJob::whereMonth('created_at', now()->format('m'))->whereYear('created_at', now()->format('Y'))->sum('total'),
        //             PressJob::whereMonth('created_at', now()->format('m'))->whereYear('created_at', now()->format('Y'))->sum('total'),
        //             PhotographyJob::whereMonth('created_at', now()->format('m'))->whereYear('created_at', now()->format('Y'))->sum('total')
        //         ])->sum();
        //     }
        // );

        // return Cache::remember('sumOfAllJobsThisMonth', 60 * 60, function () {
        //     return collect([
        //         LargeFormatJob::whereMonth('created_at', now()->format('m'))->whereYear('created_at', now()->format('Y'))->sum('total'),
        //         EmbroideryJob::whereMonth('created_at', now()->format('m'))->whereYear('created_at', now()->format('Y'))->sum('total'),
        //         DesignJob::whereMonth('created_at', now()->format('m'))->whereYear('created_at', now()->format('Y'))->sum('total'),
        //         PressJob::whereMonth('created_at', now()->format('m'))->whereYear('created_at', now()->format('Y'))->sum('total'),
        //         PhotographyJob::whereMonth('created_at', now()->format('m'))->whereYear('created_at', now()->format('Y'))->sum('total')
        //     ])->sum();
        // });
    }

    public static function sumOfAllJobsThisYear()
    {
        return Cache::remember('sumOfAllJobsThisYear', 60 * 60, function () {
            return collect([
                LargeFormatJob::whereYear('created_at', now()->format('Y'))->sum('total'),
                EmbroideryJob::whereYear('created_at', now()->format('Y'))->sum('total'),
                DesignJob::whereYear('created_at', now()->format('Y'))->sum('total'),
                PressJob::whereYear('created_at', now()->format('Y'))->sum('total'),
                PhotographyJob::whereYear('created_at', now()->format('Y'))->sum('total')
            ])->sum();
        });

    }
}
