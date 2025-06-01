<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AllJobsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('app.job.all-jobs');
    }
}
