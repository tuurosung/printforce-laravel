<?php

declare(strict_types= 1);

namespace App\DTOs\Customers;

use App\Traits\ArrayableDTO;

final readonly class CustomerStatisticsData
{
    use ArrayableDTO;

    public function __construct(
        public int $totalCustomers,
        public int $newCustomers
    ) {}
}
