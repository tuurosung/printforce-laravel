<?php

namespace App\Domain\PrintJobs\Http\Controllers;

use App\Domain\PrintJobs\Http\Requests\StorePrintJobRequest;
use App\Domain\PrintJobs\Models\PrintforceJob;
use App\Domain\PrintJobs\Services\PrintJobService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrintJobController extends Controller
{

    public function __construct(
        private readonly PrintJobService $printjobService
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StorePrintJobRequest $request)
    {
        // dd($request->toData()->toArray());
        $this->printjobService->createNewJob($request->toData());
        return redirect()->back()->with("success", "Job Registered Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrintforceJob $printforceJob)
    {
        $this->printjobService->deleteJob($printforceJob);
        return to_route('jobs.today')->with("success", "Job Deleted Successfully");
    }
}
