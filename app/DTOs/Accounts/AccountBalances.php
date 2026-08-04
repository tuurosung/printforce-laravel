<?php

declare(strict_types=1);

namespace App\DTOs\Accounts;

final readonly class AccountBalances
{
    public function __construct(
        public float $ledgerBalance,
        public float $availableBalance,
        public float $inflows,
        public float $outflows
    ){}
}
