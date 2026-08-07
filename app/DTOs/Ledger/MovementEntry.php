<?php

declare(strict_types=1);

namespace App\DTOs\Ledger;

use App\Domain\Ledger\Models\Transaction;
use App\Enums\Ledger\MovementDirection;
use App\Enums\Ledger\MovementType;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

final readonly class MovementEntry
{
    private function __construct(
        public string $accountId,
        public MovementDirection $direction,
        public float $amount,
        public MovementType $type,
        public string $narration,
        public string $userId,
        public ?string $sourceType,
        public ?string $sourceId,
        public ?string $reversesMovementId = null,
        public ?CarbonInterface $valueDate = null,
        public ?string $idempotencyKey = null
    ){
        if ($amount <= 0) {
            throw new InvalidArgumentException("Movement amount must be a positive cedi value");
        }
    }


    public static function inflow(
        string $accountId,
        float $amount,
        MovementType $type,
        string $narration,
        string $userId,
        ?Model $source = null,
        ?CarbonInterface $valueDate = null,
        ?string $idempotencyKey = null
    ): self {
        return new self(
            accountId: $accountId,
            direction: MovementDirection::Inflow,
            amount: $amount,
            type: $type,
            narration: $narration,
            userId: $userId,
            sourceType: $source ? $source::class : null,
            sourceId: $source?->getKey(),
            valueDate: $valueDate,
            idempotencyKey: $idempotencyKey
        );
    }


    public static function outlfow(
        string $accountId,
        float $amount,
        MovementType $type,
        string $narration,
        string $userId,
        ?Model $source = null,
        ?CarbonInterface $valueDate = null,
        ?string $idempotencyKey = null
    ): self {
        return new self(
            accountId: $accountId,
            direction: MovementDirection::Outflow,
            amount: $amount,
            type: $type,
            narration: $narration,
            userId: $userId,
            sourceType: $source ? $source::class : null,
            sourceId: $source?->getKey(),
            valueDate: $valueDate,
            idempotencyKey: $idempotencyKey
        );
    }


    /**
     * A reversal is a new movement in the OPPOSITE direction. It inherits the
     * original's type and source document so category-level nets stay correct
     * (a reversed payment cancels the original payment in "total payments"),
     * and it points back at the original via reversesMovementId.
     */
    public static function reversal(Transaction $original, string $userId, string $reason): self
    {
        return new self(
            accountId: $original->account_id,
            direction: $original->direction->opposite(),
            amount: $original->amount,
            type: $original->type,
            narration: $reason,
            userId: $userId,
            sourceType: $original->source_type,
            sourceId: $original->source_id,
            reversesMovementId: $original->getKey(),
        );
    }


    /**
     * Semantic identity of the movement. A retried post with the same identity
     * returns the original reference instead of double-posting. Source-backed
     * movements dedupe on (account, direction, amount, type, source). Sourceless
     * movements (e.g. manual adjustments) MUST pass an explicit idempotencyKey
     * to be dedupe-safe, otherwise two identical adjustments would collide.
     */
    public function idempotencyHash(): string
    {
        return hash_hmac(
            'sha256',
            implode('|', [
                $this->accountId,
                $this->direction->value,
                (string) $this->amount,
                $this->type->value,
                $this->sourceType ?? '',
                $this->sourceId ?? '',
                $this->reversesMovementId ?? '',
                $this->idempotencyKey ?? '',
            ]),
            config('app.key'),
        );
    }
}
