<?php

namespace App\Domain\PrintJobs\Http\Controllers\LargeFormat;

use App\Domain\PrintJobs\Services\LargeFormatJobService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FetchLargeFormatJobsController extends Controller
{

    public function __construct(
        private $largeFormatService = new LargeFormatJobService()
    ){}


    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('app.job.largeformat.data.load-largeformatjobs', [
            'jobs' => $this->largeFormatService->getLatestLargeFormatJobs(),
        ]);
    }
}
