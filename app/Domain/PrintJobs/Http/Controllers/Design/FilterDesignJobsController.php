<?php

namespace App\Domain\PrintJobs\Http\Controllers\Design;

use App\Domain\PrintJobs\Services\DesignJobService;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FilterDesignJobsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $designJobService = new DesignJobService();

        $designJobs = $designJobService->getDesignJobsByDateRange($start_date, $end_date);

        $start_date = Carbon::parse($start_date)->format('M d, Y');
        $end_date = Carbon::parse($end_date)->format('M d, Y');

        $title = "Design Jobs from {$start_date} to {$end_date}";
        return view('app.job.design.filter-design-jobs', [
            'jobs' => $designJobs,
            'title' => $title,
        ]);
    }
}
