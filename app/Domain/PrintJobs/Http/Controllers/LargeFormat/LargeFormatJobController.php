<?php

namespace App\Domain\PrintJobs\Http\Controllers\LargeFormat;

use App\Domain\PrintJobs\Models\LargeFormatJob;
use App\Domain\PrintJobs\Services\LargeFormatJobService;
use App\Facades\PrintServices;
use App\Http\Controllers\Controller;
use App\Http\Requests\Jobs\StoreLargeFormatJobRequest;
use App\Models\Customers\Customer;
use App\Services\UserService;
use App\Traits\HandleResourceActions;

class LargeFormatJobController extends Controller
{

    use HandleResourceActions;

    public function  __construct(
        private LargeFormatJobService $largeFormatService,
        protected $model = new LargeFormatJob(),
        private $modelName = "Large Format Job",
        private $largeFormatJob = new LargeFormatJob(),
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $jobs = $this->largeFormatService->getLatestLargeFormatJobs();
        $statistics = $this->largeFormatService->getLargeFormatJobStatistics();

        $performanceSummary = $this->largeFormatService->performanceSummary();

        return view('app.job.largeformat.largeformat-jobs', [
            'jobs' => $jobs,
            'statistics' => $statistics,
            'users' => UserService::getTechnicalUsers(),
            'performanceSummary' => $performanceSummary,
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
    public function store(StoreLargeFormatJobRequest $request, Customer $customer)
    {
        $this->largeFormatService->create($customer, $request->validated());
        return redirect()->back()->with('success','Large Format Job Created Successfully');
    }



    /**
     * Display the specified resource.
     */
    public function show(LargeFormatJob $largeFormatJob)
    {

    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LargeFormatJob $largeFormatJob)
    {

        return view('app.job.largeformat.edit-largeformat', [
            'largeFormatJob' => $largeFormatJob,
            'largeformat_services' => PrintServices::getLargeFormatServices()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreLargeFormatJobRequest $request, LargeFormatJob $largeFormatJob)
    {
        return $this->handleUpdate($request, $largeFormatJob);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LargeFormatJob $largeFormatJob)
    {
        return $this->handleDelete($largeFormatJob);
    }

}
