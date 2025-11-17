<?php

namespace App\Http\Controllers\Services;

use Illuminate\Http\Request;
use App\Facades\PrintServices;
use App\Models\Customers\Customer;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Services\PrintService;

class GetServiceCostController extends Controller
{

    public function getServiceCostWithCustomerId(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|string',
            'service_id' => 'required|string',
        ]);
        
        try {

            $customer = Customer::where('customer_id', $request->customer_id)->firstOrFail();
            $service = PrintService::where('service_id', $request->service_id)->firstOrFail();

            $serviceCost = $service->{$customer->category};

            return response()->json(['cost' => $serviceCost]);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {

            return response()->json(['error' => 'Customer or service not found'], 404);

        } catch (\Exception $e) {

            Log::error('Service cost calculation failed', [
                'customer_id' => $request->customer_id,
                'service_id' => $request->service_id,
                'error' => $e->getMessage()
            ]);

            return response()->json(['error' => 'Unable to calculate service cost'], 500);
        }
    }
}
