<?php

namespace App\Http\Controllers\Dashboards;

use App\Domain\Customers\Contracts\CustomerRepositoryInterface;
use App\Domain\Customers\Services\CustomerService;
use App\Domain\Customers\Services\CustomerStatistics;
use App\Domain\Payments\Contracts\PaymentRepositoryInterface;
use App\Domain\Payments\Models\CustomerPayment;
use App\Domain\Payments\Services\PaymentStatistics;
use App\Domain\PrintJobs\Http\Controllers\JobController;
use App\Domain\PrintJobs\Services\CustomerJobService;
use App\Http\Controllers\Controller;
use App\Services\Accounting\AccountService;
use App\Services\ExpenditureService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct(
        private readonly CustomerService $customerService,
        private readonly CustomerStatistics $customerStatistics,
        private readonly PaymentRepositoryInterface $paymentService,
        private readonly PaymentStatistics $paymentStatistics,
        private ExpenditureService $expenditureService,
        private AccountService $accountService,
    ){}

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $statistics = $this->customerStatistics->statistics();
        $payment_statistics = $this->paymentStatistics->getStatistics();


        $service_performance = JobController::servicePerformanceAnalytics();

        $payment_graph = CustomerPayment::paymentGraph();

        $expenditure_statistics = $this->expenditureService->statistics;


        return view('app.dashboard.dashboard', [
            'payment_statistics' => $payment_statistics,
            'monthly_expenditure' => $expenditure_statistics['monthly_expenditure'],
            'countNewCustomers' => $statistics->newCustomers,
            'customer_rankings' => $this->customerStatistics->getCustomerRanking(),
            'service_performance' => $service_performance,
            'payment_graph' => $payment_graph,

            'todays_jobs_count' => CustomerJobService::countTodaysJobs(),

            'payment_accounts' => $this->accountService->getAssetAccountList(),
        ]);
    }
}
