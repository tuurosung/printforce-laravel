<?php

namespace App\Services;

use App\Models\Customers\CustomerPayment;
use Carbon\Carbon;

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
                SUM(CASE WHEN payment_date = ? THEN amount_paid ELSE 0 END) AS todays_payment,
                SUM(CASE WHEN payment_date >= ? AND payment_date <= ? THEN amount_paid ELSE 0 END) AS weeks_total_payment,
                SUM(CASE WHEN payment_date >= ? AND payment_date <= ? THEN amount_paid ELSE 0 END) AS months_total_payment,
                SUM(CASE WHEN payment_date >= ? AND payment_date <= ? THEN amount_paid ELSE 0 END) AS years_total_payment
            ', [
                $carbonNow->format('Y-m-d'), // Today's date

                $carbonNow->startOfWeek()->format('Y-m-d'), $carbonNow->endOfWeek()->format('Y-m-d'), // Start and end of the week
                $carbonNow->startOfMonth()->format('Y-m-d'), $carbonNow->endOfMonth()->format('Y-m-d'), // Start and end of the month
                $carbonNow->startOfYear()->format('Y-m-d'), $carbonNow->endOfYear()->format('Y-m-d') // Start and end of the year
            ])
            ->first();

        return [
            'todays_payments' => $statistics->todays_payment ?? 0,
            'this_weeks_payments' => $statistics->weeks_total_payment ?? 0,
            'this_months_payments' => $statistics->months_total_payment ?? 0,
            'this_years_payments' => $statistics->years_total_payment ?? 0,
        ];
    }
}
