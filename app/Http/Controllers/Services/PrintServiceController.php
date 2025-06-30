<?php

namespace App\Http\Controllers\Services;

use App\Traits\HandleResourceActions;
use Illuminate\Http\Request;
use App\Facades\PrintServices;
use App\Models\Services\Service;
use App\Http\Controllers\Controller;
use App\Http\Requests\PrintServices\StoreNewPrintServiceRequest;
use App\Models\Services\PrintService;
use App\Models\Services\ServiceCategory;
use App\Models\Services\PrintServiceCategory;

class PrintServiceController extends Controller
{

    use HandleResourceActions;


    /**
     * Create a new class instance
     */
    public function __construct(
        protected $model = new PrintService(),
        private $modelName = 'Print Service',
        private $printService = new PrintService()
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $printServiceCategories = PrintServiceCategory::with('services')
            ->get();

        return view('app.services.services', [
            'printServiceCategories' => $printServiceCategories,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewPrintServiceRequest $request)
    {
        return $this->handleStore($request->validated());
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
        $printServiceCategories = PrintServiceCategory::all();

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
        return $this->handleUpdate($request, $printService);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrintService $printService)
    {
       return $this->handleDelete($printService);
    }
}
