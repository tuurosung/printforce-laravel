<?php

namespace App\Http\Controllers\Jobs;

use App\Services\Jobs\EmbroideryJobService;
use App\Services\Jobs\LargeFormatJobService;
use App\Services\Jobs\PressJobService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\JobHelpers\PressJobHelpers;
use App\Helpers\JobHelpers\DesignJobHelpers;
use App\Helpers\JobHelpers\EmbroideryJobHelpers;
use App\Helpers\JobHelpers\LargeFormatJobHelpers;
use App\Helpers\JobHelpers\PhotographyJobHelpers;
use App\Services\Jobs\DesignJobService;

class TodaysJobsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $largeFormatJobService = new LargeFormatJobService();
        $embroideryJobService = new EmbroideryJobService();
        $designJobsService = new DesignJobService();
        $pressJobService = new PressJobService();

        $todays_largeformat_jobs = $largeFormatJobService->getTodaysJobs();
        $todays_embroidery_jobs =$embroideryJobService->getTodaysJobs();
        $todays_press_jobs = $pressJobService->getTodaysPressJobs();
        $todays_design_jobs = $designJobsService->getTodaysJobs();
        $todays_photography_jobs = PhotographyJobHelpers::getTodaysJobs();

        return view('app.job.todays-jobs', [
            'todays_largeformat_jobs' => $todays_largeformat_jobs,
            'todays_embroidery_jobs' => $todays_embroidery_jobs,
            'todays_press_jobs' => $todays_press_jobs,
            'todays_design_jobs' => $todays_design_jobs,
            'todays_photography_jobs' => $todays_photography_jobs
        ]);
    }
}
