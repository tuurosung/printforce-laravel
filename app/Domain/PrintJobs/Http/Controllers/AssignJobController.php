<?php

namespace App\Domain\PrintJobs\Http\Controllers;

use App\Domain\PrintJobs\Http\Requests\StoreAssignJobRequest;
use App\Domain\PrintJobs\Services\PrintJobService;
use App\Http\Controllers\Controller;
use App\Services\UserService;
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


    public function assign(StoreAssignJobRequest $request)
    {
        $data = $request->validated();

        $result = $this->printJobService->assignJob($data['job_id'], $data['job_type'], $data['user_id']);

        if (!$result) {
            return redirect()->back()->with('error', 'Failed to assign job');
        }

        return redirect()->back()->with('success', 'Job assigned successfully');
    }

}
