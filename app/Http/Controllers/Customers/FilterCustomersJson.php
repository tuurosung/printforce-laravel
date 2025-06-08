<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class FilterCustomersJson extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'search_term' => 'required|string|max:10'
        ]);

        $customerService = new CustomerService();

        return $customerService->filterCustomersJson(
            $request->input('search_term')
        );
    }
}
