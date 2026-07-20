<?php

namespace App\Domain\PrintJobs\Http\Controllers;

use App\Domain\PrintJobs\Models\PrintforceJob;
use App\Domain\PrintJobs\Services\PrintJobService;
use App\Domain\Users\Services\UserService;
use App\Http\Controllers\Controller;
use App\Models\User;

class ViewJobController extends Controller
{

    public function __construct(
        private PrintJobService $printJobService,
        private UserService $userService
    ) {}

    /**
     * Handle the incoming request.
     */
    public function __invoke(PrintforceJob $printforceJob)
    {
        // dd($printforceJob);
        $users = User::technicalUsers()->get();

        return view('app.job.view-job', [
            'job' => $printforceJob,
            'users' => $users
        ]);
    }
}
