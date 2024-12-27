<?php

namespace App\Http\Controllers\Services;

use App\Models\Services\Service;
use Illuminate\Http\Request;
use App\Models\Services\ServiceCategory;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::getAllServices();
        $serviceCategories = ServiceCategory::getAllCategories();


        return view('app.services.services', compact('services', 'serviceCategories'));
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

        $is_created = Service::create($data);

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
    public function edit(string $service_id)
    {
        $service = Service::find($service_id);

        if (is_null($service)) {
            return abort(404);
        }

        $serviceCategories = ServiceCategory::getAllCategories();

        return view('app.services.modals.edit-service-modal', compact('service', 'serviceCategories'));
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
    public function destroy(string $service_id)
    {
        // find service
        $service = Service::find($service_id);

        // set status to deleted
        $service->status = 'deleted';

        $is_deleted = $service->save();

        return $is_deleted
            ? redirect()->back()->with('success', "Bingo! Service deleted successfully")
            : redirect()->back()->with('error', "Ooops! Something went wrong on our side");

    }

}
