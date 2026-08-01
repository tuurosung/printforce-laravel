<?php

declare(strict_types = 1);

namespace App\DTOs\Expenditure;

use App\Enums\PaymentMethodsEnum;
use App\Traits\ArrayableDTO;

final class NewExpenditureData
{
    use ArrayableDTO;

    public function __construct(
        public string $sourceAccountId,
        public string $destinationAccountId,
        public float $amount,
        public string $narration,
        public string $date,
        public string $reference,
        public string $drawee,
        public PaymentMethodsEnum $paymentMethod,
        public string $idempotencyKey
    ){}
}
