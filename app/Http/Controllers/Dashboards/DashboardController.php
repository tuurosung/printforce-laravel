<?php

namespace App\Http\Controllers\Dashboards;

use App\Domain\Customers\Contracts\CustomerRepositoryInterface;
use App\Domain\Customers\Services\CustomerService;
use App\Domain\Payments\Contracts\PaymentRepositoryInterface;
use App\Domain\Payments\Models\CustomerPayment;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Jobs\JobController;
use App\Models\Customers\Customer;
use App\Services\Accounting\AccountService;
use App\Services\CustomerPaymentService;
use App\Services\ExpenditureService;
use App\Services\Jobs\CustomerJobService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct(
        private readonly CustomerRepositoryInterface $customerService,
        private readonly PaymentRepositoryInterface $paymentService,
        private ExpenditureService $expenditureService,
        private AccountService $accountService,
    ){}

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $statistics = $this->customerService->getCustomerStatistics();
        $payment_statistics = $this->paymentService->getStatistics();
        // $countNewCustomers = Customer::countNewCustomers();
        // $debtorsList = $customer->debtorsList();


        $service_performance = JobController::servicePerformanceAnalytics();
        // $customer_rankings = CustomerService::getCustomerRanking();

        $payment_graph = CustomerPayment::paymentGraph();

        $expenditure_statistics = $this->expenditureService->statistics;


        return view('app.dashboard.dashboard', [
            'todays_payments' =>  $payment_statistics['todays_payment_total'],
            'monthly_payments' => $payment_statistics['months_payment_total'],
            'monthly_expenditure' => $expenditure_statistics['monthly_expenditure'],
            'countNewCustomers' => $statistics['total_customers'],
            'customer_rankings' => $this->customerService->getCustomerRanking(),
            'service_performance' => $service_performance,
            'payment_graph' => $payment_graph,

            'todays_jobs_count' => CustomerJobService::countTodaysJobs(),

            'payment_accounts' => $this->accountService->getAssetAccountList(),
        ]);
    }
}
