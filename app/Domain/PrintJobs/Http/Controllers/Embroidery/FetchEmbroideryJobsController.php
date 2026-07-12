<?php

namespace App\Domain\PrintJobs\Http\Controllers\Embroidery;

use App\Http\Controllers\Controller;
use App\Services\Jobs\EmbroideryJobService;
use Illuminate\Http\Request;

class FetchEmbroideryJobsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('app.job.embroidery.data.load-embroideryjobs', [
            'jobs' => (new EmbroideryJobService())->getRecentJobs(),
        ]);
    }
}
