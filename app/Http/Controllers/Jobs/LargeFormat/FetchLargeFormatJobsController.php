<?php

namespace App\Http\Controllers\Jobs\LargeFormat;

use App\Http\Controllers\Controller;
use App\Services\Jobs\LargeFormatJobService;
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
