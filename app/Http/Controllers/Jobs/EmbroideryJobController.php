<?php

namespace App\Http\Controllers\Jobs;

use Illuminate\Http\Request;
use App\Models\Jobs\EmbroideryJob;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EmbroideryJobController extends Controller
{

    private $embroideryJob;


    public function __construct()
    {
        $this->embroideryJob = new EmbroideryJob();
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = EmbroideryJob::with('customer', 'service')
            ->latest()->take(100)->get();

        return view('app.job.embroidery-jobs', compact('jobs'));
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
            'qty' => 'required',
            'embroidery_cost' => 'required',
            'mat_supply' => 'required',
            'mat_unit_cost' => 'required',
            'purchase_cost' => 'required',
            'total' => 'required',
            'notes' => 'nullable',
        ]);

        $create_job = $this->embroideryJob->create($data);

        return $create_job
            ? redirect()->back()->with('success', "Embroidery Job Created Successfully")
            : redirect()->back()->with('error', "Embroidery Job Creation Failed");
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmbroideryJob $embroideryJob)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $job_id)
    {
        $embroideryJob = EmbroideryJob::find($job_id);

        if (is_null($embroideryJob)) {
            return abort(404);
        }

        $deleted = $embroideryJob->delete();

        return $deleted
            ? redirect()->back()->with('success', "Embroidery Job Deleted Successfully")
            : redirect()->back()->with('error', "Embroidery Job Deletion Failed");
    }
}
