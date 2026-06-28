<?php

namespace App\Domain\PrintJobs\Http\Controllers;


use App\Domain\PrintJobs\Models\DesignJob;
use App\Domain\PrintJobs\Models\EmbroideryJob;
use App\Domain\PrintJobs\Models\LargeFormatJob;
use App\Domain\PrintJobs\Models\PhotographyJob;
use App\Domain\PrintJobs\Models\PressJob;
use App\Domain\PrintJobs\Services\DesignJobService;
use App\Domain\PrintJobs\Services\EmbroideryJobService;
use App\Domain\PrintJobs\Services\LargeFormatJobService;
use App\Domain\PrintJobs\Services\PressJobService;
use App\Helpers\JobHelpers\PhotographyJobHelpers;
use App\Http\Controllers\Controller;
use App\Services\Jobs\JobService;
use App\Traits\Cacheable;
use Illuminate\Support\Facades\Cache;

class JobController extends Controller
{
    use Cacheable;
    protected $cacheTag = 'jobs';


    public function __construct(
        private LargeFormatJobService $largeFormatJobService,
        private EmbroideryJobService $embroideryJobService,
        private DesignJobService $designJobService,
        private PressJobService $pressJobService
    ){}


    public function todaysJobs()
    {
        // $largeFormatJobService = new LargeFormatJobService();
        // $embroideryJobService = new EmbroideryJobService();
        // $designJobsService = new DesignJobService();
        // $pressJobService = new PressJobService();

        $todays_largeformat_jobs = $this->largeFormatJobService->getTodaysJobs();
        $todays_embroidery_jobs = $this->embroideryJobService->getTodaysJobs();
        $todays_press_jobs = $this->pressJobService->getTodaysPressJobs();
        $todays_design_jobs = $this->designJobService->getTodaysJobs();
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
