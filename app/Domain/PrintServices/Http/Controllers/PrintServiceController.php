<?php

namespace App\Domain\PrintServices\Http\Controllers;

use App\Domain\PrintServices\Models\PrintService;
use App\Domain\PrintServices\Services\ServiceCategoryHandler;
use App\Domain\PrintServices\Services\ServiceHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\PrintServices\StoreNewPrintServiceRequest;
use App\Models\Services\Service;
use App\Traits\HandleResourceActions;
use Illuminate\Http\RedirectResponse;

class PrintServiceController extends Controller
{

    use HandleResourceActions;


    /**
     * Create a new class instance
     */
    public function __construct(
        private readonly ServiceHandler $serviceHandler,
        private readonly ServiceCategoryHandler $serviceCategoryHandler,
        protected $model = new PrintService(),
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.services.services', [
            'printServiceCategories' => $this->serviceCategoryHandler->getAll(),
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewPrintServiceRequest $request)
    {
        $data = $request->toData();
        $service = $this->serviceHandler->createNewService($data);

        return redirect()->back()->with('success', 'Service Created Successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PrintService $printService)
    {

        return view('app.services.modals.edit-service-modal', [
            'printService' => $printService,
            'printServiceCategories' => $this->serviceCategoryHandler->getAll(),
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(StoreNewPrintServiceRequest $request, PrintService $printService)
    {
        $data = $request->toData();

        $this->serviceHandler->updateService($printService,$data);
        return redirect()->back()->with('success', 'Service information updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrintService $printService): RedirectResponse
    {
        $this->serviceHandler->deleteService($printService);
        return redirect()->back()->with('success', 'Service Deleted Successfully');
    }
}
