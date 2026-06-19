<?php

namespace App\Domain\PrintServices\Http\Controllers;

use App\Domain\PrintServices\Models\PrintService;
use App\Domain\PrintServices\Services\PrintServicesHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\PrintServices\StoreNewPrintServiceRequest;
use App\Models\Services\Service;
use App\Traits\HandleResourceActions;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class PrintServiceController extends Controller
{

    use HandleResourceActions;


    /**
     * Create a new class instance
     */
    public function __construct(
        private readonly PrintServicesHandler $printServicesHandler,
        protected $model = new PrintService(),
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $printServiceCategories = PrintServiceCategory::with('services')
        //     ->get();

        $printServiceCategories = $this->printServicesHandler->getServiceCategories();

        return view('app.services.services', [
            'printServiceCategories' => $printServiceCategories,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewPrintServiceRequest $request)
    {
        try {

            $this->printServicesHandler->createService(
                $request->validated()
            );

            return redirect()->back()->with('success','Service Created Successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
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
        $printServiceCategories = $this->printServicesHandler->getServiceCategories();

        return view('app.services.modals.edit-service-modal', [
            'printService' => $printService,
            'printServiceCategories' => $printServiceCategories,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(StoreNewPrintServiceRequest $request, PrintService $printService)
    {
        try {

            $this->printServicesHandler->updateService(
                $printService, $request->validated()
            );

            return redirect()->back()->with('success','Service information updated successfully');

        } catch (\Exception $e) {

            Log::error($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrintService $printService): RedirectResponse
    {

        try {

            $this->printServicesHandler->deleteService(
                $printService
            );

            return redirect()->back()->with('success','Service Deleted Successfully');

        } catch (\Exception $e) {

            Log::error($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());

        }
    }
}
