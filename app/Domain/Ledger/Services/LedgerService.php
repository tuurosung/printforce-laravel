<?php

namespace App\Domain\Ledger\Services;

use App\Domain\Accounts\Contracts\AccountRepositoryInterface;
use App\Domain\Accounts\Repositories\AccountRepository;
use App\Domain\Ledger\Contracts\TransactionRepositoryInterface;
use App\Domain\Ledger\Models\Transaction;
use App\DTOs\Accounts\AccountBalances;
use App\DTOs\Ledger\MovementEntry;
use App\Enums\Accounts\AccountStatusEnum;
use App\Enums\Ledger\MovementDirection;
use App\Exceptions\Ledger\AccountNotPostableException;
use App\Exceptions\Ledger\InsufficientFundsException;
use App\Models\Accounting\OperatingAccount;
use DomainException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LedgerService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private AccountRepositoryInterface $accounts,
        private TransactionRepositoryInterface $transactions
    ) {}

    public function post(MovementEntry $entry): string
    {
        return DB::transaction(function() use ($entry): string {
            $account = $this->accounts->lockForPosting($entry->accountId);

            // Idempotent: a retried post returns the original reference. The
            // account lock serialises concurrent identical posts, so the second
            // caller reads the first's committed row here rather than posting again.
            $existing = $this->transactions->findIdempotencyHash($entry->idempotencyHash());

            if ($existing !== null) {
                return $existing->reference;
            }

            $this->guardPostable($account);
            $this->guardSufficientFunds($account, $entry->direction, $entry->amount);

            $reference = (string) Str::uuid();
            $this->transactions->record($entry, $reference);

            $this->accounts->touchLastTransaction($account, now());

            return $reference;
        });
    }


    public function reverse(Transaction $original, string $userId, string $reason): string
    {
        if ($original->reverses_id !== null) {
            throw new DomainException(
                "Transaction {$original->reference} is itself a reversal and cannot be reversed"
            );
        }


        if ($original->reversal()->exists()) {
            throw new DomainException(
                "Transaction has already been reversed"
            );
        }

        return $this->post(MovementEntry::reversal($original, $userId, $reason));
    }


    public function balances(OperatingAccount $account)
    {
        $inflows = $this->transactions->sumInflows($account->account_id);
        $outlfows = $this->transactions->sumOutflows($account->account_id);

        $ledger = $inflows - $outlfows;

        // TODO: subtract active liens once defined -> available = $ledger - $liens
        return new AccountBalances(
            ledgerBalance: $ledger,
            availableBalance: $ledger,
            inflows: $inflows,
            outflows: $outlfows
        );
    }


    private function guardPostable(OperatingAccount $account): void
    {
        if (in_array($account->status, [AccountStatusEnum::Suspended, AccountStatusEnum::Closed], true)) {
            throw new AccountNotPostableException($account);
        };
    }


    /**
     * Only outflows can overdraw. Cash/MoMo/Bank are real money accounts and may
     * not go negative. Inflows never need a sufficiency check.
     */
    private function guardSufficientFunds(OperatingAccount $account, MovementDirection $direction, float $amount): void
    {
        if ($direction !== MovementDirection::Outflow) {
            return;
        }


        if ($this->balances($account)->availableBalance < $amount) {
            throw new InsufficientFundsException($account, $amount);
        }
    }
}
