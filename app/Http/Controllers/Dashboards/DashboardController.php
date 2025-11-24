<?php

namespace App\Http\Controllers\Dashboards;

use Illuminate\Http\Request;
use App\Services\CustomerService;
use App\Models\Customers\Customer;
use App\Http\Controllers\Controller;
use App\Services\ExpenditureService;
use App\Services\CustomerPaymentService;
use App\Models\Customers\CustomerPayment;
use App\Http\Controllers\Jobs\JobController;
use App\Services\Accounting\AccountService;
use App\Services\Jobs\CustomerJobService;

class DashboardController extends Controller
{

    public function __construct(
        private CustomerService $customerService,
        private CustomerPaymentService $customerPaymentService,
        private ExpenditureService $expenditureService,
        private AccountService $accountService,
    ){}

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // $countNewCustomers = Customer::countNewCustomers();
        // $debtorsList = $customer->debtorsList();
        $countNewCustomers = CustomerService::countNewCustomers();


        $service_performance = JobController::servicePerformanceAnalytics();
        $customer_rankings = CustomerService::getCustomerRanking();

        $payment_graph = CustomerPayment::paymentGraph();

        $expenditure_statistics = $this->expenditureService->statistics;


        return view('app.dashboard.dashboard', [
            'todays_payments' => $this->customerPaymentService->getTodaysPaymentTotal(),
            'monthly_payments' => $this->customerPaymentService->getMonthlyPaymentTotal(),
            'monthly_expenditure' => $expenditure_statistics['monthly_expenditure'],
            'countNewCustomers' => $countNewCustomers,
            'customer_rankings' => $customer_rankings,
            'service_performance' => $service_performance,
            'payment_graph' => $payment_graph,

            'todays_jobs_count' => CustomerJobService::countTodaysJobs(),

            'payment_accounts' => $this->accountService->getAssetAccountList(),
        ]);
    }
}
