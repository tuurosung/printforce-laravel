<?php

namespace App\Http\Controllers\Jobs;

use Illuminate\Http\Request;
use App\Models\Jobs\PressJob;
use App\Models\Jobs\DesignJob;
use App\Models\Jobs\EmbroideryJob;
use App\Models\Jobs\LargeFormatJob;
use App\Models\Jobs\PhotographyJob;
use App\Http\Controllers\Controller;

class JobStatusController extends Controller
{
    public function load(string $job_id, string $category_id)
    {
        return view('app.job.modals.update-jobstatus-modal', [
            'job_id' => $job_id,
            'category_id' => $category_id
        ]);
    }


    public function update(Request $request)
    {
        $job_id = $request->input('job_id');
        $category_id = $request->input('category_id');
        $job_status = $request->input('job_status');

         $isUpdated = $this->switcher($category_id, $job_id, $job_status);

         if (!$isUpdated) {

            return response()->json([
                'status' => 'error',
                'message' => 'Job status could not be updated'
            ], 400);
         }

        return response()->json([
            'status' => 'success',
            'message' => 'Job status updated successfully'
        ], 200);
    }


    private function switcher(string $category_id, string $job_id, string $job_status)
    {
        if ($category_id === '001') {
            return $this->updateLargeFormatJob($job_id, $job_status);
        }elseif ($category_id === '002') {
            return $this->updateDesignJob($job_id, $job_status);
        }elseif ($category_id === '003') {
            return $this->updateEmbroideryJob($job_id, $job_status);
        }elseif ($category_id === '004') {
            return $this->updatePressJob($job_id, $job_status);
        }elseif ($category_id === '005') {
            return $this->updatePhotographyJob($job_id, $job_status);
        }

        return false;
    }



    private function updateLargeFormatJob(string $job_id, string $job_status)
    {
        return LargeFormatJob::where('job_id', $job_id)
            ->update([
                'job_status' => $job_status,
            ]);
    }


    private function updateEmbroideryJob(string $job_id, string $job_status)
    {
        return EmbroideryJob::where('job_id', $job_id)
            ->update([
                'job_status' => $job_status,
            ]);
    }

    private function updateDesignJob(string $job_id, string $job_status)
    {
        return DesignJob::where('job_id', $job_id)
            ->update([
                'job_status' => $job_status,
            ]);
    }


    private function updatePressJob(string $job_id, string $job_status)
    {
        return PressJob::where('job_id', $job_id)
            ->update([
                'job_status' => $job_status,
            ]);
    }


    private function updatePhotographyJob(string $job_id, string $job_status)
    {
        return PhotographyJob::where('job_id', $job_id)
            ->update([
                'job_status' => $job_status,
            ]);
    }
}
