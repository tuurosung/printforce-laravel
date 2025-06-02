<?php

namespace App\Http\Controllers\Services;

use Illuminate\Http\Request;
use App\Facades\PrintServices;
use App\Http\Controllers\Controller;
use App\Services\PrintServicesManager;

class PrintServiceCostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($serviceId)
    {
        // $serviceId = $request->route('serviceId');
        // $customerCategory = $request->route('customerCategory');

        $serviceCost = PrintServices::getServiceCost($serviceId);

        if ($serviceCost === null) {
            return response()->json(['error' => 'Service not found'], 404);
        }

        return response()->json(['cost' => $serviceCost]);
    }
}
