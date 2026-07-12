<?php

declare(strict_types= 1);

namespace App\DTOs\Payments;

use App\Traits\ArrayableDTO;

final readonly class PaymentData
{
    use ArrayableDTO;

    public function __construct(
        public string $customerId,
        public float $amountPaid,
        public string $accountNumber,
        public string $paymentDate
    ){}
}
