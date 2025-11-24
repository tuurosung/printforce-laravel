<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Customers\Customer;
use App\Models\Customers\CustomerPayment;

class CustomerPaymentService
{
    public function __construct(
        private $customerPayment = new CustomerPayment()
    ) {
    }


    /**
     * Get the latest 100 customer payments
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getLatestPayments()
    {
        return $this->customerPayment->query()
            ->with(['customer', 'account'])
            ->orderBy('payment_date', 'desc')
            ->limit(100)
            ->get();
    }


    /**
     * Get the total payment amount for a specific period.
     *
     * @param string|null $startDate
     * @param string|null $endDate
     * @return float
     */
    public function getTotalPaymentForPeriod(?string $startDate, ?string $endDate = null): float
    {
        if (!$startDate) {
            return 0;
        }

        $query = $this->customerPayment->query();

        if ($endDate) {
            $query->whereBetween('payment_date', [$startDate, $endDate]);
        } else {
            $query->where('payment_date', $startDate);
        }

        return $query->sum('amount_paid') ?? 0;
    }


    /**
     * Get the total payment amount for the period.
     *
     * @return float
     */
    public function getTotalPaymentForCurrentMonth(): float
    {
        $startOfMonth = Carbon::now()->startOfMonth()->format('Y-m-d');
        $endOfMonth = Carbon::now()->endOfMonth()->format('Y-m-d');

        return $this->getTotalPaymentForPeriod($startOfMonth, $endOfMonth);
    }



    /**
     * Get payment statistics as an array.
     *
     * @return array
     */
    public function getPaymentStatistics(): array
    {
        $carbonNow = Carbon::now();

        $statistics = $this->customerPayment->query()
            ->selectRaw('

                SUM(CASE WHEN DATE(payment_date) = CURDATE() THEN amount_paid ELSE 0 END) AS todays_payment_total,
                SUM(CASE WHEN WEEK(payment_date, 1) = WEEK(CURDATE(), 1) AND YEAR(payment_date) = YEAR(CURDATE()) THEN amount_paid ELSE 0 END) AS weeks_total_payment,
                SUM(CASE WHEN MONTH(payment_date) = MONTH(CURDATE()) AND YEAR(payment_date) = YEAR(CURDATE()) THEN amount_paid ELSE 0 END) AS months_payment_total,
                SUM(CASE WHEN YEAR(payment_date) = YEAR(CURDATE()) THEN amount_paid ELSE 0 END) AS years_payment_total,
                SUM(amount_paid) AS all_time_payment_total
            ')->first();

        return [
            'todays_payment_total' => $statistics->todays_payment_total ?? 0,
            'weeks_payment_total' => $statistics->weeks_total_payment ?? 0,
            'months_payment_total' => $statistics->months_payment_total ?? 0,
            'years_payment_total' => $statistics->years_payment_total    ?? 0,
            'all_time_payment_total' => $statistics->all_time_payment_total ?? 0,
        ];
    }


    public function getTodaysPaymentTotal(): float
    {
        $statistics = $this->getPaymentStatistics();
        return $statistics['todays_payment_total'] ?? 0;
    }


    public function getMonthlyPaymentTotal(): float
    {
        $statistics = $this->getPaymentStatistics();
        return $statistics['months_payment_total'] ?? 0;
    }


    public function getYearlyPaymentTotal(): float
    {
        $statistics = $this->getPaymentStatistics();
        return $statistics['years_payment_total'] ?? 0;
    }


    public function getAllTimePaymentTotal(): float
    {
        $statistics = $this->getPaymentStatistics();
        return $statistics['all_time_payment_total'] ?? 0;
    }
}
