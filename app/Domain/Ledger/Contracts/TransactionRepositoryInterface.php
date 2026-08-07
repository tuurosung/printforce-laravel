<?php

declare(strict_types = 1);

namespace App\Domain\Ledger\Contracts;

use App\Domain\Ledger\Models\Transaction;
use App\DTOs\Ledger\MovementEntry;

interface TransactionRepositoryInterface
{
    public function findIdempotencyHash(string $hash): ?Transaction;

    public function record(MovementEntry $entry, string $reference): Transaction;

    public function sumInflows(string $accountId): int;

    public function sumOutflows(string $accountId): int;
}
