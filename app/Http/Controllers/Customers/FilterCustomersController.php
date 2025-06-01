<?php

namespace App\Http\Controllers\Customers;

use Illuminate\Http\Request;
use App\Models\Customers\Customer;
use App\Http\Controllers\Controller;

class FilterCustomersController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'search_term' => 'required|string|max:10'
        ]);

        $searchTerm = $request->input('search_term');

        $customers = Customer::with([
            'largeFormatJobs',
            'embroideryJobs',
            'pressJobs',
            'designJobs',
            'photography_jobs',
            'payments'
        ])
        ->where(function ($query) use ($searchTerm) {
            $query->where('name', 'like', "%{$searchTerm}%")
                  ->orWhere('phone', 'like', "%{$searchTerm}%");
        })
        ->limit(10)
        ->get();

        return view('app.customer.filter-customers', compact('customers'));
    }
}
