<?php

declare(strict_types= 1);

namespace   App\DTOs\Payments;

final readonly class PaymentStatisticsData
{
    public function __construct(
        public float $todaysTotalPayment,
        public float $weeksTotalPayment,
        public float $monthsTotalPayment,
        public float $yearToDateTotal,
        public float $allTimeTotalPayment,
    ){}
}
