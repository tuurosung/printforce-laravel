<?php

namespace App\Domain\PrintJobs\Http\Controllers\LargeFormat;

use App\Domain\PrintJobs\Services\LargeFormatJobService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FilterLargeFormatJobsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $largeFormatJobService = new LargeFormatJobService();

        $largeFormatJobs = $largeFormatJobService->getLargeFormatJobsByDateRange($start_date, $end_date);

        $start_date = \Carbon\Carbon::parse($start_date)->format('M d, Y');
        $end_date = \Carbon\Carbon::parse($end_date)->format('M d, Y');

        $title = "Large Format Jobs from {$start_date} to {$end_date}";

        return view('app.job.largeformat.filter-largeformatjobs', [
            'jobs' => $largeFormatJobs,
            'title' => $title,
        ]);
    }
}
