<?php

namespace App\Domain\PrintJobs\Http\Controllers\Press;

use App\Domain\PrintJobs\Services\PressJobService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FilterPressJobController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $pressJobService = new PressJobService();

        $jobs = $pressJobService->getPressJobsByDateRange($start_date, $end_date);

        $start_date = \Carbon\Carbon::parse($start_date)->format('M d, Y');
        $end_date = \Carbon\Carbon::parse($end_date)->format('M d, Y');

        $title = 'Press Jobs from ' . $start_date . ' to ' . $end_date;
        return view('app.job.press.filter-press-jobs', [
            'jobs' => $jobs,
            'title' => $title,
        ]);
    }
}
