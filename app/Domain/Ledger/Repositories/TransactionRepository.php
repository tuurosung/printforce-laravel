<?php

declare(strict_types=1);

namespace App\Domain\Ledger\Repositories;

use App\Domain\Ledger\Contracts\TransactionRepositoryInterface;
use App\Domain\Ledger\Models\Transaction;
use App\DTOs\Ledger\MovementEntry;
use App\Enums\Ledger\MovementDirection;
use Override;

final class TransactionRepository implements TransactionRepositoryInterface
{
    #[Override]
    public function findIdempotencyHash(string $hash): ?Transaction
    {
        return Transaction::query()
            ->where('idempotency_hash', $hash)
            ->first();
    }


    #[Override]
    public function record(MovementEntry $entry, string $reference): Transaction
    {
        return Transaction::create([
            'reference' => $reference,
            'account_id' => $entry->accountId,
            'direction' => $entry->direction,
            'amount' => $entry->amount,
            'type' => $entry->type,
            'narration' => $entry->narration,
            'source_type' => $entry->sourceType,
            'source_id' => $entry->sourceId,
            'reverses_id' => $entry->reversesMovementId,
            'value_date' => ($entry->valueDate ?? now())->toDateString(),
            'posted_by' => $entry->userId,
            'idempotency_hash' => $entry->idempotencyHash(),
            // integrity_hash is set by HasChecksum on the saving() event
        ]);
    }


    #[Override]
    public function sumInflows(string $accountId): int
    {
        return $this->sumDirection($accountId, MovementDirection::Inflow);
    }


    #[Override]
    public function sumOutflows(string $accountId): int
    {
        return $this->sumDirection($accountId, MovementDirection::Outflow);
    }



    private function sumDirection(string $accountId, MovementDirection $direction)
    {
        return (int) Transaction::query()
            ->where('account_id', $accountId)
            ->where('direction', $direction)
            ->sum('amount');
    }
}
