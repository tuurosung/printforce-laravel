<?php

namespace App\Http\Controllers\Jobs;

use App\Helpers\JobHelpers\EmbroideryJobHelpers;
use Illuminate\Http\Request;
use App\Models\Jobs\EmbroideryJob;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Jobs\CreateEmbroideryJobRequest;

class EmbroideryJobController extends Controller
{

    public function __construct(
        private $embroiderJob = new EmbroideryJob()
    )
    {
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'jobs' => EmbroideryJobHelpers::getTodaysJobs(),
            'thisMonthsRevenue' => EmbroideryJob::sumEmbroideryJobsThisMonth(),
            'thisMonthsRevenueContribution' => EmbroideryJobHelpers::monthyRevenueContribution(),
            'performanceSummary' => EmbroideryJobHelpers::performanceSummary()
        ];

        return view('app.job.embroidery-jobs', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEmbroideryJobRequest $request)
    {

        $data = $request->validated();

        $create_job = $this->embroideryJob->create($data);

        return $create_job
            ? redirect()->back()->with('success', "Embroidery Job Created Successfully")
            : redirect()->back()->with('error', "Embroidery Job Creation Failed");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $job_id)
    {
        $embroideryJob = EmbroideryJob::find($job_id);

        if (is_null($embroideryJob)) {
            return abort(404);
        }

        return view('app.job.modals.embroidery-jobcard', compact('embroideryJob'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmbroideryJob $embroideryJob)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmbroideryJob $embroideryJob)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $job_id)
    {
        $embroideryJob = EmbroideryJob::find($job_id);

        if (is_null($embroideryJob)) {
            return abort(404);
        }

        $deleted = $embroideryJob->delete();

        return $deleted
            ? redirect()->back()->with('success', "Embroidery Job Deleted Successfully")
            : redirect()->back()->with('error', "Embroidery Job Deletion Failed");
    }
}
