<?php

namespace App\Domain\PrintJobs\Http\Controllers\Embroidery;

use App\Domain\PrintJobs\Models\EmbroideryJob;
use App\Domain\PrintJobs\Services\EmbroideryJobService;
use App\Facades\PrintServices;
use App\Http\Controllers\Controller;
use App\Http\Requests\Jobs\StoreEmbroideryJobRequest;
use App\Models\Customers\Customer;
use App\Traits\HandleResourceActions;

class EmbroideryJobController extends Controller
{

    use HandleResourceActions;

    public function __construct(
        protected EmbroideryJob $model,
        private EmbroideryJobService $embroideryJobService
    ){}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'jobs' => $this->embroideryJobService->getRecentJobs(),
            'performanceSummary' => $this->embroideryJobService->performanceSummary(),
            'statistics' => $this->embroideryJobService->getEmbroideryJobStatistics(),
        ];

        return view('app.job.embroidery.embroidery-jobs', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmbroideryJobRequest $request, Customer $customer)
    {
        $this->embroideryJobService->create(
            $customer, $request->validated()
        );

        return redirect()->back()->with('success','Embroidery Job Created Successfully');
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
        return view('app.job.embroidery.edit-embroidery', [
            'embroideryJob' => $embroideryJob,
            'embroidery_services' => PrintServices::getEmbroideryServices(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreEmbroideryJobRequest $request, EmbroideryJob $embroideryJob)
    {
        return $this->embroideryJobService->update(
            $embroideryJob, $request->validated()
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmbroideryJob $embroideryJob)
    {
       return $this->embroideryJobService->delete($embroideryJob);
    }
}
