<?php

namespace App\Http\Controllers\Jobs;

use Illuminate\Http\Request;
use App\Models\Jobs\PressJob;
use App\Http\Controllers\Controller;

class PressJobController extends Controller
{
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
    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_id' => 'required',
            'service_id' => 'required',
            'cost' => 'required',
            'copies' => 'required',
            'total' => 'required',
            'notes' => 'nullable',
        ]);

        $create_job = PressJob::create($data);

        return $create_job
            ? redirect()->back()->with('success', 'Job created successfully')
            : redirect()->back()->with('error', 'Job creation failed');
    }

    /**
     * Display the specified resource.
     */
    public function show(PressJob $pressJob)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PressJob $pressJob)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PressJob $pressJob)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PressJob $pressJob)
    {
        //
    }
}
