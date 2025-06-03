<?php

namespace App\Services;

use App\Models\Accounting\Expenditure;
use App\Models\Accounting\ExpenditureHeader;
use App\Traits\Cacheable;

class ExpenditureService
{
    use Cacheable;

    protected $cacheTag = 'expenditure_service';

    public $statistics = [];

    /**
     * Create a new class instance.
     */
    public function __construct(
        private $expenditure = new Expenditure()
    )
    {
        $this->statistics = $this->expenditureStatistics();
    }


    /**
     * Get total expenditure for a given period.
     *
     * @param string|null $startDate
     * @param string|null $endDate
     * @return float
     */
    public function getTotalExpenditureForPeriod(?string $startDate, ?string $endDate = null): float
    {
        if (!$startDate) {
            return 0;
        }

        $query = $this->expenditure->query();

        if ($endDate) {
            $query->whereBetween('date', [$startDate, $endDate]);
        } else {
            $query->where('date', $startDate);
        }

        return $query->sum('amount') ?? 0;
    }



    private function expenditureStatistics()
    {
        $statistics = $this->expenditure->query()
            ->selectRaw('
            SUM(CASE WHEN DATE(date) = CURDATE() THEN amount ELSE 0 END) AS todays_expenditure,
            SUM(CASE WHEN MONTH(date) = MONTH(CURDATE()) AND YEAR(date) = YEAR(CURDATE()) THEN amount ELSE 0 END) AS monthly_expenditure,
            SUM(CASE WHEN YEAR(date) = YEAR(CURDATE()) THEN amount ELSE 0 END) AS yearly_expenditure,
            SUM(amount) AS total_expenditure
            ')
            ->first();

        return [
            'todays_expenditure' => $statistics->todays_expenditure ?? 0,
            'monthly_expenditure' => $statistics->monthly_expenditure ?? 0,
            'yearly_expenditure' => $statistics->yearly_expenditure ?? 0,
            'total_expenditure' => $statistics->total_expenditure ?? 0
        ];
    }


    public function getExpenditureHeaders()
    {
        return $this->rememberCache(
            'expenditure_headers',
            function () {
                return ExpenditureHeader::all();
            },
        );
    }


    public function getHeadersArray()
    {
        return $this->getExpenditureHeaders()
            ->mapWithKeys(
                fn($header) => [
                    $header->header_id => $header->header_name
                ]
            )->toArray();

        // dd($array);
    }
}
