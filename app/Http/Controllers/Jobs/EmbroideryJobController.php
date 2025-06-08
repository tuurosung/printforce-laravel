<?php

namespace App\Http\Controllers\Jobs;

use App\Facades\PrintServices;
use App\Services\Jobs\EmbroideryJobService;
use Illuminate\Http\Request;
use App\Models\Customers\Customer;
use App\Models\Jobs\EmbroideryJob;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Traits\HandleResourceActions;
use App\Helpers\JobHelpers\EmbroideryJobHelpers;
use App\Http\Requests\Jobs\StoreEmbroideryJobRequest;
use App\Http\Requests\Jobs\CreateEmbroideryJobRequest;
use App\Models\Services\PrintService;

class EmbroideryJobController extends Controller
{

    use HandleResourceActions;

    public function __construct(
        protected $model = new EmbroideryJob(),
        private $modelName = 'Embroidery Job',
        private $embroiderJob = new EmbroideryJob(),
        private $embroideryJobService = new EmbroideryJobService()
    )
    {
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'jobs' => $this->embroideryJobService->getRecentJobs(),
            'thisMonthsRevenue' => EmbroideryJob::sumEmbroideryJobsThisMonth(),
            'thisMonthsRevenueContribution' => $this->embroideryJobService->monthyRevenueContribution(),
            'performanceSummary' => $this->embroideryJobService->performanceSummary()
        ];

        return view('app.job.embroidery.embroidery-jobs', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmbroideryJobRequest $request, Customer $customer)
    {
        $data = $request->validated() + [
            'customer_id' => $customer->customer_id,
        ];

        return $this->handleStore($data);
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
        return $this->handleUpdate($request, $embroideryJob);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmbroideryJob $embroideryJob)
    {
       return $this->handleDelete($embroideryJob);
    }
}
