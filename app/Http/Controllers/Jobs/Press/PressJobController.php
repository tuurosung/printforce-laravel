<?php

namespace App\Http\Controllers\Jobs\Press;

use Illuminate\Http\Request;
use App\Models\Jobs\PressJob;
use App\Facades\PrintServices;
use App\Models\Customers\Customer;
use App\Http\Controllers\Controller;
use App\Traits\HandleResourceActions;
use App\Services\Jobs\PressJobService;
use App\Http\Requests\Jobs\StoreNewPressJobRequest;

class PressJobController extends Controller
{

    use HandleResourceActions;

    /**
     * Create a new class instance.
     */
    public function __construct(
        protected $model = new PressJob(),
        private $modelName = 'Press Job',
        private $pressJobService = new PressJobService()
    ){}



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.job.press.press-jobs', [
            'jobs' => $this->pressJobService->getLatestPressJobs(),
            'statistics' => $this->pressJobService->getPressJobStatistics()
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
    public function store(StoreNewPressJobRequest $request, Customer $customer)
    {
        $data = $request->validated() + [
            'customer_id' => $customer->customer_id,
        ];

        return $this->handleStore($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $job_id)
    {
        $pressJob = PressJob::find($job_id);

        if (is_null($pressJob)) {
            return abort(404);
        }

        return view('app.job.modals.press-jobcard', compact('pressJob'));
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
        return $this->handleUpdate($request, $pressJob);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PressJob $pressJob)
    {
        return $this->handleDelete($pressJob);
    }
}
