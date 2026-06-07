<?php

namespace App\Domain\Payments\Services;


use App\Domain\Payments\Contracts\PaymentRepositoryInterface;
use App\Domain\Payments\Models\CustomerPayment;
use App\Domain\Payments\Repositories\PaymentRepository;
use App\Services\BaseService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class PaymentService
{
    public function __construct(
        private PaymentRepositoryInterface $paymentRepository
    ) {}

    public function getLatestPayments(): Collection
    {
        return $this->paymentRepository->getLatest();
    }


    /**
     * All five aggregates resolved in one DB round-trip.
     *
     * @return array{
     *     todays_payment_total: float,
     *     weeks_payment_total: float,
     *     months_payment_total: float,
     *     years_payment_total: float,
     *     all_time_payment_total: float
     * }
     */
    public function getPaymentStatistics(): array
    {
        return $this->paymentRepository->getStatistics();
    }


    public function getTodaysPaymentTotal(): float
    {
        return $this->paymentRepository->getStatistics()['todays_payment_total'];
    }


    public function getWeeklyPaymentTotal(): float
    {
        return $this->paymentRepository->getStatistics()['weeks_payment_total'];
    }


    public function getMonthlyPaymentTotal(): float
    {
        return $this->paymentRepository->getStatistics()['months_payment_total'];
    }


    public function getYearlyPaymentTotal(): float
    {
        return $this->paymentRepository->getStatistics()['years_payment_total'];
    }


    public function getAllTimePaymentTotal(): float
    {
        return $this->paymentRepository->getStatistics()['all_time_payment_total'];
    }



    // -------------------------------------------------------------------------------------
    // Graph Data
    // -------------------------------------------------------------------------------------

    public function getMonthyGraph(): Collection
    {
        return $this->paymentRepository->getDailyTotalsForCurrentMonth();
    }


    public function getFilteredPayments(
        string $startDate,
        string $endDate,
        ?string $customerId = null
    ): Collection {
        return $this->paymentRepository->getByDateRange($startDate, $endDate, $customerId);
    }

}
