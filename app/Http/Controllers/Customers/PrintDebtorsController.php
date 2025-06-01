<?php

namespace App\Http\Controllers\Customers;

use Illuminate\Http\Request;
use App\Models\Customers\Customer;
use App\Http\Controllers\Controller;
use App\Services\DebtorService;

class PrintDebtorsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $debtors = DebtorService::getDebtorsList();

        return view('app.customer.print-debtors-list', compact('debtors'));
    }
}
