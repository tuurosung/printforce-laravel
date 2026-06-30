<?php

namespace App\Domain\PrintJobs\Http\Controllers;

use App\Domain\PrintJobs\Models\PrintforceJob;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TodaysJobsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $allJobs = PrintforceJob::limit(100)->get(); //TODO Add a service to handle this

        $statistics = [
            'total' => $allJobs->sum('total'),
            'todays_jobs_total' => $allJobs->where('created_at', today())->count(),
        ];

        return view('app.job.todays-jobs', [
            'allJobs' => $allJobs,
            'statistics' => $statistics
        ]);
    }
}
