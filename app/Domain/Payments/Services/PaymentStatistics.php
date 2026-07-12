<?php

declare(strict_types= 1);

namespace App\Domain\Payments\Services;

use App\Domain\Payments\Contracts\PaymentStatisticsInterface;
use App\Domain\Payments\Models\CustomerPayment;
use App\DTOs\Payments\PaymentStatisticsData;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

final class PaymentStatistics implements PaymentStatisticsInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private readonly CustomerPayment $model
    ) {}


    public function getStatistics(): PaymentStatisticsData
    {
        $row = $this->model->query()
            ->selectRaw('
                SUM(CASE WHEN DATE(payment_date) = CURDATE() THEN amount_paid ELSE 0 END) AS todays_payment_total,
                SUM(CASE WHEN WEEK(payment_date, 1) = WEEK(CURDATE(), 1) AND YEAR(payment_date) = YEAR(CURDATE())                                             THEN amount_paid ELSE 0 END) AS weeks_payment_total,
                SUM(CASE WHEN MONTH(payment_date) = MONTH(CURDATE()) AND YEAR(payment_date)  = YEAR(CURDATE())                                            THEN amount_paid ELSE 0 END) AS months_payment_total,
                SUM(CASE WHEN YEAR(payment_date) = YEAR(CURDATE()) THEN amount_paid ELSE 0 END) AS years_payment_total,
                SUM(amount_paid) AS all_time_payment_total
            ')
            ->first();

        return new PaymentStatisticsData(
            todaysTotalPayment: (float) ($row->todays_payment_total ?? 0),
            weeksTotalPayment: (float) ($row->weeks_payment_total ?? 0),
            monthsTotalPayment: (float) ($row->months_payment_total ?? 0),
            yearToDateTotal: (float) ($row->years_payment_total ?? 0),
            allTimeTotalPayment: (float) ($row->allTime ?? 0),
        );
    }


    public function getDailyTotalsForCurrentMonth(): Collection
    {
        return $this->model->query()
            ->select('payment_date', DB::raw('SUM(amount_paid) as total_payment'))
            ->whereBetween('payment_date', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth()
            ])
            ->groupBy('payment_date')
            ->orderBy('payment_date', 'asc')
            ->get();
    }


    public function sumByDateRange(string $startDate, string $endDate, ?string $customerId = null): float
    {
        return (float) $this->dateRangeQuery($startDate, $endDate, $customerId)
            ->sum('amount_paid');
    }


    public function getByDateRange(string $startDate, string $endDate, ?string $customerId = null): Collection
    {
        return $this->dateRangeQuery($startDate, $endDate, $customerId)
            ->with(['customer', 'account'])
            ->orderBy('payment_date', 'asc')
            ->get();
    }


    // --------------------------------------------------------------------------------------------------------
    // Private Helpers
    // --------------------------------------------------------------------------------------------------------

    private function dateRangeQuery(string $startDate, string $endDate, ?string $customerId): Builder
    {
        return $this->model->query()
            ->whereBetween('payment_date', [$startDate, $endDate])
            ->when($customerId, function ($query) use ($customerId) {
                return $query->where('customer_id', $customerId);
            });
    }
}
