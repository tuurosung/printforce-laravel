<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FilterPaymentsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'customer_id' => 'required'
        ]);

        $start_date = $request->start_date;
        $end_date = $request->end_date;


        if ($request->customer_id == 'all') {

            $filteredList = CustomerPayment::whereBetween('payment_date', [$start_date, $end_date])
                ->get();
        } else {

            $filteredList = CustomerPayment::whereBetween('payment_date', [$start_date, $end_date])
                ->where('customer_id', $request->customer_id)
                ->get();
        }

        return view('app.payments.filtered-payments', compact('filteredList'));
    }
}
