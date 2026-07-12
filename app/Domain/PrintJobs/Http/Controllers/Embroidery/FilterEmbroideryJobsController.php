<?php

namespace App\Domain\PrintJobs\Http\Controllers\Embroidery;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Jobs\EmbroideryJobService;

class FilterEmbroideryJobsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $embroideryJobService = new EmbroideryJobService();

        $embroideryJobs = $embroideryJobService->getEmbroideryJobsByDateRange($start_date, $end_date);

        $start_date = \Carbon\Carbon::parse($start_date)->format('M d, Y');
        $end_date = \Carbon\Carbon::parse($end_date)->format('M d, Y');

        $title = "Embroidery Jobs from {$start_date} to {$end_date}";

        return view('app.job.embroidery.data.filter-embroideryjobs', [
            'jobs' => $embroideryJobs,
            'title' => $title,
        ]);
    }
}
