<?php

namespace App\Domain\PrintJobs\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TodaysJobsController extends Controller
{

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('app.job.todays-jobs');
    }
}
