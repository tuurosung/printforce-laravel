<?php

namespace App\Domain\PrintJobs\Http\Controllers;

use App\Domain\Customers\Services\CustomerService;
use App\Domain\PrintJobs\Models\PrintforceJob;
use App\Domain\PrintJobs\Services\PrintJobService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TodaysJobsController extends Controller
{

    public function __construct(
        public PrintJobService $printJobService,
        private CustomerService $customerService
    ){}


    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $recentJobs = $this->printJobService->recentJobs();

        $statistics = [
            'total' => $recentJobs->sum('total'),
            'todays_jobs_total' => $recentJobs->where('created_at', today())->count(),
        ];

        return view('app.job.todays-jobs', [
            'allJobs' => $recentJobs,
            'statistics' => $statistics,
            'customers' => $this->customerService->getCustomersArray(),
        ]);
    }
}
