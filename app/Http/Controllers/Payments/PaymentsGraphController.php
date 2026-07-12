<?php

namespace App\Http\Controllers\Payments;

use App\Domain\Payments\Models\CustomerPayment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentsGraphController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return CustomerPayment::paymentGraph();

    }
}
