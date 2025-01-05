<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Customers\Customer;
use App\Models\Accounting\Expenditure;
use App\Models\Customers\CustomerPayment;
use App\Http\Controllers\Jobs\JobController;

class DashboardController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index(Customer $customer)
    {
        $countNewCustomers = Customer::countNewCustomers();
        // $debtorsList = $customer->debtorsList();

        $monthly_payments = CustomerPayment::totalPaymentPeriod(Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth());
        $monthly_expenditure = Expenditure::totalExpenditurePeriod(Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth());

        $service_performance = JobController::servicePerformanceAnalytics();
        $customer_rankings = Customer::customerRankingAnalytics();

        $payment_graph = CustomerPayment::paymentGraph();

        return view('app.dashboard', compact('monthly_payments', 'monthly_expenditure', 'countNewCustomers', 'service_performance', 'customer_rankings'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
