<?php

namespace App\Domain\PrintServices\Http\Controllers;

use Illuminate\Http\Request;
use App\Facades\PrintServices;
use App\Http\Controllers\Controller;

class FetchServiceDetailController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $serviceId = $request->query('serviceId');

        $serviceDetail = PrintServices::getServiceDetail($serviceId);

        return response()->json($serviceDetail);
    }
}
