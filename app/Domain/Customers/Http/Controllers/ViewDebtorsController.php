<?php

namespace App\Domain\Customers\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers\Customer;
use App\Http\Controllers\Controller;
use App\Services\DebtorService;

class ViewDebtorsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $debtors = DebtorService::getDebtorsListOptimized();

        return view('app.customer.debtors', compact('debtors'));
    }
}
