<?php

namespace App\Domain\PrintJobs\Http\Controllers;

use App\Domain\PrintJobs\Http\Requests\StoreOtherJobRequest;
use App\Domain\PrintJobs\Services\OtherJobService;
use App\Domain\PrintJobs\Services\PrintJobService;
use App\Http\Controllers\Controller;
use App\Models\Customers\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OtherJobController extends Controller
{
    public function __construct(
        private readonly OtherJobService $otherJobService
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
    public function store(StoreOtherJobRequest $request, Customer $customer)
    {
        $otherJob = $this->otherJobService->createJob(
            $customer, $request->validated()
        );

        if (! $otherJob) {
            Log::error("Unable to create job");
            return redirect()->back()->with("error","Error recording job");
        }

        return redirect()->back()->with("success","Job Created Successfully");
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
    public function destroy(string $id)
    {
        //
    }
}
