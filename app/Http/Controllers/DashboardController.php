<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Customers\Customer;
use App\Models\Accounting\Expenditure;
use App\Models\Customers\CustomerPayment;
use App\Http\Controllers\Jobs\JobController;
use App\Services\CustomerPaymentService;
use App\Services\CustomerService;
use App\Services\ExpenditureService;

class DashboardController extends Controller
{

    public function __construct(
        private CustomerPaymentService $customerPaymentService,
        private ExpenditureService $expenditureService
    )
    {
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Customer $customer)
    {
        $countNewCustomers = Customer::countNewCustomers();
        // $debtorsList = $customer->debtorsList();

        $monthly_payments = $this->customerPaymentService->getTotalPaymentForCurrentMonth();

        $service_performance = JobController::servicePerformanceAnalytics();
        $customer_rankings = CustomerService::getCustomerRanking();

        $payment_graph = CustomerPayment::paymentGraph();

        $expenditure_statistics = $this->expenditureService->statistics;


        return view('app.dashboard', [
            'monthly_payments' => $monthly_payments,
            'monthly_expenditure' => $expenditure_statistics['monthly_expenditure'],
            'countNewCustomers' => $countNewCustomers,
            'customer_rankings' => $customer_rankings,
            'service_performance' => $service_performance,
            'payment_graph' => $payment_graph,
        ]);
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
