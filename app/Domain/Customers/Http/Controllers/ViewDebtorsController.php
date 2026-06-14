<?php

namespace App\Domain\Customers\Http\Controllers;

use App\Domain\Customers\Models\Debtor;
use App\Http\Controllers\Controller;
use App\Models\Customers\Customer;
use App\Services\DebtorService;
use Illuminate\Http\Request;

class ViewDebtorsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $debtors = Debtor::get();

        return view('app.customer.debtors', compact('debtors'));
    }
}
