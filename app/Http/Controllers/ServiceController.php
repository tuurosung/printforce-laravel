<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private $active_subscriber = '187635294';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_services = $this->getServices();

        $serviceCategories = ServiceCategory::with(['services' => function ($query) {
            $query->whereStatus('active')->whereSubscriberId($this->active_subscriber);
        }])->get();


        $data = [
            'service_categories' => $serviceCategories
        ];

        return view('Admin.services.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $all_categories = $this->getCategories();

        $data = [
            'all_categories' => $all_categories
        ];

        return view('Admin.services.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate request
        $this->validateRequest($request);

        $createData = [
            'subscriber_id' => $this->active_subscriber,
            'service_id' => $this->serviceId(),
            'service_name' => $request->service_name,
            'category_id' => $request->category_id,
            'individual' => $request->individual,
            'artist' => $request->artist,
            'institution' => $request->institution
        ];

        try {
            Service::create($createData);
            return redirect()->back()->with('success', "Service created succesfful");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Ooops! Something went wrong on our side");
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
    public function edit($service_id)
    {
        $service = $this->findService($service_id);
        $all_categories = $this->getCategories();

        $data = [
            'service' => $service,
            'all_categories' => $all_categories
        ];

        return view('Admin.services.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        if (!$this->isValid($request->service_id)) {
            return redirect()->back()->with('error', "Ooops! Something went wrong on our side");
        }

        $this->validateRequest($request);

        $service = $this->findService($request->service_id);

        $updateData = [
            'subscriber_id' => $this->active_subscriber,
            'service_id' => $request->service_id,
            'service_name' => $request->service_name,
            'category_id' => $request->category_id,
            'individual' => $request->individual,
            'artist' => $request->artist,
            'institution' => $request->institution
        ];

        try {
            $service->update($updateData);
            return redirect()->back()->with('success', "Bingo! Service updated successfully");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Ooops! Something went wrong on our side");
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $service_id)
    {
        // find service
        $service = $this->findService($service_id);

        // set status to deleted
        $service->status = 'deleted';

        // update
        try {
            $service->save();
            return redirect()->back()->with('success', "Bingo! Service deleted succesffully");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "Ooops! Something went wrong on our side");
        }
    }

    private function serviceId()
    {
        $count = Service::whereSubscriberId($this->active_subscriber)->whereStatus('active')->count() + 1;
        return str_pad($count, 6, "0", STR_PAD_LEFT);
    }

    /**
     * Check if a provided service id is valid
     *
     * @param [type] $service_id
     * @return boolean
     */
    private function isValid($service_id)
    {
        return (bool) Service::whereServiceId($service_id)
            ->whereSubscriberId($this->active_subscriber)
            ->whereStatus('active')
            ->first();
    }

    /**
     * Validate user input data
     *
     * @param [type] $request
     * @return void
     */
    private function validateRequest($request)
    {
        $request->validate([
            'service_name' => 'required',
            'category_id' => 'required',
            'individual' => 'required|numeric',
            'artist' => 'required|numeric',
            'institution' => 'required|numeric',
        ]);
    }

    /**
     * Find a specific service using service id as primary key
     *
     * @param string $service_id
     * @return Class Object
     */
    public function findService(string $service_id)
    {
        return Service::whereServiceId($service_id)
            ->whereSubscriberId($this->active_subscriber)
            ->whereStatus('active')
            ->first();
    }

    /**
     * Return a list of all active services
     */
    public function getServices()
    {
        return Service::whereSubscriberId($this->active_subscriber)->whereStatus('active')->get();
    }

    /**
     * Return a list of service categories
     *
     * @return void
     */
    public function getCategories()
    {
        return ServiceCategory::all();
    }
}
