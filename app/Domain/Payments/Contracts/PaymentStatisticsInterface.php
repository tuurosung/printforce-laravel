<?php

declare(strict_types= 1);

namespace App\Domain\Payments\Contracts;

use App\DTOs\Payments\PaymentStatisticsData;
use Faker\Provider\Payment;
use Illuminate\Database\Eloquent\Collection;

interface PaymentStatisticsInterface
{
    /**
     * Aggregate payment totals across common time windows in a single query.
     *
     * @return PaymentStatisticsData{
     *     todays_payment_total: float,
     *     weeks_payment_total: float,
     *     months_payment_total: float,
     *     years_payment_total: float,
     *     all_time_payment_total: float
     * }
     */
    public function getStatistics(): PaymentStatisticsData;


    /**
     * Return daily payment totals for the current calendar month (for graph).
     *
     * @return Collection<int, object{payment_date: string, total_payment: float}>
     */
    public function getDailyTotalsForCurrentMonth(): Collection;


    /**
     * Sum payments within an inclusive date range, optionally filtered by customer.
     */
    public function sumByDateRange(string $startDate, string $endDate, ?string $customerId = null): float;



    public function getByDateRange(string $startDate, string $endDate, ?string $customerId = null): Collection;
}
