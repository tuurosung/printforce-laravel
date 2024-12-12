<?php

namespace App\Http\Controllers\Jobs;

use Illuminate\Http\Request;
use App\Models\Jobs\DesignJob;
use App\Http\Controllers\Controller;

class DesignJobController extends Controller
{
    private $designJob;

    public function __construct()
    {
        $this->designJob = new DesignJob();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = DesignJob::with('customer', 'service')
            ->latest()->take(100)->get();

        return view('app.job.design-jobs', compact('jobs'));
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
            'unit_cost' => 'required',
            'copies' => 'required',
            'total' => 'required',
            'notes' => 'nullable',
        ]);

        $create_job = $this->designJob->create($data);

        return $create_job
            ? redirect()->back()->with('success', 'Job created successfully')
            : redirect()->back()->with('error', 'Ooops! Something went wrong on our side');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $job_id)
    {
        $designJob = DesignJob::find($job_id);

        if (is_null($designJob)) {
            return abort(404);
        }

        return view('app.job.modals.design-jobcard', compact('designJob'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DesignJob $designJob)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DesignJob $designJob)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $job_id)
    {
        $designJob = DesignJob::find($job_id);

        if (is_null($designJob)) {
            return abort(404);
        }

        $deleted = $designJob->delete();

        return $deleted
            ? redirect()->back()->with('success', 'Job deleted successfully')
            : redirect()->back()->with('error', 'Ooops! Something went wrong on our side');
    }
}
