<?php

namespace App\Domain\PrintJobs\Http\Controllers;

use App\Domain\PrintJobs\Http\Requests\StoreAssignJobRequest;
use App\Domain\PrintJobs\Models\PrintforceJob;
use App\Domain\PrintJobs\Services\PrintJobService;
use App\Domain\Users\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssignJobController extends Controller
{

    public function __construct(
        private readonly PrintJobService $printJobService
    ) {}


    public function load(string $job_id, string $category_id)
    {
        $users = UserService::getTechnicalUsers();

        return view('app.job.modals.assign-job-modal', [
            'job_id' => $job_id,
            'users' => $users,
            'category_id' => $category_id
        ]);
    }


    public function assign(StoreAssignJobRequest $request, PrintforceJob $printforceJob)
    {
        $data = $request->validated();
        $userId = $data['user_id'];

        $result = $this->printJobService->assignJob($printforceJob, $userId);

        if (!$result) {
            return redirect()->back()->with('error', 'Failed to assign job');
        }

        return redirect()->back()->with('success', 'Job assigned successfully');
    }

}
