<?php

namespace App\Domain\Payments\Services;


use App\Domain\Customers\Services\CustomerService;
use App\Domain\Payments\Contracts\PaymentRepositoryInterface;
use App\Domain\Payments\Models\CustomerPayment;
use App\Services\Accounting\AccountService;
use Illuminate\Database\Eloquent\Collection;

class PaymentService
{
    public function __construct(
        private PaymentRepositoryInterface $payments,
        private CustomerService $customerService,
        private AccountService $accountService
    ) {}


    public function getLatestPayments(): Collection
    {
        return $this->payments->getLatest();
    }


    public function getPaymentStatistics(): array
    {
        return $this->payments->getStatistics();
    }


    public function getTodaysPaymentTotal(): float
    {
        return $this->payments->getStatistics()['todays_payment_total'];
    }


    public function getWeeklyPaymentTotal(): float
    {
        return $this->payments->getStatistics()['weeks_payment_total'];
    }


    public function getMonthlyPaymentTotal(): float
    {
        return $this->payments->getStatistics()['months_payment_total'];
    }


    public function getYearlyPaymentTotal(): float
    {
        return $this->payments->getStatistics()['years_payment_total'];
    }


    public function getAllTimePaymentTotal(): float
    {
        return $this->payments->getStatistics()['all_time_payment_total'];
    }



    // -------------------------------------------------------------------------------------
    // Graph Data
    // -------------------------------------------------------------------------------------

    public function getMonthyGraph(): Collection
    {
        return $this->payments->getDailyTotalsForCurrentMonth();
    }


    public function getFilteredPayments(
        string $startDate,
        string $endDate,
        ?string $customerId = null
    ): Collection {
        return $this->payments->getByDateRange($startDate, $endDate, $customerId);
    }


    // -------------------------------------------------------------------------------------
    // CRUD
    // -------------------------------------------------------------------------------------
    public function createPayment(array $data): CustomerPayment
    {
        return $this->payments->create($data);
    }

    public function updatePayment(CustomerPayment $customerPayment, array $data): bool
    {
        return $this->payments->update($customerPayment, $data);
    }

    public function deletePayment(CustomerPayment $customerPayment): bool
    {
        return $this->payments->delete($customerPayment);
    }


    public function indexData(): array
    {
        return [
            'total' => 0,
            'customers' => $this->customerService->getCustomersArray(),
            'payments' => $this->getLatestPayments(),
            'statistics' => $this->getPaymentStatistics(),
            'payment_accounts' => $this->accountService->getAssetAccounts()
        ];
    }
}
