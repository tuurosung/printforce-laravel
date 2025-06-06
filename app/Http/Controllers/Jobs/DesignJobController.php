<?php

namespace App\Http\Controllers\Jobs;

use App\Facades\PrintServices;
use Illuminate\Http\Request;
use App\Models\Jobs\DesignJob;
use App\Models\Customers\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Jobs\StoreNewDesignRequest;
use App\Traits\HandleResourceActions;
use App\Services\Jobs\DesignJobService;

class DesignJobController extends Controller
{

    use HandleResourceActions;

    private $designJob;

    public function __construct(
        protected $modelName = "Design Job",
        private $model = new DesignJob(),
        private $designJobService = new DesignJobService(),
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.job.design.design-jobs', [
            'jobs' => $this->designJobService->getLatestDesignJobs(),
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
    public function store(StoreNewDesignRequest $request, Customer $customer)
    {
        $data = $request->validated() + [
            'customer_id' => $customer->customer_id
        ];

        return $this->handleStore($data);
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
        return view('app.job.design.edit-design-job', [
            'designJob' => $designJob,
            'design_services' => PrintServices::getDesignServices()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreNewDesignRequest $request, DesignJob $designJob)
    {
        return $this->handleUpdate(
            $request, $designJob
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DesignJob $designJob)
    {
        return $this->handleDelete($designJob);
    }
}
