<?php

namespace App\Domain\PrintJobs\Http\Controllers\Design;

use App\Domain\PrintJobs\Models\DesignJob;
use App\Domain\PrintJobs\Services\DesignJobService;
use App\Facades\PrintServices;
use App\Http\Controllers\Controller;
use App\Http\Requests\Jobs\StoreNewDesignRequest;
use App\Models\Customers\Customer;
use App\Traits\HandleResourceActions;

class DesignJobController extends Controller
{

    use HandleResourceActions;

    private $designJob;

    public function __construct(
        private DesignJobService $designJobService,
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.job.design.design-jobs', [
            'jobs' => $this->designJobService->getLatestDesignJobs(),
            'statistics' => $this->designJobService->getDesignJobStatistics()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewDesignRequest $request, Customer $customer)
    {
        $this->designJobService->create($customer, $request->validated());
        return redirect()->back()->with('success','Design job created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(DesignJob $designJob)
    {
        return view('app.job.modals.design-jobcard', compact('designJob'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DesignJob $designJob)
    {
        return view('app.job.design.edit-design-job', [
            'designJob' => $designJob,
            'design_services' => PrintServices::getDesignServices()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreNewDesignRequest $request, DesignJob $designJob)
    {
        $this->designJobService->update($designJob, $request->validated());
        return redirect()->back()->with('success', 'Design job deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DesignJob $designJob)
    {
        $this->designJobService->delete($designJob);
        return redirect()->back()->with('success','Design job deleted successfully');
    }
}
