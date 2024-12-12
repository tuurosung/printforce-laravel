<?php

namespace App\Http\Controllers\Jobs;

use Illuminate\Http\Request;
use App\Models\Jobs\LargeFormatJob;
use App\Http\Controllers\Controller;

class LargeFormatJobController extends Controller
{
    private $largeFormatJob;

    public function  __construct() {
        $this->largeFormatJob = new LargeFormatJob();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $jobs = LargeFormatJob::with('customer', 'service')
            ->latest()->take(100)->get();

        return view('app.job.largeformat-jobs', compact('jobs'));
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
    public function store(Request $request)
    {

        $data = $request->validate([
           'customer_id' => 'required',
           'service_id' => 'required',
           'cost' => 'required',
           'measuring_unit' => 'required',
           'discount' => 'required',
           'premium' => 'required',
           'width' => 'required',
           'height' => 'required',
           'copies' => 'required|numeric',
           'total' => 'required|numeric',
           'notes' => 'nullable',
        ]);

        $create_job = $this->largeFormatJob->create($data);

        return $create_job
            ? redirect()->back()->with('success', 'Job created successfully')
            : redirect()->back()->with('error', 'Ooops! Something went wrong on our side');

    }



    /**
     * Display the specified resource.
     */
    public function show(string $job_id)
    {
        $largeFormatJob = LargeFormatJob::find($job_id);

        if (is_null($largeFormatJob)) {

            return redirect()->back()->with('error', 'Job not found');
        }

        return view('app.job.modals.largeformat-jobcard', compact('largeFormatJob'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LargeFormatJob $largeFormatJob)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LargeFormatJob $largeFormatJob)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $job_id)
    {
        $largeFormatJob = LargeFormatJob::find($job_id);

        if (is_null($largeFormatJob)) {

            return redirect()->back()->with('error', 'Job not found');
        }

        $deleted = $largeFormatJob->delete();

        return $deleted
            ? redirect()->back()->with('success', 'Bingo! Job deleted successfully')
            : redirect()->back()->with('error', 'Ooops! Something went wrong on our side');
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
