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

        $jobs = LargeFormatJob::with('customer')->take(10)->get();

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
    public function show(LargeFormatJob $largeFormatJob)
    {
        //
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
    public function destroy(LargeFormatJob $largeFormatJob)
    {
        //
    }
}
