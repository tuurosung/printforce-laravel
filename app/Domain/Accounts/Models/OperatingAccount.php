<?php

declare(strict_types=1);

namespace App\Domain\Accounts\Models;

use App\Domain\Accounts\Models\AddFunds;
use App\Domain\Expenditure\Models\Expenditure;
use App\Domain\Ledger\Models\Transaction;
use App\Domain\Payments\Models\CustomerPayment;
use App\Domain\Purchases\Models\PurchasePayment;
use App\DTOs\Accounts\AccountBalances;
use App\Enums\Accounts\AccountTypeEnum;
use App\Enums\Ledger\MovementDirection;
use App\Models\Accounting\OperatingAccountHeader;
use App\Models\Scopes\SubscriberScope;
use App\Observers\Accounts\OperatingAccountObserver;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ObservedBy([OperatingAccountObserver::class])]
#[ScopedBy([SubscriberScope::class])]
#[Fillable(['subscriber_id', 'account_type', 'account_number', 'account_name', 'description'])]
class OperatingAccount extends Model
{
    use HasFactory;

    protected $table = 'all_accounts';
    protected $primaryKey = 'account_number';
    protected $keyType = 'string';
    public $incrementing = false;


    protected function casts(): array
    {
        return [
            'account_type' => AccountTypeEnum::class
        ];
    }


    #[Scope]
    protected function inType(Builder $query, AccountTypeEnum $accountType): Builder
    {
        return $this->where('acc_type', $accountType->value);
    }


    /** Generate a UUID for the custom primary key column. */
    public function uniqueIds(): array
    {
        return [$this->getKeyName()];
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'account_id', 'account_id');
    }


    /**
     * Pre-loads inflow/outflow sums for a whole collection in ONE query.
     * Use on any list: Account::withBalances()->get().
     */
    protected function withBalances(Builder $query): Builder
    {
        return $query
            ->withSum(
                ['transactions as inflows' => fn ($q) => $q->where('direction', MovementDirection::Inflow)],
                'amount'
            )
            ->withSum(
                ['transactions as outflows' => fn ($q) => $q->where('direction', MovementDirection::Outflow)],
                'amount'
            );
    }


    /**
     * Derived balances. Reads the pre-loaded sums if withBalances() was used,
     * otherwise falls back to two queries for this row. Cached per instance so
     * ledger_balance and available_balance don't each re-query.
     */
    protected function balances(): Attribute
    {
        return Attribute::get(function (): AccountBalances {
            $inflows = (float) ($this->inflows
                ?? $this->transactions()->where('direction', MovementDirection::Inflow)->sum('amount'));

            $outflows = (float) ($this->outflows
                ?? $this->transactions()->where('direction', MovementDirection::Outflow)->sum('amount'));

            $ledger = $inflows - $outflows;

            // available = ledger - active liens (liens TODO), kept distinct on purpose
            return new AccountBalances(
                ledgerBalance: $ledger,
                availableBalance: $ledger,
                inflows: $inflows,
                outflows: $outflows,
            );
        })->shouldCache();
    }


    // protected function inflows(): Attribute
    // {
    //     return Attribute::get(fn(): float => $this->balances->inflows);
    // }


    // protected function outflows(): Attribute
    // {
    //     return Attribute::get(fn(): float => $this->balances->outflows);
    // }


    protected function ledgerBalance(): Attribute
    {
        return Attribute::get(fn(): float => $this->balances->ledgerBalance);
    }


    protected function availableBalance(): Attribute
    {
        return Attribute::get(fn() : float => $this->balances->availableBalance);
    }
}
