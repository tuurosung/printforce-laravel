<?php

namespace App\Http\Controllers\Jobs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\JobHelpers\PressJobHelpers;
use App\Helpers\JobHelpers\DesignJobHelpers;
use App\Helpers\JobHelpers\EmbroideryJobHelpers;
use App\Helpers\JobHelpers\LargeFormatJobHelpers;
use App\Helpers\JobHelpers\PhotographyJobHelpers;

class TodaysJobsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $todays_largeformat_jobs = LargeFormatJobHelpers::getTodaysJobs();
        $todays_embroidery_jobs = EmbroideryJobHelpers::getTodaysJobs();
        $todays_press_jobs = PressJobHelpers::getTodaysJobs();
        $todays_design_jobs = DesignJobHelpers::getTodaysJobs();
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
