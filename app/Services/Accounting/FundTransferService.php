<?php

namespace App\Services\Accounting;

use App\Models\Accounting\FundTransfer;

class FundTransferService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private $fundTransfer = new FundTransfer()
    )
    {
        //
    }


    /**
     * Get all fund transfers.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getTransfers()
    {
        return FundTransfer::with(['sourceAccount', 'destinationAccount'])
            ->latest()
            ->get();
    }


    public function filterFundTransfer(string $start_date, $end_date = null)
    {
        if (!$start_date)
        {
            throw new \InvalidArgumentException("Start date is required");
        }

        $query = $this->fundTransfer->query()
            ->with(['sourceAccount', 'destinationAccount']);

        if ($start_date && !$end_date) {
            $query->where('date', $start_date);
        }

        if ($start_date && $end_date)
        {
            $query->whereBetween('date', [$start_date, $end_date]);
        }

        return $query->get();
    }


    public function getTransferStatistics()
    {
        $statistics = $this->fundTransfer->query()
            ->selectRaw('
                SUM(CASE WHEN date = CURDATE() THEN amount ELSE 0 END) AS todays_transfers,
                SUM(CASE WHEN MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) THEN amount ELSE 0 END) AS monthly_transfers,
                SUM(CASE WHEN YEAR(date) = YEAR(CURDATE()) THEN amount ELSE 0 END) AS yearly_transfers,
                SUM(amount) AS total_transfers
            ')
            ->first();

        return [
            'todays_transfers' => $statistics->todays_transfers,
            'monthly_transfers' => $statistics->monthly_transfers,
            'yearly_transfers' => $statistics->yearly_transfers,
            'total_transfers' => $statistics->total_transfers,
        ];
    }
}
