<?php

namespace App\Domain\PrintServices\Http\Controllers;

use App\Domain\PrintServices\Services\PrintServicesHandler;
use App\Facades\PrintServices;
use App\Http\Controllers\Controller;

class PrintServiceCostController extends Controller
{
    public function __construct(
        private readonly PrintServicesHandler $printServicesHandler,
    ){}


    /**
     * Handle the incoming request.
     */
    public function __invoke(string $serviceId)
    {

        // $customer_id = session()->get()
        // $serviceCost = $this->printServicesHandler->getServiceCost($serviceId);

        // if ($serviceCost === null) {
        //     return response()->json(['error' => 'Service not found'], 404);
        // }

        // return response()->json(['cost' => $serviceCost]);
    }
}
