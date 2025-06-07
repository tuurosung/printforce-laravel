<?php

namespace App\Http\Controllers\Jobs;

use Illuminate\Http\Request;
use App\Facades\PrintServices;
use App\Models\Customers\Customer;
use App\Models\Jobs\LargeFormatJob;
use App\Http\Controllers\Controller;
use App\Traits\HandleResourceActions;
use PHPUnit\Framework\Attributes\Large;
use App\Services\Jobs\LargeFormatJobService;
use App\Helpers\JobHelpers\LargeFormatJobHelpers;
use App\Http\Requests\Jobs\StoreLargeFormatJobRequest;
use App\Http\Requests\Jobs\CreateLargeFormatJobRequest;

class LargeFormatJobController extends Controller
{

    use HandleResourceActions;

    public function  __construct(
        protected $model = new LargeFormatJob(),
        private $modelName = "Large Format Job",
        private $largeFormatJob = new LargeFormatJob(),
        private $largeFormatService = new LargeFormatJobService()
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $jobs = $this->largeFormatService->getLatestLargeFormatJobs();
        $statistics = $this->largeFormatService->getLargeFormatJobStatistics();

        // $thisMonthsRevenue = LargeFormatJob::sumLargeFormatJobsThisMonth();

        // $thisMonthsRevenueContribution = LargeFormatJobHelpers::monthlyRevenueContribution();

        $performanceSummary = $this->largeFormatService->performanceSummary();

        return view('app.job.largeformat.largeformat-jobs', [
            'jobs' => $jobs,
            'statistics' => $statistics,
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

        $data = $request->validated() + [
            'customer_id' => $customer->customer_id
        ];

        return $this->handleStore($data);
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


    public function filterJobs(Request $request)
    {

        $filtered_jobs = LargeFormatJob::with('customer', 'service')
            ->whereBetween('date', [$request->start_date, $request->end_date])
            ->latest()
            ->get();

        return view('app.job.largeformat.filter-largeformatjobs', compact('filtered_jobs'));
    }
}
