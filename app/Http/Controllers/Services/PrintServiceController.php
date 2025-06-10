<?php

namespace App\Http\Controllers\Services;

use App\Traits\HandleResourceActions;
use Illuminate\Http\Request;
use App\Facades\PrintServices;
use App\Models\Services\Service;
use App\Http\Controllers\Controller;
use App\Models\Services\PrintService;
use App\Models\Services\ServiceCategory;
use App\Models\Services\PrintServiceCategory;

class PrintServiceController extends Controller
{

    use HandleResourceActions;

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
    public function store(Request $request)
    {
        // validate request
        $data = $request->validate([
            'service_name' => 'required',
            'category_id' => 'required',
            'individual' => 'required|numeric',
            'artist' => 'required|numeric',
            'institution' => 'required|numeric',
        ]);

        $is_created = PrintService::create($data);

        return $is_created
            ? redirect()->back()->with('success', "Bingo! Service created successfully")
            : redirect()->back()->with('error', "Ooops! Something went wrong on our side");
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
    public function update(Request $request)
    {
        // validate request
        $data = $request->validate([
            'service_id' => 'required',
            'service_name' => 'required',
            'category_id' => 'required',
            'individual' => 'required|numeric',
            'artist' => 'required|numeric',
            'institution' => 'required|numeric',
        ]);

        // find service
        $service = Service::find($data['service_id']);

        // update
        $is_updated = $service->update($data);

        return $is_updated
            ? redirect()->back()->with('success', "Bingo! Service updated successfully")
            : redirect()->back()->with('error', "Ooops! Something went wrong on our side");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrintService $printService)
    {
        if ($printService->delete()) {
            return redirect()->back()->with('success', "Bingo! Service deleted successfully");
        }

        return redirect()->back()->with('error', "Ooops! Something went wrong on our side");
    }

}
