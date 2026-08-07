<?php

declare(strict_types=1);

namespace App\Domain\Ledger\Contracts;

use App\Domain\Ledger\Models\Transaction;
use App\DTOs\Accounts\AccountBalances;
use App\DTOs\Ledger\MovementEntry;
use App\Models\Accounting\OperatingAccount;

interface LedgerInterface
{
    /** Posts a movement and returns its business reference (idempotent). */
    public function post(MovementEntry $entry): string;


    /** Posts a compensating movement in the opposite direction. */
    public function reverse(Transaction $original, string $userId, string $reason): string;
    

    /** Derives the current balance for an account from its movements. */
    public function balances(OperatingAccount $account): AccountBalances;
}
