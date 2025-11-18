<?php

namespace App\Http\Controllers\Jobs;

use Illuminate\Http\Request;
use App\Models\Jobs\PressJob;
use App\Services\UserService;
use App\Models\Jobs\DesignJob;
use App\Services\Jobs\JobService;
use App\Models\Jobs\EmbroideryJob;
use App\Models\Jobs\LargeFormatJob;
use App\Models\Jobs\PhotographyJob;
use App\Http\Controllers\Controller;

class AssignJobController extends Controller
{

    public function load(string $job_id, string $category_id)
    {
        $users = UserService::getTechnicalUsers();

        return view('app.job.modals.assign-job-modal', [
            'job_id' => $job_id,
            'users' => $users,
            'category_id' => $category_id
        ]);
    }


    public function assign(Request $request)
    {
        $job_id = $request->input('job_id');
        $category_id = $request->input('category_id');
        $user_id = $request->input('user_id');

       $isAssigned = $this->switcher($category_id, $job_id, $user_id);

        if (!$isAssigned) {

            return response()->json([
                'status' => 'error',
                'message' => 'Job could not be assigned'
            ], 400);

        }

        return response()->json([
            'status' => 'success',
            'message' => 'Job assigned successfully'
        ], 200);
    }


    private function switcher(string $category_id, string $job_id, string $user_id)
    {
        if ($category_id === '001') {
            return $this->updateLargeFormatJob($job_id, $user_id);
        }elseif ($category_id === '002') {
            return $this->updateDesignJob($job_id, $user_id);
        }elseif ($category_id === '003') {
            return $this->updateEmbroideryJob($job_id, $user_id);
        }elseif ($category_id === '004') {
            return $this->updatePressJob($job_id, $user_id);
        }elseif ($category_id === '005') {
            return $this->updatePhotographyJob($job_id, $user_id);
        }

        return false;
    }


    private function updateLargeFormatJob(string $job_id, string $user_id)
    {
        return LargeFormatJob::where('job_id', $job_id)
            ->update([
                'job_assigned_to' => $user_id,
                'job_assigned_at' => now()
            ]);
    }


    private function updateEmbroideryJob(string $job_id, string $user_id)
    {
        return EmbroideryJob::where('job_id', $job_id)
            ->update([
                'job_assigned_to' => $user_id,
                'job_assigned_at' => now()
            ]);
    }

    private function updateDesignJob(string $job_id, string $user_id)
    {
        return DesignJob::where('job_id', $job_id)
            ->update([
                'job_assigned_to' => $user_id,
                'job_assigned_at' => now()
            ]);
    }


    private function updatePressJob(string $job_id, string $user_id)
    {
        return PressJob::where('job_id', $job_id)
            ->update([
                'job_assigned_to' => $user_id,
                'job_assigned_at' => now()
            ]);
    }


    private function updatePhotographyJob(string $job_id, string $user_id)
    {
        return PhotographyJob::where('job_id', $job_id)
            ->update([
                'job_assigned_to' => $user_id,
                'job_assigned_at' => now()
            ]);
    }
}
