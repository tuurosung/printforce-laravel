<?php

namespace App\Domain\Payments\Services;


use App\Domain\Customers\Services\CustomerService;
use App\Domain\Payments\Contracts\PaymentRepositoryInterface;
use App\Domain\Payments\Models\CustomerPayment;
use App\DTOs\Customers\CustomerData;
use App\DTOs\Payments\PaymentData;
use App\Services\Accounting\AccountService;
use App\Services\BaseService;
use DomainException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Override;

class PaymentService extends BaseService
{
    public function __construct(
        private PaymentRepositoryInterface $payments,
        private CustomerService $customerService,
        private AccountService $accountService,
        private readonly PaymentStatistics $paymentStatistics,
        private PaymentAlertService $alertService
    ) {}


    #[Override]
    protected function modelClass(): string
    {
        return CustomerPayment::class;
    }

    protected string $selectOptionKey = "payment_id";
    protected string $selectOptionValue = "";


    public function getLatestPayments(): Collection
    {
        return $this->payments->getLatest();
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


    public function createPayment(PaymentData $paymentData): CustomerPayment
    {
        try {
            $customerPayment = $this->payments->store($paymentData);
            Log::info("payment sucessful", [$customerPayment]);

            $sendAlert = $this->alertService->send(
                $paymentData->customerId,
                $paymentData->amountPaid
            );
        } catch (DomainException $exception) {
            throw new DomainException("Error processing payment", $exception->getMessage());
        }

        return $customerPayment;
    }


    public function updatePayment(CustomerPayment $customerPayment, PaymentData $paymentData): bool
    {
        return $this->payments->update($customerPayment, $paymentData);
    }

    public function deletePayment(CustomerPayment $customerPayment): bool
    {
        return $this->payments->delete($customerPayment);
    }


    public function indexData(): array
    {
        return [
            'total' => 0,
            'customers' => $this->customerService->optionsForSelect(),
            'payments' => $this->getLatestPayments(),
            'statistics' => $this->paymentStatistics->getStatistics(),
            'payment_accounts' => $this->accountService->getAssetAccounts()
        ];
    }
}
