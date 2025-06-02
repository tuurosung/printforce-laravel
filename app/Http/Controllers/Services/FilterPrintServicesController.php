<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FilterPrintServicesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // $searchTerm = $request->route('searchTerm');
        // $printServicesManager = app('App\Services\PrintServicesManager');

        // // Filter services by search term
        // $filteredServices = $printServicesManager->filterServicesByCategory($searchTerm);

        // // Return the filtered services as a JSON response
        // return response()->json($filteredServices);
    }
}
