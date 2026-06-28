<?php

namespace App\Domain\PrintJobs\Http\Controllers\Press;

use App\Domain\PrintJobs\Models\PressJob;
use App\Domain\PrintJobs\Services\PressJobService;
use App\Facades\PrintServices;
use App\Http\Controllers\Controller;
use App\Http\Requests\Jobs\StoreNewPressJobRequest;
use App\Models\Customers\Customer;

class PressJobController extends Controller
{

    /**
     * Create a new class instance.
     */
    public function __construct(
        private PressJobService $pressJobService
    ){}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('app.job.press.press-jobs', [
        //     'jobs' => $this->pressJobService->getLatestPressJobs(),
        //     'statistics' => $this->pressJobService->getPressJobStatistics()
        // ]);
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
    public function store(StoreNewPressJobRequest $request, Customer $customer)
    {
        $this->pressJobService->create($customer, $request->validated());
        return redirect()->back()->with('success', "Press Job created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(PressJob $pressJob)
    {
        return view('app.job.modals.press-jobcard', [
            'pressJob' => $pressJob
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PressJob $pressJob)
    {
        return view('app.job.press.edit-press-job', [
            'pressJob' => $pressJob,
            'press_services' => PrintServices::getPressServices()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreNewPressJobRequest $request, PressJob $pressJob)
    {
        $this->pressJobService->update($pressJob, $request->validated());
        return redirect()->back()->with("succes", "Press Job updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PressJob $pressJob)
    {
        $this->pressJobService->delete($pressJob);
        return redirect()->back()->with("success","Press Job deleted successfully");
    }
}
