<?php

declare(strict_types=1);

namespace App\Domain\Customers\Contracts;

use App\DTOs\Customers\CustomerStatisticsData;
use Illuminate\Database\Eloquent\Collection;

interface CustomerStatisticsInterface
{
    /**
     * Returns customer rankings based on number of jobs
     */
    public function getCustomerRanking(): Collection;


    /**
     * Return the statistics of customers
     */
    public function statistics(int $newWithinDays = 30): CustomerStatisticsData;
}
