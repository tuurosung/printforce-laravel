<?php

namespace App\Domain\Payments\Repositories;


use App\Domain\Payments\Contracts\PaymentRepositoryInterface;
use App\Domain\Payments\Models\CustomerPayment;
use App\Services\BaseService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Override;

class PaymentRepository extends BaseService implements PaymentRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private readonly CustomerPayment $model
    ){}


    public function getLatest(int $limit = 100): Collection
    {
        return $this->model->query()
            ->with(['customer', 'account'])
            ->orderBy('payment_date', 'desc')
            ->limit($limit)
            ->get();
    }

    public function getStatistics(): array
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

        return [
            'todays_payment_total' => (float) ($row->todays_payment_total ?? 0),
            'weeks_payment_total' => (float) ($row->weeks_payment_total ?? 0),
            'months_payment_total' => (float) ($row->months_payment_total ?? 0),
            'years_payment_total' => (float) ($row->years_payment_total ?? 0),
            'all_time_payment_total' => (float) ($row->all_time_payment_total ?? 0),
        ];
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


    // CRUD
    public function create(array $data): CustomerPayment
    {
        return $this->model->create($data);
    }

    public function update(CustomerPayment $customerPayment, array $data): bool
    {
        return $customerPayment->update($data);
    }

    public function delete(CustomerPayment $customerpayment): bool
    {
        return $customerpayment->delete();
    }
}
